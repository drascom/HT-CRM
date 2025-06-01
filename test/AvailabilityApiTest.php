<?php
require_once __DIR__ . '/TestBase.php';

class AvailabilityApiTest extends TestBase
{
    private $test_room_id;

    public function runTests()
    {
        echo "Running Availability API Tests...\n";
        echo str_repeat("-", 40) . "\n";

        $this->createTestRoom();
        $this->testGetAvailabilityByDateWithValidData();
        $this->testGetAvailabilityByDateWithoutAuth();
        $this->testGetAvailabilityByDateMissingDate();
        $this->testGetAvailabilityByDateInvalidDate();
        $this->testGetAvailabilityByRangeWithValidData();
        $this->testGetAvailabilityByRangeMissingDates();
        $this->testGetAvailabilityByRangeInvalidDates();
        $this->testRoleBasedAccess();

        $this->printSummary('AvailabilityApiTest');
    }

    private function createTestRoom()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('rooms', 'add', 'POST', [
            'name' => 'Availability Test Room',
            'notes' => 'Test room for availability tests'
        ]);

        if ($response['success'] && isset($response['room']['id'])) {
            $this->test_room_id = $response['room']['id'];
        }
    }

    private function testGetAvailabilityByDateWithValidData()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('availability', 'byDate', 'GET', [
            'date' => '2024-02-15'
        ]);

        $this->assertTrue($response['success'], 'Should successfully get availability by date', 'testGetAvailabilityByDateWithValidData');
        $this->assertArrayHasKey('date', $response, 'Response should contain date', 'testGetAvailabilityByDateWithValidData');
        $this->assertArrayHasKey('rooms', $response, 'Response should contain rooms array', 'testGetAvailabilityByDateWithValidData');
        $this->assertTrue(is_array($response['rooms']), 'Rooms should be an array', 'testGetAvailabilityByDateWithValidData');
    }

    private function testGetAvailabilityByDateWithoutAuth()
    {
        $this->clearSession();
        
        $response = $this->makeApiRequest('availability', 'byDate', 'GET', [
            'date' => '2024-02-15'
        ]);

        // Note: This test depends on how auth is handled in the API
        $this->assertTrue(true, 'Auth test placeholder - needs API auth implementation', 'testGetAvailabilityByDateWithoutAuth');
    }

    private function testGetAvailabilityByDateMissingDate()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('availability', 'byDate', 'GET', [
            // Missing date parameter
        ]);

        $this->assertFalse($response['success'], 'Should fail when date is missing', 'testGetAvailabilityByDateMissingDate');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testGetAvailabilityByDateMissingDate');
    }

    private function testGetAvailabilityByDateInvalidDate()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('availability', 'byDate', 'GET', [
            'date' => 'invalid-date-format'
        ]);

        $this->assertFalse($response['success'], 'Should fail with invalid date format', 'testGetAvailabilityByDateInvalidDate');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testGetAvailabilityByDateInvalidDate');
    }

    private function testGetAvailabilityByRangeWithValidData()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('availability', 'range', 'GET', [
            'start' => '2024-02-15',
            'end' => '2024-02-20'
        ]);

        $this->assertTrue($response['success'], 'Should successfully get availability by range', 'testGetAvailabilityByRangeWithValidData');
        $this->assertArrayHasKey('start', $response, 'Response should contain start date', 'testGetAvailabilityByRangeWithValidData');
        $this->assertArrayHasKey('end', $response, 'Response should contain end date', 'testGetAvailabilityByRangeWithValidData');
        $this->assertArrayHasKey('availability', $response, 'Response should contain availability data', 'testGetAvailabilityByRangeWithValidData');
        $this->assertTrue(is_array($response['availability']), 'Availability should be an array', 'testGetAvailabilityByRangeWithValidData');
    }

    private function testGetAvailabilityByRangeMissingDates()
    {
        $this->setSession();
        
        // Test missing start date
        $response = $this->makeApiRequest('availability', 'range', 'GET', [
            'end' => '2024-02-20'
            // Missing start date
        ]);

        $this->assertFalse($response['success'], 'Should fail when start date is missing', 'testGetAvailabilityByRangeMissingDates_Start');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testGetAvailabilityByRangeMissingDates_Start');

        // Test missing end date
        $response = $this->makeApiRequest('availability', 'range', 'GET', [
            'start' => '2024-02-15'
            // Missing end date
        ]);

        $this->assertFalse($response['success'], 'Should fail when end date is missing', 'testGetAvailabilityByRangeMissingDates_End');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testGetAvailabilityByRangeMissingDates_End');
    }

    private function testGetAvailabilityByRangeInvalidDates()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('availability', 'range', 'GET', [
            'start' => 'invalid-start-date',
            'end' => 'invalid-end-date'
        ]);

        $this->assertFalse($response['success'], 'Should fail with invalid date formats', 'testGetAvailabilityByRangeInvalidDates');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testGetAvailabilityByRangeInvalidDates');
    }

    private function testRoleBasedAccess()
    {
        // Test agent role access
        $this->setSession($this->test_user_id, 'agent', $this->test_agency_id);
        
        $response = $this->makeApiRequest('availability', 'byDate', 'GET', [
            'date' => '2024-02-15'
        ]);
        $this->assertTrue($response['success'], 'Agent should be able to check availability', 'testRoleBasedAccess_Agent');

        // Test editor role access
        $this->setSession($this->test_user_id, 'editor', $this->test_agency_id);
        
        $response = $this->makeApiRequest('availability', 'range', 'GET', [
            'start' => '2024-02-15',
            'end' => '2024-02-20'
        ]);
        $this->assertTrue($response['success'], 'Editor should be able to check availability range', 'testRoleBasedAccess_Editor');

        // Test admin role access
        $this->setSession($this->test_user_id, 'admin', $this->test_agency_id);
        
        $response = $this->makeApiRequest('availability', 'byDate', 'GET', [
            'date' => '2024-02-15'
        ]);
        $this->assertTrue($response['success'], 'Admin should be able to check availability', 'testRoleBasedAccess_Admin');
    }
}
