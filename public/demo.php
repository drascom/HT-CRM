<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

$page_title = "Responsive Design Demo";
require_once 'includes/header.php';
?>

<!-- Status Messages -->
<div id="status-messages">
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i>
        This is a demo page showcasing the responsive design features.
    </div>
</div>

<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">
        <i class="fas fa-mobile-alt me-2 text-primary"></i>
        Responsive Design Demo
    </h2>
    <div class="btn-group" role="group">
        <button class="btn btn-outline-primary btn-sm">
            <i class="fas fa-desktop me-1"></i>
            <span class="d-none d-sm-inline">Desktop</span>
        </button>
        <button class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-tablet-alt me-1"></i>
            <span class="d-none d-sm-inline">Tablet</span>
        </button>
        <button class="btn btn-outline-success btn-sm">
            <i class="fas fa-mobile-alt me-1"></i>
            <span class="d-none d-sm-inline">Mobile</span>
        </button>
    </div>
</div>

<!-- Search Section -->
<div class="search-section">
    <div class="row align-items-center">
        <div class="col-md-8">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" class="form-control" placeholder="Try searching for something...">
            </div>
        </div>
        <div class="col-md-4 mt-3 mt-md-0">
            <div class="text-muted small">
                <i class="fas fa-info-circle me-1"></i>
                Demo search functionality
            </div>
        </div>
    </div>
</div>

<!-- Demo Cards -->
<div class="row mb-4">
    <div class="col-lg-4 col-md-6 mb-3">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-users me-2"></i>
                Patients Overview
            </div>
            <div class="card-body">
                <h5 class="card-title">125 Total Patients</h5>
                <p class="card-text">Comprehensive patient management with responsive tables.</p>
                <a href="patients.php" class="btn btn-primary btn-sm">View Patients</a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-3">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-hospital me-2"></i>
                Surgeries Overview
            </div>
            <div class="card-body">
                <h5 class="card-title">89 Surgeries</h5>
                <p class="card-text">Track surgical procedures with mobile-optimized interface.</p>
                <a href="surgeries.php" class="btn btn-success btn-sm">View Surgeries</a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-3">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-calendar me-2"></i>
                Calendar View
            </div>
            <div class="card-body">
                <h5 class="card-title">Schedule Management</h5>
                <p class="card-text">Responsive calendar for appointment scheduling.</p>
                <a href="calendar.php" class="btn btn-info btn-sm">View Calendar</a>
            </div>
        </div>
    </div>
</div>

<!-- Demo Table -->
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Patient Name</th>
                <th>Date of Birth</th>
                <th>Last Surgery</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <img src="assets/avatar.png" alt="Avatar" class="avatar">
                </td>
                <td>
                    <span class="fw-medium">John Doe</span>
                </td>
                <td>
                    <span class="text-truncate-mobile">1985-03-15</span>
                </td>
                <td>
                    <span class="text-truncate-mobile">2024-01-15</span>
                </td>
                <td>
                    <span class="badge bg-success">Completed</span>
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-outline-warning" title="Edit">
                            <i class="fas fa-edit"></i>
                            <span class="d-none d-lg-inline ms-1">Edit</span>
                        </button>
                        <button class="btn btn-sm btn-outline-info" title="View">
                            <i class="fas fa-eye"></i>
                            <span class="d-none d-lg-inline ms-1">View</span>
                        </button>
                        <button class="btn btn-sm btn-outline-danger" title="Delete">
                            <i class="fas fa-trash-alt"></i>
                            <span class="d-none d-lg-inline ms-1">Delete</span>
                        </button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="assets/avatar.png" alt="Avatar" class="avatar">
                </td>
                <td>
                    <span class="fw-medium">Jane Smith</span>
                </td>
                <td>
                    <span class="text-truncate-mobile">1990-07-22</span>
                </td>
                <td>
                    <span class="text-truncate-mobile">2024-02-10</span>
                </td>
                <td>
                    <span class="badge bg-primary">Booked</span>
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-outline-warning" title="Edit">
                            <i class="fas fa-edit"></i>
                            <span class="d-none d-lg-inline ms-1">Edit</span>
                        </button>
                        <button class="btn btn-sm btn-outline-info" title="View">
                            <i class="fas fa-eye"></i>
                            <span class="d-none d-lg-inline ms-1">View</span>
                        </button>
                        <button class="btn btn-sm btn-outline-danger" title="Delete">
                            <i class="fas fa-trash-alt"></i>
                            <span class="d-none d-lg-inline ms-1">Delete</span>
                        </button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="assets/avatar.png" alt="Avatar" class="avatar">
                </td>
                <td>
                    <span class="fw-medium">Michael Johnson</span>
                </td>
                <td>
                    <span class="text-truncate-mobile">1978-11-08</span>
                </td>
                <td>
                    <span class="text-muted">No surgeries</span>
                </td>
                <td>
                    <span class="badge bg-warning">In Progress</span>
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-outline-warning" title="Edit">
                            <i class="fas fa-edit"></i>
                            <span class="d-none d-lg-inline ms-1">Edit</span>
                        </button>
                        <button class="btn btn-sm btn-outline-info" title="View">
                            <i class="fas fa-eye"></i>
                            <span class="d-none d-lg-inline ms-1">View</span>
                        </button>
                        <button class="btn btn-sm btn-outline-danger" title="Delete">
                            <i class="fas fa-trash-alt"></i>
                            <span class="d-none d-lg-inline ms-1">Delete</span>
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Responsive Features Info -->
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-mobile-alt me-2"></i>
                Mobile Features
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li><i class="fas fa-check text-success me-2"></i>Horizontal table scrolling</li>
                    <li><i class="fas fa-check text-success me-2"></i>Responsive navigation</li>
                    <li><i class="fas fa-check text-success me-2"></i>Touch-friendly buttons</li>
                    <li><i class="fas fa-check text-success me-2"></i>Optimized typography</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-palette me-2"></i>
                Design Features
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li><i class="fas fa-check text-success me-2"></i>Modern Bootstrap 5 design</li>
                    <li><i class="fas fa-check text-success me-2"></i>Clean, professional interface</li>
                    <li><i class="fas fa-check text-success me-2"></i>Consistent color scheme</li>
                    <li><i class="fas fa-check text-success me-2"></i>Smooth animations</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
