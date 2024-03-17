$('.slick-dots li button').empty();
var slideWrapper = $(".main-slider"),
    iframes = slideWrapper.find('.embed-player'),
    lazyImages = slideWrapper.find('.slide-image'),
    lazyCounter = 0;

// POST commands to YouTube or Vimeo API
function postMessageToPlayer(player, command){
    if (player == null || command == null) return;
    player.contentWindow.postMessage(JSON.stringify(command), "*");
}

// When the slide is changing
function playPauseVideo(slick, control){
    var currentSlide, slideType, startTime, player, video;

    currentSlide = slick.find(".slick-current");
    slideType = currentSlide.attr("class").split(" ")[1];
    player = currentSlide.find("iframe").get(0);
    startTime = currentSlide.data("video-start");

    if (slideType === "vimeo") {
        switch (control) {
            case "play":
                if ((startTime != null && startTime > 0 ) && !currentSlide.hasClass('started')) {
                    currentSlide.addClass('started');
                    postMessageToPlayer(player, {
                        "method": "setCurrentTime",
                        "value" : startTime
                    });
                }
                postMessageToPlayer(player, {
                    "method": "play",
                    "value" : 1
                });
                break;
            case "pause":
                postMessageToPlayer(player, {
                    "method": "pause",
                    "value": 1
                });
                break;
        }
    } else if (slideType === "youtube") {
        switch (control) {
            case "play":
                postMessageToPlayer(player, {
                    "event": "command",
                    "func": "mute"
                });
                postMessageToPlayer(player, {
                    "event": "command",
                    "func": "playVideo"
                });
                break;
            case "pause":
                postMessageToPlayer(player, {
                    "event": "command",
                    "func": "pauseVideo"
                });
                break;
        }
    } else if (slideType === "video") {
        video = currentSlide.children("video").get(0);
        if (video != null) {
            if (control === "play"){
                video.play();
            } else {
                video.pause();
            }
        }
    }
}

// Resize player
function resizePlayer(iframes, ratio) {
    if (!iframes[0]) return;
    var win = $(".main-slider"),
        width = win.width(),
        playerWidth,
        height = win.height(),
        playerHeight,
        ratio = ratio || 16/9;

    iframes.each(function(){
        var current = $(this);
        if (width / ratio < height) {
            playerWidth = Math.ceil(height * ratio);
            current.width(playerWidth).height(height).css({
                left: (width - playerWidth) / 2,
                top: 0
            });
        } else {
            playerHeight = Math.ceil(width / ratio);
            current.width(width).height(playerHeight).css({
                left: 0,
                top: (height - playerHeight) / 2
            });
        }
    });
}

// DOM Ready
$(function() {
    // Initialize
    slideWrapper.on("init", function(slick){
        slick = $(slick.currentTarget);
        setTimeout(function(){
            playPauseVideo(slick,"play");
        }, 1000);
        resizePlayer(iframes, 16/9);
    });
    slideWrapper.on("beforeChange", function(event, slick) {
        slick = $(slick.$slider);
        playPauseVideo(slick,"pause");
    });
    slideWrapper.on("afterChange", function(event, slick) {
        slick = $(slick.$slider);
        playPauseVideo(slick,"play");
    });
    slideWrapper.on("lazyLoaded", function(event, slick, image, imageSource) {
        lazyCounter++;
        if (lazyCounter === lazyImages.length){
            lazyImages.addClass('show');
            // slideWrapper.slick("slickPlay");
        }
    });

    //start the slider
    slideWrapper.slick({
        fade:true,
        autoplaySpeed:4000,
        lazyLoad:"progressive",
        speed:600,
        arrows:false,
        dots:true,
        cssEase:"cubic-bezier(0.87, 0.03, 0.41, 0.9)"
    });

    // Function to trigger fadeInLeft animation
    function fadeInLeftAnimation(currentSlide, nextSlide) {
        // $(nextSlide).addClass('animated fadeInLeft'); // Assuming you're using Animate.css for animations
        $(nextSlide).find('.headline').addClass('animated fadeInLeft');
        $(nextSlide).find('.title').addClass('animated bounceInLeft');
        $(nextSlide).find('.description').addClass('animated fadeInDown delay-06s');
        $(nextSlide).find('.artistTrackUserName').addClass('animated fadeInLeft');
        $(nextSlide).find('.border').addClass('animated fadeInLeft');
        $(nextSlide).find('.thumbnail').addClass('animated fadeInLeft');
    }

// Attach beforeChange event listener to trigger the fadeInLeft animation
    slideWrapper.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
        fadeInLeftAnimation(currentSlide, slick.$slides[nextSlide]);
    });

// Auto slide after 5 seconds
    var autoSlideInterval = setInterval(function() {
        slideWrapper.slick('slickNext');
    }, 5000);

// Pause auto sliding on mouse hover
    slideWrapper.on('mouseover', function() {
        clearInterval(autoSlideInterval);
    });

// Resume auto sliding on mouse leave
    slideWrapper.on('mouseleave', function() {
        autoSlideInterval = setInterval(function() {
            slideWrapper.slick('slickNext');
        }, 5000);
    });

});

// Resize event
$(window).on("resize.slickVideoPlayer", function(){
    resizePlayer(iframes, 16/9);
});
