<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

// Debug logging function
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
    file_put_contents(__DIR__ . '/google_debug.log', $logEntry, FILE_APPEND | LOCK_EX);

    // Also output as HTML comment for debugging
    echo "<!-- DEBUG: " . htmlspecialchars($message) . " -->\n";
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

// Performance tracking
$startTime = microtime(true);
$memoryStart = memory_get_usage();

// Step 1: Authentication Check
debugLog("Starting Google Sheets workflow", [
    'user_id' => $_SESSION['user_id'] ?? 'not_set',
    'timestamp' => date('Y-m-d H:i:s'),
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown'
]);

if (!is_logged_in()) {
    debugLog("Authentication failed - redirecting to login", null, 'ERROR');
    header('Location: login.php');
    exit();
}

debugLog("Authentication successful", ['user_id' => $_SESSION['user_id']]);

$page_title = "Google Sheets";
require_once 'includes/header.php';

?>
<div id="loading-spinner" style="text-align: center; margin-top: 50px;">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <p>wait data is loading from server</p>
</div>
<?php

require __DIR__ . '/../vendor/autoload.php'; // Adjust path if Composer is installed elsewhere

// Function to get a setting value from the database with debugging
function get_setting($key)
{
    try {
        debugLog("Retrieving setting from database", ['key' => $key]);
        $pdo = get_db(); // Get the PDO instance using the helper function
        $stmt = $pdo->prepare("SELECT value FROM settings WHERE key = :key");
        $stmt->bindValue(':key', $key, PDO::PARAM_STR); // Use PDO::PARAM_STR for string binding
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Use PDO fetch method

        $value = $row ? $row['value'] : null;
        debugLog("Setting retrieved", ['key' => $key, 'found' => $row ? 'YES' : 'NO', 'value_length' => $value ? strlen($value) : 0]);
        return $value;
    } catch (Exception $e) {
        debugLog("Error retrieving setting", ['key' => $key, 'error' => $e->getMessage()], 'ERROR');
        return null;
    }
}

// --- Configuration ---
// IMPORTANT: Replace with the path to your service account key file or configure OAuth 2.0
$credentialsPath = './secrets/liv-hsh-patients-18682cec86db.json';
$spreadsheetId = get_setting('spreadsheet_id'); // Get Spreadsheet ID from settings
$cacheDuration = (int)get_setting('cache_duration') ?: 3600; // Default 1 hour
$cellRange = get_setting('cell_range') ?: 'A1:Z'; // Default range

debugLog("Configuration loaded", [
    'credentials_path' => $credentialsPath,
    'spreadsheet_id' => $spreadsheetId ? 'SET' : 'NOT_SET',
    'cache_duration' => $cacheDuration,
    'cell_range' => $cellRange
]);

// Validate required settings
if (!$spreadsheetId) {
    debugLog("Missing spreadsheet ID", null, 'ERROR');
    echo "<div class='alert alert-warning'>Please configure the spreadsheet ID in <a href='settings.php'>Settings</a>.</div>";
    exit();
}

if (!file_exists($credentialsPath)) {
    debugLog("Google API credentials file not found", ['path' => $credentialsPath], 'ERROR');
    echo "<div class='alert alert-danger'>Google API credentials file not found. Please check the credentials path.</div>";
    exit();
}

// --- Caching Logic ---
$cacheDir = __DIR__ . '/../cache/';
$cacheFile = $cacheDir . 'sheet_data_' . md5($spreadsheetId) . '.json'; // Use md5 for a safe filename
$cacheDuration = (int)get_setting('cache_duration'); // Get Cache Duration from settings and cast to int

$cachedData = null;
$usingCache = false;

if (file_exists($cacheFile) && (filemtime($cacheFile) > (time() - $cacheDuration))) {
    // Cache is valid, read from cache
    $cachedContent = file_get_contents($cacheFile);
    $cachedData = json_decode($cachedContent, true);
    if ($cachedData !== null && isset($cachedData['spreadsheetTitle'], $cachedData['sheetTitles'], $cachedData['sheetValues'])) {
        // Use cached data
        $spreadsheetTitle = $cachedData['spreadsheetTitle'];
        $sheetTitles = $cachedData['sheetTitles'];
        $sheetValues = $cachedData['sheetValues'];

        // Create dummy objects to mimic Google API objects for display logic
        $spreadsheet = (object) ['properties' => (object) ['title' => $spreadsheetTitle]];
        $sheets = [];
        foreach ($sheetTitles as $title) {
            $sheets[] = (object) ['properties' => (object) ['title' => $title]];
        }

        $usingCache = true;
    } else {
        // Cache file is corrupted or empty, delete it
        @unlink($cacheFile); // Use @ to suppress errors if file doesn't exist
    }
}

if (!$usingCache) {
    // Step 4: Data Fetching from Google Sheets API
    debugLog("Cache not available, fetching from Google Sheets API");
    $apiStartTime = microtime(true);

    try {
        debugLog("Initializing Google Client");
        $client = new \Google\Client();
        $client->setApplicationName('Google Sheets PHP Fetcher');
        $client->setScopes([\Google\Service\Sheets::SPREADSHEETS_READONLY]);
        $client->setAuthConfig($credentialsPath); // Use setAuthConfig for service account or OAuth 2.0

        $service = new \Google\Service\Sheets($client);
        debugLog("Google Client initialized successfully");

        // --- Fetch Spreadsheet Metadata to get Sheet Titles ---
        debugLog("Fetching spreadsheet metadata", ['spreadsheet_id' => $spreadsheetId]);
        $spreadsheet = $service->spreadsheets->get($spreadsheetId);
        $sheets = $spreadsheet->getSheets();

        $spreadsheetTitle = $spreadsheet->getProperties()->getTitle();
        debugLog("Spreadsheet metadata retrieved", [
            'title' => $spreadsheetTitle,
            'sheet_count' => count($sheets)
        ]);

        // Step 5: Data Processing
        debugLog("Starting data processing for each sheet");
        $sheetValues = [];
        $totalRows = 0;

        foreach ($sheets as $index => $sheet) {
            $sheetTitle = $sheet->getProperties()->getTitle();

            // Validate and sanitize sheet title
            if (empty($sheetTitle)) {
                debugLog("Empty sheet title found, skipping", ['sheet_index' => $index], 'WARNING');
                continue;
            }

            // Construct the range properly
            $escapedSheetTitle = str_replace("'", "''", $sheetTitle); // Escape single quotes in sheet name
            $range = "'" . $escapedSheetTitle . "'!" . $cellRange; // Properly format the range

            debugLog("Fetching data for sheet", [
                'sheet_index' => $index,
                'sheet_title' => $sheetTitle,
                'escaped_title' => $escapedSheetTitle,
                'cell_range' => $cellRange,
                'final_range' => $range
            ]);

            try {
                $sheetStartTime = microtime(true);
                $response = $service->spreadsheets_values->get($spreadsheetId, $range);
                $values = $response->getValues() ?? [];
                $sheetValues[$sheetTitle] = $values;
                $sheetEndTime = microtime(true);

                $rowCount = count($values);
                $totalRows += $rowCount;

                debugLog("Sheet data retrieved successfully", [
                    'sheet_title' => $sheetTitle,
                    'row_count' => $rowCount,
                    'fetch_time_ms' => round(($sheetEndTime - $sheetStartTime) * 1000, 2)
                ]);
            } catch (\Google\Service\Exception $e) {
                debugLog("Error fetching data for sheet", [
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
        debugLog("All sheet data retrieved", [
            'total_sheets' => count($sheets),
            'total_rows' => $totalRows,
            'total_api_time_ms' => round(($apiEndTime - $apiStartTime) * 1000, 2)
        ]);

        // Step 6: Cache Storage
        debugLog("Saving data to cache");
        $dataToCache = [
            'timestamp' => time(),
            'spreadsheetTitle' => $spreadsheetTitle,
            'sheetTitles' => array_map(function ($s) {
                return $s->getProperties()->getTitle();
            }, $sheets),
            'sheetValues' => $sheetValues
        ];

        // Ensure cache directory exists before writing
        if (!is_dir($cacheDir)) {
            debugLog("Creating cache directory", ['path' => $cacheDir]);
            mkdir($cacheDir, 0777, true);
        }

        $cacheData = json_encode($dataToCache);
        $cacheWriteResult = file_put_contents($cacheFile, $cacheData);

        debugLog("Cache saved", [
            'cache_file' => basename($cacheFile),
            'cache_size_bytes' => $cacheWriteResult,
            'cache_size_kb' => round($cacheWriteResult / 1024, 2)
        ]);
    } catch (\Google\Service\Exception $e) {
        $error = handleError('API_002', 'Google Service Exception', [
            'code' => $e->getCode(),
            'message' => $e->getMessage(),
            'errors' => $e->getErrors()
        ]);

        echo "<div class='alert alert-danger'>";
        echo "<h4>Google Service Error:</h4>";
        echo "<p>Code: " . htmlspecialchars($e->getCode()) . "</p>";
        echo "<p>Message: " . htmlspecialchars($e->getMessage()) . "</p>";
        echo "</div>";
        exit();
    } catch (\Exception $e) {
        $error = handleError('API_003', 'General API Exception', [
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ]);

        echo "<div class='alert alert-danger'>";
        echo "<h4>General Error:</h4>";
        echo "<p>Message: " . htmlspecialchars($e->getMessage()) . "</p>";
        echo "</div>";
        exit();
    }
}

// Step 7: Display Rendering
debugLog("Starting display rendering", [
    'using_cache' => $usingCache,
    'sheet_count' => count($sheets ?? [])
]);

// Performance metrics
$endTime = microtime(true);
$memoryEnd = memory_get_usage();
$totalTime = round(($endTime - $startTime) * 1000, 2);
$memoryUsed = round(($memoryEnd - $memoryStart) / 1024 / 1024, 2);

debugLog("Performance metrics", [
    'total_execution_time_ms' => $totalTime,
    'memory_used_mb' => $memoryUsed,
    'peak_memory_mb' => round(memory_get_peak_usage() / 1024 / 1024, 2)
]);

?>
<div id="main-content" style="display: none;">
    <?php
    $displayTitle = $usingCache ? $spreadsheet->properties->title : $spreadsheet->getProperties()->getTitle();
    echo "    <h2>Data from Google Sheet: " . htmlspecialchars($displayTitle) . "</h2>";
    if ($usingCache) {
        echo "<p><em>(Last Updated at " . date('Y-m-d H:i:s', $cachedData['timestamp']) . ")</em></p>";
    }

    if (empty($sheets)) {
        debugLog("No sheets found in spreadsheet", null, 'WARNING');
        echo "<p>No sheets found in the spreadsheet.</p>";
    } else {
        debugLog("Rendering sheet tabs and content", ['sheet_count' => count($sheets)]);
        // Generate Tab Navigation
        echo "<ul class='nav nav-tabs' id='sheetTabs' role='tablist'>";
        $firstSheet = true;
        foreach ($sheets as $index => $sheet) {
            $sheetTitle = htmlspecialchars($usingCache ? $sheet->properties->title : $sheet->getProperties()->getTitle());
            $tabId = 'sheet-' . $index; // Unique ID for each tab
            $activeClass = $firstSheet ? 'active' : '';
            $ariaSelected = $firstSheet ? 'true' : 'false';

            echo "<li class='nav-item' role='presentation'>";
            echo "    <button class='nav-link " . $activeClass . "' id='" . $tabId . "-tab' data-bs-toggle='tab' data-bs-target='#" . $tabId . "' type='button' role='tab' aria-controls='" . $tabId . "' aria-selected='" . $ariaSelected . "'>" . $sheetTitle . "</button>";
            echo "</li>";

            $firstSheet = false;
        }
        echo "</ul>";

        // Generate Tab Content
        echo "<div class='tab-content' id='sheetTabsContent'>";
        $firstSheet = true;
        foreach ($sheets as $index => $sheet) {
            $sheetTitle = $usingCache ? $sheet->properties->title : $sheet->getProperties()->getTitle();
            $tabId = 'sheet-' . $index; // Unique ID for each tab
            $activeClass = $firstSheet ? 'show active' : '';

            echo "<div class='tab-pane fade " . $activeClass . "' id='" . $tabId . "' role='tabpanel' aria-labelledby='" . $tabId . "-tab'>";

            // Use values from $sheetValues array
            $values = $sheetValues[$sheetTitle] ?? []; // Use null coalescing to handle potential missing sheet title

            if (empty($values)) {
                echo "<p class='mt-3'>No data found in this sheet.</p>";
            } else {
                echo "<table class='table spreadsheetid,  mt-3'>";
                echo "    <thead>";
                echo "        <tr>";
                // Assuming the first row is headers
                foreach ($values[0] as $header) {
                    echo "            <th>" . htmlspecialchars($header) . "</th>";
                }
                echo "            <th>Actions</th>"; // Add new header for actions
                echo "        </tr>";
                echo "    </thead>";
                echo "    <tbody>";
                // Step 8: Patient/Surgery Lookup and Button State Management
                debugLog("Starting patient/surgery lookup for sheet", [
                    'sheet_title' => $sheetTitle,
                    'data_rows' => count($values) - 1 // Exclude header row
                ]);

                // Get database connection
                $pdo = get_db();
                $patientLookups = 0;
                $surgeryLookups = 0;
                $recordedCount = 0;
                $buttonCount = 0;

                for ($i = 1; $i < count($values); $i++) {
                    echo "        <tr>";
                    foreach ($values[$i] as $cell) {
                        echo "            <td>" . htmlspecialchars($cell) . "</td>";
                    }
                    // Add a cell for actions
                    echo "            <td>";

                    // Assuming the first column is date (Day Month) and third is patient name
                    $date_str = $values[$i][0] ?? ''; // Get date string from first column
                    $patient_name = $values[$i][2] ?? ''; // Get patient name from third column
                    $full_date_str = $date_str . ' 2025'; // Append the year 2025

                    // Parse the date string and reformat to yyyy-mm-dd
                    $date_obj = DateTime::createFromFormat('j F Y', $full_date_str);
                    $formatted_date = $date_obj ? $date_obj->format('Y-m-d') : $full_date_str;

                    if (!$date_obj) {
                        debugLog("Date parsing failed", [
                            'row' => $i,
                            'original_date' => $date_str,
                            'full_date_string' => $full_date_str
                        ], 'WARNING');
                    }

                    $is_recorded = false;
                    $patient_id = null;

                    // Check if patient and surgery record already exist
                    if (!empty($patient_name)) {
                        // Remove "C", "-", and any surrounding spaces prefix for database lookup if it exists
                        $lookup_patient_name = $patient_name;
                        $lookup_patient_name = preg_replace('/^C\s*-\s*/', '', $lookup_patient_name);
                        $lookup_patient_name = trim($lookup_patient_name);

                        // debugLog("Processing patient lookup", [
                        //     'row' => $i,
                        //     'original_name' => $patient_name,
                        //     'lookup_name' => $lookup_patient_name,
                        //     'date' => $formatted_date
                        // ]);

                        try {
                            // Find patient by name
                            $stmt_patient = $pdo->prepare("SELECT id FROM patients WHERE name = ?");
                            $stmt_patient->execute([$lookup_patient_name]);
                            $patient = $stmt_patient->fetch(PDO::FETCH_ASSOC);
                            $patientLookups++;

                            if ($patient) {
                                $patient_id = $patient['id'];
                                // debugLog("Patient found", [
                                //     'patient_id' => $patient_id,
                                //     'lookup_name' => $lookup_patient_name
                                // ]);

                                // Find surgery by patient_id and date
                                $stmt_surgery = $pdo->prepare("SELECT is_recorded FROM surgeries WHERE patient_id = ? AND date = ?");
                                $stmt_surgery->execute([$patient_id, $formatted_date]);
                                $surgery = $stmt_surgery->fetch(PDO::FETCH_ASSOC);
                                $surgeryLookups++;

                                if ($surgery && $surgery['is_recorded']) {
                                    $is_recorded = true;
                                    $recordedCount++;
                                    // debugLog("Surgery record found and marked as recorded", [
                                    //     'patient_id' => $patient_id,
                                    //     'date' => $formatted_date
                                    // ]);
                                }
                            } else {
                                // debugLog("Patient not found", ['lookup_name' => $lookup_patient_name]);
                            }
                        } catch (Exception $e) {
                            debugLog("Database error during patient/surgery lookup", [
                                'error' => $e->getMessage(),
                                'patient_name' => $lookup_patient_name
                            ], 'ERROR');
                        }
                    }

                    // Only show the button if the patient name is not empty and does not include 'Closed'
                    if (!empty($values[$i][2]) && !str_contains($values[$i][2], 'Closed')) {
                        $button_text = $is_recorded ? 'Recorded' : 'Create Records';
                        $button_class = $is_recorded ? 'btn-success' : 'btn-primary';
                        $disabled_attr = $is_recorded ? 'disabled' : '';
                        $buttonCount++;

                        echo "                <button class='btn btn-sm create-record-btn " . $button_class . "' data-date='" . htmlspecialchars($formatted_date) . "' data-patient-name='" . htmlspecialchars($patient_name) . "' data-recorded='" . ($is_recorded ? 'true' : 'false') . "' " . $disabled_attr . ">";
                        echo "                    " . htmlspecialchars($button_text);
                        echo "                </button>";
                    }
                    echo "            </td>";
                    echo "        </tr>";
                }

                debugLog("Patient/surgery lookup completed for sheet", [
                    'sheet_title' => $sheetTitle,
                    'patient_lookups' => $patientLookups,
                    'surgery_lookups' => $surgeryLookups,
                    'recorded_count' => $recordedCount,
                    'buttons_created' => $buttonCount
                ]);
                echo "    </tbody>";
                echo "</table>";
            }

            echo "</div>"; // Close tab-pane

            $firstSheet = false;
        }
        echo "</div>"; // Close tab-content
    }

    debugLog("Display rendering completed successfully");
    ?>
</div>

<script>
    // Step 9: Client-side initialization and loading management
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Google Sheets page loaded');

        // Hide loading spinner and show main content
        const loadingSpinner = document.getElementById('loading-spinner');
        const mainContent = document.getElementById('main-content');

        if (loadingSpinner) {
            loadingSpinner.style.display = 'none';
        }

        if (mainContent) {
            mainContent.style.display = 'block';
        }

        console.log('Content display toggled');
    });
</script>

<?php
// Final performance and completion logging
$finalTime = microtime(true);
$finalMemory = memory_get_usage();
$totalExecutionTime = round(($finalTime - $startTime) * 1000, 2);
$finalMemoryUsage = round($finalMemory / 1024 / 1024, 2);

debugLog("Workflow completed successfully", [
    'total_execution_time_ms' => $totalExecutionTime,
    'final_memory_usage_mb' => $finalMemoryUsage,
    'peak_memory_usage_mb' => round(memory_get_peak_usage() / 1024 / 1024, 2),
    'cache_used' => $usingCache,
    'sheets_processed' => count($sheets ?? [])
]);

// Include the transfer JavaScript file for button functionality
echo '<script src="assets/js/transfer.js"></script>';
require_once 'includes/footer.php'; // Include the footer