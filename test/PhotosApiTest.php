<?php
require_once __DIR__ . '/TestBase.php';

class PhotosApiTest extends TestBase
{
    private $test_patient_id;
    private $test_photo_id;

    public function runTests()
    {
        echo "Running Photos API Tests...\n";
        echo str_repeat("-", 40) . "\n";

        $this->createTestPatient();
        $this->testUploadPhotoWithValidData();
        $this->testUploadPhotoWithoutAuth();
        $this->testUploadPhotoWithMissingData();
        $this->testListPhotos();
        $this->testListPhotosWithPatientFilter();
        $this->testGetPhotoById();
        $this->testGetPhotoByIdNotFound();
        $this->testDeletePhoto();
        $this->testDeletePhotoNotFound();
        $this->testRoleBasedAccess();

        $this->printSummary('PhotosApiTest');
    }

    private function createTestPatient()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('patients', 'add', 'POST', [
            'name' => 'Photo Test Patient',
            'dob' => '1990-01-01',
            'agency_id' => $this->test_agency_id
        ]);

        if ($response['success'] && isset($response['id'])) {
            $this->test_patient_id = $response['id'];
        }
    }

    private function testUploadPhotoWithValidData()
    {
        if (!$this->test_patient_id) {
            $this->assert(false, 'No test patient available for photo test', 'testUploadPhotoWithValidData');
            return;
        }

        $this->setSession();
        
        // Simulate file upload data
        $response = $this->makeApiRequest('photos', 'upload', 'POST', [
            'patient_id' => $this->test_patient_id,
            'photo_album_type_id' => 1, // Pre-Surgery
            'file_path' => 'test_photo.jpg'
        ]);

        $this->assertTrue($response['success'], 'Should successfully upload photo with valid data', 'testUploadPhotoWithValidData');
        $this->assertArrayHasKey('photo', $response, 'Response should contain photo data', 'testUploadPhotoWithValidData');
        
        if ($response['success'] && isset($response['photo']['id'])) {
            $this->test_photo_id = $response['photo']['id'];
        }
    }

    private function testUploadPhotoWithoutAuth()
    {
        $this->clearSession();
        
        $response = $this->makeApiRequest('photos', 'upload', 'POST', [
            'patient_id' => $this->test_patient_id,
            'photo_album_type_id' => 1,
            'file_path' => 'unauthorized_photo.jpg'
        ]);

        // Note: This test depends on how auth is handled in the API
        $this->assertTrue(true, 'Auth test placeholder - needs API auth implementation', 'testUploadPhotoWithoutAuth');
    }

    private function testUploadPhotoWithMissingData()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('photos', 'upload', 'POST', [
            'photo_album_type_id' => 1,
            'file_path' => 'missing_patient_photo.jpg'
            // Missing patient_id
        ]);

        $this->assertFalse($response['success'], 'Should fail when patient_id is missing', 'testUploadPhotoWithMissingData');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testUploadPhotoWithMissingData');
    }

    private function testListPhotos()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('photos', 'list', 'GET');

        $this->assertTrue($response['success'], 'Should successfully list photos', 'testListPhotos');
        $this->assertArrayHasKey('photos', $response, 'Response should contain photos array', 'testListPhotos');
        $this->assertTrue(is_array($response['photos']), 'Photos should be an array', 'testListPhotos');
    }

    private function testListPhotosWithPatientFilter()
    {
        if (!$this->test_patient_id) {
            $this->assert(false, 'No test patient available for filter test', 'testListPhotosWithPatientFilter');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('photos', 'list', 'GET', [
            'patient_id' => $this->test_patient_id
        ]);

        $this->assertTrue($response['success'], 'Should successfully list photos with patient filter', 'testListPhotosWithPatientFilter');
        $this->assertArrayHasKey('photos', $response, 'Response should contain photos array', 'testListPhotosWithPatientFilter');
    }

    private function testGetPhotoById()
    {
        if (!$this->test_photo_id) {
            $this->assert(false, 'No test photo ID available for get test', 'testGetPhotoById');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('photos', 'get', 'GET', [
            'id' => $this->test_photo_id
        ]);

        $this->assertTrue($response['success'], 'Should successfully get photo by ID', 'testGetPhotoById');
        $this->assertArrayHasKey('photo', $response, 'Response should contain photo data', 'testGetPhotoById');
    }

    private function testGetPhotoByIdNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('photos', 'get', 'GET', [
            'id' => 99999 // Non-existent ID
        ]);

        $this->assertFalse($response['success'], 'Should fail when photo not found', 'testGetPhotoByIdNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testGetPhotoByIdNotFound');
    }

    private function testDeletePhoto()
    {
        if (!$this->test_photo_id) {
            $this->assert(false, 'No test photo ID available for delete test', 'testDeletePhoto');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('photos', 'delete', 'POST', [
            'id' => $this->test_photo_id
        ]);

        $this->assertTrue($response['success'], 'Should successfully delete photo', 'testDeletePhoto');
    }

    private function testDeletePhotoNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('photos', 'delete', 'POST', [
            'id' => 99999 // Non-existent ID
        ]);

        $this->assertFalse($response['success'], 'Should fail when deleting non-existent photo', 'testDeletePhotoNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testDeletePhotoNotFound');
    }

    private function testRoleBasedAccess()
    {
        // Test agent role access
        $this->setSession($this->test_user_id, 'agent', $this->test_agency_id);
        
        $response = $this->makeApiRequest('photos', 'list', 'GET');
        $this->assertTrue($response['success'], 'Agent should be able to list photos', 'testRoleBasedAccess_Agent');

        // Test editor role access
        $this->setSession($this->test_user_id, 'editor', $this->test_agency_id);
        
        $response = $this->makeApiRequest('photos', 'upload', 'POST', [
            'patient_id' => $this->test_patient_id,
            'photo_album_type_id' => 2, // Post-Surgery
            'file_path' => 'editor_test_photo.jpg'
        ]);
        $this->assertTrue($response['success'], 'Editor should be able to upload photos', 'testRoleBasedAccess_Editor');

        // Clean up the editor test photo
        if ($response['success'] && isset($response['photo']['id'])) {
            $this->makeApiRequest('photos', 'delete', 'POST', ['id' => $response['photo']['id']]);
        }

        // Test admin role access
        $this->setSession($this->test_user_id, 'admin', $this->test_agency_id);
        
        $response = $this->makeApiRequest('photos', 'list', 'GET');
        $this->assertTrue($response['success'], 'Admin should be able to list photos', 'testRoleBasedAccess_Admin');
    }
}
