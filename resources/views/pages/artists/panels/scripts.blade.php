<!-- build:js scripts/app.min.js -->
<!-- jQuery -->
<script src="{{asset('libs/jquery/dist/jquery.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('libs/tether/dist/js/tether.min.js')}}"></script>
<script src="{{asset('libs/bootstrap/dist/js/bootstrap.js')}}"></script>
<script src="{{asset('scripts/form.js')}}"></script>
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
    $('.reloadTrack').on('click', function(){
        window.open(
            window.location.origin + '/artist-profile#tracks',
            '_self' // <- This is what makes it open in a new window.
        );
    });
    $('.reloadList').on('click', function(){
        window.open(
            window.location.origin + '/artist-profile#playlists',
            '_self' // <- This is what makes it open in a new window.
        );
    });
    $('.reloadSaved').on('click', function(){
        window.open(
            window.location.origin + '/artist-profile#likes',
            '_self' // <- This is what makes it open in a new window.
        );
    });
    $('.reloadProfile').on('click', function(){
        window.open(
            window.location.origin + '/artist-profile#profile',
            '_self' // <- This is what makes it open in a new window.
        );
    });
    $('.reloadWelcomeTrack').on('click', function(){
        window.open(
            window.location.origin + '/welcome-your-track',
            '_self' // <- This is what makes it open in a new window.
        );
    });
    $('.reloadWallet').on('click', function(){
        window.open(
            window.location.origin + '/wallet',
            '_self' // <- This is what makes it open in a new window.
        );
    });
    $('#artistOffers').on('click', function ()
    {
        window.location.href = '/artist-offers';
    });

    // offer template open
    $('#newOfferArtist').on('click', function ()
    {
        window.location.href = '/new-offer';
    });
    $('#pendingOfferArtist').on('click', function ()
    {
        window.location.href = '/pending-offer';
    });
    $('#acceptedOfferArtist').on('click', function ()
    {
        window.location.href = '/accepted-offer';
    });
    $('#rejectedOfferArtist').on('click', function ()
    {
        window.location.href = '/rejected-offer';
    });

    $('#alternativeOfferArtist').on('click', function ()
    {
        window.location.href = '/alternative-offer';
    });

    $('#propositionOfferArtist').on('click', function ()
    {
        window.location.href = '/proposition-offer';
    });
    $('#completedOfferArtist').on('click', function ()
    {
        window.location.href = '/completed-offer';
    });
    // offer template open

    $('#artistMessages').on('click', function ()
    {
        window.location.href = '/messages';
    });
</script>
<script>
    // Change Artist password
    $('#changePasswordArtist').on('submit', function(e){
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
                    document.getElementById('change-password').style.display = 'none';
                    $('#changePasswordArtist')[0].reset();
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
    document.getElementById('closeChangeArtistPassword').addEventListener('click', function (){
        document.querySelector('#changePasswordArtist').reset();
    });
</script>
<script>
    $(window).load(function() {
        $('#loading').hide();
    });
</script>
<script>
    function OfferShow(id)
    {
        var form = document.getElementById("form-offer"+id);
        form.submit();
    }
</script>
