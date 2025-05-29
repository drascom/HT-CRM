<?php
function handle_rooms($action, $method, $db, $input = [])
{
    switch ($action) {
        case 'list':
            if ($method === 'GET') {
                $date = $_GET['date'] ?? null;

                if ($date) {
                    // Get only available rooms for the specified date
                    $stmt = $db->prepare("
                        SELECT r.id, r.name,r.notes, r.is_active,
                               CASE WHEN rr.id IS NOT NULL THEN 1 ELSE 0 END as is_booked
                        FROM rooms r
                        LEFT JOIN room_reservations rr ON r.id = rr.room_id AND rr.reserved_date = ?
                        WHERE r.is_active = 1 AND rr.id IS NULL
                        ORDER BY r.name
                    ");
                    $stmt->execute([$date]);
                } else {
                    // Get all rooms
                    $stmt = $db->prepare("SELECT id, name, 
                     notes, is_active FROM rooms ORDER BY name");
                    $stmt->execute();
                }

                $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return ['success' => true, 'rooms' => $rooms];
            }
            break;

        case 'create':
            if ($method === 'POST') {
                $name = trim($_POST['name'] ?? '');
                $notes = trim($_POST['notes'] ?? '');

                if (empty($name)) {
                    return ['success' => false, 'error' => 'Room name is required.'];
                }

                try {
                    $stmt = $db->prepare("INSERT INTO rooms (name,  notes, created_at, updated_at) VALUES (?, ?, ?, datetime('now'), datetime('now'))");
                    $stmt->execute([$name, $notes]);
                    $room_id = $db->lastInsertId();

                    // Fetch the created room
                    $stmt = $db->prepare("SELECT id, name, notes, is_active FROM rooms WHERE id = ?");
                    $stmt->execute([$room_id]);
                    $room = $stmt->fetch(PDO::FETCH_ASSOC);

                    return ['success' => true, 'message' => 'Room created successfully.', 'room' => $room];
                } catch (PDOException $e) {
                    if ($e->getCode() == 23000) { // UNIQUE constraint violation
                        return ['success' => false, 'error' => 'A room with this name already exists.'];
                    }
                    return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
                }
            }
            break;

        case 'update':
            if ($method === 'POST' || $method === 'PUT') {
                $id = $_POST['id'] ?? $input['id'] ?? null;
                $name = trim($_POST['name'] ?? $input['name'] ?? '');
                $notes = trim($_POST['notes'] ?? $input['notes'] ?? '');

                if (!$id || empty($name)) {
                    return ['success' => false, 'error' => 'Room ID and name are required.'];
                }

                try {
                    $stmt = $db->prepare("UPDATE rooms SET name = ?,  notes = ?, updated_at = datetime('now') WHERE id = ?");
                    $stmt->execute([$name, $notes, $id]);

                    if ($stmt->rowCount() === 0) {
                        return ['success' => false, 'error' => 'Room not found.'];
                    }

                    return ['success' => true, 'message' => 'Room updated successfully.'];
                } catch (PDOException $e) {
                    if ($e->getCode() == 23000) { // UNIQUE constraint violation
                        return ['success' => false, 'error' => 'A room with this name already exists.'];
                    }
                    return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
                }
            }
            break;

        case 'delete':
            if ($method === 'POST' || $method === 'DELETE') {
                $id = $_POST['id'] ?? $input['id'] ?? null;

                if (!$id) {
                    return ['success' => false, 'error' => 'Room ID is required.'];
                }

                try {
                    // Soft delete - set is_active to 0
                    $stmt = $db->prepare("UPDATE rooms SET is_active = 0, updated_at = datetime('now') WHERE id = ?");
                    $stmt->execute([$id]);

                    if ($stmt->rowCount() === 0) {
                        return ['success' => false, 'error' => 'Room not found.'];
                    }

                    return ['success' => true, 'message' => 'Room archived successfully.'];
                } catch (PDOException $e) {
                    return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
                }
            }
            break;

        case 'get':
            if ($method === 'GET') {
                $id = $_GET['id'] ?? null;

                if (!$id) {
                    return ['success' => false, 'error' => 'Room ID is required.'];
                }

                $stmt = $db->prepare("SELECT id, name, notes, is_active FROM rooms WHERE id = ?");
                $stmt->execute([$id]);
                $room = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$room) {
                    return ['success' => false, 'error' => 'Room not found.'];
                }

                return ['success' => true, 'room' => $room];
            }
            break;

        default:
            return ['success' => false, 'error' => 'Invalid action for rooms entity.'];
    }

    return ['success' => false, 'error' => 'Invalid request method for this action.'];
}
