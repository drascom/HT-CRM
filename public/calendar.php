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
<link rel="stylesheet" href="assets/css/calendar.css">


<!-- Page Header -->
<!-- <div class="d-flex justify-content-between align-items-center mb-4">
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
</div> -->

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
            <button type="button" style="display:none;" id="listWeekBtn">List Week</button>
            <button type="button" style="display:none;" id="listDayBtn">List Day</button>
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
            // Load surgeries and rooms in parallel
            const [surgeriesResponse, roomsResponse] = await Promise.all([
                fetch('api.php?entity=surgeries&action=list'),
                fetch('api.php?entity=rooms&action=list')
            ]);

            const surgeriesData = await surgeriesResponse.json();
            const roomsData = await roomsResponse.json();

            if (surgeriesData.success) {
                this.surgeries = surgeriesData.surgeries || [];
            } else {
                console.error('Error fetching surgeries:', surgeriesData.error);
                this.showError('Failed to load surgeries');
            }

            if (roomsData.success) {
                this.rooms = roomsData.rooms || [];
            } else {
                console.error('Error fetching rooms:', roomsData.error);
                this.showError('Failed to load rooms');
            }

            this.render();
        } catch (error) {
            console.error('Error fetching data:', error);
            this.showError('Failed to load data');
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
        this.calendarTitle.textContent = this.currentDate.toLocaleDateString('en-GB', options);
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

            // Create room slots container
            const roomSlotsEl = document.createElement('div');
            roomSlotsEl.className = 'room-slots';

            // Add room slots for current month days only
            if (isCurrentMonth && this.rooms) {
                this.rooms.forEach(room => {
                    if (room.is_active) {
                        const roomSlot = document.createElement('div');
                        roomSlot.className = 'room-slot-container';
                        roomSlot.dataset.roomId = room.id;
                        roomSlot.dataset.date = this.formatDateForAPI(dayDate);

                        // Get surgery for this room and date
                        const roomSurgery = this.getSurgeryForRoomAndDate(room.id, dayDate);

                        if (roomSurgery) {
                            // Room is booked - show surgery details
                            roomSlot.classList.add('booked');
                            roomSlot.innerHTML = this.createSurgerySlotContent(room, roomSurgery);

                            // Make it clickable to view patient
                            roomSlot.addEventListener('click', (e) => {
                                e.preventDefault();
                                window.location.href = `patient.php?id=${roomSurgery.patient_id}`;
                            });
                        } else {
                            // Room is available - show empty slot
                            roomSlot.classList.add('available');
                            roomSlot.innerHTML = this.createEmptySlotContent(room);

                            // Make it clickable to add surgery
                            roomSlot.addEventListener('click', (e) => {
                                e.preventDefault();
                                this.openSurgeryForm(room.id, this.formatDateForAPI(dayDate));
                            });
                        }

                        roomSlotsEl.appendChild(roomSlot);
                    }
                });
            }

            dayElement.appendChild(dayNumberEl);
            dayElement.appendChild(roomSlotsEl);
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
                                ${surgery.room_name ? `<span class="me-3 text-primary fw-bold">Room: ${surgery.room_name}</span>` : ''}
                                ${surgery.agency_name ? `<span class="me-3">Agency: ${surgery.agency_name}</span>` : ''}
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
        // Use local date string to avoid timezone issues
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        const dateString = `${year}-${month}-${day}`;
        return this.surgeries.filter(surgery => surgery.date === dateString);
    }

    getSurgeryForRoomAndDate(roomId, date) {
        const dateString = this.formatDateForAPI(date);
        return this.surgeries.find(surgery =>
            surgery.room_id == roomId && surgery.date === dateString
        );
    }

    formatDateForAPI(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    openSurgeryForm(roomId, date) {
        // Open add surgery form with pre-selected room and date
        const url = `add_edit_surgery.php?room_id=${roomId}&date=${date}`;
        window.location.href = url;
    }

    createSurgerySlotContent(room, surgery) {
        return `
            <div class="room-badge">${room.name}</div>
            <div class="surgery-content">
                <div class="surgery-header">
                    <span class="status-badge ${surgery.status}"></span>
                    <span class="patient-name">${surgery.patient_name}</span>
                </div>
                ${surgery.graft_count ? `<div class="graft-count">${surgery.graft_count} grafts</div>` : ''}
                ${surgery.technician_names ? `<div class="technician-names">${surgery.technician_names}</div>` : ''}
                ${surgery.agency_name ? `<div class="agency-name">${surgery.agency_name}</div>` : ''}
            </div>
        `;
    }

    createEmptySlotContent(room) {
        return `
            <div class="room-badge available">${room.name}</div>
            <div class="empty-slot">
                <div class="add-surgery-text">+ </div>
            </div>
        `;
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