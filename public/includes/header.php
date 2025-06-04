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
        <div class="container-fluid px-2">
            <a class="navbar-brand fw-bold" href="/">
                <i class="fas fa-heartbeat me-2"></i>
                <span class="d-none d-sm-inline">Liv Patient Management</span>
                <span class="d-inline d-sm-none">LivPM</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <?php if (is_logged_in()): ?>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="google.php">
                            <i class="fas fa-file-excel me-1"></i>
                            <span class="d-lg-inline">Sheet</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="calendar.php">
                            <i class="fas fa-calendar me-1"></i>
                            <span class="d-lg-inline">Calendar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="appointments.php">
                            <i class="fas fa-calendar-check me-1"></i>
                            <span class="d-lg-inline">Appointments</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="surgeries.php">
                            <i class="fas fa-hospital me-1"></i>
                            <span class="d-lg-inline">Surgeries</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="room_availability.php">
                            <i class="fas fa-door-open me-1"></i>
                            <span class="d-lg-inline">Rooms</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="technicians.php">
                            <i class="fas fa-users me-1"></i>
                            <span class="d-lg-inline">Technicians</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="patients.php">
                            <i class="fas fa-users me-1"></i>
                            <span class="d-lg-inline">Patients</span>
                        </a>
                    </li>
                    <?php if (is_admin()): ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-cog me-1"></i>
                            Settings
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="settings.php">
                                    <i class="fas fa-cog me-1"></i>
                                    Settings
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="users.php">
                                    <i class="fas fa-user-cog me-1"></i>
                                    Users
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="rooms.php">
                                    <i class="fas fa-door-open me-1"></i>
                                    Manage Rooms
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="agency.php">
                                    <i class="fas fa-building me-1"></i>
                                    Agencies
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>

                <ul class="navbar-nav">
                    <?php
                        // Fetch username for the logged-in user
                        $user_id = $_SESSION['user_id'];
                        $stmt = $pdo->prepare("SELECT username FROM users WHERE id = ?");
                        $stmt->execute([$user_id]);
                        $user = $stmt->fetch(PDO::FETCH_ASSOC);
                        $username = $user['username'] ?? 'User';
                        ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i>
                            <span class="d-none d-md-inline"><?php echo htmlspecialchars($username); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="profile.php?user_id=<?php echo $_SESSION['user_id']; ?>">
                                    <i class="fas fa-user-cog me-2"></i>Profile
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <?php else: ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">
                            <i class="fas fa-sign-in-alt me-1"></i>Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">
                            <i class="fas fa-user-plus me-1"></i>Sign Up
                        </a>
                    </li>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container-fluid px-3 px-md-4 py-2">