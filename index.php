<?php 
    include "include/title.php";
    include "include/calYearsofEx.php"; // also boots $pdo via db.php

    // Fetch all homepage data from DB
    $profile  = $pdo->query("SELECT * FROM profile WHERE id=1")->fetch();
    $services = $pdo->query("SELECT * FROM services ORDER BY display_order")->fetchAll();
    $latestBlog = $pdo->query("SELECT * FROM blogs ORDER BY display_order, created_at DESC LIMIT 1")->fetch();
?>
<!DOCTYPE html>
<html lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<!-- Head tag starts -->
    <?php 
        include "include/head.php";
    ?>
<!-- Head tag end -->



<!-- Body -->
<body
    class="home wp-singular page-template page-template-page-templates page-template-main-home page-template-page-templatesmain-home-php page page-id-13 wp-theme-gridx elementor-default elementor-kit-16 elementor-page elementor-page-13">

    <div id="preloader" class="preloader">
        <div class="black_wall"></div>
        <div class="loader"></div>
    </div>

    <main class="main-homepage">

        <!-- Header -->
        <header class="header-area">
            <div class="container">
                <div class="gx-row d-flex align-items-center justify-content-between">


                    <a href="index.php" class="logo">



                        <img src="wp-content/themes/gridx/assets/images/logo.svg" alt="Logo">


                    </a>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <?php 
                        include "include/navigation.php";
                    ?>
                    <a href="contact-info/index.php" class="theme-btn">Let s talk</a>

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

                <div data-elementor-type="wp-page" data-elementor-id="13" class="elementor elementor-13">
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-5ed44d6 row elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="5ed44d6" data-element_type="section">

                        <div class="elementor-container elementor-column-gap-no">
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-54cd859 col-md-6"
                                data-id="54cd859" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-c4f5752 elementor-widget elementor-widget-gridxdaaboutme"
                                        data-id="c4f5752" data-element_type="widget"
                                        data-widget_type="gridxdaaboutme.default">
                                        <div class="elementor-widget-container">

                                            <!-- Star AboutMe -->

                                            <!-- Hero Section -->
                                            <div data-aos="zoom-in" class="about-me-box-wrap">
                                                <div class="about-me-box shadow-box">
                                                    <a class="overlay-link" href="about-page/index.php"></a>

                                                    <img decoding="async"
                                                        src="wp-content/themes/gridx/assets/images/bg1.png" alt="BG"
                                                        class="bg-img">

                                                    <!-- Hero Image fetched from database -->
                                                    <div class="img-box">
                                                        <img decoding="async" class="proj-img"
                                                            src="<?php echo htmlspecialchars($profile['hero_image'] ?? 'wp-content/uploads/2023/04/me.png'); ?>" alt="hero-img">
                                                    </div>

                                                    <div class="infos">
                                                        <h5><?php echo htmlspecialchars($profile['title'] ?? 'A Software Engineer'); ?></h5>
                                                        <h1><?php echo htmlspecialchars($profile['full_name'] ?? 'STANLEY AMAZIRO.'); ?></h1>
                                                        <p><?php echo htmlspecialchars($profile['bio'] ?? ''); ?></p> 
                                                        <a href="#" class="about-btn">
                                                            <img decoding="async"
                                                            src="wp-content/themes/gridx/assets/images/icon.svg" alt="Star">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                AOS.init({
                                                    duration: 1500,
                                                    once: true,
                                                });
                                            </script>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-8c406e0 col-md-6"
                                data-id="8c406e0" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-79a19dc elementor-widget elementor-widget-gridxdafeaturedbox"
                                        data-id="79a19dc" data-element_type="widget"
                                        data-widget_type="gridxdafeaturedbox.default">
                                        <div class="elementor-widget-container">

                                            <!-- Start Featured Box Scroll title and fetch latest 3 jobs from database and admin can update it from dashboard -->

                                            <div class="about-credentials-wrap">
                                                <div data-aos="zoom-in">
                                                    <div class="banner shadow-box">
                                                        <div class="marquee">
                                                            <div style="animation: marquee 8s linear infinite;">
                                                                <span>LATEST WORK AND <b>FEATURED</b><img
                                                                        decoding="async"
                                                                        src="wp-content/uploads/2023/04/star1.svg"
                                                                        alt=""></span>
                                                            </div>
                                                        </div>
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

                                    <section
                                        class="elementor-section elementor-inner-section elementor-element elementor-element-1130d0e elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                        data-id="1130d0e" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-no">
                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-cd3cb20"
                                                data-id="cd3cb20" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-bdc73c3 elementor-widget elementor-widget-gridxdacredentialbox"
                                                        data-id="bdc73c3" data-element_type="widget"
                                                        data-widget_type="gridxdacredentialbox.default">
                                                        <div class="elementor-widget-container">

                                                            <!-- Start Credentials Box -->
                                                            <div data-aos="zoom-in" class="about-crenditials-box">
                                                                <div class="info-box shadow-box h-full">
                                                                    <a class="overlay-link" href="credential/index.php"></a>


                                                                    <img decoding="async"
                                                                        src="wp-content/themes/gridx/assets/images/bg1.png"
                                                                        alt="BG" class="bg-img">


                                                                    <img decoding="async" class="proj-img"
                                                                        src="wp-content/uploads/2023/04/sign.png"
                                                                        alt="">
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-between">
                                                                        <div class="infos">
                                                                            <h5>MEET ME</h5>
                                                                            <h2>Credentials</h2>
                                                                        </div>

                                                                        <a href="credential/index.php"
                                                                            class="about-btn">

                                                                            <img decoding="async"
                                                                                src="wp-content/themes/gridx/assets/images/icon.svg"
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


                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-d1ad012"
                                                data-id="d1ad012" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-505fe86 elementor-widget elementor-widget-gridxdaprojectbox"
                                                        data-id="505fe86" data-element_type="widget"
                                                        data-widget_type="gridxdaprojectbox.default">
                                                        <div class="elementor-widget-container">

                                                            <!-- Start Project Box -->


                                                            <div data-aos="zoom-in" class="about-project-box">
                                                                <div class="info-box shadow-box h-full">
                                                                    <a class="overlay-link" href="work/index.php"></a>

                                                                    <img decoding="async"
                                                                        src="wp-content/themes/gridx/assets/images/bg1.png"
                                                                        alt="BG" class="bg-img">

                                                                    <!-- Fetch latest work image from database -->
                                                                    <img decoding="async" class="proj-img"
                                                                        src="<?php echo htmlspecialchars($profile['work_preview_image'] ?? 'wp-content/uploads/2023/04/my-works.png'); ?>"
                                                                        alt="">
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-between">
                                                                        <div class="infos">
                                                                            <h5>SHOWCASE</h5>
                                                                            <h2>Projects</h2>
                                                                        </div>

                                                                        <a href="work/index.php" class="about-btn">
                                                                            <img decoding="async"
                                                                                src="wp-content/themes/gridx/assets/images/icon.svg"
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
                        class="elementor-section elementor-top-section elementor-element elementor-element-033fafe row mt-24  elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="033fafe" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-no">
                            <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-dc60a93"
                                data-id="dc60a93" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-6ab9773 elementor-widget elementor-widget-gridxdablogbox"
                                        data-id="6ab9773" data-element_type="widget"
                                        data-widget_type="gridxdablogbox.default">
                                        <div class="elementor-widget-container">

                                            <!-- Start Blog Box -->
                                            <!-- Blog dynamically from database -->
                                            <?php
                                            $blogUrl   = $latestBlog ? htmlspecialchars($latestBlog['blog_url'])   : 'consulted-admitting-is-power-acuteness/index.php';
                                            $blogImg   = $latestBlog ? htmlspecialchars($latestBlog['image_path']) : 'wp-content/uploads/2023/04/gfonts.png';
                                            $blogTitle = $latestBlog ? htmlspecialchars($latestBlog['title'])      : 'BLOG';
                                            ?>
                                            <div class="col-md-12">
                                                <div class="blog-service-profile-wrap d-flex gap-24">
                                                    <div data-aos="zoom-in" class="about-blog-box">
                                                        <div class="info-box shadow-box h-full">
                                                            <a href="<?php echo $blogUrl; ?>"
                                                                class="overlay-link"></a>

                                                            <img decoding="async"
                                                                src="wp-content/themes/gridx/assets/images/bg1.png"
                                                                alt="BG" class="bg-img">

                                                            <img decoding="async" class="proj-img"
                                                                src="<?php echo $blogImg; ?>" alt="">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between">
                                                                <div class="infos">
                                                                    <h5>Read my thoughts</h5>
                                                                    <h2><?php echo $blogTitle; ?></h2>
                                                                </div>

                                                                <a href="<?php echo $blogUrl; ?>"
                                                                    class="about-btn">

                                                                    <img decoding="async"
                                                                        src="wp-content/themes/gridx/assets/images/icon.svg"
                                                                        alt="Star">

                                                                </a>

                                                            </div>
                                                        </div>
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


                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-524805c"
                                data-id="524805c" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-39b9567 elementor-widget elementor-widget-gridxdaservicesbox"
                                        data-id="39b9567" data-element_type="widget"
                                        data-widget_type="gridxdaservicesbox.default">
                                        <div class="elementor-widget-container">

                                            <!-- Start Services Box -->
                                            <div class="col-md-12">
                                                <div class="blog-service-profile-wrap d-flex gap-24">

                                                    <div data-aos="zoom-in" class="flex-1 about-services-box-wrap">
                                                        <div class="about-services-box info-box shadow-box h-full">
                                                            <a href="service-offerings/index.php"
                                                                class="overlay-link"></a>

                                                            <img decoding="async"
                                                                src="wp-content/themes/gridx/assets/images/bg1.png"
                                                                alt="BG" class="bg-img">


                                                             <div class="icon-boxes">
                                                               <?php foreach ($services as $svc): ?>
                                                               <div class="icon-with-label">
                                                                   <i class="<?php echo htmlspecialchars($svc['icon_class']); ?>"></i>
                                                                   <span class="icon-label"><?php echo htmlspecialchars($svc['label']); ?></span>
                                                               </div>
                                                               <?php endforeach; ?>
                                                             </div>
                                                            <div
                                                                class="d-flex align-items-center justify-content-between">
                                                                <div class="infos">
                                                                    <h5>SPECIALIZATION</h5>
                                                                    <h2>Services Offering</h2>
                                                                </div>

                                                                <a href="service-offerings/index.php"
                                                                    class="about-btn">


                                                                    <img decoding="async"
                                                                        src="wp-content/themes/gridx/assets/images/icon.svg"
                                                                        alt="Star">
                                                                </a>

                                                            </div>
                                                        </div>
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

                            
                            <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-386b9dc"
                                data-id="386b9dc" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-d02c9cb elementor-widget elementor-widget-gridxdaprofilesbox"
                                        data-id="d02c9cb" data-element_type="widget"
                                        data-widget_type="gridxdaprofilesbox.default">
                                        <div class="elementor-widget-container">

                                            <!-- Start Profiles Box -->

                                            <div class="col-md-12">
                                                <div class="blog-service-profile-wrap">

                                                    <div data-aos="zoom-in" class="about-profile-box-wrap">
                                                        <div class="about-profile-box info-box shadow-box h-full">

                                                            <img decoding="async"
                                                                src="wp-content/themes/gridx/assets/images/bg1.png"
                                                                alt="BG" class="bg-img">


                                                            <div class="inner-profile-icons shadow-box">

                                                                <a href="#">
                                                                    <i class="iconoir-dribbble"></i>
                                                                </a>

                                                                <a href="#">
                                                                    <i class="iconoir-twitter"></i>
                                                                </a>

                                                            </div>
                                                            <div
                                                                class="d-flex align-items-center justify-content-between">
                                                                <div class="infos">
                                                                    <h5>STAY WITH ME</h5>
                                                                    <h2>Profiles</h2>
                                                                </div>

                                                                <a href="contact-info/index.php" class="about-btn">


                                                                    <img decoding="async"
                                                                        src="wp-content/themes/gridx/assets/images/icon.svg"
                                                                        alt="Star">

                                                                </a>

                                                            </div>
                                                        </div>
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
                        class="elementor-section elementor-top-section elementor-element elementor-element-1588901 row mt-24  elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="1588901" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-no">
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-1616496 col-md-6"
                                data-id="1616496" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-b27321e elementor-widget elementor-widget-gridxdaclientbox"
                                        data-id="b27321e" data-element_type="widget"
                                        data-widget_type="gridxdaclientbox.default">
                                        <div class="elementor-widget-container">

                                            <!-- Start Client Box -->


                                            <div data-aos="zoom-in" class="about-client-box-wrap">
                                                <div class="about-client-box info-box shadow-box">

                                                    <img decoding="async"
                                                        src="wp-content/themes/gridx/assets/images/bg1.png" alt="BG"
                                                        class="bg-img">


                                                    <div
                                                        class="clients d-flex align-items-start gap-24 justify-content-center">
                                                        
                                                        <div class="client-item">
                                                        <!-- Increment the year by 1 each year -->
                                                            <h2><?php echo $displayYears; ?></h2>
                                                            <p>Years <br>Experience</p>
                                                        </div>

                                                        <!-- Fetched from database -->
                                                        <div class="client-item">
                                                            <h2><?php echo htmlspecialchars($profile['clients_count'] ?? '+12'); ?></h2>
                                                            <p>CLIENTS <br>WORLDWIDE</p>
                                                        </div>

                                                        <!-- Fetched from database -->
                                                        <div class="client-item">
                                                            <h2><?php echo htmlspecialchars($profile['projects_count'] ?? '+20'); ?></h2>
                                                            <p>Total <br>Projects</p>
                                                        </div>
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


                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-e314706 col-md-6"
                                data-id="e314706" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-b0e85ec elementor-widget elementor-widget-gridxdacontactbox"
                                        data-id="b0e85ec" data-element_type="widget"
                                        data-widget_type="gridxdacontactbox.default">
                                        <div class="elementor-widget-container">

                                            <!-- Start Contact Box -->


                                            <div data-aos="zoom-in" class="about-contact-box-wrap">

                                                <div class="about-contact-box info-box shadow-box">
                                                    <a class="overlay-link" href="contact-info/index.php"></a>

                                                    <img decoding="async"
                                                        src="wp-content/themes/gridx/assets/images/bg1.png" alt="BG"
                                                        class="bg-img">


                                                    <img decoding="async"
                                                        src="wp-content/themes/gridx/assets/images/icon2.png" alt="Star"
                                                        class="star-icon">




                                                    <h2>Let's <br>work <span>together.</span></h2>
                                                    <a href="contact-info/index.php" class="about-btn">


                                                        <img decoding="async"
                                                            src="wp-content/themes/gridx/assets/images/icon.svg"
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
                        </div>
                    </section>
                </div>
            </div>
        </section>

        <!-- Footer -->
    <?php
        include_once 'include/path_helper.php'; 
        include 'include/footer.php';
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
    <script src="wp-includes/js/dist/hooks.min4fdd.js?ver=4d63a3d491d11ffd8ac6" id="wp-hooks-js"></script>
    <script src="wp-includes/js/dist/i18n.minc33c.js?ver=5e580eb46a90c2b997e6" id="wp-i18n-js"></script>
    <script id="wp-i18n-js-after">
        wp.i18n.setLocaleData({ 'text direction\u0004ltr': ['ltr'] });
    </script>
    <script src="wp-content/plugins/contact-form-7/includes/swv/js/index6a4d.js?ver=6.1.1" id="swv-js"></script>
    <script id="contact-form-7-js-before">
        var wpcf7 = {
            "api": {
                "root": "https:\/\/wpriverthemes.com\/gridx\/wp-json\/",
                "namespace": "contact-form-7\/v1"
            },
            "cached": 1
        };
    </script>
    <script src="wp-content/plugins/contact-form-7/includes/js/index6a4d.js?ver=6.1.1" id="contact-form-7-js"></script>
    <script src="wp-content/themes/gridx/assets/js/bootstrap.bundle.min32d4.js?ver=6.8.3" id="bootstrap-js"></script>
    <script src="wp-content/themes/gridx/assets/js/aos32d4.js?ver=6.8.3" id="aos-js"></script>
    <script src="wp-content/themes/gridx/assets/js/main32d4.js?ver=6.8.3" id="gridx-main-js"></script>
    <script src="wp-content/themes/gridx/assets/js/ajax-form32d4.html?ver=6.8.3" id="ajax-form-js"></script>
    <script src="wp-content/plugins/elementor/assets/js/webpack.runtime.min242d.js?ver=3.31.2"
        id="elementor-webpack-runtime-js"></script>
    <script src="wp-content/plugins/elementor/assets/js/frontend-modules.min242d.js?ver=3.31.2"
        id="elementor-frontend-modules-js"></script>
    <script src="wp-includes/js/jquery/ui/core.minb37e.js?ver=1.13.3" id="jquery-ui-core-js"></script>
    <script id="elementor-frontend-js-before">
        var elementorFrontendConfig = { "environmentMode": { "edit": false, "wpPreview": false, "isScriptDebug": false }, "i18n": { "shareOnFacebook": "Share on Facebook", "shareOnTwitter": "Share on Twitter", "pinIt": "Pin it", "download": "Download", "downloadImage": "Download image", "fullscreen": "Fullscreen", "zoom": "Zoom", "share": "Share", "playVideo": "Play Video", "previous": "Previous", "next": "Next", "close": "Close", "a11yCarouselPrevSlideMessage": "Previous slide", "a11yCarouselNextSlideMessage": "Next slide", "a11yCarouselFirstSlideMessage": "This is the first slide", "a11yCarouselLastSlideMessage": "This is the last slide", "a11yCarouselPaginationBulletMessage": "Go to slide" }, "is_rtl": false, "breakpoints": { "xs": 0, "sm": 480, "md": 768, "lg": 1025, "xl": 1440, "xxl": 1600 }, "responsive": { "breakpoints": { "mobile": { "label": "Mobile Portrait", "value": 767, "default_value": 767, "direction": "max", "is_enabled": true }, "mobile_extra": { "label": "Mobile Landscape", "value": 880, "default_value": 880, "direction": "max", "is_enabled": false }, "tablet": { "label": "Tablet Portrait", "value": 1024, "default_value": 1024, "direction": "max", "is_enabled": true }, "tablet_extra": { "label": "Tablet Landscape", "value": 1200, "default_value": 1200, "direction": "max", "is_enabled": false }, "laptop": { "label": "Laptop", "value": 1366, "default_value": 1366, "direction": "max", "is_enabled": false }, "widescreen": { "label": "Widescreen", "value": 2400, "default_value": 2400, "direction": "min", "is_enabled": false } }, "hasCustomBreakpoints": false }, "version": "3.31.2", "is_static": false, "experimentalFeatures": { "additional_custom_breakpoints": true, "e_element_cache": true, "home_screen": true, "global_classes_should_enforce_capabilities": true, "e_variables": true, "cloud-library": true, "e_opt_in_v4_page": true }, "urls": { "assets": "https:\/\/wpriverthemes.com\/gridx\/wp-content\/plugins\/elementor\/assets\/", "ajaxurl": "https:\/\/wpriverthemes.com\/gridx\/wp-admin\/admin-ajax.php", "uploadUrl": "https:\/\/wpriverthemes.com\/gridx\/wp-content\/uploads" }, "nonces": { "floatingButtonsClickTracking": "ff4686d3ec" }, "swiperClass": "swiper", "settings": { "page": [], "editorPreferences": [] }, "kit": { "active_breakpoints": ["viewport_mobile", "viewport_tablet"], "global_image_lightbox": "yes", "lightbox_enable_counter": "yes", "lightbox_enable_fullscreen": "yes", "lightbox_enable_zoom": "yes", "lightbox_enable_share": "yes", "lightbox_title_src": "title", "lightbox_description_src": "description" }, "post": { "id": 13, "title": "Gridx%20%E2%80%93%20WordPress%20Theme%20%E2%80%93%20Personal%20Portfolio%20Website", "excerpt": "", "featuredImage": false } };
    </script>
    <script src="wp-content/plugins/elementor/assets/js/frontend.min242d.js?ver=3.31.2"
        id="elementor-frontend-js"></script>
</body>
</html>