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

require_once 'includes/header.php';
$surgery_id = $_GET['id'] ?? null;
$patient_id_from_url = $_GET['patient_id'] ?? null; // Get patient_id if passed in URL
$is_editing = $surgery_id !== null;

$page_title = $is_editing ? 'Edit Surgery' : 'Add New Surgery';
?>

<div class="container mt-4">
    <h2 id="page-title"><?php echo $page_title; ?></h2>

    <div id="status-messages">
        <!-- Success or error messages will be displayed here -->
    </div>

    <form id="surgery-form">
        <?php if ($is_editing): ?>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($surgery_id); ?>">
        <?php endif; ?>
        <input type="hidden" name="entity" value="surgeries">
        <input type="hidden" name="action" value="<?php echo $is_editing ? 'update' : 'create'; ?>">

        <?php if (!$is_editing): // Only show patient selection when adding ?>
            <div class="mb-3">
                <label for="patient_id" class="form-label">Patient</label>
                <div class="input-group">
                    <select class="form-select" id="patient_id" name="patient_id" required>
                        <option value="">Select Patient</option>
                        <!-- Patient options will be loaded via JavaScript -->
                    </select>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newPatientModal">
                        <i class="fas fa-plus me-1"></i>New Patient
                    </button>
                </div>
            </div>
        <?php else: // If editing, patient_id is part of the surgery data fetched via API ?>
             <input type="hidden" name="patient_id" id="patient_id">
        <?php endif; ?>


        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="booked">Booked</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i><span id="save-button-text"><?php echo $is_editing ? 'Update Surgery' : 'Add Surgery'; ?></span></button>
        <a href="<?php echo $is_editing ? 'patient_surgeries.php?patient_id=' . htmlspecialchars($patient_id_from_url ?? ($surgery['patient_id'] ?? '')) : 'surgeries.php'; ?>" class="btn btn-secondary"><i class="fas fa-times-circle me-1"></i>Cancel</a>
    </form>

</div>

<!-- New Patient Modal -->
<div class="modal fade" id="newPatientModal" tabindex="-1" aria-labelledby="newPatientModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newPatientModalLabel">Create New Patient</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="new-patient-form">
          <div class="mb-3">
            <label for="new_patient_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="new_patient_name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="new_patient_dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="new_patient_dob" name="dob">
          </div>
          <!-- Add other patient fields as needed -->
        </form>
        <div id="new-patient-status"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="save-new-patient">Create Patient</button>
      </div>
    </div>
  </div>
</div>


<?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const surgeryForm = document.getElementById('surgery-form');
    const statusMessagesDiv = document.getElementById('status-messages');
    const surgeryIdInput = document.querySelector('#surgery-form input[name="id"]');
    const isEditing = surgeryIdInput !== null;
    const patientSelect = document.getElementById('patient_id'); // Get the patient select dropdown
    const patientIdHiddenInput = document.querySelector('#surgery-form input[name="patient_id"]'); // Hidden patient_id for editing

    const newPatientModal = document.getElementById('newPatientModal');
    const saveNewPatientButton = document.getElementById('save-new-patient');
    const newPatientForm = document.getElementById('new-patient-form');
    const newPatientStatusDiv = document.getElementById('new-patient-status');


    // Function to display messages
    function displayMessage(message, type = 'success') {
        statusMessagesDiv.innerHTML = `<div class="alert alert-${type}">${message}</div>`;
    }

    // Fetch patient options for the dropdown
    function fetchPatientOptions(selectPatientId = null) {
        fetch('api.php?entity=patients&action=list')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    patientSelect.innerHTML = '<option value="">Select Patient</option>'; // Keep the default option
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
                    document.getElementById('notes').value = surgery.notes;
                    // Set the hidden patient_id for editing
                    if (patientIdHiddenInput) {
                         patientIdHiddenInput.value = surgery.patient_id;
                    }
                    // If editing, no patient select dropdown is shown, so no need to populate it here.
                    // The patient_id is handled by the hidden input.

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
        fetchPatientOptions(patientIdFromUrl); // Fetch and populate patient dropdown, pre-selecting if patient_id is in URL
    }


    // Handle surgery form submission
    surgeryForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(surgeryForm);

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
                    if (isEditing || <?php echo json_encode($patient_id_from_url !== null); ?>) {
                         window.location.href = `patient_surgeries.php?patient_id=${formData.get('patient_id')}`;
                    } else {
                         window.location.href = 'surgeries.php';
                    }
                }, 1500);
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
        saveNewPatientButton.addEventListener('click', function () {
            const formData = new FormData(newPatientForm);
            formData.append('entity', 'patients');
            formData.append('action', 'create');

            newPatientStatusDiv.innerHTML = ''; // Clear previous status

            fetch('api.php', { // Call the new API endpoint
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    newPatientStatusDiv.innerHTML = '<div class="alert alert-success">Patient created successfully!</div>';
                    // Add the new patient to the select dropdown
                    if (patientSelect) {
                        const newOption = new Option(data.patient.name, data.patient.id, true, true);
                        patientSelect.add(newOption);
                    }
                    // Close the modal after a short delay
                    setTimeout(() => {
                        const modal = bootstrap.Modal.getInstance(newPatientModal);
                        modal.hide();
                    }, 1500);
                } else {
                    newPatientStatusDiv.innerHTML = `<div class="alert alert-danger">${data.error || 'An error occurred.'}</div>`;
                }
            })
            .catch(error => {
                console.error('Error creating patient:', error);
                newPatientStatusDiv.innerHTML = '<div class="alert alert-danger">An error occurred while creating the patient.</div>';
            });
        });
    }

    // Reset modal form when hidden
    if (newPatientModal) {
        newPatientModal.addEventListener('hidden.bs.modal', function () {
            newPatientForm.reset();
            newPatientStatusDiv.innerHTML = '';
        });
    }
});
</script>