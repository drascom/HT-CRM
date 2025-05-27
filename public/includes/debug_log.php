<?php
// Simple debug endpoint for JavaScript logging
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Define the log file path
$logFilePath = __DIR__ . '/google_debug.log';
$cookieName = 'last_log_clear_timestamp';
$clearInterval = 3600; // 1 hour in seconds

// Check if the log file needs to be cleared
$lastClearTimestamp = isset($_COOKIE[$cookieName]) ? (int)$_COOKIE[$cookieName] : 0;
$currentTime = time();

if ($currentTime - $lastClearTimestamp > $clearInterval) {
    // Clear the log file content
    file_put_contents($logFilePath, '');

    // Update the cookie timestamp
    // Set cookie to expire in 24 hours to avoid frequent updates
    setcookie($cookieName, $currentTime, $currentTime + (86400 * 1), "/");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if ($data) {
        $logEntry = "\n## JavaScript Debug Log - {$data['timestamp']}\n\n";
        $logEntry .= "**Source:** {$data['source']}\n";
        $logEntry .= "**Message:** {$data['message']}\n";

        if (isset($data['data']) && $data['data']) {
            $logEntry .= "**Data:**\n```json\n" . json_encode($data['data'], JSON_PRETTY_PRINT) . "\n```\n";
        }

        $logEntry .= "---\n";

        // Append to log file
        file_put_contents($logFilePath, $logEntry, FILE_APPEND | LOCK_EX);

        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid JSON']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Only POST method allowed']);
}