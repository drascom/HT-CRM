<?php
// Define the path to the log file
$log_file = __DIR__ . '/log.md';
// Check if clear log request is made
if (isset($_GET['clear_log'])) {
    // Clear the log file
    file_put_contents($log_file, '');
    // Redirect back to view_log.php to show the cleared log
    header('Location: view_log.php');
    exit();
}

// Check if the log file exists
if (file_exists($log_file)) {
    // Read the content of the log file
    $log_content = file_get_contents($log_file);
} else {
    $log_content = "Log file not found.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Log</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }

        pre {
            background-color: #f4f4f4;
            padding: 10px;
            border: 1px solid #ddd;
            white-space: pre-wrap;
            word-wrap: break-word;
        }

        h1 {
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        footer {
            margin-top: 20px;
            border-top: 1px solid #eee;
            padding-top: 10px;
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>

<form action="view_log.php" method="get">
    <input type="hidden" name="clear_log" value="true">
    <button type="submit">Clear Log</button>
</form>

<body>

    <h1>Application Log</h1>

    <pre><?php echo htmlspecialchars($log_content); ?></pre>

    <footer>
        <p>End of Log File</p>
    </footer>

</body>

</html>