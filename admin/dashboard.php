<?php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: login"); exit(); }
require_once '../include/db.php';

// Fetch counts for dashboard stats
$projectsCount    = $pdo->query("SELECT COUNT(*) FROM projects")->fetchColumn();
$blogsCount       = $pdo->query("SELECT COUNT(*) FROM blogs")->fetchColumn();
$servicesCount    = $pdo->query("SELECT COUNT(*) FROM services")->fetchColumn();
$credentialsCount = $pdo->query("SELECT COUNT(*) FROM credentials")->fetchColumn();
$profile          = $pdo->query("SELECT * FROM profile WHERE id = 1")->fetch();

// Quick profile save from dashboard
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['quick_save'])) {
    $pdo->prepare("UPDATE profile SET full_name=?, title=? WHERE id=1")
        ->execute([trim($_POST['full_name']), trim($_POST['title'])]);
    header("Location: dashboard?saved=1"); exit();
}

include 'header.php';
?>

    


<div class="row g-4">
    <div class="col-md-3">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted text-uppercase small">Projects</h6>
                <h2 class="card-title"><?= $projectsCount ?></h2>
                <a href="projects.php" class="btn btn-sm btn-link px-0">Manage Projects</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted text-uppercase small">Blogs</h6>
                <h2 class="card-title"><?= $blogsCount ?></h2>
                <a href="blogs.php" class="btn btn-sm btn-link px-0">Manage Blogs</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted text-uppercase small">Services</h6>
                <h2 class="card-title"><?= $servicesCount ?></h2>
                <a href="services.php" class="btn btn-sm btn-link px-0">Manage Services</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted text-uppercase small">Credentials</h6>
                <h2 class="card-title"><?= $credentialsCount ?></h2>
                <a href="credentials.php" class="btn btn-sm btn-link px-0">Manage Credentials</a>
            </div>
        </div>
    </div>
</div>

<?php if (isset($_GET['saved'])): ?>
    <div class="alert alert-success mt-4">Profile updated!</div>
<?php endif; ?>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Quick Profile Edit</h5>
                <a href="profile.php" class="btn btn-sm btn-primary">Full Edit</a>
            </div>
            <div class="card-body">
                <form action="dashboard.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="full_name" class="form-control" value="<?= htmlspecialchars($profile['full_name'] ?? '') ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Professional Title</label>
                            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($profile['title'] ?? '') ?>">
                        </div>
                    </div>
                    <button type="submit" name="quick_save" class="btn btn-success">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

