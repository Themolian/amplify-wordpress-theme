<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package amplify-starter
 */

?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>
<body>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a href="#amplify-main" class="skip-link">Skip to content</a>
    <header class="header">
        <div class="header-inner">
            <div class="header-logo">
                <a href="<?php echo get_site_url(); ?>">
                    <?php 
                        // Get the Site Identity logo by default
                        echo get_custom_logo(); 
                    ?>
                    <span class="visuallyhidden">Back to home</span>
                </a>
            </div>
            
        </div>
    </header>
</body>
</html>