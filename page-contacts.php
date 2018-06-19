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
<section class="contacts">
        <div class="sm-wrapper">

            <h2><?php the_field('title'); ?></h2>

            <div class="contact-info">
                <h4>Regd Trust No : <?php the_field('regd_trust_no'); ?></h4>

                <div class="fl-wr">
                    <div class="address">
                        <?php the_field('adresse'); ?>
                    </div>
                    <div class="contact-list">
                        <p><span>E-mail:</span><a class="email" href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
                        <p><span>Mob:</span><a href="tel:<?php echo str_replace(')','', str_replace('(','',str_replace(' ','', get_field('mobile')))); ?>"><?php the_field('mobile'); ?></a></p>
                        <p><span>Res:</span><a href="tel:<?php echo str_replace(')','', str_replace('(','',str_replace(' ','', get_field('res')))); ?>"><?php the_field('res'); ?></a></p>
                    </div>
                </div>
            </div>

            <div class="how-to-reach">

                <h4><?php the_field('hot_to_reach_us_h'); ?></h4>

                <table>
                    <?php $htwu = get_field('hot_to_reach_us'); ?>
                    <?php foreach ($htwu as $how) { ?>
                        <tr>
                        <?php if ($how['type']) { ?>
                            <td><b><?php echo $how['type']; ?></b></td>
                        <?php } ?>
                        <?php if ($how['description']) { ?>
                            <td><p><?php echo $how['description']; ?></p></td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                    <?php if (get_field('lat') && get_field('lng') ) : ?>
                    <tr>
                        <td><b></b></td>
                        <td>
                            <div class="map-wr">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/placeholder.png" alt="">
                                <div id="map"></div>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </table>

            </div>

        </div>
    </section>
    <?php

get_footer();