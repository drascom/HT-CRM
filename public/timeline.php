<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Timeline - Calendar View</title>
    <style>
    body {
        font-family: sans-serif;
        line-height: 1.6;
        margin: 20px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
        min-width: 100px;
        /* Ensure cells have a minimum width */
    }

    th {
        background-color: #f2f2f2;
    }

    .navigation {
        text-align: center;
        margin-bottom: 20px;
    }

    .navigation a {
        margin: 0 15px;
        text-decoration: none;
        font-size: 1.2em;
    }

    .available {
        background-color: #d4edda;
        /* Light green */
    }

    .booked {
        background-color: #fff3cd;
        /* Light yellow */
    }

    .closed {
        background-color: #f8d7da;
        /* Light red */
    }
    </style>
</head>

<body>
    <h1>Booking Timeline - Calendar View</h1>

    <?php
    $json_file_path = '../bookings.json';

    // Get current month and year, or from query parameters
    $current_month = isset($_GET['month']) ? intval($_GET['month']) : date('n');
    $current_year = isset($_GET['year']) ? intval($_GET['year']) : date('Y');

    // Ensure month and year are valid
    if ($current_month < 1 || $current_month > 12) {
        $current_month = date('n');
    }
    if ($current_year < 1900 || $current_year > 2100) { // Basic year validation
        $current_year = date('Y');
    }

    // Calculate previous and next month/year
    $prev_month = $current_month - 1;
    $prev_year = $current_year;
    if ($prev_month < 1) {
        $prev_month = 12;
        $prev_year--;
    }

    $next_month = $current_month + 1;
    $next_year = $current_year;
    if ($next_month > 12) {
        $next_month = 1;
        $next_year++;
    }

    // Get the number of days in the current month
    $days_in_month = cal_days_in_month(CAL_GREGORIAN, $current_month, $current_year);

    // Room columns
    $rooms = ["Room 3A - 8:30am", "PRP Morning", "PRP Afternoon", "Consultation"];

    // Load booking data
    $bookings_data = [];
    if (file_exists($json_file_path)) {
        $json_data = file_get_contents($json_file_path);
        $bookings = json_decode($json_data, true);
        if (!empty($bookings)) {
            // Reorganize data for easy lookup by date
            // Reorganize data by date
            $bookings_by_date = [];
            foreach ($bookings as $booking) {
                // Convert timestamp to Y-m-d date string
                // Assuming 'Date' column exists and is a timestamp (like from pandas to_json)
                if (isset($booking['Date'])) {
                    $date_str = date('Y-m-d', $booking['Date'] / 1000);
                    $bookings_by_date[$date_str][] = $booking;
                }
            }
            $bookings_data = $bookings_by_date; // Keep the variable name consistent for the rest of the code
        }
    }

    // Display navigation
    echo '<div class="navigation">';
    echo '<a href="?month=' . $prev_month . '&year=' . $prev_year . '">&lt;&lt; Previous</a>';
    echo '<span>' . date('F Y', mktime(0, 0, 0, $current_month, 1, $current_year)) . '</span>';
    echo '<a href="?month=' . $next_month . '&year=' . $next_year . '">Next &gt;&gt;</a>';
    echo '</div>';

    // Display table
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Day</th>';
    foreach ($rooms as $room) {
        echo '<th>' . htmlspecialchars($room) . '</th>';
    }
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    for ($day = 1; $day <= $days_in_month; $day++) {
        $date_str = sprintf('%04d-%02d-%02d', $current_year, $current_month, $day);
        $day_of_week = date('l', mktime(0, 0, 0, $current_month, $day, $current_year));

        echo '<tr>';
        echo '<td>' . htmlspecialchars($day) . ' (' . htmlspecialchars($day_of_week) . ')</td>';

        foreach ($rooms as $room) {
            $status = 'N/A'; // Default status
            $class = '';

            $status = 'Available'; // Default status for the room on this day
            $class = 'available';

            if (isset($bookings_data[$date_str])) {
                $daily_bookings = $bookings_data[$date_str];
                foreach ($daily_bookings as $booking_info) {
                    // Check if the current room exists in this specific booking entry
                    if (isset($booking_info[$room])) {
                        $room_status = $booking_info[$room];
                        if ($room_status === "Closed") {
                            $status = "Closed";
                            $class = 'closed';
                            break; // If a room is closed, no need to check other bookings for this room on this day
                        } elseif ($room_status !== null && $room_status !== "") { // Also check for empty string
                            $status = htmlspecialchars($room_status); // Show booked name
                            $class = 'booked';
                            // Continue checking other bookings for this date/room in case of multiple entries
                        }
                        // If $room_status is null or empty string, it means this specific booking entry doesn't book this room,
                        // so we continue checking other bookings for this date.
                    }
                }
            }
            // If no bookings for this date, or no booking for this room on this date, status remains "Available"

            echo '<td class="' . $class . '">' . $status . '</td>';
        }
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    ?>

</body>

</html>