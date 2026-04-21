<?php
// session, auth and $pdo are already set by the calling page
// Just read theme from session here
$theme = isset($_SESSION['theme']) ? $_SESSION['theme'] : 'dark';

// Build page title from filename for the header bar
$pageTitles = [
    'dashboard.php'   => 'Dashboard',
    'profile.php'     => 'Profile Settings',
    'services.php'    => 'Services',
    'projects.php'    => 'Projects',
    'blogs.php'       => 'Blogs',
    'credentials.php' => 'Credentials',
];
$pageTitle = $pageTitles[basename($_SERVER['PHP_SELF'])] ?? 'Dashboard';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="<?php echo $theme; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Portfolio</title>
    <!-- Use local bootstrap from portfolio if possible, but admin might need its own for theme support -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lucide-icons/lucide-static@latest/font/lucide.css">
    <style>
        :root {
            --gx-bg-dark: #0f0f0f;
            --gx-card-dark: #1a1a1a;
            --gx-text-dark: #ffffff;
            --gx-accent: #ffffff;
        }

        [data-bs-theme="dark"] body {
            background-color: var(--gx-bg-dark);
            color: var(--gx-text-dark);
        }

        [data-bs-theme="dark"] .card {
            background-color: var(--gx-card-dark);
            border-color: #333;
            color: var(--gx-text-dark);
        }

        .sidebar {
            min-height: 100vh;
            background: rgba(0,0,0,0.1);
            border-right: 1px solid #333;
            padding: 20px;
        }

        .nav-link {
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 5px;
            color: inherit;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: 0.3s;
        }

        .nav-link:hover, .nav-link.active {
            background: rgba(255,255,255,0.1);
            color: var(--gx-accent);
        }

        .theme-toggle {
            cursor: pointer;
            padding: 10px;
            border-radius: 50%;
            background: rgba(128,128,128,0.1);
            display: inline-flex;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse">
            <div class="position-sticky">
                <h4 class="mb-4 d-flex align-items-center gap-2">
                    <i class="lucide-layout-dashboard"></i> Portfolio
                </h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>" href="dashboard.php">
                            <i class="lucide-home"></i> Overview
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active' : ''; ?>" href="profile.php">
                            <i class="lucide-user"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : ''; ?>" href="services.php">
                            <i class="lucide-wrench"></i> Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'projects.php' ? 'active' : ''; ?>" href="projects.php">
                            <i class="lucide-briefcase"></i> Projects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'blogs.php' ? 'active' : ''; ?>" href="blogs.php">
                            <i class="lucide-pen-tool"></i> Blogs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'credentials.php' ? 'active' : ''; ?>" href="credentials.php">
                            <i class="lucide-file-text"></i> Credentials
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="mt-auto">
                    <a href="logout.php" class="nav-link text-danger">
                        <i class="lucide-log-out"></i> Logout
                    </a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><?php echo $pageTitle; ?></h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button id="themeToggle" class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-2">
                        <i class="lucide-sun-moon"></i> Switch Theme
                    </button>
                </div>
            </div>
