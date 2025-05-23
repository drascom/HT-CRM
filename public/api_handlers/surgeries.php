<?php
function handle_surgeries($action, $method, $db)
{
    switch ($action) {
        case 'add':
            if ($method === 'POST') {
                $date = trim($_POST['date'] ?? '');
                $notes = trim($_POST['notes'] ?? '');
                $status = trim($_POST['status'] ?? '');
                $patient_id = $_POST['patient_id'] ?? null;

                if ($date && $status && $patient_id) {
                    $stmt = $db->prepare("INSERT INTO surgeries (date, notes, status, patient_id, created_at, updated_at) VALUES (?, ?, ?, ?, datetime('now'), datetime('now'))");
                    $stmt->execute([$date, $notes, $status, $patient_id]);
                    return ['success' => true, 'id' => $db->lastInsertId()];
                }
                return ['success' => false, 'error' => 'Date, status, and patient_id are required.'];
            }
            break;

        case 'update':
            if ($method === 'POST') {
                $id = $_POST['id'] ?? null;
                $date = trim($_POST['date'] ?? '');
                $notes = trim($_POST['notes'] ?? '');
                $status = trim($_POST['status'] ?? '');
                $patient_id = $_POST['patient_id'] ?? null;

                if ($id && $date && $status && $patient_id) {
                    $stmt = $db->prepare("UPDATE surgeries SET date = ?, notes = ?, status = ?, patient_id = ?, updated_at = datetime('now') WHERE id = ?");
                    $stmt->execute([$date, $notes, $status, $patient_id, $id]);
                    return ['success' => true];
                }
                return ['success' => false, 'error' => 'All fields are required.'];
            }
            break;

        case 'delete':
            if ($method === 'POST') {
                $id = $_POST['id'] ?? null;
                error_log("Surgeries delete handler reached. ID: " . $id); // Add logging
                if ($id) {
                    $stmt = $db->prepare("DELETE FROM surgeries WHERE id = ?");
                    $stmt->execute([$id]);
                    $response = ['success' => true];
                    error_log("Surgeries delete successful. Response: " . json_encode($response)); // Add logging
                    return $response;
                }
                $response = ['success' => false, 'error' => 'ID is required.'];
                error_log("Surgeries delete failed: ID missing. Response: " . json_encode($response)); // Add logging
                return $response;
            }
            break;

        case 'get':
            if ($method === 'GET') {
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $stmt = $db->prepare("SELECT s.*, p.name as patient_name FROM surgeries s LEFT JOIN patients p ON s.patient_id = p.id WHERE s.id = ?");
                    $stmt->execute([$id]);
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $data ? ['success' => true, 'surgery' => $data] : ['success' => false, 'error' => 'Not found'];
                }
                return ['success' => false, 'error' => 'ID is required.'];
            }
            break;

        case 'list':
            if ($method === 'GET') {
                $patient_id = $_GET['patient_id'] ?? null;
                if ($patient_id) {
                    $stmt = $db->prepare("SELECT s.*, p.name as patient_name FROM surgeries s JOIN patients p ON s.patient_id = p.id WHERE s.patient_id = ? ORDER BY s.date DESC");
                    $stmt->execute([$patient_id]);
                    return ['success' => true, 'surgeries' => $stmt->fetchAll(PDO::FETCH_ASSOC)];
                } else {
                    $stmt = $db->query("SELECT s.*, p.name as patient_name FROM surgeries s LEFT JOIN patients p ON s.patient_id = p.id ORDER BY s.date DESC");
                    return ['success' => true, 'surgeries' => $stmt->fetchAll(PDO::FETCH_ASSOC)];
                }
            }
            break;
    }

    return ['success' => false, 'error' => 'Invalid request'];
}