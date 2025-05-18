<?php
// Database connection details for SQLite
$database_file = __DIR__ . '/../../db/database.sqlite';

$db_exists = file_exists($database_file);

try {
    // Create a new PDO instance for SQLite
    $pdo = new PDO("sqlite:" . $database_file);

    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: Set default fetch mode
    // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // If the database file did not exist, initialize it from database.sql
    if (!$db_exists) {
        $sql_file = __DIR__ . '/../database.sql';
        if (file_exists($sql_file)) {
            $sql = file_get_contents($sql_file);
            if ($sql !== false) {
                $pdo->exec($sql);
            } else {
                error_log("Failed to read database.sql file.");
                // Optionally handle this error more gracefully
            }
        } else {
            error_log("database.sql file not found at " . $sql_file);
            // Optionally handle this error more gracefully
        }
    }

} catch (\PDOException $e) {
    // Log the error instead of displaying it in production
    error_log("Database connection error: " . $e->getMessage());
    // Display a generic error message to the user
    die("Database connection failed. Please try again later.");
}

// If the database was just created, add an initial admin user
if (!$db_exists) {
    $admin_username = 'admin';
    $admin_email="test@abc.com";
    $admin_password_raw = '1111';
    $admin_password_hashed = password_hash($admin_password_raw, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password, created_at, updated_at) VALUES (?, ?, datetime('now'), datetime('now'))");
        $stmt->execute([$admin_username,$admin_email, $admin_password_hashed]);
        error_log("Initial admin user 'admin' created with password '1111'. PLEASE CHANGE THIS PASSWORD IMMEDIATELY.");
    } catch (\PDOException $e) {
        error_log("Failed to create initial admin user: " . $e->getMessage());
        // Optionally handle this error more gracefully
    }
}

function get_db() {
    global $pdo;
    return $pdo;
}
?>