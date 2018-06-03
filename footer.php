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

</div>
<footer>
    <div class="sm-wrapper">
        <a href="" class="logo">Vasishta Yoga</a>
        <div class="fl-wr">
            <div class="left">
                <div class="address-info">
                    <div class="address">
                        <p>H.No: 36/182, Amritha Jyothi, Vengeri.</p>
                        <p>P.O Calicut - 673010</p>
                        <p>Kerala, South India</p>
                    </div>
                    <div class="email mt-28">
                        <img class="svg" src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon_mail.svg" alt="">
                        <a href="mailto:vasiyoga@gmail.com">vasiyoga@gmail.com</a>
                    </div>
                </div>
                <div class="subscribe">
                    <p>Subscribe to our newsletter to stay tuned about our courses and receive the latest news:</p>
                    <form class="mt-28" action="">
                        <input type="text" name="email" placeholder="Enter your email">
                        <button>subscribe</button>
                    </form>
                </div>
            </div>
            <div class="right">
                <p>International Yoga Federation is the largest yoga organization in the world. We are affiliated with IYF and our yoga course certificates are internationally valued.</p>
                <div class="copyrights mt-28">© 2018 International Vasishta Yoga Research Foundation.<br>All Rights Reserved</div>
            </div>
        </div>
    </div>
</footer>

<script>

    function initMap() {
        var myLatLng = {lat: -25.363, lng: 131.044};

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
<?php wp_footer(); ?>
</body>

</html>
</html>
