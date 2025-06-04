<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

// Ensure user is logged in
if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

$page_title = "Room Management";
require_once 'includes/header.php';
?>

<div class="container-fluid mt-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">
            <i class="fas fa-door-open me-2 text-primary"></i>
            Room Management
        </h2>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#roomModal"
                onclick="openRoomModal()">
                <i class="fas fa-plus me-1"></i>
                Add Room
            </button>
            <a href="room_availability.php" class="btn btn-primary">
                <i class="fas fa-calendar me-1"></i>
                View Calendar
            </a>
        </div>
    </div>

    <!-- Status Messages -->
    <div id="status-messages"></div>

    <!-- Rooms Table -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">
                <i class="fas fa-list me-2"></i>
                Rooms
            </h5>
        </div>
        <div class="card-body">
            <div id="loading-spinner" class="text-center py-4" style="display: none;">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-2">Loading rooms...</p>
            </div>

            <div id="rooms-table-container">
                <table class="table table-striped table-hover" id="rooms-table">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="rooms-tbody">
                        <!-- Rooms will be loaded here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Room Modal -->
<div class="modal fade" id="roomModal" tabindex="-1" aria-labelledby="roomModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roomModalLabel">Add Room</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="room-form">
                <div class="modal-body">
                    <input type="hidden" id="room-id" name="id">

                    <div class="mb-3">
                        <label for="room-name" class="form-label">Room Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="room-name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="room-types" class="form-label">Status</label>
                        <select class="form-select" id="room-type" name="type">
                            <option value="">Select Type</option>
                            <option value="surgery">Surgery</option>
                            <option value="consultation">Consultation</option>
                            <option value="treatment">Treatment</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="room-submit-btn">Save Room</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
let isEditing = false;

document.addEventListener('DOMContentLoaded', function() {
    loadRooms();

    // Room form submission
    document.getElementById('room-form').addEventListener('submit', function(e) {
        e.preventDefault();
        saveRoom();
    });
});

function loadRooms() {
    showLoading(true);

    apiRequest('rooms', 'list')
        .then(data => {
            if (data.success) {
                renderRoomsTable(data.rooms);
            } else {
                displayMessage('Error loading rooms: ' + (data.error || 'Unknown error'), 'danger');
            }
        })
        .catch(error => {
            console.error('Error loading rooms:', error);
            displayMessage('Failed to load rooms. Please try again.', 'danger');
        })
        .finally(() => {
            showLoading(false);
        });
}

function renderRoomsTable(rooms) {
    const tbody = document.getElementById('rooms-tbody');

    if (rooms.length === 0) {
        tbody.innerHTML = `
            <tr>
                <td colspan="5" class="text-center text-muted py-4">
                    <i class="fas fa-door-open fa-2x mb-2"></i><br>
                    No rooms found. <a href="#" onclick="openRoomModal()">Add your first room</a>
                </td>
            </tr>
        `;
        return;
    }

    tbody.innerHTML = rooms.map(room => `
        <tr>
            <td>
                <strong>${escapeHtml(room.name)}</strong>
            </td>
            <td>
                ${room.types ? escapeHtml(room.types) : '<span class="text-muted">No types</span>'}
            </td>
            <td>
                <span class="badge ${room.is_active ? 'bg-success' : 'bg-secondary'}">
                    ${room.is_active ? 'Active' : 'Inactive'}
                </span>
            </td>
            <td>
                <div class="btn-group btn-group-sm" role="group">
                    <button type="button" class="btn btn-outline-primary" onclick="editRoom(${room.id})" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    ${room.is_active ? `
                        <button type="button" class="btn btn-outline-danger" onclick="toggleRoomStatus(${room.id}, '${escapeHtml(room.name)}',0)" title="deactivate">
                            <i class="fas fa-archive"></i>
                        </button>
                    ` : `
                        <button type="button" class="btn btn-outline-info" onclick="toggleRoomStatus(${room.id}, '${escapeHtml(room.name)}',1)" title="activate">
                            <i class="fas fa-hand-paper"></i>
                        </button>
                    `}
                     <button type="button" class="btn btn-outline-danger" onclick="deleteRoom(${room.id}, '${escapeHtml(room.name)}')" title="activate">
                            <i class="fas fa-trash"></i>
                        </button>
                </div>
            </td>
        </tr>
    `).join('');
}

function openRoomModal(roomId = null) {
    isEditing = !!roomId;
    const modal = document.getElementById('roomModal');
    const modalTitle = document.getElementById('roomModalLabel');
    const submitBtn = document.getElementById('room-submit-btn');

    // Reset form
    const form = document.getElementById('room-form');
    form.reset();
    form.classList.remove('was-validated');
    document.getElementById('room-id').value = '';

    if (isEditing) {
        modalTitle.textContent = 'Edit Room';
        submitBtn.textContent = 'Update Room';
        loadRoomData(roomId);
    } else {
        modalTitle.textContent = 'Add Room';
        submitBtn.textContent = 'Save Room';
    }

    new bootstrap.Modal(modal).show();
}

function loadRoomData(roomId) {
    apiRequest('rooms', 'get', { id: roomId })
        .then(data => {
            if (data.success) {
                const room = data.room;
                document.getElementById('room-id').value = room.id;
                document.getElementById('room-name').value = room.name;
                document.getElementById('room-types').value = room.types || '';
            } else {
                displayMessage('Error loading room data: ' + (data.error || 'Unknown error'), 'danger');
            }
        })
        .catch(error => {
            console.error('Error loading room data:', error);
            displayMessage('Failed to load room data.', 'danger');
        });
}

function saveRoom() {
    const form = document.getElementById('room-form');

    // Add Bootstrap validation classes
    form.classList.add('was-validated');

    // Check form validity
    if (!form.checkValidity()) {
        displayMessage('Please fill in all required fields correctly.', 'danger');
        return;
    }

    const formData = new FormData(form);
    formData.append('entity', 'rooms');
    formData.append('action', isEditing ? 'update' : 'create');

    fetch('api.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                displayMessage(data.message, 'success');
                bootstrap.Modal.getInstance(document.getElementById('roomModal')).hide();
                loadRooms(); // Reload the table
            } else {
                displayMessage('Error: ' + (data.error || 'Unknown error'), 'danger');
            }
        })
        .catch(error => {
            console.error('Error saving room:', error);
            displayMessage('Failed to save room. Please try again.', 'danger');
        });
}

function editRoom(roomId) {
    openRoomModal(roomId);
}

function deleteRoom(roomId, roomName) {
    if (!confirm(`Are you sure you want to archive "${roomName}"? This will make it unavailable for new bookings.`)) {
        return;
    }

    const formData = new FormData();
    formData.append('entity', 'rooms');
    formData.append('action', 'delete');
    formData.append('id', roomId);

    fetch('api.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                displayMessage(data.message, 'success');
                loadRooms(); // Reload the table
            } else {
                displayMessage('Error: ' + (data.error || 'Unknown error'), 'danger');
            }
        })
        .catch(error => {
            console.error('Error archiving room:', error);
            displayMessage('Failed to archive room. Please try again.', 'danger');
        });
}

function toggleRoomStatus(roomId, roomName, status) {
    if (!confirm(`Are you sure you want to archive "${roomName}"? This will make it unavailable for new bookings.`)) {
        return;
    }

    const formData = new FormData();
    formData.append('entity', 'rooms');
    formData.append('action', 'toggle');
    formData.append('id', roomId);
    formData.append('status', status);

    fetch('api.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                displayMessage(data.message, 'success');
                loadRooms(); // Reload the table
            } else {
                displayMessage('Error: ' + (data.error || 'Unknown error'), 'danger');
            }
        })
        .catch(error => {
            console.error('Error archiving room:', error);
            displayMessage('Failed to archive room. Please try again.', 'danger');
        });
}

function showLoading(show) {
    const spinner = document.getElementById('loading-spinner');
    const table = document.getElementById('rooms-table-container');

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