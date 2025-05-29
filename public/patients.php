<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

$page_title = "Patients";
require_once 'includes/header.php';
?>

<!-- Status Messages -->
<div id="status-messages">
    <!-- Success or error messages will be displayed here -->
</div>

<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">
        <i class="fas fa-users me-2 text-primary"></i>
        Patients
    </h2>
    <a href="add_edit_patient.php" class="btn btn-success">
        <i class="fas fa-plus-circle me-1"></i>
        <span class="d-none d-sm-inline">Add New Patient</span>
        <span class="d-inline d-sm-none">Add</span>
    </a>
</div>

<!-- Search Section -->
<div class="search-section">
    <div class="row align-items-center">
        <div class="col-md-8">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" id="patient-search" class="form-control"
                       placeholder="Search patients by name or date of birth...">
            </div>
        </div>
        <div class="col-md-4 mt-3 mt-md-0">
            <div class="text-muted small">
                <i class="fas fa-info-circle me-1"></i>
                <span id="patient-count">Loading...</span> patients found
            </div>
        </div>
    </div>
</div>

<!-- Patients Table -->
<div class="table-responsive">
    <table class="table table-hover" id="patients-table">
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <?php if (is_admin()): ?><th>Agency</th> <?php endif; ?>
                <th>Last Surgery</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Patient rows will be loaded here via JavaScript -->
        </tbody>
    </table>
</div>

<!-- Loading Spinner -->
<div id="loading-spinner" style="display: none;">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <p class="mt-3 text-muted">Loading patients...</p>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const patientsTable = document.getElementById('patients-table');
    const statusMessagesDiv = document.getElementById('status-messages');

    // Function to display messages
    function displayMessage(message, type = 'success') {
        statusMessagesDiv.innerHTML = `<div class="alert alert-${type}">${message}</div>`;
    }

    // Function to fetch and display patients
    function fetchAndDisplayPatients() {
        // Show loading spinner
        document.getElementById('loading-spinner').style.display = 'flex';
        patientsTable.style.display = 'none';

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
                // Hide loading spinner
                document.getElementById('loading-spinner').style.display = 'none';
                patientsTable.style.display = 'table';

                if (data.success) {
                    const patients = data.patients;
                    let tableRows = '';

                    patients.forEach(patient => {
                        const avatarHtml = patient.avatar ?
                            `<img src="${patient.avatar}" alt="Avatar" class="avatar">` :
                            `<img src="assets/avatar.png" alt="Default Avatar" class="avatar">`;

                        tableRows += `
                            <tr data-patient-id="${patient.id}" data-patient-name="${patient.name}" data-patient-dob="${patient.dob}">
                                <td>
                                    ${avatarHtml}
                                </td>
                                <td>
                                    <a href="patient.php?id=${patient.id}" class="fw-medium text-decoration-none">
                                        ${patient.name}
                                    </a>
                                </td>
                                 <td>
                                    <span class="text-truncate-mobile">${patient.dob || 'N/A'}</span>
                                </td>
                                 <?php if (is_admin()): ?>
                                <td>
                                    <span class="text-truncate-mobile">${patient.agency_name || 'No Agency'}</span>
                                </td>
                                 <?php endif; ?>
                                <td>
                                    ${patient.last_surgery_date ?
                                        `<a href="patient.php?id=${patient.id}" class="text-decoration-none">
                                            <span class="text-truncate-mobile">${patient.last_surgery_date}</span>
                                        </a>` :
                                        '<span class="text-muted">No surgeries</span>'
                                    }
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Patient Actions">
                                        <a href="add_edit_patient.php?id=${patient.id}"
                                           class="btn btn-sm btn-outline-warning"
                                           title="Edit Patient">
                                            <i class="fas fa-edit"></i>
                                            <span class="d-none d-lg-inline ms-1">Edit</span>
                                        </a>
                                        <?php if (is_admin()): ?>
                                        <button class="btn btn-sm btn-outline-danger delete-patient-btn"
                                                data-patient-id="${patient.id}"
                                                title="Delete Patient">
                                            <i class="fas fa-trash-alt"></i>
                                            <span class="d-none d-lg-inline ms-1">Delete</span>
                                        </button>
                                        <?php endif; ?>
                                        <a href="patient.php?id=${patient.id}"
                                           class="btn btn-sm btn-outline-info"
                                           title="View Photos">
                                            <i class="fas fa-camera"></i>
                                            <span class="d-none d-lg-inline ms-1">Photos</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        `;
                    });

                    patientsTable.querySelector('tbody').innerHTML = tableRows;

                    // Update patient count
                    document.getElementById('patient-count').textContent = patients.length;
                } else {
                    displayMessage(`Error loading patients: ${data.error}`, 'danger');
                    document.getElementById('patient-count').textContent = '0';
                }
            })
            .catch(error => {
                // Hide loading spinner
                document.getElementById('loading-spinner').style.display = 'none';
                patientsTable.style.display = 'table';

                console.error('Error fetching patients:', error);
                displayMessage('An error occurred while loading patient data.', 'danger');
                document.getElementById('patient-count').textContent = '0';
            });
    }

    // Delete patient function
    patientsTable.addEventListener('click', function(event) {
        if (event.target.classList.contains('delete-patient-btn')) {
            const patientId = event.target.dataset.patientId;
            if (confirm('Are you sure you want to delete this patient?')) {
                const formData = new FormData();
                formData.append('entity', 'patients');
                formData.append('action', 'delete');
                formData.append('id', patientId);

                fetch('api.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            displayMessage(data.message, 'success');
                            fetchAndDisplayPatients(); // Refresh the patient list
                        } else {
                            displayMessage(`Error deleting patient: ${data.error}`, 'danger');
                        }
                    })
                    .catch(error => {
                        console.error('Error deleting patient:', error);
                        displayMessage('An error occurred while deleting the patient.', 'danger');
                    });
            }
        }
    });

    fetchAndDisplayPatients(); // Initial load of patients

    // Search functionality
    const patientSearchInput = document.getElementById('patient-search');
    const searchPatientBtn = document.getElementById('search-patient-btn');

    function filterPatients() {
        const searchTerm = patientSearchInput.value.toLowerCase();
        const rows = patientsTable.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const name = row.dataset.patientName.toLowerCase();
            const dob = row.dataset.patientDob.toLowerCase();
            if (name.includes(searchTerm) || dob.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }


    patientSearchInput.addEventListener('keyup', function(event) {
        const searchTerm = patientSearchInput.value;
        if (searchTerm.length >= 2 || searchTerm.length === 0) {
            filterPatients();
        }
    });

    // The existing modal and surgeries list logic can remain mostly unchanged,
    // but might need adjustments to use the new API for fetching surgery data.
    const surgeriesModal = document.getElementById('surgeriesModal');
    if (surgeriesModal) {
        surgeriesModal.addEventListener('show.bs.modal', function(event) {
            const link = event.relatedTarget; // Button or link that triggered the modal
            const patientId = link.getAttribute('data-patient-id');
            const surgeriesListDiv = document.getElementById('surgeries-list');

            // Clear previous content and show loading message
            surgeriesListDiv.innerHTML = 'Loading surgeries...';

            // Fetch surgeries via AJAX
            fetch(`api.php?entity=surgeries&action=list&patient_id=${patientId}`)
                .then(response => response.json())
                .then(data => {
                    surgeriesListDiv.innerHTML = ''; // Clear loading message

                    if (data.surgeries) {
                        // Build list of surgeries
                        let surgeryHtml = '<ul class="list-group">';
                        data.surgeries.forEach(surgery => {
                            surgeryHtml += `<li class="list-group-item">`;
                            surgeryHtml += `<strong>Date:</strong> ${surgery.date}<br>`;
                            surgeryHtml += `<strong>Status:</strong> ${surgery.status}<br>`;
                            if (surgery.notes) {
                                surgeryHtml += `<strong>Notes:</strong> ${surgery.notes}`;
                            }
                            surgeryHtml += `</li>`;
                        });
                        surgeryHtml += '</ul>';

                        surgeriesListDiv.innerHTML = surgeryHtml;
                    } else if (data.error) {
                        surgeriesListDiv.innerHTML =
                            `<div class="alert alert-danger">${data.error}</div>`;
                        return;
                    }

                    if (data.surgeries.length === 0) {
                        surgeriesListDiv.innerHTML = '<p>No surgeries found for this patient.</p>';
                        return;
                    }
                })
                .catch(error => {
                    console.error('Error fetching surgeries:', error);
                    surgeriesListDiv.innerHTML =
                        '<div class="alert alert-danger">Could not load surgeries.</div>';
                });
        });
    }

});
</script>
<?php require_once 'includes/footer.php'; ?>