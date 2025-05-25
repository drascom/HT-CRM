<?php

require __DIR__ . '/../vendor/autoload.php'; // Adjust path if Composer is installed elsewhere

// --- Configuration ---
// IMPORTANT: Replace with the path to your service account key file or configure OAuth 2.0
$credentialsPath = 'PATH/TO/YOUR/credentials.json';
$spreadsheetId = 'YOUR_SPREADSHEET_ID'; // Replace with your Google Sheet ID
$range = 'Sheet1!A1:D10'; // Replace with the range you want to fetch (e.g., Sheet1!A1:Z)

// --- Authentication and Client Setup ---
try {
    $client = new \Google\Client();
    $client->setApplicationName('Google Sheets PHP Fetcher');
    $client->setScopes([\Google\Service\Sheets::SPREADSHEETS_READONLY]);
    $client->setAuthConfig($credentialsPath); // Use setAuthConfig for service account or OAuth 2.0

    $service = new \Google\Service\Sheets($client);

    // --- Fetch Data ---
    $response = $service->spreadsheets_values->get($spreadsheetId, $range);
    $values = $response->getValues();

    // --- Display Data ---
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "    <meta charset='UTF-8'>";
    echo "    <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "    <title>Google Sheet Data</title>";
    echo "    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>";
    echo "</head>";
    echo "<body class='container mt-4'>";
    echo "    <h2>Data from Google Sheet</h2>";

    if (empty($values)) {
        echo "<p>No data found in the specified range.</p>";
    } else {
        echo "<table class='table table-striped'>";
        echo "    <thead>";
        echo "        <tr>";
        // Assuming the first row is headers
        foreach ($values[0] as $header) {
            echo "            <th>" . htmlspecialchars($header) . "</th>";
        }
        echo "        </tr>";
        echo "    </thead>";
        echo "    <tbody>";
        // Skip header row when displaying data
        for ($i = 1; $i < count($values); $i++) {
            echo "        <tr>";
            foreach ($values[$i] as $cell) {
                echo "            <td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "        </tr>";
        }
        echo "    </tbody>";
        echo "</table>";
    }

    echo "</body>";
    echo "</html>";
} catch (\Google\Service\Exception $e) {
    echo "<div class='alert alert-danger'>";
    echo "<h4>Google Service Error:</h4>";
    echo "<p>Code: " . htmlspecialchars($e->getCode()) . "</p>";
    echo "<p>Message: " . htmlspecialchars($e->getMessage()) . "</p>";
    // In a production environment, you might log the full error instead of displaying it
    echo "</div>";
} catch (\Exception $e) {
    echo "<div class='alert alert-danger'>";
    echo "<h4>General Error:</h4>";
    echo "<p>Message: " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "</div>";
}