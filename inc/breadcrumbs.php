<?php
function custom_theme_breadcrumbs() {
    // Breadcrumbs are typically hidden on the homepage
    if ( is_front_page() || is_home() ) {
        return;
    }

    // Open your custom wrappers
    echo '<nav class="breadcrumbs" aria-label="Breadcrumb">';
    echo '<div class="l-center">';
    echo '<ol class="l-cluster clean-list" role="list">';

    // 1. Home Link (Always first)
    echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';

    // 2. Standard Pages
    if ( is_page() ) {
        global $post;
        
        // If the page has parents, loop through them to build the trail
        if ( $post->post_parent ) {
            $ancestors = get_post_ancestors( $post->ID );
            $ancestors = array_reverse( $ancestors ); // Reverse so top-level is first
            
            foreach ( $ancestors as $ancestor ) {
                echo '<li><a href="' . esc_url( get_permalink( $ancestor ) ) . '">' . esc_html( get_the_title( $ancestor ) ) . '</a></li>';
            }
        }
        
        // Output the current page
        echo '<li><a href="' . esc_url( get_permalink() ) . '" aria-current="page">' . esc_html( get_the_title() ) . '</a></li>';
    }
    
    // 3. Single Blog Posts
    elseif ( is_single() ) {
        $categories = get_the_category();
        // Output the first category as the "parent" of the post
        if ( ! empty( $categories ) ) {
            echo '<li><a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></li>';
        }
        
        // Output the current post
        echo '<li><a href="' . esc_url( get_permalink() ) . '" aria-current="page">' . esc_html( get_the_title() ) . '</a></li>';
    }
    
    // 4. Categories & Archives
    elseif ( is_archive() ) {
        // Archive pages don't need an href for the current state, so we link to the current URI or use a fallback
        $current_url = home_url( add_query_arg( array(), $wp->request ) );
        echo '<li><a href="' . esc_url( $current_url ) . '" aria-current="page">' . esc_html( get_the_archive_title() ) . '</a></li>';
    }
    
    // 5. 404 Error Pages
    elseif ( is_404() ) {
        echo '<li><a href="javascript:;" aria-current="page">Page Not Found</a></li>';
    }
    
    // 6. Search Results
    elseif ( is_search() ) {
        echo '<li><a href="javascript:;" aria-current="page">Search Results for: ' . esc_html( get_search_query() ) . '</a></li>';
    }

    // Close your custom wrappers
    echo '</ol>';
    echo '</div>';
    echo '</nav>';
}