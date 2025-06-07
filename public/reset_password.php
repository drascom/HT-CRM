<?php
session_start(); // Start the session
require_once 'includes/db.php';
require_once 'includes/auth.php'; // Assuming auth.php has password hashing/verification functions

$message = '';
$message_type = '';
$token = $_GET['token'] ?? '';
$user_id = null;

// Validate the token
if (empty($token)) {
    $message = 'Invalid or missing reset token.';
    $message_type = 'danger';
} else {
    // Find user by token and check expiry
    $stmt = $pdo->prepare("SELECT id, reset_expiry FROM users WHERE reset_token = ? AND reset_expiry > CURRENT_TIMESTAMP");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        $user_id = $user['id'];
        // Token is valid and not expired
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process new password submission
            $new_password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';

            if (empty($new_password) || empty($confirm_password)) {
                $message = 'Please enter and confirm your new password.';
                $message_type = 'danger';
            } elseif ($new_password !== $confirm_password) {
                $message = 'Passwords do not match.';
                $message_type = 'danger';
            } else {
                // Hash the new password (assuming hash_password function exists in auth.php)
                // TODO: Ensure your auth.php has a function like hash_password()
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT); // Using PHP's built-in hashing

                // Update the user's password and invalidate the token
                $update_stmt = $pdo->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_expiry = NULL WHERE id = ?");
                if ($update_stmt->execute([$hashed_password, $user_id])) {
                    // Set success message in session and let the page render
                    $_SESSION['password_reset_success'] = 'Your password has been reset successfully. You will be redirected to the login page shortly.';
                    $message = 'Your password has been reset successfully. You can now log in.';
                    $message_type = 'success';
                    // Invalidate the token and redirect to login
                } else {
                    $message = 'Failed to update password. Please try again.';
                    $message_type = 'danger';
                }
            }
        }
        // If GET request or POST failed validation, show the form
    } else {
        $message = 'The password reset link is invalid or has expired. Please request a new password reset link.';
        $message_type = 'danger';
    }
}

$page_title = "Reset Password";
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

<!-- Password Reset Success Modal -->
<div class="modal fade" id="passwordResetSuccessModal" tabindex="-1" aria-labelledby="passwordResetSuccessModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordResetSuccessModalLabel">Password Reset Successful</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Your password has been reset successfully. You will be redirected to the login page shortly.
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    <?php if ($message_type === 'success'): ?>
        var passwordResetSuccessModal = new bootstrap.Modal(document.getElementById('passwordResetSuccessModal'), {
            keyboard: false
        });
        passwordResetSuccessModal.show();

        setTimeout(function() {
            window.location.href = 'login.php';
        }, 3000); // Redirect after 3 seconds
    <?php endif; ?>
</script>

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
                                Reset Password
                            </div>
                            <div class="card-body">
                                <?php if ($message): ?>
                                    <div class="alert alert-<?php echo $message_type; ?>" role="alert">
                                        <?php echo $message; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($user) && $message_type !== 'success'): // Only show form if token is valid and not expired, and password hasn't been reset
                                ?>
                                    <form method="POST">
                                        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">New Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="confirm_password" class="form-label">Confirm New Password</label>
                                            <input type="password" class="form-control" id="confirm_password"
                                                name="confirm_password" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Reset Password</button>
                                    </form>
                                <?php endif; ?>

                                <p class="mt-3"><a href="login.php">Back to Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php require_once 'includes/footer.php'; ?>