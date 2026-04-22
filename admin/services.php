<?php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit(); }
require_once '../include/db.php';

// Delete
if (isset($_GET['delete'])) {
    $pdo->prepare("DELETE FROM services WHERE id=?")->execute([(int)$_GET['delete']]);
    header("Location: services.php?deleted=1"); exit();
}

// Add / Edit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $icon_class    = trim($_POST['icon_class']);
    $label         = trim($_POST['label']);
    $description   = trim($_POST['description'] ?? '');
    $display_order = (int)$_POST['display_order'];
    $id            = (int)($_POST['id'] ?? 0);

    if ($id) {
        $pdo->prepare("UPDATE services SET icon_class=?, label=?, description=?, display_order=? WHERE id=?")
            ->execute([$icon_class, $label, $description, $display_order, $id]);
    } else {
        $pdo->prepare("INSERT INTO services (icon_class, label, description, display_order) VALUES (?,?,?,?)")
            ->execute([$icon_class, $label, $description, $display_order]);
    }
    header("Location: services.php?saved=1"); exit();
}

$services = $pdo->query("SELECT * FROM services ORDER BY display_order")->fetchAll();

$editing = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM services WHERE id=?");
    $stmt->execute([(int)$_GET['edit']]);
    $editing = $stmt->fetch();
}

include 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Services</h2>
    <?php if (isset($_GET['saved'])): ?><div class="alert alert-success py-2 px-3 mb-0">Saved!</div><?php endif; ?>
    <?php if (isset($_GET['deleted'])): ?><div class="alert alert-danger py-2 px-3 mb-0">Deleted.</div><?php endif; ?>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-transparent">
                <h5 class="mb-0"><?= $editing ? 'Edit Service' : 'Add Service' ?></h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <?php if ($editing): ?>
                        <input type="hidden" name="id" value="<?= $editing['id'] ?>">
                    <?php endif; ?>
                    <div class="mb-3">
                        <label class="form-label">Icon Class</label>
                        <input type="text" name="icon_class" class="form-control" placeholder="e.g. iconoir-internet" value="<?= htmlspecialchars($editing['icon_class'] ?? '') ?>">
                        <small class="text-muted">Use Iconoir class names from <a href="https://iconoir.com/" target="_blank">iconoir.com</a></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Label</label>
                        <input type="text" name="label" class="form-control" placeholder="e.g. Web & App Dev." value="<?= htmlspecialchars($editing['label'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Brief description of this service..."><?= htmlspecialchars($editing['description'] ?? '') ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Display Order</label>
                        <input type="number" name="display_order" class="form-control" value="<?= htmlspecialchars($editing['display_order'] ?? 0) ?>">
                    </div>
                    <button type="submit" class="btn btn-primary w-100"><?= $editing ? 'Update Service' : 'Add Service' ?></button>
                    <?php if ($editing): ?>
                        <a href="services.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-transparent"><h5 class="mb-0">All Services</h5></div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0 align-middle">
                    <thead><tr><th>#</th><th>Icon</th><th>Label</th><th>Order</th><th>Actions</th></tr></thead>
                    <tbody>
                    <?php foreach ($services as $s): ?>
                        <tr>
                            <td><?= $s['id'] ?></td>
                            <td><i class="<?= htmlspecialchars($s['icon_class']) ?>" style="font-size:1.5rem;"></i></td>
                            <td><?= htmlspecialchars($s['label']) ?></td>
                            <td><?= $s['display_order'] ?></td>
                            <td>
                                <a href="services.php?edit=<?= $s['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                <a href="services.php?delete=<?= $s['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this service?')">Delete</a>
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
