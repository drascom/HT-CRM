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

if ($patient_id === null) {
    // Redirect to patients list if patient_id is not provided
    header('Location: patients.php');
    exit();
}

require_once 'includes/db.php';
require_once 'includes/auth.php';

// Ensure user is logged in
if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

// Get patient ID from URL
$patient_id = $_GET['patient_id'] ?? null;

if ($patient_id === null) {
    // Redirect to patients list if patient_id is not provided
    header('Location: patients.php');
    exit();
}

$page_title = "Surgeries for Patient";
require_once 'includes/header.php';
?>

<div class="container mt-4">
    <h2 id="page-title">Surgeries for Patient</h2>

    <div id="status-messages">
        <!-- Success or error messages will be displayed here -->
    </div>

    <a href="add_edit_surgery.php?patient_id=<?php echo htmlspecialchars($patient_id); ?>"
        class="btn btn-success mb-3"><i class="fas fa-plus-circle me-1"></i>Add New Surgery</a>

    <table class="table table-striped" id="surgeries-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Status</th>
                <th>Notes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Surgeries will be loaded here via JavaScript -->
        </tbody>
    </table>

</div>

<?php require_once 'includes/footer.php'; ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const surgeriesTable = document.getElementById('surgeries-table');
        const statusMessagesDiv = document.getElementById('status-messages');
        const patientId = <?php echo json_encode($patient_id); ?>; // Get patient ID from PHP
        const pageTitle = document.getElementById('page-title');

        // Function to display messages
        function displayMessage(message, type = 'success') {
            statusMessagesDiv.innerHTML = `<div class="alert alert-${type}">${message}</div>`;
        }

        // Function to fetch patient data and update the page title
        function fetchPatientData() {
            fetch(`api.php?entity=patients&action=get&id=${patientId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const patient = data.patient;
                        pageTitle.textContent = `Surgeries for ${patient.name}`;
                    } else {
                        displayMessage(`Error loading patient: ${data.error}`, 'danger');
                    }
                })
                .catch(error => {
                    console.error('Error fetching patient:', error);
                    displayMessage('An error occurred while loading patient data.', 'danger');
                });
        }

        // Function to fetch and display surgeries
        function fetchAndDisplaySurgeries() {
            fetch(`api.php?entity=surgeries&action=list&patient_id=${patientId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const surgeries = data.surgeries;
                        let tableRows = '';
                        surgeries.forEach(surgery => {
                            tableRows += `
                            <tr data-surgery-id="${surgery.id}">
                                <td>${surgery.date}</td>
                                <td class="status-${surgery.status}">${surgery.status}</td>
                                <td>${surgery.notes || ''}</td>
                                <td>
                                    <a href="add_edit_surgery.php?id=${surgery.id}" class="btn btn-sm btn-warning me-2"><i class="fas fa-edit me-1"></i>Edit</a>
                                    <button class="btn btn-sm btn-danger delete-surgery-btn" data-surgery-id="${surgery.id}"><i class="fas fa-trash-alt me-1"></i>Delete</button>
                                </td>
                            </tr>
                        `;
                        });
                        surgeriesTable.querySelector('tbody').innerHTML = tableRows;
                    } else {
                        displayMessage(`Error loading surgeries: ${data.error}`, 'danger');
                    }
                })
                .catch(error => {
                    console.error('Error fetching surgeries:', error);
                    displayMessage('An error occurred while loading surgery data.', 'danger');
                });
        }

        // Delete surgery function
        surgeriesTable.addEventListener('click', function(event) {
            if (event.target.classList.contains('delete-surgery-btn')) {
                const surgeryId = event.target.dataset.surgeryId;
                if (confirm('Are you sure you want to delete this surgery?')) {
                    const formData = new FormData();
                    formData.append('entity', 'surgeries');
                    formData.append('action', 'delete');
                    formData.append('id', surgeryId);

                    fetch('api.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                displayMessage(data.message, 'success');
                                fetchAndDisplaySurgeries(); // Refresh the surgery list
                            } else {
                                displayMessage(`Error deleting surgery: ${data.error}`, 'danger');
                            }
                        })
                        .catch(error => {
                            console.error('Error deleting surgery:', error);
                            displayMessage('An error occurred while deleting the surgery.', 'danger');
                        });
                }
            }
        });

        fetchPatientData(); // Fetch patient data and update the page title
        fetchAndDisplaySurgeries(); // Initial load of surgeries
    });
</script>