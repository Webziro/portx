<?php
require_once '../include/db.php';
$profile = $pdo->query("SELECT * FROM profile WHERE id=1")->fetch();
$experiences = $pdo->query("SELECT * FROM credentials WHERE type='experience' ORDER BY display_order")->fetchAll();
$educations = $pdo->query("SELECT * FROM credentials WHERE type='education'  ORDER BY display_order")->fetchAll();
$skills = $pdo->query("SELECT * FROM credentials WHERE type='skill'      ORDER BY display_order")->fetchAll();
?>
<?php
$title = "CREDENTIAL PAGE – Gridx – WordPress Theme";
include "../include/head.php";
?>

<body class="wp-singular page-template page-template-page-templates page-template-main-credential page-template-page-templatesmain-credential-php page page-id-1065 wp-theme-gridx elementor-default elementor-kit-16 elementor-page elementor-page-1065">

<div id="preloader" class="preloader">
    <div class="black_wall"></div>
    <div class="loader"></div>
</div>
    
 <main class="main-aboutpage">

<!-- Header -->
        <header class="header-area">
            <div class="container">
                <div class="gx-row d-flex align-items-center justify-content-between">


                    <a href="../" class="logo">
                        <img src="../wp-content/uploads/logo.png" alt="Logo">
                    </a>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <?php
                        include "../include/navigation.php";
                    ?>

                    <!-- Dynamic cv link -->
                    <a href="<?php echo htmlspecialchars($profile['cv_url'] ?? '#'); ?>" class="theme-btn"
                        target="_blank">Download CV</a>

                    <!-- End Navigation -->

                    <div class="show-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </header>

   <!-- Credentials -->
        <section class="credential-area">
            <div class="container">
                <div class="gx-row d-flex">

                    <div class="credential-sidebar-wrap" data-aos="zoom-in">
                        <div class="credential-sidebar text-center">
                            <div class="shadow-box">
                
<img src="../wp-content/themes/gridx/assets/images/bg1.png" alt="BG" class="bg-img">
                
                                <div class="img-box">
                                    <img src="../<?php echo htmlspecialchars($profile['hero_image'] ?? 'wp-content/uploads/2023/04/me.png'); ?>" alt="">
                                </div>
                                <h3><?php echo htmlspecialchars($profile['full_name'] ?? 'Stanley Amaziro'); ?></h3>
                                <p><?php echo htmlspecialchars($profile['title'] ?? 'Software Engineer'); ?></p>

                                <ul class="social-links d-flex justify-content-center">
                                    <li><a href="#"><i class="iconoir-dribbble"></i></a></li>
                                    <li><a href="#"><i class="iconoir-twitter"></i></a></li>
                                    <li><a href="#"><i class="iconoir-instagram"></i></a></li>
                                    <li><a href="#"><i class="iconoir-facebook-tag"></i></a></li>
                                </ul>

                                <!-- Dynamic cv link -->
                                    <a href="<?php echo htmlspecialchars($profile['cv_url'] ?? '#'); ?>" 
                                    class="theme-btn" target="_blank">Download my CV</a>
                                
                            </div>
                        </div>
                    </div>

                    
         <div data-elementor-type="wp-page" data-elementor-id="1065" class="elementor elementor-1065">
                        <section class="elementor-section elementor-top-section elementor-element elementor-element-6d57135 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6d57135" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-no">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2705f96 margin-0" data-id="2705f96" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-35461e7 elementor-widget elementor-widget-gridxdacredentialcontentbox" data-id="35461e7" data-element_type="widget" data-widget_type="gridxdacredentialcontentbox.default">
                <div class="elementor-widget-container">
                    
         <!-- Start Credentials Content Box
    ============================================= -->

<div class="credential-content flex-1">
        <div class="credential-about" data-aos="zoom-in">
            <h3>About Me</h3>
            <p><?php echo nl2br(htmlspecialchars($profile['bio'] ?? '')); ?></p>
            <!-- Download my CV -->
            <a href="<?php echo htmlspecialchars($profile['cv_url'] ?? '#'); ?>" 
            class="theme-btn" target="_blank">Download my CV</a>
        </div>

        <?php if (!empty($experiences)): ?>
            <div class="credential-edc-exp credential-experience">
                <h3 data-aos="fade-up">EXPERIENCE</h3>
                <?php foreach ($experiences as $exp): ?>
                    <div class="credential-edc-exp-item" data-aos="zoom-in">
                        <?php if (!empty($exp['date_range'])): ?>
                            <h5><?php echo htmlspecialchars($exp['date_range']); ?></h5>
                        <?php endif; ?>
                        <h4><?php echo htmlspecialchars($exp['title']); ?></h4>
                        <?php if (!empty($exp['organization'])): ?>
                            <h6><?php echo htmlspecialchars($exp['organization']); ?></h6>
                        <?php endif; ?>
                        <?php if (!empty($exp['description'])): ?>
                            <p><?php echo htmlspecialchars($exp['description']); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($educations)): ?>
            <div class="credential-edc-exp credential-education">
                <h3 data-aos="fade-up">Education</h3>
                <?php foreach ($educations as $edu): ?>
                    <div class="credential-edc-exp-item" data-aos="zoom-in">
                        <?php if (!empty($edu['date_range'])): ?>
                            <h5><?php echo htmlspecialchars($edu['date_range']); ?></h5>
                        <?php endif; ?>
                        <h4><?php echo htmlspecialchars($edu['title']); ?></h4>
                        <?php if (!empty($edu['organization'])): ?>
                            <h6><?php echo htmlspecialchars($edu['organization']); ?></h6>
                        <?php endif; ?>
                        <?php if (!empty($edu['description'])): ?>
                            <p><?php echo htmlspecialchars($edu['description']); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($skills)): ?>
            <div class="skills-wrap">
                <h3 data-aos="fade-up">Skills</h3>
                <div class="d-grid skill-items gap-24 flex-wrap">
                    <?php foreach ($skills as $sk): ?>
                        <div class="skill-item" data-aos="zoom-in">
                            <?php if (!empty($sk['subtitle'])): ?>
                                <span class="percent"><?php echo htmlspecialchars($sk['subtitle']); ?></span>
                            <?php endif; ?>
                            <h4 class="name"><?php echo htmlspecialchars($sk['title']); ?></h4>
                            <?php if (!empty($sk['description'])): ?>
                                <p><?php echo htmlspecialchars($sk['description']); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
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
                </div>
        

</div>
</div>
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
                    const lazyloadBackgrounds = document.querySelectorAll( `.e-con.e-parent:not(.e-lazyloaded)` );
                    const lazyloadBackgroundObserver = new IntersectionObserver( ( entries ) => {
                        entries.forEach( ( entry ) => {
                            if ( entry.isIntersecting ) {
                                let lazyloadBackground = entry.target;
                                if( lazyloadBackground ) {
                                    lazyloadBackground.classList.add( 'e-lazyloaded' );
                                }
                                lazyloadBackgroundObserver.unobserve( entry.target );
                            }
                        });
                    }, { rootMargin: '200px 0px 200px 0px' } );
                    lazyloadBackgrounds.forEach( ( lazyloadBackground ) => {
                        lazyloadBackgroundObserver.observe( lazyloadBackground );
                    } );
                };
                const events = [
                    'DOMContentLoaded',
                    'elementor/lazyload/observe',
                ];
                events.forEach( ( event ) => {
                    document.addEventListener( event, lazyloadRunObserver );
                } );
            </script>
            <script src="../wp-includes/js/dist/hooks.min4fdd.js?ver=4d63a3d491d11ffd8ac6" id="wp-hooks-js"></script>
<script src="../wp-includes/js/dist/i18n.minc33c.js?ver=5e580eb46a90c2b997e6" id="wp-i18n-js"></script>
<script id="wp-i18n-js-after">
wp.i18n.setLocaleData( { 'text direction\u0004ltr': [ 'ltr' ] } );
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
<script src="../wp-content/plugins/contact-form-7/includes/js/index6a4d.js?ver=6.1.1" id="contact-form-7-js"></script>
<script src="../wp-content/themes/gridx/assets/js/bootstrap.bundle.min32d4.js?ver=6.8.3" id="bootstrap-js"></script>
<script src="../wp-content/themes/gridx/assets/js/aos32d4.js?ver=6.8.3" id="aos-js"></script>
<script src="../wp-content/themes/gridx/assets/js/main32d4.js?ver=6.8.3" id="gridx-main-js"></script>
<script src="../wp-content/themes/gridx/assets/js/ajax-form32d4.php ?ver=6.8.3" id="ajax-form-js"></script>
<script src="../wp-content/plugins/elementor/assets/js/webpack.runtime.min242d.js?ver=3.31.2" id="elementor-webpack-runtime-js"></script>
<script src="../wp-content/plugins/elementor/assets/js/frontend-modules.min242d.js?ver=3.31.2" id="elementor-frontend-modules-js"></script>
<script src="../wp-includes/js/jquery/ui/core.minb37e.js?ver=1.13.3" id="jquery-ui-core-js"></script>
<script id="elementor-frontend-js-before">
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close","a11yCarouselPrevSlideMessage":"Previous slide","a11yCarouselNextSlideMessage":"Next slide","a11yCarouselFirstSlideMessage":"This is the first slide","a11yCarouselLastSlideMessage":"This is the last slide","a11yCarouselPaginationBulletMessage":"Go to slide"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"responsive":{"breakpoints":{"mobile":{"label":"Mobile Portrait","value":767,"default_value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Mobile Landscape","value":880,"default_value":880,"direction":"max","is_enabled":false},"tablet":{"label":"Tablet Portrait","value":1024,"default_value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet Landscape","value":1200,"default_value":1200,"direction":"max","is_enabled":false},"laptop":{"label":"Laptop","value":1366,"default_value":1366,"direction":"max","is_enabled":false},"widescreen":{"label":"Widescreen","value":2400,"default_value":2400,"direction":"min","is_enabled":false}},"hasCustomBreakpoints":false},"version":"3.31.2","is_static":false,"experimentalFeatures":{"additional_custom_breakpoints":true,"e_element_cache":true,"home_screen":true,"global_classes_should_enforce_capabilities":true,"e_variables":true,"cloud-library":true,"e_opt_in_v4_page":true},"urls":{"assets":"https:\/\/wpriverthemes.com\/gridx\/wp-content\/plugins\/elementor\/assets\/","ajaxurl":"https:\/\/wpriverthemes.com\/gridx\/wp-admin\/admin-ajax.php","uploadUrl":"https:\/\/wpriverthemes.com\/gridx\/wp-content\/uploads"},"nonces":{"floatingButtonsClickTracking":"ff4686d3ec"},"swiperClass":"swiper","settings":{"page":[],"editorPreferences":[]},"kit":{"active_breakpoints":["viewport_mobile","viewport_tablet"],"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":1065,"title":"CREDENTIAL%20PAGE%20%E2%80%93%20Gridx%20%E2%80%93%20WordPress%20Theme","excerpt":"","featuredImage":false}};
</script>
<script src="../wp-content/plugins/elementor/assets/js/frontend.min242d.js?ver=3.31.2" id="elementor-frontend-js"></script>
</body>

<!-- Mirrored from wpriverthemes.com/gridx/credential/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Feb 2026 10:19:01 GMT -->
</html>

