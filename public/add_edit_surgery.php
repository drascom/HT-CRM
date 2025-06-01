<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

// Ensure user is logged in
if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

$surgery = null;
$errors = [];
$is_editing = false;

// Fetch surgery data if ID is provided (for editing)

$surgery_id = $_GET['id'] ?? null;
$patient_id_from_url = $_GET['patient_id'] ?? null; // Get patient_id if passed in URL
$room_id_from_url = $_GET['room_id'] ?? null; // Get room_id if passed in URL
$date_from_url = $_GET['date'] ?? null; // Get date if passed in URL
$is_editing = $surgery_id !== null;

$page_title = $is_editing ? 'Edit Surgery' : 'Add New Surgery';
require_once 'includes/header.php';
?>

<!-- Status Messages -->
<div id="status-messages">
    <!-- Success or error messages will be displayed here -->
</div>

<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">
        <i class="fas fa-hospital me-2 text-primary"></i>
        <?php echo $page_title; ?>
    </h2>
    <a href="<?php echo $is_editing ? 'surgeries.php' : 'surgeries.php'; ?>" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-1"></i>
        <span class="d-none d-sm-inline">Back to Surgeries</span>
    </a>
</div>

<!-- Surgery Form -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-hospital me-2"></i>
            Surgery Information
        </h5>
    </div>
    <div class="card-body">
        <form id="surgery-form">
            <?php if ($is_editing): ?>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($surgery_id); ?>">
            <?php endif; ?>
            <input type="hidden" name="entity" value="surgeries">
            <input type="hidden" name="action" value="<?php echo $is_editing ? 'update' : 'add'; ?>">

            <?php if (!$is_editing): // Only show patient selection when adding 
            ?>
            <div class="mb-3">
                <label for="patient_id" class="form-label">
                    <i class="fas fa-user me-1"></i>
                    Patient
                </label>
                <div class="input-group">
                    <select class="form-select" id="patient_id" name="patient_id" required>
                        <option value="">Select Patient</option>
                        <!-- Patient options will be loaded via JavaScript -->
                    </select>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#newPatientModal">
                        <i class="fas fa-plus me-1"></i>
                        <span class="d-none d-sm-inline">New Patient</span>
                    </button>
                </div>
            </div>
            <?php else: // If editing, patient_id is part of the surgery data fetched via API 
            ?>
            <input type="hidden" name="patient_id" id="patient_id">
            <?php endif; ?>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="date" class="form-label">
                            <i class="fas fa-calendar me-1"></i>
                            Surgery Date
                        </label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">
                            <i class="fas fa-info-circle me-1"></i>
                            Status
                        </label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="scheduled">Scheduled</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="graft_count" class="form-label">
                            <i class="fas fa-hashtag me-1"></i>
                            Graft Count
                        </label>
                        <input type="number" class="form-control" id="graft_count" name="graft_count" min="0"
                            placeholder="Enter graft count">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="room_id" class="form-label">
                            <i class="fas fa-door-open me-1"></i>
                            Operating Room
                        </label>
                        <select class="form-select" id="room_id" name="room_id">
                            <option value="">Select Room</option>
                            <!-- Room options will be loaded via JavaScript -->
                        </select>
                        <div class="form-text" id="room-availability-text"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label for="technicians" class="form-label mb-0">
                                <i class="fas fa-user-md me-1"></i>
                                Assigned Technicians <span class="text-danger">*</span>
                                <small class="text-muted">(minimum 2 required)</small>
                            </label>
                            <button type="button" class="btn btn-primary btn-sm" id="add-technicians-btn">
                                <i class="fas fa-plus me-1"></i>
                                Add
                            </button>
                        </div>
                        <select class="form-select" id="technicians" name="technicians[]" multiple
                            style="display: none;">
                            <!-- This select is hidden - technician selection happens via modal -->
                        </select>
                        <div id="technicians-feedback" class="invalid-feedback">
                            At least 2 technicians must be assigned to this surgery.
                        </div>
                        <div id="assigned-technicians" class="mt-2">
                            <!-- Assigned technicians will be displayed here -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="notes" class="form-label">
                    <i class="fas fa-sticky-note me-1"></i>
                    Notes
                </label>
                <textarea class="form-control" id="notes" name="notes" rows="4"
                    placeholder="Enter any additional notes about the surgery..."></textarea>
            </div>

            <div class="d-flex flex-column flex-sm-row gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i>
                    <span id="save-button-text"><?php echo $is_editing ? 'Update Surgery' : 'Add Surgery'; ?></span>
                </button>
                <a href="<?php echo $is_editing ? 'surgeries.php' : 'surgeries.php'; ?>" class="btn btn-secondary">
                    <i class="fas fa-times me-1"></i>
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<!-- New Patient Modal -->
<div class="modal fade" id="newPatientModal" tabindex="-1" aria-labelledby="newPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPatientModalLabel">
                    <i class="fas fa-user-plus me-2"></i>
                    Create New Patient
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="new-patient-form">
                    <?php if (is_admin() || is_editor()): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="new_patient_agency_id" class="form-label">
                                    <i class="fas fa-building me-1"></i>
                                    Agency
                                </label>
                                <select class="form-select" id="new_patient_agency_id" name="agency_id">
                                    <option value="">Select Agency (Optional)</option>
                                    <!-- Agency options will be loaded dynamically -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <?php elseif (is_agent()): ?>
                    <!-- Hidden field for agents - their agency_id will be set via JavaScript -->
                    <input type="hidden" id="new_patient_agency_id" name="agency_id" value="">
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="new_patient_name" class="form-label">
                                    <i class="fas fa-user me-1"></i>
                                    Patient Name
                                </label>
                                <input type="text" class="form-control" id="new_patient_name" name="name"
                                    placeholder="Enter patient name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="new_patient_dob" class="form-label">
                                    <i class="fas fa-calendar me-1"></i>
                                    Date of Birth
                                </label>
                                <input type="date" class="form-control" id="new_patient_dob" name="dob">
                            </div>
                        </div>
                    </div>
                </form>
                <div id="new-patient-status"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Cancel
                </button>
                <button type="button" class="btn btn-primary" id="save-new-patient">
                    <i class="fas fa-save me-1"></i>Create Patient
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Technician Selection Modal -->
<div class="modal fade" id="technicianModal" tabindex="-1" aria-labelledby="technicianModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="technicianModalLabel">
                    <i class="fas fa-user-md me-2"></i>
                    Select Available Technicians
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="technician-loading" class="text-center py-3">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2">Loading available technicians...</p>
                </div>
                <div id="technician-list" class="d-none">
                    <!-- Technicians will be loaded here -->
                </div>
                <div id="no-technicians" class="alert alert-warning d-none">
                    No technicians are available for the selected date. Please choose another date.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="save-technicians">Save Selection</button>
            </div>
        </div>
    </div>
</div>


<?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const surgeryForm = document.getElementById('surgery-form');
    const statusMessagesDiv = document.getElementById('status-messages');
    const surgeryIdInput = document.querySelector('#surgery-form input[name="id"]');
    const isEditing = surgeryIdInput !== null;
    const patientSelect = document.getElementById('patient_id'); // Get the patient select dropdown
    const patientIdHiddenInput = document.querySelector(
        '#surgery-form input[name="patient_id"]'); // Hidden patient_id for editing
    const roomSelect = document.getElementById('room_id');
    const dateInput = document.getElementById('date');
    const roomAvailabilityText = document.getElementById('room-availability-text');

    const newPatientModal = document.getElementById('newPatientModal');
    const saveNewPatientButton = document.getElementById('save-new-patient');
    const newPatientForm = document.getElementById('new-patient-form');
    const newPatientStatusDiv = document.getElementById('new-patient-status');
    let allAgencies = []; // Store all agencies for modal dropdown


    // Function to display messages
    function displayMessage(message, type = 'success') {
        statusMessagesDiv.innerHTML = `<div class="alert alert-${type}">${message}</div>`;
    }

    // Function to fetch agencies for the modal
    function fetchModalAgencies() {
        const userRole = '<?php echo get_user_role(); ?>';
        const userAgencyId = '<?php echo get_user_agency_id(); ?>';

        if (userRole === 'agent') {
            // For agents, just set their agency_id
            populateModalAgencyDropdown();
        } else {
            // For admin and editor, fetch all agencies
            fetch('api.php?entity=agencies&action=list')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        allAgencies = data.agencies;
                        populateModalAgencyDropdown();
                    } else {
                        console.error('Error fetching agencies:', data.message);
                    }
                })
                .catch(error => {
                    console.error('Error fetching agencies:', error);
                });
        }
    }

    // Function to populate agency dropdown in modal
    function populateModalAgencyDropdown() {
        const agencySelect = document.getElementById('new_patient_agency_id');
        const userRole = '<?php echo get_user_role(); ?>';
        const userAgencyId = '<?php echo get_user_agency_id(); ?>';

        if (!agencySelect) return; // Field might not exist for all roles

        // For agents, set their agency_id in the hidden field
        if (userRole === 'agent' && userAgencyId) {
            agencySelect.value = userAgencyId;
        } else {
            agencySelect.innerHTML = '<option value="">Select Agency (Optional)</option>';
            allAgencies.forEach(agency => {
                const option = document.createElement('option');
                option.value = agency.id;
                option.textContent = agency.name;
                agencySelect.appendChild(option);
            });
        }
    }

    // Function to apply editor role restrictions
    function applyEditorRestrictions(surgery) {
        const userRole = '<?php echo get_user_role(); ?>';

        if (userRole === 'editor' && isEditing) {
            const isCompleted = surgery.status && surgery.status.toLowerCase() === 'completed';

            // Disable all fields except status
            document.getElementById('date').disabled = true;
            document.getElementById('graft_count').disabled = true;
            document.getElementById('room_id').disabled = true;
            document.getElementById('notes').disabled = true;

            // Disable save button if completed
            const saveButton = document.querySelector('button[type="submit"]');
            if (isCompleted && saveButton) {
                saveButton.disabled = true;
                saveButton.innerHTML = '<i class="fas fa-lock me-1"></i>Surgery Completed';
                saveButton.title = 'Cannot edit completed surgery';
            }

            // Add visual indication
            const form = document.getElementById('surgery-form');
            const editorNotice = document.createElement('div');
            editorNotice.className = 'alert alert-info mb-3';
            editorNotice.innerHTML = `
                <i class="fas fa-info-circle me-2"></i>
                <strong>Editor Mode:</strong> You can only modify the status field.
                ${isCompleted ? 'This surgery is completed and cannot be edited further.' : ''}
            `;
            form.insertBefore(editorNotice, form.firstChild);
        }
    }

    // Function to load room options
    function loadRoomOptions(selectRoomId = null) { // Add parameter
        fetch('api.php?entity=rooms&action=list')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    roomSelect.innerHTML = '<option value="">Select Room</option>';
                    data.rooms.forEach(room => {
                        if (room.is_active) { // Only show active rooms
                            const option = document.createElement('option');
                            option.value = room.id;
                            option.textContent = room.name + (room.capacity ?
                                ` (${room.capacity} people)` : '');
                            option.disabled = false; // Ensure options are not disabled initially
                            roomSelect.appendChild(option);
                        }
                    });

                    // Check availability if date is already selected
                    // Do this BEFORE setting the selected value
                    if (dateInput.value) {
                        checkRoomAvailability();
                    }

                    console.log("All room options:", Array.from(roomSelect.options).map(opt => [opt.value,
                        opt.text
                    ])); // Added log
                    console.log("roomToSelect to assign:", selectRoomId, typeof selectRoomId); // Added log

                    // Select the room if selectRoomId is provided
                    if (selectRoomId && roomSelect) {
                        roomSelect.value = String(selectRoomId); // Ensure type match
                        console.log("room select done ", roomSelect,
                            selectRoomId); // Add console log for verification
                    }
                } else {
                    console.error('Error fetching room options:', data.error);
                }
            })
            .catch(error => {
                console.error('Error fetching room options:', error);
            });
    }

    // Function to check room availability for selected date
    function checkRoomAvailability() {
        const selectedDate = dateInput.value;
        if (!selectedDate) {
            roomAvailabilityText.innerHTML = '';
            return;
        }

        fetch(`api.php?entity=availability&action=byDate&date=${selectedDate}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const statistics = data.statistics;
                    const availableCount = statistics.available_rooms;
                    const totalActive = statistics.active_rooms;

                    // Update availability text with count
                    if (availableCount > 0) {
                        roomAvailabilityText.innerHTML = `<small class="text-success">
                            <i class="fas fa-check me-1"></i>
                            ${availableCount} out of ${totalActive} rooms available for the selected date.
                        </small>`;
                        roomSelect.classList.remove('is-invalid');
                    } else {
                        roomAvailabilityText.innerHTML = `<small class="text-danger">
                            <i class="fas fa-exclamation-triangle me-1"></i>
                            There is no available room. Please select another date.
                        </small>`;
                        roomSelect.classList.add('is-invalid');
                    }

                    updateRoomAvailability(data.rooms);
                } else {
                    console.error('Error checking room availability:', data.error);
                    roomAvailabilityText.innerHTML = `<small class="text-danger">
                        <i class="fas fa-exclamation-triangle me-1"></i>
                        Error checking room availability.
                    </small>`;
                }
            })
            .catch(error => {
                console.error('Error checking room availability:', error);
                roomAvailabilityText.innerHTML = `<small class="text-danger">
                    <i class="fas fa-exclamation-triangle me-1"></i>
                    Error checking room availability.
                </small>`;
            });
    }

    // Function to update room availability display
    function updateRoomAvailability(rooms) {
        const roomOptions = Array.from(roomSelect.options)
            .filter(opt => opt.value !== '');
        const currentSurgeryId = isEditing ? surgeryIdInput.value : null;

        roomOptions.forEach(option => {
            const roomId = parseInt(option.value);
            const room = rooms.find(r => r.id === roomId);

            if (room) {
                // Don't disable room if it's booked by the current surgery being edited
                const isBookedByCurrentSurgery = room.status === 'booked' &&
                    currentSurgeryId && room.surgery_id == currentSurgeryId;

                option.disabled = room.status === 'booked' && !isBookedByCurrentSurgery;

                if (room.status === 'booked' && !isBookedByCurrentSurgery) {
                    option.textContent = option.textContent.replace(' (Booked)', '') + ' (Booked)';
                } else {
                    option.textContent = option.textContent.replace(' (Booked)', '');
                }
            }
        });

        // Update availability text
        const bookedRooms = rooms.filter(r => r.status === 'booked' &&
            !(currentSurgeryId && r.surgery_id == currentSurgeryId));
        if (bookedRooms.length > 0) {
            roomAvailabilityText.innerHTML = `<small class="text-warning">
                <i class="fas fa-exclamation-triangle me-1"></i>
                ${bookedRooms.length} room(s) already booked for this date
            </small>`;
        } else {
            roomAvailabilityText.innerHTML = `<small class="text-success">
                <i class="fas fa-check me-1"></i>
                All rooms available for this date
            </small>`;
        }
    }

    // Fetch patient options for the dropdown
    function fetchPatientOptions(selectPatientId = null) {
        const userRole = '<?php echo get_user_role(); ?>';
        const userAgencyId = '<?php echo get_user_agency_id(); ?>';

        // Build API URL with agency filter for agents
        let apiUrl = 'api.php?entity=patients&action=list';
        if (userRole === 'agent' && userAgencyId) {
            apiUrl += `&agency=${userAgencyId}`;
        }

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    patientSelect.innerHTML =
                        '<option value="">Select Patient</option>'; // Keep the default option
                    data.patients.forEach(patient => {
                        const option = document.createElement('option');
                        option.value = patient.id;
                        option.textContent = patient.name;
                        if (selectPatientId && patient.id == selectPatientId) {
                            option.selected = true;
                        }
                        patientSelect.appendChild(option);
                    });
                } else {
                    console.error('Error fetching patient options:', data.error);
                    // Optionally display an error message for the dropdown
                }
            })
            .catch(error => {
                console.error('Error fetching patient options:', error);
                // Optionally display an error message for the dropdown
            });
    }

    let roomToSelect = null; // Declare variable here

    // Fetch surgery data if editing
    if (isEditing) {
        const surgeryId = surgeryIdInput.value;
        fetch(`api.php?entity=surgeries&action=get&id=${surgeryId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const surgery = data.surgery;

                    document.getElementById('date').value = surgery.date;
                    document.getElementById('status').value = surgery.status;
                    document.getElementById('graft_count').value = surgery.graft_count;
                    document.getElementById('notes').value = surgery.notes;

                    // Set the hidden patient_id for editing
                    if (patientIdHiddenInput) {
                        patientIdHiddenInput.value = surgery.patient_id;
                    }

                    // Store room_id to select later
                    roomToSelect = surgery.room_id;
                    console.log("Fetched surgery room_id:", roomToSelect);

                    // Load existing technician assignments
                    if (surgery.technician_ids && surgery.technician_ids.length > 0) {
                        // Store technician data for display
                        if (surgery.technicians) {
                            surgery.technicians.forEach(tech => {
                                technicianData.set(tech.id.toString(), {
                                    name: tech.name,
                                    specialty: tech.specialty,
                                    period: tech.period ||
                                        'full' // Default to full if not specified
                                });
                            });
                        }

                        surgery.technician_ids.forEach(techId => {
                            selectedTechnicians.add(techId.toString());
                        });
                        updateAssignedTechnicians();
                    }

                    // Apply editor role restrictions
                    applyEditorRestrictions(surgery);

                    // Now that surgery data is loaded, load room options and check availability
                    loadRoomOptions(roomToSelect);

                } else {
                    displayMessage(`Error loading surgery: ${data.error}`, 'danger');
                }
            })
            .catch(error => {
                console.error('Error fetching surgery:', error);
                displayMessage('An error occurred while loading surgery data.', 'danger');
            });
    } else {
        // If adding a new surgery, fetch patient options
        const patientIdFromUrl = <?php echo json_encode($patient_id_from_url); ?>;
        const roomIdFromUrl = <?php echo json_encode($room_id_from_url); ?>;
        const dateFromUrl = <?php echo json_encode($date_from_url); ?>;

        fetchPatientOptions(
            patientIdFromUrl); // Fetch and populate patient dropdown, pre-selecting if patient_id is in URL

        // Pre-fill date if provided from URL
        if (dateFromUrl) {
            document.getElementById('date').value = dateFromUrl;
        }

        // If adding, load room options and pre-select if provided
        loadRoomOptions(roomIdFromUrl);
    }

    // Fetch agencies for modal
    fetchModalAgencies();

    // Add event listener for date changes to check room availability
    if (dateInput) {
        dateInput.addEventListener('change', checkRoomAvailability);
    }

    // Initialize technician selection
    const technicianModal = new bootstrap.Modal(document.getElementById('technicianModal'));
    const addTechniciansBtn = document.getElementById('add-technicians-btn');
    const technicianList = document.getElementById('technician-list');
    const saveTechniciansBtn = document.getElementById('save-technicians');
    const assignedTechniciansDiv = document.getElementById('assigned-technicians');
    const selectedTechnicians = new Set();
    const technicianData = new Map(); // Store technician info (id -> {name, specialty, period})

    // Load available technicians for the selected date
    function loadAvailableTechnicians() {
        const selectedDate = dateInput.value;
        if (!selectedDate) {
            alert('Please select a surgery date first');
            return;
        }

        document.getElementById('technician-loading').classList.remove('d-none');
        document.getElementById('technician-list').classList.add('d-none');
        document.getElementById('no-technicians').classList.add('d-none');

        // For now, we'll load all available technicians for the date
        // In the future, we could add period selection to the UI
        fetch(`api.php?entity=techAvail&action=byDate&date=${selectedDate}`)
            .then(response => response.json())
            .then(data => {
                if (data.success && data.technicians && data.technicians.length > 0) {
                    renderTechnicianList(data.technicians);
                    document.getElementById('technician-list').classList.remove('d-none');

                    // Update modal title with count
                    document.getElementById('technicianModalLabel').innerHTML = `
                        <i class="fas fa-user-md me-2"></i>
                        Select Available Technicians (${data.count} available)
                    `;
                } else {
                    document.getElementById('no-technicians').classList.remove('d-none');
                    document.getElementById('technicianModalLabel').innerHTML = `
                        <i class="fas fa-user-md me-2"></i>
                        Select Available Technicians (0 available)
                    `;
                }
            })
            .catch(error => {
                console.error('Error loading technicians:', error);
                document.getElementById('no-technicians').classList.remove('d-none');
            })
            .finally(() => {
                document.getElementById('technician-loading').classList.add('d-none');
            });
    }

    // Render technician list in modal
    function renderTechnicianList(technicians) {
        // Store technician data for later use
        technicians.forEach(tech => {
            technicianData.set(tech.id.toString(), {
                name: tech.name,
                specialty: tech.specialty,
                period: tech.period || 'full'
            });
        });

        technicianList.innerHTML = technicians.map(tech => {
            // Format period display
            let periodDisplay = '';
            if (tech.available_periods) {
                const periods = tech.available_periods;
                if (periods.includes('full')) {
                    periodDisplay = 'All day';
                } else {
                    const periodNames = periods.map(p => p === 'am' ? 'Morning' : 'Afternoon');
                    periodDisplay = periodNames.join(', ');
                }
            } else {
                // Fallback for single period
                periodDisplay = tech.period === 'full' ? 'All day' :
                    tech.period === 'am' ? 'Morning' : 'Afternoon';
            }

            return `
                <div class="form-check mb-2">
                    <input class="form-check-input technician-checkbox" type="checkbox"
                           value="${tech.id}" id="tech-${tech.id}"
                           ${selectedTechnicians.has(tech.id.toString()) ? 'checked' : ''}>
                    <label class="form-check-label" for="tech-${tech.id}">
                        <strong>${tech.name}</strong> ${tech.specialty ? `<span class="badge bg-secondary">${tech.specialty}</span>` : ''}
                        <small class="text-muted d-block">Available: ${periodDisplay}</small>
                        ${tech.phone ? `<small class="text-muted d-block">Phone: ${tech.phone}</small>` : ''}
                    </label>
                </div>
            `;
        }).join('');
    }

    // Update status based on room and technicians
    function updateSurgeryStatus() {
        const statusSelect = document.getElementById('status');
        const roomValue = roomSelect.value;

        if (roomValue && selectedTechnicians.size >= 2) {
            // Auto-update to confirmed when room and at least 2 technicians are selected
            statusSelect.value = 'confirmed';
        } else if (!isEditing) {
            // Reset to scheduled for new surgeries
            statusSelect.value = 'scheduled';
        }
    }

    // Validate technicians (minimum 2)
    function validateTechnicians() {
        const techniciansFeedback = document.getElementById('technicians-feedback');
        if (selectedTechnicians.size < 2) {
            assignedTechniciansDiv.classList.add('is-invalid');
            techniciansFeedback.style.display = 'block';
            return false;
        } else {
            assignedTechniciansDiv.classList.remove('is-invalid');
            techniciansFeedback.style.display = 'none';
            return true;
        }
    }

    // Update assigned technicians display
    function updateAssignedTechnicians() {
        if (selectedTechnicians.size === 0) {
            assignedTechniciansDiv.innerHTML = '<div class="text-muted">No technicians assigned</div>';
            return;
        }

        assignedTechniciansDiv.innerHTML = Array.from(selectedTechnicians).map(techId => {
            const techInfo = technicianData.get(techId);
            const techName = techInfo ? techInfo.name : `Technician #${techId}`;
            const techPeriod = techInfo && techInfo.period ? ` (${techInfo.period})` : '';
            return `
                <div class="badge bg-primary me-2 mb-2 p-2">
                    ${techName}${techPeriod}
                    <button type="button" class="btn-close btn-close-white ms-2"
                            data-tech-id="${techId}" aria-label="Remove"></button>
                </div>
            `;
        }).join('');

        // Add hidden inputs for form submission
        Array.from(selectedTechnicians).forEach(techId => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'technician_ids[]';
            input.value = techId;
            assignedTechniciansDiv.appendChild(input);
        });

        // Add event listeners for remove buttons
        assignedTechniciansDiv.querySelectorAll('button[data-tech-id]').forEach(button => {
            button.addEventListener('click', function() {
                const techId = this.getAttribute('data-tech-id');
                removeTechnician(techId);
            });
        });

        validateTechnicians();
        updateSurgeryStatus();
    }

    // Remove technician from selection
    function removeTechnician(techId) {
        selectedTechnicians.delete(techId);
        updateAssignedTechnicians();
    }

    // Event listeners
    addTechniciansBtn.addEventListener('click', function() {
        loadAvailableTechnicians();
        technicianModal.show();
    });

    saveTechniciansBtn.addEventListener('click', function() {
        // Get all checked technicians
        document.querySelectorAll('.technician-checkbox:checked').forEach(checkbox => {
            selectedTechnicians.add(checkbox.value);
        });

        updateAssignedTechnicians();
        technicianModal.hide();
    });

    // Add event listener for date changes to check technician availability
    dateInput.addEventListener('change', function() {
        // Clear selected technicians when date changes
        selectedTechnicians.clear();
        updateAssignedTechnicians();
    });

    // Handle surgery form submission
    surgeryForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Add Bootstrap validation classes
        surgeryForm.classList.add('was-validated');

        // Check form validity
        if (!surgeryForm.checkValidity()) {
            displayMessage('Please fill in all required fields correctly.', 'danger');
            return;
        }

        // Validate technicians
        if (!validateTechnicians()) {
            displayMessage('At least 2 technicians must be assigned to this surgery.', 'danger');
            return;
        }

        // Re-enable all room options before submitting to ensure selected value is included
        Array.from(roomSelect.options).forEach(option => {
            option.disabled = false;
        });

        const formData = new FormData(surgeryForm);

        // Note: technician IDs are already included as hidden inputs by updateAssignedTechnicians()

        fetch('api.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    displayMessage(data.message, 'success');
                    // Redirect after a short delay on success
                    setTimeout(() => {
                        // Redirect based on whether it was an edit or add from patient list
                        if (isEditing ||
                            <?php echo json_encode($patient_id_from_url !== null); ?>) {
                            window.location.href =
                                `patient.php?id=${formData.get('patient_id')}`;
                        } else {
                            window.location.href = 'surgeries.php';
                        }
                    }, 500);
                } else {
                    displayMessage(`Error: ${data.error || data.message}`, 'danger');
                }
            })
            .catch(error => {
                console.error('Error submitting surgery form:', error);
                displayMessage('An error occurred while saving surgery data.', 'danger');
            });
    });

    // Handle new patient modal submission (AJAX to api.php)
    if (saveNewPatientButton) {
        saveNewPatientButton.addEventListener('click', function() {
            const formData = new FormData(newPatientForm);
            formData.append('entity', 'patients');
            formData.append('action', 'add'); // Change action from 'create' to 'add'

            // Note: agency_id is now handled by the form field (hidden for agents, select for admin/editor)

            newPatientStatusDiv.innerHTML = ''; // Clear previous status

            fetch('api.php', { // Call the new API endpoint
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        newPatientStatusDiv.innerHTML =
                            '<div class="alert alert-success">Patient created successfully!</div>';
                        // Add the new patient to the select dropdown
                        if (patientSelect) {
                            const newOption = new Option(data.patient.name, data.patient.id, true,
                                true);
                            patientSelect.add(newOption);
                        }
                        // Close the modal after a short delay
                        setTimeout(() => {
                            const modal = bootstrap.Modal.getInstance(newPatientModal);
                            modal.hide();
                        }, 500);
                    } else {
                        newPatientStatusDiv.innerHTML =
                            `<div class="alert alert-danger">${data.error || 'An error occurred.'}</div>`;
                    }
                })
                .catch(error => {
                    console.error('Error creating patient:', error);
                    newPatientStatusDiv.innerHTML =
                        '<div class="alert alert-danger">An error occurred while creating the patient.</div>';
                });
        });
    }

    // Add event listener to graft_count to update status
    const graftCountInput = document.getElementById('graft_count');
    const statusSelect = document.getElementById('status');

    if (graftCountInput && statusSelect) {
        graftCountInput.addEventListener('input', function() {
            // Check if the graft_count input has a value (is not empty and not just whitespace)
            if (this.value.trim() !== '' && parseInt(this.value) >= 0) {
                statusSelect.value = 'completed';
            }
            // Optional: Reset status if graft_count is cleared
            // else {
            //     // You might want to reset to 'booked' or leave as is
            //     // statusSelect.value = 'booked';
            // }
        });
    }

    // Reset modal form when hidden
    if (newPatientModal) {
        newPatientModal.addEventListener('hidden.bs.modal', function() {
            newPatientForm.reset();
            newPatientStatusDiv.innerHTML = '';
        });
    }
});
</script>