<nav class="global-nav" data-component="nav-double-intro" aria-label="Double level with intro text demo">
    <button class="button button--ghost" data-trigger="mobile-nav" style="display: none;">
        <span class="visuallyhidden">Menu</span>
    </button>
    <?php 
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu_class'     => 'clean-list',
            'container'      => false,
            'items_wrap'     => '<ul id="%1$s" class="%2$s" role="list">%3$s</ul>',
            'walker'         => new Custom_Mega_Menu_Walker(),
        ) );
    ?>
</nav>