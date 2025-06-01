<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

// Ensure user is logged in
if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

$page_title = "Technician Availability";
require_once 'includes/header.php';
?>
<link rel="stylesheet" href="assets/css/tech.css">

<div class="container-fluid mt-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">
            <i class="fas fa-user-clock me-2 text-primary"></i>
            Technician Availability
        </h2>
        <div class="btn-group" role="group">
            <a href="technicians.php" class="btn btn-secondary">
                <i class="fas fa-user-cog me-1"></i>
                Manage Technicians
            </a>
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
                        <button type="button" class="btn btn-outline-primary" id="prevMonth">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <h5 class="mb-0" id="monthRange">Loading...</h5>
                        <button type="button" class="btn btn-outline-primary" id="nextMonth">
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
        <p class="mt-2">Loading technician availability...</p>
    </div>

    <!-- Availability Grid -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">
                <i class="fas fa-table me-2"></i>
                Technician Availability Grid
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="availability-table">
                    <thead id="table-header" class="table-dark">
                        <th class="tech-name date-col">Date</th>
                        <!-- Date columns will be added here -->
                    </thead>
                    <tbody id="table-body">
                        <!-- Technician rows will be added here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Legend -->
    <div class="card mt-4">
        <div class="card-body">
            <h6>Legend:</h6>
            <div class="d-flex gap-4 flex-wrap">
                <div class="d-flex align-items-center">
                    <div class="availability-cell unavailable me-2"
                        style="width: 20px; height: 20px; border: 1px solid #ddd;"></div>
                    <span>Unavailable</span>
                </div>
                <div class="d-flex align-items-center">
                    <div class="availability-cell available-am me-2"
                        style="width: 20px; height: 20px; border: 1px solid #ddd;"></div>
                    <span>Available AM</span>
                </div>
                <div class="d-flex align-items-center">
                    <div class="availability-cell available-pm me-2"
                        style="width: 20px; height: 20px; border: 1px solid #ddd;"></div>
                    <span>Available PM</span>
                </div>
                <div class="d-flex align-items-center">
                    <div class="availability-cell available-full me-2"
                        style="width: 20px; height: 20px; border: 1px solid #ddd;"></div>
                    <span>Available Full Day</span>
                </div>
                <div class="d-flex align-items-center">
                    <div class="availability-cell inactive me-2"
                        style="width: 20px; height: 20px; border: 1px solid #ddd;"></div>
                    <span>Technician Inactive</span>
                </div>
            </div>
            <div class="mt-2">
                <small class="text-muted">
                    <i class="fas fa-info-circle me-1"></i>
                    Click on cells to toggle availability. Double-click technician name to edit.
                </small>
            </div>
        </div>
    </div>
</div>


<script>
class TechAvailability {
    constructor() {
        this.currentMonthStart = this.getMonthStart(new Date());
        this.technicians = [];
        this.availability = {};

        this.initializeElements();
        this.bindEvents();
        this.loadData();
    }

    initializeElements() {
        this.monthRangeEl = document.getElementById('monthRange');
        this.prevMonthBtn = document.getElementById('prevMonth');
        this.nextMonthBtn = document.getElementById('nextMonth');
        this.todayBtn = document.getElementById('todayBtn');
        this.loadingSpinner = document.getElementById('loading-spinner');
        this.tableHeader = document.getElementById('table-header');
        this.tableBody = document.getElementById('table-body');
    }

    bindEvents() {
        this.prevMonthBtn.addEventListener('click', () => this.navigateMonth(-1));
        this.nextMonthBtn.addEventListener('click', () => this.navigateMonth(1));
        this.todayBtn.addEventListener('click', () => this.goToToday());
    }

    getMonthStart(date) {
        const d = new Date(date);
        return new Date(d.getFullYear(), d.getMonth(), 1);
    }

    getMonthEnd(date) {
        const d = new Date(date);
        return new Date(d.getFullYear(), d.getMonth() + 1, 0);
    }

    formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    navigateMonth(direction) {
        this.currentMonthStart.setMonth(this.currentMonthStart.getMonth() + direction);
        this.loadData();
    }

    goToToday() {
        this.currentMonthStart = this.getMonthStart(new Date());
        this.loadData();
    }

    updateMonthRange() {
        const options = {
            year: 'numeric',
            month: 'long'
        };
        this.monthRangeEl.textContent = this.currentMonthStart.toLocaleDateString('en-US', options);
    }

    async loadData() {
        this.showLoading(true);

        try {
            // Load technicians
            const techsResponse = await fetch('api.php?entity=techs&action=list');
            const techsData = await techsResponse.json();

            if (!techsData.success) {
                throw new Error(techsData.error || 'Failed to load technicians');
            }

            this.technicians = techsData.technicians;

            // Load availability for the month
            const startDate = this.formatDate(this.currentMonthStart);
            const endDate = this.formatDate(this.getMonthEnd(this.currentMonthStart));

            const availResponse = await fetch(
                `api.php?entity=techAvail&action=byRange&start=${startDate}&end=${endDate}`);
            const availData = await availResponse.json();

            if (!availData.success) {
                throw new Error(availData.error || 'Failed to load availability');
            }

            // Process availability data
            this.availability = {};
            availData.availability.forEach(avail => {
                const key = `${avail.tech_id}-${avail.date}`;
                if (!this.availability[key]) {
                    this.availability[key] = [];
                }
                this.availability[key].push(avail.period);
            });

            this.render();

        } catch (error) {
            console.error('Error loading data:', error);
            this.showError('Failed to load technician availability data');
        } finally {
            this.showLoading(false);
        }
    }

    render() {
        this.updateMonthRange();
        this.renderTable();
    }

    renderTable() {
        // Clear existing content
        this.tableHeader.innerHTML = '';
        this.tableBody.innerHTML = '';

        // Generate header row with dates
        const headerRow = document.createElement('tr');
        const dateHeader = document.createElement('th');
        dateHeader.className = 'tech-name date-col';
        dateHeader.textContent = 'Date';
        headerRow.appendChild(dateHeader);

        // Add technician names to header
        this.technicians.forEach(tech => {
            const techHeader = document.createElement('th');
            techHeader.className = 'tech-name'; // Keep tech-name class for styling
            techHeader.innerHTML = `
                <strong>${this.escapeHtml(tech.name)}</strong>
                ${tech.specialty ? `<br><span class="tech-specialty">${this.escapeHtml(tech.specialty)}</span>` : ''}
            `;
            techHeader.style.minWidth = '120px'; // Adjust width for technician columns
            techHeader.addEventListener('dblclick', () => this.editTechnician(tech.id));
            headerRow.appendChild(techHeader);
        });
        this.tableHeader.appendChild(headerRow);


        // Generate rows for each day of the month
        const monthStart = new Date(this.currentMonthStart);
        const monthEnd = this.getMonthEnd(this.currentMonthStart);
        const dates = [];
        let currentDate = new Date(monthStart);

        while (currentDate <= monthEnd) {
            dates.push(new Date(currentDate));
            currentDate.setDate(currentDate.getDate() + 1);
        }

        dates.forEach(date => {
            const row = document.createElement('tr');

            // Date cell
            const dateCell = document.createElement('td');
            const dayName = date.toLocaleDateString('en-US', {
                weekday: 'long'
            });
            const dayNum = date.getDate();
            const monthName = date.toLocaleDateString('en-US', {
                month: 'short'
            });
            dateCell.innerHTML = `<strong>${dayName}</strong><br>${monthName} ${dayNum}`;
            row.appendChild(dateCell);

            // Availability cells for each technician
            this.technicians.forEach(tech => {
                const dateStr = this.formatDate(date);
                const cell = document.createElement('td');
                cell.className = 'availability-cell';

                if (!tech.is_active) {
                    cell.classList.add('inactive');
                    cell.innerHTML = '<small>Inactive</small>';
                } else {
                    const availKey = `${tech.id}-${dateStr}`;
                    const periods = this.availability[availKey] || [];

                    this.setCellAvailability(cell, periods, tech.id, dateStr);
                }

                row.appendChild(cell);
            });

            this.tableBody.appendChild(row);
        });
    }

    setCellAvailability(cell, periods, techId, date) {
        cell.innerHTML = '';
        cell.className = 'availability-cell'; // Reset classes

        const hasAM = periods.includes('am');
        const hasPM = periods.includes('pm');
        const hasFull = periods.includes('full');

        if (hasFull || (hasAM && hasPM)) {
            cell.classList.add('available-full');
            cell.innerHTML = '<span class="period-label full">FULL</span>';
        } else if (hasAM) {
            cell.classList.add('available-am');
            cell.innerHTML = '<span class="period-label am">AM</span>';
        } else if (hasPM) {
            cell.classList.add('available-pm');
            cell.innerHTML = '<span class="period-label pm">PM</span>';
        } else {
            cell.classList.add('unavailable');
        }

        // Add click handlers for AM/PM sections
        if (!cell.classList.contains('inactive')) {
            cell.addEventListener('click', async () => {
                const currentPeriods = this.availability[`${techId}-${date}`] || [];

                if (currentPeriods.length === 0) {
                    // Unavailable -> Available AM
                    await this.toggleAvailability(techId, date, 'am');
                } else if (currentPeriods.includes('am') && !currentPeriods.includes('pm') && !
                    currentPeriods.includes('full')) {
                    // Available AM -> Available PM
                    await this.toggleAvailability(techId, date, 'am'); // Unset AM
                    await this.toggleAvailability(techId, date, 'pm'); // Set PM
                } else if (currentPeriods.includes('pm') && !currentPeriods.includes('am') && !
                    currentPeriods.includes('full')) {
                    // Available PM -> Available Full
                    await this.toggleAvailability(techId, date, 'pm'); // Unset PM
                    await this.toggleAvailability(techId, date, 'full'); // Set Full
                } else if (currentPeriods.includes('full') || (currentPeriods.includes('am') &&
                        currentPeriods.includes('pm'))) {
                    // Available Full -> Unavailable
                    await this.toggleAvailability(techId, date,
                        'full'); // Unset Full (assuming this removes AM/PM too)
                }
                // Note: If the state is something unexpected (e.g., only 'full' but not 'am'/'pm' in the array, or other combinations),
                // the logic might need refinement based on how the API actually stores/handles periods.
                // For now, assuming 'full' in the array means full availability.
            });
        }
    }
    async toggleAvailability(techId, date, period) {
        try {
            const availKey = `${techId}-${date}`;
            const currentPeriods = this.availability[availKey] || [];

            if (currentPeriods.includes(period)) {
                // Remove availability
                const availId = await this.findAvailabilityId(techId, date, period);
                if (availId) {
                    const response = await fetch('api.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: `entity=techAvail&action=unset&id=${availId}`
                    });

                    const result = await response.json();
                    if (result.success) {
                        this.loadData(); // Reload to refresh display
                    } else {
                        this.showError(result.error || 'Failed to remove availability');
                    }
                }
            } else {
                // Add availability
                const formData = new FormData();
                formData.append('entity', 'techAvail');
                formData.append('action', 'set');
                formData.append('tech_id', techId);
                formData.append('date', date);
                formData.append('period', period);

                const response = await fetch('api.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();
                if (result.success) {
                    this.loadData(); // Reload to refresh display
                } else {
                    this.showError(result.error || 'Failed to set availability');
                }
            }
        } catch (error) {
            console.error('Error toggling availability:', error);
            this.showError('Failed to update availability');
        }
    }

    async findAvailabilityId(techId, date, period) {
        try {
            const response = await fetch(`api.php?entity=techAvail&action=list&tech_id=${techId}&date=${date}`);
            const result = await response.json();

            if (result.success) {
                const avail = result.availability.find(a => a.period === period);
                return avail ? avail.id : null;
            }
        } catch (error) {
            console.error('Error finding availability ID:', error);
        }
        return null;
    }

    editTechnician(techId) {
        // Redirect to technician management page with edit mode
        window.location.href = `technicians.php#edit-${techId}`;
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
    new TechAvailability();
});
</script>

<?php require_once 'includes/footer.php'; ?>