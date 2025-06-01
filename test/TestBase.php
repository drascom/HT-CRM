<?php
/**
 * Base Test Class for API System Tests
 * Provides common functionality for testing API handlers
 */

class TestBase
{
    protected $db;
    protected $test_user_id;
    protected $test_agency_id;
    protected $original_session;
    protected $test_results = [];
    protected $test_count = 0;
    protected $passed_count = 0;
    protected $failed_count = 0;

    public function __construct()
    {
        // Store original session
        $this->original_session = $_SESSION ?? [];

        // Initialize database
        $this->initializeDatabase();

        // Create test data
        $this->createTestData();
    }

    protected function initializeDatabase()
    {
        // Create a test-specific database
        $test_db_file = __DIR__ . '/test_database.sqlite';

        // Remove existing test database
        if (file_exists($test_db_file)) {
            unlink($test_db_file);
        }

        try {
            $this->db = new PDO("sqlite:" . $test_db_file);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Initialize the test database with schema
            $this->initializeTestSchema();

        } catch (PDOException $e) {
            throw new Exception('Failed to create test database: ' . $e->getMessage());
        }
    }

    protected function initializeTestSchema()
    {
        $schema_file = __DIR__ . '/../public/includes/database.sql';
        if (!file_exists($schema_file)) {
            throw new Exception("Schema file not found: {$schema_file}");
        }

        $sql = file_get_contents($schema_file);
        if ($sql === false) {
            throw new Exception("Failed to read schema file");
        }

        try {
            $this->db->exec($sql);
        } catch (PDOException $e) {
            throw new Exception('Failed to initialize test schema: ' . $e->getMessage());
        }
    }

    protected function createTestData()
    {
        // Create test agency
        $stmt = $this->db->prepare("INSERT INTO agencies (name, created_at, updated_at) VALUES (?, datetime('now'), datetime('now'))");
        $stmt->execute(['Test Agency']);
        $this->test_agency_id = $this->db->lastInsertId();

        // Create test user
        $hashed_password = password_hash('testpass123', PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (email, username, password, role, agency_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?, datetime('now'), datetime('now'))");
        $stmt->execute(['test@test.com', 'testuser', $hashed_password, 'admin', $this->test_agency_id]);
        $this->test_user_id = $this->db->lastInsertId();
    }

    protected function cleanupTestData()
    {
        // Clean up test data in reverse order of creation
        $this->db->prepare("DELETE FROM patient_photos WHERE patient_id IN (SELECT id FROM patients WHERE agency_id = ?)")->execute([$this->test_agency_id]);
        $this->db->prepare("DELETE FROM surgeries WHERE patient_id IN (SELECT id FROM patients WHERE agency_id = ?)")->execute([$this->test_agency_id]);
        $this->db->prepare("DELETE FROM patients WHERE agency_id = ?")->execute([$this->test_agency_id]);
        $this->db->prepare("DELETE FROM users WHERE id = ?")->execute([$this->test_user_id]);
        $this->db->prepare("DELETE FROM agencies WHERE id = ?")->execute([$this->test_agency_id]);
    }

    protected function setSession($user_id = null, $role = 'admin', $agency_id = null)
    {
        $_SESSION = [];
        if ($user_id !== null) {
            $_SESSION['user_id'] = $user_id ?: $this->test_user_id;
            $_SESSION['role'] = $role;
            $_SESSION['agency_id'] = $agency_id ?: $this->test_agency_id;
        }
    }

    protected function clearSession()
    {
        $_SESSION = [];
    }

    protected function restoreSession()
    {
        $_SESSION = $this->original_session;
    }

    protected function makeApiRequest($entity, $action, $method = 'GET', $data = [], $content_type = 'application/x-www-form-urlencoded')
    {
        // Simulate API request
        $_SERVER['REQUEST_METHOD'] = $method;
        $_SERVER['CONTENT_TYPE'] = $content_type;

        // Clear previous request data
        $_GET = [];
        $_POST = [];

        if ($method === 'GET') {
            $_GET['entity'] = $entity;
            $_GET['action'] = $action;
            foreach ($data as $key => $value) {
                $_GET[$key] = $value;
            }
        } else {
            if ($content_type === 'application/json') {
                $data['entity'] = $entity;
                $data['action'] = $action;
                $request_body = json_encode($data);
            } else {
                $_POST['entity'] = $entity;
                $_POST['action'] = $action;
                foreach ($data as $key => $value) {
                    $_POST[$key] = $value;
                }
                $request_body = '';
            }
        }

        // Include API handlers
        $handler_file = __DIR__ . "/../public/api_handlers/{$entity}.php";
        if (!file_exists($handler_file)) {
            return ['success' => false, 'error' => "Handler file not found: {$handler_file}"];
        }

        include_once $handler_file;
        $handler_function = "handle_{$entity}";

        if (!function_exists($handler_function)) {
            return ['success' => false, 'error' => "Handler function not found: {$handler_function}"];
        }

        // Prepare input data for handler
        $handler_input = [];
        if ($method === 'POST' && $content_type === 'application/json') {
            $handler_input = $data;
        } elseif ($method === 'PUT') {
            $handler_input = $data;
        }

        try {
            return $handler_function($action, $method, $this->db, $handler_input);
        } catch (Exception $e) {
            return ['success' => false, 'error' => 'Exception: ' . $e->getMessage()];
        }
    }

    protected function assert($condition, $message, $test_name = '')
    {
        $this->test_count++;

        if ($condition) {
            $this->passed_count++;
            $status = 'PASS';
            $color = "\033[32m"; // Green
        } else {
            $this->failed_count++;
            $status = 'FAIL';
            $color = "\033[31m"; // Red
        }

        $reset_color = "\033[0m";
        $test_info = $test_name ? " [{$test_name}]" : '';

        echo "{$color}{$status}{$reset_color}: {$message}{$test_info}\n";

        $this->test_results[] = [
            'status' => $status,
            'message' => $message,
            'test_name' => $test_name,
            'passed' => $condition
        ];

        return $condition;
    }

    protected function assertEquals($expected, $actual, $message, $test_name = '')
    {
        $condition = $expected === $actual;
        if (!$condition) {
            $message .= " (Expected: " . json_encode($expected) . ", Actual: " . json_encode($actual) . ")";
        }
        return $this->assert($condition, $message, $test_name);
    }

    protected function assertTrue($condition, $message, $test_name = '')
    {
        return $this->assert($condition === true, $message, $test_name);
    }

    protected function assertFalse($condition, $message, $test_name = '')
    {
        return $this->assert($condition === false, $message, $test_name);
    }

    protected function assertArrayHasKey($key, $array, $message, $test_name = '')
    {
        $condition = is_array($array) && array_key_exists($key, $array);
        if (!$condition) {
            $message .= " (Key '{$key}' not found in array)";
        }
        return $this->assert($condition, $message, $test_name);
    }

    protected function assertNotEmpty($value, $message, $test_name = '')
    {
        return $this->assert(!empty($value), $message, $test_name);
    }

    protected function assertStringContains($haystack, $needle, $message, $test_name = '')
    {
        $condition = is_string($haystack) && is_string($needle) && strpos($haystack, $needle) !== false;
        if (!$condition) {
            $message .= " (String '{$needle}' not found in '{$haystack}')";
        }
        return $this->assert($condition, $message, $test_name);
    }

    public function getTestResults()
    {
        return [
            'total' => $this->test_count,
            'passed' => $this->passed_count,
            'failed' => $this->failed_count,
            'results' => $this->test_results
        ];
    }

    public function printSummary($test_class_name = '')
    {
        $class_info = $test_class_name ? " for {$test_class_name}" : '';
        echo "\n" . str_repeat("=", 50) . "\n";
        echo "TEST SUMMARY{$class_info}\n";
        echo str_repeat("=", 50) . "\n";
        echo "Total Tests: {$this->test_count}\n";
        echo "\033[32mPassed: {$this->passed_count}\033[0m\n";
        echo "\033[31mFailed: {$this->failed_count}\033[0m\n";

        if ($this->failed_count > 0) {
            echo "\nFAILED TESTS:\n";
            foreach ($this->test_results as $result) {
                if (!$result['passed']) {
                    echo "- {$result['message']}\n";
                }
            }
        }
        echo str_repeat("=", 50) . "\n\n";
    }

    public function __destruct()
    {
        $this->cleanupTestData();
        $this->restoreSession();

        // Clean up test database file
        $test_db_file = __DIR__ . '/test_database.sqlite';
        if (file_exists($test_db_file)) {
            unlink($test_db_file);
        }
    }
}
