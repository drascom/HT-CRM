<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

// Ensure user is logged in
if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}


$page_title = "Surgeries";
require_once 'includes/header.php';
?>

<!-- Status Messages -->
<div id="status-messages">
    <!-- Success or error messages will be displayed here -->
</div>

<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">
        <i class="fas fa-hospital me-2 text-primary"></i>
        Surgeries
    </h2>
    <a href="add_edit_surgery.php" class="btn btn-success">
        <i class="fas fa-plus-circle me-1"></i>
        <span class="d-none d-sm-inline">Add New Surgery</span>
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
                <input type="text" id="surgery-search" class="form-control"
                    placeholder="Search surgeries by date, patient, or status...">
            </div>
        </div>
        <div class="col-md-4 mt-3 mt-md-0">
            <div class="text-muted small">
                <i class="fas fa-info-circle me-1"></i>
                <span id="surgery-count">Loading...</span> surgeries found
            </div>
        </div>
    </div>
</div>

<!-- Surgeries Table -->
<div class="table-responsive">
    <table class="table table-hover" id="surgeries-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Patient Name</th>
                <?php if (is_admin()): ?><th>Agency</th> <?php endif; ?>
                <th>Room</th>
                <th>Graft Count</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Surgery rows will be loaded here by JavaScript -->
        </tbody>
    </table>
</div>

<!-- Loading Spinner -->
<div id="loading-spinner" style="display: none;">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <p class="mt-3 text-muted">Loading surgeries...</p>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const surgeriesTable = document.getElementById('surgeries-table');
    const statusMessagesDiv = document.getElementById('status-messages');

    // Function to display messages
    function displayMessage(message, type = 'success') {
        statusMessagesDiv.innerHTML = `<div class="alert alert-${type}">${message}</div>`;
    }

    // Function to fetch and display surgeries
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

    function fetchAndDisplaySurgeries() {
        // Show loading spinner
        document.getElementById('loading-spinner').style.display = 'flex';
        surgeriesTable.style.display = 'none';

        const userRole = '<?php echo get_user_role(); ?>';
        const userAgencyId = '<?php echo get_user_agency_id(); ?>';

        // Build API request data with agency filter for agents
        let requestData = {};
        if (userRole === 'agent' && userAgencyId) {
            requestData.agency = userAgencyId;
        }

        apiRequest('surgeries', 'list', requestData)
            .then(data => {
                // Hide loading spinner
                document.getElementById('loading-spinner').style.display = 'none';
                surgeriesTable.style.display = 'table';

                if (data.success) {
                    const surgeries = data.surgeries;
                    let tableRows = '';

                    surgeries.forEach(surgery => {
                        const userRole = '<?php echo get_user_role(); ?>';
                        const isCompleted = surgery.status.toLowerCase() === 'completed';
                        const canEdit = !(userRole === 'agent' && isCompleted);

                        const isAdmin = <?php echo is_admin() ? 'true' : 'false'; ?>;

                        tableRows += `
                            <tr data-surgery-id="${surgery.id}">
                                <td>
                                    <span class="fw-medium">${formatDate(surgery.date)}</span>
                                </td>
                                <td>
                                    ${surgery.patient_name ?
                                        `<a href="patient.php?id=${surgery.patient_id}" class="fw-medium text-decoration-none">
                                            <span class="text-truncate-mobile">${surgery.patient_name}</span>
                                        </a>` :
                                        '<span class="text-muted">N/A</span>'
                                    }
                                </td>
                                ${isAdmin ? `
                                <td>
                                    <span class="text-truncate-mobile">${surgery.agency_name || 'No Agency'}</span>
                                </td>` : ''}
                                <td>${surgery.room_name || '-'}</td>
                                <td>
                                    <span class="fw-medium">${surgery.graft_count || '0'}</span>
                                </td>
                                <td>
                                    <span class="badge bg-${getStatusColor(surgery.status)} status-${surgery.status}">
                                        ${surgery.status}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Surgery Actions">
                                        ${canEdit ?
                                            `<a href="add_edit_surgery.php?id=${surgery.id}"
                                               class="btn btn-sm btn-outline-warning"
                                               title="Edit Surgery">
                                                <i class="fas fa-edit"></i>
                                                <span class="d-none d-lg-inline ms-1">Edit</span>
                                            </a>` :
                                            `<button class="btn btn-sm btn-outline-secondary" disabled
                                                     title="Cannot edit completed surgery">
                                                <i class="fas fa-edit"></i>
                                                <span class="d-none d-lg-inline ms-1">Edit</span>
                                            </button>`
                                        }
                                        ${isAdmin ? `
                                        <button class="btn btn-sm btn-outline-danger delete-surgery-btn"
                                                data-surgery-id="${surgery.id}"
                                                title="Delete Surgery">
                                            <i class="fas fa-trash-alt"></i>
                                            <span class="d-none d-lg-inline ms-1">Delete</span>
                                        </button>` : ''}
                                    </div>
                                </td>
                            </tr>
                        `;
                    });

                    surgeriesTable.querySelector('tbody').innerHTML = tableRows;

                    // Update surgery count
                    document.getElementById('surgery-count').textContent = surgeries.length;
                } else {
                    displayMessage(`Error loading surgeries: ${data.error}`, 'danger');
                    document.getElementById('surgery-count').textContent = '0';
                }
            })
            .catch(error => {
                // Hide loading spinner
                document.getElementById('loading-spinner').style.display = 'none';
                surgeriesTable.style.display = 'table';

                console.error('Error fetching surgeries:', error);
                displayMessage('An error occurred while loading surgery data.', 'danger');
                document.getElementById('surgery-count').textContent = '0';
            });
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

    fetchAndDisplaySurgeries(); // Initial load of surgeries

    // Search functionality
    const surgerySearchInput = document.getElementById('surgery-search');
    const searchSurgeryBtn = document.getElementById('search-surgery-btn');

    function filterSurgeries() {
        const searchTerm = surgerySearchInput.value.toLowerCase();
        const rows = surgeriesTable.querySelectorAll('tbody tr');
        const isAdmin = <?php echo is_admin() ? 'true' : 'false'; ?>;

        rows.forEach(row => {
            const date = row.cells[0].textContent.toLowerCase();
            const patientName = row.cells[1].textContent.toLowerCase();
            const agencyName = isAdmin ? row.cells[2].textContent.toLowerCase() : '';
            const roomName = isAdmin ? row.cells[3].textContent.toLowerCase() : row.cells[2].textContent.toLowerCase();
            const status = isAdmin ? row.cells[5].textContent.toLowerCase() : row.cells[4].textContent.toLowerCase();

            if (date.includes(searchTerm) || patientName.includes(searchTerm) ||
                agencyName.includes(searchTerm) || roomName.includes(searchTerm) || status.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    surgerySearchInput.addEventListener('keyup', function(event) {
        const searchTerm = surgerySearchInput.value.toLowerCase();
        if (searchTerm.length >= 2 || searchTerm.length === 0) {
            filterSurgeries();
        } else if (searchTerm.length === 1) {
            // If only one character, clear the filter
            const rows = surgeriesTable.querySelectorAll('tbody tr');
            rows.forEach(row => {
                row.style.display = '';
            });
        }
    });
});
</script>
<?php require_once 'includes/footer.php'; ?>