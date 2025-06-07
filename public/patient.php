<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

// Ensure user is logged in
if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

// Get patient ID from URL
$patient_id = $_GET['id'] ?? null;

// Validate patient ID
if (!$patient_id || !is_numeric($patient_id)) {
    // Redirect or show an error if patient ID is missing or invalid
    header('Location: patients.php'); // Redirect back to patients list
    exit();
}

$page_title = "Patient Profile";
require_once 'includes/header.php';
?>

<!-- Status Messages -->
<div id="status-messages">
    <!-- Success or error messages will be displayed here -->
</div>

<!-- Patient Header -->
<div class="card mb-4">
    <div class="card-body">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
            <div class="d-flex align-items-center mb-3 mb-md-0">
                <a href="add_edit_patient.php?id=<?php echo htmlspecialchars($patient_id); ?>" class="me-3">
                    <img id="patient-avatar" src="" alt="Patient Avatar" class="avatar"
                        style="display: none; width: 60px; height: 60px;">
                </a>
                <div>
                    <h2 id="page-title" class="mb-0">Patient Profile</h2>
                    <small class="text-muted">Patient ID: <?php echo htmlspecialchars($patient_id); ?></small>
                </div>
            </div>
            <div class="btn-group" role="group">
                <a href="add_edit_patient.php?id=<?php echo htmlspecialchars($patient_id); ?>" class="btn btn-warning">
                    <i class="fas fa-edit me-1"></i>
                    <span class="d-none d-sm-inline">Edit Patient</span>
                </a>
                <a href="patients.php" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i>
                    <span class="d-none d-sm-inline">Back to Patients</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Surgeries Section -->
<div class=" mb-4">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="fas fa-hospital me-2"></i>
                Surgeries
            </h5>
            <a href="add_edit_surgery.php?patient_id=<?php echo htmlspecialchars($patient_id); ?>"
                class="btn btn-success btn-sm">
                <i class="fas fa-plus-circle me-1"></i>
                <span class="d-none d-sm-inline">Add Surgery</span>
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="surgeries-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Room</th>
                        <th>Status</th>
                        <th>Graft Count</th>
                        <th class="d-none d-md-table-cell">Notes</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Surgeries will be loaded here via JavaScript -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Photos Section -->
<div class=" mb-4">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="fas fa-camera me-2"></i>
                Photo Albums
            </h5>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadModal"
                data-patient-id="<?php echo htmlspecialchars($patient_id); ?>">
                <i class="fas fa-upload me-1"></i>
                <span class="d-none d-sm-inline">Add Photos</span>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div id="photos-list">
            <!-- Photo albums and photos will be loaded here via JavaScript -->
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmModalLabel">
                    <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                    Confirm Deletion
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Are you sure you want to delete this item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Cancel
                </button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="fas fa-trash-alt me-1"></i>Delete
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">
                    <i class="fas fa-upload me-2"></i>
                    Upload Photos
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="upload.php" id="photo-upload-form" enctype="multipart/form-data">
                    <input type="hidden" name="patient_id" id="upload-patient-id" value="<?php echo $patient_id; ?>">
                    <div class="mb-3">
                        <label for="photo_album_type_id" class="form-label">Album Type</label>
                        <select class="form-select" id="photo_album_type_id" name="photo_album_type_id" required>
                            <option value="">Select Album Type</option>
                            <!-- Options will be loaded via JavaScript -->
                        </select>
                    </div>
                    <div id="photo-dropzone" class="dropzone" style="display: none;">
                        <div class="dz-message">
                            <span class="note needsclick">
                                <i class="fas fa-cloud-upload-alt fa-2x mb-2"></i><br>
                                Drag and drop images here or click to upload.
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Close
                </button>
            </div>
        </div>
    </div>
</div>

</div>

<?php require_once 'includes/footer.php'; ?>

<!-- GLightbox CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>

<script src="assets/js/patients.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const patientId = <?php echo json_encode($patient_id); ?>;
        const surgeriesTableBody = document.querySelector('#surgeries-table tbody');
        const photosListDiv = document.getElementById('photos-list');
        const pageTitle = document.getElementById('page-title');
        const statusMessagesDiv = document.getElementById('status-messages');
        const deleteConfirmModal = document.getElementById('deleteConfirmModal');
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        let itemToDeleteId = null;
        let itemToDeleteType = null; // 'surgery' or 'photo'

        // Function to display messages
        function displayMessage(message, type = 'success') {
            statusMessagesDiv.innerHTML = `<div class="alert alert-${type}">${message}</div>`;
        }

        // Function to format date as DD, MMM / YY
        function formatDate(dateString) {
            const options = {
                day: '2-digit',
                month: 'short',
                year: '2-digit'
            };
            const date = new Date(dateString);
            return date.toLocaleDateString('en-GB', options).replace(/\//g, ' / ');
        }

        // Helper function to get status color for badges
        function getStatusColor(status) {
            switch (status.toLowerCase()) {
                case 'completed':
                    return 'success';
                case 'booked':
                    return 'primary';
                case 'cancelled':
                    return 'danger';
                case 'in-progress':
                    return 'warning';
                default:
                    return 'secondary';
            }
        }

        // Override or extend loadPatientProfileData from patients.js
        async function loadPatientProfileDataAndRender(patientId) {
            if (!patientId) {
                displayMessage('Patient ID not provided.', 'danger');
                return;
            }

            const data = await apiRequest('patients', 'get', { id: patientId });

            if (data && data.success) {
                // Update page title with patient name and display avatar
                const patientAvatarImg = document.getElementById('patient-avatar');
                if (data.patient) {
                    if (data.patient.name) {
                        let titleText = `${sanitizeHTML(data.patient.name)}`;
                        if (data.patient.agency_name) {
                            titleText += ` - ${sanitizeHTML(data.patient.agency_name)}`;
                        }
                        pageTitle.textContent = titleText;
                    } else {
                        pageTitle.textContent = `Profile for Patient ID ${patientId}`;
                    }
                    if (data.patient.avatar) {
                        patientAvatarImg.src = sanitizeHTML(data.patient.avatar);
                    } else {
                        patientAvatarImg.src = 'assets/avatar.png';
                    }
                    patientAvatarImg.style.display = 'block';
                } else {
                    pageTitle.textContent = `Patient Profile`; // Reset title on error
                    patientAvatarImg.style.display = 'none';
                }


                // Render Surgeries
                surgeriesTableBody.innerHTML = ''; // Clear existing rows
                if (data.surgeries && data.surgeries.length > 0) {
                    data.surgeries.forEach(surgery => {
                        const row = document.createElement('tr');
                        row.setAttribute('data-surgery-id', surgery.id);
                        row.innerHTML = `
                            <td><span class="fw-medium">${formatDate(surgery.date)}</span></td>
                             <td>${surgery.room_name}</td>
                             <td><span class="badge bg-${getStatusColor(surgery.status)} status-${sanitizeHTML(surgery.status)}">${sanitizeHTML(surgery.status)}</span></td>
                            <td>${sanitizeHTML(surgery.graft_count || '0')}</td>
                            <td class="d-none d-md-table-cell">${sanitizeHTML(surgery.notes || '')}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="add_edit_surgery.php?id=${surgery.id}" class="btn btn-sm btn-outline-warning" title="Edit Surgery">
                                        <i class="fas fa-edit"></i>
                                        <span class="d-none d-lg-inline ms-1">Edit</span>
                                    </a>
                                    <?php if (is_admin()): ?>
                                    <button class="btn btn-sm btn-outline-danger delete-item-btn" data-id="${surgery.id}" data-type="surgery" title="Delete Surgery">
                                        <i class="fas fa-trash-alt"></i>
                                        <span class="d-none d-lg-inline ms-1">Delete</span>
                                    </button>
                                    <?php endif; ?>
                                </div>
                            </td>
                        `;
                        surgeriesTableBody.appendChild(row);
                    });
                } else {
                    surgeriesTableBody.innerHTML = '<tr><td colspan="4">No surgeries found.</td></tr>';
                }

                // Render Photos
                photosListDiv.innerHTML = ''; // Clear existing content
                if (data.photos && data.photos.length > 0) {
                    // Group photos by album type name
                    const photosByAlbumType = data.photos.reduce((acc, photo) => {
                        const albumTypeName = photo.album_type ||
                            'Uncategorized'; // Use album_type from API response
                        if (!acc[albumTypeName]) {
                            acc[albumTypeName] = {
                                id: photo
                                    .photo_album_type_id, // Assuming album_type_id is available
                                name: albumTypeName,
                                photos: []
                            };
                        }
                        acc[albumTypeName].photos.push(photo);
                        return acc;
                    }, {});

                    for (const albumTypeName in photosByAlbumType) {
                        const albumType = photosByAlbumType[albumTypeName];
                        const albumDiv = document.createElement('div');
                        albumDiv.classList.add('album-type-section', 'mb-4');
                        albumDiv.innerHTML = `
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <h4>${sanitizeHTML(albumType.name)}</h4>
                            </div>
                            <div class="row photo-gallery">
                                <!-- Photos will be added here -->
                            </div>
                        `;
                        const photoGalleryDiv = albumDiv.querySelector('.photo-gallery');

                        albumType.photos.forEach(photo => {
                            const photoCol = document.createElement('div');
                            photoCol.classList.add('col-lg-3', 'col-md-4', 'col-sm-6', 'col-6', 'mb-4');
                            photoCol.innerHTML = `
                                <div class="card h-100">
                                    <a href="${sanitizeHTML(photo.file_path)}" class="glightbox" data-gallery="${sanitizeHTML(albumType.name)}">
                                        <img src="${sanitizeHTML(photo.file_path)}" class="card-img-top" alt="Patient Photo" style="height: 200px; object-fit: cover;">
                                    </a>
                                    <div class="card-body text-center p-2">
                                        <button class="btn btn-outline-danger btn-sm delete-item-btn" data-id="${photo.id}" data-type="photo" title="Delete Photo">
                                            <i class="fas fa-trash-alt"></i>
                                            <span class="d-none d-lg-inline ms-1">Delete</span>
                                        </button>
                                    </div>
                                </div>
                            `;
                            photoGalleryDiv.appendChild(photoCol);
                        });
                        photosListDiv.appendChild(albumDiv);
                    }

                    // Initialize GLightbox after photos are rendered
                    GLightbox({
                        selector: '.glightbox' // Target elements with the class 'glightbox'
                    });

                } else {
                    photosListDiv.innerHTML = '<p>No photos found for this patient.</p>';
                }

            } else {
                displayMessage(`Error loading patient data: ${data ? data.error : 'Unknown error'}`, 'danger');
                pageTitle.textContent = `Patient Profile`; // Reset title on error
                surgeriesTableBody.innerHTML = '<tr><td colspan="4">Error loading surgeries.</td></tr>';
                photosListDiv.innerHTML = '<p>Error loading photos.</p>';
            }
        }

        // Event listener for delete buttons (delegation)
        document.addEventListener('click', function (event) {
            if (event.target.classList.contains('delete-item-btn')) {
                itemToDeleteId = event.target.dataset.id;
                itemToDeleteType = event.target.dataset.type;
                const modalBody = deleteConfirmModal.querySelector('.modal-body');
                if (itemToDeleteType === 'surgery') {
                    modalBody.textContent = 'Are you sure you want to delete this surgery?';
                } else if (itemToDeleteType === 'photo') {
                    modalBody.textContent = 'Are you sure you want to delete this photo?';
                }
                const modal = new bootstrap.Modal(deleteConfirmModal);
                modal.show();
            }
        });

        // When the confirm delete button in the modal is clicked
        if (confirmDeleteBtn) {
            confirmDeleteBtn.addEventListener('click', function () {
                if (itemToDeleteId && itemToDeleteType) {
                    const formData = new FormData();
                    formData.append('entity', itemToDeleteType === 'surgery' ? 'surgeries' : 'photos');
                    formData.append('action', 'delete');
                    formData.append('id', itemToDeleteId);

                    fetch('api.php', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                displayMessage(
                                    `${itemToDeleteType.charAt(0).toUpperCase() + itemToDeleteType.slice(1)} deleted successfully.`,
                                    'success');
                                loadPatientProfileDataAndRender(patientId); // Refresh data
                            } else {
                                displayMessage(`Error deleting ${itemToDeleteType}: ${data.error}`,
                                    'danger');
                            }
                        })
                        .catch(error => {
                            console.error(`Error deleting ${itemToDeleteType}:`, error);
                            displayMessage(`An error occurred while deleting the ${itemToDeleteType}.`,
                                'danger');
                        })
                        .finally(() => {
                            const modal = bootstrap.Modal.getInstance(deleteConfirmModal);
                            modal.hide();
                            itemToDeleteId = null;
                            itemToDeleteType = null;
                        });
                }
            });
        }

        // Handle upload modal
        const uploadModal = document.getElementById('uploadModal');
        const photoAlbumTypeSelect = document.getElementById('photo_album_type_id');
        const photoDropzoneDiv = document.getElementById('photo-dropzone');

        if (uploadModal) {
            uploadModal.addEventListener('show.bs.modal', function (event) {
                // Fetch and populate album types
                fetchPhotoAlbumTypes();
                // Hide dropzone initially
                photoDropzoneDiv.style.display = 'none';
                // The patient_id is already set in the hidden input via PHP
            });
        }
        // Function to fetch and populate photo album types
        function fetchPhotoAlbumTypes() {
            apiRequest('photo_album_types', 'list')
                .then(data => {
                    photoAlbumTypeSelect.innerHTML =
                        '<option value="">Select Album Type</option>'; // Clear existing options
                    if (data.success && Array.isArray(data.photo_album_types)) {
                        data.photo_album_types.forEach(albumType => {
                            const option = document.createElement('option');
                            option.value = albumType.id;
                            option.textContent = albumType.name;
                            photoAlbumTypeSelect.appendChild(option);
                        });
                    } else {
                        // Handle cases where success is false or photo_album_types is not an array
                        console.error(
                            'Error fetching photo album types: Invalid data format or success is false.',
                            data);
                        // Optionally display an error message in the modal
                        const option = document.createElement('option');
                        option.value = "";
                        option.textContent = "Error loading types";
                        photoAlbumTypeSelect.appendChild(option);
                        photoAlbumTypeSelect.disabled = true; // Disable dropdown on error
                    }
                })
                .catch(error => {
                    console.error('Error fetching photo album types:', error);
                    // Optionally display an error message in the modal
                    photoAlbumTypeSelect.innerHTML = '<option value="">Error loading types</option>';
                    photoAlbumTypeSelect.disabled = true; // Disable dropdown on error
                });
        }

        // Show dropzone when an album type is selected
        photoAlbumTypeSelect.addEventListener('change', function () {
            if (this.value) {
                photoDropzoneDiv.style.display = 'block';
            } else {
                photoDropzoneDiv.style.display = 'none';
            }
        });

        // Initialize Dropzone (assuming Dropzone.js is included elsewhere)
        // This part might need adjustment based on how Dropzone is initialized globally
        if (typeof Dropzone !== 'undefined') {
            Dropzone.autoDiscover = false; // Prevent Dropzone from automatically attaching to elements

            const photoDropzone = new Dropzone("#photo-dropzone", {
                url: "upload.php", // Your upload script
                paramName: "file", // The name that will be used to transfer the files
                maxFilesize: 5, // MB
                acceptedFiles: "image/*",
                addRemoveLinks: true,
                autoProcessQueue: true, // Process the queue automatically
                uploadMultiple: true, // Allow multiple file uploads
                parallelUploads: 10, // How many files to upload in parallel
                params: function () {
                    return {
                        patient_id: document.getElementById('upload-patient-id').value,
                        photo_album_type_id: photoAlbumTypeSelect.value
                    };
                },
                init: function () {
                    const myDropzone = this;

                    // Listen to the "addedfile" event
                    myDropzone.on("addedfile", function (file) {
                        // You can add custom logic here when a file is added
                        // If autoProcessQueue is true, the upload starts here
                    });

                    // Listen to the "successmultiple" event
                    myDropzone.on("successmultiple", function (files, response) {
                        // Handle successful uploads
                        console.log("Upload successful:", response);
                        displayMessage('Photos uploaded successfully!', 'success');
                        myDropzone.removeAllFiles(); // Clear the dropzone
                        const modal = bootstrap.Modal.getInstance(uploadModal);
                        modal.hide();
                        loadPatientProfileDataAndRender(patientId); // Refresh the photo list
                    });

                    // Listen to the "errormultiple" event
                    myDropzone.on("errormultiple", function (files, response, xhr) {
                        // Handle errors
                        console.error("Upload error:", response);
                        let errorMessage = 'An error occurred during upload.';
                        if (response && response.error) {
                            errorMessage = 'Upload failed: ' + response.error;
                        } else if (xhr && xhr.responseText) {
                            try {
                                const errorData = JSON.parse(xhr.responseText);
                                if (errorData.error) {
                                    errorMessage = 'Upload failed: ' + errorData.error;
                                } else {
                                    errorMessage = 'Upload failed: ' + xhr.responseText;
                                }
                            } catch (e) {
                                errorMessage = 'Upload failed: ' + xhr.responseText;
                            }
                        }
                        displayMessage(errorMessage, 'danger');
                    });

                    // Optional: Listen to the queuecomplete event if needed
                    // myDropzone.on("queuecomplete", function() {
                    //     // All files have been processed
                    // });

                    // No manual upload button needed with autoProcessQueue: true
                }
            });
        } else {
            console.error("Dropzone.js not loaded.");
            // Optionally display a message to the user that Dropzone is missing
        }


        // Initial load of patient data, surgeries, and photos
        loadPatientProfileDataAndRender(patientId);
    });
</script>