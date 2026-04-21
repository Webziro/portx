<?php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit(); }
require_once '../include/db.php';

$success = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = trim($_POST['full_name'] ?? '');
    $title     = trim($_POST['title'] ?? '');
    $bio       = trim($_POST['bio'] ?? '');
    $experience_start_year = (int)($_POST['experience_start_year'] ?? 2021);
    $clients_count  = trim($_POST['clients_count'] ?? '');
    $projects_count = trim($_POST['projects_count'] ?? '');

    $hero_image = trim($_POST['existing_hero_image'] ?? '');
    if (!empty($_FILES['hero_image']['name'])) {
        $ext = pathinfo($_FILES['hero_image']['name'], PATHINFO_EXTENSION);
        $new_name = 'hero_' . time() . '.' . $ext;
        if (move_uploaded_file($_FILES['hero_image']['tmp_name'], '../wp-content/uploads/' . $new_name)) {
            $hero_image = 'wp-content/uploads/' . $new_name;
        }
    }

    $work_preview_image = trim($_POST['existing_work_image'] ?? '');
    if (!empty($_FILES['work_preview_image']['name'])) {
        $ext = pathinfo($_FILES['work_preview_image']['name'], PATHINFO_EXTENSION);
        $new_name = 'work_preview_' . time() . '.' . $ext;
        if (move_uploaded_file($_FILES['work_preview_image']['tmp_name'], '../wp-content/uploads/' . $new_name)) {
            $work_preview_image = 'wp-content/uploads/' . $new_name;
        }
    }

    $pdo->prepare("UPDATE profile SET full_name=?, title=?, bio=?, hero_image=?, work_preview_image=?, experience_start_year=?, clients_count=?, projects_count=? WHERE id=1")
        ->execute([$full_name, $title, $bio, $hero_image, $work_preview_image, $experience_start_year, $clients_count, $projects_count]);

    $success = "Profile updated successfully!";
}

$profile = $pdo->query("SELECT * FROM profile WHERE id = 1")->fetch();

include 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Profile Settings</h2>
    <?php if ($success): ?>
        <div class="alert alert-success py-2 px-3 mb-0"><?= $success ?></div>
    <?php endif; ?>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="existing_hero_image" value="<?= htmlspecialchars($profile['hero_image'] ?? '') ?>">
            <input type="hidden" name="existing_work_image" value="<?= htmlspecialchars($profile['work_preview_image'] ?? '') ?>">

            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Full Name</label>
                    <input type="text" name="full_name" class="form-control" value="<?= htmlspecialchars($profile['full_name'] ?? '') ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Professional Title (e.g. A Software Engineer)</label>
                    <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($profile['title'] ?? '') ?>">
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Bio / Tagline</label>
                    <textarea name="bio" rows="3" class="form-control"><?= htmlspecialchars($profile['bio'] ?? '') ?></textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Experience Start Year</label>
                    <input type="number" name="experience_start_year" class="form-control" value="<?= htmlspecialchars($profile['experience_start_year'] ?? 2021) ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Clients Count (e.g. +12)</label>
                    <input type="text" name="clients_count" class="form-control" value="<?= htmlspecialchars($profile['clients_count'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Total Projects Count (e.g. +20)</label>
                    <input type="text" name="projects_count" class="form-control" value="<?= htmlspecialchars($profile['projects_count'] ?? '') ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Hero Image</label>
                    <?php if (!empty($profile['hero_image'])): ?>
                        <div class="mb-2">
                            <img src="../<?= htmlspecialchars($profile['hero_image']) ?>" alt="Hero" style="height:80px;border-radius:8px;object-fit:cover;">
                        </div>
                    <?php endif; ?>
                    <input type="file" name="hero_image" class="form-control" accept="image/*">
                    <small class="text-muted">Leave empty to keep current image.</small>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Work Preview Image (Homepage Card)</label>
                    <?php if (!empty($profile['work_preview_image'])): ?>
                        <div class="mb-2">
                            <img src="../<?= htmlspecialchars($profile['work_preview_image']) ?>" alt="Work Preview" style="height:80px;border-radius:8px;object-fit:cover;">
                        </div>
                    <?php endif; ?>
                    <input type="file" name="work_preview_image" class="form-control" accept="image/*">
                    <small class="text-muted">Leave empty to keep current image.</small>
                </div>
            </div>

            <hr class="my-4">
            <button type="submit" class="btn btn-primary px-4">Save Profile</button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
