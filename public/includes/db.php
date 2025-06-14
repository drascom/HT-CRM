<?php
// Database connection details for SQLite
$database_file = __DIR__ . '/database.sqlite'; // Correct path to database file in includes folder

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
        $sql_file = __DIR__ . '/database.sql';
        if (file_exists($sql_file)) {
            $sql = file_get_contents($sql_file);
            if ($sql !== false) {
                $pdo->exec($sql);
            } else {
                log_to_file("Failed to read database.sql file.");
                // Optionally handle this error more gracefully
            }
        } else {
            log_to_file("database.sql file not found at " . $sql_file);
            // Optionally handle this error more gracefully
        }
    }
} catch (\PDOException $e) {
    // Log the error instead of displaying it in production
    log_to_file("Database connection error: " . $e->getMessage());
    // Display a generic error message to the user
    die("Database connection failed. Please try again later.");
}

// If the database was just created, add an initial admin user
if (!$db_exists) {
    $admin_username = 'admin';
    $admin_email = "drayhancolak@gmail.com";
    $admin_password_raw = 'Doktor2024';
    $admin_password_hashed = password_hash($admin_password_raw, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role, created_at, updated_at) VALUES (?, ?, ?, 'admin', datetime('now'), datetime('now'))");
        $stmt->execute([$admin_username, $admin_email, $admin_password_hashed]);
    } catch (\PDOException $e) {
        log_to_file("Failed to create initial admin user: " . $e->getMessage());
        // Optionally handle this error more gracefully
    }
}

/**
 * Logs a message to the log.md file.
 *
 * @param string $message The message to log.
 */
function log_to_file($message)
{
    $log_file = __DIR__ . '/../log.md'; // Path to log.md in the public directory
    $timestamp = date('Y-m-d H:i:s');
    $log_message = "[{$timestamp}] {$message}" . PHP_EOL;

    // Use FILE_APPEND to add to the end of the file, and LOCK_EX to prevent race conditions
    file_put_contents($log_file, $log_message, FILE_APPEND | LOCK_EX);
}

function get_db()
{
    global $pdo;
    return $pdo;
}

/**
 * Recursively searches for database.sqlite starting from the project root.
 *
 * @param string $start_dir The directory to start the search from. Defaults to the project root.
 * @return array An array of absolute paths to database.sqlite files found.
 */
function find_database_sqlite($start_dir = __DIR__ . '/../')
{
    $matches = [];
    // Use @ to suppress warnings for unreadable directories
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($start_dir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($iterator as $fileinfo) {
        if ($fileinfo->isFile() && $fileinfo->getFilename() === 'database.sqlite') {
            $matches[] = $fileinfo->getRealPath();
        }
    }

    return $matches;
}
