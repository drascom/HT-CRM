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

<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">
        <i class="far fa-calendar-check me-2 text-primary"></i>
        Appointments
    </h4>
    <div class="btn-group" role="group">
        <a href="add_appointment.php" class="btn btn-sm btn-outline-success">
            <i class="fas fa-plus me-1"></i>
            Add Appointment
        </a>
        <a href="calendar.php" class="btn btn-sm btn-outline-primary">
            <i class="far fa-calendar me-1"></i>
            Calendar
        </a>
    </div>
</div>

<!-- Status Messages -->
<div id="status-messages"></div>

<!-- Search Bar -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" class="form-control" id="search-input"
                        placeholder="Search appointments by patient name, room, date, procedure, or notes...">
                    <button class="btn btn-outline-secondary" type="button" id="clear-search">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
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
<div class="card ">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover  table-sm" id="appointments-table">
                <thead class="table-light">
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Patient</th>
                        <th>Room</th>
                        <th>Procedure</th>
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


<!-- Edit Appointment Modal -->
<div class="modal fade" id="editAppointmentModal" tabindex="-1" aria-labelledby="editAppointmentModalLabel"
    aria-hidden="true">
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
                        <label for="edit-procedure-id" class="form-label">Procedure *</label>
                        <div class="input-group">
                            <select class="form-select" id="edit-procedure-id" required>
                                <option value="">Select Procedure</option>
                                <!-- Procedures will be loaded dynamically -->
                            </select>
                            <button type="button" class="btn btn-link btn-sm" data-bs-toggle="modal"
                                data-bs-target="#newProcedureModal">
                                <i class="fas fa-plus me-1"></i>
                                <span class="d-none d-sm-inline">Add New</span>
                            </button>
                        </div>
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

    document.addEventListener('DOMContentLoaded', function () {
        loadInitialData();

        // Search functionality
        const searchInput = document.getElementById('search-input');
        const clearSearchBtn = document.getElementById('clear-search');

        searchInput.addEventListener('input', searchAppointments);
        clearSearchBtn.addEventListener('click', function () {
            searchInput.value = '';
            renderAppointmentsTable();
        });

        // Edit form submission
        document.getElementById('edit-appointment-form').addEventListener('submit', function (e) {
            e.preventDefault();
            updateAppointment();
        });
    });

    async function loadInitialData() {
        showLoading(true);

        try {
            // Load rooms, patients, procedures, and appointments in parallel
            const [roomsData, patientsData, proceduresData, appointmentsData] = await Promise.all([
                apiRequest('rooms', 'list'),
                apiRequest('patients', 'list'),
                apiRequest('procedures', 'active'),
                apiRequest('appointments', 'list')
            ]);

            if (roomsData.success) {
                rooms = roomsData.rooms || [];
                populateRoomSelects();
            }

            if (patientsData.success) {
                patients = patientsData.patients || [];
                populatePatientSelects();
            }

            if (proceduresData.success) {
                procedures = proceduresData.procedures || [];
                populateProcedureSelects();
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
        const editSelect = document.getElementById('edit-room-id');

        // Clear existing options (except first)
        editSelect.innerHTML = '<option value="">Select Room</option>';

        rooms.forEach(room => {
            if (room.is_active) {
                const editOption = new Option(room.name, room.id);
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

    function populateProcedureSelects() {
        const editSelect = document.getElementById('edit-procedure-id');

        if (editSelect) {
            editSelect.innerHTML = '<option value="">Select Procedure</option>';
            procedures.forEach(procedure => {
                const editOption = new Option(procedure.name, procedure.id);
                editSelect.add(editOption);
            });
        }
    }

    function renderAppointmentsTable() {
        const tbody = document.getElementById('appointments-tbody');

        if (appointments.length === 0) {
            tbody.innerHTML = `
            <tr>
                <td colspan="6" class="text-center text-muted py-4">
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
                <span class="badge bg-primary">
                    ${appointment.procedure_name || 'No Procedure'}
                </span>
            </td>
            <td>${appointment.notes || '-'}</td>
            <td>
                <div class="btn-group btn-group-sm" role="group">
                    <button type="button" class="btn btn-text text-primary" onclick="editAppointment(${appointment.id})" title="Edit">
                        <i class="fas fa-edit"></i><span class="d-none d-lg-inline ms-1">Edit</span>
                    </button>
                    <button type="button" class="btn btn-text text-danger" onclick="deleteAppointment(${appointment.id}, '${appointment.patient_name}')" title="Delete">
                        <i class="fas fa-trash"></i> <span class="d-none d-lg-inline ms-1">Delete</span>
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

    function searchAppointments() {
        const searchTerm = document.getElementById('search-input').value.toLowerCase().trim();

        if (!searchTerm) {
            renderAppointmentsTable();
            return;
        }

        const filteredAppointments = appointments.filter(appointment => {
            return (
                appointment.patient_name.toLowerCase().includes(searchTerm) ||
                appointment.room_name.toLowerCase().includes(searchTerm) ||
                appointment.appointment_date.includes(searchTerm) ||
                (appointment.procedure_name && appointment.procedure_name.toLowerCase().includes(searchTerm)) ||
                (appointment.notes && appointment.notes.toLowerCase().includes(searchTerm))
            );
        });

        renderFilteredAppointmentsTable(filteredAppointments);
    }

    function renderFilteredAppointmentsTable(filteredAppointments) {
        const tbody = document.getElementById('appointments-tbody');

        if (filteredAppointments.length === 0) {
            tbody.innerHTML = `
            <tr>
                <td colspan="6" class="text-center text-muted py-4">
                    <i class="fas fa-search fa-2x mb-2"></i><br>
                    No appointments found matching your search
                </td>
            </tr>
        `;
            return;
        }

        tbody.innerHTML = filteredAppointments.map(appointment => `
        <tr>
            <td>${formatDate(appointment.appointment_date)}</td>
            <td>${appointment.start_time} - ${appointment.end_time}</td>
            <td>${appointment.patient_name}</td>
            <td>${appointment.room_name}</td>
            <td>
                <span class="badge bg-primary">
                    ${appointment.procedure_name || 'No Procedure'}
                </span>
            </td>
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
        document.getElementById('edit-procedure-id').value = appointment.procedure_id || '';
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
        formData.append('procedure_id', document.getElementById('edit-procedure-id').value);
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