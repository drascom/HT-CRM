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
                    return ['success' => true, 'id' => $db->lastInsertId()];
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
                    $stmt = $db->prepare("UPDATE patients SET name = ?, dob = ?, updated_at = datetime('now') WHERE id = ?");
                    $stmt->execute([$name, $dob, $id]);
                    return ['success' => true];
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
                    SELECT p.*, COUNT(s.id) AS surgery_count
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