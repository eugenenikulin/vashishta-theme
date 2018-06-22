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
$teachers = new WP_Query(
	array(
		'post_type' => 'teacher',
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'posts_per_page' => '-1',
  	)
);
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
        	<?php if (get_field('website')) : 
                $parsed = parse_url(get_field('website'));
                if (empty($parsed['scheme'])) {
                    $urlStr = 'http://' . ltrim(get_field('website'), '/');
                }  else {
                    $urlStr = get_field('website');
                }
                ?>
            <div>
                <div class="img-wr"><img src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon_web.svg" alt=""></div>
                <a href="<?php echo $urlStr; ?>" target="_blank"><?php the_field('website'); ?></a>
            </div>
        	<?php endif; ?>
        </div>
        <p><?php the_field('biography'); ?></p>
    </div>

<?php endwhile; ?>
		
		
    </div>
</section>
            
        
<?php

get_footer();
