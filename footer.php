<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package amplify-starter
 */
$client_name = '';
?>
    <?php get_template_part('template-parts/components/footer-banner'); ?>
	<footer id="colophon" class="site-footer">
        <div class="footer-inner">
            <div class="footer-left">
                <a href="/" class="footer-logo">
                    <img src="<?php echo get_template_directory_uri() ?>/dist/svg/logo-white.svg" alt="">
                </a>
            </div>
            <div class="footer-credit">
				<p>&copy; <?php echo $client_name; ?> <?php echo date('Y'); ?></p>
                <p>Designed and Developed by <a href="https://www.vestal.digital" class="vestal-link" target="_blank">Vestal Digital</a></p>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


	<script defer>
        let myFont = new FontFaceObserver('Jost');

        Promise.all([myFont.load()]).then(function () {
            document.documentElement.className += " fonts-loaded";
        });

        (function() {
            let linkEl = document.getElementById('amplify-starter-advanced-style-css');
            if (window.matchMedia && window.matchMedia(linkEl.media).matches) {
                let head = document.querySelector('head');
                // Add main JS
                let jsMain = document.createElement('script');
                jsMain.src = '<?php echo get_template_directory_uri(); ?>/dist/js/main.js';
                jsMain.defer = true;
                head.appendChild(jsMain);
                // Update classname to show JS is available
                (function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement);
            }
        })();
    </script>
    <?php /*
    // AOS Init Script
    <script>
        AOS.init({
            offset: -1000,
            once: true
        });
    </script>
    */
    ?>
</body>
</html>
