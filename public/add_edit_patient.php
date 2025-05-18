<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

// Ensure user is logged in
if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

$patient = null;
$errors = [];
$is_editing = false;

// Fetch patient data if ID is provided (for editing)
$patient_id = $_GET['id'] ?? null;
$is_editing = $patient_id !== null;

$page_title = $is_editing ? 'Edit Patient' : 'Add New Patient';
require_once 'includes/header.php';
?>

<div class="container mt-4">
    <h2 id="page-title"><?php echo $is_editing ? 'Edit Patient' : 'Add New Patient'; ?></h2>

    <div id="status-messages">
        <!-- Success or error messages will be displayed here -->
    </div>

    <form id="patient-form">
        <?php if ($is_editing): ?>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($patient_id); ?>">
        <?php endif; ?>
        <input type="hidden" name="entity" value="patients">
        <input type="hidden" name="action" value="<?php echo $is_editing ? 'update' : 'create'; ?>">

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob">
        </div>
        <!-- Surgery ID field might be handled differently now, or removed -->
        <!-- Keeping for now, but its purpose might change -->
        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i><span id="save-button-text"><?php echo $is_editing ? 'Update Patient' : 'Add Patient'; ?></span></button>
        <a href="patients.php" class="btn btn-secondary"><i class="fas fa-times-circle me-1"></i>Cancel</a>
    </form>

</div>

<?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const patientForm = document.getElementById('patient-form');
    const statusMessagesDiv = document.getElementById('status-messages');
    const patientIdInput = document.querySelector('#patient-form input[name="id"]');
    const isEditing = patientIdInput !== null;
    // const surgerySelect = document.getElementById('surgery_id'); // Removed surgery select

    // Function to display messages
    function displayMessage(message, type = 'success') {
        statusMessagesDiv.innerHTML = `<div class="alert alert-${type}">${message}</div>`;
    }

    // Fetch patient data if editing
    if (isEditing) {
        const patientId = patientIdInput.value;
        fetch(`api.php?entity=patients&action=get&id=${patientId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const patient = data.patient;
                    document.getElementById('name').value = patient.name;
                    document.getElementById('dob').value = patient.dob;
                    // Removed surgery_id handling
                } else {
                    displayMessage(`Error loading patient: ${data.error}`, 'danger');
                }
            })
            .catch(error => {
                console.error('Error fetching patient:', error);
                displayMessage('An error occurred while loading patient data.', 'danger');
            });
    }


    // Handle form submission
    patientForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(patientForm);

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
                    window.location.href = 'patients.php';
                }, 1500);
            } else {
                displayMessage(`Error: ${data.error || data.message}`, 'danger');
            }
        })
        .catch(error => {
            console.error('Error submitting form:', error);
            displayMessage('An error occurred while saving patient data.', 'danger');
        });
    });
});
</script>

<?php require_once 'includes/footer.php'; ?>