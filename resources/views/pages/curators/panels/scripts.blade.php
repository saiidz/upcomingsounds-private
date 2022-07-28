<!-- build:js scripts/app.min.js -->
<!-- jQuery -->
<script src="{{asset('libs/jquery/dist/jquery.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('libs/tether/dist/js/tether.min.js')}}"></script>
<script src="{{asset('libs/bootstrap/dist/js/bootstrap.js')}}"></script>
<!-- core -->
<script src="{{asset('libs/jQuery-Storage-API/jquery.storageapi.min.js')}}"></script>
<script src="{{asset('libs/jquery.stellar/jquery.stellar.min.js')}}"></script>
<script src="{{asset('libs/owl.carousel/dist/owl.carousel.min.js')}}"></script>
<script src="{{asset('libs/jscroll/jquery.jscroll.min.js')}}"></script>
<script src="{{asset('libs/PACE/pace.min.js')}}"></script>
<script src="{{asset('libs/jquery-pjax/jquery.pjax.js')}}"></script>

<script src="{{asset('scripts/form.js')}}"></script>

<script src="{{asset('libs/mediaelement/build/mediaelement-and-player.min.js')}}"></script>
<script src="{{asset('libs/mediaelement/build/mep.js')}}"></script>
<script src="{{asset('scripts/player.js')}}"></script>

<script src="{{asset('scripts/config.lazyload.js')}}"></script>
<script src="{{asset('scripts/ui-load.js')}}"></script>
<script src="{{asset('scripts/ui-jp.js')}}"></script>
<script src="{{asset('scripts/ui-include.js')}}"></script>
<script src="{{asset('scripts/ui-device.js')}}"></script>
<script src="{{asset('scripts/ui-form.js')}}"></script>
<script src="{{asset('scripts/ui-nav.js')}}"></script>
<script src="{{asset('scripts/ui-screenfull.js')}}"></script>
<script src="{{asset('scripts/ui-scroll-to.js')}}"></script>
<script src="{{asset('scripts/ui-toggle-class.js')}}"></script>
<script src="{{asset('scripts/ui-taburl.js')}}"></script>
<script src="{{asset('scripts/app.js')}}"></script>
<script src="{{asset('scripts/site.js')}}"></script>
<script src="{{asset('scripts/ajax.js')}}"></script>
<script src="{{asset('js/swiper-bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){

        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
           removeItemButton: true,
        //    maxItemCount:5,
        //    searchResultLimit:5,
        //    renderChoiceLimit:5
         });


    });
        $('#artistSubmission').on('click', function ()
        {
            window.location.href = '/artist-submission';
        });
        $('#curatorDashboard').on('click', function ()
        {
            window.location.href = '/dashboard';
        });
    </script>
@yield('page-script')
<script>
    var preload = document.getElementById("loadings");
    function loader(){
        preload.style.display='none';
    }
    function showLoader(){
        preload.style.display='block';
    }
</script>

@if (Session::get('success'))
    @php $message = (Session::get('success')) @endphp
    <script>
        var x = document.getElementById("snackbar");
        x.innerText = "{{$message}}"
        x.className = "show";
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 5000);
    </script>
@endif

@if (Session::get('error'))
    @php $message = (Session::get('error')) @endphp
    <script>
        var x = document.getElementById("snackbarError");
        x.innerText = "{{$message}}"
        x.className = "show";
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 5000);
    </script>
@endif

<script>
    $(".toggle-password").click(function () {
        $(this).toggleClass("show-pas");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    $('#datepickerAddTrack').datepicker({
            iconsLibrary: 'fontawesome',
            format: "yyyy-mm-dd"
        });
</script>

<script>
    @if(Session::has('success'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('success') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
    @if(Session::has('pending_warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('pending_warning') }}");
    @endif
</script>

<script>
    $(document).ready(function() {

        var $slides = $('.con__slide').length,
            topAnimSpd = 650,
            textAnimSpd = 1000,
            nextSlideSpd = topAnimSpd + textAnimSpd,
            animating = true,
            animTime = 4000,
            curSlide = 1,
            nextSlide, scrolledUp;

        setTimeout(function() {
            animating = false;
        }, 2300);

        function navigateUp() {
            if (curSlide > 1) {
                scrolledUp = true;
                pagination(curSlide);
                curSlide--;
            }
        }

        function navigateDown() {
            if (curSlide < $slides) {
                scrolledUp = false;
                pagination(curSlide);
                curSlide++;
                console.log(curSlide);
            }
        }

        $(window).on('load', function() {
            $('.con__slide--1').addClass('active');
        });

        function pagination(slide, target) {
            animating = true;
            // Check if pagination was triggered by scroll/keys/arrows or direct click. If scroll/keys/arrows then check if scrolling was up or down.
            if (target === undefined) {
                nextSlide = scrolledUp ? slide - 1 : slide + 1;
            } else {
                nextSlide = target;
            }
            ////////// Slides //////////
            $('.con__slide--' + slide).removeClass('active');

            setTimeout(function() {
                $('.con__slide--' + nextSlide).addClass('active');
            }, nextSlideSpd);

            ////////// Nav //////////
            $('.con__nav-item--' + slide).removeClass('nav-active');
            $('.con__nav-item--' + nextSlide).addClass('nav-active');

            setTimeout(function() {
                animating = false;
            }, animTime);
        }

        // Mouse wheel trigger
        $(document).on('mousewheel DOMMouseScroll', function(e) {
            var delta = e.originalEvent.wheelDelta;
            if (animating) return;
            // Mouse Up
            if (delta > 0 || e.originalEvent.detail < 0) {
                navigateUp();
            } else {
                navigateDown();
            }
        });

        // Direct trigger
        $(document).on("click", ".con__nav-item:not(.nav-active)", function() {
            // Essential to convert target to a number with +, so curSlide would be a number
            var target = +$(this).attr('data-target');
            if (animating) return;
            pagination(curSlide, target);
            curSlide = target;
        });

        // Arrow trigger
        $(document).on('click', '.con__nav-scroll', function() {
            var target = $(this).attr('data-target');
            if (animating) return;
            if (target === 'up') {
                navigateUp();
            } else {
                navigateDown();
            }
        });

        // Key trigger
        $(document).on("keydown", function(e) {
            if (animating) return;
            if (e.which === 38) {
                navigateUp();
            } else if (e.which === 40) {
                navigateDown();
            }
        });

        var topLink = $(".con__slide--4-top-h-link"),
            botLink = $(".con__slide--4-bot-h-link");
        $(".con__slide--4-top-h-link, .con__slide--4-bot-h-link").on({
            mouseenter: function() {
                topLink.css('text-decoration', 'underline');
                botLink.css('text-decoration', 'underline');
            },
            mouseleave: function() {
                topLink.css('text-decoration', 'none');
                botLink.css('text-decoration', 'none');
            }
        });
    });
</script>
