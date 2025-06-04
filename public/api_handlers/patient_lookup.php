<?php
require_once __DIR__ . '/../includes/db.php'; // Include database connection

function handle_patient_lookup($action, $method, $db)
{
    if ($method === 'POST' && $action === 'find_by_name') {
        $name = trim($_GET['name'] ?? '');
        if (!empty($name)) {
            $stmt = $db->prepare("SELECT id, name FROM patients WHERE name = ?");
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

    return ['success' => false, 'error' => "Invalid request for action '{$action}' with method '{$method}'."];
}