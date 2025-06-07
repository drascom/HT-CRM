
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
document.addEventListener('DOMContentLoaded', function () {
    const loadingSpinner = document.getElementById('loading-spinner');
    const mainContent = document.getElementById('main-content');

    if (loadingSpinner && mainContent) {
        loadingSpinner.style.display = 'none'; // Hide the spinner
        mainContent.style.display = 'block'; // Show the main content
    }
});
