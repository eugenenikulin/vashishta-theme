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

$calendar = new WP_Query(
array( 'posts_per_page' => '-1', 'order' => 'DESC', 'orderby' => 'date' )
); ?>
<div id="eventsList" style="display: none;">
<?php while ($calendar->have_posts()) { $calendar->the_post();
$courseTerm = get_the_category(); $courseTerm = $courseTerm[0];
$title = get_field('course_heading_popup');
if (!$title || $title == '')  {
    $title = $courseTerm->name;
}
$startDate = get_field('date_start'); 
$endDate = get_field('date_end');
$startYear = date('Y', strtotime($startDate));
$endYear = date('Y', strtotime($endDate));
$startDate = date('jS F', strtotime($startDate));
if ($startYear != $endYear) {
    $startDate = date('jS F, Y', strtotime($startDate));
}
$endDate = date('jS F, Y', strtotime($endDate));
 ?>
    <div class="event">
            <div data-type="startDate"><?php echo date('d/m/Y', strtotime(get_field('date_start'))); ?></div>
            <div data-type="endDate"><?php echo date('d/m/Y', strtotime(get_field('date_end'))); ?></div>
            <div data-type="courseTitle"><?php echo $title; ?></div>
            <div data-type="description"><?php the_field('course_text_popup'); ?></div>
            <div data-type="location"><?php the_field('course_location'); ?></div>
            <div data-type="coursesDate"><?php echo $startDate; ?> to <?php echo $endDate; ?></div>
            <div data-type="courseLink"><?php echo get_category_link($courseTerm->term_id); ?></div>
        </div>
<?php } ?>
 </div>   

    <div class="event-popup">
        <div class="table-cell">
            <div class="wrap">
                <img class='exit' src='<?php echo get_template_directory_uri(); ?>/assets/svg/icon_close.svg' alt=''>
                <h2>{courseTitle}</h2>
                <p>{description}</p>
                <div class="fl-wr">
                    <div>
                        <h3>Course Dates</h3>
                        <div class="date">{coursesDate}</div>
                    </div>
                    <div>
                        <h3>Course Location</h3>
                        <div class="date">{location}</div>
                    </div>
                </div>
                <a href="{courseLink}" class="btn">
                    <span>read more</span>
                    <img src="<?php echo get_template_directory_uri(); ?>assets/svg/icon_button-arrow.svg" alt="">
                </a>
            </div>
        </div>
    </div>

    <section class="calendar">
        <div class="sm-wrapper">
            <div id='calendar'></div>
        </div>
    </section>
<?php

get_footer();