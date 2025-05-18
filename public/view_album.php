<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

// Ensure user is logged in
if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

// Get patient ID from URL
$patient_id = $_GET['patient_id'] ?? null;

// Validate patient ID
if (!$patient_id || !is_numeric($patient_id)) {
    // Redirect or show an error if patient ID is missing or invalid
    header('Location: patients.php'); // Redirect back to patients list
    exit();
}

// Fetch patient details
try {
    $stmt = get_db()->prepare("SELECT name FROM patients WHERE id = ?");
    $stmt->execute([$patient_id]);
    $patient = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$patient) {
        // Redirect or show an error if patient not found
        header('Location: patients.php'); // Redirect back to patients list
        exit();
    }
    $patient_name = htmlspecialchars($patient['name']);
} catch (\PDOException $e) {
    error_log("Error fetching patient details: " . $e->getMessage());
    // Redirect or show an error on database error
    header('Location: patients.php'); // Redirect back to patients list
    exit();
}


// Fetch patient photos grouped by album type
$photos_by_album_type = [];
try {
    $stmt = get_db()->prepare("SELECT pp.id, pp.file_path, pat.name as album_type_name, pat.id as photo_album_type_id
                           FROM patient_photos pp
                           JOIN photo_album_types pat ON pp.photo_album_type_id = pat.id
                           WHERE pp.patient_id = ?
                           ORDER BY pat.name, pp.created_at");
    $stmt->execute([$patient_id]);
    $photos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Group photos by album type name
    foreach ($photos as $photo) {
        $album_type_name = $photo['album_type_name'];
        $album_type_id = $photo['photo_album_type_id'];

        // Initialize the album type entry if it doesn't exist
        if (!isset($photos_by_album_type[$album_type_name])) {
            $photos_by_album_type[$album_type_name] = [
                'id' => $album_type_id,
                'name' => $album_type_name,
                'photos' => []
            ];
        }

        // Add the photo to the album type's photo list
        $photos_by_album_type[$album_type_name]['photos'][] = $photo;
    }
} catch (\PDOException $e) {
    error_log("Error fetching patient photos: " . $e->getMessage());
    $photos_by_album_type = []; // Initialize as empty array on error
    $error = "Could not retrieve patient photos.";
}

$page_title = "Album for " . $patient_name;
require_once 'includes/header.php';
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Photo Album for <?php echo $patient_name; ?></h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal"
            data-patient-id="<?php echo $patient_id; ?>">
            <i class="fas fa-upload me-1"></i>Add Photos
        </button>
    </div>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <?php if (empty($photos_by_album_type)): ?>
        <p>No photos found for this patient.</p>
    <?php else: ?>
        <?php foreach ($photos_by_album_type as $album_type): ?>
            <div class="d-flex justify-content-between align-items-center mt-4">
                <h3><?php echo htmlspecialchars($album_type['name']); ?></h3>
            </div>
            <div class="row">
                <?php foreach ($album_type['photos'] as $photo): ?>
                    <div class="col-md-3 col-sm-4 col-6 mb-4">
                        <div class="card">
                            <img src="<?php echo htmlspecialchars($photo['file_path']); ?>" class="card-img-top"
                                alt="Patient Photo">
                            <div class="card-body text-center">
                                <!-- Delete Button -->
                                <button class="btn btn-danger btn-sm delete-photo-btn"
                                    data-photo-id="<?php echo $photo['id']; ?>"><i class="fas fa-trash-alt me-1"></i>Delete
                                    Photo</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Delete Confirmation Modal (Basic Structure) -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this photo?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                            class="fas fa-times-circle me-1"></i>Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn"><i
                            class="fas fa-trash-alt me-1"></i>Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload Photos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="upload.php" id="photo-upload-form" enctype="multipart/form-data">
                        <input type="hidden" name="patient_id" id="upload-patient-id"
                            value="<?php echo $patient_id; ?>">
                        <div class="mb-3">
                            <label for="photo_album_type_id" class="form-label">Album Type</label>
                            <select class="form-select" id="photo_album_type_id" name="photo_album_type_id" required>
                                <option value="">Select Album Type</option>
                                <!-- Options will be loaded via JavaScript -->
                            </select>
                        </div>
                        <div id="photo-dropzone" class="dropzone">
                            <div class="dz-message">Drag and drop images here or click to upload.</div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require_once 'includes/footer.php'; ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteConfirmModal = document.getElementById('deleteConfirmModal');
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        let photoToDeleteId = null;

        // When a delete button is clicked, show the confirmation modal
        document.querySelectorAll('.delete-photo-btn').forEach(button => {
            button.addEventListener('click', function() {
                photoToDeleteId = this.getAttribute('data-photo-id');
                const modal = new bootstrap.Modal(deleteConfirmModal);
                modal.show();
            });
        });

        // When the confirm delete button in the modal is clicked
        if (confirmDeleteBtn) {
            confirmDeleteBtn.addEventListener('click', function() {
                if (photoToDeleteId) {
                    // Send an AJAX request to delete.php
                    fetch('api.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: 'entity=photos&action=delete&id=' + photoToDeleteId
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Reload the page or remove the photo thumbnail from the DOM
                                window.location.reload(); // Simple reload for now
                            } else {
                                let albumTypeToDeleteId = null;

                                // Modify the confirm delete button listener to handle both photo and album type deletion
                                if (confirmDeleteBtn) {
                                    confirmDeleteBtn.addEventListener('click', function() {
                                        if (photoToDeleteId) {
                                            // Existing photo deletion logic
                                            fetch('delete.php', {
                                                    method: 'POST',
                                                    headers: {
                                                        'Content-Type': 'application/x-www-form-urlencoded',
                                                    },
                                                    body: 'photo_id=' + photoToDeleteId
                                                })
                                                .then(response => response.json())
                                                .then(data => {
                                                    if (data.success) {
                                                        window.location
                                                            .reload(); // Simple reload for now
                                                    } else {
                                                        alert('Error deleting photo: ' +
                                                            data.error);
                                                    }
                                                })
                                                .catch(error => {
                                                    console.error('Error:', error);
                                                    alert(
                                                        'An error occurred while deleting the photo.'
                                                    );
                                                })
                                                .finally(() => {
                                                    const modal = bootstrap.Modal
                                                        .getInstance(deleteConfirmModal);
                                                    modal.hide();
                                                    photoToDeleteId =
                                                        null; // Reset the photo ID
                                                    // Restore modal content
                                                    deleteConfirmModal.querySelector(
                                                            '.modal-body').textContent =
                                                        'Are you sure you want to delete this photo?';
                                                });
                                        }
                                    });
                                }
                                alert('Error deleting photo: ' + data.error);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred while deleting the photo.');
                        })
                        .finally(() => {
                            // Hide the modal
                            const modal = bootstrap.Modal.getInstance(deleteConfirmModal);
                            modal.hide();
                            photoToDeleteId = null; // Reset the photo ID
                        });
                }
            });
        }

        // Handle upload modal
        const uploadModal = document.getElementById('uploadModal');
        const photoAlbumTypeSelect = document.getElementById('photo_album_type_id');

        if (uploadModal) {
            uploadModal.addEventListener('show.bs.modal', function(event) {
                // Fetch and populate album types
                fetchPhotoAlbumTypes();
                // The patient_id is already set in the hidden input via PHP
            });
        }
        // Function to fetch and populate photo album types
        function fetchPhotoAlbumTypes() {
            fetch('api.php?entity=photo_album_types&action=list')
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
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

    });
</script>