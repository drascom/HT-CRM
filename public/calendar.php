<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

require_once 'includes/header.php';
?>

<body>


    <div id='calendar'></div>

    <!-- FullCalendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,listMonth,listWeek,listDay,'
            },
            views: {
                dayGridMonth: {
                    buttonText: 'Month'
                },
                listWeek: {
                    buttonText: 'List Week'
                },
                listDay: {
                    buttonText: 'List Day'
                },
                listMonth: {
                    buttonText: 'List Month'
                }
            },
            events: function(fetchInfo, successCallback, failureCallback) {
                fetch('api.php?entity=surgeries&action=list')
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const events = data.surgeries.map(surgery => {
                                let eventColor = 'blue'; // Default color
                                if (surgery.status === 'canceled') {
                                    eventColor = 'red';
                                } else if (surgery.status === 'completed') {
                                    eventColor = 'green';
                                }
                                return {
                                    title: surgery.patient_name + ' - ' + surgery
                                        .status,
                                    start: surgery.date +
                                        'T08:00:00', // Set start time to 08:00
                                    end: surgery.date +
                                        'T18:00:00', // Set end time to 18:00
                                    extendedProps: {
                                        patientName: surgery.patient_name,
                                        graft_count: surgery.graft_count,
                                        status: surgery.status
                                    },
                                    color: eventColor // Set the event background color
                                };
                            });
                            successCallback(events);
                        } else {
                            console.error('Error fetching surgeries:', data.error);
                            failureCallback(data.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching surgeries:', error);
                        failureCallback(error);
                    });
            },
            eventContent: function(arg) {
                // Customize event display for better readability and styling
                let patientName = arg.event.extendedProps.patientName || 'N/A';
                let status = arg.event.extendedProps.status || 'N/A';
                let graft_count = arg.event.extendedProps.graft_count || 'N/A';
                let statusClass = '';

                if (status === 'canceled') {
                    statusClass = 'status-cancelled';
                } else if (status === 'completed') {
                    statusClass = 'status-completed';
                } else {
                    statusClass =
                        'status-booked'; // Assuming 'booked' is the default or other status
                }

                return {
                    html: `
                        <div class="event-details">
                            <div class="patient-name"><b>${patientName}</b></div>
                            <div class="graft-count"><i>Graft: </i>${graft_count}</div>
                            <div class="status"><i>Status:</i> <span class="${statusClass}">${status}</span></div>
                        </div>
                    `
                };
            }
        });

        calendar.render();
    });
    </script>

</body>

</html>