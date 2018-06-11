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
$ppp = 5;
if (!$_GET['pagination']) {
	$curPage = 1;
} else {
	$curPage = intval($_GET['pagination']);	
}
$offset = ($curPage-1)*$ppp;
$testimonials = new WP_Query(
	array(
		'post_type' => 'testimony',
		'orderby' => 'meta_value',
		'order' => 'DESC',
		'meta_key' => 'date',
		'posts_per_page' => $ppp,
		'offset' => $offset,
	)
);

$post_count = $testimonials->max_num_pages * $ppp;
   			 ?>
<section class="testimonials">
    <div class="sm-wrapper">
        <div>
<?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>

	<div class="block">
		<?php $photo = get_field('photo');
		if ($photo) {
			$photodisplay = $photo['sizes']['testimony-photo'];
		} else {
			$photodisplay = 'http://via.placeholder.com/120x120';
		}

		 ?>
        <img src="<?php echo $photodisplay; ?>" alt="">
        <div class="text">
            <h4><?php the_field('name'); ?></h4>
            <div class="data"><?php echo date('F j, Y', strtotime(get_field('date'))); ?></div>
            <p><?php the_field('testimony'); ?></p>
            <div class="show-more">Show more</div>
        </div>
    </div>

<?php endwhile; ?>
		</div>
		<?php if ($post_count <= $ppp) {} else {?>
			<div class="pagination">
				<?php echo theme_pagination($curPage, $post_count, $ppp, 1, get_page_link(53), "?pagination="); ?>
	        </div>
		<?php } ?>
		

        <p class="want-to-leave-comment">If you want to leave comment please write to <a href="mailto:vasiyoga@gmail.com">vasiyoga@gmail.com</a>.</p>
    </div>
</section>
            
        
<?php

get_footer();
