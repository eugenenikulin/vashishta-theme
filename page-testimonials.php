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
$testimonials = new WP_Query(
	array(
		'post_type' => 'testimony',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page' => '-1',
	)
); ?>
<section class="testimonials">
    <div class="sm-wrapper">
        <div>
<?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>

	<div class="block">
		<?php $photo = get_field('photo');
		if ($photo) {
			$photodisplay = $photo['sizes']['testimony-photo'];
		} else {
			$photodisplay = 'https://via.placeholder.com/120x120';
		}

		 ?>
        <img src="<?php echo $photodisplay; ?>" alt="">
        <div class="text">
            <h4><?php the_field('name'); ?></h4>
            <p><?php the_field('testimony'); ?></p>
            <div class="show-more">Show more</div>
        </div>
    </div>

<?php endwhile; ?>
		</div>
		

        <p class="want-to-leave-comment">If you want to leave comment please write to <a href="mailto:vasiyoga@gmail.com">vasiyoga@gmail.com</a>.</p>
    </div>
</section>
            
        
<?php

get_footer();
