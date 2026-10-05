<?php
// Database Configuration
$pdo = null;
$host = 'localhost';

$httpHost = $_SERVER['HTTP_HOST'] ?? '';
$isLocal = (empty($httpHost) || strpos($httpHost, 'localhost') !== false || strpos($httpHost, '127.0.0.1') !== false || PHP_SAPI === 'cli');

if ($isLocal) {
    try {
        $db = 'portfolio_db';
        $user = 'root';
        $pass = '';
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    } catch (\PDOException $e) {
        $pdo = null;
    }
}

if (!$pdo) {
    try {
        $db = 'amaziron_portfolio';
        $user = 'amaziron_portfolio';
        $pass = 'bnFXDb8GcncGwx4ymGvp';
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    } catch (\PDOException $e) {
        error_log("Database connection error: " . $e->getMessage());
        $pdo = null;
    }
}

if ($pdo) {
    ensure_portfolio_schema($pdo);
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
            "ALTER TABLE profile ADD COLUMN email VARCHAR(255)",
            "ALTER TABLE profile ADD COLUMN phone VARCHAR(255)",
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

        // Seed initial data only when tables are empty
        if ((int) $pdo->query("SELECT COUNT(*) FROM profile")->fetchColumn() === 0) {
            seed_portfolio_data($pdo);
        }
    } catch (\Exception $e) {
        error_log("Schema sync warning: " . $e->getMessage());
    }
}

function seed_portfolio_data($pdo)
{
    if (!$pdo)
        return;

    try {
        // Admin user - only insert if no users exist
        $hash = '$2y$10$YVsOUSpmc5UvJdMkQG2Lhe26NPds3aVIIsto2PBiHcik8L4.3CXYi';
        $pdo->exec("INSERT IGNORE INTO users (id, username, password) VALUES (1, 'admin', '$hash')");

        // Profile
        $pdo->exec("INSERT IGNORE INTO profile (id, full_name, title, bio, hero_image, work_preview_image, experience_start_year, clients_count, projects_count, cv_url, email, phone) 
            VALUES (1, 'STANLEY AMAZIRO.', 'A Software Engineer', 'Backend and Systems Engineer — Caching, Scaling, and DevOps Automation', 'wp-content/uploads/hero_1776762535.jpg', 'wp-content/uploads/2023/04/my-works.png', 2021, '+12', '+20', 'https://drive.google.com/file/d/1ff7nCTOvfDwFvs8w-y8nlx72l0pgSAQ4/view?usp=sharing', 'stanleyamaziro@gmail.com', '+2348083792208')");

        // Services
        $services = [
            [1, 'iconoir-internet', 'Web & App Dev.', 'Building performant, modern websites and web applications with clean architecture and best practices.', 1],
            [2, 'iconoir-dev-mode-phone', 'Systems Engineering', 'Designing and implementing robust backend systems, caching layers, and scalable distributed architectures.', 2],
            [3, 'iconoir-settings-cloud', 'DevOps', 'Setting up CI/CD pipelines, Docker containerisation, cloud deployments, and infrastructure automation.', 3],
            [4, 'iconoir-git-branch', 'Automation', 'Writing scripts and tools that eliminate repetitive manual workflows and boost operational efficiency.', 4]
        ];
        $stmt = $pdo->prepare("INSERT IGNORE INTO services (id, icon_class, label, description, display_order) VALUES (?, ?, ?, ?, ?)");
        foreach ($services as $s) {
            $stmt->execute($s);
        }

        // Projects
        $projects = [
            [1, 'SendKyte: End-to-End Logistics Infrastructure', 'Software', 'Kyte Logistics & Technologies', '2025', 'Software Develoment', 'Next js, Typscript and Mongodb', 'I architected the entire digital ecosystem for SendKyte, an Abuja-born startup solving the "last-mile" delivery crisis in Nigeria. This wasn\'t just a website; it was a multi-portal engineering feat.', 'wp-content/uploads/project_1776866606.png', 'wp-content/uploads/project_img2_1776870608.png', 'wp-content/uploads/project_img3_1776870608.png', 'wp-content/uploads/project_img4_1776866547.png', 'https://sendkyte.com/', 1, 1],
            [2, 'Digitactic | Engineering the Future', 'Company Website', 'Digitactic', '2025', 'Web Design', 'Jvascript, React, PHP, MYSQL', 'Digitactic needed a digital presence as cutting-edge as their services. I delivered a bespoke web platform that challenges the status quo.', 'wp-content/uploads/project_1776869440.png', 'wp-content/uploads/project_img2_1776869440.png', 'wp-content/uploads/project_img3_1776869440.png', 'wp-content/uploads/project_img4_1776869440.png', 'https://digitactic.net/', 0, 2],
            [3, 'Spent Digital Academy: Robust Backend & API Architecture', 'Api and Dasboard design', 'Spent Academy', '2024', 'Software Develoment', 'RESTful API, Swagger, Node.js and TypeScript, Mongodb', 'I architected the core API and administrative dashboard for Spent Digital Academy, an educational platform designed for seamless learner management.', 'wp-content/uploads/project_1776875562.png', 'wp-content/uploads/project_img2_1776872904.png', 'wp-content/uploads/project_img3_1776875672.png', 'wp-content/uploads/project_img4_1776875672.png', 'http://spent-digital-dashboard.netlify.app/', 0, 3],
            [4, 'Zitel Financials: Redesign & Functional Overhaul', 'Financials Services', 'Zitel Inc.', '2025', 'Web Design', 'Javascripy, React, PHP', 'Recruited to take over and revitalize Zitel Financials’ digital presence, I successfully redesigned and engineered their company website from the ground up.', 'wp-content/uploads/project_1776871154.png', 'wp-content/uploads/project_img2_1776871154.png', 'wp-content/uploads/project_img3_1776875353.png', 'wp-content/uploads/project_img4_1776875353.png', 'https://zitelfinancials.ca/', 0, 0],
            [5, 'SchoolsFocus: A Comprehensive School Management ERP', 'EPR Software', 'SchoolsFocus', '2024', 'Software Develoment', 'PHP, Next js, Typscript and Mongodb', 'I served as a lead developer for SchoolsFocus, a robust, all-in-one management platform designed to digitize the operations of primary and secondary schools.', 'wp-content/uploads/project_1776874886.png', 'wp-content/uploads/project_img2_1776874886.png', 'wp-content/uploads/project_img3_1776874886.png', 'wp-content/uploads/project_img4_1776874886.png', 'https://schoolsfocus.net/', 0, 0]
        ];
        $stmt = $pdo->prepare("INSERT IGNORE INTO projects (id, title, category, client, year, services, technologies, description, image_path, image2_path, image3_path, image4_path, live_url, is_featured, display_order) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        foreach ($projects as $p) {
            $stmt->execute($p);
        }

        // Blogs
        $blogs = [
            [1, 'What software engineering is not. The never told side', 'wp-content/uploads/blog_1777567245.png', 'Software engineering', '<p>Sit amet luctussd fav venenatis, lectus magna fringilla inis urna...</p>', 'Sit amet luctussd fav venenatis...', 'Stanley Amaziro', 'Tech, Programming', 'Devops, PHP, Java', 1],
            [2, 'Mastering Docker, Software Engineering, Automation: A Comprehensive Guide', 'wp-content/uploads/blog_1777621251.png', '', 'Discover the essential strategies and modern approaches to Docker...', 'Discover the essential strategies...', 'Stanley Amaziro', '', '', 0],
            [3, 'It\'s 2026. \'It Works On My Machine\' Is Dead. Long Live Docker.', 'wp-content/uploads/blog_1777645793.jpg', 'it-s-2026-it-works-on-my-machine-is-dead-long-live-docker', '<h3>The Ghost of \'Works on My Machine\'</h3><p>It\'s 2026...</p>', 'In 2026, relying solely on your local environment...', 'Stanley Amaziro', 'Software', 'dystopian vision, AI', 0]
        ];
        $stmt = $pdo->prepare("INSERT IGNORE INTO blogs (id, title, image_path, blog_url, content, excerpt, author_name, category, tags, display_order) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        foreach ($blogs as $b) {
            $stmt->execute($b);
        }

        // Credentials
        $credentials = [
            [5, 'Node.js / Express', '90%', '', '', 'Backend web service development and REST API design.', 'skill', 1],
            [6, 'Python', '85%', '', '', 'Scripting, automation, data processing, and backend services.', 'skill', 2],
            [7, 'Docker / DevOps', '80%', '', '', 'Containerisation, CI/CD pipelines, and cloud deployments.', 'skill', 3],
            [8, 'React / JavaScript', '78%', '', '', 'Frontend development and dynamic web interfaces.', 'skill', 4],
            [9, 'MySQL / PostgreSQL', '85%', '', '', 'Relational database design, query optimisation and migrations.', 'skill', 5],
            [10, 'Git & Version Control', '92%', '', '', 'Collaborative development workflows using Git and GitHub.', 'skill', 6],
            [11, 'Software Engineer', '', '2026 - Present', 'Kyte Logistics & Technologies Limited', '', 'experience', 1],
            [12, 'Software Developer', '', '2024 - 2026', 'Webon Tech Hub, Abuja', '', 'experience', 2],
            [13, 'Web Developer', '', '2023 - 2024', 'Jamasoft Concept, Abuja', '', 'experience', 3],
            [14, 'Diploma in Software Engineering', '', '2024 - 2025', 'Spent Academy', '', 'education', 1],
            [15, 'Diploma in Software Development', '', '2022 - 2022', 'Jamasoft Academy', '', 'education', 2]
        ];
        $stmt = $pdo->prepare("INSERT IGNORE INTO credentials (id, title, subtitle, date_range, organization, description, type, display_order) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        foreach ($credentials as $c) {
            $stmt->execute($c);
        }
    } catch (\Exception $e) {
        error_log("Inline seed error: " . $e->getMessage());
    }
}
?>