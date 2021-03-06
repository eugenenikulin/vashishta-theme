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
					<div class="item" style="background-image: url('<?php echo $image['image'];  ?>')">
                    	<img src="https://via.placeholder.com/3840x1860" alt="">
					</div>
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
                    <?php $teachers = get_field('teachers','category_'.$term_id); ?>
                    <?php if (!empty($teachers)) : ?>
                    <div class="teachers-list">
                        <h3>Teachers</h3>
                            <?php foreach ($teachers as $teacher) { ?>
                                <div class="block">
                                    <?php $img = $teacher['photo'];  ?>
                                    <?php if ($img) { ?>
                                        <img src="<?php echo $img['sizes']['testimony-photo']; ?>" alt="">
                                    <?php } else { ?>
                                        <img src="https://via.placeholder.com/80x80" alt="">
                                    <?php } ?>
                                    <div class="text">
                                        <h4><?php echo $teacher['name']; ?></h4>
                                        <div class="data"><?php echo $teacher['position'] ?></div>
                                        <p><?php echo $teacher['content']; ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                    </div>
                    <?php endif; ?>
                    <!-- Custom blocks -->
                    <?php $customBlocks = get_field('custom_blocks','category_'.$term_id); ?>
                    <?php  if (!empty($customBlocks)) { ?>
                        <?php foreach ($customBlocks as $cb) {  ?>
                        <div class="item">
                            <h3><?php echo $cb['title']; ?></h3>
                                 <?php echo $cb['content']; ?>
                        </div>
                        <?php } ?>
                    <?php } ?>
                    <!-- #Custom blocks -->
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
                    <?php $cBlocks = get_field('custom_blocks'); ?>
                    <?php if ($cBlocks && !empty($cBlocks)) { ?>
                        <?php foreach ($cBlocks as $block) { ?>
                            <div class="item">
                                <h3><?php echo $block['heading']; ?></h3>
                                <p><?php echo $block['text']; ?></p>
                            </div>
                        <?php } ?>
                    <?php } ?>
                	<?php endif; ?>
                    <p class="under-text">The organisation and payment of flights to India is the responsibility of the student.</p>

                </div>
            </div>
            <div class="how-to-apply">
                <h3>How to Apply</h3>
                <p>If you are interested in applying for this course please write to <a href="mailto:vasiyoga@gmail.com">vasiyoga@gmail.com</a>.</p>
            </div>
            <?php 
            if (get_field('video_link','category_'.$term_id)) {
            	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', get_field('video_link','option'), $match);
                $youtube_id = $match[1]; ?>
                <div class="youtube-player" data-id="<?php echo $youtube_id; ?>"></div>
            <?php } ?>
        </div>
    </section>
<?php
get_footer();
