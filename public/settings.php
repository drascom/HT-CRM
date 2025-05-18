<?php
require_once 'includes/auth.php';
require_once 'includes/db.php';

// Check if the user is logged in
if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

// Handle adding new photo album type
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_type'])) {
    $name = trim($_POST['type_name']);
    if (!empty($name)) {
        $db = get_db();
        $stmt = $db->prepare("INSERT INTO photo_album_types (name, created_at, updated_at) VALUES (?, datetime('now'), datetime('now'))");
        $stmt->execute([$name]);
        header('Location: settings.php'); // Redirect to prevent form resubmission
        exit();
    }
}

// Handle deleting photo album type
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_type'])) {
    $type_id = $_POST['type_id'];
    $db = get_db();
    // Optional: Add a check to see if any patients are using this type before deleting
    $stmt = $db->prepare("DELETE FROM photo_album_types WHERE id = ?");
    $stmt->execute([$type_id]);
    header('Location: settings.php'); // Redirect to prevent form resubmission
    exit();
}

// Fetch existing photo album types
$db = get_db();
$types = $db->query("SELECT * FROM photo_album_types ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

$page_title = "Settings";
require_once 'includes/header.php';
?>

<div class="container mt-4">
    <h2>Settings</h2>

    <h3>Manage Photo Album Types</h3>

    <!-- Form to add new type -->
    <form action="settings.php" method="post" class="form-inline mb-4">
        <div class="input-group">
            <input type="text" class="form-control" id="type_name" name="type_name" placeholder="New Album Type Name" required>
            <div class="input-group-append">
                <button type="submit" name="add_type" class="btn btn-primary">+ Add</button>
            </div>
        </div>
    </form>

    <!-- List existing types -->
    <ul class="list-group">
        <?php foreach ($types as $type): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?= htmlspecialchars($type['name']) ?>
                <form action="settings.php" method="post" class="form-inline m-0">
                    <input type="hidden" name="type_id" value="<?= $type['id'] ?>">
                    <button type="submit" name="delete_type" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this type?');">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

</div>

<?php require_once 'includes/footer.php'; ?>