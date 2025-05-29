<?php
function handle_techAvail($action, $method, $db, $input = [])
{
    switch ($action) {
        case 'byRange':
            if ($method === 'GET') {
                $start = $_GET['start'] ?? null;
                $end = $_GET['end'] ?? null;
                
                if (!$start || !$end) {
                    return ['success' => false, 'error' => 'Start and end dates are required.'];
                }
                
                // Validate date formats
                if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $start) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $end)) {
                    return ['success' => false, 'error' => 'Invalid date format. Use YYYY-MM-DD.'];
                }
                
                try {
                    $sql = "
                        SELECT 
                            ta.id,
                            ta.tech_id,
                            ta.available_on as date,
                            ta.period,
                            t.name as tech_name,
                            t.specialty
                        FROM technician_availability ta
                        JOIN technicians t ON ta.tech_id = t.id
                        WHERE ta.available_on BETWEEN ? AND ?
                        AND t.is_active = 1
                        ORDER BY ta.available_on, t.name, ta.period
                    ";
                    
                    $stmt = $db->prepare($sql);
                    $stmt->execute([$start, $end]);
                    $availability = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    return ['success' => true, 'start' => $start, 'end' => $end, 'availability' => $availability];
                } catch (PDOException $e) {
                    return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
                }
            }
            break;

        case 'set':
            if ($method === 'POST') {
                $tech_id = $_POST['tech_id'] ?? $input['tech_id'] ?? null;
                $date = $_POST['date'] ?? $input['date'] ?? null;
                $period = $_POST['period'] ?? $input['period'] ?? null;
                
                if (!$tech_id || !$date || !$period) {
                    return ['success' => false, 'error' => 'Tech ID, date, and period are required.'];
                }
                
                // Validate date format
                if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
                    return ['success' => false, 'error' => 'Invalid date format. Use YYYY-MM-DD.'];
                }
                
                // Validate period
                if (!in_array($period, ['am', 'pm', 'full'])) {
                    return ['success' => false, 'error' => 'Period must be am, pm, or full.'];
                }
                
                try {
                    // Check if technician exists and is active
                    $stmt = $db->prepare("SELECT id, name, is_active FROM technicians WHERE id = ?");
                    $stmt->execute([$tech_id]);
                    $tech = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    if (!$tech) {
                        return ['success' => false, 'error' => 'Technician not found.'];
                    }
                    
                    if (!$tech['is_active']) {
                        http_response_code(400);
                        return ['success' => false, 'error' => 'Cannot mark an archived technician as available.'];
                    }
                    
                    // Handle full day availability - remove existing am/pm entries for this date
                    if ($period === 'full') {
                        $stmt = $db->prepare("DELETE FROM technician_availability WHERE tech_id = ? AND available_on = ? AND period IN ('am', 'pm')");
                        $stmt->execute([$tech_id, $date]);
                    } else {
                        // Remove full day entry if setting specific period
                        $stmt = $db->prepare("DELETE FROM technician_availability WHERE tech_id = ? AND available_on = ? AND period = 'full'");
                        $stmt->execute([$tech_id, $date]);
                    }
                    
                    // Insert new availability
                    $stmt = $db->prepare("INSERT INTO technician_availability (tech_id, available_on, period, created_at) VALUES (?, ?, ?, datetime('now'))");
                    $stmt->execute([$tech_id, $date, $period]);
                    $availability_id = $db->lastInsertId();
                    
                    // Fetch the created availability with details
                    $stmt = $db->prepare("
                        SELECT 
                            ta.id,
                            ta.tech_id,
                            ta.available_on as date,
                            ta.period,
                            t.name as tech_name,
                            t.specialty
                        FROM technician_availability ta
                        JOIN technicians t ON ta.tech_id = t.id
                        WHERE ta.id = ?
                    ");
                    $stmt->execute([$availability_id]);
                    $availability = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    return ['success' => true, 'message' => 'Availability set successfully.', 'availability' => $availability];
                } catch (PDOException $e) {
                    if ($e->getCode() == 23000) { // UNIQUE constraint violation
                        http_response_code(409);
                        return ['success' => false, 'error' => 'Technician is already available for this period.'];
                    }
                    return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
                }
            }
            break;

        case 'unset':
            if ($method === 'POST' || $method === 'DELETE') {
                $id = $_POST['id'] ?? $input['id'] ?? $_GET['id'] ?? null;
                
                if (!$id) {
                    return ['success' => false, 'error' => 'Availability ID is required.'];
                }
                
                try {
                    // Check if availability exists
                    $stmt = $db->prepare("
                        SELECT 
                            ta.id,
                            t.name as tech_name,
                            ta.available_on as date,
                            ta.period
                        FROM technician_availability ta
                        JOIN technicians t ON ta.tech_id = t.id
                        WHERE ta.id = ?
                    ");
                    $stmt->execute([$id]);
                    $availability = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    if (!$availability) {
                        return ['success' => false, 'error' => 'Availability record not found.'];
                    }
                    
                    // Delete the availability
                    $stmt = $db->prepare("DELETE FROM technician_availability WHERE id = ?");
                    $stmt->execute([$id]);
                    
                    return ['success' => true, 'message' => 'Availability removed successfully.', 'removed_availability' => $availability];
                } catch (PDOException $e) {
                    return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
                }
            }
            break;

        case 'list':
            if ($method === 'GET') {
                $tech_id = $_GET['tech_id'] ?? null;
                $date = $_GET['date'] ?? null;
                
                $sql = "
                    SELECT 
                        ta.id,
                        ta.tech_id,
                        ta.available_on as date,
                        ta.period,
                        t.name as tech_name,
                        t.specialty
                    FROM technician_availability ta
                    JOIN technicians t ON ta.tech_id = t.id
                    WHERE t.is_active = 1
                ";
                
                $params = [];
                
                if ($tech_id) {
                    $sql .= " AND ta.tech_id = ?";
                    $params[] = $tech_id;
                }
                
                if ($date) {
                    $sql .= " AND ta.available_on = ?";
                    $params[] = $date;
                }
                
                $sql .= " ORDER BY ta.available_on DESC, t.name, ta.period";
                
                try {
                    $stmt = $db->prepare($sql);
                    $stmt->execute($params);
                    $availability = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    return ['success' => true, 'availability' => $availability];
                } catch (PDOException $e) {
                    return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
                }
            }
            break;

        default:
            return ['success' => false, 'error' => 'Invalid action for techAvail entity.'];
    }
    
    return ['success' => false, 'error' => 'Invalid request method for this action.'];
}
