<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vashishta
 */

get_header();

?>
<section class="retreats">
    <div class="sm-wrapper">
        <h2>Page not found (404)</h2>
        <p>Subscribe to newsletter to be the first to know about our latest news.</p>

        <a href="/" class="btn">
            <span>Back Home</span>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon_button-arrow.svg" alt="">
        </a>
    </div>
</section>
<?php

get_footer(); ?>