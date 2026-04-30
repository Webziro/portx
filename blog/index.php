<?php 
    include "../include/title.php";
    require_once "../include/db.php";

    // Fetch all blogs from DB
    $blogs = $pdo->query("SELECT * FROM blogs ORDER BY display_order, created_at DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<!-- Head tag starts -->
    <?php 
        $title = "Blog - " . $title; 
        include "../include/head.php";
    ?> 
<!-- Head tag end -->

<body
    class="wp-singular page-template page-template-page-templates page-template-main-work page-template-page-templatesmain-work-php page page-id-1084 wp-theme-gridx elementor-default elementor-kit-16 elementor-page elementor-page-1084">

    <div id="preloader" class="preloader">
        <div class="black_wall"></div>
        <div class="loader"></div>
    </div>

    <main class="main-workspage">

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

        <!-- Blogs -->
        <section class="projects-area">
            <div class="container">
                <h1 class="section-heading mb-40" data-aos="fade-up" style="text-align: center;">
                    <img decoding="async" src="../wp-content/themes/gridx/assets/images/star-2.png" alt="img">
                    All Blogs
                    <img decoding="async" src="../wp-content/themes/gridx/assets/images/star-2.png" alt="img">
                </h1>

                <div class="row">
                    <?php foreach ($blogs as $b): 
                        $imgSrc = htmlspecialchars('../' . $b['image_path']);
                        $url    = "detail?id=" . $b['id'];
                    ?>
                    <div class="col-md-4 mb-24" data-aos="zoom-in">
                        <div class="project-item shadow-box">
                            <a class="overlay-link" href="<?= $url ?>"></a>
                            <img decoding="async" src="../wp-content/themes/gridx/assets/images/bg1.png" alt="img" class="bg-img">
                            <div class="project-img">
                                <img decoding="async" class="proj-img" src="<?= $imgSrc ?>" alt="">
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="project-info">
                                    <p><?= htmlspecialchars($b['category']) ?> - <?= date('M d, Y', strtotime($b['created_at'])) ?></p>
                                    <h2><?= htmlspecialchars($b['title']) ?></h2>
                                </div>
                                <a href="<?= $url ?>" class="project-btn">
                                    <img decoding="async" src="../wp-content/themes/gridx/assets/images/icon.svg" alt="img">
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
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
