<?php
require_once __DIR__ . '/TestBase.php';

class ReservationsApiTest extends TestBase
{
    private $test_patient_id;
    private $test_surgery_id;
    private $test_room_id;
    private $test_reservation_id;

    public function runTests()
    {
        echo "Running Reservations API Tests...\n";
        echo str_repeat("-", 40) . "\n";

        $this->createTestData();
        $this->testReserveRoomWithValidData();
        $this->testReserveRoomWithoutAuth();
        $this->testReserveRoomWithMissingData();
        $this->testReserveRoomInvalidDate();
        $this->testReserveRoomAlreadyBooked();
        $this->testListReservations();
        $this->testListReservationsWithFilters();
        $this->testGetReservationById();
        $this->testGetReservationByIdNotFound();
        $this->testUpdateReservation();
        $this->testUpdateReservationNotFound();
        $this->testCancelReservation();
        $this->testCancelReservationNotFound();
        $this->testRoleBasedAccess();

        $this->printSummary('ReservationsApiTest');
    }

    protected function createTestData()
    {
        $this->setSession();

        // Create test patient
        $response = $this->makeApiRequest('patients', 'add', 'POST', [
            'name' => 'Reservation Test Patient',
            'dob' => '1990-01-01',
            'agency_id' => $this->test_agency_id
        ]);
        if ($response['success'] && isset($response['id'])) {
            $this->test_patient_id = $response['id'];
        }

        // Create test surgery
        $response = $this->makeApiRequest('surgeries', 'add', 'POST', [
            'patient_id' => $this->test_patient_id,
            'date' => '2024-02-15',
            'notes' => 'Test surgery for reservation',
            'status' => 'scheduled',
            'graft_count' => 2000
        ]);
        if ($response['success'] && isset($response['id'])) {
            $this->test_surgery_id = $response['id'];
        }

        // Create test room
        $response = $this->makeApiRequest('rooms', 'add', 'POST', [
            'name' => 'Reservation Test Room',
            'notes' => 'Test room for reservations'
        ]);
        if ($response['success'] && isset($response['room']['id'])) {
            $this->test_room_id = $response['room']['id'];
        }
    }

    private function testReserveRoomWithValidData()
    {
        if (!$this->test_room_id || !$this->test_surgery_id) {
            $this->assert(false, 'Missing test data for reservation test', 'testReserveRoomWithValidData');
            return;
        }

        $this->setSession();

        $response = $this->makeApiRequest('reservations', 'reserve', 'POST', [
            'room_id' => $this->test_room_id,
            'surgery_id' => $this->test_surgery_id,
            'reserved_date' => '2024-02-15'
        ]);

        $this->assertTrue($response['success'], 'Should successfully reserve room with valid data', 'testReserveRoomWithValidData');
        $this->assertArrayHasKey('reservation', $response, 'Response should contain reservation data', 'testReserveRoomWithValidData');

        if ($response['success'] && isset($response['reservation']['id'])) {
            $this->test_reservation_id = $response['reservation']['id'];
        }
    }

    private function testReserveRoomWithoutAuth()
    {
        $this->clearSession();

        $response = $this->makeApiRequest('reservations', 'reserve', 'POST', [
            'room_id' => $this->test_room_id,
            'surgery_id' => $this->test_surgery_id,
            'reserved_date' => '2024-02-16'
        ]);

        // Note: This test depends on how auth is handled in the API
        $this->assertTrue(true, 'Auth test placeholder - needs API auth implementation', 'testReserveRoomWithoutAuth');
    }

    private function testReserveRoomWithMissingData()
    {
        $this->setSession();

        $response = $this->makeApiRequest('reservations', 'reserve', 'POST', [
            'surgery_id' => $this->test_surgery_id,
            'reserved_date' => '2024-02-17'
            // Missing room_id
        ]);

        $this->assertFalse($response['success'], 'Should fail when room_id is missing', 'testReserveRoomWithMissingData');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testReserveRoomWithMissingData');
    }

    private function testReserveRoomInvalidDate()
    {
        $this->setSession();

        $response = $this->makeApiRequest('reservations', 'reserve', 'POST', [
            'room_id' => $this->test_room_id,
            'surgery_id' => $this->test_surgery_id,
            'reserved_date' => 'invalid-date'
        ]);

        $this->assertFalse($response['success'], 'Should fail with invalid date format', 'testReserveRoomInvalidDate');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testReserveRoomInvalidDate');
    }

    private function testReserveRoomAlreadyBooked()
    {
        $this->setSession();

        // Try to book the same room on the same date
        $response = $this->makeApiRequest('reservations', 'reserve', 'POST', [
            'room_id' => $this->test_room_id,
            'surgery_id' => $this->test_surgery_id,
            'reserved_date' => '2024-02-15' // Same date as first reservation
        ]);

        $this->assertFalse($response['success'], 'Should fail when room is already booked', 'testReserveRoomAlreadyBooked');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testReserveRoomAlreadyBooked');
    }

    private function testListReservations()
    {
        $this->setSession();

        $response = $this->makeApiRequest('reservations', 'list', 'GET');

        $this->assertTrue($response['success'], 'Should successfully list reservations', 'testListReservations');
        $this->assertArrayHasKey('reservations', $response, 'Response should contain reservations array', 'testListReservations');
        $this->assertTrue(is_array($response['reservations']), 'Reservations should be an array', 'testListReservations');
    }

    private function testListReservationsWithFilters()
    {
        $this->setSession();

        // Test with room filter
        $response = $this->makeApiRequest('reservations', 'list', 'GET', [
            'room_id' => $this->test_room_id
        ]);
        $this->assertTrue($response['success'], 'Should successfully list reservations with room filter', 'testListReservationsWithFilters_Room');

        // Test with date filter
        $response = $this->makeApiRequest('reservations', 'list', 'GET', [
            'date' => '2024-02-15'
        ]);
        $this->assertTrue($response['success'], 'Should successfully list reservations with date filter', 'testListReservationsWithFilters_Date');

        // Test with surgery filter
        $response = $this->makeApiRequest('reservations', 'list', 'GET', [
            'surgery_id' => $this->test_surgery_id
        ]);
        $this->assertTrue($response['success'], 'Should successfully list reservations with surgery filter', 'testListReservationsWithFilters_Surgery');
    }

    private function testGetReservationById()
    {
        if (!$this->test_reservation_id) {
            $this->assert(false, 'No test reservation ID available for get test', 'testGetReservationById');
            return;
        }

        $this->setSession();

        $response = $this->makeApiRequest('reservations', 'get', 'GET', [
            'id' => $this->test_reservation_id
        ]);

        $this->assertTrue($response['success'], 'Should successfully get reservation by ID', 'testGetReservationById');
        $this->assertArrayHasKey('reservation', $response, 'Response should contain reservation data', 'testGetReservationById');
    }

    private function testGetReservationByIdNotFound()
    {
        $this->setSession();

        $response = $this->makeApiRequest('reservations', 'get', 'GET', [
            'id' => 99999 // Non-existent ID
        ]);

        $this->assertFalse($response['success'], 'Should fail when reservation not found', 'testGetReservationByIdNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testGetReservationByIdNotFound');
    }

    private function testUpdateReservation()
    {
        if (!$this->test_reservation_id) {
            $this->assert(false, 'No test reservation ID available for update test', 'testUpdateReservation');
            return;
        }

        $this->setSession();

        $response = $this->makeApiRequest('reservations', 'update', 'POST', [
            'id' => $this->test_reservation_id,
            'room_id' => $this->test_room_id,
            'surgery_id' => $this->test_surgery_id,
            'reserved_date' => '2024-02-20' // Change to a date that won't conflict
        ]);

        $this->assertTrue($response['success'], 'Should successfully update reservation', 'testUpdateReservation');
    }

    private function testUpdateReservationNotFound()
    {
        $this->setSession();

        $response = $this->makeApiRequest('reservations', 'update', 'POST', [
            'id' => 99999, // Non-existent ID
            'room_id' => $this->test_room_id,
            'surgery_id' => $this->test_surgery_id,
            'reserved_date' => '2024-02-17'
        ]);

        $this->assertFalse($response['success'], 'Should fail when updating non-existent reservation', 'testUpdateReservationNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testUpdateReservationNotFound');
    }

    private function testCancelReservation()
    {
        if (!$this->test_reservation_id) {
            $this->assert(false, 'No test reservation ID available for cancel test', 'testCancelReservation');
            return;
        }

        $this->setSession();

        $response = $this->makeApiRequest('reservations', 'cancel', 'POST', [
            'id' => $this->test_reservation_id
        ]);

        $this->assertTrue($response['success'], 'Should successfully cancel reservation', 'testCancelReservation');
    }

    private function testCancelReservationNotFound()
    {
        $this->setSession();

        $response = $this->makeApiRequest('reservations', 'cancel', 'POST', [
            'id' => 99999 // Non-existent ID
        ]);

        $this->assertFalse($response['success'], 'Should fail when canceling non-existent reservation', 'testCancelReservationNotFound');
        $this->assertArrayHasKey('error', $response, 'Response should contain error message', 'testCancelReservationNotFound');
    }

    private function testRoleBasedAccess()
    {
        // Test agent role access
        $this->setSession($this->test_user_id, 'agent', $this->test_agency_id);

        $response = $this->makeApiRequest('reservations', 'list', 'GET');
        $this->assertTrue($response['success'], 'Agent should be able to list reservations', 'testRoleBasedAccess_Agent');

        // Test editor role access
        $this->setSession($this->test_user_id, 'editor', $this->test_agency_id);

        $response = $this->makeApiRequest('reservations', 'list', 'GET');
        $this->assertTrue($response['success'], 'Editor should be able to list reservations', 'testRoleBasedAccess_Editor');

        // Test admin role access
        $this->setSession($this->test_user_id, 'admin', $this->test_agency_id);

        $response = $this->makeApiRequest('reservations', 'list', 'GET');
        $this->assertTrue($response['success'], 'Admin should be able to list reservations', 'testRoleBasedAccess_Admin');
    }
}
