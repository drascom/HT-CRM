<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth.php';

// Check if the user is logged in and has admin role (assuming 'admin' role is required for this page)
// You might need to add a function like is_admin() in auth.php
// For now, we'll just check if logged in. You can add role check later.
if (!is_logged_in() || !is_admin()) {
    // Redirect to login page or show an unauthorized message
    header('Location: login.php'); // Or a dedicated unauthorized page
    exit();
}

// You might want to fetch users here initially or rely entirely on JavaScript API calls
// For a dynamic page using API, fetching initially might not be necessary.
?>

<?php include __DIR__ . '/includes/header.php'; ?>

<div id="status-messages">
    <!-- Success or error messages will be displayed here -->
</div>
<h2 class="mb-2">User Management</h2>
<div class="row mb-3">
    <div class="col-md-3">
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#userModal" id="addUserBtn"><i
                class="fas fa-plus-circle me-1"></i>Add User</button>
    </div>
    <div class="col-md-6">
        <input type="text" id="user-search" class="form-control" placeholder="Search users...">
    </div>
</div>

<table class="table table-striped" id="usersTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Username</th>
            <th>Role</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <!-- User rows will be populated by JavaScript -->
    </tbody>
</table>

<!-- User Add/Edit Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="userForm">
                    <input type="hidden" id="userId">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" required>
                        <small class="form-text text-muted" id="passwordHelp">Required for new users. Leave blank to
                            keep current password when editing.</small>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveUserBtn">Save User</button>
            </div>
        </div>
    </div>
</div>
<script>
// User Management Script
document.addEventListener('DOMContentLoaded', function() {
    const userModal = document.getElementById('userModal');
    const userForm = document.getElementById('userForm');
    const userIdInput = document.getElementById('userId');
    const emailInput = document.getElementById('email');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const roleSelect = document.getElementById('role');
    const addUserBtn = document.getElementById('addUserBtn');
    const saveUserBtn = document.getElementById('saveUserBtn');
    const usersTableBody = document.querySelector('#usersTable tbody');
    const passwordHelp = document.getElementById('passwordHelp');
    const statusMessagesDiv = document.getElementById('status-messages');
    let allUsers = []; // Store all users for client-side filtering

    // Function to display status messages
    function displayStatusMessage(message, type = 'success') {
        statusMessagesDiv.innerHTML = `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>`;
        // Auto-dismiss after 5 seconds
        setTimeout(() => {
            const alert = bootstrap.Alert.getInstance(statusMessagesDiv.querySelector('.alert'));
            if (alert) {
                alert.hide();
            }
        }, 5000);
    }

    // Function to fetch users from the API
    function fetchUsers() {
        fetch('api.php?entity=users&action=list')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    allUsers = data.users; // Store fetched users
                    populateUsersTable(allUsers);
                } else {
                    console.error('Error fetching users:', data.message);
                    displayStatusMessage('Error fetching users: ' + data.message, 'danger');
                }
            })
            .catch(error => {
                console.error('Error fetching users:', error);
                displayStatusMessage('Error fetching users: ' + error, 'danger');
            });
    }

    // Function to populate the users table
    function populateUsersTable(users) {
        usersTableBody.innerHTML = ''; // Clear existing rows
        if (users.length === 0) {
            usersTableBody.innerHTML = '<tr><td colspan="7" class="text-center">No users found.</td></tr>';
            return;
        }
        users.forEach(user => {
            const row = `
                <tr>
                    <td>${user.id}</td>
                    <td>${user.email}</td>
                    <td>${user.username}</td>
                    <td>${user.role}</td>
                    <td>${user.created_at || 'N/A'}</td>
                    <td>${user.updated_at || 'N/A'}</td>
                    <td>
                        <button class="btn btn-sm btn-warning edit-user-btn" data-id="${user.id}" data-bs-toggle="modal" data-bs-target="#userModal">Edit</button>
                        <button class="btn btn-sm btn-danger delete-user-btn" data-id="${user.id}">Delete</button>
                    </td>
                </tr>
            `;
            usersTableBody.innerHTML += row;
        });
    }

    // Function to reset the user form
    function resetUserForm() {
        userIdInput.value = '';
        userForm.reset();
        passwordInput.required = true; // Password is required for new users
        showPasswordHelp(true);
        document.getElementById('userModalLabel').textContent = 'Add User';
    }

    // Function to show/hide password help text
    function showPasswordHelp(show) {
        if (passwordHelp) {
            passwordHelp.style.display = show ? 'block' : 'none';
        }
    }

    // Event listener for the Add User button
    if (addUserBtn) {
        addUserBtn.addEventListener('click', resetUserForm);
    }

    // Event listener for the modal show event (for editing)
    if (userModal) {
        userModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget; // Button that triggered the modal
            const userId = button.getAttribute('data-id');

            if (userId) {
                // Editing existing user
                document.getElementById('userModalLabel').textContent = 'Edit User';
                userIdInput.value = userId;
                passwordInput.required = false; // Password is not required when editing
                showPasswordHelp(false); // Hide password help when editing

                // Fetch user data to populate the form
                fetch(`api.php?entity=users&action=get&id=${userId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success && data.user) {
                            emailInput.value = data.user.email;
                            usernameInput.value = data.user.username;
                            roleSelect.value = data.user.role;
                            // Password field is intentionally not populated for security
                        } else {
                            console.error('Error fetching user data:', data.message);
                            displayStatusMessage('Error fetching user data: ' + data.message,
                                'danger');
                            const modal = bootstrap.Modal.getInstance(userModal);
                            modal.hide(); // Hide modal on error
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching user data:', error);
                        displayStatusMessage('Error fetching user data: ' + error, 'danger');
                        const modal = bootstrap.Modal.getInstance(userModal);
                        modal.hide(); // Hide modal on error
                    });
            } else {
                // Adding new user (handled by addUserBtn click)
                resetUserForm();
            }
        });
    }


    // Event listener for the Save User button
    if (saveUserBtn) {
        saveUserBtn.addEventListener('click', function() {
            if (!userForm.checkValidity()) {
                userForm.reportValidity();
                return;
            }

            const userId = userIdInput.value;
            const email = emailInput.value;
            const username = usernameInput.value;
            const password = passwordInput.value;
            const role = roleSelect.value;

            const userData = {
                entity: 'users',
                email: email,
                username: username,
                role: role
            };

            let action = 'add';
            if (userId) {
                action = 'edit';
                userData.id = userId;
                if (password) { // Only include password if it's provided during edit
                    userData.password = password;
                }
            } else {
                userData.password = password; // Password is required for new users
            }

            userData.action = action; // Add action to the data payload

            fetch('api.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(userData)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const modal = bootstrap.Modal.getInstance(userModal);
                        modal.hide();
                        fetchUsers(); // Refresh the table
                        displayStatusMessage(userId ? 'User updated successfully!' :
                            'User added successfully!', 'success');
                    } else {
                        console.error('Error saving user:', data.message);
                        displayStatusMessage('Error saving user: ' + data.message, 'danger');
                    }
                })
                .catch(error => {
                    console.error('Error saving user:', error);
                    displayStatusMessage('Error saving user: ' + error, 'danger');
                });
        });
    }

    // Event delegation for Edit and Delete buttons
    if (usersTableBody) {
        usersTableBody.addEventListener('click', function(event) {
            const target = event.target;

            // Handle Delete button click
            if (target.classList.contains('delete-user-btn')) {
                const userId = target.getAttribute('data-id');
                if (confirm('Are you sure you want to delete this user?')) {
                    fetch('api.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                entity: 'users',
                                action: 'delete',
                                id: userId
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                fetchUsers(); // Refresh the table
                                displayStatusMessage('User deleted successfully!', 'success');
                            } else {
                                console.error('Error deleting user:', data.message);
                                displayStatusMessage('Error deleting user: ' + data.message,
                                    'danger');
                            }
                        })
                        .catch(error => {
                            console.error('Error deleting user:', error);
                            displayStatusMessage('Error deleting user: ' + error, 'danger');
                        });
                }
            }
        });
    }

    // Event listener for the search input
    const userSearchInput = document.getElementById('user-search');
    if (userSearchInput) {
        userSearchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const filteredUsers = allUsers.filter(user => {
                // Search by ID, email, username, or role
                return user.id.toString().includes(searchTerm) ||
                    user.email.toLowerCase().includes(searchTerm) ||
                    user.username.toLowerCase().includes(searchTerm) ||
                    user.role.toLowerCase().includes(searchTerm);
            });
            populateUsersTable(filteredUsers);
        });
    }


    // Initial fetch of users when the page loads
    if (window.location.pathname.includes("users.php")) {
        fetchUsers();
    }

});
</script>
<?php include __DIR__ . '/includes/footer.php'; ?>