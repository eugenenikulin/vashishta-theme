<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Vashishta
 */

?>
    <div class="subscription-popup">
        <div class="fl-wr">
            <img class="exit" src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon_close.svg" alt=''>
            <h2>Thank you for subscribing</h2>
            <p>From now, we’ll keep you updated on our latest news!</p>
        </div>
    </div>
    <div class="go-top-btn">
        <img class="svg" src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon_arrow_up.svg" alt="">
    </div>
</div>
<footer>
    <div class="sm-wrapper">
        <a href="" class="logo"><?php the_field('site_title', 'option'); ?></a>
        <div class="fl-wr">
            <div class="left">
                <div class="address-info">
                    <div class="address">
                       <?php the_field('adresse',48); ?>
                    </div>
                    <div class="email mt-28">
                        <img class="svg" src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon_mail.svg" alt="">
                        <a href="mailto:<?php the_field('email',48); ?>"><?php the_field('email',48); ?></a>
                    </div>
                </div>
                <div class="subscribe">
                    <p><?php the_field('subscribe_text','option'); ?></p>
                    <form class="mt-28" action="">
                        <input type="text" name="email" placeholder="Enter your email">
                        <button>subscribe</button>
                    </form>
                </div>
            </div>
            <div class="right">
                <p><?php the_field('footer_right_text', 'option'); ?></p>
                <div class="copyrights mt-28"><?php the_field('copyright', 'option'); ?></div>
            </div>
        </div>
    </div>
</footer>
<?php if (get_field('lat', 48) && get_field('lng', 48) ) : ?>
<script>

    function initMap() {
        var myLatLng = {lat: <?php the_field('lat', 48); ?>, lng: <?php the_field('lng', 48); ?>};

        var map = document.getElementById('map');

        if(map){
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: myLatLng
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Hello World!'
            });
        }
    }

</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoh_jCyYgbdGo06d1Qlt1LPvYMPhVbfD4
&callback=initMap">

</script>
<?php endif; ?>
<script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@14/dist/smooth-scroll.polyfills.min.js"></script>
<?php wp_footer(); ?>
</body>

</html>
</html>
