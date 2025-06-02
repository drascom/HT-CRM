<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

// Ensure user is logged in
if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

$page_title = "Appointment Management";
require_once 'includes/header.php';
?>

<div class="container-fluid mt-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">
            <i class="fas fa-calendar-check me-2 text-primary"></i>
            Appointment Management
        </h2>
        <div class="btn-group" role="group">
            <a href="add_appointment.php" class="btn btn-success">
                <i class="fas fa-plus me-1"></i>
                Add Appointment
            </a>
            <a href="calendar.php" class="btn btn-primary">
                <i class="fas fa-calendar me-1"></i>
                Calendar View
            </a>
        </div>
    </div>

    <!-- Status Messages -->
    <div id="status-messages"></div>

    <!-- Filters -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-3">
                    <label for="filter-date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="filter-date">
                </div>
                <div class="col-md-3">
                    <label for="filter-room" class="form-label">Room</label>
                    <select class="form-select" id="filter-room">
                        <option value="">All Rooms</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="filter-type" class="form-label">Type</label>
                    <select class="form-select" id="filter-type">
                        <option value="">All Types</option>
                        <option value="consult">Consultation</option>
                        <option value="cosmetic">Cosmetic</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="button" class="btn btn-outline-primary me-2" onclick="applyFilters()">
                        <i class="fas fa-search me-1"></i>
                        Filter
                    </button>
                    <button type="button" class="btn btn-outline-secondary" onclick="clearFilters()">
                        <i class="fas fa-times me-1"></i>
                        Clear
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Spinner -->
    <div id="loading-spinner" class="text-center py-4" style="display: none;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <!-- Appointments Table -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="appointments-table">
                    <thead class="table-light">
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Patient</th>
                            <th>Room</th>
                            <th>Type</th>
                            <th>Subtype</th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="appointments-tbody">
                        <!-- Appointments will be loaded here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Edit Appointment Modal -->
<div class="modal fade" id="editAppointmentModal" tabindex="-1" aria-labelledby="editAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAppointmentModalLabel">Edit Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="edit-appointment-form">
                <div class="modal-body">
                    <input type="hidden" id="edit-appointment-id">
                    
                    <div class="mb-3">
                        <label for="edit-patient-id" class="form-label">Patient *</label>
                        <select class="form-select" id="edit-patient-id" required>
                            <option value="">Select Patient</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="edit-room-id" class="form-label">Room *</label>
                        <select class="form-select" id="edit-room-id" required>
                            <option value="">Select Room</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="edit-appointment-date" class="form-label">Date *</label>
                        <input type="date" class="form-control" id="edit-appointment-date" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit-start-time" class="form-label">Start Time *</label>
                                <input type="time" class="form-control" id="edit-start-time" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit-end-time" class="form-label">End Time *</label>
                                <input type="time" class="form-control" id="edit-end-time" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit-type" class="form-label">Type *</label>
                        <select class="form-select" id="edit-type" required>
                            <option value="">Select Type</option>
                            <option value="consult">Consultation</option>
                            <option value="cosmetic">Cosmetic</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="edit-subtype" class="form-label">Subtype</label>
                        <input type="text" class="form-control" id="edit-subtype" placeholder="e.g., Online, Botox, PRP">
                    </div>

                    <div class="mb-3">
                        <label for="edit-notes" class="form-label">Notes</label>
                        <textarea class="form-control" id="edit-notes" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Appointment</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
let appointments = [];
let rooms = [];
let patients = [];

document.addEventListener('DOMContentLoaded', function() {
    loadInitialData();
    
    // Edit form submission
    document.getElementById('edit-appointment-form').addEventListener('submit', function(e) {
        e.preventDefault();
        updateAppointment();
    });
});

async function loadInitialData() {
    showLoading(true);
    
    try {
        // Load rooms, patients, and appointments in parallel
        const [roomsResponse, patientsResponse, appointmentsResponse] = await Promise.all([
            fetch('api.php?entity=rooms&action=list'),
            fetch('api.php?entity=patients&action=list'),
            fetch('api.php?entity=appointments&action=list')
        ]);

        const roomsData = await roomsResponse.json();
        const patientsData = await patientsResponse.json();
        const appointmentsData = await appointmentsResponse.json();

        if (roomsData.success) {
            rooms = roomsData.rooms || [];
            populateRoomSelects();
        }

        if (patientsData.success) {
            patients = patientsData.patients || [];
            populatePatientSelects();
        }

        if (appointmentsData.success) {
            appointments = appointmentsData.appointments || [];
            renderAppointmentsTable();
        } else {
            displayMessage('Error loading appointments: ' + (appointmentsData.error || 'Unknown error'), 'danger');
        }
    } catch (error) {
        console.error('Error loading data:', error);
        displayMessage('Failed to load data. Please try again.', 'danger');
    } finally {
        showLoading(false);
    }
}

function populateRoomSelects() {
    const filterSelect = document.getElementById('filter-room');
    const editSelect = document.getElementById('edit-room-id');
    
    // Clear existing options (except first)
    filterSelect.innerHTML = '<option value="">All Rooms</option>';
    editSelect.innerHTML = '<option value="">Select Room</option>';
    
    rooms.forEach(room => {
        if (room.is_active) {
            const filterOption = new Option(room.name, room.id);
            const editOption = new Option(room.name, room.id);
            filterSelect.add(filterOption);
            editSelect.add(editOption);
        }
    });
}

function populatePatientSelects() {
    const editSelect = document.getElementById('edit-patient-id');
    
    // Clear existing options (except first)
    editSelect.innerHTML = '<option value="">Select Patient</option>';
    
    patients.forEach(patient => {
        const option = new Option(patient.name, patient.id);
        editSelect.add(option);
    });
}

function renderAppointmentsTable() {
    const tbody = document.getElementById('appointments-tbody');
    
    if (appointments.length === 0) {
        tbody.innerHTML = `
            <tr>
                <td colspan="8" class="text-center text-muted py-4">
                    <i class="fas fa-calendar-times fa-2x mb-2"></i><br>
                    No appointments found
                </td>
            </tr>
        `;
        return;
    }

    tbody.innerHTML = appointments.map(appointment => `
        <tr>
            <td>${formatDate(appointment.appointment_date)}</td>
            <td>${appointment.start_time} - ${appointment.end_time}</td>
            <td>${appointment.patient_name}</td>
            <td>${appointment.room_name}</td>
            <td>
                <span class="badge ${appointment.type === 'consult' ? 'bg-info' : 'bg-success'}">
                    ${appointment.type === 'consult' ? 'Consultation' : 'Cosmetic'}
                </span>
            </td>
            <td>${appointment.subtype || '-'}</td>
            <td>${appointment.notes || '-'}</td>
            <td>
                <div class="btn-group btn-group-sm" role="group">
                    <button type="button" class="btn btn-outline-primary" onclick="editAppointment(${appointment.id})" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-outline-danger" onclick="deleteAppointment(${appointment.id}, '${appointment.patient_name}')" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
    `).join('');
}

function formatDate(dateString) {
    const date = new Date(dateString + 'T00:00:00');
    return date.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });
}

function applyFilters() {
    const date = document.getElementById('filter-date').value;
    const roomId = document.getElementById('filter-room').value;
    const type = document.getElementById('filter-type').value;
    
    let url = 'api.php?entity=appointments&action=list';
    const params = [];
    
    if (date) params.push(`date=${date}`);
    if (roomId) params.push(`room_id=${roomId}`);
    if (type) params.push(`type=${type}`);
    
    if (params.length > 0) {
        url += '&' + params.join('&');
    }
    
    showLoading(true);
    
    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                appointments = data.appointments || [];
                renderAppointmentsTable();
            } else {
                displayMessage('Error filtering appointments: ' + (data.error || 'Unknown error'), 'danger');
            }
        })
        .catch(error => {
            console.error('Error filtering appointments:', error);
            displayMessage('Failed to filter appointments. Please try again.', 'danger');
        })
        .finally(() => {
            showLoading(false);
        });
}

function clearFilters() {
    document.getElementById('filter-date').value = '';
    document.getElementById('filter-room').value = '';
    document.getElementById('filter-type').value = '';
    
    // Reload all appointments
    loadInitialData();
}

function editAppointment(appointmentId) {
    const appointment = appointments.find(a => a.id == appointmentId);
    if (!appointment) {
        displayMessage('Appointment not found', 'danger');
        return;
    }
    
    // Populate form
    document.getElementById('edit-appointment-id').value = appointment.id;
    document.getElementById('edit-patient-id').value = appointment.patient_id;
    document.getElementById('edit-room-id').value = appointment.room_id;
    document.getElementById('edit-appointment-date').value = appointment.appointment_date;
    document.getElementById('edit-start-time').value = appointment.start_time;
    document.getElementById('edit-end-time').value = appointment.end_time;
    document.getElementById('edit-type').value = appointment.type;
    document.getElementById('edit-subtype').value = appointment.subtype || '';
    document.getElementById('edit-notes').value = appointment.notes || '';
    
    // Show modal
    const modal = new bootstrap.Modal(document.getElementById('editAppointmentModal'));
    modal.show();
}

function updateAppointment() {
    const formData = new FormData();
    formData.append('entity', 'appointments');
    formData.append('action', 'update');
    formData.append('id', document.getElementById('edit-appointment-id').value);
    formData.append('patient_id', document.getElementById('edit-patient-id').value);
    formData.append('room_id', document.getElementById('edit-room-id').value);
    formData.append('appointment_date', document.getElementById('edit-appointment-date').value);
    formData.append('start_time', document.getElementById('edit-start-time').value);
    formData.append('end_time', document.getElementById('edit-end-time').value);
    formData.append('type', document.getElementById('edit-type').value);
    formData.append('subtype', document.getElementById('edit-subtype').value);
    formData.append('notes', document.getElementById('edit-notes').value);
    
    fetch('api.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            displayMessage(data.message, 'success');
            bootstrap.Modal.getInstance(document.getElementById('editAppointmentModal')).hide();
            loadInitialData(); // Reload appointments
        } else {
            displayMessage('Error: ' + (data.error || 'Unknown error'), 'danger');
        }
    })
    .catch(error => {
        console.error('Error updating appointment:', error);
        displayMessage('Failed to update appointment. Please try again.', 'danger');
    });
}

function deleteAppointment(appointmentId, patientName) {
    if (!confirm(`Are you sure you want to delete the appointment for "${patientName}"?`)) {
        return;
    }
    
    const formData = new FormData();
    formData.append('entity', 'appointments');
    formData.append('action', 'delete');
    formData.append('id', appointmentId);
    
    fetch('api.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            displayMessage(data.message, 'success');
            loadInitialData(); // Reload appointments
        } else {
            displayMessage('Error: ' + (data.error || 'Unknown error'), 'danger');
        }
    })
    .catch(error => {
        console.error('Error deleting appointment:', error);
        displayMessage('Failed to delete appointment. Please try again.', 'danger');
    });
}

function showLoading(show) {
    document.getElementById('loading-spinner').style.display = show ? 'block' : 'none';
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
