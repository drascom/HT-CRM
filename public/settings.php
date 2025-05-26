<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

// Function to get a setting value from the database
function get_setting($key)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT value FROM settings WHERE key = :key");
    $stmt->bindValue(':key', $key, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['value'] : null;
}

// Function to update a setting value in the database
function update_setting($key, $value)
{
    global $pdo;
    // Use INSERT OR REPLACE to handle both inserting new settings and updating existing ones
    $stmt = $pdo->prepare("INSERT OR REPLACE INTO settings (key, value) VALUES (:key, :value)");
    $stmt->bindValue(':key', $key, PDO::PARAM_STR);
    $stmt->bindValue(':value', $value, PDO::PARAM_STR);
    return $stmt->execute();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $spreadsheetId = $_POST['spreadsheet_id'] ?? '';
    $cacheDuration = $_POST['cache_duration'] ?? '';
    $cellRange = $_POST['cell_range'] ?? '';

    // Validate and update settings
    if (!empty($spreadsheetId)) {
        update_setting('spreadsheet_id', $spreadsheetId);
    }
    if (is_numeric($cacheDuration) && $cacheDuration >= 0) {
        update_setting('cache_duration', $cacheDuration);
    }
    if (!empty($cellRange)) {
        update_setting('cell_range', $cellRange);
    }

    $message = "Settings updated successfully!";
}

// Fetch current settings
$currentSpreadsheetId = get_setting('spreadsheet_id');
$currentCacheDuration = get_setting('cache_duration');
$currentCellRange = get_setting('cell_range');

require_once 'includes/header.php';
?>

<div class="container mt-4">
    <h2>Settings</h2>

    <?php if (isset($message)): ?>
    <div class="alert alert-success" role="alert">
        <?php echo htmlspecialchars($message); ?>
    </div>
    <?php endif; ?>

    <form method="POST">
        <fieldset>
            <legend>Google Sheet Settings</legend>
            <div class="mb-3">
                <label for="spreadsheet_id" class="form-label">Spreadsheet ID:</label>
                <input type="text" class="form-control" id="spreadsheet_id" name="spreadsheet_id"
                    value="<?php echo htmlspecialchars($currentSpreadsheetId ?? ''); ?>" required>
            </div>
            <div class="mb-3">
                <label for="cache_duration" class="form-label">Cache Duration (seconds):</label>
                <input type="number" class="form-control" id="cache_duration" name="cache_duration"
                    value="<?php echo htmlspecialchars($currentCacheDuration ?? ''); ?>" required min="0">
            </div>
            <div class="mb-3">
                <label for="cell_range" class="form-label">Cell Range (e.g., A1:Z):</label>
                <input type="text" class="form-control" id="cell_range" name="cell_range"
                    value="<?php echo htmlspecialchars($currentCellRange ?? ''); ?>" required>
            </div>
        </fieldset>

        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>