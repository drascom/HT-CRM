<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

// Ensure user is logged in
if (!is_logged_in()) {
    http_response_code(401); // Unauthorized
    echo json_encode(['error' => 'User not authenticated.']);
    exit();
}

// Ensure it's a POST request and a file is uploaded
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_FILES['file'])) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Invalid request.']);
    exit();
}

$patient_id = $_POST['patient_id'] ?? null;
$photo_album_type_id = $_POST['photo_album_type_id'] ?? null;
$uploaded_file = $_FILES['file'];

// Validate inputs
if (!$patient_id || !is_numeric($patient_id)) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Invalid or missing patient ID.']);
    exit();
}

if (!$photo_album_type_id) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Missing photo album type name.']);
    exit();
}
// Fetch name from id
$stmt = $pdo->prepare("SELECT name FROM photo_album_types WHERE id = ?");
$stmt->execute([$photo_album_type_id]);
$photo_album_type = $stmt->fetch(\PDO::FETCH_ASSOC);

if (!$photo_album_type) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Invalid photo album type name.']);
    exit();
}

$photo_album_type_name = $photo_album_type['name'];

// Validate file upload
$files = [];
$file_count = count($uploaded_file['name']);
$files_results = [];

// Structure the $_FILES array for easier processing of multiple files
for ($i = 0; $i < $file_count; $i++) {
    $files[] = [
        'name' => $uploaded_file['name'][$i],
        'type' => $uploaded_file['type'][$i],
        'tmp_name' => $uploaded_file['tmp_name'][$i],
        'error' => $uploaded_file['error'][$i],
        'size' => $uploaded_file['size'][$i]
    ];
}

// Define upload directory base
$upload_dir_base = './uploads/patient_' . $patient_id . '/' . $photo_album_type_name . '/';

// Create directory if it doesn't exist
if (!is_dir($upload_dir_base)) {
    if (!mkdir($upload_dir_base, 0777, true)) {
        http_response_code(500); // Internal Server Error
        echo json_encode(['error' => 'Failed to create upload directory.']);
        exit();
    }
}

foreach ($files as $file) {
    $file_result = ['name' => $file['name'], 'success' => false];

    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $file_result['error'] = 'File upload failed with error code: ' . $file['error'];
        $files_results[] = $file_result;
        continue; // Skip to the next file
    }

    // Generate a unique filename
    $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $new_filename = uniqid() . '.' . $file_extension;
    $destination_path = $upload_dir_base . $new_filename;

    // Move the uploaded file
    if (!move_uploaded_file($file['tmp_name'], $destination_path)) {
        $file_result['error'] = 'Failed to move uploaded file.';
        $files_results[] = $file_result;
        continue; // Skip to the next file
    }

    // Insert record into patient_photos table
    try {
        $stmt = $pdo->prepare("INSERT INTO patient_photos (patient_id, photo_album_type_id, file_path, created_at, updated_at) VALUES (?, ?, ?, datetime('now'), datetime('now'))");
        $stmt->execute([$patient_id, $photo_album_type_id, $destination_path]);

        $file_result['success'] = true;
        $file_result['file_path'] = $destination_path;
        $files_results[] = $file_result;
    } catch (\PDOException $e) {
        // Log the error
        error_log("Error inserting photo record for file {$file['name']}: " . $e->getMessage());

        // Attempt to remove the uploaded file if DB insertion fails
        if (file_exists($destination_path)) {
            unlink($destination_path);
        }

        $file_result['error'] = 'Database error: Could not save photo record.';
        $files_results[] = $file_result;
    }
}

// Return consolidated results
http_response_code(200); // OK
echo json_encode(['results' => $files_results]);