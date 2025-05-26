<?php
session_start();

// Function to check if a user is logged in
function is_logged_in()
{
    return isset($_SESSION['user_id']);
}
// Function to check if the logged-in user has the admin role
function is_admin()
{
    if (!is_logged_in()) {
        return false;
    }

    global $pdo; // Use the PDO connection from db.php

    $stmt = $pdo->prepare("SELECT role FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user && $user['role'] === 'admin';
}

// Function to attempt user login
function login_user($email, $password)
{
    global $pdo; // Use the PDO connection from db.php

    $stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        return true;
    }
    return false;
}

// Function to log out the current user
function logout_user()
{
    session_unset();
    session_destroy();
}

// Redirect to login page if not logged in (except for login page itself)
$current_page = basename($_SERVER['PHP_SELF']);
// Allow access to login.php and signup.php without being logged in
if (!is_logged_in() && $current_page !== 'login.php' && $current_page !== 'signup.php') {
    header('Location: login.php');
    exit();
}
// Function to register a new user
function register_user($email, $username, $password)
{
    global $pdo; // Use the PDO connection from db.php

    // Check if email or username already exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
    $stmt->execute([$email, $username]);
    if ($stmt->fetch()) {
        return false; // Email or username already registered
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $stmt = $pdo->prepare("INSERT INTO users (email, username, password, role) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$email, $username, $hashed_password, 'user'])) {
        return true; // Registration successful
    } else {
        return false; // Registration failed
    }
}