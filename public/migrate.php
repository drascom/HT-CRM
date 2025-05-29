<?php
require_once 'includes/db.php';

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
    echo "Migration completed successfully!\n";
    
} catch (Exception $e) {
    echo "Migration failed: " . $e->getMessage() . "\n";
    exit(1);
}
?>
