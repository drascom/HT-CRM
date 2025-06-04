<?php
// Start session only if one isn't already active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Function to check if a user is logged in
function is_logged_in()
{
    return isset($_SESSION['user_id']);
}

// Function to attempt user login
function login_user($email, $password)
{
    global $pdo; // Use the PDO connection from db.php

    $stmt = $pdo->prepare("SELECT id, password, role, agency_id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['agency_id'] = $user['agency_id'];
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

// Redirect to login page if not logged in (except for login page itself and API calls)
$current_page = basename($_SERVER['PHP_SELF']);
// Allow access to login.php, signup.php, and api.php without automatic redirect
if (!is_logged_in() && $current_page !== 'login.php' && $current_page !== 'signup.php' && $current_page !== 'api.php') {
    header('Location: login.php');
    exit();
}

// Function to get current user's agency ID
function get_user_agency_id()
{
    return $_SESSION['agency_id'] ?? '';
}

// Function to get current user's role
function get_user_role()
{
    return $_SESSION['role'] ?? '';
}

// Function to register a new user
function register_user($email, $username, $password, $agency_id = null)
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
    $stmt = $pdo->prepare("INSERT INTO users (email, username, password, role, agency_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?, datetime('now'), datetime('now'))");
    if ($stmt->execute([$email, $username, $hashed_password, 'user', $agency_id])) {
        return true; // Registration successful
    } else {
        return false; // Registration failed
    }
}

// Function to get current user's ID
function get_user_id()
{
    return $_SESSION['user_id'] ?? null;
}

// Function to check if current user is an admin
function is_admin()
{
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

// Function to check if current user is an editor
function is_editor()
{
    return isset($_SESSION['role']) && $_SESSION['role'] === 'editor';
}

// Function to check if current user is an agent
function is_agent()
{
    return isset($_SESSION['role']) && $_SESSION['role'] === 'agent';
}

// Function to check if current user is a technician
function is_technician()
{
    return isset($_SESSION['role']) && $_SESSION['role'] === 'technician';
}