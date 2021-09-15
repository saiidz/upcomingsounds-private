/*================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 5.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================

NOTE:
------
PLACE HERE YOUR OWN JS CODES AND IF NEEDED.
WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR CUSTOM SCRIPT IT'S BETTER LIKE THIS. */

// Mobile Navigation
$(".mobile-toggle").click(function () {});

// sidenav slide in/out
$(".mobile-toggle").click(function () {
    if ($(".main_h").hasClass("close")) {
        $(".main_h").removeClass("close");
    } else {
        $(".main_h").addClass("close");
    }
    $("#ol").addClass("overlay");
    $(".sidenav").removeClass("slideOut");
    $(".sidenav").addClass("slideIn");
});

$("#ol").click(function () {
    $(".sidenav").removeClass("slideIn");
    $(".sidenav").addClass("slideOut");
    $("#ol").removeClass("overlay");
    if ($(".main_h").hasClass("close")) {
        $(".main_h").removeClass("close");
    } else {
        $(".main_h").addClass("open-nav");
    }
});

// navigation scroll
$("nav a").click(function (event) {
    var id = $(this).attr("href");
    var offset = 70;
    var target = $(id).offset().top - offset;
    $("html, body").animate(
        {
            scrollTop: target,
        },
        500
    );
    event.preventDefault();
});

var swiper = new Swiper(".swiper-container", {
    slidesPerView: 2.5,
    spaceBetween: 150,
    centeredSlides: false,
    freeMode: true,
    grabCursor: true,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    //  autoplay: {
    //    delay: 4000,
    //    disableOnInteraction: false
    //  },
    breakpoints: {
        320: {
            slidesPerView: 1.5,
            spaceBetween: 200,
        },
        350: {
            slidesPerView: 1.5,
            spaceBetween: 150,
        },
        400: {
            slidesPerView: 1.5,
            spaceBetween: 130,
        },
        500: {
            slidesPerView: 2,
            spaceBetween: 180,
        },
        600: {
            slidesPerView: 2,
            spaceBetween: 110,
        },
        700: {
            slidesPerView: 2.5,
            spaceBetween: 130,
        },

        800: {
            slidesPerView: 2.5,
            spaceBetween: 100,
        },
        990: {
            slidesPerView: 3,
            spaceBetween: 20,
            centeredSlides: false,
            freeMode: false,
            grabCursor: false,
            loop: false,
        },

        992: {
            slidesPerView: 2.5,
            spaceBetween: 180,

            centeredSlides: false,
            freeMode: true,
            grabCursor: true,
            loop: true,
        },
        1100: {
            spaceBetween: 100,
        },
        1500: {
            spaceBetween: 10,
        },
        1800: {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: false,
            centeredSlides: false,
            freeMode: false,
            grabCursor: false,
        },
    },
});

var swiper = new Swiper(".swiper-container-two", {
    slidesPerView: 2.5,
    spaceBetween: 20,
    centeredSlides: true,
    freeMode: true,
    grabCursor: true,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    //  autoplay: {
    //    delay: 4000,
    //    disableOnInteraction: false
    //  },
    breakpoints: {
        320: {
            spaceBetween: 20,
        },
        400: {
            spaceBetween: 20,
        },
        500: {
            spaceBetween: 20,
        },
        600: {
            spaceBetween: 20,
        },
    },
});

//tab script

function auctionStatus(evt, curentStatus) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(curentStatus).style.display = "block";
    evt.currentTarget.className += " active";
}

//Modal Box Script

// Click function for show the Modal

$(".show").on("click", function () {
    $(".mask").addClass("active");
});

// Function for close the Modal

function closeModal() {
    $(".mask").removeClass("active");
}

// Call the closeModal function on the clicks/keyboard

$(".close, .mask").on("click", function () {
    closeModal();
});

$(document).keyup(function (e) {
    if (e.keyCode == 27) {
        closeModal();
    }
});
