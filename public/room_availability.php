<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

// Ensure user is logged in
if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

$page_title = "Room Availability";
require_once 'includes/header.php';
?>

<div class="container-fluid mt-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">
            <i class="fas fa-door-open me-2 text-primary"></i>
            Room Availability
        </h2>
        <div class="btn-group" role="group">
        <?php if (is_admin()): ?>
            <a href="rooms.php" class="btn btn-secondary">
                <i class="fas fa-cog me-1"></i>
                Manage Rooms
            </a>
        <?php endif; ?>

            <a href="calendar.php" class="btn btn-primary">
                <i class="fas fa-calendar me-1"></i>
                Calendar View
            </a>
        </div>
    </div>

    <!-- Date Navigation -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center gap-3">
                        <button type="button" class="btn btn-outline-primary" id="prevWeek">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <h5 class="mb-0" id="weekRange">Loading...</h5>
                        <button type="button" class="btn btn-outline-primary" id="nextWeek">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <button type="button" class="btn btn-primary" id="todayBtn">Today</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Spinner -->
    <div id="loading-spinner" class="text-center py-4" style="display: none;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <p class="mt-2">Loading room availability...</p>
    </div>

    <!-- Availability Grid -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">
                <i class="fas fa-table me-2"></i>
                Room Availability Grid
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="availability-table">
                    <thead class="table-dark">
                        <tr id="table-header">
                            <th>Room</th>
                            <!-- Date columns will be added here -->
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <!-- Room rows will be added here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Legend -->
    <div class="card mt-4">
        <div class="card-body">
            <h6>Legend:</h6>
            <div class="d-flex gap-4">
                <div class="d-flex align-items-center">
                    <div class="availability-cell available me-2" style="width: 20px; height: 20px; border: 1px solid #ddd;"></div>
                    <span>Available</span>
                </div>
                <div class="d-flex align-items-center">
                    <div class="availability-cell booked me-2" style="width: 20px; height: 20px; border: 1px solid #ddd;"></div>
                    <span>Booked</span>
                </div>
                <div class="d-flex align-items-center">
                    <div class="availability-cell inactive me-2" style="width: 20px; height: 20px; border: 1px solid #ddd;"></div>
                    <span>Room Inactive</span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.availability-cell {
    min-height: 60px;
    padding: 8px;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    transition: all 0.2s;
}

.availability-cell.available {
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.availability-cell.available:hover {
    background-color: #c3e6cb;
}

.availability-cell.booked {
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

.availability-cell.booked.completed {
    background-color: #d1ecf1;
    border-color: #bee5eb;
    cursor: not-allowed;
}

.availability-cell.inactive {
    background-color: #e2e3e5;
    border-color: #d6d8db;
    cursor: not-allowed;
}

.patient-info {
    font-size: 0.85rem;
    font-weight: bold;
    color: #721c24;
}

.graft-info {
    font-size: 0.75rem;
    color: #856404;
}

.status-info {
    font-size: 0.7rem;
    color: #0c5460;
    font-weight: bold;
    text-transform: uppercase;
}

.agency-info {
    font-size: 0.7rem;
    color: #6c757d;
    font-style: italic;
}

#availability-table th {
    text-align: center;
    vertical-align: middle;
}

.room-name {
    font-weight: bold;
    background-color: #f8f9fa;
    min-width: 150px;
}
</style>

<script>
class RoomAvailability {
    constructor() {
        this.currentWeekStart = this.getWeekStart(new Date());
        this.rooms = [];
        this.availability = {};

        this.initializeElements();
        this.bindEvents();
        this.loadData();
    }

    initializeElements() {
        this.weekRangeEl = document.getElementById('weekRange');
        this.prevWeekBtn = document.getElementById('prevWeek');
        this.nextWeekBtn = document.getElementById('nextWeek');
        this.todayBtn = document.getElementById('todayBtn');
        this.loadingSpinner = document.getElementById('loading-spinner');
        this.tableHeader = document.getElementById('table-header');
        this.tableBody = document.getElementById('table-body');
    }

    bindEvents() {
        this.prevWeekBtn.addEventListener('click', () => this.navigateWeek(-1));
        this.nextWeekBtn.addEventListener('click', () => this.navigateWeek(1));
        this.todayBtn.addEventListener('click', () => this.goToToday());
    }

    getWeekStart(date) {
        const d = new Date(date);
        const day = d.getDay();
        const diff = d.getDate() - day; // Adjust to start on Sunday
        return new Date(d.setDate(diff));
    }

    formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    navigateWeek(direction) {
        this.currentWeekStart.setDate(this.currentWeekStart.getDate() + (direction * 7));
        this.loadData();
    }

    goToToday() {
        this.currentWeekStart = this.getWeekStart(new Date());
        this.loadData();
    }

    updateWeekRange() {
        const weekEnd = new Date(this.currentWeekStart);
        weekEnd.setDate(weekEnd.getDate() + 6);

        const options = { month: 'short', day: 'numeric', year: 'numeric' };
        const startStr = this.currentWeekStart.toLocaleDateString('en-US', options);
        const endStr = weekEnd.toLocaleDateString('en-US', options);

        this.weekRangeEl.textContent = `${startStr} - ${endStr}`;
    }

    async loadData() {
        this.showLoading(true);

        try {
            // Load rooms
            const roomsResponse = await fetch('api.php?entity=rooms&action=list');
            const roomsData = await roomsResponse.json();

            if (!roomsData.success) {
                throw new Error(roomsData.error || 'Failed to load rooms');
            }

            this.rooms = roomsData.rooms;

            // Load availability for the week
            const weekEnd = new Date(this.currentWeekStart);
            weekEnd.setDate(weekEnd.getDate() + 6);

            const startDate = this.formatDate(this.currentWeekStart);
            const endDate = this.formatDate(weekEnd);

            const availResponse = await fetch(`api.php?entity=availability&action=range&start=${startDate}&end=${endDate}`);
            const availData = await availResponse.json();

            if (!availData.success) {
                throw new Error(availData.error || 'Failed to load availability');
            }

            this.availability = availData.availability || {};

            this.render();

        } catch (error) {
            console.error('Error loading data:', error);
            this.showError('Failed to load room availability data');
        } finally {
            this.showLoading(false);
        }
    }

    render() {
        this.updateWeekRange();
        this.renderTable();
    }

    renderTable() {
        // Clear existing content
        this.tableHeader.innerHTML = '<th class="room-name">Room</th>';
        this.tableBody.innerHTML = '';

        // Generate date headers
        const dates = [];
        for (let i = 0; i < 7; i++) {
            const date = new Date(this.currentWeekStart);
            date.setDate(date.getDate() + i);
            dates.push(date);

            const dayName = date.toLocaleDateString('en-US', { weekday: 'short' });
            const dayNum = date.getDate();
            const monthName = date.toLocaleDateString('en-US', { month: 'short' });

            const th = document.createElement('th');
            th.innerHTML = `${dayName}<br>${monthName} ${dayNum}`;
            th.style.minWidth = '120px';
            this.tableHeader.appendChild(th);
        }

        // Generate room rows
        this.rooms.forEach(room => {
            const row = document.createElement('tr');

            // Room name cell
            const roomCell = document.createElement('td');
            roomCell.className = 'room-name';
            roomCell.innerHTML = `
                <strong>${this.escapeHtml(room.name)}</strong>
                ${room.capacity ? `<br><small>(${room.capacity} people)</small>` : ''}
            `;
            row.appendChild(roomCell);

            // Date cells
            dates.forEach(date => {
                const dateStr = this.formatDate(date);
                const cell = document.createElement('td');
                cell.className = 'availability-cell';

                if (!room.is_active) {
                    cell.classList.add('inactive');
                    cell.innerHTML = '<small>Inactive</small>';
                } else {
                    const dayAvailability = this.availability[dateStr] || [];
                    const roomBooking = dayAvailability.find(a => a.room_id == room.id);

                    if (roomBooking) {
                        const isCompleted = roomBooking.status && roomBooking.status.toLowerCase() === 'completed';
                        cell.classList.add('booked');
                        if (isCompleted) {
                            cell.classList.add('completed');
                        }
                        cell.innerHTML = `
                            <div class="patient-info">${this.escapeHtml(roomBooking.patient_name || 'Unknown')}</div>
                            ${roomBooking.graft_count ? `<div class="graft-info">${roomBooking.graft_count} grafts</div>` : ''}
                            ${isCompleted ? '<div class="status-info">Completed</div>' : ''}
                        `;
                        cell.title = `Booked: ${roomBooking.patient_name}${isCompleted ? ' (Completed)' : ''}`;

                        // Only allow editing if not completed
                        if (!isCompleted) {
                            cell.addEventListener('click', () => this.handleCellClick(room.id, dateStr, roomBooking.surgery_id));
                        }
                    } else {
                        cell.classList.add('available');
                        cell.innerHTML = '<small>Available</small>';
                        cell.title = 'Available for booking';
                        cell.addEventListener('click', () => this.handleCellClick(room.id, dateStr));
                    }
                }

                row.appendChild(cell);
            });

            this.tableBody.appendChild(row);
        });
    }

    handleCellClick(roomId, date, surgeryId = null) {
        // Redirect to surgery form with pre-filled room and date, or edit existing surgery
        if (surgeryId) {
            window.location.href = `add_edit_surgery.php?id=${surgeryId}`;
        } else {
            window.location.href = `add_edit_surgery.php?room_id=${roomId}&date=${date}`;
        }
    }

    showLoading(show) {
        this.loadingSpinner.style.display = show ? 'block' : 'none';
    }

    showError(message) {
        // Simple error display - you can enhance this
        alert(message);
    }

    escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    new RoomAvailability();
});
</script>

<?php require_once 'includes/footer.php'; ?>
