<?php 
    include "../include/title.php";
    require_once "../include/db.php";

    $id = $_GET['id'] ?? 0;
    
    // Fetch profile for author bio
    $profile = $pdo->query("SELECT * FROM profile WHERE id = 1")->fetch();

    $stmt = $pdo->prepare("SELECT * FROM blogs WHERE id = ?");
    $stmt->execute([$id]);
    $blog = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$blog) {
        header("Location: ./");
        exit();
    }

    // Fetch recent posts for sidebar
    $recentPosts = $pdo->query("SELECT id, title FROM blogs WHERE id != $id ORDER BY created_at DESC LIMIT 5")->fetchAll();
    // Fetch categories
    $categories = $pdo->query("SELECT category, COUNT(*) as count FROM blogs GROUP BY category")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<!-- Head tag starts -->
    <?php 
        $title = $blog['title'] . " - " . $title; 
        include "../include/head.php";
    ?> 
<!-- Head tag end -->

<body class="wp-singular post-template-default single single-post wp-theme-gridx elementor-default elementor-kit-16">

    <div id="preloader" class="preloader">
        <div class="black_wall"></div>
        <div class="loader"></div>
    </div>

    <main class="main-workdetails-page">

        <!-- Header -->
        <header class="header-area">
            <div class="container">
                <div class="gx-row d-flex align-items-center justify-content-between">
                    <a href="../" class="logo">
                        <img src="../wp-content/uploads/logo.png" alt="Logo">
                    </a>
                    <?php include "../include/navigation.php"; ?>
                    <!-- Dynamic cv link -->
                    <a href="<?php echo htmlspecialchars($profile['cv_url'] ?? '#'); ?>" class="theme-btn"
                        target="_blank">Download CV</a>
                    <div class="show-menu">
                        <span></span><span></span><span></span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Breadcrumb -->
        <section class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content" data-aos="fade-up">
                    <p><a href="../">HOME</a> - <a href="./">BLOG</a> - <?= htmlspecialchars($blog['title']) ?></p>
                    <h1 class="section-heading">
                        <img src="../wp-content/themes/gridx/assets/images/star-2.png" alt="Star">
                        <?= htmlspecialchars($blog['title']) ?>
                        <img src="../wp-content/themes/gridx/assets/images/star-2.png" alt="Star">
                    </h1>
                </div>
            </div>
        </section>

        <!-- Blog Content -->
        <section class="blog-details-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="blog-details-content">
                            <div class="img-box" data-aos="zoom-in">
                                <img src="../<?= htmlspecialchars($blog['image_path']) ?>" class="attachment-gridx-blog-details size-gridx-blog-details wp-post-image" alt="" style="width:100%; border-radius:30px; margin-bottom:30px;">
                            </div>
                            <span class="meta" data-aos="fade-up">
                                <?= date('F j, Y', strtotime($blog['created_at'])) ?> - 
                                By <strong><?= htmlspecialchars($blog['author_name'] ?: 'Stanley Amaziro') ?></strong> - 
                                <a href="#"><?= htmlspecialchars($blog['category']) ?></a>
                            </span>
                            
                            <div class="blog-main-content" data-aos="fade-up" style="margin-top:20px; color: #bcbcbc; font-size: 16px; line-height: 1.6;">
                                <?= $blog['content'] ?>
                            </div>

                            <!-- About the Author Section -->
                            <div class="author-profile-box shadow-box" data-aos="fade-up" style="margin-top:50px; padding: 40px; background: #0f0f0f; border-radius: 30px; display: flex; align-items: center; gap: 30px;">
                                <div class="author-img" style="flex: 0 0 120px;">
                                    <img src="../<?= htmlspecialchars($profile['hero_image'] ?? 'wp-content/uploads/2023/04/me.png') ?>" alt="Stanley" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 2px solid #5b78f6;">
                                </div>
                                <div class="author-info">
                                    <h5 style="color: #5b78f6; font-size: 14px; text-transform: uppercase;">About the Author</h5>
                                    <h2 style="font-size: 24px; margin: 10px 0;"><?= htmlspecialchars($profile['full_name'] ?? 'Stanley Amaziro') ?></h2>
                                    <p style="color: #bcbcbc; font-size: 15px; line-height: 1.5;"><?= htmlspecialchars($profile['bio'] ?? '') ?></p>
                                </div>
                            </div>

                            <?php if (!empty($blog['tags'])): ?>
                            <div class="tags" data-aos="fade-up" style="margin-top:30px;">
                                <?php foreach (explode(',', $blog['tags']) as $tag): ?>
                                <a href="#" style="display:inline-block; padding: 5px 15px; background: #1a1a1a; border-radius: 20px; margin-right: 10px; color: #fff; font-size: 14px;"><?= trim($tag) ?></a>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>

                            <!-- Comments Section -->
                            <div class="comments-and-form-wrap" style="margin-top:60px;">
                                <div class="comments-and-form-wrap-inner shadow-box" style="padding: 40px; background: #0f0f0f; border-radius: 30px;">
                                    <h2>Leave a Reply</h2>
                                    <form action="#" method="post" class="comment-form" style="margin-top:30px;">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <input type="text" name="author" placeholder="Name" class="form-control" style="background: #1a1a1a; border: none; padding: 15px; color: #fff;">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="email" name="email" placeholder="Email" class="form-control" style="background: #1a1a1a; border: none; padding: 15px; color: #fff;">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <textarea name="comment" placeholder="Your Message" class="form-control" rows="5" style="background: #1a1a1a; border: none; padding: 15px; color: #fff;"></textarea>
                                        </div>
                                        <button type="submit" class="theme-btn" style="border: none;">Send Message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-md-4">
                        <div class="blog-sidebar">
                            <div class="blog-sidebar-inner">
                                <div class="blog-sidebar-widget shadow-box mb-30" data-aos="zoom-in" style="padding: 30px; background: #0f0f0f; border-radius: 30px;">
                                    <h3>Search</h3>
                                    <form action="./" method="get" class="d-flex" style="margin-top:15px;">
                                        <input type="text" name="s" placeholder="Search..." class="form-control" style="background: #1a1a1a; border: none; padding: 10px; color: #fff; border-radius: 10px 0 0 10px;">
                                        <button type="submit" class="btn btn-primary" style="border-radius: 0 10px 10px 0;">Go</button>
                                    </form>
                                </div>

                                <div class="blog-sidebar-widget shadow-box mb-30" data-aos="zoom-in" style="padding: 30px; background: #0f0f0f; border-radius: 30px;">
                                    <h3>Recent Posts</h3>
                                    <ul style="list-style: none; padding: 0; margin-top: 15px;">
                                        <?php foreach ($recentPosts as $rp): ?>
                                        <li style="margin-bottom: 10px;">
                                            <a href="detail?id=<?= $rp['id'] ?>" style="color: #bcbcbc; transition: 0.3s;"><?= htmlspecialchars($rp['title']) ?></a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>

                                <div class="blog-sidebar-widget shadow-box mb-30" data-aos="zoom-in" style="padding: 30px; background: #0f0f0f; border-radius: 30px;">
                                    <h3>Categories</h3>
                                    <ul style="list-style: none; padding: 0; margin-top: 15px;">
                                        <?php foreach ($categories as $cat): ?>
                                        <li style="margin-bottom: 10px;">
                                            <a href="#" style="color: #bcbcbc; transition: 0.3s;"><?= htmlspecialchars($cat['category']) ?> (<?= $cat['count'] ?>)</a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include '../include/footer.php'; ?>
    </main>

    <script src="../wp-content/themes/gridx/assets/js/bootstrap.bundle.min32d4.js?ver=6.8.3" id="bootstrap-js"></script>
    <script src="../wp-content/themes/gridx/assets/js/aos32d4.js?ver=6.8.3" id="aos-js"></script>
    <script src="../wp-content/themes/gridx/assets/js/main32d4.js?ver=6.8.3" id="gridx-main-js"></script>
    <script>AOS.init({ duration: 1500, once: true });</script>
</body>
</html>
