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
function video($ylink) {
 preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $ylink, $match);
      $youtube_id = $match[1];
return $youtube_id;
}
 $videos = get_field('video_galleries', $post->ID);
?>
<div id="videoPopUp">
    <div class="frame-wr">
        <img class="placeholder" src="https://via.placeholder.com/1280x720" alt="">
        <img class='exit' src='<?php echo get_template_directory_uri(); ?>/assets/svg/icon_close.svg' alt=''>
    </div>
</div>

<section class="video-list">
    <div class="sm-wrapper">
        <?php foreach ($videos as $video) { ?>
        <div>
            <h2><?php echo $video['gallery_title']; ?></h2>
            <div class="fl-wr">
                <?php foreach ($video['videos'] as $v) { ?>
                <div class="block">
                    <div class="youtube-player sm in-pop-up" data-id="<?php echo video($v['youtube_link']); ?>"></div>
                    <p><?php echo $v['description']; ?></p>
                </div>
                <?php } ?>
                
            </div>
        </div>
        <?php } ?>
        
    </div>
</section>
            
        
<?php

get_footer();