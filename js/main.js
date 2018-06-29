
function getInternetExplorerVersion()
{
    var rv = -1;
    if (navigator.appName == 'Microsoft Internet Explorer')
    {
        var ua = navigator.userAgent;
        var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
        if (re.exec(ua) != null)
            rv = parseFloat( RegExp.$1 );
    }
    else if (navigator.appName == 'Netscape')
    {
        var ua = navigator.userAgent;
        var re  = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");
        if (re.exec(ua) != null)
            rv = parseFloat( RegExp.$1 );
    }
    return rv;
}

$(document).ready(function() {

    // check if ie 11
    if((getInternetExplorerVersion() <= 11 && getInternetExplorerVersion() > 0) || navigator.userAgent.indexOf("Edge") !== -1){
        $(".courses-list .list .item").addClass("ie")
    }

    // img to inline svg
    $(function() {
        jQuery('img.svg').each(function() {
            var $img = jQuery(this);
            var imgID = $img.attr('id');
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('src');

            jQuery.get(imgURL, function(data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find('svg');

                // Add replaced image's ID to the new SVG
                if (typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                // Add replaced image's classes to the new SVG
                if (typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass + ' replaced-svg');
                }

                // Remove any invalid XML tags as per http://validator.w3.org
                $svg = $svg.removeAttr('xmlns:a');

                // Check if the viewport is set, else we gonna set it if we can.
                if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                    $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
                }

                // Replace image with new SVG
                $img.replaceWith($svg);

            }, 'xml');

        });
	});
	
	// Preloader
    var $preloader = $(".preloader");

    setTimeout(function () {
    	$preloader.addClass("hide");
    }, 400);

	// No transition on resize/reflow
	$(window).resize(function(){
		var $content = $('header .content');
		var $sub_list = $('header .list .sub-menu');
		$content.addClass('notransition');
		$sub_list.addClass('notransition');
		// setTimeout(function () {
			$content[0].offsetHeight;
			$sub_list[0].offsetHeight;
			$content.removeClass('notransition');
			$sub_list.removeClass('notransition');
		// }, 1);
	});
	

    $.scrollLock = ( function scrollLockClosure() {
        'use strict';

        var $html      = $( 'html' ),
            // State: unlocked by default
            locked     = false,
            // State: scroll to revert to
            prevScroll = {
                scrollLeft : $( window ).scrollLeft(),
                scrollTop  : $( window ).scrollTop()
            },
            // State: styles to revert to
            prevStyles = {},
            lockStyles = {
                'overflow-y' : 'scroll',
                'position'   : 'fixed',
                'width'      : '100%'
            };

        // Instantiate cache in case someone tries to unlock before locking
        saveStyles();

        // Save context's inline styles in cache
        function saveStyles() {
            var styleAttr = $html.attr( 'style' ),
                styleStrs = [],
                styleHash = {};

            if( !styleAttr ){
                return;
            }

            styleStrs = styleAttr.split( /;\s/ );

            $.each( styleStrs, function serializeStyleProp( styleString ){
                if( !styleString ) {
                    return;
                }

                var keyValue = styleString.split( /\s:\s/ );

                if( keyValue.length < 2 ) {
                    return;
                }

                styleHash[ keyValue[ 0 ] ] = keyValue[ 1 ];
            } );

            $.extend( prevStyles, styleHash );
        }

        function lock() {
            var appliedLock = {};

            // Duplicate execution will break DOM statefulness
            if( locked ) {
                return;
            }

            // Save scroll state...
            prevScroll = {
                scrollLeft : $( window ).scrollLeft(),
                scrollTop  : $( window ).scrollTop()
            };

            // ...and styles
            saveStyles();

            // Compose our applied CSS
            $.extend( appliedLock, lockStyles, {
                // And apply scroll state as styles
                'left' : - prevScroll.scrollLeft + 'px',
                'top'  : - prevScroll.scrollTop  + 'px'
            } );

            // Then lock styles...
            $html.css( appliedLock );

            // ...and scroll state
            $( window )
                .scrollLeft( 0 )
                .scrollTop( 0 );

            locked = true;
        }

        function unlock() {
            // Duplicate execution will break DOM statefulness
            if( !locked ) {
                return;
            }

            // Revert styles
            $html.attr( 'style', $( '<x>' ).css( prevStyles ).attr( 'style' ) || '' );

            // Revert scroll values
            $( window )
                .scrollLeft( prevScroll.scrollLeft )
                .scrollTop(  prevScroll.scrollTop );

            locked = false;
        }

        return function scrollLock( on ) {
            // If an argument is passed, lock or unlock depending on truthiness
            if( arguments.length ) {
                if( on ) {
                    lock();
                }
                else {
                    unlock();
                }
            }
            // Otherwise, toggle
            else {
                if( locked ){
                    unlock();
                }
                else {
                    lock();
                }
            }
        };
    }() );

    var screenLocker = (function () {
        var isLocked = false;
        var lock = function () {
            $.scrollLock(true);
            isLocked = true;
        };
        var unlock = function () {
            $.scrollLock(false);
            isLocked = false;
        };
        var toggle = function () {
            $.scrollLock();
            isLocked = !isLocked;
        };
        var getLockedStatus = function () {
            return isLocked;
        };

        return {
            lock: lock,
            unlock: unlock,
            toggle: toggle,
            getLockedStatus: getLockedStatus
        }
    })();

    var footer = ((function(){
        var $pgWrapper = $(".pg-wrapper"),
            $footer = $("footer"),
            $window = $(window),
            $subscriptionPopUp = $(".subscription-popup"),
            $exitPopUp = $subscriptionPopUp.find(".exit"),
            $subscriptionForm = $footer.find("form")
        var calcHeight = function () {
            var marginTop = 100;
            if($window.width() <= 1320){
                marginTop = 60;
            }
            if($window.width() <= 768){
                marginTop = 40;
            }
            $pgWrapper.css({
                "min-height": "calc(100% - " + ($footer.outerHeight() + marginTop) + "px)"
            })
        };
        calcHeight();
        $(window).resize(calcHeight);

        // subscription

        $exitPopUp.click(function () {
            $subscriptionPopUp.removeClass("visible");
        });

        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        $subscriptionForm.submit(function (e) {
            var email = $subscriptionForm.find("[name=email]").val();
            e.preventDefault();
            if(validateEmail(email)){
                $subscriptionForm.removeClass("error");
                $.post( "/wp-content/themes/vashishta/newsletter.php", { email: email })
                    .done(function( data ) {
                        //console.log(data);
                        if (data != '1') {
                            $subscriptionForm.addClass("error");
                        } else {
                            $subscriptionForm.find("[name=email]").val("");
                            $subscriptionPopUp.addClass("visible");
                        }
                    });
                // place it inside done after requestSuccess
                
            }else{
                
            }
        })
    }))();

    // SLIDER HP
    var $hpSlider = $('.slider .owl-carousel');
    $hpSlider.owlCarousel({
        loop: true,
		autoplay: true,
		autoplayHoverPause:true,
        items: 1,
        nav: true,
        dots: false,
        navText: [
            '<img class="svg" src="/wp-content/themes/vashishta/assets/svg/icon_arrow_left.svg" alt="">',
            '<img class="svg" src="/wp-content/themes/vashishta/assets/svg/icon_arrow_right.svg" alt="">'
        ]
    });

    var goBackBtnModule = ((function () {
        var $goTopBtn = $(".go-top-btn");
        var body = $("html, body");
        var $footer= $("footer");

        var goBackBtnCheck = function() {
            var fromTop = $(document).height() - $(window).height() - $(window).scrollTop() - $footer.height();
            if(fromTop < 60){
                $goTopBtn.css({bottom: 80 - fromTop + "px"})
            }else{
                $goTopBtn.css({bottom: "20px"})
            }
            if($(window).scrollTop() > 200){
                $goTopBtn.addClass("visible");
            }else{
                $goTopBtn.removeClass("visible");
            }
        }
        goBackBtnCheck();
        $(window).scroll(goBackBtnCheck);
        $(window).resize(goBackBtnCheck);
        $goTopBtn.click(function () {
            body.stop().animate({scrollTop:0}, 500, 'swing');
        });
    }))();

    var menuModule = ((function () {
        var $menu = $("header"),
            $menuBtn = $(".menu-btn"),
            $liMenu = $("header .list>li");

        $(window).scroll(function (event) {
            var scroll = $(window).scrollTop();
            if((scroll > $menu.height()) && !screenLocker.getLockedStatus()){
                $menu.addClass("scrolled");
            }else if((scroll <= $menu.height() - 70) && !screenLocker.getLockedStatus()){
				$menu.removeClass("scrolled");
            }
        });

        $menuBtn.click(function(){
            $menu.toggleClass("opened")
            screenLocker.toggle();
        });
        $liMenu.click(function () {
            $(this).toggleClass("opened");
        })
    }))();

    var videoModule = ((function () {
        var $popUpWrapper = $("#videoPopUp .frame-wr"),
            $popUp = $("#videoPopUp");

        $(document).on('click', '.exit', close);
        $(document).keyup(function(e) {
            if (e.keyCode === 27) close();
        });

        function close() {
            $popUp.removeClass("visible");
            $("#videoPopUp iframe").remove();
            screenLocker.unlock();
        }

        function loadVideo() {
            var div, n,
                v = document.getElementsByClassName("youtube-player");
            for (n = 0; n < v.length; n++) {
                div = document.createElement("div");
                div.setAttribute("data-id", v[n].dataset.id);
                div.innerHTML = labnolThumb(v[n].dataset.id);
                div.onclick = labnolIframe;

                v[n].appendChild(div);
            }
        }

        function labnolThumb(id) {
            var thumb = '<img class="placeholder" src="https://via.placeholder.com/1280x720">' +
                '<img class="defaultImage" src="https://i.ytimg.com/vi/' + id + '/maxresdefault.jpg">',
                play = '<div class="play-btn"><?xml version="1.0" encoding="utf-8"?>\n' +
                    '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\n' +
                    '\t viewBox="0 0 60 60" width="80px" height="80px" style="enable-background:new 0 0 60 60;" xml:space="preserve">\n' +
                    '<circle fill="#FFFFFF" style="opacity:0.25;" cx="30" cy="30" r="30"/>\n' +
                    '<path fill="#FFFFFF" style="opacity:0.75;" d="M22.5,18.7L42.4,30L22.5,41.2V18.7z"/>\n' +
                    '</svg></div>\n';
            return thumb.replace("ID", id) + play;
        }

        function labnolIframe() {
            var iframe = document.createElement("iframe");
            var embed = "https://www.youtube.com/embed/ID?autoplay=1&showinfo=0&controls=1&autohide=1";
            iframe.setAttribute("src", embed.replace("ID", this.dataset.id));
            iframe.setAttribute("frameborder", "0");
            iframe.setAttribute("allowfullscreen", "1");
            if(this.parentNode.classList.contains("in-pop-up") && $(window).width() > 767){
                $popUpWrapper.append(iframe);
                $popUp.addClass("visible");
                screenLocker.lock();
            }else{
                this.parentNode.append(iframe);
            }
        }

        loadVideo();
    }))();


    var lightboxModule = ((function () {

        var images,
            currentIndex,
            galleryName;

        $(document).on('click', '.custom-lightbox .arrow-wr.left', prev);
        $(document).on('click', '.custom-lightbox .arrow-wr.right', next);
        $(document).on('click', '.exit', destroy);
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            // if($(window).width() > 479){
                event.preventDefault();
                init($(this))
            // }
		});
		// Arrow keys for Lightbox
		$(document).keyup(function (e) {
			if (e.keyCode === 37) {
				prev();
				
			}
			if (e.keyCode === 39) {
				next();
			}
		});

        $(document).keyup(function(e) {
            if (e.keyCode === 27) destroy();
        });

        function init(initImage) {
            images = [];
            currentIndex = initImage.index();
            galleryName = initImage.data("gallery");

            $('[data-gallery="' + galleryName + '"]').each(function () {
                images.push({
                    src: $(this).attr('href'),
                    text: $(this).data('text')
                })
            });

            render();
            updateImg();
        }

        function updateImg() {
            var imageObject = new Image();
            $(".custom-lightbox .img-wr img").css({opacity: 0});
            $(".custom-lightbox h4").css({opacity: 0});
            imageObject.onload  = function () {
                if(imageObject.height/imageObject.width > 1){
                    imageObject.classList.add("vertical")
                }
                $(".custom-lightbox .img-wr").html(imageObject);
                $(".custom-lightbox h4").html(images[currentIndex].text).css({opacity: 1});
            }
            imageObject.src = images[currentIndex].src;
        }

        function next(){
            if(currentIndex < images.length - 1){
                currentIndex++;
            }else{
                currentIndex = 0;
            }
            updateImg();
        }

        function prev(){
            if(currentIndex > 0){
                currentIndex--;
            }else{
                currentIndex = images.length - 1;
            }
            updateImg();
        }

        function render() {
            screenLocker.lock();
            $("body").append("<div class=\"custom-lightbox\">\n" +
                "        <div class=\"table-cell\">\n" +
                "            <div class=\"wrap\">\n" +
                "                <div class=\"fl-wr\">\n" +
                "                    <div class=\"arrow-wr left\">\n" +
                "                        <img src=\"/wp-content/themes/vashishta/assets/svg/icon_arrow_left-g.svg\" alt=\"\">\n" +
                "                    </div>\n" +
                "                    <div class=\"img-wr\">\n" +
                "                    </div>\n" +
                "                    <div class=\"arrow-wr right\">\n" +
                "                        <img src=\"/wp-content/themes/vashishta/assets/svg/icon_arrow_right-g.svg\" alt=\"\">\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <h4></h4>\n" +
                "                <img class='exit' src='/wp-content/themes/vashishta/assets/svg/icon_close.svg' alt=''>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "    </div>")
        }

        function destroy() {
            $(".custom-lightbox").remove();
            screenLocker.unlock();
        }
        
        return {
            init: init
        }

    }))();

    var calendarModule = ((function(){

        var $eventPopUp = $(".event-popup");
        var $calendar = $('#calendar');
        var events = [];
        var popUpHtml = $eventPopUp.html();

        $eventPopUp.on('click', '.exit', function () {
            $eventPopUp.removeClass("visible");
            screenLocker.unlock();
        });
        $(document).keyup(function(e) {
            if (e.keyCode === 27) {
                $eventPopUp.removeClass("visible");
                screenLocker.unlock();
            }
        });
        $( "#calendar" ).on( "mouseenter", ".hover-event", function(){
			$( ".hover-event[data-type='"+ $(this).data('type')+"']" ).addClass( "hover" );
        });
        $( "#calendar" ).on( "mouseleave", ".hover-event", function(){
            $( ".hover-event" ).removeClass( "hover" );
        });
        $("#eventsList .event").each(function(){
            var eventObj = {};

            $(this).find("[data-type]").each(function(){
                eventObj[$(this).data("type")] = $(this).html()
            });

            events.push(eventObj)
        });

        $calendar.fullCalendar({
            columnHeaderFormat: 'dddd',
            dayRender: function( date, cell ) {
                events.forEach(function (item) {
                    var startDate = moment(item.startDate, "DD/MM/YYYY");
                    var endDate = moment(item.endDate, "DD/MM/YYYY");
                    var currentDate = moment(new Date(date._d));

                    if (currentDate.isBefore(endDate)
                        && currentDate.isAfter(startDate)
                        || (currentDate.isSame(startDate) || currentDate.isSame(endDate))
                    ) {
                        var el = $('[data-date="' + cell.data("date")+ '"]').eq(1);
                        el.css({
                            "background-color": "rgba(240, 151, 46, 0.8)",
                            "color": "#FFFFFF",
                            "cursor": "pointer",
                            "border-color": "inherit"
                        });
                        el.addClass("hover-event").attr("data-type", item.startDate)

                        if(currentDate.weekday() === 1 || currentDate.isSame(startDate, 'day')){
                            if(currentDate.weekday() === 0){
                                el.addClass("sunday");
                            }
                            el.append(item.courseTitle);
                            el.addClass("event-name-cell");
                        }
                    }
                });
            },
            dayClick: function(date) {
                events.forEach(function (item) {
                    var startDate = moment(item.startDate, "DD/MM/YYYY");
                    var endDate = moment(item.endDate, "DD/MM/YYYY");
                    var currentDate = moment(new Date(date._d));

                    if (currentDate.isBefore(endDate)
                        && currentDate.isAfter(startDate)
                        || (currentDate.isSame(startDate) || currentDate.isSame(endDate))
                    ) {
                        var htmlInside = popUpHtml;

                        htmlInside = htmlInside.replace("{courseTitle}", item.courseTitle);
                        htmlInside = htmlInside.replace("{description}", item.description);
                        htmlInside = htmlInside.replace("{coursesDate}", item.coursesDate);
                        htmlInside = htmlInside.replace("{location}", item.location);
                        htmlInside = htmlInside.replace("{courseLink}", item.courseLink);

                        $eventPopUp.html(htmlInside);
                        $eventPopUp.addClass("visible")
                        screenLocker.lock();
                    }
                });
            },
            viewRender: function () {
              var text = $(".fc-toolbar .fc-left h2").html();
              var formatedText = text.replace(new RegExp("[0-9]", "g"), '')
                  + "<span>" + text.match(/\d+/)[0] + "<span>";
              $(".fc-toolbar .fc-left h2").html(formatedText);
            },
            firstDay: 1,
            header: {
                left:   'title',
                center: '',
                right:  'prev today next'
            }
        })
    }))();

    var testimonials = (function () {
        var $text = $(".testimonials .block .text p"),
            $wrapper = $(".testimonials .block .text"),
            $showmore = $(".testimonials .block .text .show-more");

			$showmore.click(function () {
				$(this).parent().removeClass("hidden");
			});
	
			$(window).resize(function(){
				checkHeigh();
			});
	
			function checkHeigh() {
				$text.each(function(){
					if(($(this).height() > 74 && $(window).width() > 767) || ($(this).height() > 54 && $(window).width() <= 767)){
						$(this).parent().addClass("hidden")
					}
				})
			}
	
			checkHeigh();
		})();
	
		var teachers = (function () {
			var $text = $(".teachers .block .text p"),
				$wrapper = $(".teachers .block .text"),
				$showmore = $(".teachers .block .text .show-more");
	
			$showmore.click(function () {
				$(this).parent().removeClass("hidden");
			});
	
			$(window).resize(function(){
				checkHeigh();
			});
	
			function checkHeigh() {
				$text.each(function(){
					if(($(this).height() > 74 && $(window).width() > 767) || ($(this).height() > 54 && $(window).width() <= 767)){
						$(this).parent().addClass("hidden")
					}
				})
			}
	
			checkHeigh();
		})();
	
	});