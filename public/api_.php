<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

header('Content-Type: application/json');

// Add request logging
$timestamp = date('Y-m-d H:i:s');
$request_method = $_SERVER['REQUEST_METHOD'];
$request_uri = $_SERVER['REQUEST_URI'];
$request_body = '';
if ($request_method === 'POST' || $request_method === 'PUT') {
    $request_body = file_get_contents('php://input');
}

$log_entry = "## Request Log - {$timestamp}\n\n";
$log_entry .= "**Method:** {$request_method}\n";
$log_entry .= "**URL:** {$request_uri}\n";
if (!empty($request_body)) {
    $log_entry .= "**Body:** " . htmlspecialchars($request_body) . "\n";
}
$log_entry .= "\n"; // Add a blank line for separation

file_put_contents('log.md', $log_entry, FILE_APPEND | LOCK_EX);

// Ensure user is logged in for all API operations
if (!is_logged_in()) {
    http_response_code(401);
    $response = ['error' => 'Unauthorized']; // Update response for logging
    // Log the unauthorized response before exiting
    $timestamp = date('Y-m-d H:i:s');
    $response_status = 'Error';
    $response_details = json_encode($response, JSON_PRETTY_PRINT);
    $log_entry = "## Response Log - {$timestamp}\n\n";
    $log_entry .= "**Status:** {$response_status}\n";
    $log_entry .= "**Details:**\n```json\n{$response_details}\n```\n";
    $log_entry .= "---\n\n"; // Separator for next log entry
    file_put_contents('log.md', $log_entry, FILE_APPEND | LOCK_EX);
    echo json_encode($response);
    exit();
}

$db = get_db(); // Get database connection

$entity = $_GET['entity'] ?? $_POST['entity'] ?? null;
$action = $_GET['action'] ?? $_POST['action'] ?? null;
$method = $_SERVER['REQUEST_METHOD'];

$response = ['success' => false, 'message' => 'Invalid request'];

if ($entity && $action) {
    switch ($entity) {
        case 'patients':
            switch ($action) {
                case 'create':
                    if ($method === 'POST') {
                        $name = trim($_POST['name'] ?? '');
                        $dob = trim($_POST['dob'] ?? '');
                        // surgery_id might be linked later or handled differently in the new flow
                        $surgery_id = $_POST['surgery_id'] ?? null; // Keep for now, might be removed

                        if (empty($name)) {
                            $response = ['success' => false, 'error' => 'Name is required.'];
                        } else {
                            try {
                                $stmt = $db->prepare("INSERT INTO patients (name, dob, surgery_id, created_at, updated_at) VALUES (?, ?, ?, datetime('now'), datetime('now'))");
                                $stmt->execute([$name, $dob, $surgery_id]);
                                $new_patient_id = $db->lastInsertId();
                                $response = ['success' => true, 'message' => 'Patient created successfully!', 'patient' => ['id' => $new_patient_id, 'name' => $name]];
                            } catch (\PDOException $e) {
                                error_log("API Error creating patient: " . $e->getMessage());
                                $response = ['success' => false, 'error' => 'An error occurred while creating the patient.', 'details' => $e->getMessage()];
                            }
                        }
                    } else {
                        $response = ['success' => false, 'error' => 'Invalid method for create patient.'];
                    }
                    break;

                case 'update':
                    if ($method === 'POST') {
                        $id = $_POST['id'] ?? null;
                        $name = trim($_POST['name'] ?? '');
                        $dob = trim($_POST['dob'] ?? '');

                        if (empty($id) || empty($name)) {
                            $response = ['success' => false, 'error' => 'ID and Name are required for update.'];
                        } else {
                            try {
                                $stmt = $db->prepare("UPDATE patients SET name = ?, dob = ?, updated_at = datetime('now') WHERE id = ?");
                                $stmt->execute([$name, $dob, $id]);
                                $response = ['success' => true, 'message' => 'Patient updated successfully!'];
                            } catch (\PDOException $e) {
                                error_log("API Error updating patient: " . $e->getMessage());
                                $response = ['success' => false, 'error' => 'An error occurred while updating the patient.', 'details' => $e->getMessage()];
                            }
                        }
                    } else {
                        $response = ['success' => false, 'error' => 'Invalid method for update patient.'];
                    }
                    break;

                case 'delete':
                    if ($method === 'POST') { // Using POST for simplicity, could be DELETE
                        $id = $_POST['id'] ?? null;

                        if (empty($id)) {
                            $response = ['success' => false, 'error' => 'ID is required for delete.'];
                        } else {
                            try {
                                // Optional: Check for related records before deleting
                                $stmt = $db->prepare("DELETE FROM patients WHERE id = ?");
                                $stmt->execute([$id]);
                                $response = ['success' => true, 'message' => 'Patient deleted successfully!'];
                            } catch (\PDOException $e) {
                                error_log("API Error deleting patient: " . $e->getMessage());
                                $response = ['success' => false, 'error' => 'An error occurred while deleting the patient.', 'details' => $e->getMessage()];
                            }
                        }
                    } else {
                        $response = ['success' => false, 'error' => 'Invalid method for delete patient.'];
                    }
                    break;

                case 'list':
                    if ($method === 'GET') {
                        try {
                            $stmt = $db->query("SELECT p.id, p.name, p.dob, COUNT(s.id) as surgery_count FROM patients p LEFT JOIN surgeries s ON p.id = s.patient_id GROUP BY p.id ORDER BY p.name");
                            $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $response = ['success' => true, 'patients' => $patients];
                        } catch (\PDOException $e) {
                            error_log("API Error listing patients: " . $e->getMessage());
                            $response = ['success' => false, 'error' => 'An error occurred while listing patients.', 'details' => $e->getMessage()];
                        }
                    } else {
                        $response = ['success' => false, 'error' => 'Invalid method for list patients.'];
                    }
                    break;

                case 'get':
                    if ($method === 'GET') {
                        $id = $_GET['id'] ?? null;
                        if (empty($id)) {
                            $response = ['success' => false, 'error' => 'ID is required to get patient.'];
                        } else {
                            try {
                                $stmt = $db->prepare("SELECT id, name, dob FROM patients WHERE id = ?");
                                $stmt->execute([$id]);
                                $patient = $stmt->fetch(PDO::FETCH_ASSOC);
                                if ($patient) {
                                    $response = ['success' => true, 'patient' => $patient];
                                } else {
                                    $response = ['success' => false, 'error' => 'Patient not found.'];
                                }
                            } catch (\PDOException $e) {
                                error_log("API Error getting patient: " . $e->getMessage());
                                $response = ['success' => false, 'error' => 'An error occurred while getting the patient.', 'details' => $e->getMessage()];
                            }
                        }
                    } else {
                        $response = ['success' => false, 'error' => 'Invalid method for get patient.'];
                    }
                    break;

                default:
                    $response = ['success' => false, 'message' => 'Unknown patient action.'];
            }
            break;

        case 'surgeries':
            switch ($action) {
                case 'create':
                    if ($method === 'POST') {
                        $date = trim($_POST['date'] ?? '');
                        $notes = trim($_POST['notes'] ?? '');
                        $status = trim($_POST['status'] ?? '');
                        $patient_id = $_POST['patient_id'] ?? null;

                        if (empty($date) || empty($status) || empty($patient_id)) {
                            $response = ['success' => false, 'error' => 'Date, Status, and Patient ID are required.'];
                        } else {
                            try {
                                $stmt = $db->prepare("INSERT INTO surgeries (date, notes, status, patient_id, created_at, updated_at) VALUES (?, ?, ?, ?, datetime('now'), datetime('now'))");
                                $stmt->execute([$date, $notes, $status, $patient_id]);
                                $response = ['success' => true, 'message' => 'Surgery created successfully!'];
                            } catch (\PDOException $e) {
                                error_log("API Error creating surgery: " . $e->getMessage());
                                $response = ['success' => false, 'error' => 'An error occurred while creating the surgery.', 'details' => $e->getMessage()];
                            }
                        }
                    } else {
                        $response = ['success' => false, 'error' => 'Invalid method for create surgery.'];
                    }
                    break;

                case 'update':
                    if ($method === 'POST') {
                        $id = $_POST['id'] ?? null;
                        $date = trim($_POST['date'] ?? '');
                        $notes = trim($_POST['notes'] ?? '');
                        $status = trim($_POST['status'] ?? '');
                        $patient_id = $_POST['patient_id'] ?? null; // Patient ID might be updated too

                        if (empty($id) || empty($date) || empty($status) || empty($patient_id)) {
                            $response = ['success' => false, 'error' => 'ID, Date, Status, and Patient ID are required for update.'];
                        } else {
                            try {
                                $stmt = $db->prepare("UPDATE surgeries SET date = ?, notes = ?, status = ?, patient_id = ?, updated_at = datetime('now') WHERE id = ?");
                                $stmt->execute([$date, $notes, $status, $patient_id, $id]);
                                $response = ['success' => true, 'message' => 'Surgery updated successfully!'];
                            } catch (\PDOException $e) {
                                error_log("API Error updating surgery: " . $e->getMessage());
                                $response = ['success' => false, 'error' => 'An error occurred while updating the surgery.', 'details' => $e->getMessage()];
                            }
                        }
                    } else {
                        $response = ['success' => false, 'error' => 'Invalid method for update surgery.'];
                    }
                    break;

                case 'delete':
                    if ($method === 'POST') { // Using POST for simplicity, could be DELETE
                        $id = $_POST['id'] ?? null;

                        if (empty($id)) {
                            $response = ['success' => false, 'error' => 'ID is required for delete.'];
                        } else {
                            try {
                                $stmt = $db->prepare("DELETE FROM surgeries WHERE id = ?");
                                $stmt->execute([$id]);
                                $response = ['success' => true, 'message' => 'Surgery deleted successfully!'];
                            } catch (\PDOException $e) {
                                error_log("API Error deleting surgery: " . $e->getMessage());
                                $response = ['success' => false, 'error' => 'An error occurred while deleting the surgery.', 'details' => $e->getMessage()];
                            }
                        }
                    } else {
                        $response = ['success' => false, 'error' => 'Invalid method for delete surgery.'];
                    }
                    break;

                case 'list':
                    if ($method === 'GET') {
                        $patient_id = $_GET['patient_id'] ?? null;
                        try {
                            if ($patient_id !== null) {
                                // List surgeries for a specific patient
                                $stmt = $db->prepare("SELECT s.id, s.date, s.status, s.notes, p.name as patient_name FROM surgeries s JOIN patients p ON s.patient_id = p.id WHERE s.patient_id = ? ORDER BY s.date DESC");
                                $stmt->execute([$patient_id]);
                            } else {
                                // List all surgeries
                                $stmt = $db->query("SELECT s.id, s.date, s.status, s.notes, p.name as patient_name,p.id as patient_id FROM surgeries s LEFT JOIN patients p ON s.patient_id = p.id ORDER BY s.date DESC");
                            }
                            $surgeries = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $response = ['success' => true, 'surgeries' => $surgeries];
                        } catch (\PDOException $e) {
                            error_log("API Error listing surgeries: " . $e->getMessage());
                            $response = ['success' => false, 'error' => 'An error occurred while listing surgeries.', 'details' => $e->getMessage()];
                        }
                    } else {
                        $response = ['success' => false, 'error' => 'Invalid method for list surgeries.'];
                    }
                    break;

                case 'get':
                    if ($method === 'GET') {
                        $id = $_GET['id'] ?? null;
                        if (empty($id)) {
                            $response = ['success' => false, 'error' => 'ID is required to get surgery.'];
                        } else {
                            try {
                                $stmt = $db->prepare("SELECT s.id, s.date, s.status, s.notes, s.patient_id, p.name as patient_name FROM surgeries s LEFT JOIN patients p ON s.patient_id = p.id WHERE s.id = ?");
                                $stmt->execute([$id]);
                                $surgery = $stmt->fetch(PDO::FETCH_ASSOC);
                                if ($surgery) {
                                    $response = ['success' => true, 'surgery' => $surgery];
                                } else {
                                    $response = ['success' => false, 'error' => 'Surgery not found.'];
                                }
                            } catch (\PDOException $e) {
                                error_log("API Error getting surgery: " . $e->getMessage());
                                $response = ['success' => false, 'error' => 'An error occurred while getting the surgery.', 'details' => $e->getMessage()];
                            }
                        }
                    } else {
                        $response = ['success' => false, 'error' => 'Invalid method for get surgery.'];
                    }
                    break;

                default:
                    $response = ['success' => false, 'message' => 'Unknown surgery action.'];
            }
            break;
        case 'photos':
            switch ($action) {
                case 'delete':
                    if ($method === 'POST') { // Using POST for simplicity, could be DELETE
                        $photo_id = $_POST['id'] ?? null; // Use 'id' consistently with other API deletes

                        if (empty($photo_id) || !is_numeric($photo_id)) {
                            $response = ['success' => false, 'error' => 'Invalid or missing photo ID.'];
                        } else {
                            try {
                                // Fetch file path before deleting the database record
                                $stmt = $db->prepare("SELECT file_path FROM patient_photos WHERE id = ?");
                                $stmt->execute([$photo_id]);
                                $photo = $stmt->fetch(PDO::FETCH_ASSOC);

                                if (!$photo) {
                                    $response = ['success' => false, 'error' => 'Photo not found.'];
                                } else {
                                    $file_path = $photo['file_path'];

                                    // Start a transaction
                                    $db->beginTransaction();

                                    // Delete the database record
                                    $stmt = $db->prepare("DELETE FROM patient_photos WHERE id = ?");
                                    $stmt->execute([$photo_id]);

                                    // Check if a row was affected (optional, but good practice)
                                    if ($stmt->rowCount() === 0) {
                                        $db->rollBack();
                                        $response = ['success' => false, 'error' => 'Photo record not found or already deleted.'];
                                    } else {
                                        // Delete the physical file
                                        // Use realpath to resolve any relative paths and ensure it's within the uploads directory
                                        $absolute_file_path = realpath($file_path);
                                        $uploads_dir = realpath(dirname(__FILE__) . '/uploads/');

                                        // Basic check to ensure the file is within the uploads directory
                                        if ($absolute_file_path && $uploads_dir && strpos($absolute_file_path, $uploads_dir) === 0) {
                                            if (file_exists($absolute_file_path)) {
                                                if (!unlink($absolute_file_path)) {
                                                    // Log error but still commit DB change if file deletion fails
                                                    error_log("Failed to delete physical file: " . $absolute_file_path);
                                                    // Decide whether to rollback here or just log. For now, log and commit DB change.
                                                }
                                            } else {
                                                // Log error if file doesn't exist but DB record was found
                                                error_log("Physical file not found but DB record existed: " . $absolute_file_path);
                                            }
                                        } else {
                                            // Log error if file path is suspicious (e.g., outside uploads directory)
                                            error_log("Suspicious file path attempted for deletion: " . $file_path);
                                            // Decide whether to rollback here. For security, maybe rollback.
                                            // For now, log and commit DB change.
                                        }

                                        // Commit the transaction
                                        $db->commit();
                                        $response = ['success' => true, 'message' => 'Photo deleted successfully.'];
                                    }
                                }
                            } catch (\PDOException $e) {
                                // Rollback the transaction on error
                                if ($db->inTransaction()) {
                                    $db->rollBack();
                                }
                                error_log("API Error deleting photo: " . $e->getMessage());
                                $response = ['success' => false, 'error' => 'Database error: Could not delete photo.', 'details' => $e->getMessage()];
                            } catch (\Exception $e) {
                                // Catch any other exceptions
                                if ($db->inTransaction()) {
                                    $db->rollBack();
                                }
                                error_log("An unexpected error occurred during photo deletion: " . $e->getMessage());
                                $response = ['success' => false, 'error' => 'An unexpected error occurred.', 'details' => $e->getMessage()];
                            }
                        }
                    } else {
                        $response = ['success' => false, 'error' => 'Invalid method for delete photo.'];
                    }
                    break;

                default:
                    $response = ['success' => false, 'message' => 'Unknown photo action.'];
            }
            break;
        case 'photo_album_types':
            if ($action === 'list') {
                if ($method === 'GET') {
                    try {
                        $stmt = $db->query("SELECT id, name FROM photo_album_types");
                        $photo_album_types = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        $response = ['success' => true, 'photo_album_types' => $photo_album_types];
                    } catch (\PDOException $e) {
                        error_log("API Error listing photo album types: " . $e->getMessage());
                        $response = ['success' => false, 'error' => 'An error occurred while listing photo album types.', 'details' => $e->getMessage()];
                    }
                } else {
                    $response = ['success' => false, 'error' => 'Invalid method for listing photo album types.'];
                }
            } else if ($action === 'delete') {
                if ($method === 'POST') { // Using POST for simplicity, could be DELETE
                    $id = $_POST['id'] ?? null;

                    if (empty($id)) {
                        $response = ['success' => false, 'error' => 'ID is required for delete.'];
                    } else {
                        try {
                            // Optional: Check for related records before deleting (e.g., patient_photos)
                            // For now, assuming foreign key constraints handle this or it's acceptable to delete
                            $stmt = $db->prepare("DELETE FROM photo_album_types WHERE id = ?");
                            $stmt->execute([$id]);
                            $response = ['success' => true, 'message' => 'Photo album type deleted successfully!'];
                        } catch (\PDOException $e) {
                            error_log("API Error deleting photo album type: " . $e->getMessage());
                            $response = ['success' => false, 'error' => 'An error occurred while deleting the photo album type.', 'details' => $e->getMessage()];
                        }
                    }
                } else {
                    $response = ['success' => false, 'error' => 'Invalid method for delete photo album type.'];
                }
            } else {
                $response = ['success' => false, 'message' => 'Unknown photo_album_types action.'];
            }
            break;
        default:
            $response = ['success' => false, 'message' => 'Unknown entity.'];
            break;
    }
    // Log the response
    $timestamp = date('Y-m-d H:i:s');
    $response_status = $response['success'] ? 'Success' : 'Error';
    $response_details = json_encode($response, JSON_PRETTY_PRINT);

    $log_entry = "## Response Log - {$timestamp}\n\n";
    $log_entry .= "**Status:** {$response_status}\n";
    $log_entry .= "**Details:**\n```json\n{$response_details}\n```\n";
    $log_entry .= "---\n\n"; // Separator for next log entry

    file_put_contents('log.md', $log_entry, FILE_APPEND | LOCK_EX);

    echo json_encode($response);
}