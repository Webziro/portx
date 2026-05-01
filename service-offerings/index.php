<?php
require_once '../include/db.php';
$services = $pdo->query("SELECT * FROM services ORDER BY display_order")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from wpriverthemes.com/gridx/service-offerings/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Feb 2026 10:19:22 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<?php
$title = "SERVICE OFFERING – Gridx – WordPress Theme";
include "../include/head.php";
?>

    <style id='global-styles-inline-css'>
        :root {
            --wp--preset--aspect-ratio--square: 1;
            --wp--preset--aspect-ratio--4-3: 4/3;
            --wp--preset--aspect-ratio--3-4: 3/4;
            --wp--preset--aspect-ratio--3-2: 3/2;
            --wp--preset--aspect-ratio--2-3: 2/3;
            --wp--preset--aspect-ratio--16-9: 16/9;
            --wp--preset--aspect-ratio--9-16: 9/16;
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--font-size--small: 13px;
            --wp--preset--font-size--medium: 20px;
            --wp--preset--font-size--large: 36px;
            --wp--preset--font-size--x-large: 42px;
            --wp--preset--spacing--20: 0.44rem;
            --wp--preset--spacing--30: 0.67rem;
            --wp--preset--spacing--40: 1rem;
            --wp--preset--spacing--50: 1.5rem;
            --wp--preset--spacing--60: 2.25rem;
            --wp--preset--spacing--70: 3.38rem;
            --wp--preset--spacing--80: 5.06rem;
            --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
            --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
            --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
        }

        :where(.is-layout-flex) {
            gap: 0.5em;
        }

        :where(.is-layout-grid) {
            gap: 0.5em;
        }

        body .is-layout-flex {
            display: flex;
        }

        .is-layout-flex {
            flex-wrap: wrap;
            align-items: center;
        }

        .is-layout-flex> :is(*, div) {
            margin: 0;
        }

        body .is-layout-grid {
            display: grid;
        }

        .is-layout-grid> :is(*, div) {
            margin: 0;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        :root :where(.wp-block-pullquote) {
            font-size: 1.5em;
            line-height: 1.6;
        }
    </style>
    <link rel='stylesheet' id='contact-form-7-css'
        href='../wp-content/plugins/contact-form-7/includes/css/styles6a4d.css?ver=6.1.1' media='all' />
    <link rel='stylesheet' id='icon-css' href='../wp-content/themes/gridx/assets/css/iconoir32d4.css?ver=6.8.3'
        media='all' />
    <link rel='stylesheet' id='bootstrap-css'
        href='../wp-content/themes/gridx/assets/css/bootstrap.min32d4.css?ver=6.8.3' media='all' />
    <link rel='stylesheet' id='aos-css' href='../wp-content/themes/gridx/assets/css/aos32d4.css?ver=6.8.3'
        media='all' />
    <link rel='stylesheet' id='gridx-style-css' href='../wp-content/themes/gridx/assets/css/style32d4.css?ver=6.8.3'
        media='all' />
    <link rel='stylesheet' id='gridx-unit-test-css'
        href='../wp-content/themes/gridx/assets/css/gridx-unit-test32d4.css?ver=6.8.3' media='all' />
    <link rel='stylesheet' id='gridx-fonts-css'
        href='http://fonts.googleapis.com/css?family=Inter%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C%26subset%3Dlatin%2Clatin-ext&amp;ver=1.0.0'
        media='all' />
    <link rel='stylesheet' id='elementor-icons-css'
        href='../wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min2778.css?ver=5.43.0'
        media='all' />
    <link rel='stylesheet' id='elementor-frontend-css'
        href='../wp-content/plugins/elementor/assets/css/frontend.min242d.css?ver=3.31.2' media='all' />
    <link rel='stylesheet' id='elementor-post-16-css'
        href='../wp-content/uploads/elementor/css/post-16502b.css?ver=1759267250' media='all' />
    <link rel='stylesheet' id='elementor-post-1119-css'
        href='../wp-content/uploads/elementor/css/post-11193db8.php ?ver=1759267251' media='all' />
    <link rel="preload" as="style"
        href="https://fonts.googleapis.com/css?family=Inter&amp;display=swap&amp;ver=1750335307" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter&amp;display=swap&amp;ver=1750335307"
        media="print" onload="this.media='all'"><noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Inter&amp;display=swap&amp;ver=1750335307" />
    </noscript>
    <link rel='stylesheet' id='elementor-gf-local-roboto-css'
        href='../wp-content/uploads/elementor/google-fonts/css/roboto53af.css?ver=1750335123' media='all' />
    <link rel='stylesheet' id='elementor-gf-local-robotoslab-css'
        href='../wp-content/uploads/elementor/google-fonts/css/robotoslab6055.css?ver=1750335144' media='all' />
    <script src="../wp-includes/js/jquery/jquery.minf43b.js?ver=3.7.1" id="jquery-core-js"></script>
    <script src="../wp-includes/js/jquery/jquery-migrate.min5589.js?ver=3.4.1" id="jquery-migrate-js"></script>
    <link rel="https://api.w.org/" href="../wp-json/index.php " />
    <link rel="alternate" title="JSON" type="application/json" href="../wp-json/wp/v2/pages/1119.php " />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="../xmlrpc0db0.php?rsd" />
    <meta name="generator" content="WordPress 6.8.3" />
    <link rel="canonical" href="index.php " />
    <link rel='shortlink' href='../indexb51f.php ?p=1119' />
    <link rel="alternate" title="oEmbed (JSON)" type="application/json+oembed"
        href="../wp-json/oembed/1.0/embed2bf9.php ?url=https%3A%2F%2Fwpriverthemes.com%2Fgridx%2Fservice-offerings%2F" />
    <link rel="alternate" title="oEmbed (XML)" type="text/xml+oembed"
        href="../wp-json/oembed/1.0/embedbf60.php ?url=https%3A%2F%2Fwpriverthemes.com%2Fgridx%2Fservice-offerings%2F&amp;format=xml" />
    <meta name="generator" content="Redux 4.5.7" />
    <style>
        :root {
            --default-color: #5B78F6;
        }

        :root {
            --primary_color: var(--default-color) !important;
        }

        .about-area .about-me-box .img-box {
            background: linear-gradient(90deg, var(--default-color) -15%, #C2EBFF 58%, var(--default-color) 97%) !important;
        }
    </style>

    <meta name="generator"
        content="Elementor 3.31.2; features: additional_custom_breakpoints, e_element_cache; settings: css_print_method-external, google_font-enabled, font_display-swap">
    <style>
        .e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload),
        .e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload) * {
            background-image: none !important;
        }

        @media screen and (max-height: 1024px) {

            .e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload),
            .e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload) * {
                background-image: none !important;
            }
        }

        @media screen and (max-height: 640px) {

            .e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload),
            .e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload) * {
                background-image: none !important;
            }
        }
    </style>
    <style id="wp-custom-css">
        .contact-details,
        .social-links {
            padding-left: 0 !important;
        }

        .contact-area .input-group p {
            width: 100%
        }

        .contact-area .contact-form form .input-group+.input-group {
            margin-top: -3px;
        }

        /* .h1-100{
    height:100% !important;
} */
        .service-area .elementor-widget-container {
            height: 100%
        }

        .service-area .info-box.about-contact-box {
            padding-bottom: 58px
        }

        .margin-0,
        .margin-0 .elementor-widget-wrap {
            margin: 0 !important;
        }
    </style>
    <style id="gridx_options-dynamic-css" title="dynamic-css" class="redux-options-output">
        .header-area .navbar .menu li a {
            font-family: Inter;
            font-weight: normal;
            font-style: normal;
        }

        .header-area .navbar .menu li.active a,
        .header-area .navbar .menu li a:hover {
            font-family: Inter;
            font-weight: normal;
            font-style: normal;
        }

        .footer-area .footer-content .footer-menu li a {
            font-family: Inter;
            font-weight: normal;
            font-style: normal;
        }

        .footer-area .footer-content .footer-menu li a:hover {
            font-family: Inter;
            font-weight: normal;
            font-style: normal;
        }
    </style>
</head>

<body
    class="wp-singular page-template page-template-page-templates page-template-main-service page-template-page-templatesmain-service-php page page-id-1119 wp-theme-gridx elementor-default elementor-kit-16 elementor-page elementor-page-1119">

    <div id="preloader" class="preloader">
        <div class="black_wall"></div>
        <div class="loader"></div>
    </div>

    <main class="main-homepage">

        <!-- Header -->
        <header class="header-area">
            <div class="container">
                <div class="gx-row d-flex align-items-center justify-content-between">
                    <a href="../" class="logo">
                        <img src="../wp-content/uploads/logo.png" alt="Logo">
                    </a>

                    <!-- Collect the nav links, forms, and other content for toggling -->

                    <nav class="navbar">
                        <ul data-in="#" data-out="#" class="menu" id="menu-main-menu">
                             <li id="menu-item-1850"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-1850">
                                <a title="Home" href="../">Home</a></li>
                            <li id="menu-item-1851"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1851"><a
                                    title="About" href="../about-page">About</a></li>
                            <li id="menu-item-1853"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1853"><a
                                    title="Works" href="../work">Works</a></li>
                            <li id="menu-item-1852"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1852"><a
                                    title="Contact" href="../contact-info">Contact</a></li>
                        </ul>
                    </nav>
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

        <!-- Service -->
        <section class="service-area">
            <div class="container">
                <!-- <h1 class="section-heading" data-aos="fade-up"><img src="./assets/images/star-2.png" alt="Star"> My Offerings <img src="./assets/images/star-2.png" alt="Star"></h1> -->







                <div data-elementor-type="wp-page" data-elementor-id="1119" class="elementor elementor-1119">
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-c057728 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="c057728" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5690479"
                                data-id="5690479" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <section
                                        class="elementor-section elementor-inner-section elementor-element elementor-element-44fca9a elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                        data-id="44fca9a" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-7a7fa3f"
                                                data-id="7a7fa3f" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-4635d00 h-100 elementor-widget elementor-widget-gridxdaservicesidebar"
                                                        data-id="4635d00" data-element_type="widget"
                                                        data-widget_type="gridxdaservicesidebar.default">
                                                        <div class="elementor-widget-container">

                                                            <!-- Start ServiceSidebar
    ============================================= -->




                                                            <!-- Sidebar -->

                                                            <div class="service-sidebar" data-aos="fade-right">
                                                                <div class="service-sidebar-inner shadow-box">
                                                                    <ul>
                                                                        <?php foreach ($services as $svc): ?>
                                                                            <li>
                                                                                <i
                                                                                    class="<?php echo htmlspecialchars($svc['icon_class']); ?> icon"></i>
                                                                                <?php echo htmlspecialchars(strtoupper($svc['label'])); ?>
                                                                            </li>
                                                                        <?php endforeach; ?>
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
                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-b02c996"
                                                data-id="b02c996" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-ad8c673 elementor-widget elementor-widget-gridxdaservicecontentbox"
                                                        data-id="ad8c673" data-element_type="widget"
                                                        data-widget_type="gridxdaservicecontentbox.default">
                                                        <div class="elementor-widget-container">

                                                            <!-- Start AboutDetail
    ============================================= -->



                                                            <!-- Content -->

                                                            <h1 class="section-heading" data-aos="fade-up">
                                                                <img decoding="async"
                                                                    src="../wp-content/themes/gridx/assets/images/star-2.png"
                                                                    alt="img">

                                                                My Offerings <img decoding="async"
                                                                    src="../wp-content/themes/gridx/assets/images/star-2.png"
                                                                    alt="img">

                                                            </h1>

                                                            <div class="service-content-wrap" data-aos="zoom-in">
                                                                <div class="service-content-inner shadow-box">
                                                                    <div class="service-items">
                                                                        <?php foreach ($services as $svc): ?>
                                                                            <div class="service-item">
                                                                                <h4><?php echo htmlspecialchars($svc['label']); ?>
                                                                                </h4>
                                                                                <?php if (!empty($svc['description'])): ?>
                                                                                    <p><?php echo htmlspecialchars($svc['description']); ?>
                                                                                    </p>
                                                                                <?php else: ?>
                                                                                    <p>Professional services tailored to your
                                                                                        needs.</p>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        <?php endforeach; ?>
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
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-d3ed86a elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="d3ed86a" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-73c83d4"
                                data-id="73c83d4" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <section
                                        class="elementor-section elementor-inner-section elementor-element elementor-element-e33f508 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                        data-id="e33f508" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-822f062"
                                                data-id="822f062" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-031f9cc elementor-widget elementor-widget-gridxdaprofilesbox"
                                                        data-id="031f9cc" data-element_type="widget"
                                                        data-widget_type="gridxdaprofilesbox.default">
                                                        <div class="elementor-widget-container">

                                                            <!-- Start Profiles Box -->
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
                                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-e325eec"
                                                data-id="e325eec" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-983e78f elementor-widget elementor-widget-gridxdacontactbox"
                                                        data-id="983e78f" data-element_type="widget"
                                                        data-widget_type="gridxdacontactbox.default">
                                                        <div class="elementor-widget-container">

                                                            <!-- Start Contact Box
    ============================================= -->


                                                            <div data-aos="zoom-in" class="about-contact-box-wrap">

                                                                <div class="about-contact-box info-box shadow-box">
                                                                    <a class="overlay-link"
                                                                        href="../contact-info"></a>

                                                                    <img decoding="async"
                                                                        src="../wp-content/themes/gridx/assets/images/bg1.png"
                                                                        alt="BG" class="bg-img">


                                                                    <img decoding="async"
                                                                        src="../wp-content/themes/gridx/assets/images/icon2.png"
                                                                        alt="Star" class="star-icon">




                                                                    <h2>Let's <br>work <span>together.</h2>
                                                                    <a href="../contact-info"
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
                                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-f093cd1"
                                                data-id="f093cd1" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-ee2d870 elementor-widget elementor-widget-gridxdacredentialbox"
                                                        data-id="ee2d870" data-element_type="widget"
                                                        data-widget_type="gridxdacredentialbox.default">
                                                        <div class="elementor-widget-container">

                                                            <!-- Start Credentials Box
    ============================================= -->
                                                            <div data-aos="zoom-in" class="about-crenditials-box">
                                                                <div class="info-box shadow-box h-full">
                                                                    <a class="overlay-link"
                                                                        href="../credential"></a>


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

                                                                        <a href="../credential"
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
        <footer class="footer-area">
            <div class="container">
                <div class="footer-content text-center">


                    <a href="../" class="logo">
                        <img src="../wp-content/themes/gridx/assets/images/logo.png" alt="Logo">
                    </a>

                    <ul data-in="#" data-out="#" class="footer-menu" id="menu-footer-menu">
                        <li id="menu-item-1856"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-1856">
                            <a title="Home" href="../">Home</a></li>
                        <li id="menu-item-1857"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1857"><a
                                title="About" href="../about-page">About</a></li>
                        <li id="menu-item-1859"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1859"><a
                                title="Works" href="../work">Works</a></li>
                        <li id="menu-item-1858"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1858"><a
                                title="Contact" href="../contact-info">Contact</a></li>
                    </ul>
                    <p class="copyright">
                        © All rights reserved by <span>
                            <a target="_blank"
                                href="https://themeforest.net/user/wordpressriver/portfolio">WordPressRiver</a>

                        </span>
                    </p>
                </div>
            </div>
        </footer>

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
        var elementorFrontendConfig = { "environmentMode": { "edit": false, "wpPreview": false, "isScriptDebug": false }, "i18n": { "shareOnFacebook": "Share on Facebook", "shareOnTwitter": "Share on Twitter", "pinIt": "Pin it", "download": "Download", "downloadImage": "Download image", "fullscreen": "Fullscreen", "zoom": "Zoom", "share": "Share", "playVideo": "Play Video", "previous": "Previous", "next": "Next", "close": "Close", "a11yCarouselPrevSlideMessage": "Previous slide", "a11yCarouselNextSlideMessage": "Next slide", "a11yCarouselFirstSlideMessage": "This is the first slide", "a11yCarouselLastSlideMessage": "This is the last slide", "a11yCarouselPaginationBulletMessage": "Go to slide" }, "is_rtl": false, "breakpoints": { "xs": 0, "sm": 480, "md": 768, "lg": 1025, "xl": 1440, "xxl": 1600 }, "responsive": { "breakpoints": { "mobile": { "label": "Mobile Portrait", "value": 767, "default_value": 767, "direction": "max", "is_enabled": true }, "mobile_extra": { "label": "Mobile Landscape", "value": 880, "default_value": 880, "direction": "max", "is_enabled": false }, "tablet": { "label": "Tablet Portrait", "value": 1024, "default_value": 1024, "direction": "max", "is_enabled": true }, "tablet_extra": { "label": "Tablet Landscape", "value": 1200, "default_value": 1200, "direction": "max", "is_enabled": false }, "laptop": { "label": "Laptop", "value": 1366, "default_value": 1366, "direction": "max", "is_enabled": false }, "widescreen": { "label": "Widescreen", "value": 2400, "default_value": 2400, "direction": "min", "is_enabled": false } }, "hasCustomBreakpoints": false }, "version": "3.31.2", "is_static": false, "experimentalFeatures": { "additional_custom_breakpoints": true, "e_element_cache": true, "home_screen": true, "global_classes_should_enforce_capabilities": true, "e_variables": true, "cloud-library": true, "e_opt_in_v4_page": true }, "urls": { "assets": "https:\/\/wpriverthemes.com\/gridx\/wp-content\/plugins\/elementor\/assets\/", "ajaxurl": "https:\/\/wpriverthemes.com\/gridx\/wp-admin\/admin-ajax.php", "uploadUrl": "https:\/\/wpriverthemes.com\/gridx\/wp-content\/uploads" }, "nonces": { "floatingButtonsClickTracking": "ff4686d3ec" }, "swiperClass": "swiper", "settings": { "page": [], "editorPreferences": [] }, "kit": { "active_breakpoints": ["viewport_mobile", "viewport_tablet"], "global_image_lightbox": "yes", "lightbox_enable_counter": "yes", "lightbox_enable_fullscreen": "yes", "lightbox_enable_zoom": "yes", "lightbox_enable_share": "yes", "lightbox_title_src": "title", "lightbox_description_src": "description" }, "post": { "id": 1119, "title": "SERVICE%20OFFERING%20%E2%80%93%20Gridx%20%E2%80%93%20WordPress%20Theme", "excerpt": "", "featuredImage": false } };
    </script>
    <script src="../wp-content/plugins/elementor/assets/js/frontend.min242d.js?ver=3.31.2"
        id="elementor-frontend-js"></script>
</body>

<!-- Mirrored from wpriverthemes.com/gridx/service-offerings/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Feb 2026 10:19:27 GMT -->

</html>