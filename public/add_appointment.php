<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

// ---------------------------------------------------------------------------
// GUARD: ensure user is logged in
// ---------------------------------------------------------------------------
if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

// ---------------------------------------------------------------------------
// PRE‑SELECTED DATA (comes from the calendar view)
// ---------------------------------------------------------------------------
$room_id = $_GET['room_id'] ?? null;
$date = $_GET['date'] ?? null;   // YYYY‑MM‑DD expected
$request_type = $_GET['request'] ?? null;   // consultation / cosmetology / …

// If both parameters are present we consider the form "calendar flow" (prefilled)
$prefilled = ($room_id && $date);

$page_title = 'Add Appointment';
require_once 'includes/header.php';
?>

<!-- ===========================================================
     STATUS / FLASH MESSAGES
     =========================================================== -->
<div id="status-messages"></div>

<!-- ===========================================================
     CARD WRAPPER
     =========================================================== -->
<div class="card">
    <!-- ------------------------- CARD HEADER -------------------------- -->
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center py-2">
            <a href="appointments.php" class="btn btn-sm btn-outline-dark">
                <i class="fas fa-arrow-left me-1"></i>
                <span class="d-none d-sm-inline">Appointments</span>
            </a>
            <h4 class="mb-0">
                <i class="far fa-calendar-plus me-2 text-success"></i>New Appointment
            </h4>
            <a href="calendar.php" class="btn btn-sm btn-outline-primary">
                <i class="far fa-calendar-alt me-1"></i>
                <span class="d-none d-sm-inline">Calendar</span>
            </a>
        </div>
    </div>

    <!-- -------------------------- CARD BODY --------------------------- -->
    <div class="card-body">
        <form id="appointment-form" novalidate>
            <div class="row g-2">

                <!-- =====================================================
                     LEFT COLUMN  ‑‑ DATE / ROOM / PROCEDURE / NOTES
                     ===================================================== -->
                <div class="col-md-5">
                    <!-- ----------------- DATE & ROOM ----------------- -->
                    <fieldset class="border rounded p-3 mb-4 bg-light shadow-sm">
                        <legend class="w-auto px-2 mb-3" style="font-size:1rem;">
                            <i class="far fa-calendar-alt me-2"></i>Date &amp; Room
                        </legend>

                        <?php if ($prefilled): ?>
                            <!-- Calendar‑flow: show summary + hidden inputs -->
                            <div class="alert alert-info mb-2">
                                <i class="far fa-calendar me-2"></i>
                                <strong>Date:</strong>
                                <?= date('F j, Y', strtotime($date)) ?>
                                <input type="hidden" id="appointment-date" name="appointment_date"
                                    value="<?= htmlspecialchars($date) ?>">
                            </div>
                            <div class="alert alert-success">
                                <i class="fas fa-door-open me-2"></i>
                                <strong>Room:</strong>
                                <span id="selected-room-name">Loading…</span>
                                <input type="hidden" id="room-id" name="room_id" value="<?= htmlspecialchars($room_id) ?>">
                            </div>
                        <?php else: ?>
                            <!-- Manual‑flow: editable fields -->
                            <div class="mb-3">
                                <input type="date" class="form-control" id="appointment-date-input" name="appointment_date">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <select class="form-select" id="room-id-input" name="room_id">
                                    <option value="">Select Room</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        <?php endif; ?>
                    </fieldset>

                    <!-- -------------- PROCEDURE (if applicable) -------------- -->

                    <fieldset class="border rounded p-3 mb-3 bg-light shadow-sm">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <legend class="w-auto m-0 p-0" style="font-size:1rem;">
                                <i class="fas fa-procedures me-2"></i>Procedure
                            </legend>
                            <button type="button" class="btn btn-link btn-sm" data-bs-toggle="modal"
                                data-bs-target="#newProcedureModal">
                                <i class="far fa-plus me-1"></i><span class="d-none d-sm-inline">Add</span>
                            </button>
                        </div>

                        <input class="form-control" id="procedure-id" name="procedure_id">
                        <!-- options loaded via JS -->
                        </input>
                        <div class="invalid-feedback"></div>

                    </fieldset>


                    <!-- --------------------- NOTES ---------------------- -->
                    <fieldset class="border rounded p-3 mb-3 bg-light shadow-sm">
                        <legend class="w-auto px-2 mb-3" style="font-size:1rem;">
                            <i class="far fa-sticky-note me-2"></i>Notes
                        </legend>
                        <textarea class="form-control" id="notes" name="notes" rows="3"
                            placeholder="Additional notes or special instructions"></textarea>
                    </fieldset>
                </div>

                <!-- =====================================================
                     RIGHT COLUMN  ‑‑ PATIENT & TIME
                     ===================================================== -->
                <div class="col-md-7">
                    <!-- ---------------- PATIENT ---------------- -->
                    <fieldset class="border rounded p-3 mb-3 bg-light shadow-sm">
                        <div class="d-flex justify-content-between align-items-center">
                            <legend class="w-auto px-3 m-0 p-0" style="font-size:1rem;">
                                <i class="far fa-user me-2"></i>Patient
                            </legend>
                            <button type="button" class="btn btn-link btn-sm" data-bs-toggle="modal"
                                data-bs-target="#newPatientModal">
                                <i class="far fa-plus me-1"></i><span class="d-none d-sm-inline">Add</span>
                            </button>
                        </div>
                        <div class="input-group">
                            <select class="form-select" id="patient-id" name="patient_id">
                                <option value="">Select Patient</option>
                            </select>
                        </div>
                        <div class="invalid-feedback" style="display:none;"></div>
                    </fieldset>

                    <!-- ----------------- TIME ------------------- -->
                    <fieldset class="border rounded p-3 mb-3 bg-light shadow-sm">
                        <legend class="w-auto px-2 mb-3" style="font-size:1rem;">
                            <i class="far fa-clock me-2"></i>Time
                        </legend>
                        <div class="row">
                            <div class="col-md-5">
                                <!-- Quick slots -->
                                <div class="row g-1 mb-3 justify-content-center">
                                    <?php foreach ([['09:00', '10:00'], ['10:00', '11:00'], ['11:00', '12:00'], ['14:00', '15:00'], ['15:00', '16:00'], ['16:00', '17:00']] as [$s, $e]): ?>
                                        <div class="col-auto">
                                            <button type="button" class="btn btn-outline-primary btn-sm"
                                                onclick="setTimeSlot('<?= $s ?>','<?= $e ?>')">
                                                <?= $s ?> - <?= $e ?>
                                            </button>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="start-time" class="form-label">Start *</label>
                                    <input type="time" id="start-time" name="start_time" class="form-control">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="end-time" class="form-label">End *</label>
                                    <input type="time" id="end-time" name="end_time" class="form-control">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

            <!-- ------------------- ACTIONS -------------------- -->
            <div class="card-footer p-4 d-flex justify-content-between">
                <a href="<?= $prefilled ? 'calendar.php' : 'appointments.php' ?>" class="btn btn-secondary">
                    <i class="fas fa-times me-1"></i>Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="far fa-save me-1"></i>Create Appointment
                </button>
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
                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="new-patient-form">
                    <?php if (is_admin() || is_editor()): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="new_patient_agency_id" class="form-label">
                                        <i class="far fa-building me-1"></i>
                                        Agency
                                    </label>
                                    <select class="form-select" id="new_patient_agency_id" name="agency_id">
                                        <option value="">Select Agency ()</option>
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
                                    <i class="far fa-user me-1"></i>
                                    Patient Name *
                                </label>
                                <input type="text" class="form-control" id="new_patient_name" name="name"
                                    placeholder="Enter patient name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="new_patient_dob" class="form-label">
                                    <i class="far fa-calendar me-1"></i>
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
                <button type="button" class="btn btn-link btn-primary" id="save-new-patient">
                    <i class="far fa-save me-1"></i>Create Patient
                </button>
            </div>
        </div>
    </div>
</div>

<!-- New Procedure Modal -->
<div class="modal fade" id="newProcedureModal" tabindex="-1" aria-labelledby="newProcedureModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newProcedureModalLabel">
                    <i class="fas fa-plus-circle me-2"></i>
                    Create New Procedure
                </h5>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="new-procedure-form">
                    <div class="mb-3">
                        <label for="new_procedure_name" class="form-label">
                            <i class="fas fa-stethoscope me-1"></i>
                            Procedure Name *
                        </label>
                        <input type="text" class="form-control" id="new_procedure_name" name="name"
                            placeholder="Enter procedure name" required>
                        <div class="form-text">Enter a unique name for the new procedure</div>
                    </div>
                </form>
                <div id="new-procedure-status"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Cancel
                </button>
                <button type="button" class="btn btn-sm btn-primary" id="save-new-procedure">
                    <i class="far fa-save me-1"></i>Create Procedure
                </button>
            </div>
        </div>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>

<!-- ===========================================================
     JAVASCRIPT
     =========================================================== -->
<script>
    console.log('DEBUG: add_appointment.php script loaded.'); // Debug log to confirm script execution

    // ---------------------------------------------------------------------------
    // GLOBAL STATE
    // ---------------------------------------------------------------------------
    let rooms = [];
    let patients = [];
    let procedures = [];
    let formWasSubmitted = false;
    const prefilled = <?= $prefilled ? 'true' : 'false' ?>;

    // ---------------------------------------------------------------------------
    // INIT (fires regardless of script placement)
    // ---------------------------------------------------------------------------
    function initPage() {
        console.log('Initialising page…');
        loadInitialData();

        // Form submit
        const form = document.getElementById('appointment-form');
        if (form) form.addEventListener('submit', onFormSubmit);

        // Initialize Tom-Select for procedure dropdown
        new TomSelect("#procedure-id", {
            create: true,
            sortField: {
                field: "text",
                direction: "asc"
            },
            placeholder: "Select procedure",
            allowEmptyOption: false,

        });

        // Real‑time validation listeners (attach if elements exist)
        ['patient-id', 'start-time', 'end-time', 'procedure-id', 'appointment-date-input', 'room-id-input'].forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.addEventListener('change', () => { if (formWasSubmitted) validateSingleField(id); });
            }
        });

        // Default date → today when in manual flow
        if (!prefilled) {
            const dateInput = document.getElementById('appointment-date-input');
            if (dateInput && !dateInput.value) {
                dateInput.value = new Date().toISOString().split('T')[0];
            }
        }
    }

    // Call initPage directly as the script is placed at the end of the body
    initPage();

    // ---------------------------------------------------------------------------
    // DATA LOADING – uses global apiRequest from header.php
    // ---------------------------------------------------------------------------
    async function loadInitialData() {
        console.log('Loading initial data…');
        try {
            const [roomsR, patientsR, proceduresR] = await Promise.all([
                apiRequest('rooms', 'list'),
                apiRequest('patients', 'list'),
                apiRequest('procedures', 'active')
            ]);

            rooms = roomsR.rooms || [];
            patients = patientsR.patients || [];
            procedures = proceduresR.procedures || [];

            if (prefilled) {
                populatePrefilledRoomDisplay();
            } else {
                populateRoomSelect();
            }
            populatePatientSelect();
            populateProcedureSelect();
        } catch (err) {
            console.error(err);
            displayMessage('Failed to load initial data', 'danger');
        }
    }

    async function populatePrefilledRoomDisplay() {
        const span = document.getElementById('selected-room-name');
        if (!span) return;
        const roomId = <?= $room_id ? (int) $room_id : 'null' ?>;
        const rm = rooms.find(r => r.id == roomId);
        if (rm) {
            span.textContent = rm.name;
        } else if (roomId) {
            // If room not found in initial list, try fetching it directly
            try {
                const data = await apiRequest('rooms', 'get', { id: roomId });
                if (data.success && data.room) {
                    span.textContent = data.room.name;
                } else {
                    span.textContent = 'Unknown Room';
                }
            } catch (error) {
                console.error('Error fetching prefilled room details:', error);
                span.textContent = 'Unknown Room';
            }
        } else {
            span.textContent = 'N/A';
        }
    }

    function populateRoomSelect() {
        const select = document.getElementById('room-id-input');
        if (!select) return;
        select.innerHTML = '<option value="">Select Room</option>';
        rooms.filter(r => r.is_active).forEach(r => {
            const opt = new Option(r.name, r.id);
            select.appendChild(opt);
        });
    }

    function populatePatientSelect() {
        const select = document.getElementById('patient-id');
        if (!select) return;
        select.innerHTML = '<option value="">Select Patient</option>';
        patients.forEach(p => select.add(new Option(p.name, p.id)));
    }

    function populateProcedureSelect() {
        const selectElement = document.getElementById('procedure-id');
        if (!selectElement) return;

        // Get the Tom-Select instance
        const tomSelectInstance = selectElement.tomselect;
        if (!tomSelectInstance) {
            console.error('Tom-Select instance not found for #procedure-id');
            return;
        }

        tomSelectInstance.clearOptions(); // Clear existing options

        const requestType = '<?= $request_type ?? '' ?>';
        let selectedValue = '';

        if (requestType.toLowerCase() === 'consultation') {
            const consultationProcedure = procedures.find(p => p.id == 1);
            if (consultationProcedure) {
                tomSelectInstance.addOption({ value: 1, text: escapeHtml(consultationProcedure.name) });
                selectedValue = 1;
                tomSelectInstance.enable();
            } else {
                tomSelectInstance.addOption({ value: '', text: 'Consultation not available' });
                tomSelectInstance.disable();
            }
        } else if (requestType == '') {
            procedures
                .forEach(p => {
                    tomSelectInstance.addOption({ value: p.id, text: escapeHtml(p.name) });
                });
        } else {
            procedures
                .filter(p => p.id != 1)
                .forEach(p => {
                    tomSelectInstance.addOption({ value: p.id, text: escapeHtml(p.name) });
                });
            tomSelectInstance.enable();
        }
        tomSelectInstance.setValue(selectedValue); // Set the selected value
    }

    // ---------------------------------------------------------------------------
    // FORM SUBMISSION
    // ---------------------------------------------------------------------------
    function onFormSubmit(e) {
        e.preventDefault();
        formWasSubmitted = true;
        if (!validateForm()) return;

        const payload = {
            patient_id: document.getElementById('patient-id').value,
            room_id: prefilled ? <?= $room_id ? (int) $room_id : 'null' ?> : document.getElementById('room-id-input').value,
            appointment_date: prefilled ? '<?= $date ?? '' ?>' : document.getElementById('appointment-date-input').value,
            start_time: document.getElementById('start-time').value,
            end_time: document.getElementById('end-time').value,
            procedure_id: document.getElementById('procedure-id') ? document.getElementById('procedure-id').value : null,
            notes: document.getElementById('notes').value
        };

        // Use apiRequest helper
        apiRequest('appointments', 'create', payload)
            .then(res => {
                if (res.success) {
                    displayMessage('Appointment created successfully!', 'success');
                    setTimeout(() => location.href = 'appointments.php', 1500);
                } else {
                    throw new Error(res.error || 'Unknown error');
                }
            })
            .catch(err => {
                console.error(err);
                displayMessage('Failed to create appointment: ' + err.message, 'danger');
            });
    }

    // ---------------------------------------------------------------------------
    // VALIDATION
    // ---------------------------------------------------------------------------
    function validateForm() {
        // Reset previous errors
        document.querySelectorAll('#appointment-form .is-invalid').forEach(el => el.classList.remove('is-invalid'));
        document.querySelectorAll('#appointment-form .invalid-feedback').forEach(el => el.textContent = '');

        let valid = true;
        const requiredFields = [
            { id: 'patient-id', msg: 'Please select a patient.' },
            { id: 'start-time', msg: 'Start time required.' },
            { id: 'end-time', msg: 'End time required.' },
            { id: 'procedure-id', msg: 'Please select a procedure.' }
        ];

        if (!prefilled) {
            requiredFields.push({ id: 'appointment-date-input', msg: 'Date required.' });
            requiredFields.push({ id: 'room-id-input', msg: 'Room required.' });
        }

        requiredFields.forEach(f => {
            const el = document.getElementById(f.id);
            if (el && !el.value.trim()) {
                el.classList.add('is-invalid');
                (el.nextElementSibling || {}).textContent = f.msg;
                valid = false;
            }
        });

        // Logical time check
        const s = document.getElementById('start-time').value;
        const e = document.getElementById('end-time').value;
        if (s && e && s >= e) {
            const endField = document.getElementById('end-time');
            endField.classList.add('is-invalid');
            endField.nextElementSibling.textContent = 'End time must be after start time.';
            valid = false;
        }
        return valid;
    }

    function validateSingleField(id) {
        const el = document.getElementById(id);
        if (!el) return;
        if (!el.value.trim()) {
            el.classList.add('is-invalid');
        } else {
            el.classList.remove('is-invalid');
            if (el.nextElementSibling) el.nextElementSibling.textContent = '';
        }
    }

    // ---------------------------------------------------------------------------
    // UTILS
    // ---------------------------------------------------------------------------
    function setTimeSlot(start, end) {
        document.getElementById('start-time').value = start;
        document.getElementById('end-time').value = end;
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function displayMessage(msg, type = 'info') {
        const wrap = document.getElementById('status-messages');
        wrap.innerHTML = `<div class="alert alert-${type} alert-dismissible fade show" role="alert">${msg}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>`;
    }

    function populateModalAgencyDropdown() {
        try {
            const agencySelect = document.getElementById('new_patient_agency_id');
            const userRole = '<?php echo get_user_role(); ?>';
            const userAgencyId = '<?php echo get_user_agency_id(); ?>';



            if (!agencySelect) {

                return; // Field might not exist for all roles
            }

            if (userRole === 'agent') {
                // For agents, set their agency_id in the hidden field

                agencySelect.value = userAgencyId;
            } else if (userRole === 'admin' || userRole === 'editor') {
                // For admin/editor, populate the dropdown

                agencySelect.innerHTML = '<option value="">Select Agency (Optional)</option>';

                // Ensure allAgencies is defined and is an array
                if (typeof allAgencies !== 'undefined' && Array.isArray(allAgencies)) {
                    allAgencies.forEach(agency => {
                        const option = document.createElement('option');
                        option.value = agency.id;
                        option.textContent = agency.name;
                        agencySelect.appendChild(option);
                    });
                } else {
                    console.warn('allAgencies is not defined or not an array:', allAgencies);
                }

            }
        } catch (error) {
            console.error('Error in populateModalAgencyDropdown:', error);
            // Ensure allAgencies is defined to prevent further errors
            if (typeof allAgencies === 'undefined') {
                allAgencies = [];
            }
            populateModalAgencyDropdown();
        }
    }

    // Function to fetch agencies for the modal
    function fetchModalAgencies() {
        try {
            const userRole = '<?php echo get_user_role(); ?>';
            const userAgencyId = '<?php echo get_user_agency_id(); ?>';


            if (userRole === 'agent') {
                // For agents, just set their agency_id

                populateModalAgencyDropdown();
            } else {
                // For admin and editor, fetch all agencies

                apiRequest('agencies', 'list')
                    .then(data => {
                        if (data.success) {
                            allAgencies = data.agencies || [];

                            populateModalAgencyDropdown();
                        } else {
                            console.error('Error fetching agencies:', data.error);
                            // Still populate with empty array to prevent errors
                            allAgencies = [];
                            populateModalAgencyDropdown();
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching agencies:', error);
                        // Still populate with empty array to prevent errors
                        allAgencies = [];
                        populateModalAgencyDropdown();
                    });
            }
        } catch (error) {
            console.error('Error in fetchModalAgencies:', error);
            // Ensure allAgencies is defined to prevent further errors
            if (typeof allAgencies === 'undefined') {
                allAgencies = [];
            }
            populateModalAgencyDropdown();
        }
    }

    // ============================================================================
    // MODAL FUNCTIONS
    // ============================================================================

    // New Patient Modal functionality
    document.addEventListener('DOMContentLoaded', function () {
        const newPatientModal = document.getElementById('newPatientModal');
        const saveNewPatientButton = document.getElementById('save-new-patient');
        const newPatientForm = document.getElementById('new-patient-form');
        const newPatientStatusDiv = document.getElementById('new-patient-status');

        // Handle new patient modal submission
        if (saveNewPatientButton) {
            saveNewPatientButton.addEventListener('click', function () {
                const formData = new FormData(newPatientForm);
                formData.append('entity', 'patients');
                formData.append('action', 'add');

                newPatientStatusDiv.innerHTML = ''; // Clear previous status

                // Disable button to prevent double submission
                const originalText = saveNewPatientButton.innerHTML;
                saveNewPatientButton.disabled = true;
                saveNewPatientButton.innerHTML = '<i class="far fa-spinner fa-spin me-1"></i>Creating...';

                apiRequest('patients', 'add', Object.fromEntries(formData))
                    .then(data => {
                        if (data.success) {
                            newPatientStatusDiv.innerHTML =
                                '<div class="alert alert-success">Patient created successfully!</div>';
                            // Add the new patient to the appropriate select dropdown based on flow
                            let patientSelect;
                            patientSelect = document.getElementById('patient-id');
                            if (patientSelect) {
                                const newOption = new Option(data.patient.name, data.patient.id, true,
                                    true);
                                patientSelect.add(newOption);
                            }

                            // Close the modal after a short delay
                            setTimeout(() => {
                                const modal = bootstrap.Modal.getInstance(newPatientModal);
                                modal.hide();
                            }, 1000);
                        } else {
                            newPatientStatusDiv.innerHTML =
                                `<div class="alert alert-danger">${data.error || 'An error occurred.'}</div>`;
                        }
                    })
                    .catch(error => {
                        console.error('Error creating patient:', error);
                        newPatientStatusDiv.innerHTML =
                            '<div class="alert alert-danger">An error occurred while creating the patient.</div>';
                    })
                    .finally(() => {
                        // Re-enable button
                        saveNewPatientButton.disabled = false;
                        saveNewPatientButton.innerHTML = originalText;
                    });
            });
        }

        // Fetch agencies when modal is shown
        if (newPatientModal) {
            newPatientModal.addEventListener('show.bs.modal', function (event) {
                try {
                    // Fetch agencies when modal opens
                    fetchModalAgencies();
                } catch (error) {
                    console.error('Error in modal show event:', error);
                    // Don't prevent the modal from opening
                }
            });

            // Clear form when modal is hidden
            newPatientModal.addEventListener('hidden.bs.modal', function () {
                try {
                    newPatientForm.reset();
                    newPatientStatusDiv.innerHTML = '';
                    // Clear validation states
                    newPatientForm.querySelectorAll('.is-invalid').forEach(el => el.classList.remove(
                        'is-invalid'));
                    newPatientForm.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');
                } catch (error) {
                    console.error('Error clearing modal form:', error);
                }
            });
        }

        // Handle new procedure modal
        const newProcedureModal = document.getElementById('newProcedureModal');
        const newProcedureForm = document.getElementById('new-procedure-form');
        const saveNewProcedureButton = document.getElementById('save-new-procedure');
        const newProcedureStatusDiv = document.getElementById('new-procedure-status');

        // Handle new procedure modal submission
        if (saveNewProcedureButton) {
            saveNewProcedureButton.addEventListener('click', function () {
                const procedureName = document.getElementById('new_procedure_name').value.trim();

                if (!procedureName) {
                    newProcedureStatusDiv.innerHTML =
                        '<div class="alert alert-danger">Please enter a procedure name.</div>';
                    return;
                }

                newProcedureStatusDiv.innerHTML = ''; // Clear previous status

                // Disable button to prevent double submission
                const originalText = saveNewProcedureButton.innerHTML;
                saveNewProcedureButton.disabled = true;
                saveNewProcedureButton.innerHTML = '<i class="far fa-spinner fa-spin me-1"></i>Creating...';

                apiRequest('procedures', 'create', {
                    name: procedureName
                })
                    .then(data => {
                        if (data.success) {
                            newProcedureStatusDiv.innerHTML =
                                '<div class="alert alert-success">Procedure created successfully!</div>';

                            // Add the new procedure to the procedures array
                            const newProcedure = {
                                id: data.id,
                                name: procedureName
                            };
                            procedures.push(newProcedure);

                            // Refresh the procedure dropdowns
                            populateProcedureSelect();

                            // Select the new procedure in the appropriate dropdown based on flow
                            let procedureSelect;
                            procedureSelect = document.getElementById('procedure-id');
                            if (procedureSelect) {
                                procedureSelect.value = data.id;
                            }

                            // Clear the form
                            document.getElementById('new_procedure_name').value = '';

                            // Close the modal after a short delay
                            setTimeout(() => {
                                const modal = bootstrap.Modal.getInstance(newProcedureModal);
                                modal.hide();
                            }, 1000);
                        } else {
                            newProcedureStatusDiv.innerHTML =
                                `<div class="alert alert-danger">${data.error || 'An error occurred.'}</div>`;
                        }
                    })
                    .catch(error => {
                        console.error('Error creating procedure:', error);
                        newProcedureStatusDiv.innerHTML =
                            '<div class="alert alert-danger">An error occurred while creating the procedure.</div>';
                    })
                    .finally(() => {
                        // Re-enable button
                        saveNewProcedureButton.disabled = false;
                        saveNewProcedureButton.innerHTML = originalText;
                    });
            });
        }

        // Clear procedure modal when it's hidden
        if (newProcedureModal) {
            newProcedureModal.addEventListener('hidden.bs.modal', function () {
                document.getElementById('new_procedure_name').value = '';
                newProcedureStatusDiv.innerHTML = '';
            });
        }
    });

</script>