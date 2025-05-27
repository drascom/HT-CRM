<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

$page_title = "Calendar";
require_once 'includes/header.php';
?>

<style>
/* Custom Calendar Styles */
.calendar-container {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.calendar-header {
    background: linear-gradient(135deg, #0d6efd 0%, #0056b3 100%);
    color: white;
    padding: 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.calendar-nav {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.calendar-nav button {
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white;
    padding: 0.5rem 0.75rem;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.2s;
}

.calendar-nav button:hover {
    background: rgba(255, 255, 255, 0.3);
}

.calendar-title {
    font-size: 1.5rem;
    font-weight: 600;
    margin: 0;
}

.view-toggle {
    display: flex;
    gap: 0.25rem;
}

.view-toggle button {
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white;
    padding: 0.5rem 0.75rem;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.2s;
    font-size: 0.875rem;
}

.view-toggle button.active {
    background: white;
    color: #0d6efd;
}

.view-toggle button:hover:not(.active) {
    background: rgba(255, 255, 255, 0.3);
}

/* Calendar Grid */
.calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 1px;
    background: #e9ecef;
}

.calendar-day-header {
    background: #f0f0f0;
    padding: 0.75rem 0.5rem;
    text-align: center;
    font-weight: 600;
    color: #495057;
    font-size: 0.875rem;
}

.calendar-day {
    background: white;
    min-height: 120px;
    padding: 0.5rem;
    position: relative;
    border: 1px solid transparent;
    transition: all 0.2s;
}

.calendar-day:hover {
    background: #f8f9fa;
    border-color: #dee2e6;
}

.calendar-day.other-month {
    background: #f8f9fa;
    color: #6c757d;
}

.calendar-day.today {
    background: #e3f2fd;
    border-color: #2196f3;
}

.day-number {
    font-weight: 600;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
}

.day-events {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.event-item {
    display: flex;
    flex-direction: column;
    /* Stack children vertically */
    color: #212529;
    /* Change text color to dark for better contrast with badge */
    background: #e9ecef;
    /* Add a light background to the event item */
    padding: 2px 0;
    /* Remove horizontal padding from the item itself */
    border-radius: 3px;
    font-size: 0.75rem;
    text-decoration: none;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    transition: all 0.2s;
}

.event-item>div {
    /* Target direct child divs (event-header and graft-count) */
    padding-left: 6px;
    /* Add left padding to the content inside */
    padding-right: 6px;
    /* Add right padding to the content inside */
}

.event-item:hover {
    background: #dee2e6;
    /* Lighter hover background */
    color: #212529;
    text-decoration: none;
}

.event-item.status-completed,
.event-item.status-canceled,
.event-item.status-booked {
    background: none;
}

/* List View */
.list-view {
    display: none;
}

.list-view.active {
    display: block;
}

.calendar-view {
    display: block;
}

.calendar-view.active {
    display: block;
}

.list-item {
    border-bottom: 1px solid #e9ecef;
    padding: 1rem;
    transition: background-color 0.2s;
}

.list-item:hover {
    background: #f8f9fa;
}

.list-item:last-child {
    border-bottom: none;
}

.list-date {
    background: #e9ecef;
    padding: 0.75rem 1rem;
    font-weight: 600;
    color: #495057;
    border-bottom: 1px solid #dee2e6;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.list-time {
    font-size: 0.875rem;
    color: #6c757d;
    margin-bottom: 0.25rem;
}

.list-patient {
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.list-details {
    font-size: 0.875rem;
    color: #6c757d;
}

.status-badge {
    padding: 0;
    border-radius: 3px;
    font-size: 0.75rem;
    font-weight: 500;
    width: 10px;
    height: 10px;
    display: inline-block;
    flex-shrink: 0;
    margin-right: 5px;
    /* Add margin to the right to separate from text */
}

/* Use the background colors from the old .event-item.status-* rules */
.status-badge.booked {
    background: #0d6efd;
    /* Blue */
}

.status-badge.completed {
    background: #198754;
    /* Green */
}

.status-badge.canceled {
    background: #dc3545;
    /* Red */
}

/* Loading Spinner */
.loading-spinner {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 3rem;
}

.spinner {
    width: 40px;
    height: 40px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #0d6efd;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .calendar-header {
        flex-direction: column;
        text-align: center;
        gap: 0.75rem;
    }

    .calendar-nav {
        order: 2;
    }

    .calendar-title {
        order: 1;
        font-size: 1.25rem;
    }

    .view-toggle {
        order: 3;
    }

    .calendar-day {
        min-height: 80px;
        padding: 0.25rem;
    }

    .day-number {
        font-size: 0.75rem;
    }

    .event-item {
        font-size: 0.625rem;
        padding: 1px 4px;
    }

    .calendar-day-header {
        padding: 0.5rem 0.25rem;
        font-size: 0.75rem;
    }
}

@media (max-width: 576px) {
    .calendar-grid {
        font-size: 0.75rem;
    }

    .calendar-day {
        min-height: 60px;
    }

    .view-toggle button {
        padding: 0.375rem 0.5rem;
        font-size: 0.75rem;
    }

    .calendar-nav button {
        padding: 0.375rem 0.5rem;
        font-size: 0.875rem;
    }
}
</style>

<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">
        <i class="fas fa-calendar me-2 text-primary"></i>
        Surgery Calendar
    </h2>
    <div class="btn-group" role="group">
        <a href="add_edit_surgery.php" class="btn btn-success btn-sm">
            <i class="fas fa-plus me-1"></i>
            <span class="d-none d-sm-inline">Add Surgery</span>
        </a>
    </div>
</div>

<!-- Calendar Container -->
<div class="calendar-container">
    <!-- Calendar Header -->
    <div class="calendar-header">
        <div class="calendar-nav">
            <button type="button" id="prevMonth">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button type="button" id="nextMonth">
                <i class="fas fa-chevron-right"></i>
            </button>
            <button type="button" id="todayBtn">Today</button>
        </div>

        <h3 class="calendar-title" id="calendarTitle">May 2025</h3>

        <div class="view-toggle">
            <button type="button" id="monthViewBtn" class="active">Month</button>
            <button type="button" id="listMonthBtn">List Month</button>
            <button type="button" id="listWeekBtn">List Week</button>
            <button type="button" id="listDayBtn">List Day</button>
        </div>
    </div>

    <!-- Loading Spinner -->
    <div id="loadingSpinner" class="loading-spinner">
        <div class="spinner"></div>
    </div>

    <!-- Calendar Grid View -->
    <div id="calendarView" class="calendar-view">
        <!-- Day Headers -->
        <div class="calendar-grid" id="calendarGrid">
            <div class="calendar-day-header">Sun</div>
            <div class="calendar-day-header">Mon</div>
            <div class="calendar-day-header">Tue</div>
            <div class="calendar-day-header">Wed</div>
            <div class="calendar-day-header">Thu</div>
            <div class="calendar-day-header">Fri</div>
            <div class="calendar-day-header">Sat</div>
        </div>
    </div>

    <!-- List View -->
    <div id="listView" class="list-view">
        <div id="listContent"></div>
    </div>
</div>

<script>
class CustomCalendar {
    constructor() {
        this.currentDate = new Date();
        this.currentView = 'month';
        this.surgeries = [];
        this.isLoading = false;

        this.initializeElements();
        this.bindEvents();
        this.loadSurgeries();
    }

    initializeElements() {
        this.calendarTitle = document.getElementById('calendarTitle');
        this.calendarGrid = document.getElementById('calendarGrid');
        this.calendarView = document.getElementById('calendarView');
        this.listView = document.getElementById('listView');
        this.listContent = document.getElementById('listContent');
        this.loadingSpinner = document.getElementById('loadingSpinner');

        // Navigation buttons
        this.prevBtn = document.getElementById('prevMonth');
        this.nextBtn = document.getElementById('nextMonth');
        this.todayBtn = document.getElementById('todayBtn');

        // View toggle buttons
        this.monthViewBtn = document.getElementById('monthViewBtn');
        this.listMonthBtn = document.getElementById('listMonthBtn');
        this.listWeekBtn = document.getElementById('listWeekBtn');
        this.listDayBtn = document.getElementById('listDayBtn');
    }

    bindEvents() {
        this.prevBtn.addEventListener('click', () => this.navigateMonth(-1));
        this.nextBtn.addEventListener('click', () => this.navigateMonth(1));
        this.todayBtn.addEventListener('click', () => this.goToToday());

        this.monthViewBtn.addEventListener('click', () => this.setView('month'));
        this.listMonthBtn.addEventListener('click', () => this.setView('listMonth'));
        this.listWeekBtn.addEventListener('click', () => this.setView('listWeek'));
        this.listDayBtn.addEventListener('click', () => this.setView('listDay'));

        // Auto-switch to list view on mobile
        this.handleResize();
        window.addEventListener('resize', () => this.handleResize());
    }

    handleResize() {
        if (window.innerWidth < 768 && this.currentView === 'month') {
            this.setView('listWeek');
        }
    }

    async loadSurgeries() {
        if (this.isLoading) return;

        this.isLoading = true;
        this.showLoading(true);

        try {
            const response = await fetch('api.php?entity=surgeries&action=list');
            const data = await response.json();

            if (data.success) {
                this.surgeries = data.surgeries || [];
                this.render();
            } else {
                console.error('Error fetching surgeries:', data.error);
                this.showError('Failed to load surgeries');
            }
        } catch (error) {
            console.error('Error fetching surgeries:', error);
            this.showError('Failed to load surgeries');
        } finally {
            this.isLoading = false;
            this.showLoading(false);
        }
    }

    showLoading(show) {
        this.loadingSpinner.style.display = show ? 'flex' : 'none';
    }

    showError(message) {
        // You can implement error display here
        console.error(message);
    }

    navigateMonth(direction) {
        this.currentDate.setMonth(this.currentDate.getMonth() + direction);
        this.render();
    }

    goToToday() {
        this.currentDate = new Date();
        this.render();
    }

    setView(view) {
        this.currentView = view;

        // Update button states
        document.querySelectorAll('.view-toggle button').forEach(btn => {
            btn.classList.remove('active');
        });

        if (view === 'month') {
            this.monthViewBtn.classList.add('active');
            this.calendarView.style.display = 'block';
            this.listView.style.display = 'none';
        } else {
            if (view === 'listMonth') this.listMonthBtn.classList.add('active');
            else if (view === 'listWeek') this.listWeekBtn.classList.add('active');
            else if (view === 'listDay') this.listDayBtn.classList.add('active');

            this.calendarView.style.display = 'none';
            this.listView.style.display = 'block';
        }

        this.render();
    }

    render() {
        this.updateTitle();

        if (this.currentView === 'month') {
            this.renderCalendarGrid();
        } else {
            this.renderListView();
        }
    }

    updateTitle() {
        const options = {
            year: 'numeric',
            month: 'long'
        };
        this.calendarTitle.textContent = this.currentDate.toLocaleDateString('en-US', options);
    }

    renderCalendarGrid() {
        // Clear existing days (keep headers)
        const existingDays = this.calendarGrid.querySelectorAll('.calendar-day');
        existingDays.forEach(day => day.remove());

        const year = this.currentDate.getFullYear();
        const month = this.currentDate.getMonth();

        // Get first day of month and number of days
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const daysInMonth = lastDay.getDate();
        const startingDayOfWeek = firstDay.getDay();

        // Get previous month's last days
        const prevMonth = new Date(year, month, 0);
        const daysInPrevMonth = prevMonth.getDate();

        // Calculate total cells needed
        const totalCells = Math.ceil((daysInMonth + startingDayOfWeek) / 7) * 7;

        for (let i = 0; i < totalCells; i++) {
            const dayElement = document.createElement('div');
            dayElement.className = 'calendar-day';

            let dayNumber, dayDate, isCurrentMonth = true;

            if (i < startingDayOfWeek) {
                // Previous month days
                dayNumber = daysInPrevMonth - startingDayOfWeek + i + 1;
                dayDate = new Date(year, month - 1, dayNumber);
                isCurrentMonth = false;
            } else if (i >= startingDayOfWeek + daysInMonth) {
                // Next month days
                dayNumber = i - startingDayOfWeek - daysInMonth + 1;
                dayDate = new Date(year, month + 1, dayNumber);
                isCurrentMonth = false;
            } else {
                // Current month days
                dayNumber = i - startingDayOfWeek + 1;
                dayDate = new Date(year, month, dayNumber);
            }

            if (!isCurrentMonth) {
                dayElement.classList.add('other-month');
            }

            // Check if it's today
            const today = new Date();
            if (dayDate.toDateString() === today.toDateString()) {
                dayElement.classList.add('today');
            }

            // Create day content
            const dayNumberEl = document.createElement('div');
            dayNumberEl.className = 'day-number';
            dayNumberEl.textContent = dayNumber;

            const eventsEl = document.createElement('div');
            eventsEl.className = 'day-events';

            // Add events for this day
            const dayEvents = this.getSurgeriesForDate(dayDate);
            dayEvents.forEach(surgery => {
                const eventEl = document.createElement('a');
                eventEl.className = `event-item`;
                eventEl.href = `patient.php?id=${surgery.patient_id}`;
                eventEl.title =
                    `${surgery.patient_name}\n${surgery.status}${surgery.graft_count ? ` (${surgery.graft_count} grafts)` : ''}`
                eventEl.style.display = 'flex'; /* Use flexbox for the event item */
                eventEl.style.flexDirection = 'column'; /* Stack children vertically */


                // Create a container for the first line (badge and name)
                const eventHeaderEl = document.createElement('div');
                eventHeaderEl.className = 'event-header';
                eventHeaderEl.style.display = 'flex'; /* Use flexbox for the header */
                eventHeaderEl.style.justifyContent = 'flex-start'; /* Align items to the left */
                eventHeaderEl.style.alignItems = 'center'; /* Vertically align items in header */
                eventHeaderEl.style.gap = '5px'; /* Space between badge and name */


                // Create status badge element
                const statusBadgeEl = document.createElement('span');
                statusBadgeEl.className = `status-badge ${surgery.status}`;

                // Create patient name element
                const patientNameEl = document.createElement('span');
                patientNameEl.className = 'patient-name';
                patientNameEl.textContent = surgery.patient_name;

                // Append badge and name to the header container
                eventHeaderEl.appendChild(statusBadgeEl);
                eventHeaderEl.appendChild(patientNameEl);

                // Append header container to the event link
                eventEl.appendChild(eventHeaderEl);

                // Create graft count element (if exists) and append to event link
                if (surgery.graft_count) {
                    const graftCountEl = document.createElement('div'); // Use div for new line
                    graftCountEl.className = 'graft-count';
                    graftCountEl.textContent = `(${surgery.graft_count} grafts)`;
                    eventEl.appendChild(graftCountEl);
                }

                eventsEl.appendChild(eventEl);
            });

            dayElement.appendChild(dayNumberEl);
            dayElement.appendChild(eventsEl);
            this.calendarGrid.appendChild(dayElement);
        }
    }

    renderListView() {
        let surgeries = [...this.surgeries];
        const now = new Date();

        // Filter surgeries based on view type
        if (this.currentView === 'listWeek') {
            const weekStart = new Date(this.currentDate);
            weekStart.setDate(weekStart.getDate() - weekStart.getDay());
            const weekEnd = new Date(weekStart);
            weekEnd.setDate(weekEnd.getDate() + 6);

            surgeries = surgeries.filter(surgery => {
                const surgeryDate = new Date(surgery.date);
                return surgeryDate >= weekStart && surgeryDate <= weekEnd;
            });
        } else if (this.currentView === 'listDay') {
            const dayStart = new Date(this.currentDate);
            dayStart.setHours(0, 0, 0, 0);
            const dayEnd = new Date(dayStart);
            dayEnd.setDate(dayEnd.getDate() + 1);

            surgeries = surgeries.filter(surgery => {
                const surgeryDate = new Date(surgery.date);
                return surgeryDate >= dayStart && surgeryDate < dayEnd;
            });
        } else if (this.currentView === 'listMonth') {
            const monthStart = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth(), 1);
            const monthEnd = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, 0);

            surgeries = surgeries.filter(surgery => {
                const surgeryDate = new Date(surgery.date);
                return surgeryDate >= monthStart && surgeryDate <= monthEnd;
            });
        }

        // Sort surgeries by date
        surgeries.sort((a, b) => new Date(a.date) - new Date(b.date));

        // Group surgeries by date
        const groupedSurgeries = {};
        surgeries.forEach(surgery => {
            const dateKey = surgery.date;
            if (!groupedSurgeries[dateKey]) {
                groupedSurgeries[dateKey] = [];
            }
            groupedSurgeries[dateKey].push(surgery);
        });

        // Render grouped surgeries
        let html = '';

        if (Object.keys(groupedSurgeries).length === 0) {
            html = '<div class="text-center py-5 text-muted">No surgeries found for this period.</div>';
        } else {
            Object.keys(groupedSurgeries).forEach(dateKey => {
                const date = new Date(dateKey);
                const dayName = date.toLocaleDateString('en-US', {
                    weekday: 'long'
                });
                const formattedDate = date.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });

                html += `
                    <div class="list-date">
                        <span>${formattedDate}</span>
                        <span class="text-primary">${dayName}</span>
                    </div>
                `;

                groupedSurgeries[dateKey].forEach(surgery => {
                    html += `
                        <div class="list-item">
                            <div class="list-time">8:00am - 6:00pm</div>
                            <div class="list-patient">
                                <a href="patient.php?id=${surgery.patient_id}" class="text-decoration-none text-dark">
                                    ${surgery.patient_name}
                                </a>
                            </div>
                            <div class="list-details">
                                <span class="me-3">Graft: ${surgery.graft_count || 'N/A'}</span>
                                <span class="status-badge ${surgery.status}">${surgery.status}</span>
                            </div>
                        </div>
                    `;
                });
            });
        }

        this.listContent.innerHTML = html;
    }

    getSurgeriesForDate(date) {
        const dateString = date.toISOString().split('T')[0];
        return this.surgeries.filter(surgery => surgery.date === dateString);
    }

    formatDate(dateString) {
        const options = {
            day: '2-digit',
            month: 'short',
            year: '2-digit'
        };
        const date = new Date(dateString);
        return date.toLocaleDateString('en-GB', options).replace(/\//g, ' / ');
    }
}

// Initialize calendar when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    new CustomCalendar();
});
</script>

<?php require_once 'includes/footer.php'; ?>