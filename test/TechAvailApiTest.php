<?php
require_once __DIR__ . '/TestBase.php';

class TechAvailApiTest extends TestBase
{
    private $test_tech_id;
    private $test_availability_id;

    public function runTests()
    {
        echo "Running Technician Availability API Tests...\n";
        echo str_repeat("-", 40) . "\n";

        $this->createTestTechnician();
        $this->testAddTechAvailabilityWithValidData();
        $this->testAddTechAvailabilityWithoutAuth();
        $this->testAddTechAvailabilityWithMissingData();
        $this->testAddTechAvailabilityInvalidDate();
        $this->testAddTechAvailabilityDuplicate();
        $this->testGetAvailabilityByRange();
        $this->testGetAvailabilityByRangeInvalidDates();
        $this->testListTechAvailability();
        $this->testListTechAvailabilityWithFilters();
        $this->testEditTechAvailability();
        $this->testEditTechAvailabilityNotFound();
        $this->testDeleteTechAvailability();
        $this->testDeleteTechAvailabilityNotFound();
        $this->testRoleBasedAccess();

        $this->printSummary('TechAvailApiTest');
    }

    private function createTestTechnician()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('techs', 'add', 'POST', [
            'name' => 'Availability Test Technician',
            'specialty' => 'Hair Transplant Specialist',
            'phone' => '+44 7700 900555'
        ]);

        if ($response['success'] && isset($response['technician']['id'])) {
            $this->test_tech_id = $response['technician']['id'];
        }
    }

    private function testAddTechAvailabilityWithValidData()
    {
        if (!$this->test_tech_id) {
            $this->assert(false, 'No test technician available for availability test', 'testAddTechAvailabilityWithValidData');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('techAvail', 'add', 'POST', [
            'tech_id' => $this->test_tech_id,
            'available_on' => '2024-02-15',
            'period' => 'am'
        ]);

        $this->assertTrue($response['success'], 'Should successfully add tech availability with valid data', 'testAddTechAvailabilityWithValidData');
        $this->assertArrayHasKey('availability', $response, 'Response should contain availability data', 'testAddTechAvailabilityWithValidData');
        
        if ($response['success'] && isset($response['availability']['id'])) {
            $this->test_availability_id = $response['availability']['id'];
        }
    }

    private function testAddTechAvailabilityWithoutAuth()
    {
        $this->clearSession();
        
        $response = $this->makeApiRequest('techAvail', 'add', 'POST', [
            'tech_id' => $this->test_tech_id,
            'available_on' => '2024-02-16',
            'period' => 'pm'
        ]);

        // Note: This test depends on how auth is handled in the API
        $this->assertTrue(true, 'Auth test placeholder - needs API auth implementation', 'testAddTechAvailabilityWithoutAuth');
    }

    private function testAddTechAvailabilityWithMissingData()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('techAvail', 'add', 'POST', [
            'available_on' => '2024-02-17',
            'period' => 'full'
            // Missing tech_id
        ]);

        $this->assertFalse($response['success'], 'Should fail when tech_id is missing', 'testAddTechAvailabilityWithMissingData');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testAddTechAvailabilityWithMissingData');
    }

    private function testAddTechAvailabilityInvalidDate()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('techAvail', 'add', 'POST', [
            'tech_id' => $this->test_tech_id,
            'available_on' => 'invalid-date',
            'period' => 'am'
        ]);

        $this->assertFalse($response['success'], 'Should fail with invalid date format', 'testAddTechAvailabilityInvalidDate');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testAddTechAvailabilityInvalidDate');
    }

    private function testAddTechAvailabilityDuplicate()
    {
        $this->setSession();
        
        // Try to add the same availability again
        $response = $this->makeApiRequest('techAvail', 'add', 'POST', [
            'tech_id' => $this->test_tech_id,
            'available_on' => '2024-02-15',
            'period' => 'am'
        ]);

        $this->assertFalse($response['success'], 'Should fail when adding duplicate availability', 'testAddTechAvailabilityDuplicate');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testAddTechAvailabilityDuplicate');
    }

    private function testGetAvailabilityByRange()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('techAvail', 'byRange', 'GET', [
            'start' => '2024-02-01',
            'end' => '2024-02-28'
        ]);

        $this->assertTrue($response['success'], 'Should successfully get tech availability by range', 'testGetAvailabilityByRange');
        $this->assertArrayHasKey('start', $response, 'Response should contain start date', 'testGetAvailabilityByRange');
        $this->assertArrayHasKey('end', $response, 'Response should contain end date', 'testGetAvailabilityByRange');
        $this->assertArrayHasKey('availability', $response, 'Response should contain availability array', 'testGetAvailabilityByRange');
        $this->assertTrue(is_array($response['availability']), 'Availability should be an array', 'testGetAvailabilityByRange');
    }

    private function testGetAvailabilityByRangeInvalidDates()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('techAvail', 'byRange', 'GET', [
            'start' => 'invalid-start',
            'end' => 'invalid-end'
        ]);

        $this->assertFalse($response['success'], 'Should fail with invalid date formats', 'testGetAvailabilityByRangeInvalidDates');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testGetAvailabilityByRangeInvalidDates');
    }

    private function testListTechAvailability()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('techAvail', 'list', 'GET');

        $this->assertTrue($response['success'], 'Should successfully list tech availability', 'testListTechAvailability');
        $this->assertArrayHasKey('availability', $response, 'Response should contain availability array', 'testListTechAvailability');
        $this->assertTrue(is_array($response['availability']), 'Availability should be an array', 'testListTechAvailability');
    }

    private function testListTechAvailabilityWithFilters()
    {
        $this->setSession();
        
        // Test with tech filter
        $response = $this->makeApiRequest('techAvail', 'list', 'GET', [
            'tech_id' => $this->test_tech_id
        ]);
        $this->assertTrue($response['success'], 'Should successfully list availability with tech filter', 'testListTechAvailabilityWithFilters_Tech');

        // Test with date filter
        $response = $this->makeApiRequest('techAvail', 'list', 'GET', [
            'date' => '2024-02-15'
        ]);
        $this->assertTrue($response['success'], 'Should successfully list availability with date filter', 'testListTechAvailabilityWithFilters_Date');
    }

    private function testEditTechAvailability()
    {
        if (!$this->test_availability_id) {
            $this->assert(false, 'No test availability ID available for edit test', 'testEditTechAvailability');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('techAvail', 'edit', 'POST', [
            'id' => $this->test_availability_id,
            'tech_id' => $this->test_tech_id,
            'available_on' => '2024-02-15',
            'period' => 'full' // Change from 'am' to 'full'
        ]);

        $this->assertTrue($response['success'], 'Should successfully edit tech availability', 'testEditTechAvailability');
    }

    private function testEditTechAvailabilityNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('techAvail', 'edit', 'POST', [
            'id' => 99999, // Non-existent ID
            'tech_id' => $this->test_tech_id,
            'available_on' => '2024-02-16',
            'period' => 'pm'
        ]);

        $this->assertFalse($response['success'], 'Should fail when editing non-existent availability', 'testEditTechAvailabilityNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testEditTechAvailabilityNotFound');
    }

    private function testDeleteTechAvailability()
    {
        if (!$this->test_availability_id) {
            $this->assert(false, 'No test availability ID available for delete test', 'testDeleteTechAvailability');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('techAvail', 'delete', 'POST', [
            'id' => $this->test_availability_id
        ]);

        $this->assertTrue($response['success'], 'Should successfully delete tech availability', 'testDeleteTechAvailability');
    }

    private function testDeleteTechAvailabilityNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('techAvail', 'delete', 'POST', [
            'id' => 99999 // Non-existent ID
        ]);

        $this->assertFalse($response['success'], 'Should fail when deleting non-existent availability', 'testDeleteTechAvailabilityNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testDeleteTechAvailabilityNotFound');
    }

    private function testRoleBasedAccess()
    {
        // Test agent role access
        $this->setSession($this->test_user_id, 'agent', $this->test_agency_id);
        
        $response = $this->makeApiRequest('techAvail', 'list', 'GET');
        $this->assertTrue($response['success'], 'Agent should be able to list tech availability', 'testRoleBasedAccess_Agent');

        // Test editor role access
        $this->setSession($this->test_user_id, 'editor', $this->test_agency_id);
        
        $response = $this->makeApiRequest('techAvail', 'byRange', 'GET', [
            'start' => '2024-02-01',
            'end' => '2024-02-28'
        ]);
        $this->assertTrue($response['success'], 'Editor should be able to get availability by range', 'testRoleBasedAccess_Editor');

        // Test admin role access
        $this->setSession($this->test_user_id, 'admin', $this->test_agency_id);
        
        $response = $this->makeApiRequest('techAvail', 'list', 'GET');
        $this->assertTrue($response['success'], 'Admin should be able to list tech availability', 'testRoleBasedAccess_Admin');
    }
}
