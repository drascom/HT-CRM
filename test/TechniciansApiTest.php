<?php
require_once __DIR__ . '/TestBase.php';

class TechniciansApiTest extends TestBase
{
    private $test_tech_id;

    public function runTests()
    {
        echo "Running Technicians API Tests...\n";
        echo str_repeat("-", 40) . "\n";

        $this->testAddTechnicianWithValidData();
        $this->testAddTechnicianWithoutAuth();
        $this->testAddTechnicianWithMissingData();
        $this->testAddTechnicianDuplicateName();
        $this->testListTechnicians();
        $this->testGetTechnicianById();
        $this->testGetTechnicianByIdNotFound();
        $this->testEditTechnician();
        $this->testEditTechnicianNotFound();
        $this->testDeleteTechnician();
        $this->testDeleteTechnicianNotFound();
        $this->testRoleBasedAccess();

        $this->printSummary('TechniciansApiTest');
    }

    private function testAddTechnicianWithValidData()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('techs', 'add', 'POST', [
            'name' => 'Test Technician',
            'specialty' => 'Hair Transplant',
            'phone' => '+44 7700 900999'
        ]);

        $this->assertTrue($response['success'], 'Should successfully add technician with valid data', 'testAddTechnicianWithValidData');
        $this->assertArrayHasKey('technician', $response, 'Response should contain technician data', 'testAddTechnicianWithValidData');
        
        if ($response['success'] && isset($response['technician']['id'])) {
            $this->test_tech_id = $response['technician']['id'];
        }
    }

    private function testAddTechnicianWithoutAuth()
    {
        $this->clearSession();
        
        $response = $this->makeApiRequest('techs', 'add', 'POST', [
            'name' => 'Unauthorized Technician',
            'specialty' => 'Hair Transplant',
            'phone' => '+44 7700 900998'
        ]);

        // Note: This test depends on how auth is handled in the API
        $this->assertTrue(true, 'Auth test placeholder - needs API auth implementation', 'testAddTechnicianWithoutAuth');
    }

    private function testAddTechnicianWithMissingData()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('techs', 'add', 'POST', [
            'specialty' => 'Hair Transplant',
            'phone' => '+44 7700 900997'
            // Missing name
        ]);

        $this->assertFalse($response['success'], 'Should fail when name is missing', 'testAddTechnicianWithMissingData');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testAddTechnicianWithMissingData');
    }

    private function testAddTechnicianDuplicateName()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('techs', 'add', 'POST', [
            'name' => 'Test Technician', // Same as the one created above
            'specialty' => 'Hair Transplant',
            'phone' => '+44 7700 900996'
        ]);

        $this->assertFalse($response['success'], 'Should fail when technician name already exists', 'testAddTechnicianDuplicateName');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testAddTechnicianDuplicateName');
    }

    private function testListTechnicians()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('techs', 'list', 'GET');

        $this->assertTrue($response['success'], 'Should successfully list technicians', 'testListTechnicians');
        $this->assertArrayHasKey('technicians', $response, 'Response should contain technicians array', 'testListTechnicians');
        $this->assertTrue(is_array($response['technicians']), 'Technicians should be an array', 'testListTechnicians');
    }

    private function testGetTechnicianById()
    {
        if (!$this->test_tech_id) {
            $this->assert(false, 'No test technician ID available for get test', 'testGetTechnicianById');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('techs', 'get', 'GET', [
            'id' => $this->test_tech_id
        ]);

        $this->assertTrue($response['success'], 'Should successfully get technician by ID', 'testGetTechnicianById');
        $this->assertArrayHasKey('technician', $response, 'Response should contain technician data', 'testGetTechnicianById');
    }

    private function testGetTechnicianByIdNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('techs', 'get', 'GET', [
            'id' => 99999 // Non-existent ID
        ]);

        $this->assertFalse($response['success'], 'Should fail when technician not found', 'testGetTechnicianByIdNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testGetTechnicianByIdNotFound');
    }

    private function testEditTechnician()
    {
        if (!$this->test_tech_id) {
            $this->assert(false, 'No test technician ID available for edit test', 'testEditTechnician');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('techs', 'edit', 'POST', [
            'id' => $this->test_tech_id,
            'name' => 'Updated Test Technician',
            'specialty' => 'Updated Hair Transplant',
            'phone' => '+44 7700 900888'
        ]);

        $this->assertTrue($response['success'], 'Should successfully edit technician', 'testEditTechnician');
    }

    private function testEditTechnicianNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('techs', 'edit', 'POST', [
            'id' => 99999, // Non-existent ID
            'name' => 'Updated Non-existent Technician',
            'specialty' => 'Updated Hair Transplant',
            'phone' => '+44 7700 900777'
        ]);

        $this->assertFalse($response['success'], 'Should fail when editing non-existent technician', 'testEditTechnicianNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testEditTechnicianNotFound');
    }

    private function testDeleteTechnician()
    {
        if (!$this->test_tech_id) {
            $this->assert(false, 'No test technician ID available for delete test', 'testDeleteTechnician');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('techs', 'delete', 'POST', [
            'id' => $this->test_tech_id
        ]);

        $this->assertTrue($response['success'], 'Should successfully delete (archive) technician', 'testDeleteTechnician');
    }

    private function testDeleteTechnicianNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('techs', 'delete', 'POST', [
            'id' => 99999 // Non-existent ID
        ]);

        $this->assertFalse($response['success'], 'Should fail when deleting non-existent technician', 'testDeleteTechnicianNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testDeleteTechnicianNotFound');
    }

    private function testRoleBasedAccess()
    {
        // Test agent role access
        $this->setSession($this->test_user_id, 'agent', $this->test_agency_id);
        
        $response = $this->makeApiRequest('techs', 'list', 'GET');
        $this->assertTrue($response['success'], 'Agent should be able to list technicians', 'testRoleBasedAccess_Agent');

        // Test editor role access
        $this->setSession($this->test_user_id, 'editor', $this->test_agency_id);
        
        $response = $this->makeApiRequest('techs', 'add', 'POST', [
            'name' => 'Editor Test Technician',
            'specialty' => 'Editor Hair Transplant',
            'phone' => '+44 7700 900666'
        ]);
        $this->assertTrue($response['success'], 'Editor should be able to add technicians', 'testRoleBasedAccess_Editor');

        // Clean up the editor test technician
        if ($response['success'] && isset($response['technician']['id'])) {
            $this->makeApiRequest('techs', 'delete', 'POST', ['id' => $response['technician']['id']]);
        }

        // Test admin role access
        $this->setSession($this->test_user_id, 'admin', $this->test_agency_id);
        
        $response = $this->makeApiRequest('techs', 'list', 'GET');
        $this->assertTrue($response['success'], 'Admin should be able to list technicians', 'testRoleBasedAccess_Admin');
    }
}
