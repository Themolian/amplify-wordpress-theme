<?php
function my_custom_image_component( $args = array() ) {
    // Define default values
    $defaults = array(
        'src'     => '',
        'width'   => '',
        'height'  => '',
        'alt'     => '',
        'caption' => '',
    );
    
    // Merge user arguments with defaults
    $args = wp_parse_args( $args, $defaults );
    
    // Bail if no image source is provided
    if ( empty( $args['src'] ) ) {
        return '';
    }
    
    // Build the markup
    $output  = '<figure class="component component--image">';
    $output .= '<div class="l-frame">';
    
    // Build the img tag securely
    $output .= sprintf(
        '<img src="%s" width="%s" height="%s" loading="lazy" alt="%s">',
        esc_url( $args['src'] ),
        esc_attr( $args['width'] ),
        esc_attr( $args['height'] ),
        esc_attr( $args['alt'] )
    );
    
    $output .= '</div>';
    
    // Add figcaption if a caption exists
    if ( ! empty( $args['caption'] ) ) {
        // wp_kses_post allows basic HTML like <code> or <a> inside the caption
        $output .= '<figcaption><p>' . wp_kses_post( $args['caption'] ) . '</p></figcaption>';
    }
    
    $output .= '</figure>';
    
    return $output;
}

/**
 * Usage:
 * 
 * echo my_custom_image_component( array(
    'src'     => get_template_directory_uri() . '/dist/images/jpg-cat-1.jpg',
    'width'   => '640',
    'height'  => '491',
    'alt'     => 'A description of the cat',
    'caption' => 'The figcaption is not a replacement for the image\'s <code>alt</code> attribute. It should be used for providing relevant supporting content.',
) );
 */