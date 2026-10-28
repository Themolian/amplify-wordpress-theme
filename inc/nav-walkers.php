<?php

class Custom_Mega_Menu_Walker extends Walker_Nav_Menu {
    
    // Store the current parent item to access its description and title attribute in the submenu
    private $current_parent_item;

    // 1. Modify the starting HTML for individual menu items (<li> and <a>)
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        
        // Save parent item if it has children, so start_lvl can access it
        if ( in_array( 'menu-item-has-children', $classes ) ) {
            $this->current_parent_item = $item;
        }

        // Output the <li>
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $output .= '<li' . $class_names . '>';

        // Setup the <a> attributes
        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
        $atts['class']  = 'nav-link'; // Hardcoded class from your HTML

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $attributes .= ' ' . $attr . '="' . esc_attr( $value ) . '"';
            }
        }

        // Build the anchor tag
        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    // 2. Modify the starting HTML for submenus (the wrapper and <ul>)
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        // Fallbacks if menu fields are empty
        $intro_text = ! empty( $this->current_parent_item->description ) 
            ? $this->current_parent_item->description 
            : 'A brief introduction to the ' . $this->current_parent_item->title . ' section can go here.';
            
        $intro_link_text = ! empty( $this->current_parent_item->attr_title ) 
            ? $this->current_parent_item->attr_title 
            : 'Explore ' . $this->current_parent_item->title;
            
        $intro_link_url = $this->current_parent_item->url;

        // Build your custom submenu wrappers
        $output .= '<div data-nav="submenu">';
        $output .= '<div class="l-center">';
        
        // Output the intro block
        $output .= '<div class="nav__intro">';
        $output .= '<p>' . esc_html( $intro_text ) . '</p>';
        $output .= '<a class="nav-link" href="' . esc_url( $intro_link_url ) . '">' . esc_html( $intro_link_text ) . '</a>';
        $output .= '</div>';
        
        // Output the actual submenu <ul>
        $output .= '<ul class="clean-list" role="list">';
    }

    // 3. Modify the ending HTML for submenus (closing the <ul> and wrappers)
    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
        $output .= '</div>'; // close .l-center
        $output .= '</div>'; // close [data-nav="submenu"]
    }
}