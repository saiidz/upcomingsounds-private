<!DOCTYPE html>
<html lang="en-US">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artist Home | {{ config('app.name', 'Upcoming Sound') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" sizes="196x196" href="{{asset('images/favicon.png')}}">
    <!-- This site is optimized with the Yoast SEO plugin v12.2 - https://yoast.com/wordpress/plugins/seo/ -->
    <meta name="description"
          content="Our mission is to help independent artist and small record labels to get their music heard by Spotify playlist curators and Youtube influencers."/>
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>

    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel='stylesheet' id='bootstrap-css'
          href='{{asset('css/custom/custom.css')}}' type='text/css'/>
    <link rel='stylesheet' id='wp-block-library-css'
          href='{{asset('wp-includes/css/dist/block-library/style.min6619.css?ver=5.2.5')}}' type='text/css' media='all'/>
    <link rel='stylesheet' id='trp-language-switcher-style-css'
          href='{{asset('wp-content/plugins/translatepress-multilingual/assets/css/trp-language-switcher7fb9.css?ver=1.5.9')}}'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='sanjose-core-css' href='{{asset('wp-content/themes/playlistpush-theme/style6619.css?ver=5.2.5')}}'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='font-awesome-css'
          href='{{asset('wp-content/plugins/js_composer/assets/lib/bower/font-awesome/css/font-awesome.min24b2.css?ver=5.5.5')}}'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='sanjose-info-icons-css'
          href='{{asset('wp-content/themes/sanjose/assets/css/info6619.css?ver=5.2.5')}}' type='text/css' media='all'/>
    <link rel='stylesheet' id='bootstrap-css'
          href='{{asset('wp-content/themes/sanjose/assets/css/bootstrap.min6619.css?ver=5.2.5')}}' type='text/css' media='all'/>
    <link rel='stylesheet' id='carousel-css-css'
          href='{{asset('wp-content/themes/sanjose/assets/css/owl.carousel.min6619.css?ver=5.2.5')}}' type='text/css' media='all'/>
    <link rel='stylesheet' id='sanjose-resp-menu-css'
          href='{{asset('wp-content/themes/sanjose/assets/css/responsive-menu6619.css?ver=5.2.5')}}' type='text/css' media='all'/>
    <link rel='stylesheet' id='sanjose-custom-spacing-css'
          href='{{asset('wp-content/themes/sanjose/assets/css/custom-spacing6619.css?ver=5.2.5')}}' type='text/css' media='all'/>
    <link rel='stylesheet' id='swiper-css-css' href='{{asset('wp-content/themes/sanjose/assets/css/swiper6619.css?ver=5.2.5')}}'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='lightgallery-css-css'
          href='{{asset('wp-content/themes/sanjose/assets/css/lightgallery6619.css?ver=5.2.5')}}' type='text/css' media='all'/>
    <link rel='stylesheet' id='ionicons-css-css'
          href='{{asset('wp-content/themes/sanjose/assets/css/ionicons.min6619.css?ver=5.2.5')}}' type='text/css' media='all'/>
    <link rel='stylesheet' id='circliful-css'
          href='{{asset('wp-content/themes/sanjose/assets/css/jquery.circliful6619.css?ver=5.2.5')}}' type='text/css' media='all'/>
    <link rel='stylesheet' id='sanjose-style-css' href='{{asset('wp-content/themes/sanjose/assets/css/styl6619.css?ver=5.2.5')}}'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='sanjose-guttenderg-css'
          href='{{asset('wp-content/themes/sanjose/assets/css/guttenderg6619.css?ver=5.2.5')}}' type='text/css' media='all'/>
    <link rel='stylesheet' id='sanjose-theme-css' href='{{asset('wp-content/themes/sanjose/assets/css/styles6619.css?ver=5.2.5')}}'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='sanjose-fonts-css'
          href='https://fonts.googleapis.com/css?family=Montserrat%3A300%2C400%2C500%2C600%2C700%7CDroid+Serif%3A+400%2C400i%2C700i%7COpen+Sans&amp;subset=latin%2Clatin-ext&amp;ver=1.0.0'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='js_composer_front-css'
          href='{{asset('wp-content/plugins/js_composer/assets/css/js_composer.min24b2.css?ver=5.5.5')}}' type='text/css'
          media='all'/>
    <link rel='stylesheet' id='js_composer_custom_css-css'
          href='{{asset('wp-content/uploads/js_composer/custom24b2.css?ver=5.5.5')}}' type='text/css' media='all'/>

    <script type='text/javascript'
            src='{{asset('wp-content/plugins/google-analytics-dashboard-for-wp/assets/js/frontend.min37ad.js?ver=6.0.1')}}'></script>
    <script type='text/javascript' src='{{asset('wp-includes/js/jquery/jquery4a5f.js?ver=1.12.4-wp')}}'></script>
    <script type='text/javascript' src='{{asset('wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1')}}'></script>

    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="{{asset('wp-includes/wlwmanifest.html')}}"/>
    <meta name="generator" content="WordPress 5.2.5"/>


    <style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1513981483432 {
            background-image: url({{asset('wp-content/uploads/2017/06/artist-bgcaf4.jpg')}}) !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
            padding-left: 185.5px !important;
            padding-right: 185.5px!important;
        }

        .vc_custom_1513981502651 {
            background: #f4f9fc url(https://playlistpush.com/wp-content/uploads/2017/06/curators-photo-wide.jpg?id=2788) !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }

        .vc_custom_1510756007250 {
            background-color: #273140 !important;
        }

        .vc_custom_1507648567231 {
            background-color: #f1f7f8 !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }

        .vc_custom_1494719181657 {
            padding-top: 0px !important;
        }

        .vc_custom_1495084006180 {
            padding-top: 0px !important;
        }

        .vc_custom_1510755766812 {
            padding-top: 12px !important;
        }
    </style>
    <noscript>
        <style type="text/css"> .wpb_animate_when_almost_visible {
                opacity: 1;
            }</style>
    </noscript>
</head>


<body>

<div class="container no-padd-md">
    <div id="for-artists" data-vc-full-width="true" data-vc-full-width-init="false"
         class="vc_row wpb_row vc_row-fluid vc_custom_1513981483432 vc_row-has-fill padding-lg-150b padding-md-110b padding-sm-50b padding-xs-30b">
        <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-lg-6 vc_col-md-6 vc_hidden-sm ">
            <div class="vc_column-inner vc_custom_1494719181657">
                <div class="wpb_wrapper"></div>
            </div>
        </div>
        <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-6 vc_col-md-6  padding-lg-140t padding-md-140t padding-sm-50t padding-xs-30t">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper" id="homeArtist">
                    <div class="sanjose-text custom-mb text-left"><h2><i>for</i> Artists</h2>
                        <div><p><span style="font-weight: 400">Promote your music by submitting your songs to active playlist curators.</span>
                            </p></div>
                    </div>
                    <div class="vc_row wpb_row vc_inner vc_row-fluid  margin-lg-45t margin-md-45t margin-sm-30t margin-xs-30t">
                        <div class="wpb_column vc_column_container vc_col-sm-6">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="featured-block text-left  small-size default" id="homeArtist">
                                        <div class="icon"><i class="icon-info-9"></i>
                                        </div>
                                        <h6 class="title">Flex Pricing</h6>
                                        <div class="desc"><p>Whether you make pop music or are an instrumental
                                                pianist, you only pay to reach the curators that will dig your
                                                music.</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wpb_column vc_column_container vc_col-sm-6">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="featured-block text-left  small-size default" id="homeArtist">
                                        <div class="icon"><i class="icon-info-6"></i>
                                        </div>
                                        <h6 class="title">Getting picked up</h6>
                                        <div class="desc"><p>We send your music to a targeted group of playlist
                                                curators, they review your song for playlist consideration</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{url('/artists')}}" class="button transparent learn_more tellMeMore">Learn more </a>
                    <a href="#" class="button default artist_login tellMeMore"
                        >SignUp/ Login</a></div>
            </div>
        </div>
    </div>
    <div class="vc_row-full-width"></div>
</div>


<link rel='stylesheet' id='font-et-line-css' href='{{asset('wp-content/themes/sanjose/style6619.css?ver=5.2.5')}}' type='text/css'
      media='all'/>
<script type='text/javascript' src='{{asset('wp-content/themes/sanjose/assets/js/bootstrap.min6619.js?ver=5.2.5')}}'></script>
<script type='text/javascript' src='{{asset('wp-content/themes/sanjose/assets/js/jquery.mmenu.all.min6619.js?ver=5.2.5')}}'></script>
<script type='text/javascript' src='{{asset('wp-content/themes/sanjose/assets/js/owl.carousel.min6619.js?ver=5.2.5')}}'></script>
<script type='text/javascript' src='{{asset('wp-content/themes/sanjose/assets/js/jquery.circliful.min6619.js?ver=5.2.5')}}'></script>
<script type='text/javascript' src='{{asset('wp-content/themes/sanjose/assets/js/particles.min6619.js?ver=5.2.5')}}'></script>
<script type='text/javascript' src='{{asset('wp-content/themes/sanjose/assets/js/jquery.fitvids6619.js?ver=5.2.5')}}'></script>
<script type='text/javascript' src='{{asset('wp-content/themes/sanjose/assets/js/swiper.min6619.js?ver=5.2.5')}}'></script>
<script type='text/javascript'
        src='{{asset('wp-content/themes/sanjose/assets/js/jquery.easypiechart.min6619.js?ver=5.2.5')}}'></script>
<script type='text/javascript'
        src='{{asset('wp-content/plugins/js_composer/assets/lib/bower/isotope/dist/isotope.pkgd.min24b2.js?ver=5.5.5')}}'></script>
<script type='text/javascript' src='{{asset('wp-content/themes/sanjose/assets/js/lightgallery6619.js?ver=5.2.5')}}'></script>
<script type='text/javascript' src='{{asset('wp-content/themes/sanjose/assets/js/scripts6619.js?ver=5.2.5')}}'></script>

<script type='text/javascript' src='{{asset('wp-content/themes/sanjose/assets/js/main6619.js?ver=5.2.5')}}'></script>
<script type='text/javascript' src='{{asset('wp-includes/js/comment-reply.min6619.js?ver=5.2.5')}}'></script>
<script type='text/javascript' src='{{asset('wp-includes/js/wp-embed.min6619.js?ver=5.2.5')}}'></script>
<script type='text/javascript'
        src='{{asset('wp-content/plugins/js_composer/assets/js/dist/js_composer_front.min24b2.js?ver=5.5.5')}}'></script>
<script type='text/javascript' src='https://www.youtube.com/iframe_api?ver=1'></script>
<script type="text/javascript">
    jQuery.noConflict();
    (function ($) {
        $(function () {
            // More code using $ as alias to jQuery
            $("area[href*=\\#],a[href*=\\#]:not([href=\\#]):not([href^='\\#tab']):not([href^='\\#quicktab']):not([href^='\\#pane']):not([href^='#mm-']):not([href='#main-menu'])").click(function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html,body').animate({
                            scrollTop: target.offset().top - 20
                        }, 900, 'easeInQuint');
                        return false;
                    }
                }
            });
        });
    })(jQuery);
</script>

</body>
</html>
