<?php 
    /**
     * Amplify Functions and Definitions
     * 
     * @link https://developer.wordpress.org/themes/basics/theme-functions/
     * 
     * @package amplify-starter
     */

    if(!defined('THEME_VERSION')) {
        define( 'THEME_VERSION', '1.0.0' );
    }

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */

    function amplify_starter_setup() {
        /*
            * Make theme available for translation.
            * Translations can be filed in the /languages/ directory.
            * If you're building a theme based on amplify-starter, use a find and replace
            * to change 'amplify-starter' to the name of your theme in all the template files.
            */
        load_theme_textdomain( 'amplify-starter', get_template_directory() . '/languages' );

        /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
        add_theme_support( 'title-tag' );

        /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__( 'Primary', 'amplify-starter' ),
            )
        );

        /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'amplify_starter_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );
    }
    add_action( 'after_setup_theme', 'amplify_starter_setup' );

    /**
     * Enqueue scripts and styles.
     */
    function amplify_starter_scripts() {
        $advanced_media = "only print,
        only all and (pointer: fine), only all and (pointer: coarse), only all and (pointer: none),
        only all and (min--moz-device-pixel-ratio:0) and (display-mode:browser), (min--moz-device-pixel-ratio:0) and (display-mode:fullscreen)";
        wp_enqueue_style( 'amplify-starter-core-style', get_template_directory_uri() . '/dist/styles/core.min.css', array(), _S_VERSION, 'screen' );
        wp_enqueue_style( 'amplify-starter-advanced-style', get_template_directory_uri() . '/dist/styles/advanced.min.css', array(), _S_VERSION, $advanced_media );
        wp_enqueue_style( 'amplify-starter-editor-style', get_template_directory_uri() . '/dist/styles/editor.min.css', array(), _S_VERSION );

        wp_enqueue_script( 'amplify-starter-font-observer', get_template_directory_uri() . '/dist/js/libraries/fontfaceobserver.js', array(), _S_VERSION, 'true' );
        // AOS
        // wp_enqueue_script( 'amplify-starter-aos', get_template_directory_uri() . '/js/aos.js', array(), _S_VERSION, 'true' );

        /**
         * Ideally, we load in library code only when relevant blocks are present on the page
         */
        // if(have_rows('blocks')) {
            // while(have_rows('blocks')) {
                // the_row();
                // if(get_row_layout() == 'images') {
                    // Splide
                    // wp_enqueue_script( 'amplify-starter-splide', get_template_directory_uri() . '/dist/js/splide.js', array(), _S_VERSION, 'true' );
                    // Lightbox
                    // wp_enqueue_script( 'amplify-starter-lightbox', get_template_directory_uri() . '/js/lightbox3.min.js', array(), _S_VERSION, 'true' );
                // }
            // }
        // }
    }
    add_action( 'wp_enqueue_scripts', 'amplify_starter_scripts' );

    /**
     * Slugify a string (e.g happy_slug becomes happy-slug)
     */
    function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    /**
     * Custom Nav Walkers
     */
    require_once get_template_directory() . '/inc/nav-walkers.php';

    /**
     * Breadcrumbs
     */
    require_once get_template_directory() . '/inc/breadcrumbs.php';

    /**
     * Enhanced Image Output
     */
    require_once get_template_directory() . '/inc/custom-elements/image.php';

    /**
     * Enhanced Pagination Output
     */
    require_once get_template_directory() . '/inc/pagination.php';
?>