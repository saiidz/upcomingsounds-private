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
<script src="{{ asset('app-assets/vendors/sweetalert/sweetalert.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('scripts/form.js')}}"></script>

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
        $('#artistSaved').on('click', function ()
        {
            window.location.href = '/saved';
        });
        $('#acceptedArtist').on('click', function ()
        {
            window.location.href = '/accepted';
        });
        $('#rejectedArtist').on('click', function ()
        {
            window.location.href = '/rejected';
        });

        $('#curatorDashboard').on('click', function ()
        {
            window.location.href = '/dashboard';
        });


        // offer template open
        $('#curatorOffers').on('click', function ()
        {
            window.location.href = '/offers';
        });
        $('#curatorSubmitCoverage').on('click', function ()
        {
            window.location.href = '/submit-coverage';
        });
        $('#pendingOffers').on('click', function ()
        {
            window.location.href = '/offer-pending';
        });
        $('#acceptedOffers').on('click', function ()
        {
            window.location.href = '/offer-accepted';
        });
        $('#rejectedOffers').on('click', function ()
        {
            window.location.href = '/offer-rejected';
        });
        $('#expiredOffers').on('click', function ()
        {
            window.location.href = '/offer-expired';
        });
        $('#alternativeOffers').on('click', function ()
        {
            window.location.href = '/offer-alternative';
        });
        $('#submissionsOffers').on('click', function ()
        {
            window.location.href = '/offer-artists-submissions';
        });
        $('#propositionOffers').on('click', function ()
        {
            window.location.href = '/offer-proposition';
        });
        $('#verifiedCoverage').on('click', function ()
        {
            window.location.href = '/verified-coverage';
        });
        $('#completedOffers').on('click', function ()
        {
            window.location.href = '/offer-completed';
        });
        // offer template open
    </script>
@yield('page-script')
@yield('chat-script')
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
            animTime = 200,
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
<script>
    $('#showGetVerified').on('click', function(){
        $('#getNoVerified').css('display','block');
    })
</script>
<script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script>
    $('.reloadList').on('click', function(){
        window.open(
            window.location.origin + '/taste-maker-profile#playlists',
            '_self' // <- This is what makes it open in a new window.
        );
    });
    $('.reloadProfile').on('click', function(){
        window.open(
            window.location.origin + '/taste-maker-profile#profile',
            '_self' // <- This is what makes it open in a new window.
        );
    });
    $('.reloadStats').on('click', function(){
        window.open(
            window.location.origin + '/taste-maker-profile#stats',
            '_self' // <- This is what makes it open in a new window.
        );
    });
    $('.reloadTracks').on('click', function(){
        window.open(
            window.location.origin + '/taste-maker-profile#tracks',
            '_self' // <- This is what makes it open in a new window.
        );
    });
    $('.reloadCuratorDashboard').on('click', function(){
        window.open(
            window.location.origin + '/dashboard',
            '_self' // <- This is what makes it open in a new window.
        );
    });

    function publicProfileBlank()
    {
        let url = $('#publicProfileBlank').data('value');
        window.open(
            url,
            '_blank' // <- This is what makes it open in a new window.
        );
    }

    function publicProfileSaved(id)
    {
        let url = $('#publicProfile'+id).data('value');
        window.open(
            url,
            '_blank' // <- This is what makes it open in a new window.
        );
    }

</script>
<script>
    // Change Artist password
    $('#changePasswordCurator').submit(function(e){
        e.preventDefault();

        $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
                $(document).find('span.error-text').text('');
            },
            success:function(data){
                if(data.status == 0){
                    $.each(data.error, function(prefix, val){
                        $('span.'+prefix+'_error').text(val[0]);
                    });
                }else{
                    document.getElementById('change-password-curator').style.display = 'none';
                    $('#changePasswordCurator')[0].reset();
                    $('#snackbar').html(data.msg);
                    $('#snackbar').addClass("show");
                    setTimeout(function () {
                        $('#snackbar').removeClass("show");

                    }, 5000);
                    // alert(data.msg);
                }
            }
        });
    });
    document.getElementById('closeChangeCuratorPassword').addEventListener('click', function (){
        document.querySelector('#changePasswordCurator').reset();
    });
</script>
<script src="{{asset('js/gijgo.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
<script>
    /*--------------------------------------
            favorite Track
      ---------------------------------------*/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function favoriteTrack(track_id_, status_)
    {
        var track_id = window.btoa( track_id_ );
        var status = window.btoa( status_ );

        showLoader();
        $.ajax({
            type: "GET",
            url: '{{route('curator.favorite.track')}}',
            data: {track_id:track_id,status: status},
            dataType: 'json',
            success: function (data) {
                loader();
                if (data.success) {
                    toastr.success(data.success);

                    if(data.reload_page == "reload_page")
                    {
                        location.reload();
                    }
                    location.reload();
                    {{--if(data.statusTrack == "SAVE")--}}
                    {{--{--}}
                    {{--    window.location.replace('{{route('artist.saved')}}');--}}

                    {{--}else if(data.statusTrack == 'ACCEPTED'){--}}
                    {{--    window.open(--}}
                    {{--        window.location.origin + '/accepted',--}}
                    {{--        '_self' // <- This is what makes it open in a new window.--}}
                    {{--    );--}}
                    {{--}else if(data.statusTrack == 'REJECTED'){--}}
                    {{--    window.open(--}}
                    {{--        window.location.origin + '/rejected',--}}
                    {{--        '_self' // <- This is what makes it open in a new window.--}}
                    {{--    );--}}
                    {{--}--}}

                }
                if (data.error) {
                    toastr.error(data.error);
                }
            },
        })
    }

    /*--------------------------------------
            favorite Artist
      ---------------------------------------*/

    function offerShowHide()
    {
        $('#mySidebarCollapsedShowHide').css('display','none');
        $('#offerSendCollapsedShowHide').css('display','none');
        $('#templateCollapsedShowHide').css('display','block');
    }

    function backToShowHide(value)
    {
        if(value === "overview")
        {
            $('#templateCollapsedShowHide').css('display','none');
            $('#offerSendCollapsedShowHide').css('display','none');
            $('#mySidebarCollapsedShowHide').css('display','block');
        }

        if(value === "back")
        {
            $('#selectOffer').val('Select Template').trigger('change');
            $('#offerSendCollapsedShowHide').css('display','none');
            $('#mySidebarCollapsedShowHide').css('display','none');
            $('#templateCollapsedShowHide').css('display','block');
            $('#datePickerPublishDate').val('');
        }
    }

    function selectOfferTemplate(id)
    {
        showLoader();
        $.ajax({
            type: "GET",
            url: '{{route('curator.show.offer.template')}}',
            data: {offer_id:id},
            dataType: 'json',
            success: function (data) {
                console.log(data);
                loader();

                if (data.success) {
                    $('.datePickerE').datepicker({
                        iconsLibrary: 'fontawesome',
                        format: "yyyy-mm-dd",

                    });
                    $('.datePickerP').datepicker({
                        iconsLibrary: 'fontawesome',
                        format: "yyyy-mm-dd",

                    });
                    if(data.offer_template)
                    {
                        $('#offerTemplateID').val(data.offer_template.id);
                        $('#nameOffer_').html(data.offer_template.title);
                    }
                    if(data.offer_template)
                    {
                        $('#offerText_').html(data.offer_template.offer_text.replace(/(<([^>]+)>)/gi, ""));
                    }
                    if(data.offer_template)
                    {
                        $('#contribution_').html(data.offer_template.contribution + ' USC');
                    }
                    if(data.offer_type)
                    {
                        $('#typeOffer_').html(data.offer_type.name);
                    }
                    if(data.alternative_option)
                    {
                        $('#alternativeOffer_').html(data.alternative_option.name);
                    }

                }
                if (data.error) {
                    toastr.error(data.error);
                }
            },
        });

        $('#templateCollapsedShowHide').css('display','none');
        $('#mySidebarCollapsedShowHide').css('display','none');
        $('#offerSendCollapsedShowHide').css('display','block');
    }

    // send offer
    function sendOffer(artist_id,track_id)
    {

        let offerTemplateID = $('#offerTemplateID').val()
        let campaign_ID = $('#campaign_ID').val()
        let datePickerOfferExpiry = $('#datePickerOfferExpiry').val()
        let datePickerPublishDate = $('#datePickerPublishDate').val()

        if(datePickerOfferExpiry == '')
        {
            toastr.error('Please Select Expiry Date');
            return false;
        }
        if(datePickerPublishDate == '')
        {
            toastr.error('Please Select Publish Date');
            return false;
        }
        if(offerTemplateID == '')
        {
            toastr.error('Problem in Offer Template');
            return false;
        }
        if(campaign_ID == '')
        {
            toastr.error('Problem in Offer Template');
            return false;
        }

        showLoader();
        $.ajax({
            type: "POST",
            url: '{{route('curator.send.offer')}}',
            data: {
                offer_template_ID:offerTemplateID,
                offer_expiry:datePickerOfferExpiry,
                offer_publish:datePickerPublishDate,
                artistID:artist_id,
                trackID:track_id,
                campaign_ID:campaign_ID,
            },
            dataType: 'json',
            success: function (data) {
                loader();
                if (data.success) {
                    toastr.success(data.success);
                    window.location.replace('{{route('artist.submission')}}');
                }
                if (data.error) {
                    toastr.error(data.error);
                }
            },
        })
    }

    function favoriteArtist(artist_id_)
    {
        var artist_id = window.btoa( artist_id_ );

        showLoader();
        $.ajax({
            type: "GET",
            url: '{{route('curator.favorite.artist')}}',
            data: {artist_id:artist_id},
            dataType: 'json',
            success: function (data) {
                loader();
                if (data.success) {
                    toastr.success(data.success);

                    if(data.reload_page == "reload_page")
                    {
                        location.reload();
                    }
                    if(data.statusArtist == true)
                    {
                        window.location.replace('{{route('curator.saved.artists')}}');

                    }
                }
                if (data.error) {
                    toastr.error(data.error);
                }
            },
        })
    }

</script>
<script>
    $(window).load(function() {
        $('#loading').hide();
    });
</script>
<script>
    function sendOfferShow(id)
    {
        var form = document.getElementById("form-offer"+id);
        form.submit();
    }
</script>
