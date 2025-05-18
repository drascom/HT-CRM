<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

// Ensure user is logged in
if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}


$page_title = "All Surgeries";
require_once 'includes/header.php';
?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const surgeriesTable = document.getElementById('surgeries-table');
    const statusMessagesDiv = document.getElementById('status-messages');

    // Function to display messages
    function displayMessage(message, type = 'success') {
        statusMessagesDiv.innerHTML = `<div class="alert alert-${type}">${message}</div>`;
    }

    // Function to fetch and display surgeries
// Function to format date as DD, MMM / YY
    function formatDate(dateString) {
        const options = { day: '2-digit', month: 'short', year: '2-digit' };
        const date = new Date(dateString);
        return date.toLocaleDateString('en-GB', options).replace(/\//g, ' / ');
    }
    function fetchAndDisplaySurgeries() {
        fetch('api.php?entity=surgeries&action=list')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const surgeries = data.surgeries;
                    let tableRows = '';
                    surgeries.forEach(surgery => {
                        tableRows += `
                            <tr data-surgery-id="${surgery.id}">
                                <td>${formatDate(surgery.date)}</td>
                                <td>
                                    ${surgery.patient_name ? `<a href="patient_surgeries.php?patient_id=${surgery.patient_id}">${surgery.patient_name}</a>` : 'N/A'}
                                </td>
                                <td class="status-${surgery.status}">${surgery.status}</td>
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
    surgeriesTable.addEventListener('click', function (event) {
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

    fetchAndDisplaySurgeries(); // Initial load of surgeries

    // Search functionality
    const surgerySearchInput = document.getElementById('surgery-search');
    const searchSurgeryBtn = document.getElementById('search-surgery-btn');

    function filterSurgeries() {
        const searchTerm = surgerySearchInput.value.toLowerCase();
        const rows = surgeriesTable.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const date = row.cells[0].textContent.toLowerCase();
            const patientName = row.cells[1].textContent.toLowerCase();
            const status = row.cells[2].textContent.toLowerCase();

            if (date.includes(searchTerm) || patientName.includes(searchTerm) || status.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    searchSurgeryBtn.addEventListener('click', filterSurgeries);

    surgerySearchInput.addEventListener('keyup', function(event) {
        if (event.key === 'Enter') {
            filterSurgeries();
        }
    });
});
</script>

<div class="container mt-4">
    <h2 class="mb-2">Surgeries</h2>
        <div class="row mb-3">
            <div class="col-md-3">
                <a href="add_edit_surgery.php" class="btn btn-success mb-3"><i class="fas fa-plus-circle me-1"></i>Add New Surgery</a>
            </div>
            <div class="col-md-6">
                <input type="text" id="surgery-search" class="form-control" placeholder="Search surgeries...">
            </div>
            <div class="col-md-auto">
                <button class="btn btn-primary" id="search-surgery-btn"><i class="fas fa-search me-1"></i>Search</button>
            </div>
        </div>
    
        <table class="table table-striped" id="surgeries-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Patient Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Surgery rows will be loaded here by JavaScript -->
            </tbody>
        </table>
    
</div>

<?php require_once 'includes/footer.php'; ?>