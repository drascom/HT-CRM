<?php
function handle_techs($action, $method, $db, $input = [])
{
    switch ($action) {
        case 'list':
            if ($method === 'POST') {
                $stmt = $db->prepare("SELECT id, name, phone, availability, status, period, notes, is_active FROM technicians ORDER BY name");
                $stmt->execute();
                $techs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return ['success' => true, 'technicians' => $techs];
            }
            break;

        case 'create':
        case 'add':
            if ($method === 'POST') {
                $name = trim($_POST['name'] ?? $input['name'] ?? '');
                $phone = trim($_POST['phone'] ?? $input['phone'] ?? '');
                $availability = trim($_POST['availability'] ?? $input['availability'] ?? '');
                $status = trim($_POST['status'] ?? $input['status'] ?? '');
                $period = trim($_POST['period'] ?? $input['period'] ?? '');
                $notes = trim($_POST['notes'] ?? $input['notes'] ?? '');

                if (empty($name)) {
                    return ['success' => false, 'error' => 'Technician name is required.'];
                }

                try {
                    $stmt = $db->prepare("INSERT INTO technicians (name, phone, availability, status, period, notes, created_at) VALUES (?, ?, ?, ?, ?, ?, datetime('now'))");
                    $stmt->execute([$name, $phone, $availability, $status, $period, $notes]);
                    $tech_id = $db->lastInsertId();

                    // Fetch the created technician
                    $stmt = $db->prepare("SELECT id, name, phone, availability, status, period, notes, is_active FROM technicians WHERE id = ?");
                    $stmt->execute([$tech_id]);
                    $tech = $stmt->fetch(PDO::FETCH_ASSOC);

                    return ['success' => true, 'message' => 'Technician created successfully.', 'technician' => $tech];
                } catch (PDOException $e) {
                    if ($e->getCode() == 23000) { // UNIQUE constraint violation
                        return ['success' => false, 'error' => 'A technician with this name already exists.'];
                    }
                    return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
                }
            }
            break;

        case 'update':
        case 'edit':
            if ($method === 'POST' || $method === 'PUT') {
                $id = $_POST['id'] ?? $input['id'] ?? null;
                $name = trim($_POST['name'] ?? $input['name'] ?? '');
                $phone = trim($_POST['phone'] ?? $input['phone'] ?? '');
                $availability = trim($_POST['availability'] ?? $input['availability'] ?? '');
                $status = trim($_POST['status'] ?? $input['status'] ?? '');
                $period = trim($_POST['period'] ?? $input['period'] ?? '');
                $notes = trim($_POST['notes'] ?? $input['notes'] ?? '');

                if (!$id || empty($name)) {
                    return ['success' => false, 'error' => 'Technician ID and name are required.'];
                }

                try {
                    $stmt = $db->prepare("UPDATE technicians SET name = ?, phone = ?, availability = ?, status = ?, period = ?, notes = ? WHERE id = ?");
                    $stmt->execute([$name, $phone, $availability, $status, $period, $notes, $id]);

                    if ($stmt->rowCount() === 0) {
                        return ['success' => false, 'error' => 'Technician not found.'];
                    }

                    return ['success' => true, 'message' => 'Technician updated successfully.'];
                } catch (PDOException $e) {
                    if ($e->getCode() == 23000) { // UNIQUE constraint violation
                        return ['success' => false, 'error' => 'A technician with this name already exists.'];
                    }
                    return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
                }
            }
            break;

        case 'deactivate':
            if ($method === 'POST' || $method === 'DELETE') {
                $id = $_POST['id'] ?? $input['id'] ?? null;

                if (!$id) {
                    return ['success' => false, 'error' => 'Technician ID is required.'];
                }

                try {
                    // Soft delete - set is_active to 0
                    $stmt = $db->prepare("UPDATE technicians SET is_active = 0 WHERE id = ?");
                    $stmt->execute([$id]);

                    if ($stmt->rowCount() === 0) {
                        return ['success' => false, 'error' => 'Technician not found.'];
                    }

                    return ['success' => true, 'message' => 'Technician archived successfully.'];
                } catch (PDOException $e) {
                    return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
                }
            }
            break;

        case 'reactivate':
            if ($method === 'POST') {
                $id = $_POST['id'] ?? $input['id'] ?? null;

                if (!$id) {
                    return ['success' => false, 'error' => 'Technician ID is required.'];
                }

                try {
                    // Reactivate - set is_active to 1
                    $stmt = $db->prepare("UPDATE technicians SET is_active = 1 WHERE id = ?");
                    $stmt->execute([$id]);

                    if ($stmt->rowCount() === 0) {
                        return ['success' => false, 'error' => 'Technician not found.'];
                    }

                    return ['success' => true, 'message' => 'Technician reactivated successfully.'];
                } catch (PDOException $e) {
                    return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
                }
            }
            break;

        case 'delete':
            if ($method === 'POST') {
                $id = $_POST['id'] ?? $input['id'] ?? null;

                if (!$id) {
                    return ['success' => false, 'error' => 'Technician ID is required.'];
                }

                try {
                    // Check if technician is assigned to any surgeries
                    $stmt = $db->prepare("SELECT COUNT(*) FROM surgery_technicians WHERE tech_id = ?");
                    $stmt->execute([$id]);
                    $assignmentCount = $stmt->fetchColumn();

                    if ($assignmentCount > 0) {
                        return ['success' => false, 'error' => 'Cannot delete technician. They are assigned to ' . $assignmentCount . ' surgery(s). Please archive instead.'];
                    }

                    // Check if technician has availability records
                    $stmt = $db->prepare("SELECT COUNT(*) FROM technician_availability WHERE tech_id = ?");
                    $stmt->execute([$id]);
                    $availabilityCount = $stmt->fetchColumn();

                    if ($availabilityCount > 0) {
                        // Delete availability records first
                        $stmt = $db->prepare("DELETE FROM technician_availability WHERE tech_id = ?");
                        $stmt->execute([$id]);
                    }

                    // Permanently delete the technician
                    $stmt = $db->prepare("DELETE FROM technicians WHERE id = ?");
                    $stmt->execute([$id]);

                    if ($stmt->rowCount() === 0) {
                        return ['success' => false, 'error' => 'Technician not found.'];
                    }

                    return ['success' => true, 'message' => 'Technician permanently deleted successfully.'];
                } catch (PDOException $e) {
                    return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
                }
            }
            break;
        case 'get':
            if ($method === 'POST') {
                $id = $input['id'] ?? null;

                if (!$id) {
                    return ['success' => false, 'error' => 'Technician ID is required.'];
                }

                $stmt = $db->prepare("SELECT id, name, phone, availability, status, period, notes, is_active FROM technicians WHERE id = ?");
                $stmt->execute([$id]);
                $tech = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$tech) {
                    return ['success' => false, 'error' => 'Technician not found.'];
                }

                return ['success' => true, 'technician' => $tech];
            }
            break;

        default:
            return ['success' => false, 'error' => 'Invalid action for techs entity.'];
    }

    return ['success' => false, 'error' => 'Invalid request method for this action.'];
}