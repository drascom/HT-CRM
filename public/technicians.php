<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

// Ensure user is logged in
if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

$page_title = "Technician Management";
require_once 'includes/header.php';
?>

<div class="container-fluid mt-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">
            <i class="fas fa-user-cog me-2 text-primary"></i>
            Technician Management
        </h2>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#techModal" onclick="openTechModal()">
                <i class="fas fa-plus me-1"></i>
                Add Technician
            </button>
            <a href="tech_availability.php" class="btn btn-primary">
                <i class="fas fa-calendar-check me-1"></i>
                Availability Grid
            </a>
        </div>
    </div>

    <!-- Status Messages -->
    <div id="status-messages"></div>

    <!-- Technicians Table -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">
                <i class="fas fa-list me-2"></i>
                Technicians
            </h5>
        </div>
        <div class="card-body">
            <div id="loading-spinner" class="text-center py-4" style="display: none;">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-2">Loading technicians...</p>
            </div>
            
            <div id="techs-table-container">
                <table class="table table-striped table-hover" id="techs-table">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Specialty</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="techs-tbody">
                        <!-- Technicians will be loaded here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Technician Modal -->
<div class="modal fade" id="techModal" tabindex="-1" aria-labelledby="techModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="techModalLabel">Add Technician</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="tech-form">
                <div class="modal-body">
                    <input type="hidden" id="tech-id" name="id">
                    
                    <div class="mb-3">
                        <label for="tech-name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="tech-name" name="name" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="tech-specialty" class="form-label">Specialty</label>
                        <input type="text" class="form-control" id="tech-specialty" name="specialty" placeholder="e.g., Hair Transplant Specialist">
                    </div>
                    
                    <div class="mb-3">
                        <label for="tech-phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="tech-phone" name="phone" placeholder="e.g., +44 7700 900123">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="tech-submit-btn">Save Technician</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
let isEditing = false;

document.addEventListener('DOMContentLoaded', function() {
    loadTechnicians();
    
    // Technician form submission
    document.getElementById('tech-form').addEventListener('submit', function(e) {
        e.preventDefault();
        saveTechnician();
    });
});

function loadTechnicians() {
    showLoading(true);
    
    fetch('api.php?entity=techs&action=list')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                renderTechsTable(data.techs);
            } else {
                displayMessage('Error loading technicians: ' + (data.error || 'Unknown error'), 'danger');
            }
        })
        .catch(error => {
            console.error('Error loading technicians:', error);
            displayMessage('Failed to load technicians. Please try again.', 'danger');
        })
        .finally(() => {
            showLoading(false);
        });
}

function renderTechsTable(techs) {
    const tbody = document.getElementById('techs-tbody');
    
    if (techs.length === 0) {
        tbody.innerHTML = `
            <tr>
                <td colspan="5" class="text-center text-muted py-4">
                    <i class="fas fa-user-cog fa-2x mb-2"></i><br>
                    No technicians found. <a href="#" onclick="openTechModal()">Add your first technician</a>
                </td>
            </tr>
        `;
        return;
    }
    
    tbody.innerHTML = techs.map(tech => `
        <tr>
            <td>
                <strong>${escapeHtml(tech.name)}</strong>
            </td>
            <td>
                ${tech.specialty ? escapeHtml(tech.specialty) : '<span class="text-muted">Not specified</span>'}
            </td>
            <td>
                ${tech.phone ? escapeHtml(tech.phone) : '<span class="text-muted">Not specified</span>'}
            </td>
            <td>
                <span class="badge ${tech.is_active ? 'bg-success' : 'bg-secondary'}">
                    ${tech.is_active ? 'Active' : 'Archived'}
                </span>
            </td>
            <td>
                <div class="btn-group btn-group-sm" role="group">
                    <button type="button" class="btn btn-outline-primary" onclick="editTechnician(${tech.id})" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    ${tech.is_active ? `
                        <button type="button" class="btn btn-outline-danger" onclick="archiveTechnician(${tech.id}, '${escapeHtml(tech.name)}')" title="Archive">
                            <i class="fas fa-archive"></i>
                        </button>
                    ` : ''}
                </div>
            </td>
        </tr>
    `).join('');
}

function openTechModal(techId = null) {
    isEditing = !!techId;
    const modal = document.getElementById('techModal');
    const modalTitle = document.getElementById('techModalLabel');
    const submitBtn = document.getElementById('tech-submit-btn');
    
    // Reset form
    document.getElementById('tech-form').reset();
    document.getElementById('tech-id').value = '';
    
    if (isEditing) {
        modalTitle.textContent = 'Edit Technician';
        submitBtn.textContent = 'Update Technician';
        loadTechData(techId);
    } else {
        modalTitle.textContent = 'Add Technician';
        submitBtn.textContent = 'Save Technician';
    }
    
    new bootstrap.Modal(modal).show();
}

function loadTechData(techId) {
    fetch(`api.php?entity=techs&action=get&id=${techId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const tech = data.tech;
                document.getElementById('tech-id').value = tech.id;
                document.getElementById('tech-name').value = tech.name;
                document.getElementById('tech-specialty').value = tech.specialty || '';
                document.getElementById('tech-phone').value = tech.phone || '';
            } else {
                displayMessage('Error loading technician data: ' + (data.error || 'Unknown error'), 'danger');
            }
        })
        .catch(error => {
            console.error('Error loading technician data:', error);
            displayMessage('Failed to load technician data.', 'danger');
        });
}

function saveTechnician() {
    const formData = new FormData(document.getElementById('tech-form'));
    formData.append('entity', 'techs');
    formData.append('action', isEditing ? 'update' : 'create');
    
    fetch('api.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            displayMessage(data.message, 'success');
            bootstrap.Modal.getInstance(document.getElementById('techModal')).hide();
            loadTechnicians(); // Reload the table
        } else {
            displayMessage('Error: ' + (data.error || 'Unknown error'), 'danger');
        }
    })
    .catch(error => {
        console.error('Error saving technician:', error);
        displayMessage('Failed to save technician. Please try again.', 'danger');
    });
}

function editTechnician(techId) {
    openTechModal(techId);
}

function archiveTechnician(techId, techName) {
    if (!confirm(`Are you sure you want to archive "${techName}"? This will make them unavailable for new assignments.`)) {
        return;
    }
    
    const formData = new FormData();
    formData.append('entity', 'techs');
    formData.append('action', 'archive');
    formData.append('id', techId);
    
    fetch('api.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            displayMessage(data.message, 'success');
            loadTechnicians(); // Reload the table
        } else {
            displayMessage('Error: ' + (data.error || 'Unknown error'), 'danger');
        }
    })
    .catch(error => {
        console.error('Error archiving technician:', error);
        displayMessage('Failed to archive technician. Please try again.', 'danger');
    });
}

function showLoading(show) {
    const spinner = document.getElementById('loading-spinner');
    const table = document.getElementById('techs-table-container');
    
    if (show) {
        spinner.style.display = 'block';
        table.style.display = 'none';
    } else {
        spinner.style.display = 'none';
        table.style.display = 'block';
    }
}

function displayMessage(message, type) {
    const container = document.getElementById('status-messages');
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;
    
    container.appendChild(alertDiv);
    
    // Auto-remove success messages after 5 seconds
    if (type === 'success') {
        setTimeout(() => {
            if (alertDiv.parentNode) {
                alertDiv.remove();
            }
        }, 5000);
    }
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}
</script>

<?php require_once 'includes/footer.php'; ?>
