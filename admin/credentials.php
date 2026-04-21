<?php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit(); }
require_once '../include/db.php';

// Delete
if (isset($_GET['delete'])) {
    $pdo->prepare("DELETE FROM credentials WHERE id=?")->execute([(int)$_GET['delete']]);
    header("Location: credentials.php?deleted=1"); exit();
}

// Add / Edit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title         = trim($_POST['title']);
    $subtitle      = trim($_POST['subtitle']);
    $type          = trim($_POST['type']);
    $display_order = (int)$_POST['display_order'];
    $id            = (int)($_POST['id'] ?? 0);

    $image_path = trim($_POST['existing_image'] ?? '');
    if (!empty($_FILES['image_path']['name'])) {
        $ext = pathinfo($_FILES['image_path']['name'], PATHINFO_EXTENSION);
        $new_name = 'cred_' . time() . '.' . $ext;
        $dest = '../wp-content/uploads/' . $new_name;
        if (move_uploaded_file($_FILES['image_path']['tmp_name'], $dest)) {
            $image_path = 'wp-content/uploads/' . $new_name;
        }
    }

    if ($id) {
        $pdo->prepare("UPDATE credentials SET title=?, subtitle=?, image_path=?, type=?, display_order=? WHERE id=?")
            ->execute([$title, $subtitle, $image_path, $type, $display_order, $id]);
    } else {
        $pdo->prepare("INSERT INTO credentials (title, subtitle, image_path, type, display_order) VALUES (?,?,?,?,?)")
            ->execute([$title, $subtitle, $image_path, $type, $display_order]);
    }
    header("Location: credentials.php?saved=1"); exit();
}

$credentials = $pdo->query("SELECT * FROM credentials ORDER BY type, display_order")->fetchAll();

$editing = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM credentials WHERE id=?");
    $stmt->execute([(int)$_GET['edit']]);
    $editing = $stmt->fetch();
}

include 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Credentials</h2>
    <?php if (isset($_GET['saved'])): ?><div class="alert alert-success py-2 px-3 mb-0">Saved!</div><?php endif; ?>
    <?php if (isset($_GET['deleted'])): ?><div class="alert alert-danger py-2 px-3 mb-0">Deleted.</div><?php endif; ?>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-transparent">
                <h5 class="mb-0"><?= $editing ? 'Edit Credential' : 'Add Credential' ?></h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <?php if ($editing): ?>
                        <input type="hidden" name="id" value="<?= $editing['id'] ?>">
                        <input type="hidden" name="existing_image" value="<?= htmlspecialchars($editing['image_path'] ?? '') ?>">
                    <?php endif; ?>
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="e.g. BSc. Computer Science" value="<?= htmlspecialchars($editing['title'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subtitle / Details</label>
                        <input type="text" name="subtitle" class="form-control" placeholder="e.g. University of Lagos, 2020" value="<?= htmlspecialchars($editing['subtitle'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select name="type" class="form-select">
                            <option value="education"   <?= (($editing['type'] ?? '') == 'education')   ? 'selected' : '' ?>>Education</option>
                            <option value="experience"  <?= (($editing['type'] ?? '') == 'experience')  ? 'selected' : '' ?>>Experience</option>
                            <option value="skill"       <?= (($editing['type'] ?? '') == 'skill')       ? 'selected' : '' ?>>Skill</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image (optional)</label>
                        <?php if (!empty($editing['image_path'])): ?>
                            <div class="mb-1"><img src="../<?= htmlspecialchars($editing['image_path']) ?>" style="height:60px;border-radius:6px;object-fit:cover;" alt=""></div>
                        <?php endif; ?>
                        <input type="file" name="image_path" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Display Order</label>
                        <input type="number" name="display_order" class="form-control" value="<?= htmlspecialchars($editing['display_order'] ?? 0) ?>">
                    </div>
                    <button type="submit" class="btn btn-primary w-100"><?= $editing ? 'Update Credential' : 'Add Credential' ?></button>
                    <?php if ($editing): ?>
                        <a href="credentials.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-transparent"><h5 class="mb-0">All Credentials</h5></div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0 align-middle">
                    <thead><tr><th>Image</th><th>Title</th><th>Subtitle</th><th>Type</th><th>Actions</th></tr></thead>
                    <tbody>
                    <?php foreach ($credentials as $c): ?>
                        <tr>
                            <td>
                                <?php if (!empty($c['image_path'])): ?>
                                    <img src="../<?= htmlspecialchars($c['image_path']) ?>" style="height:45px;width:45px;object-fit:cover;border-radius:50%;" alt="">
                                <?php else: ?>
                                    <span class="badge bg-secondary">—</span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($c['title']) ?></td>
                            <td><small class="text-muted"><?= htmlspecialchars($c['subtitle']) ?></small></td>
                            <td>
                                <?php
                                $badge = ['education'=>'info','experience'=>'primary','skill'=>'success'];
                                $t = $c['type'];
                                ?>
                                <span class="badge bg-<?= $badge[$t] ?? 'secondary' ?>"><?= ucfirst($t) ?></span>
                            </td>
                            <td>
                                <a href="credentials.php?edit=<?= $c['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                <a href="credentials.php?delete=<?= $c['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this credential?')">Delete</a>
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
