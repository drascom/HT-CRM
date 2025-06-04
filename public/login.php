<?php
// Start session only if one isn't already active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'includes/db.php';
require_once 'includes/auth.php';

// If user is already logged in, redirect to patients page
if (is_logged_in()) {
    header('Location: patients.php');
    exit();
}

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (login_user($email, $password)) {
        // login_user() has already set the session data
        // Get the session data for cookies
        $user_id = $_SESSION['user_id'];
        $user_role = $_SESSION['role'];

        // Set cookies (client-side access)
        setcookie('user_id', $user_id, time() + (86400 * 30), "/");
        setcookie('user_role', $user_role, time() + (86400 * 30), "/");

        // Redirect to calendar page on successful login
        header('Location: calendar.php');
        exit();
    } else {
        $error_message = 'Invalid email or password.';
    }
}

$page_title = "Login";
require_once 'includes/header.php';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <?php if ($error_message): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary"><i
                                class="fas fa-sign-in-alt me-1"></i>Login</button>
                    </form>
                    <p class="mt-3">Don't have an account? <a href="signup.php">Sign up here </a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>