<?php
function handle_appointments($action, $method, $db, $input = [])
{
    switch ($action) {
        case 'create':
            if ($method === 'POST') {
                $room_id = $_POST['room_id'] ?? $input['room_id'] ?? null;
                $patient_id = $_POST['patient_id'] ?? $input['patient_id'] ?? null;
                $appointment_date = $_POST['appointment_date'] ?? $input['appointment_date'] ?? null;
                $start_time = $_POST['start_time'] ?? $input['start_time'] ?? null;
                $end_time = $_POST['end_time'] ?? $input['end_time'] ?? null;
                $type = $_POST['type'] ?? $input['type'] ?? null;
                $subtype = $_POST['subtype'] ?? $input['subtype'] ?? null;
                $notes = $_POST['notes'] ?? $input['notes'] ?? null;

                if (!$room_id || !$patient_id || !$appointment_date || !$start_time || !$end_time || !$type) {
                    return ['success' => false, 'error' => 'Missing required fields'];
                }

                // Check for time overlap
                $stmt = $db->prepare("
                    SELECT COUNT(*) as count FROM appointments 
                    WHERE room_id = ? AND appointment_date = ? 
                    AND ((start_time <= ? AND end_time > ?) OR (start_time < ? AND end_time >= ?) OR (start_time >= ? AND end_time <= ?))
                ");
                $stmt->execute([$room_id, $appointment_date, $start_time, $start_time, $end_time, $end_time, $start_time, $end_time]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($result['count'] > 0) {
                    return ['success' => false, 'error' => 'Time slot overlaps with existing appointment'];
                }

                try {
                    $stmt = $db->prepare("
                        INSERT INTO appointments (room_id, patient_id, appointment_date, start_time, end_time, type, subtype, notes)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
                    ");
                    $stmt->execute([$room_id, $patient_id, $appointment_date, $start_time, $end_time, $type, $subtype, $notes]);
                    
                    return ['success' => true, 'id' => $db->lastInsertId()];
                } catch (PDOException $e) {
                    return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
                }
            }
            break;
            
        case 'update':
            if ($method === 'POST') {
                $id = $_POST['id'] ?? $input['id'] ?? null;
                $room_id = $_POST['room_id'] ?? $input['room_id'] ?? null;
                $patient_id = $_POST['patient_id'] ?? $input['patient_id'] ?? null;
                $appointment_date = $_POST['appointment_date'] ?? $input['appointment_date'] ?? null;
                $start_time = $_POST['start_time'] ?? $input['start_time'] ?? null;
                $end_time = $_POST['end_time'] ?? $input['end_time'] ?? null;
                $type = $_POST['type'] ?? $input['type'] ?? null;
                $subtype = $_POST['subtype'] ?? $input['subtype'] ?? null;
                $notes = $_POST['notes'] ?? $input['notes'] ?? null;

                if (!$id || !$room_id || !$patient_id || !$appointment_date || !$start_time || !$end_time || !$type) {
                    return ['success' => false, 'error' => 'Missing required fields'];
                }

                // Check for time overlap (excluding current appointment)
                $stmt = $db->prepare("
                    SELECT COUNT(*) as count FROM appointments
                    WHERE room_id = ? AND appointment_date = ? AND id != ?
                    AND ((start_time <= ? AND end_time > ?) OR (start_time < ? AND end_time >= ?) OR (start_time >= ? AND end_time <= ?))
                ");
                $stmt->execute([$room_id, $appointment_date, $id, $start_time, $start_time, $end_time, $end_time, $start_time, $end_time]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($result['count'] > 0) {
                    return ['success' => false, 'error' => 'Time slot overlaps with existing appointment'];
                }

                try {
                    $stmt = $db->prepare("
                        UPDATE appointments
                        SET room_id = ?, patient_id = ?, appointment_date = ?, start_time = ?, end_time = ?,
                            type = ?, subtype = ?, notes = ?, updated_at = datetime('now')
                        WHERE id = ?
                    ");
                    $stmt->execute([$room_id, $patient_id, $appointment_date, $start_time, $end_time, $type, $subtype, $notes, $id]);

                    return ['success' => true, 'message' => 'Appointment updated successfully'];
                } catch (PDOException $e) {
                    return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
                }
            }
            break;

        case 'delete':
            if ($method === 'POST') {
                $id = $_POST['id'] ?? $input['id'] ?? null;

                if (!$id) {
                    return ['success' => false, 'error' => 'Appointment ID is required'];
                }

                try {
                    $stmt = $db->prepare("DELETE FROM appointments WHERE id = ?");
                    $stmt->execute([$id]);

                    if ($stmt->rowCount() > 0) {
                        return ['success' => true, 'message' => 'Appointment deleted successfully'];
                    } else {
                        return ['success' => false, 'error' => 'Appointment not found'];
                    }
                } catch (PDOException $e) {
                    return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
                }
            }
            break;

        case 'get':
            if ($method === 'GET') {
                $id = $_GET['id'] ?? null;

                if (!$id) {
                    return ['success' => false, 'error' => 'Appointment ID is required'];
                }

                try {
                    $stmt = $db->prepare("
                        SELECT a.*, p.name as patient_name, r.name as room_name
                        FROM appointments a
                        JOIN patients p ON a.patient_id = p.id
                        JOIN rooms r ON a.room_id = r.id
                        WHERE a.id = ?
                    ");
                    $stmt->execute([$id]);
                    $appointment = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($appointment) {
                        return ['success' => true, 'appointment' => $appointment];
                    } else {
                        return ['success' => false, 'error' => 'Appointment not found'];
                    }
                } catch (PDOException $e) {
                    return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
                }
            }
            break;

        case 'list':
            if ($method === 'GET') {
                $date = $_GET['date'] ?? null;
                $room_id = $_GET['room_id'] ?? null;
                $type = $_GET['type'] ?? null;

                try {
                    $sql = "
                        SELECT a.*, p.name as patient_name, r.name as room_name
                        FROM appointments a
                        JOIN patients p ON a.patient_id = p.id
                        JOIN rooms r ON a.room_id = r.id
                        WHERE 1=1
                    ";
                    $params = [];

                    if ($date) {
                        $sql .= " AND a.appointment_date = ?";
                        $params[] = $date;
                    }

                    if ($room_id) {
                        $sql .= " AND a.room_id = ?";
                        $params[] = $room_id;
                    }

                    if ($type) {
                        $sql .= " AND a.type = ?";
                        $params[] = $type;
                    }

                    $sql .= " ORDER BY a.appointment_date DESC, a.start_time";

                    $stmt = $db->prepare($sql);
                    $stmt->execute($params);
                    $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    return ['success' => true, 'appointments' => $appointments];
                } catch (PDOException $e) {
                    return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
                }
            }
            break;
    }
    
    return ['success' => false, 'error' => 'Invalid action for appointments entity'];
}