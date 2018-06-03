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
                <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/images_main_page/image_slider_01.jpg" alt=""></div>
                <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/images_main_page/image_slider_02.jpg" alt=""></div>
                <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/images_main_page/image_slider_03.jpg" alt=""></div>
                <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/images_main_page/image_slider_04.jpg" alt=""></div>
                <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/images_main_page/image_slider_05.jpg" alt=""></div>
                <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/images_main_page/image_slider_06.jpg" alt=""></div>
                <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/images_main_page/image_slider_07.jpg" alt=""></div>
                <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/images_main_page/image_slider_08.jpg" alt=""></div>
                <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/images_main_page/image_slider_09.jpg" alt=""></div>
                <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/images_main_page/image_slider_10.jpg" alt=""></div>
            </div>
       </div>
    </section>

    <section class="info">
        <div class="sm-wrapper">
            <h2>Lorem ipsum</h2>

            <div class="text">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.</p>
                <br>
                <p>Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>
            </div>

            <a href="" class="btn">
                <span>read more</span>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon_button-arrow.svg" alt="">
            </a>
        </div>
    </section>

    <section class="courses-list">
        <div class="sm-wrapper">
            <h2>Courses</h2>

            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor:</p>

            <div class="list">
                <a href="" class="item">
                    <div class="img-wr">
                        <img class="placeholder" src="http://via.placeholder.com/600x352" alt="">
                        <img class="card-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/images_main_page/image_hp_courses_01.jpg" alt="">
                    </div>
                    <div class="text">
                        <h3>Yoga Teacher Training<br>Course 200h</h3>
                        <p>Course presents a systematic approach to classical Hatha Yoga practices</p>
                        <div class="date">5th Dec 2018 - 1st Jan 2019</div>
                    </div>
                </a>
                <a href="" class="item">
                    <div class="img-wr">
                        <img class="placeholder" src="http://via.placeholder.com/600x352" alt="">
                        <img class="card-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/images_main_page/image_hp_courses_02.jpg" alt="">
                    </div>
                    <div class="text">
                        <h3>Yoga Teacher Training<br>Course 300h</h3>
                        <p>Course aims to emphasise a deeper understanding of classical Hatha Yoga</p>
                        <div class="date">11th Feb 2018 - 10th Mar 2019</div>
                    </div>
                </a>
                <a href="" class="item">
                    <div class="img-wr">
                        <img class="placeholder" src="http://via.placeholder.com/600x352" alt="">
                        <img class="card-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/images_main_page/image_hp_courses_03.jpg" alt="">
                    </div>
                    <div class="text">
                        <h3>Yoga Therapy Course</h3>
                        <p>Course offers a basic understanding and integration of Yoga Therapy</p>
                        <div class="date">11th Feb 2018 - 10th Mar 2019</div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="info">
        <div class="sm-wrapper">

            <h2>Aenean commodo ligula eget dolor</h2>

            <div class="text">
                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
            </div>

            <div class="youtube-player" data-id="enAAD-7Fs8g"></div>
        </div>
    </section>
<div class="go-top-btn">
    <img class="svg" src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon_arrow_up.svg" alt="">
</div>

<div class="subscription-popup">
    <div class="fl-wr">
        <img class="exit" src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon_close.svg" alt=''>
        <h2>Thank you for subscribing</h2>
        <p>From now, we’ll keep you updated on our latest news!</p>
    </div>
</div>
<?php
get_sidebar();
get_footer();
