/*  ---------------------------------------------------
    Template Name: Manup
    Description: Manup Event HTML Template
    Author: Colorlib
    Author URI: http://colorlib.com
    Version: 1.0
    Created: Colorlib
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------------
		Partner Slider
    ----------------------- */
    $(".partner-logo").owlCarousel({
        items: 3,
        dots: false,
        autoplay: true,
        loop: true,
        smartSpeed: 1200,
        margin: 30, // Adjust margin as needed
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });

    $(".partner-logo-1").owlCarousel({
        items: 6,
        dots: false,
        autoplay: true,
        loop: true,
        smartSpeed: 1200,
        margin: 116,
        responsive: {
            320: {
                items: 2,
            },
            480: {
                items: 3,
            },
            768: {
                items: 4,
            },
            992: {
                items: 5,
            },
            1200: {
                items: 6
            }
        }
    });

    /*------------------------
		Testimonial Slider
    ----------------------- */
    $(".testimonial-slider").owlCarousel({
        items: 2,
        dots: false,
        autoplay: false,
        loop: true,
        smartSpeed: 1200,
        nav: true,
        navText: ["<span class='fa fa-angle-left'></span>", "<span class='fa fa-angle-right'></span>"],
        responsive: {
            320: {
                items: 1,
            },
            768: {
                items: 2
            }
        }
    });

    /*------------------
        Magnific Popup
    --------------------*/
    $('.video-popup').magnificPopup({
        type: 'iframe'
    });

    /*------------------
        CountDown
    --------------------*/
    // For demo preview
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    if(mm == 12) {
        mm = '01';
        yyyy = yyyy + 1;
    } else {
        mm = parseInt(mm) + 1;
        mm = String(mm).padStart(2, '0');
    }
    var timerdate = mm + '/' + dd + '/' + yyyy;
    // For demo preview end
    

    // Use this for real timer date
    /*  var timerdate = "2020/01/01"; */

	$("#countdown").countdown(timerdate, function(event) {
        $(this).html(event.strftime("<div class='cd-item'><span>%D</span> <p>Days</p> </div>" + "<div class='cd-item'><span>%H</span> <p>Hrs</p> </div>" + "<div class='cd-item'><span>%M</span> <p>Mins</p> </div>" + "<div class='cd-item'><span>%S</span> <p>Secs</p> </div>"));
    });

})(jQuery);


 /* sticky nav bar*/
 document.addEventListener('DOMContentLoaded', function() {
    var navbar = document.getElementById('navbar');

    // Add scroll event listener
    window.addEventListener('scroll', function() {
        // Check if page has been scrolled
        if (window.scrollY > 0) {
            // Add a class to make navbar not transparent
            navbar.classList.remove('transparent');
        } else {
            // Remove the class to make navbar transparent
            navbar.classList.add('transparent');
        }
    });
});

 // Script to show/hide back to top button based on scroll position
 window.onscroll = function() {scrollFunction()};

 function scrollFunction() {
     if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
         document.getElementById("back-to-top").style.display = "block";
     } else {
         document.getElementById("back-to-top").style.display = "none";
     }
 }

 // Script to scroll back to top when button is clicked
 document.getElementById("back-to-top").addEventListener("click", function() {
     document.body.scrollTop = 0; // For Safari
     document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
 });

 // Logo scrling reduce
// JavaScript
window.addEventListener('scroll', function() {
    var header = document.querySelector('.header-section');
    header.classList.toggle('scrolled', window.scrollY > 0);
});

//Static report JS
function countUp(targetElement, targetValue) {
    let currentCount = 0;
    const increment = Math.ceil(targetValue / 500); // Adjust speed by changing divisor

    const intervalId = setInterval(() => {
      currentCount += increment;
      if (currentCount >= targetValue) {
        currentCount = targetValue;
        clearInterval(intervalId);
      }
      targetElement.textContent = currentCount.toLocaleString(); // Format with commas
    }, 10); // Adjust speed by changing interval
  }

  const productCountElement = document.getElementById("productCount");
  const visitorCountElement = document.getElementById("visitorCount");
  const exhibitorCountElement = document.getElementById("exhibitorCount");
  const resortCountElement = document.getElementById("resortCount");
  const brandCountElement = document.getElementById("brandCount");

  countUp(productCountElement, 150);
  countUp(visitorCountElement, 4700);
  countUp(exhibitorCountElement, 120);
  countUp(resortCountElement, 120);
  countUp(brandCountElement, 10000);

