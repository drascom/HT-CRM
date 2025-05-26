<?php
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
        // For standard form-encoded POST requests, entity and action should be in $_POST
        $entity = $_POST['entity'] ?? null;
        $action = $_POST['action'] ?? null;
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

if ($entity && $action) {
    $handler_file = __DIR__ . "/api_handlers/{$entity}.php";
    $handler_function = "handle_{$entity}";

    // Log file check
    if (file_exists($handler_file)) {
        include_once $handler_file;

        // Log function check
        if (function_exists($handler_function)) {
            $db = get_db();
            // Pass the decoded input data to the handler function if available
            $handler_input = ($method === 'POST' && strpos($_SERVER['CONTENT_TYPE'] ?? '', 'application/json') !== false) || $method === 'PUT' ? ($input ?? []) : [];
            $response = $handler_function($action, $method, $db, $handler_input);
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

// Log and return the response
log_response($response);
echo json_encode($response);


// Helper: response logger
function log_response($response)
{
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
    file_put_contents('log.md', $log, FILE_APPEND | LOCK_EX);
}