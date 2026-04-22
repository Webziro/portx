<?php
require_once 'include/db.php';
try {
    // Add live_url column
    $pdo->exec("ALTER TABLE projects ADD COLUMN live_url VARCHAR(255) AFTER image4_path");
    
    // Optionally remove the old project_url column to keep it clean
    $pdo->exec("ALTER TABLE projects DROP COLUMN project_url");
    
    echo "Database updated successfully!";
} catch (Exception $e) {
    echo "Error updating database: " . $e->getMessage();
}
?>
