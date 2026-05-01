<?php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit(); }
require_once '../include/db.php';

// Delete
if (isset($_GET['delete'])) {
    $pdo->prepare("DELETE FROM blogs WHERE id=?")->execute([(int)$_GET['delete']]);
    header("Location: blogs.php?deleted=1"); exit();
}

// Add / Edit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title         = trim($_POST['title']);
    $blog_url      = trim($_POST['blog_url']);
    $content       = $_POST['content'] ?? ''; // From TinyMCE
    $excerpt       = trim($_POST['excerpt'] ?? '');
    $author_name   = trim($_POST['author_name'] ?? '');
    $category      = trim($_POST['category'] ?? '');
    $tags          = trim($_POST['tags'] ?? '');
    $display_order = (int)$_POST['display_order'];
    $id            = (int)($_POST['id'] ?? 0);

    $image_path = trim($_POST['existing_image'] ?? '');
    if (!empty($_FILES['image_path']['name'])) {
        $ext = pathinfo($_FILES['image_path']['name'], PATHINFO_EXTENSION);
        $new_name = 'blog_' . time() . '.' . $ext;
        $dest = '../wp-content/uploads/' . $new_name;
        if (move_uploaded_file($_FILES['image_path']['tmp_name'], $dest)) {
            $image_path = 'wp-content/uploads/' . $new_name;
        }
    }

    if ($id) {
        $pdo->prepare("UPDATE blogs SET title=?, image_path=?, blog_url=?, content=?, excerpt=?, author_name=?, category=?, tags=?, display_order=? WHERE id=?")
            ->execute([$title, $image_path, $blog_url, $content, $excerpt, $author_name, $category, $tags, $display_order, $id]);
    } else {
        $pdo->prepare("INSERT INTO blogs (title, image_path, blog_url, content, excerpt, author_name, category, tags, display_order) VALUES (?,?,?,?,?,?,?,?,?)")
            ->execute([$title, $image_path, $blog_url, $content, $excerpt, $author_name, $category, $tags, $display_order]);
    }
    header("Location: blogs.php?saved=1"); exit();
}

$blogs = $pdo->query("SELECT * FROM blogs ORDER BY display_order, created_at DESC")->fetchAll();

$editing = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM blogs WHERE id=?");
    $stmt->execute([(int)$_GET['edit']]);
    $editing = $stmt->fetch();
}

include 'header.php';
?>
<!-- CKEditor 5 CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#blog-content'))
        .then(editor => {
            window.blogEditor = editor;
        })
        .catch(error => {
            console.error(error);
        });

    async function generateAIContent() {
        const topic = document.getElementById('ai-topic').value;
        const btn = document.getElementById('ai-gen-btn');
        
        if(!topic) {
            alert('Please enter a topic first!');
            return;
        }

        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Generating...';

        try {
            const response = await fetch('api_ai_generate.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'topic=' + encodeURIComponent(topic)
            });
            
            const rawText = await response.text();
            console.log('Raw Response:', rawText);
            
            let data;
            try {
                data = JSON.parse(rawText);
            } catch (e) {
                throw new Error('Invalid JSON: ' + rawText.substring(0, 100));
            }

            if(data.success) {
                document.querySelector('input[name="title"]').value = data.title;
                document.querySelector('textarea[name="excerpt"]').value = data.excerpt;
                
                if (window.blogEditor) {
                    window.blogEditor.setData(data.content);
                } else {
                    // Fallback if CKEditor isn't ready
                    document.querySelector('#blog-content').value = data.content;
                }
                
                // Auto-generate slug from title
                const slug = data.title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
                document.querySelector('input[name="blog_url"]').value = slug;

                bootstrap.Collapse.getInstance(document.getElementById('aiCollapse')).hide();
            } else {
                alert('AI Error: ' + data.error);
            }
        } catch (e) {
            console.error(e);
            alert('Connection Error: ' + e.message);
        } finally {
            btn.disabled = false;
            btn.innerHTML = '✨ Generate Post';
        }
    }
</script>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Blogs</h2>
    <?php if (isset($_GET['saved'])): ?><div class="alert alert-success py-2 px-3 mb-0">Saved!</div><?php endif; ?>
    <?php if (isset($_GET['deleted'])): ?><div class="alert alert-danger py-2 px-3 mb-0">Deleted.</div><?php endif; ?>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><?= $editing ? 'Edit Blog' : 'Add Blog' ?></h5>
                <?php if (!$editing): ?>
                    <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#aiCollapse">
                        ✨ AI Assistant
                    </button>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <!-- AI Assistant Collapse -->
                <div class="collapse mb-4" id="aiCollapse">
                    <div class="p-3 bg-light rounded border">
                        <label class="form-label fw-bold small text-uppercase">What should the post be about?</label>
                        <div class="input-group">
                            <input type="text" id="ai-topic" class="form-control" placeholder="e.g. Modern UI Trends in 2024">
                            <button class="btn btn-primary" type="button" id="ai-gen-btn" onclick="generateAIContent()">✨ Generate Post</button>
                        </div>
                        <div class="form-text mt-2 small text-muted">The AI will generate a title, excerpt, and full body content for you.</div>
                    </div>
                </div>

                <form method="POST" enctype="multipart/form-data">
                    <?php if ($editing): ?>
                        <input type="hidden" name="id" value="<?= $editing['id'] ?>">
                        <input type="hidden" name="existing_image" value="<?= htmlspecialchars($editing['image_path'] ?? '') ?>">
                    <?php endif; ?>
                    <div class="mb-3">
                        <label class="form-label">Blog Title</label>
                        <input type="text" name="title" class="form-control" placeholder="e.g. My Thoughts on DevOps" value="<?= htmlspecialchars($editing['title'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Excerpt / Short Intro</label>
                        <textarea name="excerpt" class="form-control" rows="2" placeholder="Brief summary for listing page..."><?= htmlspecialchars($editing['excerpt'] ?? '') ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Blog Content (Body)</label>
                        <textarea name="content" id="blog-content" class="form-control" rows="10"><?= htmlspecialchars($editing['content'] ?? '') ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category</label>
                            <input type="text" name="category" class="form-control" placeholder="e.g. Technology" value="<?= htmlspecialchars($editing['category'] ?? '') ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tags (comma sep)</label>
                            <input type="text" name="tags" class="form-control" placeholder="e.g. devops, php" value="<?= htmlspecialchars($editing['tags'] ?? '') ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Author Name</label>
                        <input type="text" name="author_name" class="form-control" value="<?= htmlspecialchars($editing['author_name'] ?? ($profile['full_name'] ?? '')) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Reference ID (e.g. slug for auto-link)</label>
                        <input type="text" name="blog_url" class="form-control" placeholder="e.g. my-first-post" value="<?= htmlspecialchars($editing['blog_url'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Blog Cover Image</label>
                        <?php if (!empty($editing['image_path'])): ?>
                            <div class="mb-1"><img src="../<?= htmlspecialchars($editing['image_path']) ?>" style="height:60px;border-radius:6px;object-fit:cover;" alt=""></div>
                        <?php endif; ?>
                        <input type="file" name="image_path" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Display Order</label>
                        <input type="number" name="display_order" class="form-control" value="<?= htmlspecialchars($editing['display_order'] ?? 0) ?>">
                    </div>
                    <button type="submit" class="btn btn-primary w-100"><?= $editing ? 'Update Blog' : 'Add Blog' ?></button>
                    <?php if ($editing): ?>
                        <a href="blogs.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-transparent"><h5 class="mb-0">All Blogs</h5></div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0 align-middle">
                    <thead><tr><th>Image</th><th>Title</th><th>URL</th><th>Order</th><th>Actions</th></tr></thead>
                    <tbody>
                    <?php foreach ($blogs as $b): ?>
                        <tr>
                            <td>
                                <?php if (!empty($b['image_path'])): ?>
                                    <img src="../<?= htmlspecialchars($b['image_path']) ?>" style="height:45px;width:60px;object-fit:cover;border-radius:6px;" alt="">
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($b['title']) ?></td>
                            <td><small class="text-muted"><?= htmlspecialchars($b['blog_url']) ?></small></td>
                            <td><?= $b['display_order'] ?></td>
                            <td>
                                <a href="blogs.php?edit=<?= $b['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                <a href="blogs.php?delete=<?= $b['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this blog?')">Delete</a>
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
