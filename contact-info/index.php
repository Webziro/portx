<?php
include "../include/title.php";
require_once "../include/db.php";

$profile = $pdo->query("SELECT * FROM profile WHERE id = 1")->fetch();
?>

<!DOCTYPE html>
<html lang="en-US">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<?php
include "../include/head.php";
?>

<body
    class="wp-singular page-template page-template-page-templates page-template-main-contact page-template-page-templatesmain-contact-php page page-id-1560 wp-theme-gridx elementor-default elementor-kit-16 elementor-page elementor-page-1560">

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


        <!-- Contact -->
        <div data-elementor-type="wp-page" data-elementor-id="1560" class="elementor elementor-1560">
            <section
                class="elementor-section elementor-top-section elementor-element elementor-element-89e5b50 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                data-id="89e5b50" data-element_type="section">
                <div class="elementor-container elementor-column-gap-no">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-80b8439"
                        data-id="80b8439" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-aa1b3d3 elementor-widget__width-initial elementor-widget elementor-widget-gridxdacontactinfobox"
                                data-id="aa1b3d3" data-element_type="widget"
                                data-widget_type="gridxdacontactinfobox.default">
                                <div class="elementor-widget-container">

                                    <!-- Start Contact  Box         -->

                                    <!-- Contact -->
                                    <section class="contact-area">
                                        <div class="container">
                                            <div class="gx-row d-flex justify-content-between gap-24">


                                                <div class="contact-infos">
                                                    <h4 data-aos="fade-up">Contact Info</h4>

                                                    <ul class="contact-details">
                                                        <li class="d-flex align-items-center" data-aos="zoom-in">
                                                            <div class="icon-box shadow-box">
                                                                <i class="iconoir-mail"></i>
                                                            </div>
                                                            <div class="right">
                                                                <span>Talk to me</span>
                                                                <h5><?= htmlspecialchars($profile['email'] ?? '[EMAIL_ADDRESS]') ?></h5>
                                                            </div>
                                                        </li>
                                                        <li class="d-flex align-items-center" data-aos="zoom-in">
                                                            <div class="icon-box shadow-box">
                                                                <i class="iconoir-phone"></i>
                                                            </div>
                                                            <div class="right">
                                                                <span>Contact Us</span>
                                                                <h5><?= htmlspecialchars($profile['phone'] ?? '+234 808 379 2208') ?></h5>
                                                            </div>
                                                        </li>
                                                    </ul>

                                                    <h4 data-aos="fade-up">Social Info</h4>
                                                    <ul class="social-links d-flex align-center" data-aos="zoom-in">
                                                        <li><a target="_blank" class="shadow-box" href="https://x.com/Amazirostanley"><i
                                                                    class="iconoir-twitter"></i></a></li>
                                                        <li><a target="_blank" class="shadow-box" href="https://www.linkedin.com/in/stanleyamaziro/"><i
                                                                    class="iconoir-linkedin"></i></a></li>
                                                    </ul>
                                                </div>

                                                <div data-aos="zoom-in" class="contact-form">
                                                    <div class="shadow-box">

                                                        <img decoding="async"
                                                            src="../wp-content/themes/gridx/assets/images/bg1.png"
                                                            alt="img" class="bg-img">


                                                        <img decoding="async"
                                                            src="../wp-content/themes/gridx/assets/images/icon2.png"
                                                            alt="img" class="star-icon">


                                                        <h2>Let’s work <span>together.</h2>

                                                        <div class="wpcf7 no-js" id="wpcf7-f1777-p1560-o1" lang="en-US"
                                                            dir="ltr" data-wpcf7-id="1777">
                                                            <div class="screen-reader-response">
                                                                <p role="status" aria-live="polite" aria-atomic="true">
                                                                </p>
                                                                <ul></ul>
                                                            </div>
                                                            <form action="#" method="post" class="wpcf7-form init"
                                                                aria-label="Contact form" novalidate="novalidate"
                                                                data-status="init">
                                                                <fieldset class="hidden-fields-container"><input
                                                                        type="hidden" name="_wpcf7"
                                                                        value="1777" /><input type="hidden"
                                                                        name="_wpcf7_version" value="6.1.1" /><input
                                                                        type="hidden" name="_wpcf7_locale"
                                                                        value="en_US" /><input type="hidden"
                                                                        name="_wpcf7_unit_tag"
                                                                        value="wpcf7-f1777-p1560-o1" /><input
                                                                        type="hidden" name="_wpcf7_container_post"
                                                                        value="1560" /><input type="hidden"
                                                                        name="_wpcf7_posted_data_hash" value="" />
                                                                </fieldset>
                                                                <div class="alert alert-success messenger-box-contact__msg"
                                                                    style="display: none" role="alert">
                                                                    <p>Your message was sent successfully.
                                                                    </p>
                                                                </div>
                                                                <div class="input-group">
                                                                    <p><span class="wpcf7-form-control-wrap"
                                                                            data-name="full-name"><input size="40"
                                                                                maxlength="400"
                                                                                class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-group"
                                                                                id="full-name" aria-required="true"
                                                                                aria-invalid="false"
                                                                                placeholder="Name *" value=""
                                                                                type="text" name="full-name" /></span>
                                                                    </p>
                                                                </div>
                                                                <div class="input-group">
                                                                    <p><span class="wpcf7-form-control-wrap"
                                                                            data-name="email"><input size="40"
                                                                                maxlength="400"
                                                                                class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email input-group"
                                                                                id="email" aria-required="true"
                                                                                aria-invalid="false"
                                                                                placeholder="Email *" value=""
                                                                                type="email" name="email" /></span>
                                                                    </p>
                                                                </div>
                                                                <div class="input-group">
                                                                    <p><span class="wpcf7-form-control-wrap"
                                                                            data-name="subject"><input size="40"
                                                                                maxlength="400"
                                                                                class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-group"
                                                                                id="subject" aria-required="true"
                                                                                aria-invalid="false"
                                                                                placeholder="Your Subject *" value=""
                                                                                type="text" name="subject" /></span>
                                                                    </p>
                                                                </div>
                                                                <div class="input-group">
                                                                    <p><span class="wpcf7-form-control-wrap"
                                                                            data-name="message"><textarea cols="40"
                                                                                rows="10" maxlength="2000"
                                                                                class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required input-group"
                                                                                id="message" aria-required="true"
                                                                                aria-invalid="false"
                                                                                placeholder="Your Message *"
                                                                                name="message"></textarea></span>
                                                                    </p>
                                                                </div>
                                                                <div class="input-group">
                                                                    <p><button class="theme-btn submit-btn"
                                                                            type="submit" name="submit" id="submit">Send
                                                                            Message</button>
                                                                    </p>
                                                                </div>
                                                                <div class="wpcf7-response-output" aria-hidden="true">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </section>

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
    <script src="../wp-content/themes/gridx/assets/js/ajax-form32d4.php ?ver=6.8.3" id="ajax-form-js"></script>
    <script src="../wp-content/plugins/elementor/assets/js/webpack.runtime.min242d.js?ver=3.31.2"
        id="elementor-webpack-runtime-js"></script>
    <script src="../wp-content/plugins/elementor/assets/js/frontend-modules.min242d.js?ver=3.31.2"
        id="elementor-frontend-modules-js"></script>
    <script src="../wp-includes/js/jquery/ui/core.minb37e.js?ver=1.13.3" id="jquery-ui-core-js"></script>
    <script id="elementor-frontend-js-before">
        var elementorFrontendConfig = { "environmentMode": { "edit": false, "wpPreview": false, "isScriptDebug": false }, "i18n": { "shareOnFacebook": "Share on Facebook", "shareOnTwitter": "Share on Twitter", "pinIt": "Pin it", "download": "Download", "downloadImage": "Download image", "fullscreen": "Fullscreen", "zoom": "Zoom", "share": "Share", "playVideo": "Play Video", "previous": "Previous", "next": "Next", "close": "Close", "a11yCarouselPrevSlideMessage": "Previous slide", "a11yCarouselNextSlideMessage": "Next slide", "a11yCarouselFirstSlideMessage": "This is the first slide", "a11yCarouselLastSlideMessage": "This is the last slide", "a11yCarouselPaginationBulletMessage": "Go to slide" }, "is_rtl": false, "breakpoints": { "xs": 0, "sm": 480, "md": 768, "lg": 1025, "xl": 1440, "xxl": 1600 }, "responsive": { "breakpoints": { "mobile": { "label": "Mobile Portrait", "value": 767, "default_value": 767, "direction": "max", "is_enabled": true }, "mobile_extra": { "label": "Mobile Landscape", "value": 880, "default_value": 880, "direction": "max", "is_enabled": false }, "tablet": { "label": "Tablet Portrait", "value": 1024, "default_value": 1024, "direction": "max", "is_enabled": true }, "tablet_extra": { "label": "Tablet Landscape", "value": 1200, "default_value": 1200, "direction": "max", "is_enabled": false }, "laptop": { "label": "Laptop", "value": 1366, "default_value": 1366, "direction": "max", "is_enabled": false }, "widescreen": { "label": "Widescreen", "value": 2400, "default_value": 2400, "direction": "min", "is_enabled": false } }, "hasCustomBreakpoints": false }, "version": "3.31.2", "is_static": false, "experimentalFeatures": { "additional_custom_breakpoints": true, "e_element_cache": true, "home_screen": true, "global_classes_should_enforce_capabilities": true, "e_variables": true, "cloud-library": true, "e_opt_in_v4_page": true }, "urls": { "assets": "https:\/\/wpriverthemes.com\/gridx\/wp-content\/plugins\/elementor\/assets\/", "ajaxurl": "https:\/\/wpriverthemes.com\/gridx\/wp-admin\/admin-ajax.php", "uploadUrl": "https:\/\/wpriverthemes.com\/gridx\/wp-content\/uploads" }, "nonces": { "floatingButtonsClickTracking": "ff4686d3ec" }, "swiperClass": "swiper", "settings": { "page": [], "editorPreferences": [] }, "kit": { "active_breakpoints": ["viewport_mobile", "viewport_tablet"], "global_image_lightbox": "yes", "lightbox_enable_counter": "yes", "lightbox_enable_fullscreen": "yes", "lightbox_enable_zoom": "yes", "lightbox_enable_share": "yes", "lightbox_title_src": "title", "lightbox_description_src": "description" }, "post": { "id": 1560, "title": "CONTACT%20INFO%20%E2%80%93%20Gridx%20%E2%80%93%20WordPress%20Theme", "excerpt": "", "featuredImage": false } };
    </script>
    <script src="../wp-content/plugins/elementor/assets/js/frontend.min242d.js?ver=3.31.2"
        id="elementor-frontend-js"></script>
</body>

<!-- Mirrored from wpriverthemes.com/gridx/contact-info/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Feb 2026 10:18:53 GMT -->

</html>