<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surgery Patient Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
</head>

<body>
    <!-- rest of your navbar code... -->

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Surgery Patient Management</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <?php if (is_logged_in()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="surgeries.php"><i class="fas fa-hospital me-1"></i>Surgeries</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="patients.php"><i class="fas fa-users me-1"></i>Patients</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="settings.php"><i class="fas fa-cog me-1"></i>Settings</a>
                            </li>

                        <?php endif; ?>
                    </ul>
                    <ul class="navbar-nav">
                        <?php if (is_logged_in()): ?>
                            <?php
                            // Fetch username for the logged-in user
                            $user_id = $_SESSION['user_id'];
                            $stmt = $pdo->prepare("SELECT username FROM users WHERE id = ?");
                            $stmt->execute([$user_id]);
                            $user = $stmt->fetch(PDO::FETCH_ASSOC);
                            $username = $user['username'] ?? 'User'; // Default to 'User' if username not found
                            ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user-circle me-1"></i><?php echo htmlspecialchars($username); ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-user-cog me-1"></i>Profile</a>
                                    </li>
                                    <li><a class="dropdown-item" href="logout.php"><i
                                                class="fas fa-sign-out-alt me-1"></i>Logout</a></li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt me-1"></i>Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="signup.php"><i class="fas fa-user-plus me-1"></i>Sign Up</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-4">