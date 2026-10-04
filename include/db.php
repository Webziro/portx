<?php
// Database Configuration
$httpHost = $_SERVER['HTTP_HOST'] ?? '';
if (strpos($httpHost, 'localhost') !== false || strpos($httpHost, '127.0.0.1') !== false) {
    // Local (XAMPP)
    $host = 'localhost';
    $db = 'portfolio_db';
    $user = 'root';
    $pass = '';
} else {
    // Production (Shared Hosting)
    $host = 'localhost';
    $db = 'huwesdio_stanley_db';
    $user = 'huwesdio_stanley_db';
    $pass = 'z4D7h98DENSbn9qQ4WfP';
}

$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    // Auto-create/sync missing tables and columns
    ensure_portfolio_schema($pdo);
} catch (\PDOException $e) {
    error_log("Database connection error: " . $e->getMessage());
    $pdo = null;
}

function ensure_portfolio_schema($pdo)
{
    static $executed = false;
    if ($executed || !$pdo)
        return;
    $executed = true;

    try {
        $pdo->exec("CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        $pdo->exec("CREATE TABLE IF NOT EXISTS profile (
            id INT PRIMARY KEY DEFAULT 1,
            full_name VARCHAR(100),
            title VARCHAR(255),
            bio TEXT,
            hero_image VARCHAR(255),
            work_preview_image VARCHAR(255),
            cv_url VARCHAR(255),
            experience_start_year INT DEFAULT 2021,
            clients_count VARCHAR(20) DEFAULT '+12',
            projects_count VARCHAR(20) DEFAULT '+20',
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )");

        $pdo->exec("CREATE TABLE IF NOT EXISTS services (
            id INT AUTO_INCREMENT PRIMARY KEY,
            icon_class VARCHAR(50),
            label VARCHAR(100),
            display_order INT DEFAULT 0
        )");

        $pdo->exec("CREATE TABLE IF NOT EXISTS projects (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255),
            category VARCHAR(100),
            image_path VARCHAR(255),
            client VARCHAR(255),
            year VARCHAR(50),
            services TEXT,
            technologies TEXT,
            description TEXT,
            image2_path VARCHAR(255),
            image3_path VARCHAR(255),
            image4_path VARCHAR(255),
            live_url VARCHAR(255),
            is_featured BOOLEAN DEFAULT FALSE,
            display_order INT DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        $pdo->exec("CREATE TABLE IF NOT EXISTS blogs (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255),
            image_path VARCHAR(255),
            blog_url VARCHAR(255),
            content LONGTEXT,
            excerpt TEXT,
            author_name VARCHAR(100),
            category VARCHAR(100),
            tags VARCHAR(255),
            display_order INT DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        $pdo->exec("CREATE TABLE IF NOT EXISTS blog_comments (
            id INT AUTO_INCREMENT PRIMARY KEY,
            blog_id INT,
            author_name VARCHAR(100),
            author_email VARCHAR(100),
            comment TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        $pdo->exec("CREATE TABLE IF NOT EXISTS credentials (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255),
            subtitle VARCHAR(255),
            image_path VARCHAR(255),
            type ENUM('education', 'experience', 'skill') DEFAULT 'experience',
            organization VARCHAR(255),
            date_range VARCHAR(100),
            display_order INT DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        // Add any missing columns to existing tables safely
        $alters = [
            "ALTER TABLE profile ADD COLUMN cv_url VARCHAR(255)",
            "ALTER TABLE profile ADD COLUMN experience_start_year INT DEFAULT 2021",
            "ALTER TABLE profile ADD COLUMN clients_count VARCHAR(20) DEFAULT '+12'",
            "ALTER TABLE profile ADD COLUMN projects_count VARCHAR(20) DEFAULT '+20'",
            "ALTER TABLE blogs ADD COLUMN content LONGTEXT",
            "ALTER TABLE blogs ADD COLUMN excerpt TEXT",
            "ALTER TABLE blogs ADD COLUMN author_name VARCHAR(100)",
            "ALTER TABLE blogs ADD COLUMN category VARCHAR(100)",
            "ALTER TABLE blogs ADD COLUMN tags VARCHAR(255)",
            "ALTER TABLE blogs ADD COLUMN display_order INT DEFAULT 0",
            "ALTER TABLE credentials ADD COLUMN organization VARCHAR(255)",
            "ALTER TABLE credentials ADD COLUMN date_range VARCHAR(100)",
            "ALTER TABLE projects ADD COLUMN display_order INT DEFAULT 0"
        ];
        foreach ($alters as $q) {
            try {
                $pdo->exec($q);
            } catch (\Exception $e) {
            }
        }

        // Insert default profile if empty
        $cnt = $pdo->query("SELECT COUNT(*) FROM profile")->fetchColumn();
        if ($cnt == 0) {
            $pdo->exec("INSERT INTO profile (id, full_name, title, bio, hero_image, work_preview_image, experience_start_year, clients_count, projects_count) 
                VALUES (1, 'STANLEY AMAZIRO.', 'A Software Engineer', 'Backend and Systems Engineer — Caching, Scaling, and DevOps Automation', 'wp-content/uploads/2023/04/me.png', 'wp-content/uploads/2023/04/my-works.png', 2021, '+12', '+20')");
        }
    } catch (\Exception $e) {
        error_log("Schema sync warning: " . $e->getMessage());
    }
}
?>