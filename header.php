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
    <title>Vasishta</title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="pg-wrapper">

    <header>
        <div class="wrapper">
            <div class="logo">
                <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/svg/vasishta_logotype.svg" alt=""></a>
            </div>
            <div class="menu-btn"></div>
        </div>
        <div class="menu">
            <div class="wrapper">
                <a href="/" class="logo-small max"><img  src="<?php echo get_template_directory_uri(); ?>/assets/svg/vasishta_logo_symbol_m.svg" alt=""></a>
                <a href="/" class="logo-small mini"><img  src="<?php echo get_template_directory_uri(); ?>/assets/svg/vasishta_logo_symbol.svg" alt=""></a>
                
                <div class="content">
                    <ul class="list">
                        <li><a href="./about.html">About Foundation</a></li>
                        <li><a href="./saji.html">Saji</a></li>
                        <li><a href="./yoga.html">Traditional Yoga</a></li>
                        <li class="toggle-item">
                            <a href="javascript:void(0);">Courses</a>
                            <ul class="sub-list">
                                <a href="/courses200.html"><li>TYTT 200h</li></a>
                                <a href="/courses300.html"><li>YTT 300h</li></a>
                                <a href="/coursesYoga.html"><li>Yoga therapy</li></a>
                            </ul>
                        </li>
                        <li class="active"><a href="./retreats.html">Retreats</a></li>
                        <li><a href="./calendar.html">Calendar</a></li>
                        <li class="toggle-item">
                            <a href="javascript:void(0);">Gallery</a>
                            <ul class="sub-list">
                                <a href="video.html"><li>Video</li></a>
                                <a href="photos.html"><li>Photos</li></a>
                            </ul>
                        </li>
                        <li><a href="./testimonials.html">Testimonials</a></li>
                        <li><a href="./teachers.html">Yoga teachers</a></li>
                        <li><a href="./contacts.html">Contact</a></li>
                    </ul>
                    <div class="follow-us">
                        <span>Follow us</span>
                        <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon_facebook.svg" alt=""></a>
                    </div>
				</div>
				<div class="menu-btn"></div>
            </div>
        </div>
    </header>
