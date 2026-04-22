<?php 
    include "../include/title.php";
    require_once '../include/db.php';
    $profile     = $pdo->query("SELECT * FROM profile WHERE id=1")->fetch();
    $experiences = $pdo->query("SELECT * FROM credentials WHERE type='experience' ORDER BY display_order")->fetchAll();
    $educations  = $pdo->query("SELECT * FROM credentials WHERE type='education'  ORDER BY display_order")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en-US">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<!-- Head tag starts -->
    <?php 
        include "../include/head.php";
    ?>
<!-- Head tag end -->


<!-- Body -->
<body
    class="wp-singular page-template page-template-page-templates page-template-main-about page-template-page-templatesmain-about-php page page-id-926 wp-theme-gridx elementor-default elementor-kit-16 elementor-page elementor-page-926">

    <div id="preloader" class="preloader">
        <div class="black_wall"></div>
        <div class="loader"></div>
    </div>

    <main class="main-aboutpage">

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
        <!-- About -->
        <section class="about-area">
            <div class="container">
                <div data-elementor-type="wp-page" data-elementor-id="926" class="elementor elementor-926">
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-151ae56 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="151ae56" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3102b38"
                                data-id="3102b38" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <section
                                        class="elementor-section elementor-inner-section elementor-element elementor-element-5c3f255 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                        data-id="5c3f255" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-8c8f0ed"
                                                data-id="8c8f0ed" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-bcceb75 elementor-widget elementor-widget-gridxdaaboutimg"
                                                        data-id="bcceb75" data-element_type="widget"
                                                        data-widget_type="gridxdaaboutimg.default">
                                                        <div class="elementor-widget-container">

                                                            <!-- Star AboutImage -->

                                                            <div data-aos="zoom-in" class="about-image-box-wrap">
                                                                <div class="about-image-box shadow-box">

                                                                    <img decoding="async"
                                                                        src="../wp-content/themes/gridx/assets/images/bg1.png"
                                                                        alt="img" class="bg-img">
                                                                    

                                                                    <div class="image-inner">
                                                                        <img decoding="async"
                                                                            src="../<?php echo htmlspecialchars($profile['hero_image'] ?? 'wp-content/uploads/2023/04/me2.png'); ?>"
                                                                            alt="">
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
                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-fcda44d"
                                                data-id="fcda44d" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-1c9e78e elementor-widget elementor-widget-gridxdaaboutdetail"
                                                        data-id="1c9e78e" data-element_type="widget"
                                                        data-widget_type="gridxdaaboutdetail.default">
                                                        <div class="elementor-widget-container">

                                                            <!-- Start About Detail -->


                                                            <div class="about-details" data-aos="zoom-in">
                                                                <h1 class="section-heading" data-aos="">

                                                                    <img decoding="async"
                                                                        src="../wp-content/themes/gridx/assets/images/star-2.png"
                                                                        alt="img">

                                                                    Self-summary

                                                                    <img decoding="async"
                                                                        src="../wp-content/themes/gridx/assets/images/star-2.png"
                                                                        alt="img">

                                                                </h1>

                                                                <div class="about-details-inner shadow-box">
                                                                    <img decoding="async"
                                                                        src="../wp-content/themes/gridx/assets/images/icon2.png"
                                                                        alt="img" class="star-icon">

                                                                    <h2><?php echo htmlspecialchars($profile['full_name'] ?? 'Stanley Amaziro'); ?></h2>

                                                                    <!-- Fetched from database -->

                                                                    <p><?php echo nl2br(htmlspecialchars($profile['bio'] ?? 'Backend and Systems Engineer passionate about scalable solutions.')); ?></p>
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
                                </div>
                            </div>
                        </div>
                    </section>


                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-7a568b9 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="7a568b9" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-d5aafec"
                                data-id="d5aafec" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <section
                                        class="elementor-section elementor-inner-section elementor-element elementor-element-a3feaff elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                        data-id="a3feaff" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-94ece78"
                                                data-id="94ece78" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-7ceb529 elementor-widget elementor-widget-gridxdaexperiencebox"
                                                        data-id="7ceb529" data-element_type="widget"
                                                        data-widget_type="gridxdaexperiencebox.default">
                                                        <div class="elementor-widget-container">

                                                            <!-- Start Experience -->


                                                            <div data-aos="zoom-in">
                                                                <div class="about-edc-exp about-experience shadow-box">

                                                                    <img decoding="async"
                                                                        src="../wp-content/themes/gridx/assets/images/bg1.png"
                                                                        alt="img" class="bg-img">

                                                                    <h4>EXPERIENCE</h4>

                                                                    <ul>
                                                                        <?php if (!empty($experiences)): ?>
                                                                        <?php foreach ($experiences as $exp): ?>
                                                                        <li>
                                                                            <?php if (!empty($exp['date_range'])): ?>
                                                                            <p class="date"><?php echo htmlspecialchars($exp['date_range']); ?></p>
                                                                            <?php endif; ?>
                                                                            <h3><?php echo htmlspecialchars($exp['title']); ?></h3>
                                                                            <?php if (!empty($exp['organization'])): ?>
                                                                            <p class="type"><?php echo htmlspecialchars($exp['organization']); ?></p>
                                                                            <?php endif; ?>
                                                                        </li>
                                                                        <?php endforeach; ?>
                                                                        <?php else: ?>
                                                                        <li><p class="date">—</p><h3>No entries yet</h3></li>
                                                                        <?php endif; ?>
                                                                    </ul>
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
                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-20451f2"
                                                data-id="20451f2" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-1f8eed7 elementor-widget elementor-widget-gridxdaeducationbox"
                                                        data-id="1f8eed7" data-element_type="widget"
                                                        data-widget_type="gridxdaeducationbox.default">
                                                        <div class="elementor-widget-container">

                                                            <!-- Start Education -->

                                                            <div data-aos="zoom-in">
                                                                <div class="about-edc-exp about-education shadow-box">

                                                                    <img decoding="async"
                                                                        src="../wp-content/themes/gridx/assets/images/bg1.png"
                                                                        alt="img" class="bg-img">

                                                                    <h4>EDUCATION</h4>

                                                                    <ul>
                                                                        <?php if (!empty($educations)): ?>
                                                                        <?php foreach ($educations as $edu): ?>
                                                                        <li>
                                                                            <?php if (!empty($edu['date_range'])): ?>
                                                                            <p class="date"><?php echo htmlspecialchars($edu['date_range']); ?></p>
                                                                            <?php endif; ?>
                                                                            <h3><?php echo htmlspecialchars($edu['title']); ?></h3>
                                                                            <?php if (!empty($edu['organization'])): ?>
                                                                            <p class="type"><?php echo htmlspecialchars($edu['organization']); ?></p>
                                                                            <?php endif; ?>
                                                                        </li>
                                                                        <?php endforeach; ?>
                                                                        <?php else: ?>
                                                                        <li><p class="date">—</p><h3>No entries yet</h3></li>
                                                                        <?php endif; ?>
                                                                    </ul>

                                                                        
                                                                         
                                                                        <div style="margin-top: 40px;" class="d-flex align-items-left justify-content-between">
                                                                            <div class="infos">
                                                                                <p>Download Credentials</p>
                                                                            </div>
                                                                        <a href="https://drive.google.com/file/d/1Od6lXEPpBnEWDI0LFEwXwNJTH-6tFA2L/view"
                                                                            class="about-btn">                                                                                                                                                                                          

                                                                            <img decoding="async"
                                                                                src="../wp-content/themes/gridx/assets/images/icon.svg"
                                                                                alt="Star">

                                                                        </a>
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
                                </div>
                            </div>
                        </div>
                    </section>

                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-123a4fa elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="123a4fa" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3dc73c8"
                                data-id="3dc73c8" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <section
                                        class="elementor-section elementor-inner-section elementor-element elementor-element-525f97c elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                        data-id="525f97c" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-a7ebc4d"
                                                data-id="a7ebc4d" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-4a1252e elementor-widget elementor-widget-gridxdaprofilesbox"
                                                        data-id="4a1252e" data-element_type="widget"
                                                        data-widget_type="gridxdaprofilesbox.default">
                                                        <div class="elementor-widget-container">

                                                            <!-- Start Profiles Box-->

                                                            <?php 
                                                                include "../include/socialMediaLinks.php";
                                                            ?>

                                                            <script>
                                                                AOS.init({
                                                                    duration: 1500,
                                                                    once: true,

                                                                });</script>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-f5e4dbf"
                                                data-id="f5e4dbf" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-09569e9 elementor-widget elementor-widget-gridxdacontactbox"
                                                        data-id="09569e9" data-element_type="widget"
                                                        data-widget_type="gridxdacontactbox.default">
                                                        <div class="elementor-widget-container">

                                                            <!-- Start Contact Box -->


                                                            <div data-aos="zoom-in" class="about-contact-box-wrap">

                                                                <div class="about-contact-box info-box shadow-box">
                                                                    <a class="overlay-link"
                                                                        href="../contact-info/index.php"></a>

                                                                    <img decoding="async"
                                                                        src="../wp-content/themes/gridx/assets/images/bg1.png"
                                                                        alt="BG" class="bg-img">


                                                                    <img decoding="async"
                                                                        src="../wp-content/themes/gridx/assets/images/icon2.png"
                                                                        alt="Star" class="star-icon">




                                                                    <h2>Let's <br>work <span>together.</h2>
                                                                    <a href="../contact-info/index.php"
                                                                        class="about-btn">


                                                                        <img decoding="async"
                                                                            src="../wp-content/themes/gridx/assets/images/icon.svg"
                                                                            alt="Star">

                                                                    </a>
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
                                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-663db9d"
                                                data-id="663db9d" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-690aa31 elementor-widget elementor-widget-gridxdacredentialbox"
                                                        data-id="690aa31" data-element_type="widget"
                                                        data-widget_type="gridxdacredentialbox.default">
                                                        <div class="elementor-widget-container">

                                                            <!-- Start Credentials Box-->

                                                            <div data-aos="zoom-in" class="about-crenditials-box">
                                                                <div class="info-box shadow-box h-full">
                                                                    <a class="overlay-link"
                                                                        href="../credential/index.php"></a>


                                                                    <img decoding="async"
                                                                        src="../wp-content/themes/gridx/assets/images/bg1.png"
                                                                        alt="BG" class="bg-img">


                                                                    <img decoding="async" class="proj-img"
                                                                        src="../wp-content/uploads/2023/04/sign.png"
                                                                        alt="">

                                                                    <div
                                                                        class="d-flex align-items-center justify-content-between">
                                                                        <div class="infos">
                                                                            <h5>MORE ABOUT ME</h5>
                                                                            <h2>Credentials</h2>
                                                                    </div>

                                                                        <a href="../credential/index.php"
                                                                            class="about-btn">                                                                                                                                                                                          

                                                                            <img decoding="async"
                                                                                src="../wp-content/themes/gridx/assets/images/icon.svg"
                                                                                alt="Star">

                                                                        </a>
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
    <script id="elementor-frontend-js-before">
        var elementorFrontendConfig = { "environmentMode": { "edit": false, "wpPreview": false, "isScriptDebug": false }, "i18n": { "shareOnFacebook": "Share on Facebook", "shareOnTwitter": "Share on Twitter", "pinIt": "Pin it", "download": "Download", "downloadImage": "Download image", "fullscreen": "Fullscreen", "zoom": "Zoom", "share": "Share", "playVideo": "Play Video", "previous": "Previous", "next": "Next", "close": "Close", "a11yCarouselPrevSlideMessage": "Previous slide", "a11yCarouselNextSlideMessage": "Next slide", "a11yCarouselFirstSlideMessage": "This is the first slide", "a11yCarouselLastSlideMessage": "This is the last slide", "a11yCarouselPaginationBulletMessage": "Go to slide" }, "is_rtl": false, "breakpoints": { "xs": 0, "sm": 480, "md": 768, "lg": 1025, "xl": 1440, "xxl": 1600 }, "responsive": { "breakpoints": { "mobile": { "label": "Mobile Portrait", "value": 767, "default_value": 767, "direction": "max", "is_enabled": true }, "mobile_extra": { "label": "Mobile Landscape", "value": 880, "default_value": 880, "direction": "max", "is_enabled": false }, "tablet": { "label": "Tablet Portrait", "value": 1024, "default_value": 1024, "direction": "max", "is_enabled": true }, "tablet_extra": { "label": "Tablet Landscape", "value": 1200, "default_value": 1200, "direction": "max", "is_enabled": false }, "laptop": { "label": "Laptop", "value": 1366, "default_value": 1366, "direction": "max", "is_enabled": false }, "widescreen": { "label": "Widescreen", "value": 2400, "default_value": 2400, "direction": "min", "is_enabled": false } }, "hasCustomBreakpoints": false }, "version": "3.31.2", "is_static": false, "experimentalFeatures": { "additional_custom_breakpoints": true, "e_element_cache": true, "home_screen": true, "global_classes_should_enforce_capabilities": true, "e_variables": true, "cloud-library": true, "e_opt_in_v4_page": true }, "urls": { "assets": "https:\/\/wpriverthemes.com\/gridx\/wp-content\/plugins\/elementor\/assets\/", "ajaxurl": "https:\/\/wpriverthemes.com\/gridx\/wp-admin\/admin-ajax.php", "uploadUrl": "https:\/\/wpriverthemes.com\/gridx\/wp-content\/uploads" }, "nonces": { "floatingButtonsClickTracking": "ff4686d3ec" }, "swiperClass": "swiper", "settings": { "page": [], "editorPreferences": [] }, "kit": { "active_breakpoints": ["viewport_mobile", "viewport_tablet"], "global_image_lightbox": "yes", "lightbox_enable_counter": "yes", "lightbox_enable_fullscreen": "yes", "lightbox_enable_zoom": "yes", "lightbox_enable_share": "yes", "lightbox_title_src": "title", "lightbox_description_src": "description" }, "post": { "id": 926, "title": "ABOUT%20PAGE%20%E2%80%93%20Gridx%20%E2%80%93%20WordPress%20Theme", "excerpt": "", "featuredImage": false } };
    </script>
    <script src="../wp-content/plugins/elementor/assets/js/frontend.min242d.js?ver=3.31.2"
        id="elementor-frontend-js"></script>
</body>

</html>