<?php
// Suppress all PHP errors and warnings to prevent them from interfering with JSON output
error_reporting(0);
ini_set('display_errors', 0);

// Start output buffering to catch any unexpected output
ob_start();

require_once 'includes/db.php';
require_once 'includes/auth.php';

header('Content-Type: application/json');

// Log the request
$timestamp = date('Y-m-d H:i:s');
$request_method = $_SERVER['REQUEST_METHOD'];
$request_uri = $_SERVER['REQUEST_URI'];
$request_body = '';

if ($request_method === 'POST' || $request_method === 'PUT') {
    $request_body = file_get_contents('php://input');
}

$log_entry = "## Request Log - {$timestamp}\n\n";
$log_entry .= "**Method:** {$request_method}\n";
$log_entry .= "**URL:** {$request_uri}\n";
if (!empty($request_body)) {
    $log_entry .= "**Body:** " . htmlspecialchars($request_body) . "\n";
}
$log_entry .= "\n";
file_put_contents('log.md', $log_entry, FILE_APPEND | LOCK_EX);

// Auth check
if (!is_logged_in()) {
    http_response_code(401);
    $response = ['error' => 'Unauthorized'];
    log_response($response);
    echo json_encode($response);
    exit();
}

// Main API routing
$entity = null;
$action = null;
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    // Check Content-Type to determine if it's JSON or form data
    $content_type = $_SERVER['CONTENT_TYPE'] ?? '';
    if (strpos($content_type, 'application/json') !== false) {
        // For JSON POST requests, read from the request body
        $input = json_decode($request_body, true);
        if ($input) {
            $entity = $input['entity'] ?? null;
            $action = $input['action'] ?? null;
        }
    } else {
        // For standard form-encoded POST requests, merge all $_POST data
        $input = $_POST;
        $entity = $input['entity'] ?? null;
        $action = $input['action'] ?? null;
    }
} elseif ($method === 'PUT') {
    // For PUT requests, read from the request body (assuming JSON)
    $input = json_decode($request_body, true);
    if ($input) {
        $entity = $input['entity'] ?? null;
        $action = $input['action'] ?? null;
    }
} else { // For GET and other methods, still check $_GET
    $entity = $_GET['entity'] ?? null;
    $action = $_GET['action'] ?? null;
}

$response = ['success' => false, 'message' => "Invalid request: Missing entity or action.", 'details' => ['entity' => $entity, 'action' => $action, 'method' => $method]];

try {
    if ($entity && $action) {
        $handler_file = __DIR__ . "/api_handlers/{$entity}.php";
        $handler_function = "handle_{$entity}";

        // Log file check
        if (file_exists($handler_file)) {
            include_once $handler_file;

            // Log function check
            if (function_exists($handler_function)) {
                $db = get_db();
                // Pass the input data to the handler function
                $response = $handler_function($action, $method, $db, $input ?? []);
            } else {
                $log_message = "Handler function not found for entity '{$entity}', action '{$action}', method '{$method}': " . $handler_function;
                log_response(['log' => $log_message]);
                $response = ['success' => false, 'message' => "Function {$handler_function} not found."];
            }
        } else {
            $log_message = "Handler file not found for entity '{$entity}', action '{$action}', method '{$method}': " . $handler_file;
            log_response(['log' => $log_message]);
            $response = ['success' => false, 'message' => "Handler for {$entity} not found."];
        }
    }
} catch (Exception $e) {
    $response = ['success' => false, 'error' => 'Internal server error: ' . $e->getMessage()];
} catch (Error $e) {
    $response = ['success' => false, 'error' => 'Fatal error: ' . $e->getMessage()];
}

// Clean any unexpected output
ob_clean();

// Log and return the response
log_response($response);
echo json_encode($response);


// Helper: response logger
function log_response($response)
{
    $log_file = 'log.md';
    $timestamp = date('Y-m-d H:i:s');
    $status = 'Error';
    if (isset($response['success'])) {
        $status = $response['success'] ? 'Success' : 'Error';
    } elseif (isset($response['log'])) {
        $status = 'Info';
    }
    $json = json_encode($response, JSON_PRETTY_PRINT);
    $log = "## Response Log - {$timestamp}\n\n";
    $log .= "**Status:** {$status}\n";
    $log .= "**Details:**\n```json\n{$json}\n```\n";
    $log .= "---\n\n";

    // Count existing log entries
    $existing_content = file_exists($log_file) ? file_get_contents($log_file) : '';
    $entry_count = substr_count($existing_content, "## Response Log -");

    // Clear file if entry count is 10 or more
    if ($entry_count >= 10) {
        file_put_contents($log_file, ''); // Clear the file
    }

    file_put_contents($log_file, $log, FILE_APPEND | LOCK_EX);
}