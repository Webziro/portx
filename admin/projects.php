<?php
// ALL processing/redirects MUST happen before any HTML output
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit(); }
require_once '../include/db.php';

// Delete
if (isset($_GET['delete'])) {
    $pdo->prepare("DELETE FROM projects WHERE id=?")->execute([(int)$_GET['delete']]);
    header("Location: projects.php?deleted=1"); exit();
}

// Add / Edit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title         = trim($_POST['title'] ?? '');
    $category      = trim($_POST['category'] ?? '');
    $project_url   = trim($_POST['project_url'] ?? '');
    $client        = trim($_POST['client'] ?? '');
    $year          = trim($_POST['year'] ?? '');
    $services      = trim($_POST['services'] ?? '');
    $technologies  = trim($_POST['technologies'] ?? '');
    $description   = trim($_POST['description'] ?? '');
    $display_order = (int)($_POST['display_order'] ?? 0);
    $is_featured   = isset($_POST['is_featured']) ? 1 : 0;
    $id            = (int)($_POST['id'] ?? 0);

    $image_path = trim($_POST['existing_image'] ?? '');
    if (!empty($_FILES['image_path']['name'])) {
        $ext = pathinfo($_FILES['image_path']['name'], PATHINFO_EXTENSION);
        $new_name = 'project_' . time() . '.' . $ext;
        if (move_uploaded_file($_FILES['image_path']['tmp_name'], '../wp-content/uploads/' . $new_name)) {
            $image_path = 'wp-content/uploads/' . $new_name;
        }
    }
    $image2_path = trim($_POST['existing_image2'] ?? '');
    if (!empty($_FILES['image2_path']['name'])) {
        $ext = pathinfo($_FILES['image2_path']['name'], PATHINFO_EXTENSION);
        $new_name = 'project_img2_' . time() . '.' . $ext;
        if (move_uploaded_file($_FILES['image2_path']['tmp_name'], '../wp-content/uploads/' . $new_name)) {
            $image2_path = 'wp-content/uploads/' . $new_name;
        }
    }
    $image3_path = trim($_POST['existing_image3'] ?? '');
    if (!empty($_FILES['image3_path']['name'])) {
        $ext = pathinfo($_FILES['image3_path']['name'], PATHINFO_EXTENSION);
        $new_name = 'project_img3_' . time() . '.' . $ext;
        if (move_uploaded_file($_FILES['image3_path']['tmp_name'], '../wp-content/uploads/' . $new_name)) {
            $image3_path = 'wp-content/uploads/' . $new_name;
        }
    }
    $image4_path = trim($_POST['existing_image4'] ?? '');
    if (!empty($_FILES['image4_path']['name'])) {
        $ext = pathinfo($_FILES['image4_path']['name'], PATHINFO_EXTENSION);
        $new_name = 'project_img4_' . time() . '.' . $ext;
        if (move_uploaded_file($_FILES['image4_path']['tmp_name'], '../wp-content/uploads/' . $new_name)) {
            $image4_path = 'wp-content/uploads/' . $new_name;
        }
    }

    if ($id) {
        $pdo->prepare("UPDATE projects SET title=?, category=?, image_path=?, project_url=?, is_featured=?, display_order=?, client=?, year=?, services=?, technologies=?, description=?, image2_path=?, image3_path=?, image4_path=? WHERE id=?")
            ->execute([$title, $category, $image_path, $project_url, $is_featured, $display_order, $client, $year, $services, $technologies, $description, $image2_path, $image3_path, $image4_path, $id]);
    } else {
        $pdo->prepare("INSERT INTO projects (title, category, image_path, project_url, is_featured, display_order, client, year, services, technologies, description, image2_path, image3_path, image4_path) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)")
            ->execute([$title, $category, $image_path, $project_url, $is_featured, $display_order, $client, $year, $services, $technologies, $description, $image2_path, $image3_path, $image4_path]);
    }
    header("Location: projects.php?saved=1"); exit();
}

// Load for editing
$editing = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM projects WHERE id=?");
    $stmt->execute([(int)$_GET['edit']]);
    $editing = $stmt->fetch();
}

$projects = $pdo->query("SELECT * FROM projects ORDER BY display_order, created_at DESC")->fetchAll();

// NOW output HTML
include 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Projects</h2>
    <?php if (isset($_GET['saved'])): ?><div class="alert alert-success py-2 px-3 mb-0">Saved!</div><?php endif; ?>
    <?php if (isset($_GET['deleted'])): ?><div class="alert alert-danger py-2 px-3 mb-0">Deleted.</div><?php endif; ?>
</div>

<div class="row g-4">
    <!-- Add/Edit Form -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-transparent">
                <h5 class="mb-0"><?= $editing ? 'Edit Project' : 'Add Project' ?></h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <?php if ($editing): ?>
                        <input type="hidden" name="id" value="<?= $editing['id'] ?>">
                        <input type="hidden" name="existing_image" value="<?= htmlspecialchars($editing['image_path'] ?? '') ?>">
                        <input type="hidden" name="existing_image2" value="<?= htmlspecialchars($editing['image2_path'] ?? '') ?>">
                        <input type="hidden" name="existing_image3" value="<?= htmlspecialchars($editing['image3_path'] ?? '') ?>">
                        <input type="hidden" name="existing_image4" value="<?= htmlspecialchars($editing['image4_path'] ?? '') ?>">
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Project Title</label>
                            <input type="text" name="title" class="form-control" placeholder="e.g. Dynamic" value="<?= htmlspecialchars($editing['title'] ?? '') ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category</label>
                            <input type="text" name="category" class="form-control" placeholder="e.g. WEB DESIGNING" value="<?= htmlspecialchars($editing['category'] ?? '') ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Client</label>
                            <input type="text" name="client" class="form-control" placeholder="e.g. Raven Studio" value="<?= htmlspecialchars($editing['client'] ?? '') ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Year</label>
                            <input type="text" name="year" class="form-control" placeholder="e.g. 2023" value="<?= htmlspecialchars($editing['year'] ?? '') ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Services</label>
                            <input type="text" name="services" class="form-control" placeholder="e.g. Web Design" value="<?= htmlspecialchars($editing['services'] ?? '') ?>">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Technologies (comma sep)</label>
                            <input type="text" name="technologies" class="form-control" placeholder="e.g. HTML, CSS, React" value="<?= htmlspecialchars($editing['technologies'] ?? '') ?>">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Project URL Base</label>
                            <input type="text" name="project_url" class="form-control" placeholder="e.g. workdetail-page/index.php" value="<?= htmlspecialchars($editing['project_url'] ?? '') ?>">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Project Description</label>
                            <textarea name="description" class="form-control" rows="4"><?= htmlspecialchars($editing['description'] ?? '') ?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Main Image</label>
                            <?php if (!empty($editing['image_path'])): ?>
                                <div class="mb-1"><img src="../<?= htmlspecialchars($editing['image_path']) ?>" style="height:60px;border-radius:6px;object-fit:cover;" alt=""></div>
                            <?php endif; ?>
                            <input type="file" name="image_path" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Detail Image 1</label>
                            <?php if (!empty($editing['image2_path'])): ?>
                                <div class="mb-1"><img src="../<?= htmlspecialchars($editing['image2_path']) ?>" style="height:60px;border-radius:6px;object-fit:cover;" alt=""></div>
                            <?php endif; ?>
                            <input type="file" name="image2_path" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Detail Image 2</label>
                            <?php if (!empty($editing['image3_path'])): ?>
                                <div class="mb-1"><img src="../<?= htmlspecialchars($editing['image3_path']) ?>" style="height:60px;border-radius:6px;object-fit:cover;" alt=""></div>
                            <?php endif; ?>
                            <input type="file" name="image3_path" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Detail Image 3</label>
                            <?php if (!empty($editing['image4_path'])): ?>
                                <div class="mb-1"><img src="../<?= htmlspecialchars($editing['image4_path']) ?>" style="height:60px;border-radius:6px;object-fit:cover;" alt=""></div>
                            <?php endif; ?>
                            <input type="file" name="image4_path" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label">Display Order</label>
                            <input type="number" name="display_order" class="form-control" value="<?= htmlspecialchars($editing['display_order'] ?? 0) ?>">
                        </div>
                        <div class="col-6 mb-3 d-flex align-items-end">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" <?= !empty($editing['is_featured']) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="is_featured">Featured</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100"><?= $editing ? 'Update Project' : 'Add Project' ?></button>
                    <?php if ($editing): ?>
                        <a href="projects.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <!-- List -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-transparent"><h5 class="mb-0">All Projects</h5></div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0 align-middle">
                    <thead><tr><th>Image</th><th>Title</th><th>Category</th><th>Featured</th><th>Actions</th></tr></thead>
                    <tbody>
                    <?php foreach ($projects as $p): ?>
                        <tr>
                            <td>
                                <?php if (!empty($p['image_path'])): ?>
                                    <img src="../<?= htmlspecialchars($p['image_path']) ?>" style="height:45px;width:60px;object-fit:cover;border-radius:6px;" alt="">
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($p['title']) ?></td>
                            <td><span class="badge bg-secondary"><?= htmlspecialchars($p['category']) ?></span></td>
                            <td><?= $p['is_featured'] ? '<span class="badge bg-success">Yes</span>' : '' ?></td>
                            <td>
                                <a href="projects.php?edit=<?= $p['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                <a href="projects.php?delete=<?= $p['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this project?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
