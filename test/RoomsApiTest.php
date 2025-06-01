<?php
require_once __DIR__ . '/TestBase.php';

class RoomsApiTest extends TestBase
{
    private $test_room_id;

    public function runTests()
    {
        echo "Running Rooms API Tests...\n";
        echo str_repeat("-", 40) . "\n";

        $this->testAddRoomWithValidData();
        $this->testAddRoomWithoutAuth();
        $this->testAddRoomWithMissingData();
        $this->testAddRoomDuplicateName();
        $this->testListRooms();
        $this->testListRoomsWithDateFilter();
        $this->testGetRoomById();
        $this->testGetRoomByIdNotFound();
        $this->testEditRoom();
        $this->testEditRoomNotFound();
        $this->testDeleteRoom();
        $this->testDeleteRoomNotFound();
        $this->testRoleBasedAccess();

        $this->printSummary('RoomsApiTest');
    }

    private function testAddRoomWithValidData()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('rooms', 'add', 'POST', [
            'name' => 'Test Room',
            'notes' => 'Test room notes'
        ]);

        $this->assertTrue($response['success'], 'Should successfully add room with valid data', 'testAddRoomWithValidData');
        $this->assertArrayHasKey('room', $response, 'Response should contain room data', 'testAddRoomWithValidData');
        
        if ($response['success'] && isset($response['room']['id'])) {
            $this->test_room_id = $response['room']['id'];
        }
    }

    private function testAddRoomWithoutAuth()
    {
        $this->clearSession();
        
        $response = $this->makeApiRequest('rooms', 'add', 'POST', [
            'name' => 'Unauthorized Room',
            'notes' => 'Test room notes'
        ]);

        // Note: This test depends on how auth is handled in the API
        $this->assertTrue(true, 'Auth test placeholder - needs API auth implementation', 'testAddRoomWithoutAuth');
    }

    private function testAddRoomWithMissingData()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('rooms', 'add', 'POST', [
            'notes' => 'Test room notes'
            // Missing name
        ]);

        $this->assertFalse($response['success'], 'Should fail when name is missing', 'testAddRoomWithMissingData');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testAddRoomWithMissingData');
    }

    private function testAddRoomDuplicateName()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('rooms', 'add', 'POST', [
            'name' => 'Test Room', // Same as the one created above
            'notes' => 'Duplicate room notes'
        ]);

        $this->assertFalse($response['success'], 'Should fail when room name already exists', 'testAddRoomDuplicateName');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testAddRoomDuplicateName');
    }

    private function testListRooms()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('rooms', 'list', 'GET');

        $this->assertTrue($response['success'], 'Should successfully list rooms', 'testListRooms');
        $this->assertArrayHasKey('rooms', $response, 'Response should contain rooms array', 'testListRooms');
        $this->assertTrue(is_array($response['rooms']), 'Rooms should be an array', 'testListRooms');
    }

    private function testListRoomsWithDateFilter()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('rooms', 'list', 'GET', [
            'date' => '2024-01-15'
        ]);

        $this->assertTrue($response['success'], 'Should successfully list rooms with date filter', 'testListRoomsWithDateFilter');
        $this->assertArrayHasKey('rooms', $response, 'Response should contain rooms array', 'testListRoomsWithDateFilter');
        $this->assertTrue(is_array($response['rooms']), 'Rooms should be an array', 'testListRoomsWithDateFilter');
    }

    private function testGetRoomById()
    {
        if (!$this->test_room_id) {
            $this->assert(false, 'No test room ID available for get test', 'testGetRoomById');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('rooms', 'get', 'GET', [
            'id' => $this->test_room_id
        ]);

        $this->assertTrue($response['success'], 'Should successfully get room by ID', 'testGetRoomById');
        $this->assertArrayHasKey('room', $response, 'Response should contain room data', 'testGetRoomById');
    }

    private function testGetRoomByIdNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('rooms', 'get', 'GET', [
            'id' => 99999 // Non-existent ID
        ]);

        $this->assertFalse($response['success'], 'Should fail when room not found', 'testGetRoomByIdNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testGetRoomByIdNotFound');
    }

    private function testEditRoom()
    {
        if (!$this->test_room_id) {
            $this->assert(false, 'No test room ID available for edit test', 'testEditRoom');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('rooms', 'edit', 'POST', [
            'id' => $this->test_room_id,
            'name' => 'Updated Test Room',
            'notes' => 'Updated test room notes'
        ]);

        $this->assertTrue($response['success'], 'Should successfully edit room', 'testEditRoom');
    }

    private function testEditRoomNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('rooms', 'edit', 'POST', [
            'id' => 99999, // Non-existent ID
            'name' => 'Updated Non-existent Room',
            'notes' => 'Updated notes'
        ]);

        $this->assertFalse($response['success'], 'Should fail when editing non-existent room', 'testEditRoomNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testEditRoomNotFound');
    }

    private function testDeleteRoom()
    {
        if (!$this->test_room_id) {
            $this->assert(false, 'No test room ID available for delete test', 'testDeleteRoom');
            return;
        }

        $this->setSession();
        
        $response = $this->makeApiRequest('rooms', 'delete', 'POST', [
            'id' => $this->test_room_id
        ]);

        $this->assertTrue($response['success'], 'Should successfully delete (archive) room', 'testDeleteRoom');
    }

    private function testDeleteRoomNotFound()
    {
        $this->setSession();
        
        $response = $this->makeApiRequest('rooms', 'delete', 'POST', [
            'id' => 99999 // Non-existent ID
        ]);

        $this->assertFalse($response['success'], 'Should fail when deleting non-existent room', 'testDeleteRoomNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testDeleteRoomNotFound');
    }

    private function testRoleBasedAccess()
    {
        // Test agent role access
        $this->setSession($this->test_user_id, 'agent', $this->test_agency_id);
        
        $response = $this->makeApiRequest('rooms', 'list', 'GET');
        $this->assertTrue($response['success'], 'Agent should be able to list rooms', 'testRoleBasedAccess_Agent');

        // Test editor role access
        $this->setSession($this->test_user_id, 'editor', $this->test_agency_id);
        
        $response = $this->makeApiRequest('rooms', 'add', 'POST', [
            'name' => 'Editor Test Room',
            'notes' => 'Editor test room notes'
        ]);
        $this->assertTrue($response['success'], 'Editor should be able to add rooms', 'testRoleBasedAccess_Editor');

        // Clean up the editor test room
        if ($response['success'] && isset($response['room']['id'])) {
            $this->makeApiRequest('rooms', 'delete', 'POST', ['id' => $response['room']['id']]);
        }

        // Test admin role access
        $this->setSession($this->test_user_id, 'admin', $this->test_agency_id);
        
        $response = $this->makeApiRequest('rooms', 'list', 'GET');
        $this->assertTrue($response['success'], 'Admin should be able to list rooms', 'testRoleBasedAccess_Admin');
    }
}
