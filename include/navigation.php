<?php
// Check if we are currently executing from the root directory level
$nav_prefix = file_exists('include/navigation.php') ? '' : '../';
?>
<nav class="navbar">
    <ul data-in="#" data-out="#" class="menu" id="menu-main-menu">
        <li id="menu-item-1850"
            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-13 current_page_item menu-item-1850 active">
            <a title="Home" href="<?php echo $nav_prefix; ?>index.php">Home</a></li>
        <li id="menu-item-1851"
            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1851"><a
                title="About" href="<?php echo $nav_prefix; ?>about-page/index.php">About</a></li>
        <li id="menu-item-1853"
            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1853"><a
                title="Works" href="<?php echo $nav_prefix; ?>work/index.php">Projects</a></li>
        <li id="menu-item-1852"
            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1852"><a
                title="Contact" href="<?php echo $nav_prefix; ?>contact-info/index.php">Contact</a></li>
    </ul>
</nav>