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

            debugLogAjax("Starting Google Sheets fetch from API");

            // Load Google Sheets API
            require __DIR__ . '/../vendor/autoload.php';

            // Get settings from database (same as google_sheets.php)
            function get_setting($key) {
                try {
                    $pdo = get_db();
                    $stmt = $pdo->prepare("SELECT value FROM settings WHERE key = :key");
                    $stmt->bindValue(':key', $key, PDO::PARAM_STR);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $row ? $row['value'] : null;
                } catch (Exception $e) {
                    debugLogAjax("Error retrieving setting", ['key' => $key, 'error' => $e->getMessage()], 'ERROR');
                    return null;
                }
            }

            // Configuration (same as google_sheets.php)
            $credentialsPath = __DIR__ . '/secrets/liv-hsh-patients-18682cec86db.json';
            $spreadsheetId = get_setting('spreadsheet_id');
            $cacheDuration = (int)get_setting('cache_duration') ?: 3600;
            $cellRange = get_setting('cell_range') ?: 'A1:Z';

            // Validate required settings
            if (!$spreadsheetId) {
                throw new Exception('Spreadsheet ID not configured');
            }

            if (!file_exists($credentialsPath)) {
                throw new Exception('Google API credentials file not found');
            }

            // Cache setup
            $cacheDir = __DIR__ . '/../cache/';
            $cacheFile = $cacheDir . 'auto_import_' . md5($spreadsheetId) . '.json';

            // Ensure cache directory exists
            if (!is_dir($cacheDir)) {
                debugLogAjax("Creating cache directory", ['path' => $cacheDir]);
                mkdir($cacheDir, 0755, true);
            }

            // Check if cache is valid
            $cachedData = null;
            $usingCache = false;

            if (file_exists($cacheFile) && (filemtime($cacheFile) > (time() - $cacheDuration))) {
                // Cache is valid, read from cache
                $cachedContent = file_get_contents($cacheFile);
                $cachedData = json_decode($cachedContent, true);
                if ($cachedData !== null && isset($cachedData['spreadsheetTitle'], $cachedData['sheetTitles'], $cachedData['sheetValues'])) {
                    // Use cached data
                    $usingCache = true;
                    debugLogAjax("Using cached data", ['cache_age' => time() - filemtime($cacheFile)]);
                    echo json_encode([
                        'success' => true,
                        'data' => $cachedData,
                        'file' => basename($cacheFile),
                        'from_cache' => true
                    ]);
                    exit();
                } else {
                    // Cache file is corrupted, delete it
                    debugLogAjax("Corrupted cache file found, deleting", ['cache_file' => basename($cacheFile)], 'WARNING');
                    @unlink($cacheFile);
                }
            }

            debugLogAjax("Cache not available, fetching from Google Sheets API");

            // Initialize Google Sheets API
            $client = new \Google\Client();
            $client->setApplicationName('Auto Import Google Sheets');
            $client->setScopes([\Google\Service\Sheets::SPREADSHEETS_READONLY]);
            $client->setAuthConfig($credentialsPath);

            $service = new \Google\Service\Sheets($client);

            // Fetch spreadsheet metadata
            $spreadsheet = $service->spreadsheets->get($spreadsheetId);
            $sheets = $spreadsheet->getSheets();
            $spreadsheetTitle = $spreadsheet->getProperties()->getTitle();

            // Fetch data from all sheets
            $sheetValues = [];
            $sheetTitles = [];

            foreach ($sheets as $sheet) {
                $sheetTitle = $sheet->getProperties()->getTitle();
                if (empty($sheetTitle)) continue;

                $sheetTitles[] = $sheetTitle;
                $escapedSheetTitle = str_replace("'", "''", $sheetTitle);
                $range = "'" . $escapedSheetTitle . "'!" . $cellRange;

                try {
                    $response = $service->spreadsheets_values->get($spreadsheetId, $range);
                    $values = $response->getValues() ?? [];
                    $sheetValues[$sheetTitle] = $values;
                    debugLogAjax("Fetched sheet data", ['sheet' => $sheetTitle, 'rows' => count($values)]);
                } catch (\Google\Service\Exception $e) {
                    debugLogAjax("Error fetching sheet data", ['sheet' => $sheetTitle, 'error' => $e->getMessage()], 'ERROR');
                    $sheetValues[$sheetTitle] = [];
                }
            }

            // Prepare data structure
            $dataToSave = [
                'timestamp' => time(),
                'spreadsheetTitle' => $spreadsheetTitle,
                'sheetTitles' => $sheetTitles,
                'sheetValues' => $sheetValues
            ];

            // Save to cache
            $cacheData = json_encode($dataToSave, JSON_PRETTY_PRINT);
            $cacheWriteResult = file_put_contents($cacheFile, $cacheData);

            if ($cacheWriteResult === false) {
                throw new Exception('Failed to save data to cache file');
            }

            debugLogAjax("Google Sheets data saved to cache", [
                'file' => basename($cacheFile),
                'size' => $cacheWriteResult,
                'sheets' => count($sheetTitles)
            ]);

            echo json_encode([
                'success' => true,
                'data' => $dataToSave,
                'file' => basename($cacheFile),
                'from_cache' => false
            ]);

        } catch (Exception $e) {
            debugLogAjax("Error fetching Google Sheets data", ['error' => $e->getMessage()], 'ERROR');
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
        $entryType = $_POST['entry_type'] ?? 'surgery';
        $originalEntry = $_POST['original_entry'] ?? '';

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

            $recordCreated = false;
            $recordType = '';

            if ($entryType === 'surgery') {
                // Check if surgery already exists
                if (!surgeryExists($patientId, $date, $db)) {
                    // Create surgery
                    $surgeryId = createSurgery($patientId, $date, $db);
                    if (!$surgeryId) {
                        throw new Exception('Failed to create surgery');
                    }
                    $recordCreated = true;
                    $recordType = 'surgery';
                }
            } else {
                // Handle consultations - create appointment record
                if (!appointmentExists($patientId, $date, $db)) {
                    $appointmentId = createAppointment($patientId, $date, $entryType, $db, $originalEntry);
                    if (!$appointmentId) {
                        throw new Exception('Failed to create appointment');
                    }
                    $recordCreated = true;
                    $recordType = 'appointment';
                }
            }

            echo json_encode([
                'success' => true,
                'patient_created' => $patientCreated,
                'record_created' => $recordCreated,
                'record_type' => $recordType,
                'entry_type' => $entryType
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

// Function to clean patient name (remove "C-", "V2V", "F2F", "VIDEO" prefixes)
function cleanPatientName($name) {
    // Remove C-, V2V, F2F, VIDEO prefixes and any phone numbers
    $cleaned = preg_replace('/^(C|V2V|F2F|VIDEO)\s*-\s*/', '', trim($name));
    // Remove phone numbers (+ followed by digits, spaces, dashes)
    $cleaned = preg_replace('/\s*-?\s*\+?\d+[\d\s\-]*$/', '', $cleaned);
    return trim($cleaned);
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
        $stmt = $db->prepare("INSERT INTO patients (name, agency_id, created_at, updated_at) VALUES (?, 2, datetime('now'), datetime('now'))");
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
            VALUES (?, ?, 1, 'sheduled', 0, 'Auto-imported from Google Sheets', 1, datetime('now'), datetime('now'))
        ");
        $stmt->execute([$patientId, $date]);
        return $db->lastInsertId();
    } catch (PDOException $e) {
        debugLog("Error creating surgery", ['patient_id' => $patientId, 'date' => $date, 'error' => $e->getMessage()], 'ERROR');
        return null;
    }
}

// Function to check if appointment exists for patient on date
function appointmentExists($patientId, $date, $db) {
    try {
        $stmt = $db->prepare("SELECT id FROM appointments WHERE patient_id = ? AND appointment_date = ? LIMIT 1");
        $stmt->execute([$patientId, $date]);
        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    } catch (PDOException $e) {
        debugLog("Error checking appointment existence", ['patient_id' => $patientId, 'date' => $date, 'error' => $e->getMessage()], 'ERROR');
        return false;
    }
}

// Function to create appointment
function createAppointment($patientId, $date, $type, $db, $originalEntry = '') {
    try {
        $notes = 'Auto-imported from Google Sheets - ' . $type;

        // Extract time from original entry (e.g., "2pm", "14:00", "9:30am")
        $startTime = '09:00'; // Default fallback
        if (preg_match('/(\d{1,2}):?(\d{0,2})\s*(am|pm)/i', $originalEntry, $matches)) {
            $hour = intval($matches[1]);
            $minute = isset($matches[2]) && $matches[2] !== '' ? intval($matches[2]) : 0;
            $ampm = strtolower($matches[3]);

            // Convert to 24-hour format
            if ($ampm === 'pm' && $hour !== 12) {
                $hour += 12;
            } elseif ($ampm === 'am' && $hour === 12) {
                $hour = 0;
            }

            $startTime = sprintf('%02d:%02d', $hour, $minute);
        } elseif (preg_match('/(\d{1,2}):(\d{2})/', $originalEntry, $matches)) {
            // 24-hour format like "14:30"
            $startTime = sprintf('%02d:%02d', intval($matches[1]), intval($matches[2]));
        }

        // Calculate end time (30 minutes later)
        $startDateTime = new DateTime($date . ' ' . $startTime);
        $endDateTime = clone $startDateTime;
        $endDateTime->add(new DateInterval('PT30M'));
        $endTime = $endDateTime->format('H:i');

        $roomId = 4; // Default room

        $stmt = $db->prepare("
            INSERT INTO appointments (room_id, patient_id, appointment_date, start_time, end_time, notes, created_at, updated_at)
            VALUES (?, ?, ?, ?, ?, ?, datetime('now'), datetime('now'))
        ");
        $stmt->execute([$roomId, $patientId, $date, $startTime, $endTime, $notes]);
        return $db->lastInsertId();
    } catch (PDOException $e) {
        debugLog("Error creating appointment", ['patient_id' => $patientId, 'date' => $date, 'type' => $type, 'error' => $e->getMessage()], 'ERROR');
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
                        This will fetch data from Google Sheets API, save to cache, and automatically import all valid
                        entries to create patient records and surgeries with Agency ID 2 and Room ID 1.
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
            // Step 1: Fetch Google Sheets data via API and save to cache
            updateStatus('Fetching data from Google Sheets API...', 10);

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

            const cacheStatus = fetchResult.from_cache ? ' (from cache)' : ' (fresh from API)';
            updateStatus('Processing sheet data' + cacheStatus + '...', 20);

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

                        // Check surgery column (column 2 - Room 3A)
                        const surgeryPatientName = row[2] || '';
                        if (dateStr && surgeryPatientName && !surgeryPatientName.includes(
                                'Closed')) {
                            allEntries.push({
                                dateStr: dateStr,
                                patientName: surgeryPatientName,
                                type: 'surgery',
                                sheetTitle: sheetTitle
                            });
                        }

                        // Check consultation column (column 7 - Consultation F2F/V2V)
                        const consultationEntry = row[7] || '';
                        if (dateStr && consultationEntry && !consultationEntry.includes(
                                'Closed')) {
                            let consultationPatientName = '';
                            let consultationType = 'consultation';

                            // Parse F2F consultations: "F2F - Client Name"
                            if (consultationEntry.includes('F2F')) {
                                consultationPatientName = consultationEntry.replace(
                                    /^.*F2F\s*-\s*/, '').trim();
                                consultationType = 'consultation_f2f';
                            }
                            // Parse V2V consultations: "V2V - Client Name and mobile number" or "VIDEO - Client Name"
                            else if (consultationEntry.includes('V2V') || consultationEntry
                                .includes('VIDEO')) {
                                consultationPatientName = consultationEntry
                                    .replace(/^.*(?:V2V|VIDEO)\s*-\s*/, '')
                                    .replace(/\s*-\s*\+?\d+.*$/, '') // Remove phone numbers
                                    .trim();
                                consultationType = 'consultation_v2v';
                            }

                            // Only add if we extracted a valid patient name
                            if (consultationPatientName && consultationPatientName.length >
                                2) {
                                allEntries.push({
                                    dateStr: dateStr,
                                    patientName: consultationPatientName,
                                    type: consultationType,
                                    originalEntry: consultationEntry,
                                    sheetTitle: sheetTitle
                                });
                            }
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
                appointmentsCreated: 0,
                appointmentsSkipped: 0,
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
        formData.append('entry_type', entry.type);
        formData.append('original_entry', entry.originalEntry || '');

        const response = await fetch('auto_import.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (result.success) {
            if (result.patient_created) results.patientsCreated++;
            else results.patientsExisting++;

            if (result.record_created) {
                if (result.record_type === 'surgery') {
                    results.surgeriesCreated++;
                } else if (result.record_type === 'appointment') {
                    results.appointmentsCreated = (results.appointmentsCreated || 0) + 1;
                }
            } else {
                if (result.entry_type === 'surgery') {
                    results.surgeriesSkipped++;
                } else {
                    results.appointmentsSkipped = (results.appointmentsSkipped || 0) + 1;
                }
            }
        } else {
            throw new Error(result.error || 'Unknown error');
        }
    }

    function showResults(results) {
        resultsContent.innerHTML = `
            <div class="row">
                <div class="col-md-4">
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
                <div class="col-md-4">
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
                <div class="col-md-4">
                    <div class="card border-info">
                        <div class="card-body text-center">
                            <h5 class="card-title text-info">Appointments</h5>
                            <p class="card-text">
                                <strong>${results.appointmentsCreated || 0}</strong> created<br>
                                <strong>${results.appointmentsSkipped || 0}</strong> skipped
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