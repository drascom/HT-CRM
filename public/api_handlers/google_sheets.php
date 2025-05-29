<?php
require_once '../includes/db.php';
require_once '../includes/auth.php';

// Debug logging function (can be simplified for API endpoint if needed)
function debugLog($message, $data = null, $level = 'INFO')
{
    $timestamp = date('Y-m-d H:i:s');
    $logEntry = "\n## Debug Log - {$timestamp}\n\n";
    $logEntry .= "**Level:** {$level}\n";
    $logEntry .= "**Message:** {$message}\n";

    if ($data !== null) {
        $logEntry .= "**Data:**\n```json\n" . json_encode($data, JSON_PRETTY_PRINT) . "\n```\n";
    }

    $logEntry .= "---\n";

    // Append to log file
    file_put_contents(__DIR__ . '/../google_debug.log', $logEntry, FILE_APPEND | LOCK_EX);
}

// Error handling function
function handleError($errorCode, $message, $data = null)
{
    debugLog("ERROR: {$errorCode} - {$message}", $data, 'ERROR');
    return [
        'success' => false,
        'error_code' => $errorCode,
        'message' => $message,
        'data' => $data
    ];
}

// Set content type to JSON
header('Content-Type: application/json');

// Authentication Check
if (!is_logged_in()) {
    debugLog("Authentication failed for API endpoint", null, 'ERROR');
    echo json_encode(handleError('AUTH_001', 'Authentication required'));
    exit();
}

require __DIR__ . '/../../vendor/autoload.php'; // Adjust path if Composer is installed elsewhere

// Function to get a setting value from the database with debugging
function get_setting($key)
{
    try {
        // debugLog("Retrieving setting from database", ['key' => $key]); // Avoid excessive logging in API
        $pdo = get_db(); // Get the PDO instance using the helper function
        $stmt = $pdo->prepare("SELECT value FROM settings WHERE key = :key");
        $stmt->bindValue(':key', $key, PDO::PARAM_STR); // Use PDO::PARAM_STR for string binding
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Use PDO fetch method

        $value = $row ? $row['value'] : null;
        // debugLog("Setting retrieved", ['key' => $key, 'found' => $row ? 'YES' : 'NO', 'value_length' => $value ? strlen($value) : 0]); // Avoid excessive logging
        return $value;
    } catch (Exception $e) {
        debugLog("Error retrieving setting in API", ['key' => $key, 'error' => $e->getMessage()], 'ERROR');
        return null;
    }
}

// --- Configuration ---
$credentialsPath = __DIR__ . '/../secrets/liv-hsh-patients-18682cec86db.json'; // Adjust path relative to this file
$spreadsheetId = get_setting('spreadsheet_id'); // Get Spreadsheet ID from settings
$cacheDuration = (int)get_setting('cache_duration') ?: 3600; // Default 1 hour
$cellRange = get_setting('cell_range') ?: 'A1:Z'; // Default range

// Validate required settings
if (!$spreadsheetId) {
    debugLog("Missing spreadsheet ID in API", null, 'ERROR');
    echo json_encode(handleError('CONFIG_001', 'Spreadsheet ID not configured.'));
    exit();
}

if (!file_exists($credentialsPath)) {
    debugLog("Google API credentials file not found in API", ['path' => $credentialsPath], 'ERROR');
    echo json_encode(handleError('CONFIG_002', 'Google API credentials file not found.'));
    exit();
}

// --- Caching Logic ---
$cacheDir = __DIR__ . '/../../cache/'; // Adjust path relative to this file
$cacheFile = $cacheDir . 'sheet_data_' . md5($spreadsheetId) . '.json'; // Use md5 for a safe filename

$cachedData = null;
$usingCache = false;

if (file_exists($cacheFile) && (filemtime($cacheFile) > (time() - $cacheDuration))) {
    // Cache is valid, read from cache
    $cachedContent = file_get_contents($cacheFile);
    $cachedData = json_decode($cachedContent, true);
    if ($cachedData !== null && isset($cachedData['spreadsheetTitle'], $cachedData['sheetTitles'], $cachedData['sheetValues'])) {
        // Use cached data
        $usingCache = true;
        debugLog("Using cached data in API");
        echo json_encode([
            'success' => true,
            'data' => $cachedData,
            'from_cache' => true
        ]);
        exit();
    } else {
        // Cache file is corrupted or empty, delete it
        debugLog("Corrupted cache file found, deleting in API", ['cache_file' => basename($cacheFile)], 'WARNING');
        @unlink($cacheFile); // Use @ to suppress errors if file doesn't exist
    }
}

if (!$usingCache) {
    // Data Fetching from Google Sheets API
    debugLog("Cache not available, fetching from Google Sheets API in API endpoint");
    $apiStartTime = microtime(true);

    try {
        $client = new \Google\Client();
        $client->setApplicationName('Google Sheets PHP Fetcher');
        $client->setScopes([\Google\Service\Sheets::SPREADSHEETS_READONLY]);
        $client->setAuthConfig($credentialsPath);

        $service = new \Google\Service\Sheets($client);

        // --- Fetch Spreadsheet Metadata to get Sheet Titles ---
        $spreadsheet = $service->spreadsheets->get($spreadsheetId);
        $sheets = $spreadsheet->getSheets();

        $spreadsheetTitle = $spreadsheet->getProperties()->getTitle();

        // Data Processing
        $sheetValues = [];
        $sheetTitles = [];

        foreach ($sheets as $index => $sheet) {
            $sheetTitle = $sheet->getProperties()->getTitle();

            // Validate and sanitize sheet title
            if (empty($sheetTitle)) {
                debugLog("Empty sheet title found, skipping in API", ['sheet_index' => $index], 'WARNING');
                continue;
            }

            $sheetTitles[] = $sheetTitle;

            // Construct the range properly
            $escapedSheetTitle = str_replace("'", "''", $sheetTitle); // Escape single quotes in sheet name
            $range = "'" . $escapedSheetTitle . "'!" . $cellRange; // Properly format the range

            try {
                $response = $service->spreadsheets_values->get($spreadsheetId, $range);
                $values = $response->getValues() ?? [];
                $sheetValues[$sheetTitle] = $values;
            } catch (\Google\Service\Exception $e) {
                debugLog("Error fetching data for sheet in API", [
                    'sheet_title' => $sheetTitle,
                    'range' => $range,
                    'error_code' => $e->getCode(),
                    'error_message' => $e->getMessage()
                ], 'ERROR');

                // Skip this sheet and continue with others
                $sheetValues[$sheetTitle] = [];
                continue;
            }
        }

        $apiEndTime = microtime(true);
        debugLog("All sheet data retrieved in API endpoint", [
            'total_sheets' => count($sheets),
            'total_api_time_ms' => round(($apiEndTime - $apiStartTime) * 1000, 2)
        ]);

        // Cache Storage
        $dataToCache = [
            'timestamp' => time(),
            'spreadsheetTitle' => $spreadsheetTitle,
            'sheetTitles' => $sheetTitles,
            'sheetValues' => $sheetValues
        ];

        // Ensure cache directory exists before writing
        if (!is_dir($cacheDir)) {
            debugLog("Creating cache directory in API", ['path' => $cacheDir]);
            mkdir($cacheDir, 0777, true);
        }

        $cacheData = json_encode($dataToCache);
        $cacheWriteResult = file_put_contents($cacheFile, $cacheData);

        debugLog("Cache saved in API", [
            'cache_file' => basename($cacheFile),
            'cache_size_bytes' => $cacheWriteResult
        ]);

        echo json_encode([
            'success' => true,
            'data' => $dataToCache,
            'from_cache' => false
        ]);
    } catch (\Google\Service\Exception $e) {
        $error = handleError('API_002', 'Google Service Exception in API', [
            'code' => $e->getCode(),
            'message' => $e->getMessage(),
            'errors' => $e->getErrors()
        ]);
        echo json_encode($error);
        exit();
    } catch (\Exception $e) {
        $error = handleError('API_003', 'General API Exception in API', [
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ]);
        echo json_encode($error);
        exit();
    }
}
