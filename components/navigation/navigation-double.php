<nav class="global-nav" data-component="nav-double">
    <button class="button button--ghost" data-trigger="mobile-nav" style="display: none;">
        <span class="visuallyhidden">Menu</span>
    </button>
    <?php
        wp_nav_menu(
            array(
                'menu' => 'Primary Menu',
                'container' => 'ul',
                'menu-id' => 'primary-menu',
                'menu_class' => 'clean-list'
            )
        );
    ?>
</nav>