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
$teachers = new WP_Query(
	array(
		'post_type' => 'teacher',
	)
);

$post_count = $teachers->max_num_pages * $ppp;
   			 ?>
<section class="teachers">
    <div class="sm-wrapper">
       
<?php while ($teachers->have_posts()) : $teachers->the_post(); ?>

	<div class="block">
        <h3><?php the_title(); ?></h3>
        <div class="teacher-information">
        	<?php
        	$city = get_field('city');
        	$country = get_field('country');
        	$readyString = '';
        	if ($city && $city != '') {
        		$readyString .= $city;
			} 
			if ($country && $country != '') {
				if (!$city || $city == '') {
					$readyString .= '<b>'.$country.'</b>';
				} else {
					$readyString .= ', <b>'.$country.'</b>';
				}
			}
			?>
			<?php if ($readyString != '') { ?>
				<div>
	                <div class="img-wr"><img src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon_location.svg" alt=""></div>
	                <span><?php echo $readyString; ?></span>
	            </div>
			<?php } ?>
            
            <?php if (get_field('telephone')) : ?>
            <div>
                <div class="img-wr"><img src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon_phone.svg" alt=""></div>
                <a href="tel:+496170961709"><?php the_field('telephone'); ?></a>
            </div>
        	<?php endif; ?>
        	<?php if (get_field('email')) : ?>
            <div>
                <div class="img-wr"><img src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon_mail_1.svg" alt=""></div>
                <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
            </div>
        	<?php endif; ?>
        	<?php if (get_field('website')) : ?>
            <div>
                <div class="img-wr"><img src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon_web.svg" alt=""></div>
                <a href="<?php the_field('website'); ?>"><?php the_field('website'); ?></a>
            </div>
        	<?php endif; ?>
        </div>
        <p><?php the_field('biography'); ?></p>
    </div>

<?php endwhile; ?>
		
		<?php if ($post_count <= $ppp) {} else {?>
			<div class="pagination">
				<?php echo theme_pagination($curPage, $post_count, $ppp, 1, get_page_link(51), "?pagination="); ?>
	        </div>
		<?php } ?>
		

       <!--  <p class="want-to-leave-comment">If you want to leave comment please write to <a href="mailto:vasiyoga@gmail.com">vasiyoga@gmail.com</a>.</p> -->
    </div>
</section>
            
        
<?php

get_footer();
