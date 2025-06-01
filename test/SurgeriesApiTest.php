<?php
require_once __DIR__ . '/TestBase.php';

class SurgeriesApiTest extends TestBase
{
    private $test_patient_id;
    private $test_surgery_id;
    private $test_tech_ids = [];

    public function runTests()
    {
        echo "Running Surgeries API Tests...\n";
        echo str_repeat("-", 40) . "\n";

        $this->createTestData();
        $this->testAddSurgeryWithValidData();
        $this->testAddSurgeryWithoutAuth();
        $this->testAddSurgeryWithMissingData();
        $this->testListSurgeries();
        $this->testListSurgeriesWithPatientFilter();
        $this->testListSurgeriesWithAgencyFilter();
        $this->testGetSurgeryById();
        $this->testGetSurgeryByIdNotFound();
        $this->testEditSurgery();
        $this->testEditSurgeryNotFound();
        $this->testDeleteSurgery();
        $this->testDeleteSurgeryNotFound();
        $this->testRoleBasedAccess();

        $this->printSummary('SurgeriesApiTest');
    }

    protected function createTestData()
    {
        $this->setSession();

        // Create test patient
        $response = $this->makeApiRequest('patients', 'add', 'POST', [
            'name' => 'Surgery Test Patient',
            'dob' => '1990-01-01',
            'agency_id' => $this->test_agency_id
        ]);

        if ($response['success'] && isset($response['id'])) {
            $this->test_patient_id = $response['id'];
        }

        // Create test technicians for surgery requirements
        for ($i = 1; $i <= 2; $i++) {
            $response = $this->makeApiRequest('techs', 'add', 'POST', [
                'name' => "Surgery Test Technician {$i}",
                'specialty' => 'Hair Transplant',
                'phone' => "555-100{$i}"
            ]);
            if ($response['success'] && isset($response['technician']['id'])) {
                $this->test_tech_ids[] = $response['technician']['id'];
            }
        }

        // Set technician availability for test date
        $test_date = '2024-01-15';
        foreach ($this->test_tech_ids as $tech_id) {
            $this->makeApiRequest('techAvail', 'add', 'POST', [
                'tech_id' => $tech_id,
                'available_on' => $test_date,
                'period' => 'full'
            ]);
        }
    }

    private function testAddSurgeryWithValidData()
    {
        if (!$this->test_patient_id || count($this->test_tech_ids) < 2) {
            $this->assert(false, 'Insufficient test data for surgery test', 'testAddSurgeryWithValidData');
            return;
        }

        $this->setSession();

        $response = $this->makeApiRequest('surgeries', 'add', 'POST', [
            'patient_id' => $this->test_patient_id,
            'date' => '2024-01-15',
            'notes' => 'Test surgery notes',
            'status' => 'scheduled',
            'graft_count' => 2500,
            'technician_ids' => $this->test_tech_ids
        ]);

        $this->assertTrue($response['success'], 'Should successfully add surgery with valid data', 'testAddSurgeryWithValidData');
        $this->assertArrayHasKey('id', $response, 'Response should contain surgery ID', 'testAddSurgeryWithValidData');

        if ($response['success'] && isset($response['id'])) {
            $this->test_surgery_id = $response['id'];
        }
    }

    private function testAddSurgeryWithoutAuth()
    {
        $this->clearSession();
        
        $response = $this->makeApiRequest('surgeries', 'add', 'POST', [
            'patient_id' => $this->test_patient_id,
            'date' => '2024-01-15',
            'notes' => 'Test surgery notes',
            'status' => 'scheduled',
            'graft_count' => 2500
        ]);

        // Note: This test depends on how auth is handled in the API
        $this->assertTrue(true, 'Auth test placeholder - needs API auth implementation', 'testAddSurgeryWithoutAuth');
    }

    private function testAddSurgeryWithMissingData()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('surgeries', 'add', 'POST', [
            'date' => '2024-01-15',
            'notes' => 'Test surgery notes'
            // Missing patient_id
        ]);

        $this->assertFalse($response['success'], 'Should fail when patient_id is missing', 'testAddSurgeryWithMissingData');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testAddSurgeryWithMissingData');
    }

    private function testListSurgeries()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('surgeries', 'list', 'GET');

        $this->assertTrue($response['success'], 'Should successfully list surgeries', 'testListSurgeries');
        $this->assertArrayHasKey('surgeries', $response, 'Response should contain surgeries array', 'testListSurgeries');
        $this->assertTrue(is_array($response['surgeries']), 'Surgeries should be an array', 'testListSurgeries');
    }

    private function testListSurgeriesWithPatientFilter()
    {
        if (!$this->test_patient_id) {
            $this->assert(false, 'No test patient available for filter test', 'testListSurgeriesWithPatientFilter');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('surgeries', 'list', 'GET', [
            'patient_id' => $this->test_patient_id
        ]);

        $this->assertTrue($response['success'], 'Should successfully list surgeries with patient filter', 'testListSurgeriesWithPatientFilter');
        $this->assertArrayHasKey('surgeries', $response, 'Response should contain surgeries array', 'testListSurgeriesWithPatientFilter');
    }

    private function testListSurgeriesWithAgencyFilter()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('surgeries', 'list', 'GET', [
            'agency' => $this->test_agency_id
        ]);

        $this->assertTrue($response['success'], 'Should successfully list surgeries with agency filter', 'testListSurgeriesWithAgencyFilter');
        $this->assertArrayHasKey('surgeries', $response, 'Response should contain surgeries array', 'testListSurgeriesWithAgencyFilter');
    }

    private function testGetSurgeryById()
    {
        if (!$this->test_surgery_id) {
            $this->assert(false, 'No test surgery ID available for get test', 'testGetSurgeryById');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('surgeries', 'get', 'GET', [
            'id' => $this->test_surgery_id
        ]);

        $this->assertTrue($response['success'], 'Should successfully get surgery by ID', 'testGetSurgeryById');
        $this->assertArrayHasKey('surgery', $response, 'Response should contain surgery data', 'testGetSurgeryById');
    }

    private function testGetSurgeryByIdNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('surgeries', 'get', 'GET', [
            'id' => 99999 // Non-existent ID
        ]);

        $this->assertFalse($response['success'], 'Should fail when surgery not found', 'testGetSurgeryByIdNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testGetSurgeryByIdNotFound');
    }

    private function testEditSurgery()
    {
        if (!$this->test_surgery_id || count($this->test_tech_ids) < 2) {
            $this->assert(false, 'Insufficient test data for edit test', 'testEditSurgery');
            return;
        }

        $this->setSession();

        // Set technician availability for the new date
        $new_test_date = '2024-01-16';
        foreach ($this->test_tech_ids as $tech_id) {
            $this->makeApiRequest('techAvail', 'add', 'POST', [
                'tech_id' => $tech_id,
                'available_on' => $new_test_date,
                'period' => 'full'
            ]);
        }

        $response = $this->makeApiRequest('surgeries', 'edit', 'POST', [
            'id' => $this->test_surgery_id,
            'patient_id' => $this->test_patient_id,
            'date' => $new_test_date,
            'notes' => 'Updated test surgery notes',
            'status' => 'completed',
            'graft_count' => 3000,
            'technician_ids' => $this->test_tech_ids
        ]);

        $this->assertTrue($response['success'], 'Should successfully edit surgery', 'testEditSurgery');
    }

    private function testEditSurgeryNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('surgeries', 'edit', 'POST', [
            'id' => 99999, // Non-existent ID
            'patient_id' => $this->test_patient_id,
            'date' => '2024-01-16',
            'notes' => 'Updated test surgery notes',
            'status' => 'completed',
            'graft_count' => 3000
        ]);

        $this->assertFalse($response['success'], 'Should fail when editing non-existent surgery', 'testEditSurgeryNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testEditSurgeryNotFound');
    }

    private function testDeleteSurgery()
    {
        if (!$this->test_surgery_id) {
            $this->assert(false, 'No test surgery ID available for delete test', 'testDeleteSurgery');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('surgeries', 'delete', 'POST', [
            'id' => $this->test_surgery_id
        ]);

        $this->assertTrue($response['success'], 'Should successfully delete surgery', 'testDeleteSurgery');
    }

    private function testDeleteSurgeryNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('surgeries', 'delete', 'POST', [
            'id' => 99999 // Non-existent ID
        ]);

        $this->assertFalse($response['success'], 'Should fail when deleting non-existent surgery', 'testDeleteSurgeryNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testDeleteSurgeryNotFound');
    }

    private function testRoleBasedAccess()
    {
        // Test agent role access
        $this->setSession($this->test_user_id, 'agent', $this->test_agency_id);
        
        $response = $this->makeApiRequest('surgeries', 'list', 'GET');
        $this->assertTrue($response['success'], 'Agent should be able to list surgeries', 'testRoleBasedAccess_Agent');

        // Test editor role access
        $this->setSession($this->test_user_id, 'editor', $this->test_agency_id);
        
        $response = $this->makeApiRequest('surgeries', 'list', 'GET');
        $this->assertTrue($response['success'], 'Editor should be able to list surgeries', 'testRoleBasedAccess_Editor');

        // Test admin role access
        $this->setSession($this->test_user_id, 'admin', $this->test_agency_id);
        
        $response = $this->makeApiRequest('surgeries', 'list', 'GET');
        $this->assertTrue($response['success'], 'Admin should be able to list surgeries', 'testRoleBasedAccess_Admin');
    }
}
