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
                    <thead class="table-dark">
                        <tr id="table-header">
                            <th>Technician</th>
                            <!-- Date columns will be added here -->
                        </tr>
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
                    <div class="availability-cell unavailable me-2" style="width: 20px; height: 20px; border: 1px solid #ddd;"></div>
                    <span>Unavailable</span>
                </div>
                <div class="d-flex align-items-center">
                    <div class="availability-cell available-am me-2" style="width: 20px; height: 20px; border: 1px solid #ddd;"></div>
                    <span>Available AM</span>
                </div>
                <div class="d-flex align-items-center">
                    <div class="availability-cell available-pm me-2" style="width: 20px; height: 20px; border: 1px solid #ddd;"></div>
                    <span>Available PM</span>
                </div>
                <div class="d-flex align-items-center">
                    <div class="availability-cell available-full me-2" style="width: 20px; height: 20px; border: 1px solid #ddd;"></div>
                    <span>Available Full Day</span>
                </div>
                <div class="d-flex align-items-center">
                    <div class="availability-cell inactive me-2" style="width: 20px; height: 20px; border: 1px solid #ddd;"></div>
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

<style>
.availability-cell {
    min-height: 80px;
    padding: 4px;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    transition: all 0.2s;
    position: relative;
}

.availability-cell.unavailable {
    background-color: #ffffff;
    border-color: #dee2e6;
}

.availability-cell.unavailable:hover {
    background-color: #f8f9fa;
}

.availability-cell.available-am {
    background: linear-gradient(to bottom, #d4edda 0%, #d4edda 50%, #ffffff 50%, #ffffff 100%);
    border-color: #c3e6cb;
}

.availability-cell.available-pm {
    background: linear-gradient(to bottom, #ffffff 0%, #ffffff 50%, #d4edda 50%, #d4edda 100%);
    border-color: #c3e6cb;
}

.availability-cell.available-full {
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.availability-cell.inactive {
    background-color: #e2e3e5;
    border-color: #d6d8db;
    cursor: not-allowed;
}

.availability-cell:hover:not(.inactive) {
    opacity: 0.8;
    transform: scale(1.02);
}

.period-label {
    font-size: 0.7rem;
    font-weight: bold;
    position: absolute;
    left: 2px;
    color: #495057;
}

.period-label.am {
    top: 2px;
}

.period-label.pm {
    bottom: 2px;
}

.period-label.full {
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

#availability-table th {
    text-align: center;
    vertical-align: middle;
}

.tech-name {
    font-weight: bold;
    background-color: #f8f9fa;
    min-width: 200px;
    cursor: pointer;
}

.tech-name:hover {
    background-color: #e9ecef;
}

.tech-specialty {
    font-size: 0.8rem;
    color: #6c757d;
    font-style: italic;
}
</style>

<script>
class TechAvailability {
    constructor() {
        this.currentWeekStart = this.getWeekStart(new Date());
        this.technicians = [];
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
            // Load technicians
            const techsResponse = await fetch('api.php?entity=techs&action=list');
            const techsData = await techsResponse.json();
            
            if (!techsData.success) {
                throw new Error(techsData.error || 'Failed to load technicians');
            }
            
            this.technicians = techsData.techs;
            
            // Load availability for the week
            const weekEnd = new Date(this.currentWeekStart);
            weekEnd.setDate(weekEnd.getDate() + 6);
            
            const startDate = this.formatDate(this.currentWeekStart);
            const endDate = this.formatDate(weekEnd);
            
            const availResponse = await fetch(`api.php?entity=techAvail&action=byRange&start=${startDate}&end=${endDate}`);
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
        this.updateWeekRange();
        this.renderTable();
    }
    
    renderTable() {
        // Clear existing content
        this.tableHeader.innerHTML = '<th class="tech-name">Technician</th>';
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
        
        // Generate technician rows
        this.technicians.forEach(tech => {
            const row = document.createElement('tr');
            
            // Technician name cell
            const techCell = document.createElement('td');
            techCell.className = 'tech-name';
            techCell.innerHTML = `
                <strong>${this.escapeHtml(tech.name)}</strong>
                ${tech.specialty ? `<br><span class="tech-specialty">${this.escapeHtml(tech.specialty)}</span>` : ''}
            `;
            techCell.addEventListener('dblclick', () => this.editTechnician(tech.id));
            row.appendChild(techCell);
            
            // Date cells
            dates.forEach(date => {
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
        
        if (periods.includes('full')) {
            cell.classList.add('available-full');
            cell.innerHTML = '<span class="period-label full">FULL</span>';
            cell.addEventListener('click', () => this.toggleAvailability(techId, date, 'full'));
        } else {
            const hasAM = periods.includes('am');
            const hasPM = periods.includes('pm');
            
            if (hasAM && hasPM) {
                cell.classList.add('available-full');
                cell.innerHTML = '<span class="period-label full">AM+PM</span>';
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
            cell.addEventListener('click', (e) => {
                const rect = cell.getBoundingClientRect();
                const clickY = e.clientY - rect.top;
                const cellHeight = rect.height;
                const isTopHalf = clickY < cellHeight / 2;
                
                if (isTopHalf) {
                    this.toggleAvailability(techId, date, 'am');
                } else {
                    this.toggleAvailability(techId, date, 'pm');
                }
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
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
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
