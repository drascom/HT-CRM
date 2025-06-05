<?php
function handle_techAvail($action, $method, $db, $input = [])
{
    switch ($action) {
        case 'byRange':
            if ($method === 'POST') {
                $start = $input['start'] ?? null;
                $end = $input['end'] ?? null;

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

        case 'byDate':
            if ($method === 'POST') {
                $date = $input['date'] ?? null;
                $period = $input['period'] ?? null; // Optional period filter for surgery scheduling

                if (!$date) {
                    return ['success' => false, 'error' => 'Date is required.'];
                }

                // Validate date format
                if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
                    return ['success' => false, 'error' => 'Invalid date format. Use YYYY-MM-DD.'];
                }

                // Validate period if provided
                if ($period && !in_array($period, ['am', 'pm', 'full'])) {
                    return ['success' => false, 'error' => 'Period must be am, pm, or full.'];
                }

                try {
                    $sql = "
                        SELECT
                            t.id,
                            t.name,
                            t.specialty,
                            ta.period,
                            ta.id as availability_id
                        FROM technicians t
                        JOIN technician_availability ta ON t.id = ta.tech_id
                        WHERE ta.available_on = ?
                        AND t.is_active = 1
                    ";

                    $params = [$date];

                    // Add period filtering for surgery scheduling
                    if ($period) {
                        $sql .= " AND (ta.period = ? OR ta.period = 'full')";
                        $params[] = $period;
                    }

                    $sql .= " ORDER BY t.name, ta.period";

                    $stmt = $db->prepare($sql);
                    $stmt->execute($params);
                    $technicians = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Group technicians by ID to handle multiple periods
                    $grouped_technicians = [];
                    foreach ($technicians as $tech) {
                        $tech_id = $tech['id'];
                        if (!isset($grouped_technicians[$tech_id])) {
                            $grouped_technicians[$tech_id] = [
                                'id' => $tech['id'],
                                'name' => $tech['name'],
                                'specialty' => $tech['specialty'],
                                'periods' => []
                            ];
                        }
                        $grouped_technicians[$tech_id]['periods'][] = $tech['period'];
                    }

                    // Convert back to indexed array and add period display
                    $result_technicians = array_values($grouped_technicians);
                    foreach ($result_technicians as &$tech) {
                        $tech['period'] = implode(', ', $tech['periods']);
                        $tech['available_periods'] = $tech['periods'];
                    }

                    return [
                        'success' => true,
                        'date' => $date,
                        'period' => $period,
                        'technicians' => $result_technicians,
                        'count' => count($result_technicians)
                    ];
                } catch (PDOException $e) {
                    return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
                }
            }
            break;

        case 'set':
        case 'add':
            if ($method === 'POST') {
                $tech_id = $_POST['tech_id'] ?? $input['tech_id'] ?? null;
                $date = $_POST['available_on'] ?? $_POST['date'] ?? $input['available_on'] ?? $input['date'] ?? null;
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

        case 'edit':
            if ($method === 'POST') {
                $id = $_POST['id'] ?? $input['id'] ?? null;
                $tech_id = $_POST['tech_id'] ?? $input['tech_id'] ?? null;
                $date = $_POST['available_on'] ?? $_POST['date'] ?? $input['available_on'] ?? $input['date'] ?? null;
                $period = $_POST['period'] ?? $input['period'] ?? null;

                if (!$id || !$tech_id || !$date || !$period) {
                    return ['success' => false, 'error' => 'ID, tech ID, date, and period are required.'];
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
                    // Check if availability exists
                    $check_stmt = $db->prepare("SELECT id FROM technician_availability WHERE id = ?");
                    $check_stmt->execute([$id]);
                    if (!$check_stmt->fetch()) {
                        return ['success' => false, 'error' => 'Availability record not found.'];
                    }

                    // Update the availability
                    $stmt = $db->prepare("UPDATE technician_availability SET tech_id = ?, available_on = ?, period = ? WHERE id = ?");
                    $stmt->execute([$tech_id, $date, $period, $id]);

                    return ['success' => true, 'message' => 'Availability updated successfully.'];
                } catch (PDOException $e) {
                    if ($e->getCode() == 23000) { // UNIQUE constraint violation
                        return ['success' => false, 'error' => 'Technician is already available for this period.'];
                    }
                    return ['success' => false, 'error' => 'Database error: ' . $e->getMessage()];
                }
            }
            break;

        case 'unset':
        case 'delete':
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
            if ($method === 'POST') {
                $tech_id = $input['tech_id'] ?? null;
                $date = $input['date'] ?? null;

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