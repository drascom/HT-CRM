<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

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

// Function to get a setting value from the database
function get_setting($key)
{
    $pdo = get_db(); // Get the PDO instance using the helper function
    $stmt = $pdo->prepare("SELECT value FROM settings WHERE key = :key");
    $stmt->bindValue(':key', $key, PDO::PARAM_STR); // Use PDO::PARAM_STR for string binding
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC); // Use PDO fetch method
    return $row ? $row['value'] : null;
}

// --- Configuration ---
// IMPORTANT: Replace with the path to your service account key file or configure OAuth 2.0
$credentialsPath = './secrets/sanctuary.json';
$spreadsheetId = get_setting('spreadsheet_id'); // Get Spreadsheet ID from settings
// No specific range needed, fetching all sheets

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
    // No valid cache, fetch data from Google Sheets
    try {
        $client = new \Google\Client();
        $client->setApplicationName('Google Sheets PHP Fetcher');
        $client->setScopes([\Google\Service\Sheets::SPREADSHEETS_READONLY]);
        $client->setAuthConfig($credentialsPath); // Use setAuthConfig for service account or OAuth 2.0

        $service = new \Google\Service\Sheets($client);

        // --- Fetch Spreadsheet Metadata to get Sheet Titles ---
        $spreadsheet = $service->spreadsheets->get($spreadsheetId);
        $sheets = $spreadsheet->getSheets();

        $sheetValues = [];
        foreach ($sheets as $sheet) {
            $sheetTitle = $sheet->getProperties()->getTitle();
            $cellRange = get_setting('cell_range') ?? 'A1:Z'; // Get Cell Range from settings, default to A1:Z if not set
            $range = "'" . str_replace("'", "''", $sheetTitle) . "'!" . $cellRange; // Escape single quotes in sheet name and append range
            $response = $service->spreadsheets_values->get($spreadsheetId, $range);
            $sheetValues[$sheetTitle] = $response->getValues();
        }

        // Save data to cache
        $dataToCache = [
            'timestamp' => time(),
            'spreadsheetTitle' => $spreadsheet->getProperties()->getTitle(), // Store just the title
            'sheetTitles' => array_map(function ($s) {
                return $s->getProperties()->getTitle();
            }, $sheets), // Store an array of sheet titles
            'sheetValues' => $sheetValues
        ];
        // Ensure cache directory exists before writing
        if (!is_dir($cacheDir)) {
            mkdir($cacheDir, 0777, true);
        }
        file_put_contents($cacheFile, json_encode($dataToCache));
    } catch (\Google\Service\Exception $e) {
        echo "<div class='alert alert-danger'>";
        echo "<h4>Google Service Error:</h4>";
        echo "<p>Code: " . htmlspecialchars($e->getCode()) . "</p>";
        echo "<p>Message: " . htmlspecialchars($e->getMessage()) . "</p>";
        // In a production environment, you might log the full error instead of displaying it
        echo "</div>";
        // Exit or handle the error appropriately if fetching fails
        exit();
    } catch (\Exception $e) {
        echo "<div class='alert alert-danger'>";
        echo "<h4>General Error:</h4>";
        echo "<p>Message: " . htmlspecialchars($e->getMessage()) . "</p>";
        echo "</div>";
        // Exit or handle the error appropriately if fetching fails
        exit();
    }
}

// --- Display Data ---
?>
<div id="main-content" style="display: none;">
    <?php
    echo "    <h2>Data from Google Sheet: " . htmlspecialchars($usingCache ? $spreadsheet->properties->title : $spreadsheet->getProperties()->getTitle()) . "</h2>";
    if ($usingCache) {
        echo "<p><em>(Last Updated at " . date('Y-m-d H:i:s', $cachedData['timestamp']) . ")</em></p>";
    }

    if (empty($sheets)) {
        echo "<p>No sheets found in the spreadsheet.</p>";
    } else {
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
                // Start from the second row to skip headers
                // Get database connection
                $pdo = get_db();

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
                    // Parse the date string and reformat to dd/mm/yyyy
                    $date_obj = DateTime::createFromFormat('j F Y', $full_date_str);
                    $formatted_date = $date_obj ? $date_obj->format('Y-m-d') : $full_date_str; // Use original string if parsing fails, format to yyyy-mm-dd

                    $is_recorded = false;
                    $patient_id = null;

                    // Check if patient and surgery record already exist
                    if (!empty($patient_name)) {
                        // Remove "C", "-", and any surrounding spaces prefix for database lookup if it exists
                        $lookup_patient_name = $patient_name;
                        // Use regex to remove "C", optional spaces, "-", optional spaces at the beginning
                        $lookup_patient_name = preg_replace('/^C\s*-\s*/', '', $lookup_patient_name);
                        $lookup_patient_name = trim($lookup_patient_name); // Trim any remaining whitespace

                        // Find patient by name
                        $stmt_patient = $pdo->prepare("SELECT id FROM patients WHERE name = ?");
                        $stmt_patient->execute([$lookup_patient_name]);
                        $patient = $stmt_patient->fetch(PDO::FETCH_ASSOC);

                        if ($patient) {
                            $patient_id = $patient['id'];
                            // Find surgery by patient_id and date
                            $stmt_surgery = $pdo->prepare("SELECT is_recorded FROM surgeries WHERE patient_id = ? AND date = ?");
                            $stmt_surgery->execute([$patient_id, $formatted_date]); // Use formatted_date
                            $surgery = $stmt_surgery->fetch(PDO::FETCH_ASSOC);

                            if ($surgery && $surgery['is_recorded']) {
                                $is_recorded = true;
                            }
                        }
                    }

                    // Log lookup_patient_name to console for debugging
                    // echo "<script>console.log('Lookup Patient Name: " . print_r($patient) . "');</script>";

                    // Only show the button if the patient name is not empty and does not include 'Closed'
                    // Also pass the recorded status to the button
                    if (!empty($values[$i][2]) && !str_contains($values[$i][2], 'Closed')) {
                        $button_text = $is_recorded ? 'Recorded' : 'Create Records';
                        $button_class = $is_recorded ? 'btn-success' : 'btn-primary';
                        $disabled_attr = $is_recorded ? 'disabled' : '';

                        echo "                <button class='btn btn-sm create-record-btn " . $button_class . "' data-date='" . htmlspecialchars($formatted_date) . "' data-patient-name='" . htmlspecialchars($patient_name) . "' data-recorded='" . ($is_recorded ? 'true' : 'false') . "' " . $disabled_attr . ">"; // Use formatted_date
                        echo "                    " . htmlspecialchars($button_text);
                        echo "                </button>";
                    }
                    echo "            </td>";
                    echo "        </tr>";
                }
                echo "    </tbody>";
                echo "</table>";
            }

            echo "</div>"; // Close tab-pane

            $firstSheet = false;
        }
        echo "</div>"; // Close tab-content
    }
    ?>
</div>
<?php
// Include the new JavaScript file
echo '<script src="assets/js/transfer.js"></script>';
require_once 'includes/footer.php'; // Include the footer