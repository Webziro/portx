CREATE DATABASE IF NOT EXISTS portfolio_db;
USE portfolio_db;

-- Admin users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Profile table (mostly single row)
CREATE TABLE IF NOT EXISTS profile (
    id INT PRIMARY KEY DEFAULT 1,
    full_name VARCHAR(100),
    title VARCHAR(255),
    bio TEXT,
    hero_image VARCHAR(255),
    work_preview_image VARCHAR(255),
    experience_start_year INT,
    clients_count VARCHAR(20),
    projects_count VARCHAR(20),
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Services table
CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    icon_class VARCHAR(50),
    label VARCHAR(100),
    display_order INT DEFAULT 0
);

-- Projects table
CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    category VARCHAR(100),
    image_path VARCHAR(255),
    project_url VARCHAR(255),
    is_featured BOOLEAN DEFAULT FALSE,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Blogs table
CREATE TABLE IF NOT EXISTS blogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    image_path VARCHAR(255),
    blog_url VARCHAR(255),
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Credentials table
CREATE TABLE IF NOT EXISTS credentials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    subtitle VARCHAR(255),
    image_path VARCHAR(255),
    type ENUM('education', 'experience', 'skill') DEFAULT 'experience',
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert default admin (password: admin123)
INSERT IGNORE INTO users (username, password) VALUES ('admin', '$2y$10$8KuSVXHLlYPYhPRft0qtNuvyZJUwYKJ4LH3jPFxwEaRx4mhdBPNgq');

-- Insert initial profile data
INSERT IGNORE INTO profile (id, full_name, title, bio, hero_image, work_preview_image, experience_start_year, clients_count, projects_count) 
VALUES (1, 'STANLEY AMAZIRO.', 'A Software Engineer', 'Backend and Systems Engineer — Caching, Scaling, and DevOps Automation', 'wp-content/uploads/2023/04/me.png', 'wp-content/uploads/2023/04/my-works.png', 2021, '+12', '+20');

-- Insert initial services
INSERT IGNORE INTO services (icon_class, label, display_order) VALUES 
('iconoir-internet', 'Web & App Dev.', 1),
('iconoir-dev-mode-phone', 'Systems Engineering', 2),
('iconoir-settings-cloud', 'DevOps', 3),
('iconoir-git-branch', 'Automation', 4);

-- Insert initial projects
INSERT IGNORE INTO projects (title, category, image_path, project_url, is_featured, display_order) VALUES 
('Dynamic', 'WEB DESIGNING', 'wp-content/uploads/2023/04/project1.jpg', 'workdetail-page/index.php', TRUE, 1),
('Diesel H1', 'PHOTOGRAPHY', 'wp-content/uploads/2023/04/project2.jpg', 'workdetail-page/index.php', FALSE, 2),
('Seven Studio', 'MOBILE DESIGNING', 'wp-content/uploads/2023/04/project3.jpg', 'workdetail-page/index.php', FALSE, 3);
