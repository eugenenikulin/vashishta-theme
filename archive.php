<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vashishta
 */

get_header();
$term = get_queried_object();
$term_id = $term->term_id;
?>
<section class="slider">
        <div class="sm-wrapper">
            <div class="owl-carousel owl-theme">
            	<?php $images = get_field('images', 'category_'.$term_id);  ?>
            	<?php foreach ($images as $image) { ?>
            		<div class="item"><img src="<?php echo $image['image'];  ?>" alt=""></div>
            	<?php } ?>
            </div>
       </div>
    </section>

    <section class="courses">
        <div class="sm-wrapper">
            <h2><?php echo $term->name; ?></h2>

            <b><?php the_field('short_description','category_'.$term_id); ?></b>

            <div class="main-information">
                <div class="left">
                    <div class="item">
                        <h3><?php the_field('course_content_heading','category_'.$term_id); ?></h3>

                        <?php the_field('course_content_text','category_'.$term_id); ?>
                    </div>
                    <div class="item">
                        <h3><?php the_field('certification_heading','category_'.$term_id); ?></h3>

                         <?php the_field('certification_text','category_'.$term_id); ?>
                    </div>
                    <div class="item">
                        <h3> <?php the_field('curriculum_heaing','category_'.$term_id); ?></h3>

                         <?php the_field('curriculum_text','category_'.$term_id); ?>
                    </div>
                </div>
                <div class="right">
                	<?php $connected = get_field('connected_cours','category_'.$term_id); ?>
                	<?php if ($connected) : the_post($connected->ID); ?>
                    <div class="item">
                        <h3><?php the_field('course_dates_heading'); ?></h3>
                      <?php 
                    $startDate = get_field('date_start'); 
                    $endDate = get_field('date_end');
                    $startYear = date('Y', strtotime($startDate));
                    $endYear = date('Y', strtotime($endDate));
                    $startDate = date('jS F', strtotime($startDate));
                    if ($startYear != $endYear) {
                    	$startDate = date('jS F, Y', strtotime($startDate));
                    }
                    $endDate = date('jS F, Y', strtotime($endDate)); ?>
                        <p><?php echo $startDate; ?> to <?php echo $endDate; ?></p>
                    </div>
                    <?php $location = get_field('course_location'); ?>
                    <?php if ($location && $location != '') { ?>
                    	<div class="item">
	                        <h3><?php the_field('course_location_heading'); ?></h3>
	                        <p><?php echo $location; ?></p>
	                    </div>
                    <?php } ?>
                    <?php $fee = get_field('course_fee'); ?>
                    <?php if ($fee && $fee != '') { ?>
                    	<div class="item">
	                        <h3><?php the_field('course_fee_heading'); ?></h3>
	                        <p><?php echo $fee; ?></p>
	                    </div>
                    <?php } ?>
                    <?php $shedule = get_field('course_shedule'); //var_dump($schedule); ?>
                    <?php if ($shedule && !empty($shedule)) { ?>
                    	<div class="item schedule">
                    		<h3><?php the_field('course_shedule_heading'); ?></h3>
                    		<?php foreach ($shedule as $time) { ?>
                    			<div class="time-period">
                    				<?php if ($time['time_end']) { ?>
                    					<p class="time"><?php echo $time['time_start']; ?> - <?php echo $time['time_end']; ?></p>
                    				<?php } else { ?>
                    					<p class="time"><?php echo $time['time_start']; ?></p>
                    				<?php } ?>
		                            
		                            <p><?php echo $time['description']; ?></p>
		                        </div>
                    		<?php } ?>
                    	</div>
                    <?php } ?>
                	<?php endif; ?>
                    <p class="under-text">The organisation and payment of flights to India is the responsibility of the student.</p>

                </div>
            </div>
            <div class="teachers-list">
                <h3>Teachers</h3>
                <div class="fl-wr">
                	<?php $teachers = get_field('teachers','category_'.$term_id); ?>
                	<?php foreach ($teachers as $teacher) {  $teacher = $teacher['teacher'];  ?>
                		<div class="item">
                			<?php $img = get_field('photo',$teacher->ID);  ?>
                			<?php if ($img) { ?>
                				<img src="<?php echo $img['sizes']['teacher-photo']; ?>" alt="">
                			<?php } else { ?>
                				<img src="http://via.placeholder.com/80x80" alt="">
                			<?php } ?>
	                        <div>
	                            <h4><?php echo $teacher->post_title; ?></h4>
	                            <p><?php echo get_field('position',$teacher->ID); ?></p>
	                        </div>
	                    </div>
                	<?php } ?>
                </div>
            </div>

            <div class="how-to-apply">
                <h3>How to Apply</h3>
                <p>If you are interested in applying for this course please write to <a href="mailto:vasiyoga@gmail.com">vasiyoga@gmail.com</a>.</p>
            </div>
            <?php 
            if (get_field('video_link','option')) {
            	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', get_field('video_link','option'), $match);
                $youtube_id = $match[1]; ?>
                <div class="youtube-player" data-id="<?php echo $youtube_id; ?>"></div>
            <?php } ?>
        </div>
    </section>
<?php
get_footer();
