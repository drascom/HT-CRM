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

<!-- Status Messages -->
<div id="status-messages">
    <!-- Success or error messages will be displayed here -->
</div>

<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">
        <i class="fas fa-user-edit me-2 text-primary"></i>
        <?php echo $is_editing ? 'Edit Patient' : 'Add New Patient'; ?>
    </h2>
    <a href="patients.php" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-1"></i>
        <span class="d-none d-sm-inline">Back to Patients</span>
    </a>
</div>

<!-- Patient Form -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-user me-2"></i>
            Patient Information
        </h5>
    </div>
    <div class="card-body">
        <form id="patient-form">
            <?php if ($is_editing): ?>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($patient_id); ?>">
            <?php endif; ?>
            <input type="hidden" name="entity" value="patients">
            <input type="hidden" name="action" value="<?php echo $is_editing ? 'update' : 'add'; ?>">
            <?php if (!$is_editing): ?>
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>">
            <?php endif; ?>

            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">
                            <i class="fas fa-user me-1"></i>
                            Patient Name
                        </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter patient name"
                            required>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="mb-3">
                        <label for="dob" class="form-label">
                            <i class="fas fa-calendar me-1"></i>
                            Date of Birth
                        </label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                </div>
                <?php if (is_admin() || is_editor()): ?>
                <div class="col-md-4 col-12">
                    <div class="mb-3">
                        <label for="agency_id" class="form-label">
                            <i class="fas fa-building me-1"></i>
                            Agency
                        </label>
                        <select class="form-select" id="agency_id" name="agency_id">
                            <!-- <option value="">Select Agency</option> -->
                            <!-- Agency options will be loaded dynamically -->
                        </select>
                    </div>
                </div>
                <?php elseif (is_agent()): ?>
                <!-- Hidden field for agents - their agency_id will be set via JavaScript -->
                <input type="hidden" id="agency_id" name="agency_id" value="">
                <?php endif; ?>
            </div>

            <div class="row">

            </div>

            <div class="mb-4">
                <label class="form-label">
                    <i class="fas fa-image me-1"></i>
                    Patient Avatar
                </label>
                <div id="avatar-dropzone" class="dropzone">
                    <div class="dz-message">
                        <span class="note needsclick">
                            <i class="fas fa-cloud-upload-alt fa-2x mb-2"></i><br>
                            Drag and drop avatar here or click to upload.
                        </span>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i>
                    <span id="save-button-text"><?php echo $is_editing ? 'Update Patient' : 'Add Patient'; ?></span>
                </button>
                <a href="patients.php" class="btn btn-secondary">
                    <i class="fas fa-times me-1"></i>
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const patientForm = document.getElementById('patient-form');
    const statusMessagesDiv = document.getElementById('status-messages');
    const patientIdInput = document.querySelector('#patient-form input[name="id"]');
    const isEditing = patientIdInput !== null;
    let patientId = isEditing ? patientIdInput.value : null; // Make patientId mutable
    let allAgencies = []; // Store all agencies for dropdown
    let uploadedAvatarUrl = null; // Store the uploaded avatar URL

    // Function to display messages
    function displayMessage(message, type = 'success') {
        statusMessagesDiv.innerHTML = `<div class="alert alert-${type}">${message}</div>`;
    }

    // Function to fetch agencies from the API
    function fetchAgencies() {
        const userRole = '<?php echo get_user_role(); ?>';
        const userAgencyId = '<?php echo get_user_agency_id(); ?>';

        if (userRole === 'agent') {
            // For agents, don't fetch agencies - just set their agency_id
            populateAgencyDropdown();
        } else {
            // For admin and editor, fetch all agencies
            apiRequest('agencies', 'list')
                .then(data => {
                    if (data.success) {
                        allAgencies = data.agencies;
                        populateAgencyDropdown();
                    } else {
                        console.error('Error fetching agencies:', data.message);
                    }
                })
                .catch(error => {
                    console.error('Error fetching agencies:', error);
                });
        }
    }

    // Function to populate agency dropdown
    function populateAgencyDropdown() {
        const agencySelect = document.getElementById('agency_id');
        const userRole = '<?php echo get_user_role(); ?>';
        const userAgencyId = '<?php echo get_user_agency_id(); ?>';

        // For agents, set their agency_id in the hidden field
        if (userRole === 'agent' && userAgencyId) {
            agencySelect.value = userAgencyId;
        } else {
            // agencySelect.innerHTML = '<option value="">Select Agency </option>';
            allAgencies.forEach(agency => {
                const option = document.createElement('option');
                option.value = agency.id;
                option.textContent = agency.name;
                agencySelect.appendChild(option);
            });
        }

        // For editors, add edit protection for agency field
        if (userRole === 'editor' && isEditing) {
            agencySelect.disabled = true;

            // Add edit button next to agency field
            const agencyContainer = agencySelect.closest('.mb-3');
            const editButton = document.createElement('button');
            editButton.type = 'button';
            editButton.className = 'btn btn-sm btn-outline-warning ms-2';
            editButton.innerHTML = '<i class="fas fa-edit"></i>';
            editButton.title = 'Enable agency editing';
            editButton.onclick = function() {
                agencySelect.disabled = false;
                editButton.style.display = 'none';
                warningText.style.display = 'block';
            };

            // Add warning text
            const warningText = document.createElement('small');
            warningText.className = 'form-text text-muted';
            warningText.style.display = 'none';
            warningText.innerHTML =
                '<i class="fas fa-exclamation-triangle me-1"></i>Don\'t change agency if you are not sure!';

            agencyContainer.appendChild(editButton);
            agencyContainer.appendChild(warningText);
        }
    }

    // Fetch agencies first
    fetchAgencies();

    // Fetch patient data if editing
    if (isEditing) {
        apiRequest('patients', 'get', { id: patientId })
            .then(data => {
                if (data.success) {
                    const patient = data.patient;
                    document.getElementById('name').value = patient.name;
                    document.getElementById('dob').value = patient.dob;

                    // Set agency if available
                    if (patient.agency_id) {
                        document.getElementById('agency_id').value = patient.agency_id;
                    }

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
                // let currentPatientId = patientId; // Capture the initial patientId

                // Override the params function to use the potentially updated currentPatientId
                // myDropzone.options.params = function() {
                //     return {
                //         entity: 'patients',
                //         action: 'upload_avatar',
                //         id: currentPatientId // Use the captured/updated variable
                //     };
                // };

                // Listen for successful patient creation to update currentPatientId
                // This part relies on the logic in your form submission handling
                // which is outside the init, but this structure makes the intent clear.
                // The form submission success handler already updates the outer patientId variable,
                // and this closure should capture that update when processQueue is called.

                // Log when a file is about to be sent
                myDropzone.on("sending", function(file, xhr, formData) {
                    console.log("Dropzone 'sending' event triggered.");
                    // Manually append parameters to the formData
                    formData.append('entity', 'patients');
                    formData.append('action', 'upload_avatar');
                    // Ensure patientId is available. The outer patientId variable should be updated by now.
                    if (patientId) {
                        formData.append('id', patientId);
                        console.log("Appending patientId to FormData:", patientId);
                    } else {
                        console.warn(
                            "patientId is null when sending avatar upload request.");
                    }

                    // console.log("FormData sent with request:", formData); // Keep this commented or use a method to inspect FormData content if needed later
                });

                // Handle successful upload
                myDropzone.on("success", function(file, response) {
                    console.log("Avatar upload successful:", response);
                    if (response.success) {
                        displayMessage('Avatar uploaded successfully!', 'success');
                        // Store the uploaded avatar URL if available
                        if (response.avatar_url) {
                            uploadedAvatarUrl = response.avatar_url;
                            console.log("Stored uploadedAvatarUrl:", uploadedAvatarUrl);
                        }
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
                    apiRequest('patients', 'get', { id: patientId })
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

            // Clear previous messages
            statusMessagesDiv.innerHTML = '';

            // Add Bootstrap validation classes
            patientForm.classList.add('was-validated');

            // Check form validity
            if (!patientForm.checkValidity()) {
                displayMessage('Please fill in all required fields correctly.', 'danger');
                return;
            }

            const nameInput = document.getElementById('name');
            if (!nameInput.value.trim()) {
                displayMessage('Patient name is required.', 'danger');
                return; // Stop the form submission
            }

            // Determine if we are adding or editing
            const action = isEditing ? 'update' : 'add';
            const hasQueuedFiles = avatarDropzone.getQueuedFiles().length > 0;

            if (action === 'add' && hasQueuedFiles) {
                console.log("Adding new patient with avatar. Submitting main form first...");
                // Submit the main form data first to create the patient record
                submitPatientForm()
                    .then(data => {
                        if (data.success && data.patient && data.patient.id) {
                            console.log("Patient created successfully with ID:", data.patient.id);
                            // Update the patientId variable
                            patientId = data.patient.id;
                            console.log(
                                "patientId variable updated with new patient ID:",
                                patientId);

                            // Listen for Dropzone completion after processing the queue
                            const queueCompleteHandler = function() {
                                console.log("Dropzone queue complete after adding patient.");
                                // Redirect after a short delay on success
                                setTimeout(() => {
                                    window.location.href = 'patients.php';
                                }, 500);
                                // Remove the event listener after it has been triggered
                                avatarDropzone.off("queuecomplete", queueCompleteHandler);
                            };
                            avatarDropzone.on("queuecomplete", queueCompleteHandler);

                            console.log(
                                "Calling avatarDropzone.processQueue() after patient creation.");
                            // Process the Dropzone queue to upload the avatar
                            avatarDropzone.processQueue();

                        } else if (data.success) {
                            // Patient created but no patient object returned (unexpected but handle)
                            displayMessage(data.message +
                                ' (Avatar upload skipped due to missing patient data).',
                                'warning'
                            );
                            // Redirect anyway
                            setTimeout(() => {
                                window.location.href = 'patients.php';
                            }, 500);
                        } else {
                            // Handle main form submission error
                            displayMessage(`Error creating patient: ${data.error || data.message}`,
                                'danger');
                        }
                    })
                    .catch(error => {
                        console.error('Error submitting main form for new patient:', error);
                        displayMessage('An error occurred while creating the patient.', 'danger');
                    });

            } else if (action === 'update' && hasQueuedFiles) {
                // If editing and a new avatar is uploaded, process it first
                console.log("Processing Dropzone queue for existing patient update...");
                // Listen for Dropzone completion before submitting the main form
                const queueCompleteHandler = function() {
                    console.log("Dropzone queue complete for update. Submitting main form.");
                    // Submit the main form data (avatar update is handled by upload_avatar action)
                    submitPatientForm();
                    // Remove the event listener after it has been triggered
                    avatarDropzone.off("queuecomplete", queueCompleteHandler);
                };
                avatarDropzone.on("queuecomplete", queueCompleteHandler);
                console.log("Calling avatarDropzone.processQueue() for existing patient update.");
                // Process the Dropzone queue
                avatarDropzone.processQueue();
            } else {
                console.log(
                    "No files in Dropzone queue or editing without new avatar. Submitting main form directly."
                );
                // If no files in Dropzone or editing without a new avatar, just submit the main form
                submitPatientForm();
            }
        });

        // Function to submit the main patient form data
        function submitPatientForm() { // Removed avatarUrl parameter as it's no longer passed here for 'add'
            const formData = new FormData();
            const userRole = '<?php echo get_user_role(); ?>';
            const userAgencyId = '<?php echo get_user_agency_id(); ?>';

            const action = isEditing ? 'update' : 'add';

            formData.append('entity', 'patients');
            formData.append('action', action);
            if (isEditing) {
                formData.append('id', patientIdInput.value);
            } else {
                formData.append('user_id', <?php echo json_encode($_SESSION['user_id']); ?>);
            }
            formData.append('name', document.getElementById('name').value);
            formData.append('dob', document.getElementById('dob').value);

            // Agency ID is handled by the form field (hidden for agents, select for admin/editor)
            formData.append('agency_id', document.getElementById('agency_id').value);

            // Do NOT append avatar here for 'add' action, it's handled by Dropzone after patient creation
            // For 'update', the avatar is handled by the 'upload_avatar' action triggered by Dropzone

            return fetch('api.php', { // Return the fetch promise
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Handle success/error messages for the main form submission
                    if (action !== 'add' || !avatarDropzone.getQueuedFiles().length > 0) {
                        // Only display message and redirect immediately if no avatar upload is pending for 'add'
                        if (data.success) {
                            displayMessage(data.message, 'success');
                            setTimeout(() => {
                                window.location.href = 'patients.php';
                            }, 500);
                        } else {
                            displayMessage(`Error: ${data.error || data.message}`, 'danger');
                        }
                    }
                    return data; // Return data for chaining
                })
                .catch(error => {
                    console.error('Error submitting form:', error);
                    displayMessage('An error occurred while saving patient data.', 'danger');
                    throw error; // Re-throw error for chaining
                });
        }


    } else {
        console.error("Dropzone.js not loaded.");
        displayMessage('File upload functionality is not available because Dropzone.js failed to load.',
            'danger');
    }
});
</script>
```