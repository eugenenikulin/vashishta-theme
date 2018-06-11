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
if (have_posts()) : the_post();
?>
<section class="slider">
    <div class="sm-wrapper">
        <div class="owl-carousel owl-theme">
        	<?php $images = get_field('images');
        	foreach ($images as $image) { ?>
        	<div class="item"><img src="<?php echo $image['image']; ?>" alt=""></div>
        	<?php } ?>
        </div>
   </div>
</section>

<section class="info">
    <div class="sm-wrapper">
        <h2><?php the_title(); ?></h2>

        <div class="text">
            <p><b><?php the_field('bold_text'); ?></b></p>
            <br>
            <?php the_content(); ?>
        </div>
    </div>
</section>
<?php
else :
get_template_part('404');
endif;
get_footer();
