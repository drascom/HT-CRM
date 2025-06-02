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

<!-- Room Details Modal -->
<div class="modal fade" id="roomDetailsModal" tabindex="-1" aria-labelledby="roomDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roomDetailsModalLabel">Room Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="roomDetailsModalBody">
                <!-- Content will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
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

            // Initialize appointment summaries cache
            this.appointmentSummaries = new Map();

            await this.render();
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

    async getAppointmentSummary(roomId, date) {
        const cacheKey = `${roomId}-${date}`;

        // Check cache first
        if (this.appointmentSummaries.has(cacheKey)) {
            return this.appointmentSummaries.get(cacheKey);
        }

        try {
            const url = `api.php?entity=calendar_summary&action=get&room_id=${roomId}&date=${date}`;
            const response = await fetch(url);

            if (!response.ok) {
                console.error('HTTP error:', response.status, response.statusText);
                return {
                    consult_count: 0,
                    cosmetic_count: 0,
                    surgery: false
                };
            }

            const text = await response.text();
            let data;

            try {
                data = JSON.parse(text);
            } catch (parseError) {
                console.error('JSON parse error:', parseError, 'Response text:', text);
                return {
                    consult_count: 0,
                    cosmetic_count: 0,
                    surgery: false
                };
            }

            if (data && data.success) {
                // Cache the result
                this.appointmentSummaries.set(cacheKey, data);
                return data;
            } else {
                console.error('API error response:', data);
                return {
                    consult_count: 0,
                    cosmetic_count: 0,
                    surgery: false
                };
            }
        } catch (error) {
            console.error('Error fetching appointment summary:', error);
            return {
                consult_count: 0,
                cosmetic_count: 0,
                surgery: false
            };
        }
    }

    navigateMonth(direction) {
        this.currentDate.setMonth(this.currentDate.getMonth() + direction);
        this.render().catch(console.error);
    }

    goToToday() {
        this.currentDate = new Date();
        this.render().catch(console.error);
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

        this.render().catch(console.error);
    }

    async render() {
        this.updateTitle();

        if (this.currentView === 'month') {
            await this.renderCalendarGrid();
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

    async renderCalendarGrid() {
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
                for (const room of this.rooms) {
                    if (room.is_active) {
                        const roomSlot = document.createElement('div');
                        roomSlot.className = 'room-slot-container';
                        roomSlot.dataset.roomId = room.id;
                        roomSlot.dataset.date = this.formatDateForAPI(dayDate);

                        // Get appointment summary for this room and date
                        const summary = await this.getAppointmentSummary(room.id, this.formatDateForAPI(dayDate));

                        // Get surgery for this room and date
                        const roomSurgery = this.getSurgeryForRoomAndDate(room.id, dayDate);

                        // Determine if room has any activity
                        const hasActivity = roomSurgery || summary.consult_count > 0 || summary.cosmetic_count > 0;

                        if (hasActivity) {
                            roomSlot.classList.add('booked');
                            roomSlot.innerHTML = this.createCombinedSlotContent(room, {
                                consult_count: summary.consult_count,
                                cosmetic_count: summary.cosmetic_count,
                                surgery: roomSurgery,
                                surgery_label: roomSurgery ? `${roomSurgery.patient_name}` : null
                            });

                            // Make it clickable to view details
                            roomSlot.addEventListener('click', (e) => {
                                e.preventDefault();
                                this.openRoomDetailsModal(room.id, this.formatDateForAPI(dayDate), room
                                    .name);
                            });
                        } else {
                            // Room is available - show empty slot
                            roomSlot.classList.add('available');
                            roomSlot.innerHTML = this.createEmptySlotContent(room);
                        }

                        roomSlotsEl.appendChild(roomSlot);
                    }
                }
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
        console.log("surgery: ", surgery)
        return `
            <div class="room-badge">${room.name}</div>
            <div class="surgery-content">
                <div class="surgery-header">
                    <span class="status-badge ${surgery.status}"></span>
                    <span class="patient-name">${surgery.patient_name}</span>
                </div>
                ${surgery.graft_count ? `<div class="graft-count">${surgery.graft_count} grafts</div>` : ''}
                ${surgery.technician_names ? `<div class="technician-names">${surgery.technician_names}</div>` : ''}
                ${surgery.agency_name ? `<div class="agency-name">${surgery.agency_name} -  ${surgery.status}</div>` : ''}
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

    createCombinedSlotContent(room, summary) {
        let content = `<div class="room-badge">${room.name}</div><div class="appointment-summary">`;

        if (summary.consult_count > 0) {
            content += `<div class="appointment-type consult">Consults: ${summary.consult_count}</div>`;
        }

        if (summary.cosmetic_count > 0) {
            content += `<div class="appointment-type cosmetic">Cosmetic: ${summary.cosmetic_count}</div>`;
        }

        if (summary.surgery) {
            content += `<div class="appointment-type surgery">Surgery: ${summary.surgery_label}</div>`;
        }

        content += `</div>`;
        return content;
    }

    async openRoomDetailsModal(roomId, date, roomName) {
        try {
            // Show loading in modal
            const modal = new bootstrap.Modal(document.getElementById('roomDetailsModal'));
            const modalTitle = document.getElementById('roomDetailsModalLabel');
            const modalBody = document.getElementById('roomDetailsModalBody');

            modalTitle.textContent = `${roomName} - ${this.formatDisplayDate(date)}`;
            modalBody.innerHTML = '<div class="text-center"><div class="spinner-border" role="status"></div></div>';

            modal.show();

            // Fetch detailed appointment data
            const response = await fetch(
                `api.php?entity=calendar_details&action=get&room_id=${roomId}&date=${date}`);
            const data = await response.json();

            if (data.success) {
                modalBody.innerHTML = this.createModalContent(data);
            } else {
                modalBody.innerHTML = '<div class="alert alert-danger">Failed to load room details</div>';
            }
        } catch (error) {
            console.error('Error loading room details:', error);
            document.getElementById('roomDetailsModalBody').innerHTML =
                '<div class="alert alert-danger">Error loading room details</div>';
        }
    }

    createModalContent(data) {
        let content = '';

        // Surgery section
        if (data.surgery) {
            content += `
                <div class="mb-4">
                    <h6 class="text-primary">Hair Transplant Surgery</h6>
                    <div class="card">
                        <div class="card-body">
                            <p class="mb-1"><strong>Patient:</strong> ${data.surgery.patient_name}</p>
                            <p class="mb-1"><strong>Procedure:</strong> ${data.surgery.procedure}</p>
                            <p class="mb-1"><strong>Graft Count:</strong> ${data.surgery.graft_count || 'N/A'}</p>
                            <p class="mb-1"><strong>Status:</strong> <span class="badge bg-primary">${data.surgery.status}</span></p>
                            <p class="mb-0"><strong>Time:</strong> ${data.surgery.time}</p>
                        </div>
                    </div>
                </div>
            `;
        }

        // Consultations section
        if (data.consult && data.consult.length > 0) {
            content += `
                <div class="mb-4">
                    <h6 class="text-info">Consultations (${data.consult.length})</h6>
                    <div class="list-group">
            `;
            data.consult.forEach(consult => {
                content += `
                    <div class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <strong>${consult.name}</strong>
                                ${consult.subtype ? `<br><small class="text-muted">${consult.subtype}</small>` : ''}
                            </div>
                            <span class="badge bg-info">${consult.start_time} - ${consult.end_time}</span>
                        </div>
                    </div>
                `;
            });
            content += `</div></div>`;
        }

        // Cosmetic procedures section
        if (data.cosmetic && data.cosmetic.length > 0) {
            content += `
                <div class="mb-4">
                    <h6 class="text-success">Cosmetic Procedures (${data.cosmetic.length})</h6>
                    <div class="list-group">
            `;
            data.cosmetic.forEach(cosmetic => {
                content += `
                    <div class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <strong>${cosmetic.name}</strong>
                                ${cosmetic.subtype ? `<br><small class="text-muted">${cosmetic.subtype}</small>` : ''}
                            </div>
                            <span class="badge bg-success">${cosmetic.start_time} - ${cosmetic.end_time}</span>
                        </div>
                    </div>
                `;
            });
            content += `</div></div>`;
        }

        if (!content) {
            content =
                '<div class="text-center text-muted">No appointments scheduled for this room on this date.</div>';
        }

        return content;
    }

    formatDisplayDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('en-GB', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    }
}

// Initialize calendar when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    new CustomCalendar();
});
</script>

<?php require_once 'includes/footer.php'; ?>