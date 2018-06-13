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

get_header(); ?>
<section class="photos-list">
  <div class="sm-wrapper">
    <?php $gallery = get_field('galleries',$post->ID); ?>
    <?php foreach ($gallery as $key => $gal) { ?>
    <div>  
      <h2>Saji portraits</h2>
      <div class="fl-wr">
        <?php foreach ($gal['gallery_photos'] as $k => $photo) { ?>
          <a href="<?php echo $photo['photo']['sizes']['large']; ?>"
             style="background-image: url('<?php echo $photo['photo']['sizes']['gallery-thumb']; ?>')"
             data-toggle="lightbox"
             data-gallery="g<?php echo $key; ?>"
             data-text="<?php echo $photo['text']; ?>">
              <img src="https://via.placeholder.com/200x200" alt="">
          </a>
        <?php } ?>
      </div>
    </div>
    <?php } ?>
    
        

   
  </div>
</section>
            
        
<?php

get_footer();