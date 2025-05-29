<?php
function handle_techs($action, $method, $db, $input = [])
{
    switch ($action) {
        case 'list':
            if ($method === 'GET') {
                $stmt = $db->prepare("SELECT id, name, specialty, phone, is_active FROM technicians ORDER BY name");
                $stmt->execute();
                $techs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return ['success' => true, 'techs' => $techs];
            }
            break;

        case 'create':
            if ($method === 'POST') {
                $name = trim($_POST['name'] ?? $input['name'] ?? '');
                $specialty = trim($_POST['specialty'] ?? $input['specialty'] ?? '');
                $phone = trim($_POST['phone'] ?? $input['phone'] ?? '');
                
                if (empty($name)) {
                    return ['success' => false, 'error' => 'Technician name is required.'];
                }
                
                try {
                    $stmt = $db->prepare("INSERT INTO technicians (name, specialty, phone, created_at) VALUES (?, ?, ?, datetime('now'))");
                    $stmt->execute([$name, $specialty, $phone]);
                    $tech_id = $db->lastInsertId();
                    
                    // Fetch the created technician
                    $stmt = $db->prepare("SELECT id, name, specialty, phone, is_active FROM technicians WHERE id = ?");
                    $stmt->execute([$tech_id]);
                    $tech = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    return ['success' => true, 'message' => 'Technician created successfully.', 'tech' => $tech];
                } catch (PDOException $e) {
                    if ($e->getCode() == 23000) { // UNIQUE constraint violation
                        return ['success' => false, 'error' => 'A technician with this name already exists.'];
                    }
                    return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
                }
            }
            break;

        case 'update':
            if ($method === 'POST' || $method === 'PUT') {
                $id = $_POST['id'] ?? $input['id'] ?? null;
                $name = trim($_POST['name'] ?? $input['name'] ?? '');
                $specialty = trim($_POST['specialty'] ?? $input['specialty'] ?? '');
                $phone = trim($_POST['phone'] ?? $input['phone'] ?? '');
                
                if (!$id || empty($name)) {
                    return ['success' => false, 'error' => 'Technician ID and name are required.'];
                }
                
                try {
                    $stmt = $db->prepare("UPDATE technicians SET name = ?, specialty = ?, phone = ? WHERE id = ?");
                    $stmt->execute([$name, $specialty, $phone, $id]);
                    
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

        case 'archive':
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

        case 'get':
            if ($method === 'GET') {
                $id = $_GET['id'] ?? null;
                
                if (!$id) {
                    return ['success' => false, 'error' => 'Technician ID is required.'];
                }
                
                $stmt = $db->prepare("SELECT id, name, specialty, phone, is_active FROM technicians WHERE id = ?");
                $stmt->execute([$id]);
                $tech = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if (!$tech) {
                    return ['success' => false, 'error' => 'Technician not found.'];
                }
                
                return ['success' => true, 'tech' => $tech];
            }
            break;

        default:
            return ['success' => false, 'error' => 'Invalid action for techs entity.'];
    }
    
    return ['success' => false, 'error' => 'Invalid request method for this action.'];
}
