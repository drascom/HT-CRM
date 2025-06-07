<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth.php';


if (!is_logged_in() || !is_admin()) {
    // Redirect to login page or show an unauthorized message
    header('Location: login.php');
    exit();
}
?>

<?php
$page_title = "User Invitation";
include __DIR__ . '/includes/header.php';
?>
<div class="container mt-4">
    <h2>Invite New User</h2>
    <form id="inviteUserForm">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="surname">Surname:</label>
            <input type="text" class="form-control" id="surname" name="surname" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number (Optional):</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>
        <button type="submit" class="btn btn-primary">Send Invitation</button>
    </form>
    <div id="responseMessage" class="mt-3"></div>
</div>

<script>
    document.getElementById('inviteUserForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const form = event.target;
        const formData = new FormData(form);
        const data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });

        apiRequest('register_process', 'invite', data)
            .then(response => {
                const responseDiv = document.getElementById('responseMessage');
                if (response.success) {
                    responseDiv.className = 'alert alert-success';
                    responseDiv.textContent = 'Invitation sent successfully!';
                    form.reset(); // Clear the form on success
                } else {
                    responseDiv.className = 'alert alert-danger';
                    responseDiv.textContent = 'Error: ' + (response.error || 'An unknown error occurred.');
                }
            })
            .catch(error => {
                const responseDiv = document.getElementById('responseMessage');
                responseDiv.className = 'alert alert-danger';
                responseDiv.textContent = 'An error occurred while sending the invitation.';
                console.error('API Error:', error);
            });
    });
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>