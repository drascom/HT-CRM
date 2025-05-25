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
        <input type="hidden" name="action" value="<?php echo $is_editing ? 'update' : 'add'; ?>">
        <?php if (!$is_editing): ?>
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>">
        <?php endif; ?>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob">
        </div>
        <div class="mb-3">
            <div id="avatar-dropzone" class="dropzone">
                <div class="dz-message">Drag and drop avatar here or click to upload.</div>
            </div>
        </div>
        <!-- Surgery ID field might be handled differently now, or removed -->
        <!-- Keeping for now, but its purpose might change -->
        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i><span
                id="save-button-text"><?php echo $is_editing ? 'Update Patient' : 'Add Patient'; ?></span></button>
        <a href="patients.php" class="btn btn-secondary"><i class="fas fa-times-circle me-1"></i>Cancel</a>
    </form>

</div>

<?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
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

                    // The Dropzone init function now handles displaying the avatar
                    // No need for a separate preview div here

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
    patientForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Dropzone handles avatar upload separately, so no need to include it here

        const nameInput = document.getElementById('name');
        if (!nameInput.value.trim()) {
            displayMessage('Patient name is required.', 'danger');
            return; // Stop the form submission
        }

        // Create FormData for other patient details
        const formData = new FormData();
        formData.append('entity', 'patients');
        formData.append('action', isEditing ? 'update' : 'add');
        if (isEditing) {
            formData.append('id', patientIdInput.value);
        } else {
            formData.append('user_id', <?php echo json_encode($_SESSION['user_id']); ?>);
        }
        formData.append('name', document.getElementById('name').value);
        formData.append('dob', document.getElementById('dob').value);
        // Do NOT append avatar here, Dropzone handles it

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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const patientForm = document.getElementById('patient-form');
    const statusMessagesDiv = document.getElementById('status-messages');
    const patientIdInput = document.querySelector('#patient-form input[name="id"]');
    const isEditing = patientIdInput !== null;
    const patientId = isEditing ? patientIdInput.value : null; // Get patientId if editing

    // Function to display messages
    function displayMessage(message, type = 'success') {
        statusMessagesDiv.innerHTML = `<div class="alert alert-${type}">${message}</div>`;
    }

    // Initialize Dropzone for avatar upload
    if (typeof Dropzone !== 'undefined') {
        Dropzone.autoDiscover = false; // Prevent Dropzone from automatically attaching

        const avatarDropzone = new Dropzone("#avatar-dropzone", {
            url: "api.php", // API endpoint
            paramName: "avatar", // The name that will be used to transfer the file
            maxFilesize: 5, // MB
            acceptedFiles: "image/*",
            addRemoveLinks: true, // Add remove links
            maxFiles: 1, // Only allow one file
            autoProcessQueue: false, // Do not auto-process, we'll handle it on form submit (or separately)
            headers: {
                // Add any necessary headers, e.g., for authentication if your API requires it
            },
            params: function() {
                // Include patient_id and action in params
                return {
                    entity: 'patients',
                    action: 'upload_avatar', // New action for avatar upload
                    id: patientId // Include patient ID if editing
                };
            },
            init: function() {
                const myDropzone = this;

                // Handle successful upload
                myDropzone.on("success", function(file, response) {
                    console.log("Avatar upload successful:", response);
                    if (response.success) {
                        displayMessage('Avatar uploaded successfully!', 'success');
                        displayMessage('Avatar uploaded successfully!', 'success');
                        // Remove the file from Dropzone's preview after successful upload
                        myDropzone.removeFile(file);
                    } else {
                        displayMessage(
                            `Avatar upload failed: ${response.error || response.message}`,
                            'danger');
                        // Remove the file from Dropzone's preview on failure
                        myDropzone.removeFile(file);
                    }
                });

                // Handle upload error
                myDropzone.on("error", function(file, message) {
                    console.error("Avatar upload error:", message);
                    displayMessage(`Avatar upload failed: ${message}`, 'danger');
                    // Remove the file from Dropzone's preview on error
                    myDropzone.removeFile(file);
                });

                // Handle file removal (for existing avatars or newly added ones before upload)
                myDropzone.on("removedfile", function(file) {
                    console.log("File removed:", file);
                    // If this is an existing avatar (mock file), trigger deletion via API
                    if (file.isMockFile && file.avatarId) {
                        console.log(`Deleting avatar with ID: ${file.avatarId}`);
                        // Perform API call to delete the avatar
                        const deleteFormData = new FormData();
                        deleteFormData.append('entity', 'patients');
                        deleteFormData.append('action',
                            'delete_avatar'); // New action for avatar deletion
                        deleteFormData.append('patient_id', patientId); // Patient ID
                        // You might need to send the avatar ID or path depending on your API
                        deleteFormData.append('avatar_url', file
                            .dataURL); // Send avatar URL as identifier

                        fetch('api.php', {
                                method: 'POST',
                                body: deleteFormData
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    displayMessage('Avatar deleted successfully!',
                                        'success');
                                    // No need to hide the current avatar preview div anymore
                                } else {
                                    displayMessage(
                                        `Avatar deletion failed: ${data.error || data.message}`,
                                        'danger');
                                    // Optionally re-add the mock file if deletion failed
                                    // myDropzone.emit("addedfile", file);
                                }
                            })
                            .catch(error => {
                                console.error('Error deleting avatar:', error);
                                displayMessage(
                                    'An error occurred while deleting the avatar.',
                                    'danger');
                                // Optionally re-add the mock file if deletion failed
                                // myDropzone.emit("addedfile", file);
                            });
                    }
                    // If it's a new file added by the user, no action needed on remove
                });


                // When in editing mode, add existing avatar as a mock file
                if (isEditing && patientId) {
                    fetch(`api.php?entity=patients&action=get&id=${patientId}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.success && data.patient && data.patient.avatar) {
                                const avatarUrl = data.patient.avatar;
                                const avatarFileName = avatarUrl.substring(avatarUrl
                                    .lastIndexOf('/') + 1);

                                // Create a mock file object
                                const mockFile = {
                                    name: avatarFileName,
                                    size: 12345, // Dummy size, replace if you can get actual size
                                    accepted: true,
                                    kind: 'image',
                                    dataURL: avatarUrl, // Use dataURL for preview
                                    isMockFile: true, // Custom property to identify mock files
                                    avatarId: data.patient
                                        .id // Store patient ID or avatar ID if available
                                };

                                // Call the addedfile event handler
                                myDropzone.emit("addedfile", mockFile);

                                // Call the thumbnail event handler to display the preview
                                // Dropzone expects the dataUrl to be set on the mock file
                                myDropzone.emit("thumbnail", mockFile, avatarUrl);

                                // Call the complete event handler
                                myDropzone.emit("complete", mockFile);

                                // Add the file to the files array
                                myDropzone.files.push(mockFile);

                                // No need to display the current avatar preview image separately anymore

                            }
                        })
                        .catch(error => {
                            console.error('Error fetching patient avatar for Dropzone:', error);
                        });
                }
            }
        });

        // Handle form submission - Trigger Dropzone upload if files are added
        patientForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const nameInput = document.getElementById('name');
            if (!nameInput.value.trim()) {
                displayMessage('Patient name is required.', 'danger');
                return; // Stop the form submission
            }

            // If there are files in the Dropzone queue, process them first
            if (avatarDropzone.getQueuedFiles().length > 0) {
                // Process the Dropzone queue
                avatarDropzone.processQueue();

                // Listen for Dropzone completion before submitting the main form
                avatarDropzone.on("queuecomplete", function() {
                    // Now submit the main form data (excluding the avatar)
                    submitPatientForm();
                });
            } else {
                // If no files in Dropzone, just submit the main form
                submitPatientForm();
            }
        });

        // Function to submit the main patient form data
        function submitPatientForm() {
            const formData = new FormData();
            formData.append('entity', 'patients');
            formData.append('action', isEditing ? 'update' : 'add');
            if (isEditing) {
                formData.append('id', patientIdInput.value);
            } else {
                formData.append('user_id', <?php echo json_encode($_SESSION['user_id']); ?>);
            }
            formData.append('name', document.getElementById('name').value);
            formData.append('dob', document.getElementById('dob').value);
            // Do NOT append avatar here, Dropzone handles it

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
                        }, 500);
                    } else {
                        displayMessage(`Error: ${data.error || data.message}`, 'danger');
                    }
                })
                .catch(error => {
                    console.error('Error submitting form:', error);
                    displayMessage('An error occurred while saving patient data.', 'danger');
                });
        }


    } else {
        console.error("Dropzone.js not loaded.");
        displayMessage('File upload functionality is not available because Dropzone.js failed to load.',
            'danger');
    }


    // Fetch patient data if editing (keep this part to populate other fields)
    if (isEditing && patientId) {
        fetch(`api.php?entity=patients&action=get&id=${patientId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const patient = data.patient;
                    document.getElementById('name').value = patient.name;
                    document.getElementById('dob').value = patient.dob;
                    // Removed surgery_id handling

                    // The Dropzone init function now handles displaying the avatar
                    // No need to display the current avatar here anymore
                    // The Dropzone init function will fetch and display it as a mock file
                } else {
                    displayMessage(`Error loading patient: ${data.error}`, 'danger');
                }
            })
            .catch(error => {
                console.error('Error fetching patient:', error);
                displayMessage('An error occurred while loading patient data.', 'danger');
            });
    }


});
</script>

<?php require_once 'includes/footer.php'; ?>