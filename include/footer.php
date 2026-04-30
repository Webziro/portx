<?php 
    include_once __DIR__ 
    . '/path_helper.php';
?>

<footer class="footer-area">
            <div class="container">
                <div class="footer-content text-center">


                    <a href="<?= asset_url('') ?>" class="logo">
                        <img src="<?= asset_url('wp-content/themes/gridx/assets/images/logo.png') ?>" alt="Logo">
                    </a>

                    <ul data-in="#" data-out="#" class="footer-menu" id="menu-footer-menu">
                        <li id="menu-item-1856"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-1856">
                            <a title="Home" href="<?= asset_url('') ?>">Home</a></li>
                        <li id="menu-item-1857"
                            class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-926 current_page_item menu-item-1857 active">
                            <a title="About" href="<?= asset_url('about-page') ?>">About</a></li>
                        <li id="menu-item-1859"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1859"><a
                                title="Works" href="<?= asset_url('work') ?>">Projects</a></li>
                        <li id="menu-item-blog"
                            class="menu-item menu-item-type-post_type menu-item-object-page"><a
                                title="Blog" href="<?= asset_url('blog') ?>">Blog</a></li>
                        <li id="menu-item-1858"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1858"><a
                                title="Contact" href="<?= asset_url('contact-info') ?>">Contact</a></li>
                    </ul>
                    <p class="copyright">Hand crafted with ❤️ stay guided 💯 <span>
                            <a target="_blank"
                                href="<?= asset_url('') ?>">Stanley Amaziro
                            </a>
                        </span>
                    </p>
                </div>
            </div>
        </footer>