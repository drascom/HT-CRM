<?php
session_start();
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
        // Assuming login_user handles the actual authentication
        // Now, retrieve user details (like ID and role) and set session and cookies

        // Placeholder: In a real scenario, you'd fetch user_id and user_role from the database
        // based on the successfully logged-in user (e.g., using the email).
        // For demonstration, let's assume you have functions to get these details.
        // Example:
        // $user = get_user_by_email($email);
        // $user_id = $user['id'];
        // $user_role = $user['role'];

        // *** REPLACE WITH ACTUAL LOGIC TO GET USER ID AND ROLE ***
        $user_id = 1; // Example placeholder
        $user_role = 'user'; // Example placeholder
        // *****************************************************

        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_role'] = $user_role;

        // Set cookies (client-side access)
        // The time() + (86400 * 30) sets the cookie to expire in 30 days
        setcookie('user_id', $user_id, time() + (86400 * 30), "/");
        setcookie('user_role', $user_role, time() + (86400 * 30), "/");

        // Redirect to patients page on successful login
        header('Location: patients.php');
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
                        <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt me-1"></i>Login</button>
                    </form>
<p class="mt-3">Don't have an account? <a href="signup.php">Sign up here </a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>