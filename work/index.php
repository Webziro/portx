<?php 
    include "../include/title.php";
    require_once "../include/db.php";

    // Fetch all projects from DB, ordered by display_order
    $projects = $pdo->query("SELECT * FROM projects ORDER BY display_order, created_at DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<!-- Head tag starts -->
    <?php 
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
                        <img src="../wp-content/themes/gridx/assets/images/logo.svg" alt="Logo">
                    </a>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <?php 
                        include "../include/navigation.php";
                    ?>
                    <a href="../contact-info/index.php" class="theme-btn">Let s talk</a>

                    <!-- End Navigation -->

                    <div class="show-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Projects -->
        <section class="projects-area">
            <div class="container">
                <div data-elementor-type="wp-page" data-elementor-id="1084" class="elementor elementor-1084">
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-fa0411b row elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="fa0411b" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-no">

                            <!-- Left sidebar column (visible on mobile only) -->
                            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-f65ef3d col-md-4"
                                data-id="f65ef3d" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">

                                    <!-- Mobile heading -->
                                    <div class="elementor-element elementor-element-25358b2 elementor-hidden-desktop elementor-hidden-tablet elementor-widget elementor-widget-gridxdaworktitlebox"
                                        data-id="25358b2" data-element_type="widget"
                                        data-widget_type="gridxdaworktitlebox.default">
                                        <div class="elementor-widget-container">
                                            <h1 class="section-heading" data-aos="fade-up">
                                                <img decoding="async"
                                                    src="../wp-content/themes/gridx/assets/images/star-2.png" alt="img">
                                                All Projects
                                                <img decoding="async"
                                                    src="../wp-content/themes/gridx/assets/images/star-2.png" alt="img">
                                            </h1>
                                            <script>AOS.init({ duration: 1500, once: true });</script>
                                        </div>
                                    </div>

                                    <!-- Sidebar: first 2 projects -->
                                    <div class="elementor-element elementor-element-ec9f060 elementor-widget elementor-widget-gridxdaworksidebarbox"
                                        data-id="ec9f060" data-element_type="widget"
                                        data-widget_type="gridxdaworksidebarbox.default">
                                        <div class="elementor-widget-container">
                                            <?php foreach (array_slice($projects, 0, 2) as $p): 
                                                $imgSrc = htmlspecialchars('../' . $p['image_path']);
                                                $url    = htmlspecialchars('../' . $p['project_url']);
                                            ?>
                                            <div data-aos="zoom-in">
                                                <div class="project-item shadow-box">
                                                    <a class="overlay-link" href="<?= $url ?>"></a>
                                                    <img decoding="async"
                                                        src="../wp-content/themes/gridx/assets/images/bg1.png" alt="img"
                                                        class="bg-img">
                                                    <div class="project-img">
                                                        <img decoding="async" class="proj-img" src="<?= $imgSrc ?>" alt="">
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="project-info">
                                                            <p><?= htmlspecialchars($p['category']) ?></p>
                                                            <h2><?= htmlspecialchars($p['title']) ?></h2>
                                                        </div>
                                                        <a href="<?= $url ?>" class="project-btn">
                                                            <img decoding="async"
                                                                src="../wp-content/themes/gridx/assets/images/icon.svg"
                                                                alt="img">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                            <script>AOS.init({ duration: 1500, once: true });</script>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Main content column -->
                            <div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-2c8de81"
                                data-id="2c8de81" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">

                                    <!-- Desktop heading -->
                                    <div class="elementor-element elementor-element-1c546af elementor-hidden-mobile elementor-widget elementor-widget-gridxdaworktitlebox"
                                        data-id="1c546af" data-element_type="widget"
                                        data-widget_type="gridxdaworktitlebox.default">
                                        <div class="elementor-widget-container">
                                            <h1 class="section-heading" data-aos="fade-up">
                                                <img decoding="async"
                                                    src="../wp-content/themes/gridx/assets/images/star-2.png" alt="img">
                                                All Projects
                                                <img decoding="async"
                                                    src="../wp-content/themes/gridx/assets/images/star-2.png" alt="img">
                                            </h1>
                                            <script>AOS.init({ duration: 1500, once: true });</script>
                                        </div>
                                    </div>

                                    <!-- Main projects grid: all remaining projects in 2 columns -->
                                    <section
                                        class="elementor-section elementor-inner-section elementor-element elementor-element-9237a9c elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                        data-id="9237a9c" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-custom">

                                            <!-- Column A: odd items (0, 2, 4...) -->
                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-bc7afa9"
                                                data-id="bc7afa9" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <?php
                                                    $mainProjects = array_slice($projects, 2); // skip sidebar 2
                                                    $colA = array_filter($mainProjects, fn($i) => $i % 2 === 0, ARRAY_FILTER_USE_KEY);
                                                    foreach ($colA as $p):
                                                        $imgSrc = htmlspecialchars('../' . $p['image_path']);
                                                        $url    = htmlspecialchars('../' . $p['project_url']);
                                                    ?>
                                                    <div class="d-flex align-items-start gap-24">
                                                        <div data-aos="zoom-in" class="flex-1">
                                                            <div class="project-item shadow-box">
                                                                <a class="overlay-link" href="<?= $url ?>"></a>
                                                                <img decoding="async"
                                                                    src="../wp-content/themes/gridx/assets/images/bg1.png"
                                                                    alt="img" class="bg-img">
                                                                <div class="project-img">
                                                                    <img decoding="async" class="proj-img" src="<?= $imgSrc ?>" alt="">
                                                                </div>
                                                                <div class="d-flex align-items-center justify-content-between">
                                                                    <div class="project-info">
                                                                        <p><?= htmlspecialchars($p['category']) ?></p>
                                                                        <h2><?= htmlspecialchars($p['title']) ?></h2>
                                                                    </div>
                                                                    <a href="<?= $url ?>" class="project-btn">
                                                                        <img decoding="async"
                                                                            src="../wp-content/themes/gridx/assets/images/icon.svg"
                                                                            alt="img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>AOS.init({ duration: 1500, once: true });</script>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>

                                            <!-- Column B: even items (1, 3, 5...) -->
                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-6990a12"
                                                data-id="6990a12" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <?php
                                                    $colB = array_filter($mainProjects, fn($i) => $i % 2 !== 0, ARRAY_FILTER_USE_KEY);
                                                    foreach ($colB as $p):
                                                        $imgSrc = htmlspecialchars('../' . $p['image_path']);
                                                        $url    = htmlspecialchars('../' . $p['project_url']);
                                                    ?>
                                                    <div class="d-flex align-items-start gap-24">
                                                        <div data-aos="zoom-in" class="flex-1">
                                                            <div class="project-item shadow-box">
                                                                <a class="overlay-link" href="<?= $url ?>"></a>
                                                                <img decoding="async"
                                                                    src="../wp-content/themes/gridx/assets/images/bg1.png"
                                                                    alt="img" class="bg-img">
                                                                <div class="project-img">
                                                                    <img decoding="async" class="proj-img" src="<?= $imgSrc ?>" alt="">
                                                                </div>
                                                                <div class="d-flex align-items-center justify-content-between">
                                                                    <div class="project-info">
                                                                        <p><?= htmlspecialchars($p['category']) ?></p>
                                                                        <h2><?= htmlspecialchars($p['title']) ?></h2>
                                                                    </div>
                                                                    <a href="<?= $url ?>" class="project-btn">
                                                                        <img decoding="async"
                                                                            src="../wp-content/themes/gridx/assets/images/icon.svg"
                                                                            alt="img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>AOS.init({ duration: 1500, once: true });</script>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <?php 
            include "../include/footer.php";
        ?>

    </main>

<script type="speculationrules">
{"prefetch":[{"source":"document","where":{"and":[{"href_matches":"\/gridx\/*"},{"not":{"href_matches":["\/gridx\/wp-*.php","\/gridx\/wp-admin\/*","\/gridx\/wp-content\/uploads\/*","\/gridx\/wp-content\/*","\/gridx\/wp-content\/plugins\/*","\/gridx\/wp-content\/themes\/gridx\/*","\/gridx\/*\\?(.+)"]}},{"not":{"selector_matches":"a[rel~=\"nofollow\"]"}},{"not":{"selector_matches":".no-prefetch, .no-prefetch a"}}]},"eagerness":"conservative"}]}
</script>
    <script>
        const lazyloadRunObserver = () => {
            const lazyloadBackgrounds = document.querySelectorAll(`.e-con.e-parent:not(.e-lazyloaded)`);
            const lazyloadBackgroundObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        let lazyloadBackground = entry.target;
                        if (lazyloadBackground) {
                            lazyloadBackground.classList.add('e-lazyloaded');
                        }
                        lazyloadBackgroundObserver.unobserve(entry.target);
                    }
                });
            }, { rootMargin: '200px 0px 200px 0px' });
            lazyloadBackgrounds.forEach((lazyloadBackground) => {
                lazyloadBackgroundObserver.observe(lazyloadBackground);
            });
        };
        const events = [
            'DOMContentLoaded',
            'elementor/lazyload/observe',
        ];
        events.forEach((event) => {
            document.addEventListener(event, lazyloadRunObserver);
        });
    </script>
    <script src="../wp-includes/js/dist/hooks.min4fdd.js?ver=4d63a3d491d11ffd8ac6" id="wp-hooks-js"></script>
    <script src="../wp-includes/js/dist/i18n.minc33c.js?ver=5e580eb46a90c2b997e6" id="wp-i18n-js"></script>
    <script id="wp-i18n-js-after">
        wp.i18n.setLocaleData({ 'text direction\u0004ltr': ['ltr'] });
    </script>
    <script src="../wp-content/plugins/contact-form-7/includes/swv/js/index6a4d.js?ver=6.1.1" id="swv-js"></script>
    <script id="contact-form-7-js-before">
        var wpcf7 = {
            "api": {
                "root": "https:\/\/wpriverthemes.com\/gridx\/wp-json\/",
                "namespace": "contact-form-7\/v1"
            },
            "cached": 1
        };
    </script>
    <script src="../wp-content/plugins/contact-form-7/includes/js/index6a4d.js?ver=6.1.1"
        id="contact-form-7-js"></script>
    <script src="../wp-content/themes/gridx/assets/js/bootstrap.bundle.min32d4.js?ver=6.8.3" id="bootstrap-js"></script>
    <script src="../wp-content/themes/gridx/assets/js/aos32d4.js?ver=6.8.3" id="aos-js"></script>
    <script src="../wp-content/themes/gridx/assets/js/main32d4.js?ver=6.8.3" id="gridx-main-js"></script>
    <script src="../wp-content/themes/gridx/assets/js/ajax-form32d4.html?ver=6.8.3" id="ajax-form-js"></script>
    <script src="../wp-content/plugins/elementor/assets/js/webpack.runtime.min242d.js?ver=3.31.2"
        id="elementor-webpack-runtime-js"></script>
    <script src="../wp-content/plugins/elementor/assets/js/frontend-modules.min242d.js?ver=3.31.2"
        id="elementor-frontend-modules-js"></script>
    <script src="../wp-includes/js/jquery/ui/core.minb37e.js?ver=1.13.3" id="jquery-ui-core-js"></script>
    <script src="../wp-content/plugins/elementor/assets/js/frontend.min242d.js?ver=3.31.2"
        id="elementor-frontend-js"></script>
</body>

</html>