<?php

function handle_register_process($action, $method, $db, $request_data = [])
{
    $input = $request_data;

    switch ($action) {
        case 'invite':
            if ($method === 'POST') {
                $name = htmlspecialchars($input['name'] ?? '', ENT_QUOTES, 'UTF-8');
                $surname = htmlspecialchars($input['surname'] ?? '', ENT_QUOTES, 'UTF-8');
                $email = filter_var($input['email'] ?? '', FILTER_SANITIZE_EMAIL);
                $phone = htmlspecialchars($input['phone'] ?? '', ENT_QUOTES, 'UTF-8');

                // Basic validation
                if (empty($name) || empty($surname) || empty($email)) {
                    return ['success' => false, 'error' => 'Name, surname, and email are required.'];
                }

                // Validate email format
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    return ['success' => false, 'error' => 'Invalid email format.'];
                }

                // Check if email already exists
                $stmt = $db->prepare("SELECT id FROM users WHERE email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                if ($stmt->fetch()) {
                    return ['success' => false, 'error' => 'Email already registered.'];
                }

                // Insert new user
                // Generate a simple placeholder username and password for now
                // In a real application, you would handle username generation and password hashing properly
                $username = strtolower(substr($name, 0, 1) . $surname); // Simple username generation
                $password_placeholder = password_hash(uniqid(), PASSWORD_DEFAULT); // Placeholder password

                $stmt = $db->prepare("INSERT INTO users (name, surname, email, phone, username, password, role, is_active, created_at, updated_at) VALUES (:name, :surname, :email, :phone, :username, :password, 'guest', 0, datetime('now'), datetime('now'))");
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':surname', $surname);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password_placeholder);

                if ($stmt->execute()) {
                    // Registration successful
                    return ['success' => true, 'message' => 'Registration successful! Account is pending activation.'];
                } else {
                    // Registration failed
                    return ['success' => false, 'error' => 'Could not register user.'];
                }
            }
            break;

        default:
            return ['success' => false, 'error' => "Invalid action '{$action}' for register_process."];
    }

    return ['success' => false, 'error' => "Invalid request for action '{$action}' with method '{$method}'."];
}
