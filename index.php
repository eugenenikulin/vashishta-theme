<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vashishta
 */

get_header();
?>
<section class="slider main-page-slider">
        <div class="wrapper">
            <div class="owl-carousel owl-theme">
                <?php $gallery = get_field('images', 'option');  ?>
                <?php foreach ($gallery as $image) { ?>
                    <div class="item"><img src="<?php echo $image['image']; ?>" alt=""></div>
                <?php } ?>
            </div>
       </div>
    </section>

    <section class="info">
        <div class="sm-wrapper">
            <h2><?php the_field('home_heading', 'option'); ?></h2>

            <div class="text">
                <?php the_field('home_text', 'option'); ?>
            </div>

            <a href="<?php the_field('read_more_link', 'option'); ?>" class="btn">
                <span><?php the_field('read_more_text', 'option'); ?></span>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon_button-arrow.svg" alt="">
            </a>
        </div>
    </section>

    <section class="courses-list">
        <div class="sm-wrapper">
            <?php $courses = get_field('select_courses','option'); //var_dump($courses); ?>
            <h2><?php the_field('courses_heading','option'); ?></h2>

            <p><?php the_field('courses_description','option') ?></p>

            <div class="list">
                <?php foreach ($courses as $course) {
                    //var_dump($course['course']);
                    the_post($course['course']->ID);
                    $image = get_field('course_thumb');
                    $courseTerm = get_the_category(); $courseTerm = $courseTerm[0];
                    $title = get_field('course_title');
                    if (!$title || $title == '')  {
                        $title = $courseTerm->name;
                    }
                    $startDate = get_field('date_start'); $startDate = date('d M Y', strtotime($startDate));
                    $endDate = get_field('date_end'); $endDate = date('d M Y', strtotime($endDate));
                     ?>
                    <a href="<?php echo get_category_link($courseTerm->term_id); ?>" class="item">
                        <div class="img-wr">
                            <img class="placeholder" src="https://via.placeholder.com/600x352" alt="">
                            <img class="card-img" src="<?php echo $image['sizes']['home-course']; ?>" alt="">
                        </div>
                        <div class="text">
                            <h3><?php echo $title; ?></h3>
                            <p><?php echo get_field('course_description') ? get_field('course_description') : '';  ?></p>
                            <div class="date"><?php echo $startDate; ?> - <?php echo $endDate; ?></div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php if (get_field('display_video_block', 'option') == true) : ?>
    <section class="info">
        <div class="sm-wrapper">

            <h2><?php $video_block_heading = get_field('video_block_heading','option'); echo $video_block_heading ? $video_block_heading : ''; ?></h2>

            <div class="text">
                <p><?php $video_block_text = get_field('video_block_text','option'); echo $video_block_text ? $video_block_text : ''; ?></p>
            </div>
            <?php preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', get_field('video_link','option'), $match);
                $youtube_id = $match[1]; ?>
            <div class="youtube-player" data-id="<?php echo $youtube_id; ?>"></div>
        </div>
    </section>
    <?php endif; ?>

<?php
get_footer();
