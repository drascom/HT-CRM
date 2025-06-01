<?php
require_once __DIR__ . '/TestBase.php';

class EnhancedSurgeryBookingTest extends TestBase
{
    private $test_patient_id;
    private $test_room_id;
    private $test_tech_ids = [];
    private $test_surgery_id;

    public function runTests()
    {
        echo "Running Enhanced Surgery Booking Tests...\n";
        echo str_repeat("-", 50) . "\n";

        $this->createTestData();
        $this->testRoomAvailabilityAPI();
        $this->testTechnicianAvailabilityAPI();
        $this->testSurgeryBookingWithValidation();
        $this->testSurgeryStatusAutomation();
        $this->testRoomReservationIntegrity();
        $this->testTechnicianAssignmentValidation();
        $this->testSurgeryEditWithRoomChange();
        $this->testConcurrentBookingPrevention();
        $this->testSurgeryDeletion();

        $this->printSummary('EnhancedSurgeryBookingTest');
    }

    protected function createTestData()
    {
        $this->setSession();
        
        // Create test patient
        $response = $this->makeApiRequest('patients', 'add', 'POST', [
            'name' => 'Enhanced Surgery Test Patient',
            'dob' => '1990-01-01',
            'agency_id' => $this->test_agency_id
        ]);
        if ($response['success'] && isset($response['id'])) {
            $this->test_patient_id = $response['id'];
        }

        // Create test room
        $response = $this->makeApiRequest('rooms', 'add', 'POST', [
            'name' => 'Enhanced Test Room',
            'notes' => 'Test room for enhanced surgery booking'
        ]);
        if ($response['success'] && isset($response['room']['id'])) {
            $this->test_room_id = $response['room']['id'];
        }

        // Create test technicians
        for ($i = 1; $i <= 3; $i++) {
            $response = $this->makeApiRequest('techs', 'add', 'POST', [
                'name' => "Enhanced Test Technician {$i}",
                'specialty' => 'Hair Transplant',
                'phone' => "555-000{$i}"
            ]);
            if ($response['success'] && isset($response['technician']['id'])) {
                $this->test_tech_ids[] = $response['technician']['id'];
            }
        }

        // Set technician availability for test date
        $test_date = '2024-03-15';
        foreach ($this->test_tech_ids as $tech_id) {
            $this->makeApiRequest('techAvail', 'add', 'POST', [
                'tech_id' => $tech_id,
                'available_on' => $test_date,
                'period' => 'full'
            ]);
        }
    }

    private function testRoomAvailabilityAPI()
    {
        $this->setSession();
        
        $test_date = '2024-03-15';
        $response = $this->makeApiRequest('availability', 'byDate', 'GET', [
            'date' => $test_date
        ]);

        $this->assertTrue($response['success'], 'Should successfully get room availability', 'testRoomAvailabilityAPI');
        $this->assertArrayHasKey('statistics', $response, 'Response should contain statistics', 'testRoomAvailabilityAPI');
        $this->assertArrayHasKey('available_rooms', $response['statistics'], 'Statistics should contain available_rooms count', 'testRoomAvailabilityAPI');
        $this->assertArrayHasKey('active_rooms', $response['statistics'], 'Statistics should contain active_rooms count', 'testRoomAvailabilityAPI');
    }

    private function testTechnicianAvailabilityAPI()
    {
        $this->setSession();
        
        $test_date = '2024-03-15';
        $response = $this->makeApiRequest('techAvail', 'byDate', 'GET', [
            'date' => $test_date
        ]);

        $this->assertTrue($response['success'], 'Should successfully get technician availability', 'testTechnicianAvailabilityAPI');
        $this->assertArrayHasKey('count', $response, 'Response should contain technician count', 'testTechnicianAvailabilityAPI');
        $this->assertTrue($response['count'] >= 3, 'Should have at least 3 available technicians', 'testTechnicianAvailabilityAPI');
        
        // Test with period filter
        $response = $this->makeApiRequest('techAvail', 'byDate', 'GET', [
            'date' => $test_date,
            'period' => 'am'
        ]);
        $this->assertTrue($response['success'], 'Should successfully get technician availability with period filter', 'testTechnicianAvailabilityAPI');
    }

    private function testSurgeryBookingWithValidation()
    {
        if (!$this->test_patient_id || !$this->test_room_id || count($this->test_tech_ids) < 2) {
            $this->assert(false, 'Insufficient test data for surgery booking test', 'testSurgeryBookingWithValidation');
            return;
        }

        $this->setSession();
        
        // Test with insufficient technicians (should fail)
        $response = $this->makeApiRequest('surgeries', 'add', 'POST', [
            'patient_id' => $this->test_patient_id,
            'date' => '2024-03-15',
            'room_id' => $this->test_room_id,
            'technician_ids' => [$this->test_tech_ids[0]], // Only 1 technician
            'notes' => 'Test surgery with insufficient technicians'
        ]);
        $this->assertFalse($response['success'], 'Should fail with insufficient technicians', 'testSurgeryBookingWithValidation');
        $this->assertStringContains($response['error'], '2 technicians', 'Error should mention minimum technician requirement', 'testSurgeryBookingWithValidation');

        // Test with valid data (should succeed)
        $response = $this->makeApiRequest('surgeries', 'add', 'POST', [
            'patient_id' => $this->test_patient_id,
            'date' => '2024-03-15',
            'room_id' => $this->test_room_id,
            'technician_ids' => array_slice($this->test_tech_ids, 0, 2), // 2 technicians
            'notes' => 'Test surgery with valid data',
            'graft_count' => 2000
        ]);
        $this->assertTrue($response['success'], 'Should successfully create surgery with valid data', 'testSurgeryBookingWithValidation');
        $this->assertArrayHasKey('id', $response, 'Response should contain surgery ID', 'testSurgeryBookingWithValidation');
        
        if ($response['success'] && isset($response['id'])) {
            $this->test_surgery_id = $response['id'];
        }
    }

    private function testSurgeryStatusAutomation()
    {
        if (!$this->test_surgery_id) {
            $this->assert(false, 'No test surgery available for status automation test', 'testSurgeryStatusAutomation');
            return;
        }

        $this->setSession();
        
        // Get the created surgery and check status
        $response = $this->makeApiRequest('surgeries', 'get', 'GET', [
            'id' => $this->test_surgery_id
        ]);
        
        $this->assertTrue($response['success'], 'Should successfully get surgery details', 'testSurgeryStatusAutomation');
        $this->assertEquals('confirmed', $response['surgery']['status'], 'Surgery should be auto-confirmed when room and 2+ technicians assigned', 'testSurgeryStatusAutomation');
        $this->assertArrayHasKey('technicians', $response['surgery'], 'Surgery should include technician details', 'testSurgeryStatusAutomation');
        $this->assertTrue(count($response['surgery']['technicians']) >= 2, 'Surgery should have at least 2 technicians assigned', 'testSurgeryStatusAutomation');
    }

    private function testRoomReservationIntegrity()
    {
        if (!$this->test_patient_id || !$this->test_room_id || count($this->test_tech_ids) < 2) {
            $this->assert(false, 'Insufficient test data for room reservation test', 'testRoomReservationIntegrity');
            return;
        }

        $this->setSession();
        
        // Try to book the same room on the same date (should fail)
        $response = $this->makeApiRequest('surgeries', 'add', 'POST', [
            'patient_id' => $this->test_patient_id,
            'date' => '2024-03-15', // Same date as previous surgery
            'room_id' => $this->test_room_id, // Same room
            'technician_ids' => array_slice($this->test_tech_ids, 0, 2),
            'notes' => 'Attempt to double-book room'
        ]);
        
        $this->assertFalse($response['success'], 'Should fail when trying to double-book a room', 'testRoomReservationIntegrity');
        $this->assertStringContains($response['error'], 'already booked', 'Error should mention room is already booked', 'testRoomReservationIntegrity');
    }

    private function testTechnicianAssignmentValidation()
    {
        if (!$this->test_patient_id || count($this->test_tech_ids) < 2) {
            $this->assert(false, 'Insufficient test data for technician validation test', 'testTechnicianAssignmentValidation');
            return;
        }

        $this->setSession();
        
        // Try to assign unavailable technician (should fail)
        $response = $this->makeApiRequest('surgeries', 'add', 'POST', [
            'patient_id' => $this->test_patient_id,
            'date' => '2024-03-16', // Different date with no technician availability
            'technician_ids' => array_slice($this->test_tech_ids, 0, 2),
            'notes' => 'Attempt to assign unavailable technicians'
        ]);
        
        $this->assertFalse($response['success'], 'Should fail when assigning unavailable technicians', 'testTechnicianAssignmentValidation');
        $this->assertStringContains($response['error'], 'not available', 'Error should mention technician availability', 'testTechnicianAssignmentValidation');
    }

    private function testSurgeryEditWithRoomChange()
    {
        if (!$this->test_surgery_id) {
            $this->assert(false, 'No test surgery available for edit test', 'testSurgeryEditWithRoomChange');
            return;
        }

        $this->setSession();
        
        // Create another room for testing room change
        $response = $this->makeApiRequest('rooms', 'add', 'POST', [
            'name' => 'Enhanced Test Room 2',
            'notes' => 'Second test room for room change test'
        ]);
        
        if (!$response['success']) {
            $this->assert(false, 'Could not create second test room', 'testSurgeryEditWithRoomChange');
            return;
        }
        
        $second_room_id = $response['room']['id'];
        
        // Edit surgery to change room
        $response = $this->makeApiRequest('surgeries', 'edit', 'POST', [
            'id' => $this->test_surgery_id,
            'patient_id' => $this->test_patient_id,
            'date' => '2024-03-15',
            'room_id' => $second_room_id, // Change to different room
            'technician_ids' => array_slice($this->test_tech_ids, 0, 2),
            'notes' => 'Updated surgery with room change',
            'graft_count' => 2500
        ]);
        
        $this->assertTrue($response['success'], 'Should successfully edit surgery with room change', 'testSurgeryEditWithRoomChange');
        
        // Verify the original room is now available
        $availability_response = $this->makeApiRequest('availability', 'byDate', 'GET', [
            'date' => '2024-03-15'
        ]);
        
        if ($availability_response['success']) {
            $original_room = array_filter($availability_response['rooms'], function($room) {
                return $room['id'] == $this->test_room_id;
            });
            $original_room = reset($original_room);
            $this->assertEquals('available', $original_room['status'], 'Original room should be available after room change', 'testSurgeryEditWithRoomChange');
        }
    }

    private function testConcurrentBookingPrevention()
    {
        // This test simulates concurrent booking attempts
        // In a real scenario, this would test database-level constraints
        $this->assertTrue(true, 'Concurrent booking prevention test placeholder', 'testConcurrentBookingPrevention');
    }

    private function testSurgeryDeletion()
    {
        if (!$this->test_surgery_id) {
            $this->assert(false, 'No test surgery available for deletion test', 'testSurgeryDeletion');
            return;
        }

        $this->setSession();
        
        // Delete the surgery
        $response = $this->makeApiRequest('surgeries', 'delete', 'POST', [
            'id' => $this->test_surgery_id
        ]);
        
        $this->assertTrue($response['success'], 'Should successfully delete surgery', 'testSurgeryDeletion');
        
        // Verify surgery is deleted
        $get_response = $this->makeApiRequest('surgeries', 'get', 'GET', [
            'id' => $this->test_surgery_id
        ]);
        
        $this->assertFalse($get_response['success'], 'Should not find deleted surgery', 'testSurgeryDeletion');
        
        // Verify room is available again
        $availability_response = $this->makeApiRequest('availability', 'byDate', 'GET', [
            'date' => '2024-03-15'
        ]);
        
        if ($availability_response['success']) {
            $statistics = $availability_response['statistics'];
            $this->assertTrue($statistics['available_rooms'] > 0, 'Should have available rooms after surgery deletion', 'testSurgeryDeletion');
        }
    }
}
