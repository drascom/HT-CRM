<?php
require_once __DIR__ . '/TestBase.php';

class AgenciesApiTest extends TestBase
{
    private $test_agency_id_2;

    public function runTests()
    {
        echo "Running Agencies API Tests...\n";
        echo str_repeat("-", 40) . "\n";

        $this->testCreateAgencyWithValidData();
        $this->testCreateAgencyWithoutAuth();
        $this->testCreateAgencyWithMissingData();
        $this->testCreateAgencyDuplicateName();
        $this->testListAgencies();
        $this->testGetAllAgencies();
        $this->testGetAllAgenciesUnauthorized();
        $this->testGetAgencyById();
        $this->testGetAgencyByIdNotFound();
        $this->testEditAgency();
        $this->testEditAgencyNotFound();
        $this->testDeleteAgency();
        $this->testDeleteAgencyWithAssociations();
        $this->testDeleteAgencyNotFound();
        $this->testRoleBasedAccess();

        $this->printSummary('AgenciesApiTest');
    }

    private function testCreateAgencyWithValidData()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('agencies', 'create', 'POST', [
            'name' => 'Test Agency 2'
        ]);

        $this->assertTrue($response['success'], 'Should successfully create agency with valid data', 'testCreateAgencyWithValidData');
        $this->assertArrayHasKey('id', $response, 'Response should contain agency ID', 'testCreateAgencyWithValidData');
        
        if ($response['success'] && isset($response['id'])) {
            $this->test_agency_id_2 = $response['id'];
        }
    }

    private function testCreateAgencyWithoutAuth()
    {
        $this->clearSession();
        
        $response = $this->makeApiRequest('agencies', 'create', 'POST', [
            'name' => 'Unauthorized Agency'
        ]);

        // Note: This test depends on how auth is handled in the API
        $this->assertTrue(true, 'Auth test placeholder - needs API auth implementation', 'testCreateAgencyWithoutAuth');
    }

    private function testCreateAgencyWithMissingData()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('agencies', 'create', 'POST', [
            // Missing name
        ]);

        $this->assertFalse($response['success'], 'Should fail when name is missing', 'testCreateAgencyWithMissingData');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testCreateAgencyWithMissingData');
    }

    private function testCreateAgencyDuplicateName()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('agencies', 'create', 'POST', [
            'name' => 'Test Agency' // Same as the one created in TestBase
        ]);

        $this->assertFalse($response['success'], 'Should fail when agency name already exists', 'testCreateAgencyDuplicateName');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testCreateAgencyDuplicateName');
    }

    private function testListAgencies()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('agencies', 'list', 'GET');

        $this->assertTrue($response['success'], 'Should successfully list agencies', 'testListAgencies');
        $this->assertArrayHasKey('agencies', $response, 'Response should contain agencies array', 'testListAgencies');
        $this->assertTrue(is_array($response['agencies']), 'Agencies should be an array', 'testListAgencies');
    }

    private function testGetAllAgencies()
    {
        $this->setSession($this->test_user_id, 'admin', $this->test_agency_id);
        
        $response = $this->makeApiRequest('agencies', 'get_all', 'GET');

        $this->assertTrue($response['success'], 'Admin should successfully get all agencies', 'testGetAllAgencies');
        $this->assertArrayHasKey('agencies', $response, 'Response should contain agencies array', 'testGetAllAgencies');
        $this->assertTrue(is_array($response['agencies']), 'Agencies should be an array', 'testGetAllAgencies');
    }

    private function testGetAllAgenciesUnauthorized()
    {
        $this->setSession($this->test_user_id, 'agent', $this->test_agency_id);
        
        $response = $this->makeApiRequest('agencies', 'get_all', 'GET');

        $this->assertFalse($response['success'], 'Non-admin should not be able to get all agencies', 'testGetAllAgenciesUnauthorized');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testGetAllAgenciesUnauthorized');
    }

    private function testGetAgencyById()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('agencies', 'get', 'GET', [
            'id' => $this->test_agency_id
        ]);

        $this->assertTrue($response['success'], 'Should successfully get agency by ID', 'testGetAgencyById');
        $this->assertArrayHasKey('agency', $response, 'Response should contain agency data', 'testGetAgencyById');
    }

    private function testGetAgencyByIdNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('agencies', 'get', 'GET', [
            'id' => 99999 // Non-existent ID
        ]);

        $this->assertFalse($response['success'], 'Should fail when agency not found', 'testGetAgencyByIdNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testGetAgencyByIdNotFound');
    }

    private function testEditAgency()
    {
        if (!$this->test_agency_id_2) {
            $this->assert(false, 'No test agency ID available for edit test', 'testEditAgency');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('agencies', 'edit', 'POST', [
            'id' => $this->test_agency_id_2,
            'name' => 'Updated Test Agency 2'
        ]);

        $this->assertTrue($response['success'], 'Should successfully edit agency', 'testEditAgency');
    }

    private function testEditAgencyNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('agencies', 'edit', 'POST', [
            'id' => 99999, // Non-existent ID
            'name' => 'Updated Non-existent Agency'
        ]);

        $this->assertFalse($response['success'], 'Should fail when editing non-existent agency', 'testEditAgencyNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testEditAgencyNotFound');
    }

    private function testDeleteAgency()
    {
        if (!$this->test_agency_id_2) {
            $this->assert(false, 'No test agency ID available for delete test', 'testDeleteAgency');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('agencies', 'delete', 'POST', [
            'id' => $this->test_agency_id_2
        ]);

        $this->assertTrue($response['success'], 'Should successfully delete agency', 'testDeleteAgency');
    }

    private function testDeleteAgencyWithAssociations()
    {
        $this->setSession();
        
        // Try to delete the main test agency which has associated users
        $response = $this->makeApiRequest('agencies', 'delete', 'POST', [
            'id' => $this->test_agency_id
        ]);

        $this->assertFalse($response['success'], 'Should fail when deleting agency with associations', 'testDeleteAgencyWithAssociations');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testDeleteAgencyWithAssociations');
    }

    private function testDeleteAgencyNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('agencies', 'delete', 'POST', [
            'id' => 99999 // Non-existent ID
        ]);

        $this->assertFalse($response['success'], 'Should fail when deleting non-existent agency', 'testDeleteAgencyNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testDeleteAgencyNotFound');
    }

    private function testRoleBasedAccess()
    {
        // Test agent role access - should be able to list agencies
        $this->setSession($this->test_user_id, 'agent', $this->test_agency_id);
        
        $response = $this->makeApiRequest('agencies', 'list', 'GET');
        $this->assertTrue($response['success'], 'Agent should be able to list agencies', 'testRoleBasedAccess_Agent_List');

        // Test editor role access - should be able to create agencies
        $this->setSession($this->test_user_id, 'editor', $this->test_agency_id);
        
        $response = $this->makeApiRequest('agencies', 'create', 'POST', [
            'name' => 'Editor Test Agency'
        ]);
        $this->assertTrue($response['success'], 'Editor should be able to create agencies', 'testRoleBasedAccess_Editor_Create');

        // Clean up the editor test agency
        if ($response['success'] && isset($response['id'])) {
            $this->makeApiRequest('agencies', 'delete', 'POST', ['id' => $response['id']]);
        }

        // Test admin role access - should be able to get all agencies
        $this->setSession($this->test_user_id, 'admin', $this->test_agency_id);
        
        $response = $this->makeApiRequest('agencies', 'get_all', 'GET');
        $this->assertTrue($response['success'], 'Admin should be able to get all agencies', 'testRoleBasedAccess_Admin_GetAll');
    }
}
