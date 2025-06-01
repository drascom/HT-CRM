<?php
function handle_agencies($action, $method, $db, $input = [])
{
    switch ($action) {
        case 'create':
            if ($method === 'POST') {
                $name = $_POST['name'] ?? null;

                if (!$name) {
                    return ['success' => false, 'error' => 'Agency name is required.'];
                }

                // Check if agency name already exists
                $stmt = $db->prepare("SELECT id FROM agencies WHERE name = ?");
                $stmt->execute([$name]);
                if ($stmt->fetch()) {
                    return ['success' => false, 'error' => 'An agency with this name already exists.'];
                }

                $stmt = $db->prepare("INSERT INTO agencies (name, created_at, updated_at) VALUES (?, datetime('now'), datetime('now'))");
                $stmt->execute([$name]);

                return [
                    'success' => true,
                    'id' => $db->lastInsertId(),
                    'message' => 'Agency created successfully.'
                ];
            }
            break;

        case 'update':
        case 'edit':
            if ($method === 'POST') {
                $id = $_POST['id'] ?? null;
                $name = $_POST['name'] ?? null;

                if (!$id || !$name) {
                    return ['success' => false, 'error' => 'Agency ID and name are required.'];
                }

                // Check if agency exists
                $check_stmt = $db->prepare("SELECT id FROM agencies WHERE id = ?");
                $check_stmt->execute([$id]);
                if (!$check_stmt->fetch()) {
                    return ['success' => false, 'error' => 'Agency not found.'];
                }

                // Check if agency name already exists for a different agency
                $stmt = $db->prepare("SELECT id FROM agencies WHERE name = ? AND id != ?");
                $stmt->execute([$name, $id]);
                if ($stmt->fetch()) {
                    return ['success' => false, 'error' => 'An agency with this name already exists.'];
                }

                $stmt = $db->prepare("UPDATE agencies SET name = ?, updated_at = datetime('now') WHERE id = ?");
                $stmt->execute([$name, $id]);

                return ['success' => true, 'message' => 'Agency updated successfully.'];
            }
            break;

        case 'delete':
            if ($method === 'POST') {
                $id = $_POST['id'] ?? null;

                if (!$id) {
                    return ['success' => false, 'error' => 'Agency ID is required.'];
                }

                // Check if agency exists
                $check_stmt = $db->prepare("SELECT id FROM agencies WHERE id = ?");
                $check_stmt->execute([$id]);
                if (!$check_stmt->fetch()) {
                    return ['success' => false, 'error' => 'Agency not found.'];
                }

                // Check if agency is associated with users or patients
                $stmt = $db->prepare("SELECT COUNT(*) as count FROM users WHERE agency_id = ?");
                $stmt->execute([$id]);
                $userCount = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

                $stmt = $db->prepare("SELECT COUNT(*) as count FROM patients WHERE agency_id = ?");
                $stmt->execute([$id]);
                $patientCount = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

                if ($userCount > 0 || $patientCount > 0) {
                    return [
                        'success' => false,
                        'error' => 'Cannot delete agency that has associated users or patients.'
                    ];
                }

                $stmt = $db->prepare("DELETE FROM agencies WHERE id = ?");
                $stmt->execute([$id]);

                return ['success' => true, 'message' => 'Agency deleted successfully.'];
            }
            break;

        case 'get':
            if ($method === 'GET') {
                $id = $_GET['id'] ?? null;

                if (!$id) {
                    return ['success' => false, 'error' => 'Agency ID is required.'];
                }

                $stmt = $db->prepare("SELECT * FROM agencies WHERE id = ?");
                $stmt->execute([$id]);
                $agency = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$agency) {
                    return ['success' => false, 'error' => 'Agency not found.'];
                }

                return ['success' => true, 'agency' => $agency];
            }
            break;

        case 'get_all':
            if ($method === 'GET') {
                // Only admin can see all agencies
                if ($_SESSION['role'] !== 'admin') {
                    return ['success' => false, 'error' => 'Unauthorized access.'];
                }

                $stmt = $db->query("SELECT * FROM agencies ORDER BY name");
                $agencies = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return ['success' => true, 'agencies' => $agencies];
            }
            break;

        case 'list':
            if ($method === 'GET') {
                // Anyone can get the list of agencies for dropdown purposes
                $stmt = $db->query("SELECT id, name FROM agencies ORDER BY name");
                $agencies = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return ['success' => true, 'agencies' => $agencies];
            }
            break;
    }

    return ['success' => false, 'error' => "Invalid request for action '{$action}' with method '{$method}'."];
}