<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

require_once 'includes/header.php';
?>
<div class="container mt-4">
    <div id="status-messages">
        <!-- Success or error messages will be displayed here -->
    </div>
    <h2 class="mb-2">Patients</h2>
    <div class="row mb-3">
        <div class="col-md-3">
            <a href="add_edit_patient.php" class="btn btn-success mb-3"><i class="fas fa-plus-circle me-1"></i>Add New
                Record</a>
        </div>
        <div class="col-md-6">
            <input type="text" id="patient-search" class="form-control" placeholder="Search patients...">
        </div>
    </div>
</div>

<table class="table table-striped" id="patients-table">
    <thead>
        <tr>
            <th>Avatar</th>
            <th>Name</th>
            <th>DOB</th>
            <th>Last Surgery Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <!-- Patient rows will be loaded here via JavaScript -->
    </tbody>
</table>


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
        fetch('api.php?entity=patients&action=list')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const patients = data.patients;
                    let tableRows = '';
                    patients.forEach(patient => {
                        const avatarHtml = patient.avatar ?
                            `<img src="${patient.avatar}" alt="Avatar" style="width: 50px; height: 50px; border-radius: 50%;">` :
                            '';
                        tableRows += `
                            <tr data-patient-id="${patient.id}" data-patient-name="${patient.name}" data-patient-dob="${patient.dob}">
                                <td>
                                    ${avatarHtml}
                                    <a href="patient.php?id=${patient.id}">${patient.name}</a>
                                </td>
                                <td>${patient.dob || ''}</td>
                                <td>
                                    <a href="patient.php?id=${patient.id}">${patient.last_surgery_date || 'N/A'}</a>
                                </td>
                                <td>
                                    <a href="add_edit_patient.php?id=${patient.id}" class="btn btn-sm btn-warning me-2">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                    <button class="btn btn-sm btn-danger delete-patient-btn" data-patient-id="${patient.id}">
                                        <i class="fas fa-trash-alt me-1"></i>Delete
                                    </button>
                                    <a href="patient.php?id=${patient.id}" class="btn btn-sm btn-info ms-2">
                                        <i class="fas fa-camera me-1"></i>Photos
                                    </a>
                                </td>
                            </tr>
                        `;
                    });
                    patientsTable.querySelector('tbody').innerHTML = tableRows;
                } else {
                    displayMessage(`Error loading patients: ${data.error}`, 'danger');
                }
            })
            .catch(error => {
                console.error('Error fetching patients:', error);
                displayMessage('An error occurred while loading patient data.', 'danger');
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