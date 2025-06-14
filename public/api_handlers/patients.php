<?php
function handle_patients($action, $method, $db, $input = [])
{
    switch ($action) {
        case 'add':
            if ($method === 'POST') {
                $name = trim($input['name'] ?? '');
                $dob = trim($input['dob'] ?? '');
                $user_id = $input['user_id'] ?? null;
                $agency_id = $input['agency_id'] ?? null;

                $phone = trim($input['phone'] ?? '');
                $email = trim($input['email'] ?? '');
                $city = trim($input['city'] ?? '');
                $occupation = trim($input['occupation'] ?? '');

                if (!empty($name)) {
                    $stmt = $db->prepare("INSERT INTO patients (name, dob, phone, email, user_id, created_at, updated_at, agency_id,city,occupation) VALUES (?, ?, ?, ?, ?, datetime('now'), datetime('now'), ?,?,?)");
                    $stmt->execute([$name, $dob, $phone, $email, $user_id, $agency_id, $city, $occupation]);
                    $new_patient_id = $db->lastInsertId();
                    // Fetch the newly created patient to return its data
                    $stmt_fetch = $db->prepare("SELECT id, name, avatar FROM patients WHERE id = ?");
                    $stmt_fetch->execute([$new_patient_id]);
                    $new_patient = $stmt_fetch->fetch(PDO::FETCH_ASSOC);
                    $response = ['success' => true, 'message' => 'Patient added successfully.', 'id' => $new_patient_id, 'patient' => $new_patient];
                    return $response; // Return patient object
                }

                return ['success' => false, 'error' => 'Name is required.'];
            }
            break;

        case 'update':
        case 'edit':
            if ($method === 'POST') {
                $id = $input['id'] ?? null;
                $name = trim($input['name'] ?? '');
                $dob = trim($input['dob'] ?? '');
                $agency_id = $input['agency_id'] ?? null;

                $phone = trim($input['phone'] ?? '');
                $email = trim($input['email'] ?? '');
                $city = trim($input['city'] ?? '');
                $occupation = trim($input['occupation'] ?? '');

                if ($id && $name) {
                    $sql = "UPDATE patients SET name = ?, dob = ?, agency_id = ?, phone = ?, email = ?,city = ?,occupation = ?, updated_at = datetime('now')";
                    $params = [$name, $dob, $agency_id, $phone, $email, $city, $occupation];

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
                $id = $input['id'] ?? null;
                if ($id) {
                    $stmt = $db->prepare("DELETE FROM patients WHERE id = ?");
                    $stmt->execute([$id]);
                    return ['success' => true, 'message' => 'Patient deleted successfully.'];
                }

                return ['success' => false, 'error' => 'ID is required.'];
            }
            break;

        case 'upload_avatar':
            if ($method === 'POST') {
                $patient_id = $input['id'] ?? null; // Assuming 'id' is used for patient_id in the upload request
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
                        return ['success' => true, 'message' => 'Avatar uploaded successfully.', 'avatar_url' => $avatar_path . '-' . $patient_id];
                    } else {
                        return ['success' => false, 'error' => 'Failed to upload avatar file.'];
                    }
                }
                return ['success' => false, 'error' => 'Patient ID and avatar file are required for upload.'];
            }
            break;

        case 'delete_avatar':
            if ($method === 'POST') {
                $patient_id = $input['patient_id'] ?? null;
                $avatar_url = $input['avatar_url'] ?? null;

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
            if ($method === 'POST') {
                $id = $input['id'] ?? null;
                if ($id) {
                    // Get patient info
                    $stmt = $db->prepare("SELECT * FROM patients WHERE id = ?");
                    $stmt->execute([$id]);
                    $patient = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($patient) {
                        // Get all surgeries for this patient with room names
                        $stmt2 = $db->prepare("SELECT s.*, r.name as room_name FROM surgeries s LEFT JOIN rooms r ON s.room_id = r.id WHERE s.patient_id = ? ORDER BY s.date DESC");
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

                        // Get all appointments for this patient
                        $stmt4 = $db->prepare("
                            SELECT a.*, p.name AS procedure_name
                            FROM appointments a
                            LEFT JOIN procedures p ON a.procedure_id = p.id
                            WHERE a.patient_id = ?
                            ORDER BY a.appointment_date DESC
                        ");
                        $stmt4->execute([$id]);
                        $appointments = $stmt4->fetchAll(PDO::FETCH_ASSOC);

                        return [
                            'success' => true,
                            'patient' => $patient,
                            'surgeries' => $surgeries,
                            'photos' => $photos,
                            'appointments' => $appointments
                        ];
                    }

                    return ['success' => false, 'error' => 'Patient not found.'];
                }

                return ['success' => false, 'error' => 'ID is required.'];
            }
            break;

        case 'list':
            if ($method === 'POST') {
                $agency_id = $input['agency'] ?? null;

                if ($agency_id) {
                    // Filter by agency
                    $stmt = $db->prepare("
                        SELECT p.*, MAX(s.date) AS last_surgery_date, a.name AS agency_name
                        FROM patients p
                        LEFT JOIN surgeries s ON s.patient_id = p.id
                        LEFT JOIN agencies a ON p.agency_id = a.id
                        WHERE p.agency_id = ?
                        GROUP BY p.id
                        ORDER BY p.name
                    ");
                    $stmt->execute([$agency_id]);
                } else {
                    // Get all patients
                    $stmt = $db->query("
                        SELECT p.*, MAX(s.date) AS last_surgery_date, a.name AS agency_name
                        FROM patients p
                        LEFT JOIN surgeries s ON s.patient_id = p.id
                        LEFT JOIN agencies a ON p.agency_id = a.id
                        GROUP BY p.id
                        ORDER BY p.name
                    ");
                }

                return ['success' => true, 'patients' => $stmt->fetchAll(PDO::FETCH_ASSOC)];
            }
            break;

        case 'find_by_name':
            if ($method === 'POST') {
                $name = trim($input['name'] ?? '');
                if (!empty($name)) {
                    $stmt = $db->prepare("SELECT id, name, avatar FROM patients WHERE name = ?");
                    $stmt->execute([$name]);
                    $patient = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($patient) {
                        return ['success' => true, 'patient' => $patient];
                    } else {
                        return ['success' => false, 'error' => 'Patient not found.'];
                    }
                }
                return ['success' => false, 'error' => 'Name parameter is required.'];
            }
            break;
    }

    return ['success' => false, 'error' => "Invalid request for action '{$action}' with method '{$method}'."];
}