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
$room_type = $_GET['room_type'] ?? '';

// Determine flow type: 'calendar' (pre-filled) or 'manual' (empty form)
$flow_type = (!empty($room_id) && !empty($date)) ? 'calendar' : 'manual';

$page_title = "Add Appointment";
require_once 'includes/header.php';
?>


<!-- Status Messages -->
<div id="status-messages"></div>
<div class="row justify-content-center mt-2">
    <div class="col-md-12 col-lg-10 col-xl-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <!-- Page Header -->
                <div class="d-flex justify-content-between align-items-center">
                    <a href="appointments.php" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left me-1"></i>
                        <span class="d-none d-sm-inline">Appointments</span>

                    </a>
                    <h5 class="mb-0">
                        <i class="far fa-calendar-plus me-2 text-success"></i>
                        Add New
                    </h5>
                    <a href="calendar.php" class="btn btn-outline-primary btn-sm">
                        <i class="far fa-calendar-alt me-1"></i>
                        <span class="d-none d-sm-inline">Calendar</span>
                    </a>
                </div>
                <!-- /.page-header -->
            </div>
            <div class="card-body">
                <?php if ($flow_type === 'calendar'): ?>
                    <!-- CALENDAR FLOW: Quick appointment creation with pre-filled data -->
                    <div class="card-header bg-success text-white">
                        <i class="far fa-calendar-check me-2"></i> <small class="opacity-75">Pre-selected from
                            calendar</small>
                    </div>
                    <div class="card-body">
                        <form id="calendar-appointment-form">
                            <div class="row">
                                <div class="col-md-5">
                                    <fieldset class="border rounded p-3 mb-4 bg-light">
                                        <legend class="w-auto px-2 mb-3" style="font-size: 1rem;">
                                            <i class="far fa-calendar-alt me-2"></i>Date &amp; Room Selection
                                        </legend>
                                        <!-- Pre-filled Date and Room Display -->
                                        <div class="row mb-2">
                                            <div class="col-md-12">
                                                <div class="alert alert-info mb-2">
                                                    <i class="far fa-calendar me-2"></i>
                                                    <strong>Date:</strong> <?php echo date('F j, Y', strtotime($date)); ?>
                                                    <input type="hidden" id="appointment-date" value="<?php echo $date; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="alert alert-success mb-2">
                                                    <i class="fas fa-door-open me-2"></i>
                                                    <strong>Room:</strong> <span id="selected-room-name">Loading...</span>
                                                    <input type="hidden" id="room-id" value="<?php echo $room_id; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <?php if ($room_type != 'consultation'): ?>
                                        <input type="hidden" id="type" value="procedure">
                                        <fieldset class="border rounded p-3 mb-3 bg-light shadow-sm">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <legend class="w-auto px-2 m-0 p-0" style="font-size: 1rem;">
                                                    <i class="fas fa-procedures me-2"></i>Procedure Selection
                                                </legend>
                                                <button type="button" class="btn btn-link btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#newProcedureModal">
                                                    <i class="far fa-plus me-1"></i>
                                                    <span class="d-none d-sm-inline">Add New</span>
                                                </button>
                                            </div>
                                            <div class="input-group">
                                                <select class="form-select" id="type">
                                                    <option value="">Select procedure</option>
                                                    <!-- Procedures will be loaded dynamically -->
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </fieldset>
                                    <?php endif; ?>
                                    <fieldset class="col-12 border rounded p-3 mb-3 bg-light shadow-sm">
                                        <legend><i class="far fa-sticky-note me-2"></i>Notes</legend>
                                        <div class="mb-4">
                                            <textarea class="form-control" id="notes" rows="3"
                                                placeholder="Additional notes or special instructions"></textarea>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-md-7">
                                    <fieldset class=" border rounded mb-3 p-2 bg-light shadow-sm">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <legend class="w-auto px-3 m-0 p-0" style="font-size: 1rem;">
                                                <i class="far fa-user me-2"></i>Patient Selection
                                            </legend>
                                            <a type="button" class="btn btn-link btn-sm " data-bs-toggle="modal"
                                                data-bs-target="#newPatientModal">
                                                <i class="far fa-plus me-1"></i>
                                                <span class="d-none d-sm-inline">Add</span>
                                            </a>
                                        </div>

                                        <div class="input-group">
                                            <select class="form-select" id="patient-id">
                                                <option value="">Select Patient</option>
                                            </select>

                                        </div>
                                        <div class="invalid-feedback" style="display: none;">lease selec a patient.</div>
                                    </fieldset>
                                    <fieldset class="border rounded p-3 mb-3 bg-light shadow-sm">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row g-2 mb-3 justify-content-center">
                                                    <h6 class="card-title mb-0">
                                                        <i class="far fa-clock me-2"></i>Time Selection
                                                    </h6>
                                                    <div class="col-auto">
                                                        <button type="button" class="p-1 btn btn-outline-primary btn-sm"
                                                            onclick="setTimeSlot('09:00', '10:00')">09:00 -
                                                            10:00</button>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="button" class="p-1 btn btn-outline-primary btn-sm"
                                                            onclick="setTimeSlot('10:00', '11:00')">10:00 -
                                                            11:00</button>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="button" class="p-1 btn btn-outline-primary btn-sm"
                                                            onclick="setTimeSlot('11:00', '12:00')">11:00 -
                                                            12:00</button>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="button" class="p-1 btn btn-outline-primary btn-sm"
                                                            onclick="setTimeSlot('14:00', '15:00')">14:00 -
                                                            15:00</button>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="button" class="p-1 btn btn-outline-primary btn-sm"
                                                            onclick="setTimeSlot('15:00', '16:00')">15:00 -
                                                            16:00</button>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="button" class="p-1 btn btn-outline-primary btn-sm"
                                                            onclick="setTimeSlot('16:00', '17:00')">16:00 -
                                                            17:00</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="start-time" class="form-label">Start Time *</label>
                                                    <input type="time" class="form-control" id="start-time">
                                                    <div class="invalid-feedback"></div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="end-time" class="form-label">End Time *</label>
                                                    <input type="time" class="form-control" id="end-time">
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                </div>
                            </div>
                            <!-- Action Buttons -->
                            <div class="card-footer p-4 d-flex justify-content-between">
                                <a href="calendar.php" class="btn btn-secondary">
                                    <i class="fas fa-times me-1"></i>Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="far fa-save me-1"></i>Create Appointment
                                </button>
                            </div>
                        </form>
                    </div>
                <?php else: ?>
                    <!-- MANUAL FLOW: Full appointment creation form -->
                    <form id="manual-appointment-form">
                        <div>
                            <!-- Date and Room Selection -->
                            <div class="row g-2">
                                <div class="col-md-5">
                                    <fieldset class="border rounded p-3 mb-4 bg-light">
                                        <legend class="w-auto px-2 mb-3" style="font-size: 1rem;">
                                            <i class="far fa-calendar-alt me-2"></i>Date &amp; Room Selection
                                        </legend>
                                        <div class="mb-3">
                                            <input type="date" class="form-control" id="manual-appointment-date">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="mb-3">
                                            <select class="form-select" id="manual-room-id">
                                                <option value="">Select Room</option>
                                            </select>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="border rounded p-3 mb-3 bg-light shadow-sm">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <legend class="w-auto m-0 p-0" style="font-size: 1rem;">
                                                <i class="fas fa-procedures me-2"></i>Procedure Selection
                                            </legend>
                                            <button type="button" class="btn btn-link btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#newProcedureModal">
                                                <i class="far fa-plus me-1"></i>
                                                <span class="d-none d-sm-inline">Add</span>
                                            </button>
                                        </div>
                                        <div class="input-group">
                                            <select class="form-select" id="manual-type">
                                                <option value="">Select procedure</option>
                                                <!-- Procedures will be loaded dynamically -->
                                            </select>

                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-md-7">
                                    <fieldset class="border rounded p-3 mb-3 bg-light shadow-sm">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <legend class="w-auto px-3 m-0 p-0" style="font-size: 1rem;">
                                                <i class="far fa-user me-2"></i>Patient Selection
                                            </legend>
                                            <a type="button" class="btn btn-link btn-sm " data-bs-toggle="modal"
                                                data-bs-target="#newPatientModal">
                                                <i class="far fa-plus me-1"></i>
                                                <span class="d-none d-sm-inline">Add</span>
                                            </a>
                                        </div>
                                        <div class="input-group">
                                            <select class="form-select" id="manual-patient-id">
                                                <option value="">Select Patient</option>
                                            </select>

                                        </div>
                                        <div class="invalid-feedback"></div>
                                    </fieldset>
                                    <fieldset class="border rounded p-3 mb-3 bg-light shadow-sm">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row g-2 mb-3 justify-content-center">
                                                    <h6 class="card-title mb-0">
                                                        <i class="far fa-clock me-2"></i>Time Selection
                                                    </h6>
                                                    <div class="col-auto">
                                                        <button type="button" class="p-1 btn btn-outline-primary btn-sm"
                                                            onclick="setManualTimeSlot('09:00', '10:00')">09:00 -
                                                            10:00</button>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="button" class="p-1 btn btn-outline-primary btn-sm"
                                                            onclick="setManualTimeSlot('10:00', '11:00')">10:00 -
                                                            11:00</button>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="button" class="p-1 btn btn-outline-primary btn-sm"
                                                            onclick="setManualTimeSlot('11:00', '12:00')">11:00 -
                                                            12:00</button>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="button" class="p-1 btn btn-outline-primary btn-sm"
                                                            onclick="setManualTimeSlot('14:00', '15:00')">14:00 -
                                                            15:00</button>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="button" class="p-1 btn btn-outline-primary btn-sm"
                                                            onclick="setManualTimeSlot('15:00', '16:00')">15:00 -
                                                            16:00</button>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="button" class="p-1 btn btn-outline-primary btn-sm"
                                                            onclick="setManualTimeSlot('16:00', '17:00')">16:00 -
                                                            17:00</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="manual-start-time" class="form-label">Start Time *</label>
                                                    <input type="time" class="form-control" id="manual-start-time">
                                                    <div class="invalid-feedback"></div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="manual-end-time" class="form-label">End Time *</label>
                                                    <input type="time" class="form-control" id="manual-end-time">
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>


                                    </fieldset>
                                    <fieldset class="col-12 border rounded p-3 mb-3 bg-light shadow-sm">
                                        <legend><i class="far fa-sticky-note me-2"></i>Notes</legend>
                                        <div class="mb-4">
                                            <textarea class="form-control" id="manual-notes" rows="3"
                                                placeholder="Additional notes or special instructions"></textarea>
                                        </div>
                                    </fieldset>

                                </div>
                            </div>
                        </div>
                        <!-- Action Buttons -->
                        <div class="card-footer p-4 d-flex justify-content-between">
                            <a href="appointments.php" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="far fa-save me-1"></i>Create Appointment
                            </button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>



<!-- New Patient Modal -->
<div class="modal fade" id="newPatientModal" tabindex="-1" aria-labelledby="newPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPatientModalLabel">
                    <i class="far fa-user-plus me-2"></i>
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
                <button type="button" class="btn btn-primary" id="save-new-patient">
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
                    <i class="far fa-plus-circle me-2"></i>
                    Create New Procedure
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="new-procedure-form">
                    <div class="mb-3">
                        <label for="new_procedure_name" class="form-label">
                            <i class="far fa-stethoscope me-1"></i>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Cancel
                </button>
                <button type="button" class="btn btn-primary" id="save-new-procedure">
                    <i class="far fa-save me-1"></i>Create Procedure
                </button>
            </div>
        </div>
    </div>
</div>



<script>
    // ============================================================================
    // SHARED VARIABLES AND FUNCTIONS
    // ============================================================================
    let rooms = [];
    let patients = [];
    let procedures = [];
    let allAgencies = [];
    let formWasSubmitted = false;
    const flowType = '<?php echo $flow_type; ?>';

    // API helper is now loaded globally from api-helper.js

    // ============================================================================
    // INITIALIZATION
    // ============================================================================
    document.addEventListener('DOMContentLoaded', function () {
        loadInitialData();

        if (flowType === 'calendar') {
            initCalendarFlow();
        } else {
            initManualFlow();
        }
    });

    // ============================================================================
    // CALENDAR FLOW FUNCTIONS
    // ============================================================================
    function initCalendarFlow() {
        const form = document.getElementById('calendar-appointment-form');

        // Form submission
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            formWasSubmitted = true;

            if (validateCalendarForm()) {
                createCalendarAppointment();
            }
        });

        // Time validation
        document.getElementById('start-time').addEventListener('change', validateCalendarTimes);
        document.getElementById('end-time').addEventListener('change', validateCalendarTimes);

        // Real-time validation
        const requiredFields = ['patient-id', 'start-time', 'end-time', 'type'];
        requiredFields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            field.addEventListener('change', function () {
                if (formWasSubmitted) {
                    validateCalendarSingleField(fieldId);
                }
            });
        });
    }

    // ============================================================================
    // MANUAL FLOW FUNCTIONS
    // ============================================================================
    function initManualFlow() {
        const form = document.getElementById('manual-appointment-form');

        // Form submission
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            formWasSubmitted = true;

            if (validateManualForm()) {
                createManualAppointment();
            }
        });

        // Set default date to today
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('manual-appointment-date').value = today;

        // Time validation
        document.getElementById('manual-start-time').addEventListener('change', validateManualTimes);
        document.getElementById('manual-end-time').addEventListener('change', validateManualTimes);

        // Real-time validation
        const requiredFields = ['manual-patient-id', 'manual-room-id', 'manual-appointment-date', 'manual-start-time',
            'manual-end-time', 'manual-type'
        ];
        requiredFields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            field.addEventListener('change', function () {
                if (formWasSubmitted) {
                    validateManualSingleField(fieldId);
                }
            });
        });
    }

    // ============================================================================
    // SHARED DATA LOADING FUNCTIONS
    // ============================================================================
    async function loadInitialData() {
        try {
            const [roomsResponse, patientsResponse, proceduresResponse] = await Promise.all([
                apiRequest('rooms', 'list'),
                apiRequest('patients', 'list'),
                apiRequest('procedures', 'active')
            ]);

            const roomsData = roomsResponse;
            const patientsData = patientsResponse;
            const proceduresData = proceduresResponse;

            if (roomsData.success) {
                rooms = roomsData.rooms || [];
                if (flowType === 'calendar') {
                    populateCalendarRoomDisplay();
                } else {
                    populateManualRoomSelect();
                }
            } else {
                displayMessage('Error loading rooms: ' + (roomsData.error || 'Unknown error'), 'danger');
            }

            if (patientsData.success) {
                patients = patientsData.patients || [];
                if (flowType === 'calendar') {
                    populateCalendarPatientSelect();
                } else {
                    populateManualPatientSelect();
                }
            } else {
                displayMessage('Error loading patients: ' + (patientsData.error || 'Unknown error'), 'danger');
            }

            if (proceduresData.success) {
                procedures = proceduresData.procedures || [];
                populateTypeSelects();
            } else {
                displayMessage('Error loading procedures: ' + (proceduresData.error || 'Unknown error'), 'danger');
            }
        } catch (error) {
            console.error('Error loading data:', error);
            displayMessage('Failed to load data. Please try again.', 'danger');
        }
    }

    // ============================================================================
    // CALENDAR FLOW POPULATE FUNCTIONS
    // ============================================================================
    function populateCalendarRoomDisplay() {
        const selectedRoomNameSpan = document.getElementById('selected-room-name');
        if (selectedRoomNameSpan) {
            const selectedRoom = rooms.find(room => room.id == '<?php echo $room_id; ?>');
            if (selectedRoom) {
                selectedRoomNameSpan.textContent = selectedRoom.name;
            }
        }
    }

    function populateCalendarPatientSelect() {
        const select = document.getElementById('patient-id');
        select.innerHTML = '<option value="">Select Patient</option>';

        patients.forEach(patient => {
            const option = new Option(patient.name, patient.id);
            select.add(option);
        });
    }

    // ============================================================================
    // MANUAL FLOW POPULATE FUNCTIONS
    // ============================================================================
    function populateManualRoomSelect() {
        const select = document.getElementById('manual-room-id');
        select.innerHTML = '<option value="">Select Room</option>';

        rooms.forEach(room => {
            if (room.is_active) {
                const option = new Option(room.name, room.id);
                select.add(option);
            }
        });
    }

    function populateManualPatientSelect() {
        const select = document.getElementById('manual-patient-id');
        select.innerHTML = '<option value="">Select Patient</option>';

        patients.forEach(patient => {
            const option = new Option(patient.name, patient.id);
            select.add(option);
        });
    }

    // ============================================================================
    // TIME SLOT FUNCTIONS
    // ============================================================================
    function setTimeSlot(startTime, endTime) {
        document.getElementById('start-time').value = startTime;
        document.getElementById('end-time').value = endTime;
    }

    function setManualTimeSlot(startTime, endTime) {
        document.getElementById('manual-start-time').value = startTime;
        document.getElementById('manual-end-time').value = endTime;
    }

    // ============================================================================
    // UTILITY FUNCTIONS
    // ============================================================================
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // ============================================================================
    // PROCEDURE POPULATION FUNCTIONS
    // ============================================================================
    function populateTypeSelects() {
        const calendarTypeSelect = document.getElementById('type');
        const manualTypeSelect = document.getElementById('manual-type');

        const procedureOptions = procedures.map(procedure =>
            `<option value="${procedure.id}">${escapeHtml(procedure.name)}</option>`
        ).join('');

        if (calendarTypeSelect) {
            calendarTypeSelect.innerHTML = '<option value="">Select procedure</option>' + procedureOptions;
        }

        if (manualTypeSelect) {
            manualTypeSelect.innerHTML = '<option value="">Select procedure</option>' + procedureOptions;
        }
    }

    function populateProcedureSelects() {
        const calendarProcedureSelect = document.getElementById('procedure');
        const manualProcedureSelect = document.getElementById('manual-procedure');

        const procedureOptions = procedures.map(procedure =>
            `<option value="${procedure.id}">${escapeHtml(procedure.name)}</option>`
        ).join('');

        if (calendarProcedureSelect) {
            calendarProcedureSelect.innerHTML = '<option value="">Select Procedure (Optional)</option>' + procedureOptions;
        }

        if (manualProcedureSelect) {
            manualProcedureSelect.innerHTML = '<option value="">Select Procedure (Optional)</option>' + procedureOptions;
        }
    }

    // ============================================================================
    // VALIDATION FUNCTIONS - CALENDAR FLOW
    // ============================================================================
    function validateCalendarForm() {
        let isValid = true;
        const form = document.getElementById('calendar-appointment-form');

        // Clear previous validation states
        form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        form.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');

        const requiredFields = [{
            id: 'patient-id',
            message: 'Please select a patient.'
        },
        {
            id: 'start-time',
            message: 'Please enter a start time.'
        },
        {
            id: 'end-time',
            message: 'Please enter an end time.'
        },
        {
            id: 'type',
            message: 'Please select a procedure.'
        }
        ];

        requiredFields.forEach(fieldInfo => {
            const field = document.getElementById(fieldInfo.id);
            const feedback = field.nextElementSibling;

            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                feedback.textContent = fieldInfo.message;
                isValid = false;
            }
        });

        // Validate time logic
        const startTime = document.getElementById('start-time').value;
        const endTime = document.getElementById('end-time').value;
        const endTimeFeedback = document.getElementById('end-time').nextElementSibling;

        if (startTime && endTime && startTime >= endTime) {
            document.getElementById('end-time').classList.add('is-invalid');
            endTimeFeedback.textContent = 'End time must be after start time.';
            isValid = false;
        }

        return isValid;
    }

    function validateCalendarSingleField(fieldId) {
        const field = document.getElementById(fieldId);
        const feedback = field.nextElementSibling;

        if (!field.value.trim()) {
            field.classList.add('is-invalid');
            switch (fieldId) {
                case 'patient-id':
                    feedback.textContent = 'Please select a patient.';
                    break;
                case 'start-time':
                    feedback.textContent = 'Please enter a start time.';
                    break;
                case 'end-time':
                    feedback.textContent = 'Please enter an end time.';
                    break;
                case 'type':
                    feedback.textContent = 'Please select a procedure.';
                    break;
            }
        } else {
            field.classList.remove('is-invalid');
            feedback.textContent = '';
        }
    }

    function validateCalendarTimes() {
        const startTime = document.getElementById('start-time').value;
        const endTime = document.getElementById('end-time').value;
        const endTimeFeedback = document.getElementById('end-time').nextElementSibling;

        if (startTime && endTime && startTime >= endTime) {
            document.getElementById('end-time').classList.add('is-invalid');
            endTimeFeedback.textContent = 'End time must be after start time.';
        } else {
            document.getElementById('end-time').classList.remove('is-invalid');
            endTimeFeedback.textContent = '';
        }
    }

    // ============================================================================
    // VALIDATION FUNCTIONS - MANUAL FLOW
    // ============================================================================
    function validateManualForm() {
        let isValid = true;
        const form = document.getElementById('manual-appointment-form');

        // Clear previous validation states
        form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        form.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');

        const requiredFields = [{
            id: 'manual-patient-id',
            message: 'Please select a patient.'
        },
        {
            id: 'manual-room-id',
            message: 'Please select a room.'
        },
        {
            id: 'manual-appointment-date',
            message: 'Please select a date.'
        },
        {
            id: 'manual-start-time',
            message: 'Please enter a start time.'
        },
        {
            id: 'manual-end-time',
            message: 'Please enter an end time.'
        },
        {
            id: 'manual-type',
            message: 'Please select a procedure.'
        }
        ];

        requiredFields.forEach(fieldInfo => {
            const field = document.getElementById(fieldInfo.id);
            const feedback = field.nextElementSibling;

            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                feedback.textContent = fieldInfo.message;
                isValid = false;
            }
        });

        // Validate time logic
        const startTime = document.getElementById('manual-start-time').value;
        const endTime = document.getElementById('manual-end-time').value;
        const endTimeFeedback = document.getElementById('manual-end-time').nextElementSibling;

        if (startTime && endTime && startTime >= endTime) {
            document.getElementById('manual-end-time').classList.add('is-invalid');
            endTimeFeedback.textContent = 'End time must be after start time.';
            isValid = false;
        }

        return isValid;
    }

    function validateManualSingleField(fieldId) {
        const field = document.getElementById(fieldId);
        const feedback = field.nextElementSibling;

        if (!field.value.trim()) {
            field.classList.add('is-invalid');
            switch (fieldId) {
                case 'manual-patient-id':
                    feedback.textContent = 'Please select a patient.';
                    break;
                case 'manual-room-id':
                    feedback.textContent = 'Please select a room.';
                    break;
                case 'manual-appointment-date':
                    feedback.textContent = 'Please select a date.';
                    break;
                case 'manual-start-time':
                    feedback.textContent = 'Please enter a start time.';
                    break;
                case 'manual-end-time':
                    feedback.textContent = 'Please enter an end time.';
                    break;
                case 'manual-type':
                    feedback.textContent = 'Please select a procedure.';
                    break;
            }
        } else {
            field.classList.remove('is-invalid');
            feedback.textContent = '';
        }
    }

    function validateManualTimes() {
        const startTime = document.getElementById('manual-start-time').value;
        const endTime = document.getElementById('manual-end-time').value;
        const endTimeFeedback = document.getElementById('manual-end-time').nextElementSibling;

        if (startTime && endTime && startTime >= endTime) {
            document.getElementById('manual-end-time').classList.add('is-invalid');
            endTimeFeedback.textContent = 'End time must be after start time.';
        } else {
            document.getElementById('manual-end-time').classList.remove('is-invalid');
            endTimeFeedback.textContent = '';
        }
    }

    // ============================================================================
    // APPOINTMENT CREATION FUNCTIONS
    // ============================================================================
    function createCalendarAppointment() {
        const appointmentData = {
            patient_id: document.getElementById('patient-id').value,
            room_id: '<?php echo $room_id; ?>',
            appointment_date: '<?php echo $date; ?>',
            start_time: document.getElementById('start-time').value,
            end_time: document.getElementById('end-time').value,
            procedure_id: document.getElementById('type').value || null,
            notes: document.getElementById('notes').value
        };

        createAppointment(appointmentData);
    }

    function createManualAppointment() {
        const appointmentData = {
            patient_id: document.getElementById('manual-patient-id').value,
            room_id: document.getElementById('manual-room-id').value,
            appointment_date: document.getElementById('manual-appointment-date').value,
            start_time: document.getElementById('manual-start-time').value,
            end_time: document.getElementById('manual-end-time').value,
            procedure_id: document.getElementById('manual-type').value || null,
            notes: document.getElementById('manual-notes').value
        };

        createAppointment(appointmentData);
    }

    async function createAppointment(appointmentData) {
        try {
            const formData = new FormData();
            formData.append('entity', 'appointments');
            formData.append('action', 'create');

            Object.keys(appointmentData).forEach(key => {
                formData.append(key, appointmentData[key]);
            });

            const response = await fetch('api.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                displayMessage('Appointment created successfully!', 'success');
                setTimeout(() => {
                    window.location.href = 'appointments.php';
                }, 1500);
            } else {
                displayMessage('Error creating appointment: ' + (result.error || 'Unknown error'), 'danger');
            }
        } catch (error) {
            console.error('Error creating appointment:', error);
            displayMessage('Failed to create appointment. Please try again.', 'danger');
        }
    }

    // ============================================================================
    // SHARED UTILITY FUNCTIONS
    // ============================================================================
    function displayMessage(message, type) {
        const statusDiv = document.getElementById('status-messages');
        statusDiv.innerHTML = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    `;
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

    // Function to populate agency dropdown in modal
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
                            if (flowType === 'calendar') {
                                patientSelect = document.getElementById('patient-id');
                            } else {
                                patientSelect = document.getElementById('manual-patient-id');
                            }

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
                            populateTypeSelects();

                            // Select the new procedure in the appropriate dropdown based on flow
                            let procedureSelect;
                            if (flowType === 'calendar') {
                                procedureSelect = document.getElementById('type');
                            } else {
                                procedureSelect = document.getElementById('manual-type');
                            }

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

<?php require_once 'includes/footer.php'; ?>