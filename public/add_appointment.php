<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

// Ensure user is logged in
if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

// Get pre-filled values from URL parameters
$room_id = $_GET['room_id'] ?? '';
$date = $_GET['date'] ?? '';

$page_title = "Add Appointment";
require_once 'includes/header.php';
?>

<div class="container-fluid mt-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">
            <i class="fas fa-calendar-plus me-2 text-success"></i>
            Add New Appointment
        </h2>
        <div class="btn-group" role="group">
            <a href="appointments.php" class="btn btn-secondary">
                <i class="fas fa-list me-1"></i>
                View All Appointments
            </a>
            <a href="calendar.php" class="btn btn-primary">
                <i class="fas fa-calendar me-1"></i>
                Calendar View
            </a>
        </div>
    </div>

    <!-- Status Messages -->
    <div id="status-messages"></div>

    <!-- Add Appointment Form -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-calendar-check me-2"></i>
                        Appointment Details
                    </h5>
                </div>
                <div class="card-body">
                    <form id="appointment-form" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="patient-id" class="form-label">Patient *</label>
                                    <select class="form-select" id="patient-id" required>
                                        <option value="">Select Patient</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a patient.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="room-id" class="form-label">Room *</label>
                                    <select class="form-select" id="room-id" required>
                                        <option value="">Select Room</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a room.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="appointment-date" class="form-label">Date *</label>
                                    <input type="date" class="form-control" id="appointment-date" required>
                                    <div class="invalid-feedback">
                                        Please select a date.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="start-time" class="form-label">Start Time *</label>
                                    <input type="time" class="form-control" id="start-time" required>
                                    <div class="invalid-feedback">
                                        Please select a start time.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="end-time" class="form-label">End Time *</label>
                                    <input type="time" class="form-control" id="end-time" required>
                                    <div class="invalid-feedback">
                                        Please select an end time.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Type *</label>
                                    <select class="form-select" id="type" required>
                                        <option value="">Select Type</option>
                                        <option value="consult">Consultation</option>
                                        <option value="cosmetic">Cosmetic</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select an appointment type.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="subtype" class="form-label">Subtype</label>
                                    <input type="text" class="form-control" id="subtype" placeholder="e.g., Online, Botox, PRP">
                                    <div class="form-text">
                                        Optional: Specify consultation method or cosmetic procedure
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="notes" class="form-label">Notes</label>
                            <textarea class="form-control" id="notes" rows="3" placeholder="Additional notes or special instructions"></textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="appointments.php" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i>
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-1"></i>
                                Create Appointment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Time Slots Helper -->
    <div class="row justify-content-center mt-4">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-clock me-2"></i>
                        Quick Time Slots
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-auto">
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="setTimeSlot('09:00', '10:00')">
                                09:00 - 10:00
                            </button>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="setTimeSlot('10:00', '11:00')">
                                10:00 - 11:00
                            </button>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="setTimeSlot('11:00', '12:00')">
                                11:00 - 12:00
                            </button>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="setTimeSlot('14:00', '15:00')">
                                14:00 - 15:00
                            </button>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="setTimeSlot('15:00', '16:00')">
                                15:00 - 16:00
                            </button>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="setTimeSlot('16:00', '17:00')">
                                16:00 - 17:00
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let rooms = [];
let patients = [];

document.addEventListener('DOMContentLoaded', function() {
    loadInitialData();
    
    // Form submission
    document.getElementById('appointment-form').addEventListener('submit', function(e) {
        e.preventDefault();
        if (validateForm()) {
            createAppointment();
        }
    });

    // Pre-fill form if URL parameters are provided
    if ('<?php echo $room_id; ?>') {
        document.getElementById('room-id').value = '<?php echo $room_id; ?>';
    }
    if ('<?php echo $date; ?>') {
        document.getElementById('appointment-date').value = '<?php echo $date; ?>';
    }

    // Set default date to today if not provided
    if (!document.getElementById('appointment-date').value) {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('appointment-date').value = today;
    }

    // Time validation
    document.getElementById('start-time').addEventListener('change', validateTimes);
    document.getElementById('end-time').addEventListener('change', validateTimes);
});

async function loadInitialData() {
    try {
        // Load rooms and patients in parallel
        const [roomsResponse, patientsResponse] = await Promise.all([
            fetch('api.php?entity=rooms&action=list'),
            fetch('api.php?entity=patients&action=list')
        ]);

        const roomsData = await roomsResponse.json();
        const patientsData = await patientsResponse.json();

        if (roomsData.success) {
            rooms = roomsData.rooms || [];
            populateRoomSelect();
        } else {
            displayMessage('Error loading rooms: ' + (roomsData.error || 'Unknown error'), 'danger');
        }

        if (patientsData.success) {
            patients = patientsData.patients || [];
            populatePatientSelect();
        } else {
            displayMessage('Error loading patients: ' + (patientsData.error || 'Unknown error'), 'danger');
        }
    } catch (error) {
        console.error('Error loading data:', error);
        displayMessage('Failed to load data. Please try again.', 'danger');
    }
}

function populateRoomSelect() {
    const select = document.getElementById('room-id');
    
    // Clear existing options (except first)
    select.innerHTML = '<option value="">Select Room</option>';
    
    rooms.forEach(room => {
        if (room.is_active) {
            const option = new Option(room.name, room.id);
            select.add(option);
        }
    });

    // Re-select pre-filled value if it exists
    if ('<?php echo $room_id; ?>') {
        select.value = '<?php echo $room_id; ?>';
    }
}

function populatePatientSelect() {
    const select = document.getElementById('patient-id');
    
    // Clear existing options (except first)
    select.innerHTML = '<option value="">Select Patient</option>';
    
    patients.forEach(patient => {
        const option = new Option(patient.name, patient.id);
        select.add(option);
    });
}

function validateForm() {
    const form = document.getElementById('appointment-form');
    let isValid = true;

    // Clear previous validation states
    form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));

    // Validate required fields
    const requiredFields = ['patient-id', 'room-id', 'appointment-date', 'start-time', 'end-time', 'type'];
    requiredFields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (!field.value.trim()) {
            field.classList.add('is-invalid');
            isValid = false;
        }
    });

    // Validate time logic
    const startTime = document.getElementById('start-time').value;
    const endTime = document.getElementById('end-time').value;
    
    if (startTime && endTime && startTime >= endTime) {
        document.getElementById('end-time').classList.add('is-invalid');
        displayMessage('End time must be after start time', 'danger');
        isValid = false;
    }

    return isValid;
}

function validateTimes() {
    const startTime = document.getElementById('start-time').value;
    const endTime = document.getElementById('end-time').value;
    
    if (startTime && endTime && startTime >= endTime) {
        document.getElementById('end-time').classList.add('is-invalid');
    } else {
        document.getElementById('end-time').classList.remove('is-invalid');
    }
}

function setTimeSlot(startTime, endTime) {
    document.getElementById('start-time').value = startTime;
    document.getElementById('end-time').value = endTime;
    validateTimes();
}

function createAppointment() {
    const formData = new FormData();
    formData.append('entity', 'appointments');
    formData.append('action', 'create');
    formData.append('patient_id', document.getElementById('patient-id').value);
    formData.append('room_id', document.getElementById('room-id').value);
    formData.append('appointment_date', document.getElementById('appointment-date').value);
    formData.append('start_time', document.getElementById('start-time').value);
    formData.append('end_time', document.getElementById('end-time').value);
    formData.append('type', document.getElementById('type').value);
    formData.append('subtype', document.getElementById('subtype').value);
    formData.append('notes', document.getElementById('notes').value);
    
    // Disable submit button to prevent double submission
    const submitBtn = document.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Creating...';
    
    fetch('api.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            displayMessage('Appointment created successfully!', 'success');
            // Redirect to appointments list after a short delay
            setTimeout(() => {
                window.location.href = 'appointments.php';
            }, 1500);
        } else {
            displayMessage('Error: ' + (data.error || 'Unknown error'), 'danger');
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    })
    .catch(error => {
        console.error('Error creating appointment:', error);
        displayMessage('Failed to create appointment. Please try again.', 'danger');
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
    });
}

function displayMessage(message, type) {
    const messagesContainer = document.getElementById('status-messages');
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;
    messagesContainer.appendChild(alertDiv);
    
    // Auto-remove after 5 seconds
    setTimeout(() => {
        if (alertDiv.parentNode) {
            alertDiv.remove();
        }
    }, 5000);
}
</script>

<?php require_once 'includes/footer.php'; ?>
