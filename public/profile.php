<?php

require_once 'includes/db.php';
require_once 'includes/auth.php';

// Ensure user is logged in
if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}


$page_title = "All Surgeries";
require_once 'includes/header.php';
$user_id = $_GET['user_id'];
?>

<div class="container mt-4">
    <h2 id="page_title">Profile Settings for</h2>

    <div id="message" class="alert" style="display: none;"></div>
    <div class="row">
        <div class="col-md-6">
            <h4>Update Profile Information</h4>
            <form id="updateProfileForm">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="">
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>

        <div class="col-md-6">
            <h4>Change Password</h4>
            <form id="changePasswordForm">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <input type="hidden" class="form-control" id="current_password" name="current_password" required>

                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm New Password:</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
        </div>
    </div>

</div>

<script>
document.getElementById('updateProfileForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);
    formData.append('entity', 'users');
    formData.append('action', 'update_profile');

    fetch('api.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            const messageDiv = document.getElementById('message');
            messageDiv.style.display = 'block';
            if (data.success) {
                messageDiv.classList.remove('alert-danger');
                messageDiv.classList.add('alert-success');
                messageDiv.textContent = data.message;
                // Update username in navbar if it was changed
                if (data.message.includes('Username updated')) {
                    // This requires updating the header dynamically or reloading the page
                    // For simplicity, we'll just show the message. A full solution
                    // might involve a page reload or more complex JS DOM manipulation.
                    // location.reload(); // Option to reload page to show updated username in header
                }
            } else {
                messageDiv.classList.remove('alert-success');
                messageDiv.classList.add('alert-danger');
                messageDiv.textContent = data.error || data.message;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            const messageDiv = document.getElementById('message');
            messageDiv.style.display = 'block';
            messageDiv.classList.remove('alert-success');
            messageDiv.classList.add('alert-danger');
            messageDiv.textContent = 'An error occurred while updating the profile.';
        });
});

document.getElementById('changePasswordForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);
    formData.append('entity', 'users');
    formData.append('action', 'change_password');

    fetch('api.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            const messageDiv = document.getElementById('message');
            messageDiv.style.display = 'block';
            if (data.success) {
                messageDiv.classList.remove('alert-danger');
                messageDiv.classList.add('alert-success');
                messageDiv.textContent = data.message;
                // Clear password fields on success
                document.getElementById('current_password').value = '';
                document.getElementById('new_password').value = '';
                document.getElementById('confirm_password').value = '';
            } else {
                messageDiv.classList.remove('alert-success');
                messageDiv.classList.add('alert-danger');
                messageDiv.textContent = data.error || data.message;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            const messageDiv = document.getElementById('message');
            messageDiv.style.display = 'block';
            messageDiv.classList.remove('alert-success');
            messageDiv.classList.add('alert-danger');
            messageDiv.textContent = 'An error occurred while changing the password.';
        });
});
document.addEventListener('DOMContentLoaded', function() {
    const user_id = <?php echo json_encode($user_id); ?>;
    const username = document.getElementById('username');
    const email = document.getElementById('email');
    const password = document.getElementById('current_password');
    const statusMessagesDiv = document.getElementById('message');

    // Function to display messages
    function displayMessage(message, type = 'success') {
        statusMessagesDiv.innerHTML = `<div class="alert alert-${type}">${message}</div>`;
    }

    function UserData(id) {
        fetch(`api.php?entity=users&action=get&id=${id}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const user = data.user;
                    username.value = user.username;
                    email.value = user.email;
                    password.value = user.password
                } else {
                    displayMessage(`Error loading patient: ${data.error}`, 'danger');
                }
            })
            .catch(error => {
                console.error('Error fetching patient:', error);
                displayMessage('An error occurred while loading patient data.', 'danger');
            });
    }
    UserData(user_id);
});
</script>