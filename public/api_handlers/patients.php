<?php
function handle_patients($action, $method, $db)
{
    switch ($action) {
        case 'add':
            if ($method === 'POST') {
                $name = trim($_POST['name'] ?? '');
                $dob = trim($_POST['dob'] ?? '');
                $user_id = $_POST['user_id'] ?? null;

                if (!empty($name)) {
                    $stmt = $db->prepare("INSERT INTO patients (name, dob, user_id, created_at, updated_at) VALUES (?, ?, ?, datetime('now'), datetime('now'))");
                    $stmt->execute([$name, $dob, $user_id]);
                    $new_patient_id = $db->lastInsertId();
                    // Fetch the newly created patient to return its data
                    $stmt_fetch = $db->prepare("SELECT id, name, avatar FROM patients WHERE id = ?");
                    $stmt_fetch->execute([$new_patient_id]);
                    $new_patient = $stmt_fetch->fetch(PDO::FETCH_ASSOC);
                    return ['success' => true, 'message' => 'Patient added successfully.', 'patient' => $new_patient]; // Return patient object
                }

                return ['success' => false, 'error' => 'Name is required.'];
            }
            break;

        case 'update':
            if ($method === 'POST') {
                $id = $_POST['id'] ?? null;
                $name = trim($_POST['name'] ?? '');
                $dob = trim($_POST['dob'] ?? '');

                if ($id && $name) {
                    $sql = "UPDATE patients SET name = ?, dob = ?, updated_at = datetime('now')";
                    $params = [$name, $dob];

                    $sql .= " WHERE id = ?";
                    $params[] = $id;

                    $stmt = $db->prepare($sql);
                    $stmt->execute($params);

                    return ['success' => true, 'message' => 'Patient updated successfully.'];
                }

                return ['success' => false, 'error' => 'ID and name are required.'];
            }
            break;
        case 'delete':
            if ($method === 'POST') {
                $id = $_POST['id'] ?? null;
                if ($id) {
                    $stmt = $db->prepare("DELETE FROM patients WHERE id = ?");
                    $stmt->execute([$id]);
                    return ['success' => true];
                }

                return ['success' => false, 'error' => 'ID is required.'];
            }
            break;

        case 'upload_avatar':
            if ($method === 'POST') {
                $patient_id = $_POST['id'] ?? null; // Assuming 'id' is used for patient_id in the upload request

                if ($patient_id && isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                    $upload_dir = __DIR__ . '/../uploads/avatars/';
                    if (!is_dir($upload_dir)) {
                        if (!mkdir($upload_dir, 0777, true)) {
                            return ['success' => false, 'error' => 'Failed to create upload directory.'];
                        }
                    }
                    $file_extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                    $file_name = uniqid('avatar_') . '.' . $file_extension;
                    $destination = $upload_dir . $file_name;

                    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $destination)) {
                        $avatar_path = 'uploads/avatars/' . $file_name; // Path relative to public directory

                        // Optional: Delete old avatar if it exists before updating
                        $stmt_old_avatar = $db->prepare("SELECT avatar FROM patients WHERE id = ?");
                        $stmt_old_avatar->execute([$patient_id]);
                        $old_avatar = $stmt_old_avatar->fetchColumn();
                        if ($old_avatar && file_exists(__DIR__ . '/../' . $old_avatar)) {
                            if (!unlink(__DIR__ . '/../' . $old_avatar)) {
                                // Log error but don't fail the upload
                                error_log("Failed to delete old avatar file: " . __DIR__ . '/../' . $old_avatar);
                            }
                        }

                        // Update the database with the new avatar path
                        $stmt = $db->prepare("UPDATE patients SET avatar = ? WHERE id = ?");
                        $stmt->execute([$avatar_path, $patient_id]);

                        return ['success' => true, 'message' => 'Avatar uploaded successfully.', 'avatar_url' => $avatar_path];
                    } else {
                        return ['success' => false, 'error' => 'Failed to upload avatar file.'];
                    }
                }

                return ['success' => false, 'error' => 'Patient ID and avatar file are required for upload.'];
            }
            break;

        case 'delete_avatar':
            if ($method === 'POST') {
                $patient_id = $_POST['patient_id'] ?? null;
                $avatar_url = $_POST['avatar_url'] ?? null;

                if ($patient_id && $avatar_url) {
                    // Construct the full file path
                    $file_path = __DIR__ . '/../' . $avatar_url;

                    // Check if the file exists and delete it
                    if (file_exists($file_path)) {
                        if (!unlink($file_path)) {
                            // Log error or handle failure to delete file
                            error_log("Failed to delete avatar file: " . $file_path);
                            return ['success' => false, 'error' => 'Failed to delete avatar file.'];
                        }
                    } else {
                        // File not found on server, but proceed to update database
                        error_log("Avatar file not found on server: " . $file_path);
                    }

                    // Update the database to remove the avatar path
                    $stmt = $db->prepare("UPDATE patients SET avatar = NULL WHERE id = ?");
                    $stmt->execute([$patient_id]);

                    return ['success' => true, 'message' => 'Avatar deleted successfully.'];
                }

                return ['success' => false, 'error' => 'Patient ID and avatar URL are required.'];
            }
            break;

        case 'get':
            if ($method === 'GET') {
                $id = $_GET['id'] ?? null;
                if ($id) {
                    // Get patient info
                    $stmt = $db->prepare("SELECT * FROM patients WHERE id = ?");
                    $stmt->execute([$id]);
                    $patient = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($patient) {
                        // Get all surgeries for this patient
                        $stmt2 = $db->prepare("SELECT * FROM surgeries WHERE patient_id = ? ORDER BY date DESC");
                        $stmt2->execute([$id]);
                        $surgeries = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                        // Get all photos with album type names
                        $stmt3 = $db->prepare("
                                SELECT pp.*, pat.name AS album_type
                                FROM patient_photos pp
                                LEFT JOIN photo_album_types pat ON pp.photo_album_type_id = pat.id
                                WHERE pp.patient_id = ?
                                ORDER BY pp.created_at DESC
                            ");
                        $stmt3->execute([$id]);
                        $photos = $stmt3->fetchAll(PDO::FETCH_ASSOC);

                        return [
                            'success' => true,
                            'patient' => $patient,
                            'surgeries' => $surgeries,
                            'photos' => $photos
                        ];
                    }

                    return ['success' => false, 'error' => 'Patient not found.'];
                }

                return ['success' => false, 'error' => 'ID is required.'];
            }
            break;
        case 'list':
            if ($method === 'GET') {
                $stmt = $db->query("
                    SELECT p.*, MAX(s.date) AS last_surgery_date
                    FROM patients p
                    LEFT JOIN surgeries s ON s.patient_id = p.id
                    GROUP BY p.id
                    ORDER BY p.name
                ");
                return ['success' => true, 'patients' => $stmt->fetchAll(PDO::FETCH_ASSOC)];
            }
            break;
    }

    return ['success' => false, 'error' => 'Invalid request'];
}