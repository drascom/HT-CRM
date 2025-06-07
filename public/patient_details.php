<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

$patient_id = $_GET['id'] ?? null;
if (!$patient_id || !is_numeric($patient_id)) {
    header('Location: patients.php');
    exit();
}

$page_title = "Patient Details";
require_once 'includes/header.php';
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" />
<!-- Status Messages -->
<div id="status-messages">
    <!-- Success or error messages will be displayed here -->
</div>
<div class="row">
    <div class="col-md-3">
        <div class="profile-img">
            <img id="patient-avatar"
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog"
                alt="Patient Avatar" />
        </div>
        <div id="patient-info-left" class="text-center mt-3">
            <!-- Patient info will be loaded here -->
        </div>
    </div>
    <div class="col-md-9">
        <div id="patient-info-right">
            <!-- Patient name, phone, email will be loaded here -->
        </div>
        <div class="profile-tab mt-4">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="appointments-tab" data-bs-toggle="tab"
                        data-bs-target="#appointments" type="button" role="tab" aria-controls="appointments"
                        aria-selected="true">Appointments</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="surgeries-tab" data-bs-toggle="tab" data-bs-target="#surgeries"
                        type="button" role="tab" aria-controls="surgeries" aria-selected="false">Surgeries</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="images-tab" data-bs-toggle="tab" data-bs-target="#images" type="button"
                        role="tab" aria-controls="images" aria-selected="false">Images</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="appointments" role="tabpanel"
                    aria-labelledby="appointments-tab">
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Reason</th>
                            </tr>
                        </thead>
                        <tbody id="appointments-table-body">
                            <!-- Appointments will be loaded here -->
                            <tr>
                                <td colspan="3">No appointments found.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="surgeries" role="tabpanel" aria-labelledby="surgeries-tab">
                    <table class="table table-striped mt-3">
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
                        <tbody id="surgeries-table-body">
                            <!-- Surgeries will be loaded here -->
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                    <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#uploadModal">
                        Add Photos</button>
                    <div id="photos-list" class="mt-3">
                        <!-- Photos will be loaded here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Photos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="upload.php" id="photo-upload-form" enctype="multipart/form-data">
                    <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
                    <div class="form-group">
                        <label for="photo_album_type_id">Album Type</label>
                        <select class="form-control" id="photo_album_type_id" name="photo_album_type_id" required>
                            <option value="">Select Album Type</option>
                            <!-- Options loaded dynamically -->
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
<?php require_once 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const patientId = <?php echo json_encode($patient_id); ?>;
        const patientAvatarImg = document.getElementById('patient-avatar');
        const patientInfoLeft = document.getElementById('patient-info-left');
        const patientInfoRight = document.getElementById('patient-info-right');
        const surgeriesTableBody = document.getElementById('surgeries-table-body');
        const appointmentsTableBody = document.getElementById('appointments-table-body');
        const photosListDiv = document.getElementById('photos-list');
        const photoAlbumTypeSelect = document.getElementById('photo_album_type_id');
        const photoDropzoneDiv = document.getElementById('photo-dropzone');
        const statusMessagesDiv = document.getElementById('status-messages');
        const uploadModal = document.getElementById('uploadModal');
        const deleteConfirmModal = document.getElementById('deleteConfirmModal');
        let itemToDeleteId = null;
        let itemToDeleteType = null; // 'surgery' or 'photo'


        function sanitizeHTML(str) {
            const temp = document.createElement('div');
            temp.textContent = str;
            return temp.innerHTML;
        }
        // Function to display messages
        function displayMessage(message, type = 'success') {
            statusMessagesDiv.innerHTML = `<div class="alert alert-${type}">${message}</div>`;
        }

        async function loadPatientData() {
            const data = await apiRequest('patients', 'get', { id: patientId });
            if (data && data.success && data.patient) {
                const patient = data.patient;
                patientAvatarImg.src = patient.avatar || 'assets/avatar.png';

                let leftInfo = `
                <p><strong>DOB:</strong> ${patient.dob || 'N/A'}</p>
                <p><strong>City:</strong> ${patient.city || 'N/A'}</p>
                <p><strong>Occupation:</strong> ${patient.occupation || 'N/A'}</p>
                <p><strong>Agency:</strong> ${patient.agency_name || 'N/A'}</p>
            `;
                patientInfoLeft.innerHTML = leftInfo;

                let rightInfo = `
                <h4>${patient.name}</h4>
                <p><strong>Phone:</strong> ${patient.phone || 'N/A'}</p>
                <p><strong>Email:</strong> ${patient.email || 'N/A'}</p>
            `;
                patientInfoRight.innerHTML = rightInfo;

                renderSurgeries(data.surgeries);
                renderAppointments(data.appointments);
                renderPhotos(data.photos);
            }
        }
        function fetchPhotoAlbumTypes() {
            apiRequest('photo_album_types', 'list').then(data => {
                if (data.success && Array.isArray(data.photo_album_types)) {
                    data.photo_album_types.forEach(albumType => {
                        const option = document.createElement('option');
                        option.value = albumType.id;
                        option.textContent = albumType.name;
                        photoAlbumTypeSelect.appendChild(option);
                    });
                }
            });
        }

        function renderSurgeries(surgeries) {
            surgeriesTableBody.innerHTML = '';
            if (surgeries && surgeries.length > 0) {
                surgeries.forEach(surgery => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                    <td>${surgery.date}</td>
                    <td>${surgery.room_name}</td>
                    <td><span class="badge bg-${getStatusColor(surgery.status)} ms-1">${surgery.status}</span></td>
                    <td>${surgery.graft_count}</td>
                    <td>${surgery.notes}</td>
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
                surgeriesTableBody.innerHTML = '<tr><td colspan="5">No surgeries found.</td></tr>';
            }
        }
        function renderAppointments(appointments) {
            appointmentsTableBody.innerHTML = '';
            if (appointments && appointments.length > 0) {
                appointments.forEach(appointment => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                    <td>${appointment.appointment_date}</td>
                    <td>${appointment.start_time}</td>
                    <td>${appointment.procedure_name}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="add_edit_appointment.php?id=${appointment.id}" class="btn btn-sm btn-outline-warning" title="Edit Surgery">
                                <i class="fas fa-edit"></i>
                                <span class="d-none d-lg-inline ms-1">Edit</span>
                            </a>
                            <?php if (is_admin()): ?>
                            <button class="btn btn-sm btn-outline-danger delete-item-btn" data-id="${appointment.id}" data-type="appointment" title="Delete Surgery">
                                <i class="fas fa-trash-alt"></i>
                                <span class="d-none d-lg-inline ms-1">Delete</span>
                            </button>
                            <?php endif; ?>
                        </div>
                    </td>
                   
                `;
                    appointmentsTableBody.appendChild(row);
                });
            } else {
                appointmentsTableBody.innerHTML = '<tr><td colspan="5">No surgeries found.</td></tr>';
            }
        }
        function renderPhotos(photos) {
            photosListDiv.innerHTML = '';
            if (photos && photos.length > 0) {
                const photosByAlbum = photos.reduce((acc, photo) => {
                    const albumName = photo.album_type || 'Uncategorized';
                    if (!acc[albumName]) {
                        acc[albumName] = [];
                    }
                    acc[albumName].push(photo);
                    return acc;
                }, {});

                for (const albumName in photosByAlbum) {
                    const albumDiv = document.createElement('div');
                    albumDiv.classList.add('album-section', 'mb-4');
                    albumDiv.innerHTML = `<h5>${sanitizeHTML(albumName)}</h5>`;
                    const photoGalleryDiv = document.createElement('div');
                    photoGalleryDiv.classList.add('row');

                    photosByAlbum[albumName].forEach(photo => {
                        const photoCol = document.createElement('div');
                        photoCol.classList.add('col-md-3', 'mb-3');

                        photoCol.innerHTML = `
                    <div class="card h-100">
                        <a href="${sanitizeHTML(photo.file_path)}" class="glightbox" data-gallery="${sanitizeHTML(albumName)}">
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

                    albumDiv.appendChild(photoGalleryDiv);
                    photosListDiv.appendChild(albumDiv);
                }

                GLightbox({ selector: '.glightbox' });
            } else {
                photosListDiv.innerHTML = '<p>No photos found.</p>';
            }
        }


        // Show dropzone when an album type is selected
        photoAlbumTypeSelect.addEventListener('change', function () {
            if (this.value) {
                photoDropzoneDiv.style.display = 'block';
            } else {
                photoDropzoneDiv.style.display = 'none';
            }
        });

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
                    formData.append('entity', itemToDeleteType + 's');
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
                                loadPatientData(patientId); // Refresh data
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
                    patient_id: patientId,
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
                    const modal = bootstrap.Modal.getOrCreateInstance(uploadModal);
                    modal.hide();
                    loadPatientData(patientId); // Refresh the photo list
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
            }
        });

        uploadModal.addEventListener('shown.bs.modal', function (event) {
            fetchPhotoAlbumTypes();
        });

        loadPatientData();
    });
</script>