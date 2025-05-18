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
if ($uploaded_file['error'] !== UPLOAD_ERR_OK) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'File upload failed with error code: ' . $uploaded_file['error']]);
    exit();
}

// Define upload directory
$upload_dir = './uploads/patient_' . $patient_id . '/' . $photo_album_type_name . '/';

// Create directory if it doesn't exist
if (!is_dir($upload_dir)) {
    if (!mkdir($upload_dir, 0777, true)) {
        http_response_code(500); // Internal Server Error
        echo json_encode(['error' => 'Failed to create upload directory.']);
        exit();
    }
}

// Generate a unique filename
$file_extension = pathinfo($uploaded_file['name'], PATHINFO_EXTENSION);
$new_filename = uniqid() . '.' . $file_extension;
$destination_path = $upload_dir . $new_filename;

// Move the uploaded file
if (!move_uploaded_file($uploaded_file['tmp_name'], $destination_path)) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Failed to move uploaded file.']);
    exit();
}

// Insert record into patient_photos table
try {
    $stmt = $pdo->prepare("INSERT INTO patient_photos (patient_id, photo_album_type_id, file_path, created_at, updated_at) VALUES (?, ?, ?, datetime('now'), datetime('now'))");
    $stmt->execute([$patient_id, $photo_album_type_id, $destination_path]);

    http_response_code(200); // OK
    echo json_encode(['success' => 'File uploaded and record inserted successfully.', 'file_path' => $destination_path]);
} catch (\PDOException $e) {
    // Log the error
    error_log("Error inserting photo record: " . $e->getMessage());

    // Attempt to remove the uploaded file if DB insertion fails
    if (file_exists($destination_path)) {
        unlink($destination_path);
    }

    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Database error: Could not save photo record.']);
    exit();
}
