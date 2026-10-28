<?php
function custom_theme_pagination( $query = null ) {
    // Fallback to the main global query if a custom one isn't provided
    if ( ! $query ) {
        global $wp_query;
        $query = $wp_query;
    }

    // Don't output anything if there's only one page
    if ( $query->max_num_pages <= 1 ) {
        return;
    }

    // Fetch the pagination links as an array
    $links = paginate_links( array(
        'current'   => max( 1, get_query_var( 'paged' ) ),
        'total'     => $query->max_num_pages,
        'type'      => 'array',
        'prev_text' => 'Previous',
        'next_text' => 'Next',
        'mid_size'  => 1, // Controls how many numbers show around the current page
    ) );

    if ( ! empty( $links ) ) {
        echo '<nav aria-label="Pagination" class="pagination">';
        echo '<ul class="pagination__list l-cluster clean-list">';
        
        foreach ( $links as $link ) {
            // WordPress natively wraps the active page and ellipsis in <span> tags. 
            // We use strpos to find them and rewrite them to match your exact <a> tag markup.
            
            // Rewrite the active/current page
            if ( strpos( $link, 'current' ) !== false ) {
                $page_num = strip_tags( $link ); // Extract just the number
                $link = '<a href="#" aria-current="page">' . $page_num . '</a>';
            } 
            // Rewrite the ellipsis
            elseif ( strpos( $link, 'dots' ) !== false ) {
                $link = '<a class="ellipsis">&#8230;</a>';
            }

            // Output the list item
            echo '<li>' . $link . '</li>';
        }
        
        echo '</ul>';
        echo '</nav>';
    }
}

/**
 * 
 * Usage:
 * <?php 
// For standard main-loop pagination:
if ( function_exists( 'custom_theme_pagination' ) ) {
    custom_theme_pagination();
} 

// If you are using a custom WP_Query (e.g., $my_custom_query = new WP_Query(...)):
// custom_theme_pagination( $my_custom_query );
?>
 * 
 */