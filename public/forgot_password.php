<?php
require_once 'includes/db.php';
require_once 'includes/email.php'; // Include the email functions

$message = '';
$message_type = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    // Log the incoming request
    $log_entry = "[" . date('Y-m-d H:i:s') . "] Forgot password request received for email: " . ($email ? $email : 'empty') . "\n";
    file_put_contents(__DIR__ . '/log.md', $log_entry, FILE_APPEND);

    if (empty($email)) {
        $message = 'Please enter your email address.';
        $message_type = 'danger';
        // Log empty email
        $log_entry = "[" . date('Y-m-d H:i:s') . "] Forgot password request failed: Empty email provided.\n";
        file_put_contents(__DIR__ . '/log.md', $log_entry, FILE_APPEND);
    } else {
        // Find the user by email
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Log user lookup result
        if ($user) {
            $log_entry = "[" . date('Y-m-d H:i:s') . "] User found for email: {$email}\n";
            file_put_contents(__DIR__ . '/log.md', $log_entry, FILE_APPEND);

            $user_id = $user['id'];
            // Generate a unique token
            $token = bin2hex(random_bytes(32));
            // Set token expiry (e.g., 1 hour)
            $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

            // TODO: You need to add columns to your 'users' table for 'reset_token' (VARCHAR) and 'reset_expiry' (DATETIME).
            // Example SQL: ALTER TABLE users ADD reset_token VARCHAR(64) NULL, ADD reset_expiry DATETIME NULL;

            // Store the token and expiry in the database
            $update_stmt = $pdo->prepare("UPDATE users SET reset_token = ?, reset_expiry = ? WHERE id = ?");
            if ($update_stmt->execute([$token, $expiry, $user_id])) {
                // Log token storage success
                $log_entry = "[" . date('Y-m-d H:i:s') . "] Reset token stored for user ID: {$user_id}\n";
                file_put_contents(__DIR__ . '/log.md', $log_entry, FILE_APPEND);
            } else {
                // Log token storage failure
                $log_entry = "[" . date('Y-m-d H:i:s') . "] Failed to store reset token for user ID: {$user_id}\n";
                file_put_contents(__DIR__ . '/log.md', $log_entry, FILE_APPEND);
            }


            // Construct the reset link
            $reset_link = "http://" . $_SERVER['HTTP_HOST'] . "/reset_password.php?token=" . $token; // Adjust URL as needed

            // Send the password reset email
            if (send_password_reset_email($email, $reset_link)) {
                $message = 'If an account with that email address exists, a password reset link has been sent.';
                $message_type = 'success';
                // Email sending success is logged in email.php

                // Add JavaScript to redirect after 2 seconds
                echo '<script>
                        setTimeout(function() {
                            window.location.href = "login.php";
                        }, 2000); // 2000 milliseconds = 2 seconds
                      </script>';
            } else {
                $message = 'Failed to send password reset email. Please try again later.';
                $message_type = 'danger';
                // Email sending failure is logged in email.php
            }
        } else {
            // Log user not found
            $log_entry = "[" . date('Y-m-d H:i:s') . "] User not found for email: {$email}\n";
            file_put_contents(__DIR__ . '/log.md', $log_entry, FILE_APPEND);
            $user_not_found = true; // Set flag to show modal
        }
    }
}

$page_title = "Forgot Password";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - ' : ''; ?>Surgery Patient Management</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Dropzone CSS -->
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />

    <!-- Tom-Select CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- Dropzone JS -->
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>

    <!-- API Helper for secure POST requests -->
    <script src="/assets/js/api-helper.js"></script>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container-fluid pe-2 ">
            <a class="navbar-brand fw-bold" href="/">
                <i class="fas fa-heartbeat me-2"></i>
                <span class="d-none d-sm-inline">Liv Patient Management</span>
                <span class="d-inline d-sm-none">LivPM</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse mx-auto" id="navbarNav">

            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container  py-4 emp-profile">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Forgot Password
                            </div>
                            <div class="card-body">
                                <?php if ($message): ?>
                                    <div class="alert alert-<?php echo $message_type; ?>" role="alert">
                                        <?php echo $message; ?>
                                    </div>
                                <?php endif; ?>
                                <form method="POST">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Enter your email address</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Send Reset Link</button>
                                </form>
                                <p class="mt-3"><a href="login.php">Back to Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php require_once 'includes/footer.php'; ?>

            <!-- Modal for User Not Found -->
            <div class="modal fade" id="userNotFoundModal" tabindex="-1" aria-labelledby="userNotFoundModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="userNotFoundModalLabel">Email Address Not Found</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            The email address you entered was not found in our system. Please check the email address
                            and try again.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

    </main>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        <?php if (isset($user_not_found) && $user_not_found): ?>
            var userNotFoundModal = new bootstrap.Modal(document.getElementById('userNotFoundModal'), {});
            userNotFoundModal.show();
        <?php endif; ?>
    </script>

</body>

</html>