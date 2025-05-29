<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

// Ensure user is logged in and is admin
if (!is_logged_in() || !is_admin()) {
    header('Location: login.php');
    exit();
}

$success = false;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['run_migration'])) {
    try {
        $db = get_db();
        
        // Read the migration SQL file
        $migration_file = __DIR__ . '/migrations/add_room_management.sql';
        if (!file_exists($migration_file)) {
            throw new Exception('Migration file not found');
        }
        
        $sql = file_get_contents($migration_file);
        if ($sql === false) {
            throw new Exception('Failed to read migration file');
        }
        
        // Execute the migration
        $db->exec($sql);
        $success = true;
        
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

$page_title = "Room Management Migration";
require_once 'includes/header.php';
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">
                        <i class="fas fa-database me-2"></i>
                        Room Management Migration
                    </h4>
                </div>
                <div class="card-body">
                    <?php if ($success): ?>
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>
                            Migration completed successfully! Room management tables have been created.
                        </div>
                        <div class="mt-3">
                            <a href="rooms.php" class="btn btn-primary">
                                <i class="fas fa-door-open me-2"></i>
                                Go to Room Management
                            </a>
                            <a href="calendar.php" class="btn btn-secondary ms-2">
                                <i class="fas fa-calendar me-2"></i>
                                View Calendar
                            </a>
                        </div>
                    <?php elseif ($error): ?>
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            Migration failed: <?php echo htmlspecialchars($error); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!$success): ?>
                        <p>This migration will create the following tables:</p>
                        <ul>
                            <li><strong>rooms</strong> - Store operating room information</li>
                            <li><strong>room_reservations</strong> - Track room bookings tied to surgeries</li>
                        </ul>
                        
                        <p class="text-muted">
                            <i class="fas fa-info-circle me-2"></i>
                            This migration is safe to run multiple times. Existing data will not be affected.
                        </p>

                        <form method="POST" class="mt-4">
                            <button type="submit" name="run_migration" class="btn btn-primary">
                                <i class="fas fa-play me-2"></i>
                                Run Migration
                            </button>
                            <a href="index.php" class="btn btn-secondary ms-2">
                                <i class="fas fa-arrow-left me-2"></i>
                                Cancel
                            </a>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
