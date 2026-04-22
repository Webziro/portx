<?php
require_once 'include/db.php';
try {
    // Add columns to blogs table
    $pdo->exec("ALTER TABLE blogs 
        ADD COLUMN content LONGTEXT AFTER blog_url,
        ADD COLUMN excerpt TEXT AFTER content,
        ADD COLUMN author_name VARCHAR(100) AFTER excerpt,
        ADD COLUMN category VARCHAR(100) AFTER author_name,
        ADD COLUMN tags VARCHAR(255) AFTER category
    ");
    
    // Create blog_comments table
    $pdo->exec("CREATE TABLE IF NOT EXISTS blog_comments (
        id INT AUTO_INCREMENT PRIMARY KEY,
        blog_id INT,
        author_name VARCHAR(100),
        author_email VARCHAR(100),
        comment TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (blog_id) REFERENCES blogs(id) ON DELETE CASCADE
    )");

    echo "Table 'blogs' updated and 'blog_comments' created successfully!";
} catch (Exception $e) {
    echo "Error updating database: " . $e->getMessage();
}
?>
