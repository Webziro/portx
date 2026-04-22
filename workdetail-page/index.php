<?php 
    include "../include/title.php";
    require_once '../include/db.php';
    
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    if (!$id) {
        header("Location: ../work/index.php");
        exit;
    }

    $stmt = $pdo->prepare("SELECT * FROM projects WHERE id = ?");
    $stmt->execute([$id]);
    $project = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$project) {
        header("Location: ../work/index.php");
        exit;
    }
?>  

<!DOCTYPE html>
<html lang="en-US">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<!-- Head tag starts -->
    <?php 
        include "../include/head.php";
    ?>
<!-- Head tag end -->

<body
    class="wp-singular page-template page-template-page-templates page-template-main-workdetail page-template-page-templatesmain-workdetail-php page page-id-1400 wp-theme-gridx elementor-default elementor-kit-16 elementor-page elementor-page-1400">

    <div id="preloader" class="preloader">
        <div class="black_wall"></div>
        <div class="loader"></div>
    </div>

    <main class="main-workdetails-page">

        <!-- Header -->
        <header class="header-area">
            <div class="container">
                <div class="gx-row d-flex align-items-center justify-content-between">


                    <a href="../index.php" class="logo">



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


        <!-- Project Details -->
        <section class="project-details-wrap">

            <!-- <div class="container"> -->

            <div data-elementor-type="wp-page" data-elementor-id="1400" class="elementor elementor-1400">
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-3155ad7 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                    data-id="3155ad7" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b3e563c"
                            data-id="b3e563c" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-d39a747 elementor-widget__width-initial elementor-widget elementor-widget-gridxdaworkdetailprojbreadcrumb"
                                    data-id="d39a747" data-element_type="widget"
                                    data-widget_type="gridxdaworkdetailprojbreadcrumb.default">
                                    <div class="elementor-widget-container">

                                        <!-- Start Workdetail Breadcrumb-->
                                        <!-- Breadcrumb -->
                                        <section class="breadcrumb-area">
                                            <div class="container">
                                                <div class="breadcrumb-content" data-aos="fade-up">
                                                    <p><?php echo htmlspecialchars(strtoupper($project['category'])); ?></p>
                                                    <h1 class="section-heading">

                                                        <img decoding="async"
                                                            src="../wp-content/themes/gridx/assets/images/star-2.png"
                                                            alt="img">

                                                        <?php echo htmlspecialchars($project['title']); ?>
                                                        <img decoding="async"
                                                            src="../wp-content/themes/gridx/assets/images/star-2.png"
                                                            alt="img">

                                                    </h1>
                                                </div>
                                            </div>
                                        </section>

                                        <div class="project-details-img" data-aos="zoom-in">
                                            <img decoding="async" src="../<?php echo htmlspecialchars($project['image_path']); ?>" alt="">
                                        </div>

                                        <script>
                                            AOS.init({
                                                duration: 1500,
                                                once: true,

                                            });</script>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-061ab56 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="061ab56" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-8976661"
                            data-id="8976661" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-63f95af elementor-widget elementor-widget-gridxdaworkdetailprojinfo"
                                    data-id="63f95af" data-element_type="widget"
                                    data-widget_type="gridxdaworkdetailprojinfo.default">
                                    <div class="elementor-widget-container">

                                        <!-- Start WorkDetail -->

                                        <div data-aos="zoom-in">
                                            <div class="d-flex project-infos-wrap shadow-box mb-24">

                                                <img decoding="async"
                                                    src="../wp-content/themes/gridx/assets/images/bg1.png" alt="img"
                                                    class="bg-img">



                                                <img decoding="async"
                                                    src="../wp-content/themes/gridx/assets/images/icon2.png" alt="img"
                                                    class="star-icon">


                                                <div class="project-details-info flex-1">
                                                    <h4><?php echo htmlspecialchars($project['title']); ?></h4>
                                                    <p><?php echo nl2br(htmlspecialchars($project['description'])); ?></p>
                                                </div>
                                            </div>
                                        </div>


                                        <script>
                                            AOS.init({
                                                duration: 1500,
                                                once: true,

                                            });</script>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-691c3f8 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="691c3f8" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-dc4e7a1"
                            data-id="dc4e7a1" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-9d28bf8 elementor-widget elementor-widget-gridxdaworkdetailprojimg"
                                    data-id="9d28bf8" data-element_type="widget"
                                    data-widget_type="gridxdaworkdetailprojimg.default">
                                    <div class="elementor-widget-container">

                                        <!-- Start WorkDetail -->

                                        <?php if (!empty($project['image2_path'])): ?>
                                        <div class="project-details-2-img mb-24" data-aos="zoom-in">
                                            <img decoding="async" src="../<?php echo htmlspecialchars($project['image2_path']); ?>" alt="">
                                        </div>
                                        <?php endif; ?>



                                        <script>
                                            AOS.init({
                                                duration: 1500,
                                                once: true,

                                            });</script>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-ca03e51 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="ca03e51" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-bc77ca7"
                            data-id="bc77ca7" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-1f87fb4 elementor-widget elementor-widget-gridxdaworkdetailimg"
                                    data-id="1f87fb4" data-element_type="widget"
                                    data-widget_type="gridxdaworkdetailimg.default">
                                    <div class="elementor-widget-container">

                                        <!-- Start WorkDetail
    ============================================= -->



                                        <div class="row mb-24">
                                            <?php if (!empty($project['image3_path'])): ?>
                                            <div class="col-md-6" data-aos="zoom-in">
                                                <div class="project-details-3-img">
                                                    <img decoding="async" src="../<?php echo htmlspecialchars($project['image3_path']); ?>" alt="">
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (!empty($project['image4_path'])): ?>
                                            <div class="col-md-6" data-aos="zoom-in">
                                                <div class="project-details-3-img">
                                                    <img decoding="async" src="../<?php echo htmlspecialchars($project['image4_path']); ?>" alt="">
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>




                                        <script>
                                            AOS.init({
                                                duration: 1500,
                                                once: true,

                                            });</script>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-513e7c2 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="513e7c2" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-d8e2090"
                            data-id="d8e2090" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-919bc3a elementor-widget elementor-widget-gridxdaworkdetailprojabout"
                                    data-id="919bc3a" data-element_type="widget"
                                    data-widget_type="gridxdaworkdetailprojabout.default">
                                    <div class="elementor-widget-container">

                                        <!-- Start WorkDetail
    ============================================= -->

                                        <div data-aos="zoom-in">
                                            <div class="project-about-2 d-flex shadow-box mb-24">

                                                <img decoding="async"
                                                    src="../wp-content/themes/gridx/assets/images/bg1.png" alt="img"
                                                    class="bg-img">

                                                <div class="left-details">



                                                    <img decoding="async"
                                                        src="../wp-content/themes/gridx/assets/images/icon2.png"
                                                        alt="img" class="star-icon">


                                                    <ul>
                                                        <li>
                                                            <p>Year</p>
                                                            <h5><?php echo htmlspecialchars($project['year']); ?></h5>
                                                        </li>
                                                        <li>
                                                            <p>Client</p>
                                                            <h5><?php echo htmlspecialchars($project['client']); ?></h5>
                                                        </li>
                                                        <li>
                                                            <p>Services</p>
                                                            <h5><?php echo htmlspecialchars($project['services']); ?></h5>
                                                        </li>
                                                        <li>
                                                            <p>Technologies</p>
                                                            <h5><?php echo htmlspecialchars($project['technologies']); ?></h5>
                                                        </li>
                                                        <?php if (!empty($project['live_url'])): ?>
                                                        <li>
                                                            <p>Live Preview</p>
                                                            <h5><a href="<?php echo htmlspecialchars($project['live_url']); ?>" target="_blank" style="color: #fff; text-decoration: underline;">View Project <i class="iconoir-open-new-window"></i></a></h5>
                                                        </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>



                                        <script>
                                            AOS.init({
                                                duration: 1500,
                                                once: true,

                                            });</script>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-643c153 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="643c153" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1ff4997"
                            data-id="1ff4997" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-c1e8035 elementor-widget elementor-widget-gridxdaworkdetailprojfooterbtn"
                                    data-id="c1e8035" data-element_type="widget"
                                    data-widget_type="gridxdaworkdetailprojfooterbtn.default">
                                    <div class="elementor-widget-container">

                                        <!-- Start Nextproject -->
                                        
                                        <?php 
                                        // Next project fetch (moved to top of sequence)
                                        $nextStmt = $pdo->prepare("SELECT id, image_path FROM projects WHERE id < ? ORDER BY id DESC LIMIT 1");
                                        $nextStmt->execute([$id]);
                                        $nextProj = $nextStmt->fetch(PDO::FETCH_ASSOC);
                                        if (!$nextProj) { // Wrap around
                                            $nextStmt = $pdo->query("SELECT id, image_path FROM projects ORDER BY id DESC LIMIT 1");
                                            $nextProj = $nextStmt->fetch(PDO::FETCH_ASSOC);
                                        }
                                        ?>

                                        <div class="container d-flex align-items-center justify-content-center"
                                            data-aos="zoom-in">
                                            <?php if ($nextProj): ?>
                                            <a href="index.php?id=<?php echo $nextProj['id']; ?>" class="big-btn shadow-box">
                                                Next Project 
                                            </a>
                                            <?php endif; ?>
                                        </div>


                                        <script>
                                            AOS.init({
                                                duration: 1500,
                                                once: true,

                                            });</script>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-6be08a8 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                    data-id="6be08a8" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b1bea42"
                            data-id="b1bea42" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-f24f593 elementor-widget elementor-widget-gridxdaworkdetailprojfooterimg"
                                    data-id="f24f593" data-element_type="widget"
                                    data-widget_type="gridxdaworkdetailprojfooterimg.default">
                                    <div class="elementor-widget-container">

                                        <!-- Start Nextproject image section -->

                                        
<?php if ($nextProj && !empty($nextProj['image_path'])): ?>
                                        <div class="project-details-img" data-aos="zoom-in">
                                            <a href="index.php?id=<?php echo $nextProj['id']; ?>">
                                                <img decoding="async" src="../<?php echo htmlspecialchars($nextProj['image_path']); ?>" alt="">
                                            </a>
                                        </div>
<?php endif; ?>
                                            <script>
                                                AOS.init({
                                                    duration: 1500,
                                                    once: true,

                                                });</script>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>



            <!-- </div> -->
        </section>
        <!-- Footer -->
        <?php
            include_once '../include/path_helper.php'; 
            include '../include/footer.php';
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
    <script id="elementor-frontend-js-before">
        var elementorFrontendConfig = { "environmentMode": { "edit": false, "wpPreview": false, "isScriptDebug": false }, "i18n": { "shareOnFacebook": "Share on Facebook", "shareOnTwitter": "Share on Twitter", "pinIt": "Pin it", "download": "Download", "downloadImage": "Download image", "fullscreen": "Fullscreen", "zoom": "Zoom", "share": "Share", "playVideo": "Play Video", "previous": "Previous", "next": "Next", "close": "Close", "a11yCarouselPrevSlideMessage": "Previous slide", "a11yCarouselNextSlideMessage": "Next slide", "a11yCarouselFirstSlideMessage": "This is the first slide", "a11yCarouselLastSlideMessage": "This is the last slide", "a11yCarouselPaginationBulletMessage": "Go to slide" }, "is_rtl": false, "breakpoints": { "xs": 0, "sm": 480, "md": 768, "lg": 1025, "xl": 1440, "xxl": 1600 }, "responsive": { "breakpoints": { "mobile": { "label": "Mobile Portrait", "value": 767, "default_value": 767, "direction": "max", "is_enabled": true }, "mobile_extra": { "label": "Mobile Landscape", "value": 880, "default_value": 880, "direction": "max", "is_enabled": false }, "tablet": { "label": "Tablet Portrait", "value": 1024, "default_value": 1024, "direction": "max", "is_enabled": true }, "tablet_extra": { "label": "Tablet Landscape", "value": 1200, "default_value": 1200, "direction": "max", "is_enabled": false }, "laptop": { "label": "Laptop", "value": 1366, "default_value": 1366, "direction": "max", "is_enabled": false }, "widescreen": { "label": "Widescreen", "value": 2400, "default_value": 2400, "direction": "min", "is_enabled": false } }, "hasCustomBreakpoints": false }, "version": "3.31.2", "is_static": false, "experimentalFeatures": { "additional_custom_breakpoints": true, "e_element_cache": true, "home_screen": true, "global_classes_should_enforce_capabilities": true, "e_variables": true, "cloud-library": true, "e_opt_in_v4_page": true }, "urls": { "assets": "https:\/\/wpriverthemes.com\/gridx\/wp-content\/plugins\/elementor\/assets\/", "ajaxurl": "https:\/\/wpriverthemes.com\/gridx\/wp-admin\/admin-ajax.php", "uploadUrl": "https:\/\/wpriverthemes.com\/gridx\/wp-content\/uploads" }, "nonces": { "floatingButtonsClickTracking": "ff4686d3ec" }, "swiperClass": "swiper", "settings": { "page": [], "editorPreferences": [] }, "kit": { "active_breakpoints": ["viewport_mobile", "viewport_tablet"], "global_image_lightbox": "yes", "lightbox_enable_counter": "yes", "lightbox_enable_fullscreen": "yes", "lightbox_enable_zoom": "yes", "lightbox_enable_share": "yes", "lightbox_title_src": "title", "lightbox_description_src": "description" }, "post": { "id": 1400, "title": "WORKDETAIL%20PAGE%20%E2%80%93%20Gridx%20%E2%80%93%20WordPress%20Theme", "excerpt": "", "featuredImage": false } };
    </script>
    <script src="../wp-content/plugins/elementor/assets/js/frontend.min242d.js?ver=3.31.2"
        id="elementor-frontend-js"></script>
</body>

</html>