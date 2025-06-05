<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

// Handle AJAX requests FIRST before any output
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    // Start output buffering to prevent any unwanted output
    ob_start();
    $action = $_POST['action'];

    if ($action === 'fetch_and_save_sheets') {
        // Clean output buffer and set JSON header
        ob_clean();
        header('Content-Type: application/json');

        try {
            // Debug logging function for AJAX
            function debugLogAjax($message, $data = null, $level = 'INFO') {
                $timestamp = date('Y-m-d H:i:s');
                $logEntry = "\n## Auto Import Log - {$timestamp}\n\n";
                $logEntry .= "**Level:** {$level}\n";
                $logEntry .= "**Message:** {$message}\n";
                if ($data !== null) {
                    $logEntry .= "**Data:**\n```json\n" . json_encode($data, JSON_PRETTY_PRINT) . "\n```\n";
                }
                $logEntry .= "---\n";
                file_put_contents(__DIR__ . '/auto_import_debug.log', $logEntry, FILE_APPEND | LOCK_EX);
            }

            debugLogAjax("Using calendar.json file for testing");

            // Use existing calendar.json file for testing
            $calendarJsonFile = __DIR__ . '/calendar.json';

            if (!file_exists($calendarJsonFile)) {
                throw new Exception('calendar.json file not found');
            }

            $calendarData = json_decode(file_get_contents($calendarJsonFile), true);

            if ($calendarData === null) {
                throw new Exception('Invalid JSON in calendar.json file');
            }

            debugLogAjax("Calendar.json loaded successfully", ['data_keys' => array_keys($calendarData)]);

            // Calendar.json already has the Google Sheets format, use it directly
            if (isset($calendarData['sheetTitles']) && isset($calendarData['sheetValues'])) {
                $sheetTitles = $calendarData['sheetTitles'];
                $sheetValues = $calendarData['sheetValues'];
                $spreadsheetTitle = $calendarData['spreadsheetTitle'] ?? 'Calendar Data (Test)';
            } else {
                throw new Exception('Calendar.json does not have expected Google Sheets format');
            }

            // Prepare data structure
            $dataToSave = [
                'timestamp' => time(),
                'spreadsheetTitle' => $spreadsheetTitle,
                'sheetTitles' => $sheetTitles,
                'sheetValues' => $sheetValues
            ];

            debugLogAjax("Calendar data processed successfully", [
                'sheets' => count($sheetTitles),
                'total_rows' => array_sum(array_map('count', $sheetValues))
            ]);

            echo json_encode([
                'success' => true,
                'data' => $dataToSave,
                'file' => 'calendar.json (test mode)'
            ]);

        } catch (Exception $e) {
            debugLogAjax("Error processing calendar.json", ['error' => $e->getMessage()], 'ERROR');
            ob_clean();
            echo json_encode([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }

        exit();
    }

    if ($action === 'process_entry') {
        ob_clean();
        header('Content-Type: application/json');

        $dateStr = $_POST['date_str'] ?? '';
        $patientName = $_POST['patient_name'] ?? '';

        try {
            $db = get_db();

            // Clean patient name
            $cleanedName = cleanPatientName($patientName);

            // Parse date
            $date = parseDate($dateStr);
            if (!$date) {
                throw new Exception('Invalid date format');
            }

            // Check if patient exists
            $patientId = findPatientByName($cleanedName, $db);
            $patientCreated = false;

            if (!$patientId) {
                // Create new patient
                $patientId = createPatient($cleanedName, $db);
                if (!$patientId) {
                    throw new Exception('Failed to create patient');
                }
                $patientCreated = true;
            }

            // Check if surgery already exists
            $surgeryCreated = false;
            if (!surgeryExists($patientId, $date, $db)) {
                // Create surgery
                $surgeryId = createSurgery($patientId, $date, $db);
                if (!$surgeryId) {
                    throw new Exception('Failed to create surgery');
                }
                $surgeryCreated = true;
            }

            echo json_encode([
                'success' => true,
                'patient_created' => $patientCreated,
                'surgery_created' => $surgeryCreated
            ]);

        } catch (Exception $e) {
            ob_clean();
            echo json_encode([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }

        exit();
    }

    exit();
}

// Debug logging function
function debugLog($message, $data = null, $level = 'INFO')
{
    $timestamp = date('Y-m-d H:i:s');
    $logEntry = "\n## Auto Import Log - {$timestamp}\n\n";
    $logEntry .= "**Level:** {$level}\n";
    $logEntry .= "**Message:** {$message}\n";

    if ($data !== null) {
        $logEntry .= "**Data:**\n```json\n" . json_encode($data, JSON_PRETTY_PRINT) . "\n```\n";
    }

    $logEntry .= "---\n";

    // Append to log file
    file_put_contents(__DIR__ . '/auto_import_debug.log', $logEntry, FILE_APPEND | LOCK_EX);

    // Only output HTML comments if not an AJAX request
    if (!isset($_POST['action'])) {
        echo "<!-- DEBUG: " . htmlspecialchars($message) . " -->\n";
    }
}

// Performance tracking
$startTime = microtime(true);

// Authentication Check
if (!is_logged_in()) {
    debugLog("Authentication failed - redirecting to login", null, 'ERROR');
    header('Location: login.php');
    exit();
}

debugLog("Auto import started", ['user_id' => $_SESSION['user_id']]);

$page_title = "Auto Import from Google Sheets";
require_once 'includes/header.php';

// Function to clean patient name (remove "C-" prefix)
function cleanPatientName($name) {
    return preg_replace('/^C\s*-\s*/', '', trim($name));
}

// Function to parse date and add year 2025
function parseDate($dateStr) {
    if (empty($dateStr)) return null;
    
    $fullDateStr = $dateStr . ' 2025';
    $dateObj = new DateTime($fullDateStr);
    return $dateObj->format('Y-m-d');
}

// Function to check if patient exists
function findPatientByName($name, $db) {
    try {
        $stmt = $db->prepare("SELECT id FROM patients WHERE name = ? LIMIT 1");
        $stmt->execute([$name]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['id'] : null;
    } catch (PDOException $e) {
        debugLog("Error finding patient", ['name' => $name, 'error' => $e->getMessage()], 'ERROR');
        return null;
    }
}

// Function to create patient
function createPatient($name, $db) {
    try {
        $stmt = $db->prepare("INSERT INTO patients (name, agency_id, created_at, updated_at) VALUES (?, 3, datetime('now'), datetime('now'))");
        $stmt->execute([$name]);
        return $db->lastInsertId();
    } catch (PDOException $e) {
        debugLog("Error creating patient", ['name' => $name, 'error' => $e->getMessage()], 'ERROR');
        return null;
    }
}

// Function to check if surgery exists for patient on date
function surgeryExists($patientId, $date, $db) {
    try {
        $stmt = $db->prepare("SELECT id FROM surgeries WHERE patient_id = ? AND date = ? LIMIT 1");
        $stmt->execute([$patientId, $date]);
        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    } catch (PDOException $e) {
        debugLog("Error checking surgery existence", ['patient_id' => $patientId, 'date' => $date, 'error' => $e->getMessage()], 'ERROR');
        return false;
    }
}

// Function to create surgery
function createSurgery($patientId, $date, $db) {
    try {
        $stmt = $db->prepare("
            INSERT INTO surgeries (patient_id, date, room_id, status, graft_count, notes, is_recorded, created_at, updated_at)
            VALUES (?, ?, 1, 'booked', 0, 'Auto-imported from Google Sheets', 1, datetime('now'), datetime('now'))
        ");
        $stmt->execute([$patientId, $date]);
        return $db->lastInsertId();
    } catch (PDOException $e) {
        debugLog("Error creating surgery", ['patient_id' => $patientId, 'date' => $date, 'error' => $e->getMessage()], 'ERROR');
        return null;
    }
}

?>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">
                        <i class="fas fa-download me-2"></i>
                        Auto Import from Google Sheets
                    </h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        This will automatically import all valid entries from Google Sheets and create patient records
                        and surgeries with Agency ID 3.
                    </div>

                    <button id="start-import" class="btn btn-primary btn-lg">
                        <i class="fas fa-play me-2"></i>
                        Start Auto Import
                    </button>

                    <div id="import-progress" style="display: none;" class="mt-4">
                        <div class="progress mb-3">
                            <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 0%"></div>
                        </div>
                        <div id="import-status" class="alert alert-info">
                            <i class="fas fa-spinner fa-spin me-2"></i>
                            Initializing import...
                        </div>
                    </div>

                    <div id="import-results" style="display: none;" class="mt-4">
                        <h5>Import Results</h5>
                        <div id="results-content"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const startButton = document.getElementById('start-import');
    const progressDiv = document.getElementById('import-progress');
    const progressBar = document.getElementById('progress-bar');
    const statusDiv = document.getElementById('import-status');
    const resultsDiv = document.getElementById('import-results');
    const resultsContent = document.getElementById('results-content');

    startButton.addEventListener('click', async function() {
        startButton.disabled = true;
        progressDiv.style.display = 'block';
        resultsDiv.style.display = 'none';

        try {
            // Step 1: Fetch Google Sheets data and save as JSON
            updateStatus('Fetching data from Google Sheets...', 10);

            const response = await fetch('auto_import.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=fetch_and_save_sheets'
            });
            const fetchResult = await response.json();

            if (!fetchResult.success) {
                throw new Error('Failed to fetch Google Sheets data: ' + fetchResult.error);
            }

            updateStatus('Processing saved sheet data...', 20);

            const data = fetchResult.data;
            const allEntries = [];

            // Extract all valid entries from all sheets
            if (data.sheetTitles && data.sheetValues) {
                data.sheetTitles.forEach(sheetTitle => {
                    const values = data.sheetValues[sheetTitle] || [];

                    // Skip header row, process data rows
                    for (let i = 1; i < values.length; i++) {
                        const row = values[i];
                        const dateStr = row[0] || '';
                        const patientName = row[2] || '';

                        // Only process if we have both date and patient name, and patient name doesn't include 'Closed'
                        if (dateStr && patientName && !patientName.includes('Closed')) {
                            allEntries.push({
                                dateStr: dateStr,
                                patientName: patientName,
                                sheetTitle: sheetTitle
                            });
                        }
                    }
                });
            }

            updateStatus(`Found ${allEntries.length} valid entries to process...`, 30);

            // Step 2: Process each entry
            const results = {
                processed: 0,
                patientsCreated: 0,
                patientsExisting: 0,
                surgeriesCreated: 0,
                surgeriesSkipped: 0,
                errors: []
            };

            for (let i = 0; i < allEntries.length; i++) {
                const entry = allEntries[i];
                const progress = 30 + (i / allEntries.length) * 60;

                updateStatus(`Processing ${entry.patientName} (${i + 1}/${allEntries.length})...`,
                    progress);

                try {
                    await processEntry(entry, results);
                    results.processed++;
                } catch (error) {
                    results.errors.push({
                        entry: entry,
                        error: error.message
                    });
                }
            }

            updateStatus('Import completed!', 100);
            showResults(results);

        } catch (error) {
            statusDiv.innerHTML =
                `<i class="fas fa-exclamation-triangle me-2"></i>Error: ${error.message}`;
            statusDiv.className = 'alert alert-danger';
        } finally {
            startButton.disabled = false;
        }
    });

    function updateStatus(message, progress) {
        statusDiv.innerHTML = `<i class="fas fa-spinner fa-spin me-2"></i>${message}`;
        progressBar.style.width = progress + '%';
        progressBar.textContent = Math.round(progress) + '%';
    }

    async function processEntry(entry, results) {
        const formData = new FormData();
        formData.append('action', 'process_entry');
        formData.append('date_str', entry.dateStr);
        formData.append('patient_name', entry.patientName);

        const response = await fetch('auto_import.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (result.success) {
            if (result.patient_created) results.patientsCreated++;
            else results.patientsExisting++;

            if (result.surgery_created) results.surgeriesCreated++;
            else results.surgeriesSkipped++;
        } else {
            throw new Error(result.error || 'Unknown error');
        }
    }

    function showResults(results) {
        resultsContent.innerHTML = `
            <div class="row">
                <div class="col-md-6">
                    <div class="card border-success">
                        <div class="card-body text-center">
                            <h5 class="card-title text-success">Patients</h5>
                            <p class="card-text">
                                <strong>${results.patientsCreated}</strong> created<br>
                                <strong>${results.patientsExisting}</strong> existing
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-primary">
                        <div class="card-body text-center">
                            <h5 class="card-title text-primary">Surgeries</h5>
                            <p class="card-text">
                                <strong>${results.surgeriesCreated}</strong> created<br>
                                <strong>${results.surgeriesSkipped}</strong> skipped
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <p><strong>Total Processed:</strong> ${results.processed}</p>
                ${results.errors.length > 0 ? `<p class="text-danger"><strong>Errors:</strong> ${results.errors.length}</p>` : ''}
            </div>
        `;
        resultsDiv.style.display = 'block';
    }
});
</script>



<?php require_once 'includes/footer.php';?>