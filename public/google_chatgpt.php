<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

require_once 'includes/header.php';
?>
<div id="loading-spinner" style="text-align: center; margin-top: 50px;">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <p>wait data is loading from server</p>
</div>

<div id="main-content" style="display: none;"></div>

<script>
document.addEventListener('DOMContentLoaded', async () => {
    const res = await fetch('?ajax=1');
    const html = await res.text();
    document.getElementById('main-content').innerHTML = html;
    document.getElementById('loading-spinner').style.display = 'none';
    document.getElementById('main-content').style.display = 'block';
});
</script>
<?php
require_once 'includes/footer.php';

if (isset($_GET['ajax'])) {
    require_once __DIR__ . '/../vendor/autoload.php';

    function get_setting($key)
    {
        $pdo = get_db();
        $stmt = $pdo->prepare("SELECT value FROM settings WHERE key = :key");
        $stmt->bindValue(':key', $key, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $row['value'] : null;
    }

    $credentialsPath = __DIR__ . '/secrets/sanctuary.json';
    $spreadsheetId = get_setting('spreadsheet_id');
    $cacheDir = __DIR__ . '/../cache/';
    $cacheFile = $cacheDir . 'sheet_data_' . md5($spreadsheetId) . '.json';
    $cacheDuration = (int)get_setting('cache_duration');

    $cachedData = null;
    $usingCache = false;

    if (file_exists($cacheFile) && (filemtime($cacheFile) > (time() - $cacheDuration))) {
        $cachedContent = file_get_contents($cacheFile);
        $cachedData = json_decode($cachedContent, true);
        if ($cachedData !== null && isset($cachedData['spreadsheetTitle'], $cachedData['sheetTitles'], $cachedData['sheetValues'])) {
            $spreadsheetTitle = $cachedData['spreadsheetTitle'];
            $sheetTitles = $cachedData['sheetTitles'];
            $sheetValues = $cachedData['sheetValues'];
            // Data already extracted into simple variables
            $currentSpreadsheetTitle = $spreadsheetTitle;
            $currentSheetTitles = $sheetTitles;
            // $sheetValues is already populated
            $usingCache = true;
        } else {
            @unlink($cacheFile);
        }
    }

    if (!$usingCache) {
        try {
            $client = new \Google\Client();
            $client->setApplicationName('Google Sheets PHP Fetcher');
            $client->setScopes([\Google\Service\Sheets::SPREADSHEETS_READONLY]);
            $client->setAuthConfig($credentialsPath);
            $service = new \Google\Service\Sheets($client);

            $spreadsheet = $service->spreadsheets->get($spreadsheetId);
            $sheets = $spreadsheet->getSheets();
            $sheetValues = [];
            foreach ($sheets as $sheet) {
                $sheetTitle = $sheet->getProperties()->getTitle();
                $cellRange = get_setting('cell_range') ?? 'A1:Z';
                $range = "'" . str_replace("'", "''", $sheetTitle) . "'!" . $cellRange;
                $response = $service->spreadsheets_values->get($spreadsheetId, $range);
                $sheetValues[$sheetTitle] = $response->getValues();
            }

            $currentSpreadsheetTitle = $spreadsheet->getProperties()->getTitle();
            $currentSheetTitles = array_map(function ($s) {
                return $s->getProperties()->getTitle();
            }, $sheets);

            $dataToCache = [
                'timestamp' => time(),
                'spreadsheetTitle' => $currentSpreadsheetTitle,
                'sheetTitles' => $currentSheetTitles,
                'sheetValues' => $sheetValues
            ];
            if (!is_dir($cacheDir)) mkdir($cacheDir, 0777, true);
            file_put_contents($cacheFile, json_encode($dataToCache));
        } catch (\Exception $e) {
            echo "<div class='alert alert-danger'><p>Error: " . htmlspecialchars($e->getMessage()) . "</p></div>";
            exit();
        }
    }

    echo "<h2>Data from Google Sheet: " . htmlspecialchars($currentSpreadsheetTitle) . "</h2>";
    if ($usingCache) {
        echo "<p><em>(Last Updated at " . date('Y-m-d H:i:s', $cachedData['timestamp']) . ")</em></p>";
    }

    if (empty($currentSheetTitles)) {
        echo "<p>No sheets found in the spreadsheet.</p>";
    } else {
        echo "<ul class='nav nav-tabs' id='sheetTabs' role='tablist'>";
        $firstSheet = true;
        foreach ($currentSheetTitles as $index => $sheetTitle) {
            $sheetTitle = htmlspecialchars($sheetTitle);
            $tabId = 'sheet-' . $index;
            $activeClass = $firstSheet ? 'active' : '';
            $ariaSelected = $firstSheet ? 'true' : 'false';
            echo "<li class='nav-item'><button class='nav-link $activeClass' id='{$tabId}-tab' data-bs-toggle='tab' data-bs-target='#$tabId' type='button' role='tab' aria-controls='$tabId' aria-selected='$ariaSelected'>$sheetTitle</button></li>";
            $firstSheet = false;
        }
        echo "</ul>";

        echo "<div class='tab-content' id='sheetTabsContent'>";
        $firstSheet = true;
        foreach ($currentSheetTitles as $index => $sheetTitle) {
            $sheetTitle = $sheetTitle; // Already the title string
            $tabId = 'sheet-' . $index;
            $activeClass = $firstSheet ? 'show active' : '';
            echo "<div class='tab-pane fade $activeClass' id='$tabId' role='tabpanel' aria-labelledby='{$tabId}-tab'>";
            $values = $sheetValues[$sheetTitle] ?? [];
            if (empty($values)) {
                echo "<p class='mt-3'>No data found in this sheet.</p>";
            } else {
                echo "<table class='table mt-3'><thead><tr>";
                foreach ($values[0] as $header) {
                    echo "<th>" . htmlspecialchars($header) . "</th>";
                }
                echo "</tr></thead><tbody>";
                for ($i = 1; $i < count($values); $i++) {
                    echo "<tr>";
                    foreach ($values[$i] as $cell) {
                        echo "<td>" . htmlspecialchars($cell) . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</tbody></table>";
            }
            echo "</div>";
            $firstSheet = false;
        }
        echo "</div>";
    }
    exit();
}
?>