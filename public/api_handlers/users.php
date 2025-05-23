<?php
function handle_users($action, $method, $db)
{
    switch ($action) {
        case 'add':
            if ($method === 'POST') {
                $email = trim($_POST['email'] ?? '');
                $username = trim($_POST['username'] ?? '');
                $password = trim($_POST['password'] ?? '');

                if ($email && $username && $password) {
                    $hashed = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $db->prepare("INSERT INTO users (email, username, password, created_at, updated_at) VALUES (?, ?, ?, datetime('now'), datetime('now'))");
                    $stmt->execute([$email, $username, $hashed]);
                    return ['success' => true, 'id' => $db->lastInsertId()];
                }

                return ['success' => false, 'error' => 'Email, username, and password are required.'];
            }
            break;

        case 'update':
            if ($method === 'POST') {
                $id = $_POST['id'] ?? null;
                $email = trim($_POST['email'] ?? '');
                $username = trim($_POST['username'] ?? '');
                $password = trim($_POST['password'] ?? '');

                if ($id && $email && $username) {
                    if ($password) {
                        $hashed = password_hash($password, PASSWORD_DEFAULT);
                        $stmt = $db->prepare("UPDATE users SET email = ?, username = ?, password = ?, updated_at = datetime('now') WHERE id = ?");
                        $stmt->execute([$email, $username, $hashed, $id]);
                    } else {
                        $stmt = $db->prepare("UPDATE users SET email = ?, username = ?, updated_at = datetime('now') WHERE id = ?");
                        $stmt->execute([$email, $username, $id]);
                    }
                    return ['success' => true];
                }

                return ['success' => false, 'error' => 'ID, email and username are required.'];
            }
            break;

        case 'delete':
            if ($method === 'POST') {
                $id = $_POST['id'] ?? null;
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
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $stmt = $db->prepare("SELECT id, email, username, created_at FROM users WHERE id = ?");
                    $stmt->execute([$id]);
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $data ? ['success' => true, 'user' => $data] : ['success' => false, 'error' => 'Not found'];
                }
                return ['success' => false, 'error' => 'ID is required.'];
            }
            break;

        case 'list':
            if ($method === 'GET') {
                $stmt = $db->query("SELECT id, email, username, created_at FROM users ORDER BY username");
                return ['success' => true, 'users' => $stmt->fetchAll(PDO::FETCH_ASSOC)];
            }
            break;
    }

    return ['success' => false, 'error' => 'Invalid request'];
}