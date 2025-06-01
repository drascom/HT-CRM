<?php
/**
 * Test Runner for API System Tests
 * Runs all test classes and provides comprehensive reporting
 */

// Set error reporting for testing
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Change to the test directory
chdir(__DIR__);

// Include all test classes
require_once 'TestBase.php';
require_once 'PatientsApiTest.php';
require_once 'SurgeriesApiTest.php';
require_once 'AgenciesApiTest.php';
require_once 'RoomsApiTest.php';
require_once 'UsersApiTest.php';
require_once 'TechniciansApiTest.php';
require_once 'PhotosApiTest.php';
require_once 'SessionAuthTest.php';
require_once 'ReservationsApiTest.php';
require_once 'AvailabilityApiTest.php';
require_once 'TechAvailApiTest.php';
require_once 'EnhancedSurgeryBookingTest.php';

class TestRunner
{
    private $test_classes = [
        'SessionAuthTest',
        'AgenciesApiTest',
        'UsersApiTest',
        'PatientsApiTest',
        'SurgeriesApiTest',
        'RoomsApiTest',
        'TechniciansApiTest',
        'PhotosApiTest',
        'ReservationsApiTest',
        'AvailabilityApiTest',
        'TechAvailApiTest',
        'EnhancedSurgeryBookingTest'
    ];

    private $total_tests = 0;
    private $total_passed = 0;
    private $total_failed = 0;
    private $test_results = [];
    private $start_time;

    public function __construct()
    {
        $this->start_time = microtime(true);
    }

    public function runAllTests()
    {
        echo "\n";
        echo str_repeat("=", 80) . "\n";
        echo "                    API SYSTEM TESTS STARTING                    \n";
        echo str_repeat("=", 80) . "\n";
        echo "Test Suite: Hair Transplant Management System API\n";
        echo "Date: " . date('Y-m-d H:i:s') . "\n";
        echo "PHP Version: " . PHP_VERSION . "\n";
        echo str_repeat("=", 80) . "\n\n";

        foreach ($this->test_classes as $test_class) {
            $this->runTestClass($test_class);
        }

        $this->printFinalSummary();
    }

    private function runTestClass($test_class)
    {
        echo "\n" . str_repeat("*", 60) . "\n";
        echo "RUNNING: {$test_class}\n";
        echo str_repeat("*", 60) . "\n";

        try {
            $test_instance = new $test_class();
            $test_instance->runTests();

            $results = $test_instance->getTestResults();
            $this->total_tests += $results['total'];
            $this->total_passed += $results['passed'];
            $this->total_failed += $results['failed'];

            $this->test_results[$test_class] = $results;

        } catch (Exception $e) {
            echo "\033[31mERROR: Failed to run {$test_class}: " . $e->getMessage() . "\033[0m\n";
            $this->test_results[$test_class] = [
                'total' => 0,
                'passed' => 0,
                'failed' => 1,
                'error' => $e->getMessage()
            ];
            $this->total_failed++;
        }
    }

    private function printFinalSummary()
    {
        $end_time = microtime(true);
        $execution_time = round($end_time - $this->start_time, 2);

        echo "\n\n";
        echo str_repeat("=", 80) . "\n";
        echo "                        FINAL TEST SUMMARY                        \n";
        echo str_repeat("=", 80) . "\n";

        echo "Execution Time: {$execution_time} seconds\n";
        echo "Total Test Classes: " . count($this->test_classes) . "\n";
        echo "Total Tests: {$this->total_tests}\n";
        echo "\033[32mPassed: {$this->total_passed}\033[0m\n";
        echo "\033[31mFailed: {$this->total_failed}\033[0m\n";

        $success_rate = $this->total_tests > 0 ? round(($this->total_passed / $this->total_tests) * 100, 2) : 0;
        echo "Success Rate: {$success_rate}%\n";

        echo "\n" . str_repeat("-", 80) . "\n";
        echo "DETAILED RESULTS BY TEST CLASS:\n";
        echo str_repeat("-", 80) . "\n";

        foreach ($this->test_results as $class_name => $results) {
            $status_color = $results['failed'] > 0 ? "\033[31m" : "\033[32m";
            $status = $results['failed'] > 0 ? "FAILED" : "PASSED";

            echo "{$status_color}{$class_name}: {$status}\033[0m\n";
            echo "  Tests: {$results['total']} | Passed: {$results['passed']} | Failed: {$results['failed']}\n";

            if (isset($results['error'])) {
                echo "  Error: {$results['error']}\n";
            }
            echo "\n";
        }

        if ($this->total_failed > 0) {
            echo str_repeat("-", 80) . "\n";
            echo "FAILED TESTS SUMMARY:\n";
            echo str_repeat("-", 80) . "\n";

            foreach ($this->test_results as $class_name => $results) {
                if ($results['failed'] > 0 && isset($results['results'])) {
                    echo "\033[31m{$class_name}:\033[0m\n";
                    foreach ($results['results'] as $result) {
                        if (!$result['passed']) {
                            echo "  - {$result['message']}\n";
                        }
                    }
                    echo "\n";
                }
            }
        }

        echo str_repeat("=", 80) . "\n";

        if ($this->total_failed === 0) {
            echo "\033[32m🎉 ALL TESTS PASSED! 🎉\033[0m\n";
        } else {
            echo "\033[31m❌ SOME TESTS FAILED ❌\033[0m\n";
            echo "Please review the failed tests above and fix the issues.\n";
        }

        echo str_repeat("=", 80) . "\n\n";

        // Generate test report file
        $this->generateTestReport();
    }

    private function generateTestReport()
    {
        $report_file = __DIR__ . '/test_report_' . date('Y-m-d_H-i-s') . '.md';

        $report = "# API System Test Report\n\n";
        $report .= "**Date:** " . date('Y-m-d H:i:s') . "\n";
        $report .= "**PHP Version:** " . PHP_VERSION . "\n";
        $report .= "**Total Tests:** {$this->total_tests}\n";
        $report .= "**Passed:** {$this->total_passed}\n";
        $report .= "**Failed:** {$this->total_failed}\n";
        $report .= "**Success Rate:** " . ($this->total_tests > 0 ? round(($this->total_passed / $this->total_tests) * 100, 2) : 0) . "%\n\n";

        $report .= "## Test Results by Class\n\n";

        foreach ($this->test_results as $class_name => $results) {
            $status = $results['failed'] > 0 ? "❌ FAILED" : "✅ PASSED";
            $report .= "### {$class_name} - {$status}\n\n";
            $report .= "- **Total Tests:** {$results['total']}\n";
            $report .= "- **Passed:** {$results['passed']}\n";
            $report .= "- **Failed:** {$results['failed']}\n\n";

            if ($results['failed'] > 0 && isset($results['results'])) {
                $report .= "#### Failed Tests:\n\n";
                foreach ($results['results'] as $result) {
                    if (!$result['passed']) {
                        $report .= "- {$result['message']}\n";
                    }
                }
                $report .= "\n";
            }
        }

        file_put_contents($report_file, $report);
        echo "Test report generated: {$report_file}\n";
    }
}

// Run the tests
$runner = new TestRunner();
$runner->runAllTests();
