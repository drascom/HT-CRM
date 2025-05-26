<?php
function handle_users($action, $method, $db)
{
    // Read JSON input
    $input = json_decode(file_get_contents('php://input'), true);

    switch ($action) {
        case 'add':
            if ($method === 'POST') {
                $email = trim($input['email'] ?? '');
                $username = trim($input['username'] ?? '');
                $password = trim($input['password'] ?? '');
                $role = trim($input['role'] ?? 'user'); // Default role to 'user'

                if ($email && $username && $password) {
                    $hashed = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $db->prepare("INSERT INTO users (email, username, password, role, created_at, updated_at) VALUES (?, ?, ?, ?, datetime('now'), datetime('now'))");
                    $stmt->execute([$email, $username, $hashed, $role]);
                    return ['success' => true, 'id' => $db->lastInsertId()];
                }

                return ['success' => false, 'error' => 'Email, username, and password are required.'];
            }
            break;

        case 'edit':
            if ($method === 'POST') {
                $id = $input['id'] ?? null;
                $email = trim($input['email'] ?? '');
                $username = trim($input['username'] ?? '');
                $password = trim($input['password'] ?? '');
                $role = trim($input['role'] ?? 'user'); // Default role to 'user'

                if ($id && $email && $username) {
                    if ($password) {
                        $hashed = password_hash($password, PASSWORD_DEFAULT);
                        $stmt = $db->prepare("UPDATE users SET email = ?, username = ?, password = ?, role = ?, updated_at = datetime('now') WHERE id = ?");
                        $stmt->execute([$email, $username, $hashed, $role, $id]);
                    } else {
                        $stmt = $db->prepare("UPDATE users SET email = ?, username = ?, role = ?, updated_at = datetime('now') WHERE id = ?");
                        $stmt->execute([$email, $username, $role, $id]);
                    }
                    return ['success' => true];
                }

                return ['success' => false, 'error' => 'ID, email and username are required.'];
            }
            break;

        case 'delete':
            if ($method === 'POST') {
                $id = $input['id'] ?? null;
                if ($id) {
                    $stmt = $db->prepare("DELETE FROM users WHERE id = ?");
                    $stmt->execute([$id]);
                    return ['success' => true];
                }
                return ['success' => false, 'error' => 'ID is required.'];
            }
            break;

        case 'get':
            if ($method === 'GET') {
                $id = $_GET['id'] ?? null; // GET parameter for get_user
                if ($id) {
                    $stmt = $db->prepare("SELECT id, email, username, role, created_at, updated_at FROM users WHERE id = ?");
                    $stmt->execute([$id]);
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $data ? ['success' => true, 'user' => $data] : ['success' => false, 'error' => "User not found with ID: {$id}"];
                }
                return ['success' => false, 'error' => 'ID is required.'];
            }
            break;

        case 'list':
            if ($method === 'GET') {
                $stmt = $db->query("SELECT id, email, username, role, created_at, updated_at FROM users ORDER BY username");
                return ['success' => true, 'users' => $stmt->fetchAll(PDO::FETCH_ASSOC)];
            }
            break;
    }

    return ['success' => false, 'error' => "Invalid request for action '{$action}' with method '{$method}'."];
}