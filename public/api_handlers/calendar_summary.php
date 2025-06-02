<?php
function handle_calendar_summary($action, $method, $db, $input = [])
{
    if ($method === 'GET') {
        $room_id = $_GET['room_id'] ?? null;
        $date = $_GET['date'] ?? null;
        
        if (!$room_id || !$date) {
            return ['success' => false, 'error' => 'Room ID and date are required'];
        }
        
        try {
            // Get consultation count
            $stmt = $db->prepare("
                SELECT COUNT(*) as count FROM appointments 
                WHERE room_id = ? AND appointment_date = ? AND type = 'consult'
            ");
            $stmt->execute([$room_id, $date]);
            $consult_count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
            
            // Get cosmetic count
            $stmt = $db->prepare("
                SELECT COUNT(*) as count FROM appointments 
                WHERE room_id = ? AND appointment_date = ? AND type = 'cosmetic'
            ");
            $stmt->execute([$room_id, $date]);
            $cosmetic_count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
            
            // Check for surgery
            $stmt = $db->prepare("
                SELECT s.id, p.name as patient_name 
                FROM room_reservations rr
                JOIN surgeries s ON rr.surgery_id = s.id
                JOIN patients p ON s.patient_id = p.id
                WHERE rr.room_id = ? AND rr.reserved_date = ?
            ");
            $stmt->execute([$room_id, $date]);
            $surgery = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return [
                'success' => true,
                'consult_count' => (int)$consult_count,
                'cosmetic_count' => (int)$cosmetic_count,
                'surgery' => $surgery ? true : false,
                'surgery_label' => $surgery ? 'Hair Transplant' : null
            ];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
        }
    }
    
    return ['success' => false, 'error' => 'Invalid method for calendar_summary entity'];
}