<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Vashishta
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#FFF">

    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/favicon.ico" />
    <!-- <title>Vasishta</title> -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="pg-wrapper">

	<div class="preloader">
	</div>

    <header>
        <div class="wrapper">
            <div class="logo">
                <a href="/"><img src="<?php the_field('logotype','option'); ?>" alt=""></a>
            </div>
            <div class="menu-btn"></div>
        </div>
        <div class="menu">
            <div class="wrapper">
                <a href="/" class="logo-small max"><img  src="<?php the_field('logotype_small','option'); ?>" alt=""></a>
                <a href="/" class="logo-small mini"><img  src="<?php the_field('logotype_mini','option'); ?>" alt=""></a>
                
                <div class="content">
                    <?php wp_nav_menu(
                    array(
                        'theme_location'  => 'Primary',
                        'menu'            => 'primary',
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => '',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul class="list">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => ''
                        )
                    ); ?>
                    <div class="follow-us">
                        <span>Follow us</span>
                        <a href="<?php the_field('facebook_link', 'option'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon_facebook.svg" alt=""></a>
                    </div>
				</div>
				<div class="menu-btn"></div>
            </div>
        </div>
    </header>
