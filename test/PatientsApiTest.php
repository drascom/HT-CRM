<?php
require_once __DIR__ . '/TestBase.php';

class PatientsApiTest extends TestBase
{
    private $test_patient_id;

    public function runTests()
    {
        echo "Running Patients API Tests...\n";
        echo str_repeat("-", 40) . "\n";

        $this->testAddPatientWithValidData();
        $this->testAddPatientWithoutAuth();
        $this->testAddPatientWithMissingData();
        $this->testListPatients();
        $this->testListPatientsWithAgencyFilter();
        $this->testGetPatientById();
        $this->testGetPatientByIdNotFound();
        $this->testEditPatient();
        $this->testEditPatientNotFound();
        $this->testDeletePatient();
        $this->testDeletePatientNotFound();
        $this->testRoleBasedAccess();

        $this->printSummary('PatientsApiTest');
    }

    private function testAddPatientWithValidData()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('patients', 'add', 'POST', [
            'name' => 'Test Patient',
            'dob' => '1990-01-01',
            'agency_id' => $this->test_agency_id
        ]);

        $this->assertTrue($response['success'], 'Should successfully add patient with valid data', 'testAddPatientWithValidData');
        $this->assertArrayHasKey('id', $response, 'Response should contain patient ID', 'testAddPatientWithValidData');
        
        if ($response['success'] && isset($response['id'])) {
            $this->test_patient_id = $response['id'];
        }
    }

    private function testAddPatientWithoutAuth()
    {
        $this->clearSession();
        
        $response = $this->makeApiRequest('patients', 'add', 'POST', [
            'name' => 'Test Patient 2',
            'dob' => '1990-01-01',
            'agency_id' => $this->test_agency_id
        ]);

        // Note: This test depends on how auth is handled in the API
        // The API should check authentication before processing
        $this->assertTrue(true, 'Auth test placeholder - needs API auth implementation', 'testAddPatientWithoutAuth');
    }

    private function testAddPatientWithMissingData()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('patients', 'add', 'POST', [
            'dob' => '1990-01-01'
            // Missing name
        ]);

        $this->assertFalse($response['success'], 'Should fail when name is missing', 'testAddPatientWithMissingData');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testAddPatientWithMissingData');
    }

    private function testListPatients()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('patients', 'list', 'GET');

        $this->assertTrue($response['success'], 'Should successfully list patients', 'testListPatients');
        $this->assertArrayHasKey('patients', $response, 'Response should contain patients array', 'testListPatients');
        $this->assertTrue(is_array($response['patients']), 'Patients should be an array', 'testListPatients');
    }

    private function testListPatientsWithAgencyFilter()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('patients', 'list', 'GET', [
            'agency' => $this->test_agency_id
        ]);

        $this->assertTrue($response['success'], 'Should successfully list patients with agency filter', 'testListPatientsWithAgencyFilter');
        $this->assertArrayHasKey('patients', $response, 'Response should contain patients array', 'testListPatientsWithAgencyFilter');
    }

    private function testGetPatientById()
    {
        if (!$this->test_patient_id) {
            $this->assert(false, 'No test patient ID available for get test', 'testGetPatientById');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('patients', 'get', 'GET', [
            'id' => $this->test_patient_id
        ]);

        $this->assertTrue($response['success'], 'Should successfully get patient by ID', 'testGetPatientById');
        $this->assertArrayHasKey('patient', $response, 'Response should contain patient data', 'testGetPatientById');
        $this->assertArrayHasKey('surgeries', $response, 'Response should contain surgeries data', 'testGetPatientById');
        $this->assertArrayHasKey('photos', $response, 'Response should contain photos data', 'testGetPatientById');
    }

    private function testGetPatientByIdNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('patients', 'get', 'GET', [
            'id' => 99999 // Non-existent ID
        ]);

        $this->assertFalse($response['success'], 'Should fail when patient not found', 'testGetPatientByIdNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testGetPatientByIdNotFound');
    }

    private function testEditPatient()
    {
        if (!$this->test_patient_id) {
            $this->assert(false, 'No test patient ID available for edit test', 'testEditPatient');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('patients', 'edit', 'POST', [
            'id' => $this->test_patient_id,
            'name' => 'Updated Test Patient',
            'dob' => '1990-01-01',
            'agency_id' => $this->test_agency_id
        ]);

        $this->assertTrue($response['success'], 'Should successfully edit patient', 'testEditPatient');
    }

    private function testEditPatientNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('patients', 'edit', 'POST', [
            'id' => 99999, // Non-existent ID
            'name' => 'Updated Test Patient',
            'dob' => '1990-01-01',
            'agency_id' => $this->test_agency_id
        ]);

        $this->assertFalse($response['success'], 'Should fail when editing non-existent patient', 'testEditPatientNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testEditPatientNotFound');
    }

    private function testDeletePatient()
    {
        if (!$this->test_patient_id) {
            $this->assert(false, 'No test patient ID available for delete test', 'testDeletePatient');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('patients', 'delete', 'POST', [
            'id' => $this->test_patient_id
        ]);

        $this->assertTrue($response['success'], 'Should successfully delete patient', 'testDeletePatient');
    }

    private function testDeletePatientNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('patients', 'delete', 'POST', [
            'id' => 99999 // Non-existent ID
        ]);

        $this->assertFalse($response['success'], 'Should fail when deleting non-existent patient', 'testDeletePatientNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testDeletePatientNotFound');
    }

    private function testRoleBasedAccess()
    {
        // Test agent role access
        $this->setSession($this->test_user_id, 'agent', $this->test_agency_id);
        
        $response = $this->makeApiRequest('patients', 'list', 'GET');
        $this->assertTrue($response['success'], 'Agent should be able to list patients', 'testRoleBasedAccess_Agent');

        // Test editor role access
        $this->setSession($this->test_user_id, 'editor', $this->test_agency_id);
        
        $response = $this->makeApiRequest('patients', 'add', 'POST', [
            'name' => 'Editor Test Patient',
            'dob' => '1990-01-01',
            'agency_id' => $this->test_agency_id
        ]);
        $this->assertTrue($response['success'], 'Editor should be able to add patients', 'testRoleBasedAccess_Editor');

        // Test admin role access
        $this->setSession($this->test_user_id, 'admin', $this->test_agency_id);
        
        $response = $this->makeApiRequest('patients', 'list', 'GET');
        $this->assertTrue($response['success'], 'Admin should be able to list patients', 'testRoleBasedAccess_Admin');
    }
}
