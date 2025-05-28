<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

$error_message = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $agency_id = $_POST['agency_id'] ?? null;

    if (empty($email) || empty($username) || empty($password) || empty($confirm_password)) {
        $error_message = 'Please fill in all fields.';
    } elseif ($password !== $confirm_password) {
        $error_message = 'Passwords do not match.';
    } else {
        // Attempt to register the user
        if (register_user($email, $username, $password, $agency_id)) {
            // Redirect to login page on successful registration
            header('Location: login.php');
            exit();
        } else {
            $error_message = 'Registration failed. Email or username might already be registered.';
        }
    }
}

// Fetch agencies for dropdown
$agencies = [];
try {
    $stmt = $pdo->query("SELECT id, name FROM agencies ORDER BY name");
    $agencies = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    // If there's an error fetching agencies, continue without them
}

$page_title = "Sign Up";
require_once 'includes/header.php';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Sign Up
                </div>
                <div class="card-body">
                    <?php if ($error_message): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error_message; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($success_message): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $success_message; ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                         <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="agency_id" class="form-label">Agency</label>
                            <select class="form-select" id="agency_id" name="agency_id">
                                <option value="">Select Agency (Optional)</option>
                                <?php foreach ($agencies as $agency): ?>
                                    <option value="<?php echo htmlspecialchars($agency['id']); ?>">
                                        <?php echo htmlspecialchars($agency['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus me-1"></i>Sign Up</button>
                    </form>
                    <p class="mt-3">Already have an account? <a href="login.php">Login here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>