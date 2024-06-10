@extends('pages.artists.panels.layout')

{{-- page title --}}
@section('title','Start a campaign')

@section('page-style')
    <link rel="stylesheet" href="{{asset('css/custom/add-your-track.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/gijgo.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/custom/curator-custom.css')}}" type="text/css" />
    <style>
        #loadings {
            background: rgba(255, 255, 255, .4) url({{asset('images/loader.gif')}}) no-repeat center center !important;
        }
        .addMoreRemoveLink {
            display: inline-flex !important;
        }
        .plusIconRemove {
            margin-left: 52px !important;
        }
        .text-ellipsis{
            white-space: initial !important;
        }
        .title__name h3{
            font-size: 0.8rem !important;
        }
        .form__container h2,h3{
            font-size:22px !important;
        }
        #rocket img{
            font-size: 60px;
            color: red;
            padding-left: 70px;
            display: flex;
            height:80px;
        }
        .iframeDesign iframe {
            width: 100%;
        }

        .itemCurator {
            position: relative;
            overflow: hidden;
        }

        .itemMediaCurator {
            position: relative;
            width: 100%;
            padding-top: 100%; /* Set the desired aspect ratio, e.g., 4:3 would be 75% */
            background-size: cover;
        }

        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensure the image covers the container */
        }

        .profile-image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            /*border: 4px solid #fff; !* Add a white border around the profile image *!*/
            border-radius: 50%; /* Make it a circle for a profile image effect */
        }
        .itemCurator:after {
            padding-top: 0% !important;
        }
        .colorAdd{
            color:#02b875 !important;
        }
    </style>
@endsection

@section('content')
    <!-- ############ PAGE START-->

    <div class="page-content">

        <div class="padding p-b-0">
            <div class="row row-sm item-masonry item-info-overlay">
                <div class="col-sm-12 text-white m-b-sm">
                    <div class="form__container">
                        <div id="selectionHide">
                            <div class="title__container">
                                <div class="separatortrack">
                                    <div class="promoteAddTrack">
                                        <a class="m-b-md" href="{{ url('/wallet') }}">
                                            <span class="amount">{{\App\Models\User::artistBalance()}} USC</span>
{{--                                            <span class="amount">{{!empty(Auth::user()->TransactionUserInfo) ? Auth::user()->TransactionUserInfo->transactionHistory->sum('credits') - (!empty(Auth::user()->campaign) ? Auth::user()->campaign->sum('usc_credit') : 0) : 0}} USC</span>--}}
                                            <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">
                                        </a>
                                    </div>
                                    <h1>Get started with your campaign</h1>
                                    <div class="separator"></div>
                                </div>

{{--                                <div class="promoteAddTrack">--}}
{{--                                    <a class="m-b-md rounded addTrack" data-toggle="modal" data-target="#add-track-promote" href="javascript:void(0)">--}}
{{--                                        Submit New Release--}}
{{--                                    </a>--}}
{{--                                </div>--}}
                                @include('pages.artists.artist-promote-your-track.artist-track.modal')
                            </div>
                            <div class="body__container">
                                <div class="left__container">
                                    <div class="side__titles">
                                        <div class="title__name">
                                            <h3>My Track</h3>
                                            <p>Step 1. <span id="inProgress">Add your release</span></p>
                                        </div>
                                        <div class="title__name">
                                            <h3>My Selection</h3>
                                            <p>Step 2. <span id="inComplete">Choose a campaign</span></p>
                                        </div>
                                        <div class="title__name">
                                            <h3>Activate your campaign</h3>
{{--                                            <h3>My messages</h3>--}}
                                            <p>Step 3 <span id="myMessage">Complete</span></p>
                                        </div>
{{--                                        <div class="title__name">--}}
{{--                                            <h3>My recap</h3>--}}
{{--                                            <p>Step 4 <span id="myRecap"></span></p>--}}
{{--                                        </div>--}}
                                        <div class="packageDec" id="standard_dec" style="display:none">
                                            <h3>Standard Info</h3>
                                            <p>The Basic Campaign includes <a href="https://upcomingsounds.com/" target="_blank">upcomingsounds.com</a> exposure and coverage for the next 45 days to all verified and Non verified curators.</p>
                                            <p>What to expect?</p>
                                            <p>You will receive free coverage (playlist placements, social media features, or shoutouts) and you will receive pro coverage offers from our verified curators.</p>
                                            <p>Your USC Credits will be refunded in case no offers or coverage are received from publications. You can resubmit, select individual curators, or even use them for another release.</p>
{{--                                            <p>{{\App\Templates\IMessageTemplates::STANDARD_DEC}} <a href="javascript:void(0)" target="_blank">Learn more</a></p>--}}
                                        </div>
                                        <div class="packageDec" id="advanced_dec" style="display:none">
                                            <h3>Advanced Info</h3>
                                            <p>The Advanced Campaign includes <a href="https://upcomingsounds.com/" target="_blank">upcomingsounds.com</a> exposure and coverage for the next 45 days to all verified and Non verified curators.</p>
                                            <p>7 Days placement on the upcoming sounds dashboard in the Trending section with 50% to 65% more visibility for influencers, media, curators, and other artists.</p>
                                            <p>What to expect?</p>
                                            <p>You will receive free coverage (playlist placements, social media features, or shoutouts) and you will receive pro coverage offers from our verified curators.</p>
                                            <p>Your USC Credits will be refunded in case no offers or coverage are received from publications. You can resubmit, select individual curators, or even use them for another release.</p>
{{--                                            <p>{{\App\Templates\IMessageTemplates::ADVANCED_DEC}} <a href="javascript:void(0)" target="_blank">Learn more</a></p>--}}
                                        </div>
                                        <div class="packageDec" id="pro_dec" style="display:none">
                                            <h3>Pro Info</h3>
                                            <p>The PRO Campaign *Top Pick Among Artists* includes <a href="https://upcomingsounds.com/" target="_blank">upcomingsounds.com</a> exposure and coverage for the next 45 days to all verified and Non verified curators.</p>
                                            <p>7 Days placement on the upcoming sounds dashboard in the Featured tracks (large thumbnail) section with 70% to 80% more visibility for influencers, media, curators, and other artists.</p>
                                            <p>What to expect?</p>
                                            <p>You will receive free coverage (playlist placements, social media features, or shoutouts) and you will receive pro coverage offers from our verified curators.</p>
                                            <p>Your USC Credits will be refunded in case no offers or coverage are received from publications. You can resubmit, select individual curators, or even use them for another release.</p>
{{--                                            <p>{{\App\Templates\IMessageTemplates::PRO_DEC}} <a href="javascript:void(0)" target="_blank">Learn more</a></p>--}}
                                        </div>
                                        <div class="packageDec" id="premium_dec" style="display:none">
                                            <h3>Premium Info</h3>
                                            <p>The Premium Campaign includes <a href="https://upcomingsounds.com/" target="_blank">upcomingsounds.com</a> exposure and coverage for the next 45 days to all verified and Non verified curators.</p>
                                            <p>7 Days placement on the upcoming sounds dashboard in the TOP BANNER DISPLAY section with 100% more visibility for influencers, media, curators, and other artists.</p>
                                            <p>What to expect?</p>
                                            <p>You will receive free coverage (playlist placements, social media features, or shoutouts) and you will receive pro coverage offers from our verified curators.</p>
                                            <p>Your USC Credits will be refunded in case no offers or coverage are received from publications. You can resubmit, select individual curators, or even use them for another release.</p>
{{--                                            <p>{{\App\Templates\IMessageTemplates::PREMIUM_DEC}} <a href="javascript:void(0)" target="_blank">Learn more</a></p>--}}
                                        </div>
                                    </div>
                                    <div class="progress__bar__container">
                                        <ul>
                                            <li class="active" id="icon1">
                                                <span class="upcomingIcon">
                                                    <img src="{{asset('images/upcoming_icon.png')}}">
                                                </span>
                                                <div class="faUnlock1 faPosition">
                                                    <i class="fa fa-unlock faUnlock"></i>
                                                </div>
{{--                                                <i class="fa fa-unlock-alt"></i>--}}
                                            </li>
                                            <li id="icon2">
                                                <span class="upcomingIcon">
                                                    <img src="{{asset('images/upcoming_icon.png')}}">
                                                </span>
                                                <div class="faUnlock2 faPosition">
                                                    <i class="fa fa-lock falock"></i>
                                                </div>
                                            </li>
                                            <li id="icon3">
                                                <span class="upcomingIcon">
                                                    <img src="{{asset('images/upcoming_icon.png')}}">
                                                </span>
                                                <div class="faUnlock3 faPosition">
                                                    <i class="fa fa-lock falock"></i>
                                                </div>
                                            </li>
{{--                                            <li id="icon4">--}}
{{--                                                <i class="fa fa-unlock-alt"></i>--}}
{{--                                            </li>--}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="right__container">
                                    <form method="POST" id="storeTrackCampaign" enctype="multipart/form-data">
                                        @csrf

                                        {{-- Step One Form --}}
                                        @include('pages.artists.artist-promote-your-track.form-wizard.step-one')

                                        {{-- Step Two Form --}}
                                        @include('pages.artists.artist-promote-your-track.form-wizard.step-two')

                                        {{-- Step Three Form --}}
                                        @include('pages.artists.artist-promote-your-track.form-wizard.step-three')


{{--                                        <fieldset class="active__form" id="form4">--}}
{{--                                            <div class="sub__title__container">--}}
{{--                                                <p>Step 4/4</p>--}}
{{--                                                <h2>Please select your budget</h2>--}}
{{--                                                <p>Please let us know budget for your project so yes are great that we can give--}}
{{--                                                    the right quote thanks</p>--}}
{{--                                            </div>--}}
{{--                                            <div class="input__container"><input type="range" min="10000" max="500000"--}}
{{--                                                                                value="250000" class="slider">--}}
{{--                                                <div class="output__value"></div>--}}
{{--                                                <div class="buttons">--}}
{{--                                                    <a class="m-b-md rounded addTrack prev__btn" onclick="prevForm();">Back</a>--}}
{{--                                                    <button type="submit" value="Submit" class="btn btn-sm rounded addTrack" onclick="nextForm();">Submit</button>--}}
{{--    --}}{{--                                                <a--}}
{{--    --}}{{--                                                    class="m-b-md rounded addTrack m-b-md rounded addTrack nxt__btn"  onclick="nextForm();">Next</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </fieldset>--}}
    {{--                                    <fieldset class="active__form" id="form5">--}}
    {{--                                        <div class="sub__title__container">--}}
    {{--                                            <p>Step 5/5</p>--}}
    {{--                                            <h2>Complete Submission</h2>--}}
    {{--                                            <p>Thanks for completing the form and for your time.Plss enter your email below--}}
    {{--                                                and submit the form</p>--}}
    {{--                                        </div>--}}
    {{--                                        <div class="input__container"><label for="Email">Enter your email</label> <input--}}
    {{--                                                type="text">--}}
    {{--                                            <div class="buttons"><a class="prev__btn" onclick="prevForm();">Back</a> <a--}}
    {{--                                                    class="m-b-md rounded addTrack nxt__btn" id="submitBtn" onclick="nextForm();">Next</a></div>--}}
    {{--                                        </div>--}}
    {{--                                    </fieldset>--}}
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="selectionSHow"></div>
                        <div id="selectionVerifiedCuratorSHow"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('pages.artists.artist-promote-your-track.generic_model')
    <!-- ############ PAGE END-->
@endsection

@section('page-script')
    <script>
        var preload = document.getElementById("loadings");
        function loader(){
            preload.style.display='none';
        }
        function showLoader(){
            preload.style.display='block';
        }

        function publicProfileCurator(id)
        {
            let url = $('#curatorPublicProfile'+id).data('value');
            window.open(
                url,
                '_blank' // <- This is what makes it open in a new window.
            );
        }

        function publicProfilePictureCurator(id)
        {
            let url = $('#curatorPublicProfilePic'+id).data('value');
            window.open(
                url,
                '_blank' // <- This is what makes it open in a new window.
            );
        }
    </script>
    <script>
        $('.audioCover').change(function(e){
            e.preventDefault();
            var $box = $(this);
            if($box.is(':checked'))
            {
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                $(group).prop('checked', false);
                $box.prop("checked", true);
            }else {
                $box.prop("checked", false);
            }
        });

        $('.releaseTypeModal').change(function(e){
            e.preventDefault();
            var $box = $(this);
            if($box.is(':checked'))
            {
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                $(group).prop('checked', false);
                $box.prop("checked", true);
            }else {
                $box.prop("checked", true);
            }
        });
        $('.permissionCopyright').change(function(e){
            e.preventDefault();
            var $box = $(this);
            if($box.is(':checked'))
            {
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                $(group).prop('checked', false);
                $box.prop("checked", true);
            }else {
                $box.prop("checked", false);
            }
        });

        $(document).ready(function(){
            $(".slide-toggle").click(function(){
                $(".interestShow").animate({
                    height: "toggle"
                });
            });
        });

        document.getElementById('update_track_not').addEventListener('click', function (){
            $('#ddTrackPromote').trigger("reset");
            // location.reload();
        });
    </script>
    <script>
        function getId(url) {
            var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            var match = url.match(regExp);

            if (match && match[2].length == 11) {
                return match[2];
            } else {
                return 'error';
            }
        }
        // View Track
        function viewTrack(track_id){
            showLoader();
            $.ajax({
                type: "GET",
                url: '{{url('/view-track')}}/' + track_id,
                dataType: 'JSON',
                success:function (data){

                    loader();
                    $('#track_view_song').trigger("reset");

                    $('#trackTitle').val(data.artist_track.name);
                    $('#dateViewpicker').val(data.artist_track.release_date);
                    $('#trueUrlView').val(data.artist_track.youtube_soundcloud_url);

                    if(data.artist_track.youtube_soundcloud_url.includes('https://www.youtube.com/watch') || data.artist_track.youtube_soundcloud_url.includes('https://www.youtube.com/embed/') || data.artist_track.youtube_soundcloud_url.includes('https://w.soundcloud.com/')) {
                        var match = data.artist_track.youtube_soundcloud_url.match(/watch|embed|soundcloud/g);
                        if (match[0].indexOf("watch") !== -1) {
                            var res = getId(data.artist_track.youtube_soundcloud_url);
                            document.querySelector('#previewView').innerHTML = "";
                            document.querySelector('#previewView').innerHTML = '<iframe width="320" height="315" src="https://www.youtube.com/embed/' + res + '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                        } else if (match[0].indexOf("soundcloud") !== -1) {
                            document.querySelector('#previewView').innerHTML = "";
                            document.querySelector('#previewView').innerHTML = data.artist_track.youtube_soundcloud_url;
                        } else if (match[0].indexOf("embed") !== -1) {
                            document.querySelector('#previewView').style.display = 'block';
                            document.querySelector('#previewView').innerHTML = "";
                            document.querySelector('#previewView').innerHTML = data.artist_track.youtube_soundcloud_url;

                        }
                    }
                    else {
                        document.querySelector('#previewView').style.display = 'none';
                    }

                    $('#spotifyTrackViewUrl').val(data.artist_track.spotify_track_url);

                }
            });
        }

        // promote track
        function artistTrack(id)
        {
            $('.item').removeClass('item_artist');
            $('#promoteArtistItem_'+id).addClass('item_artist');

            $('.oneTrackSelected').prop('checked', false);
            $('#oneTrackSelected_'+id).prop('checked', true);

            $('#firstStepBtn').addClass('firstStepBtn');
            $('#firstStepBtnCampaign').css('display','none');
            $('#firstStepBtn').css('display','block');
            $('#firstStepBtn').html('Promote Your TracK');

            $('#ArtistTrack').val('');
            $('#ArtistTrack').val(id);
        }
        $(document).ready(function(){
            $('.oneTrackSelected').click(function() {
                $('.oneTrackSelected').not(this).prop('checked', false);
            });
        });

        // budget yes or not
        function budgetMind(status)
        {
            if(status == 'yes')
            {
                $('#notTitle').css('display', 'none');
                $('#yesTitle').css('display', 'inline-block');

                $('#budgetMindNot').removeClass('itemNot');
                $('#budgetMindYes').addClass('itemYes');
                $('.budgetNot').prop('checked', false);
                $('.budgetYes').prop('checked', true);

                // check if true campaign change buttons
                $('.rightNowClass').css('display', 'none');
                $('.twoStep').css('display', 'block');

            }
            if(status == 'not')
            {
                $('#yesTitle').css('display', 'none');
                $('#notTitle').css('display', 'block');

                $('#budgetMindYes').removeClass('itemYes');
                $('#budgetMindNot').addClass('itemNot');
                $('.budgetYes').prop('checked', false);
                $('.budgetNot').prop('checked', true);

                // check if true campaign change buttons
                $('.twoStep').css('display', 'none');
                $('.rightNowClass').css('display', 'block');
            }
        }
        // step 2 artist track
        function stepTwoReceivedTrack()
        {
            $('.selection_media').removeClass('step_media');
            $('.selection_establish').removeClass('step_establish');

            $('#receivedDetails1').addClass('step_received');

            // $('.oneTrackSelected').prop('checked', false);
            // $('#get_visibility').prop('checked', false);
            // $('#get_establish').prop('checked', false);

            // $('#received_details').prop('checked', true);

            // get value of recieved
            let recieved_check = $('#received_details').val();
            console.log(recieved_check);

            $.ajax({
                type: "GET",
                url: '{{url('/get-curators')}}',
                data: {
                    recieved_check: recieved_check,
                },
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        $('#get_visibility').prop('checked', false);
                        $('#get_establish').prop('checked', false);

                        $('#received_details').prop('checked', true);

                        $('#rightNowID').attr('data-id',recieved_check);
                        // toastr.success(data.success);
                    }
                    // if (data.error) {
                    //     document.getElementById('redPriceError').innerHTML = data.error;
                    //     setTimeout(function () {
                    //         document.getElementById('redPriceError').innerHTML = '';
                    //     }, 3000);
                    // }
                },
            });
        }

        function stepTwoMediaTrack()
        {
            $('.selection_received').removeClass('step_received');
            $('.selection_establish').removeClass('step_establish');

            $('#getVisibility1').addClass('step_media');

            // $('.oneTrackSelected').prop('checked', false);
            // $('#received_details').prop('checked', false);
            // $('#get_establish').prop('checked', false);

            // $('#get_visibility').prop('checked', true);

            // get value of visibility
            let visibility_check = $('#get_visibility').val();

            console.log(visibility_check);
            $.ajax({
                type: "GET",
                url: '{{url('/get-curators')}}',
                data: {
                    visibility_check: visibility_check,
                },
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        $('#received_details').prop('checked', false);
                        $('#get_establish').prop('checked', false);

                        $('#get_visibility').prop('checked', true);
                        $('#rightNowID').attr('data-id',visibility_check);
                        // toastr.success(data.success);
                    }

                },
            });
        }

        function stepTwoEstablishTrack()
        {
            $('.selection_media').removeClass('step_media');
            $('.selection_received').removeClass('step_received');

            $('#buildProfessional1').addClass('step_establish');

            // $('#received_details').prop('checked', false);
            // $('#get_visibility').prop('checked', false);
            // $('#get_establish').prop('checked', true);

            // get value of establish
            let establish_check = $('#get_establish').val();
            console.log(establish_check);
            $.ajax({
                type: "GET",
                url: '{{url('/get-curators')}}',
                data: {
                    establish_check: establish_check,
                },
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        $('#received_details').prop('checked', false);
                        $('#get_visibility').prop('checked', false);
                        $('#get_establish').prop('checked', true);

                        $('#rightNowID').attr('data-id',establish_check);
                        // toastr.success(data.success);
                    }

                },
            });
        }

        $('#receivedDetails1').click(function ()
        {
            $(this).find('input[type=checkbox]').prop("checked", !$(this).find('input[type=checkbox]').prop("checked"));
        });
        $('#getVisibility1').click(function ()
        {
            $(this).find('input[type=checkbox]').prop("checked", !$(this).find('input[type=checkbox]').prop("checked"));
        });
        $('#buildProfessional1').click(function ()
        {
            $(this).find('input[type=checkbox]').prop("checked", !$(this).find('input[type=checkbox]').prop("checked"));
        });

        // choose package js
        function choosePackage(package)
        {
            if(package == "standard")
            {
                $('.selection_advanced').removeClass('step_advanced');
                $('.selection_pro').removeClass('step_pro');
                $('.selection_premium').removeClass('step_premium');

                // show package info
                $('#standard_dec').css('display','block');
                $('#advanced_dec').css('display','none');
                $('#pro_dec').css('display','none');
                $('#premium_dec').css('display','none');


                $('#cStandard').addClass('step_standard');


                $(this).find('input[type=checkbox]').prop("checked", !$(this).find('input[type=checkbox]').prop("checked"));

                $('#get_advanced').prop('checked', false);
                $('#get_pro').prop('checked', false);
                $('#get_premium').prop('checked', false);

                $('#get_standard').prop('checked', true);

                // add use credit
                $('.uscCredit').val('{{ App\Templates\IPackages::STANDARD_USC }}');
            }else if(package == "advanced"){
                $('.selection_standard').removeClass('step_standard');
                $('.selection_pro').removeClass('step_pro');
                $('.selection_premium').removeClass('step_premium');

                // show package info
                $('#advanced_dec').css('display','block');
                $('#standard_dec').css('display','none');
                $('#pro_dec').css('display','none');
                $('#premium_dec').css('display','none');

                $('#cAdvanced').addClass('step_advanced');

                $(this).find('input[type=checkbox]').prop("checked", !$(this).find('input[type=checkbox]').prop("checked"));

                $('#get_standard').prop('checked', false);
                $('#get_pro').prop('checked', false);
                $('#get_premium').prop('checked', false);

                $('#get_advanced').prop('checked', true);

                // add use credit
                $('.uscCredit').val('{{ App\Templates\IPackages::ADVANCED_FEATURED_USC }}');
            }else if(package == "pro"){
                $('.selection_standard').removeClass('step_standard');
                $('.selection_advanced').removeClass('step_advanced');
                $('.selection_premium').removeClass('step_premium');

                // show package info
                $('#pro_dec').css('display','block');
                $('#advanced_dec').css('display','none');
                $('#standard_dec').css('display','none');
                $('#premium_dec').css('display','none');

                $('#cPro').addClass('step_pro');

                $(this).find('input[type=checkbox]').prop("checked", !$(this).find('input[type=checkbox]').prop("checked"));

                $('#get_standard').prop('checked', false);
                $('#get_advanced').prop('checked', false);
                $('#get_premium').prop('checked', false);

                $('#get_pro').prop('checked', true);

                // add use credit
                $('.uscCredit').val('{{ App\Templates\IPackages::PRO_USC }}');

            }else if(package == "premium"){
                $('.selection_standard').removeClass('step_standard');
                $('.selection_advanced').removeClass('step_advanced');
                $('.selection_pro').removeClass('step_pro');

                // show package info
                $('#premium_dec').css('display','block');
                $('#pro_dec').css('display','none');
                $('#advanced_dec').css('display','none');
                $('#standard_dec').css('display','none');

                $('#cPremium').addClass('step_premium');

                $(this).find('input[type=checkbox]').prop("checked", !$(this).find('input[type=checkbox]').prop("checked"));

                $('#get_standard').prop('checked', false);
                $('#get_advanced').prop('checked', false);
                $('#get_pro').prop('checked', false);

                $('#get_premium').prop('checked', true);

                // add use credit
                $('.uscCredit').val('{{ App\Templates\IPackages::PREMIUM_USC }}');

            }
        }
        // choose package js
    </script>
    <script>
        function selectSelection()
        {
            // toastr.error('work is pending');
            // return false;
            // check value curator check
            // let received_check = $('.stepTwoReceived').is(':checked');
            // let visibility_check = $('.stepTwoVisibility').is(':checked');
            // let establish_check = $('.stepTwoEstablish').is(':checked');
            //
            // if(received_check == false && visibility_check == false && establish_check == false)
            // {
            //     toastr.error('Please Select Right Now');
            //     return false;
            // }

            let payNow = $('.budgetYes').is(':checked');
            let budgetNot = $('.budgetNot').is(':checked');

            if(payNow == false && budgetNot == false)
            {
                toastr.error('Please select any activate your campaign');
                return  false;
            }

            var right_now_id =  $('#rightNowID').attr('data-id');
            showLoader();
            $.ajax({
                type: "GET",
                url: '{{url('/get-curators')}}',
                data: {
                    right_now_check: 'right_now_check',
                    right_now_id: right_now_id,
                },
                dataType: 'json',
                success: function (data) {
                    loader();
                    if (data.success) {
                        toastr.success(data.success);
                        $('#selectionHide').hide();
                        $('#selectionSHow').append(data.curators);

                        var artist_id = $('#ArtistTrack').val();
                        $('#artistTrackSelectedID').val('');
                        $('#artistTrackSelectedID').val(artist_id);
                    }

                },
            });
        }

        function prevSelectedCuratorForm()
        {
            $('#selectionSHow').html('');
            $('#selectionHide').show();
            selectedInputValuesObject = {};
            inputValuesObject = {};
            contributionValuesObject = {};

        }
        function prevChangeSelectedCuratorForm()
        {
            $('#selectionVerifiedCuratorSHow').html('');
            $('#selectionHide').hide();
            $('#selectionSHow').show();

        }
    </script>
    <script>
        // const nxtBtn = document.querySelector('#submitBtn');
        const form1 = document.querySelector('#form1');
        const form2 = document.querySelector('#form2');
        const form3 = document.querySelector('#form3');
        const form4 = document.querySelector('#form4');
        const form5 = document.querySelector('#form5');


        const icon1 = document.querySelector('#icon1');
        const icon2 = document.querySelector('#icon2');
        const icon3 = document.querySelector('#icon3');
        // const icon4 = document.querySelector('#icon4');
        // const icon5 = document.querySelector('#icon5');


        var viewId = 1;

        function nextForm(status) {
            if(status === 'step_one')
            {
                // check value track come
                let track_id = $('.oneTrackSelected').is(':checked');
                if(track_id == false)
                {
                    toastr.error('Select or add your new release if you haven`t already.');
                    return false;
                }
            }

            if(status === 'step_two')
            {
                // check value curator check
                // let received_check = $('.stepTwoReceived').is(':checked');
                // let visibility_check = $('.stepTwoVisibility').is(':checked');
                // let establish_check = $('.stepTwoEstablish').is(':checked');
                //
                // // check right now
                // if(received_check == false && visibility_check == false && establish_check == false)
                // {
                //     toastr.error('Please Select Right Now');
                //     return false;
                // }
                // check start campaign
                let payNow = $('.budgetYes').is(':checked');
                let budgetNot = $('.budgetNot').is(':checked');

                if(payNow == false && budgetNot == false)
                {
                    toastr.error('Please select any activate your campaign');
                    return  false;
                }
            }

            if(status === 'step_three')
            {
                let standard_check = $('.stepThreeStandard').is(':checked');
                let advanced_check = $('.stepThreeAdvanced').is(':checked');
                let pro_check = $('.stepThreePro').is(':checked');
                let premium_check = $('.stepThreePremium').is(':checked');

                // check Package now
                if(standard_check == false && advanced_check == false && pro_check == false && premium_check == false)
                {
                    toastr.error('Please Select Any Package');
                    return false;
                }

                showLoader();
                let form = document.getElementById('storeTrackCampaign');
                var formData = new FormData(form)
                $.ajax({
                    type: "POST",
                    url: '{{route('store.Track.Campaign')}}',
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData:false,
                    // beforeSend: function() {
                    //
                    //     $('.threeStep').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="sr-only" id="nowPay">Loading...</span></div> Please Wait....');
                    //     $('.threeStep').attr('disabled','');
                    //
                    // },
                    success: function (data) {
                        loader();
                        if (data.success) {
                            // $('.threeStep').removeAttr('disabled');
                            // $('.threeStep').empty("");
                            toastr.success(data.success);
                            window.location = '{{ URL::to('/campaigns') }}';
                        }
                        if (data.error) {
                            toastr.error(data.error);
                            window.open('{{ URL::to('/wallet') }}', '_blank');
                        }
                    },
                });
                return false;
                // $('#selectionHide').show();
            }

            if(status === 'verified_content_curator')
            {
                // verified_content_curator is empty
                let verifiedCoverageIDS = $('#verifiedCoverageIDS').val();

                if(!verifiedCoverageIDS)
                {
                    toastr.error('Please select any verified coverage of curator');
                    return  false;
                }
                var track_id = $('#artistTrackSelectedID').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                showLoader();
                $.ajax({
                    type: "POST",
                    url: '{{route('get.selected-verified-coverage.curator')}}',
                    data: {
                        track_id: track_id,
                        verifiedCoverageIDS : verifiedCoverageIDS
                    },
                    dataType: 'json',
                    success: function (data) {
                        loader();
                        if (data.success) {
                            toastr.success(data.success);
                            $('#selectionHide').hide();
                            $('#selectionSHow').hide();
                            $('#selectionVerifiedCuratorSHow').append(data.selectedVerifiedCurators);
                            return false;
                        }
                        if (data.error)
                        {
                            toastr.error(data.error);
                            return false;
                        }
                    },
                });
                return  false;
            }

            // final_verified_content_curator
            if(status === 'final_verified_content_curator')
            {
                // verified_content_curator is empty
                let verifiedCoverageIDS = $('#verifiedCoverageIDS').val();

                if(!verifiedCoverageIDS)
                {
                    toastr.error('Please select any verified coverage of curator');
                    return  false;
                }

                var track_id = $('#artistTrackSelectedID').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                showLoader();
                $.ajax({
                    type: "POST",
                    url: '{{route('final-pay.selected-verified-coverage.curator')}}',
                    data: {
                        track_id: track_id,
                        verifiedCoverageIDS : verifiedCoverageIDS
                    },
                    dataType: 'json',
                    success: function (data) {
                        loader();
                        if (data.success) {
                            toastr.success(data.success);
                            window.location = '{{ URL::to('/verified-content-creator') }}';
                            return false;
                        }
                        if (data.error)
                        {
                            toastr.error(data.error);
                            return false;
                        }
                        if (data.error_wallet)
                        {
                            toastr.error(data.error_wallet);
                            var one_usc_currency = 'gbp';
                            var one_usc_package = '1 USC';

                            showLoader();
                            $.ajax({
                                type: 'POST',
                                url: '{{url('checkout')}}',
                                data: {
                                    requestFrom: 'oneUSC',
                                    amount_USC: data.amount_USC,
                                    price: data.amount_USC,
                                    currency: one_usc_currency,
                                    contacts: data.amount_USC,
                                    package: one_usc_package,
                                },
                                success:function (data){
                                    loader();
                                    window.open('{{ URL::to('/artist-checkout') }}', '_blank');
                                    return false;
                                    // window.location.href = "/artist-checkout";
                                },
                            });
                            return false;
                        }
                    },
                });
                return  false;
            }

            // let track_id = $('#received_details').is(':checked');
            // console.log(track_id);
            // if(track_id == false)
            // {
            //     toastr.error('Please Select Track');
            //     return false;
            // }

            viewId = viewId + 1;
            progressBar();
            displayForms();

            console.log(viewId);

        }

        function prevForm() {
            console.log("helloprev");
            viewId = viewId - 1;
            console.log(viewId);
            progressBar1();
            displayForms();
        }

        function progressBar1() {
            if (viewId === 1) {
                // alert('viewId1');
                icon2.classList.add('active');
                icon2.classList.remove('active');
                icon3.classList.remove('active');
                // icon4.classList.remove('active');
                // icon5.classList.remove('active');
            }
            if (viewId === 2) {
                // alert('viewId1');
                icon2.classList.add('active');
                icon3.classList.remove('active');
                // icon4.classList.remove('active');
                // icon5.classList.remove('active');
            }
            if (viewId === 3) {
                // alert('viewId3');
                icon3.classList.add('active');
                // icon4.classList.remove('active');
                // icon5.classList.remove('active');
            }
            if (viewId === 4) {
                // alert('viewId4');
                // icon4.classList.add('active');
                // icon5.classList.remove('active');
            }
            // if (viewId === 5) {
            //     alert('viewId5');
            //     icon5.classList.add('active');
            //     nxtBtn.innerHTML = "Submit"
            // }
            if (viewId > 4) {
                // alert('viewId5');
                icon2.classList.remove('active');
                icon3.classList.remove('active');
                // icon4.classList.remove('active');
                // icon5.classList.remove('active');

            }
        }

        function progressBar() {
            if (viewId === 2) {
                // alert('viewId2');
                icon2.classList.add('active');
                $('.faUnlock2').empty();
                $('.faUnlock2').html('<i class="fa fa-unlock faUnlock"></i>')
            }
            if (viewId === 3) {
                // alert('viewId3');
                icon3.classList.add('active');
                $('.faUnlock3').empty();
                $('.faUnlock3').html('<i class="fa fa-unlock faUnlock"></i>')
            }
            if (viewId === 4) {
                // alert('viewId4');
                // icon4.classList.add('active');
            }
            // if (viewId === 5) {
            //     alert('viewId5');
            //     icon5.classList.add('active');
            //     nxtBtn.innerHTML = "Submit"
            // }
            if (viewId > 4) {
                // alert(viewId);
                icon2.classList.remove('active');
                icon3.classList.remove('active');
                // icon4.classList.remove('active');
                // icon5.classList.remove('active');

            }
        }

        function displayForms() {

            if (viewId > 4) {
                viewId = 1;
            }

            if (viewId === 1) {

                // document.getElementById('inProgress').innerHTML = 'In progress';
                form1.style.display = 'block';

                form2.style.display = 'none';
                // document.getElementById('inComplete').innerHTML = 'Complete'

                form3.style.display = 'none';
                // form4.style.display = 'none';
                // form5.style.display = 'none';

            } else if (viewId === 2) {

                // document.getElementById('inProgress').innerHTML = 'Modify'
                form1.style.display = 'none';

                // document.getElementById('inComplete').innerHTML = 'In progress'
                form2.style.display = 'block';

                // document.getElementById('myMessage').innerHTML = 'Complete'
                form3.style.display = 'none';

                // form4.style.display = 'none';
                // form5.style.display = 'none';

            } else if (viewId === 3) {
                form1.style.display = 'none';

                // document.getElementById('inComplete').innerHTML = 'Modify'
                form2.style.display = 'none';

                // document.getElementById('myMessage').innerHTML = 'In progress'
                form3.style.display = 'block';
                // form4.style.display = 'none';
                // form5.style.display = 'none';
            } else if (viewId === 4) {
                form1.style.display = 'none';
                form2.style.display = 'none';

                // document.getElementById('myMessage').innerHTML = 'Modify'
                form3.style.display = 'none';

                // document.getElementById('myRecap').innerHTML = 'Complete'
                // form4.style.display = 'block';
                // form5.style.display = 'none';

            }
            // else if (viewId === 5) {
            //     form1.style.display = 'none';
            //     form2.style.display = 'none';
            //     form3.style.display = 'none';
            //     form4.style.display = 'none';
            //     form5.style.display = 'block';
            //
            // }
        }

        // for slider

        // var slider = document.querySelector(".slider");
        // var output = document.querySelector(".output__value");
        // output.innerHTML = slider.value;
        //
        // slider.oninput = function () {
        //     output.innerHTML = this.value;
        // }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="{{asset('js/gijgo.min.js')}}"></script>
    <script>
        var dateToday = new Date();
        $('#datepickerPromoteDate').datepicker({
            iconsLibrary: 'fontawesome',
            format: "yyyy-mm-dd",
            // minDate: dateToday
        });
    </script>
    <script type="text/javascript">

        $(document).ready(function(){

            var counter = 2;

            $("#addLinkButton").click(function () {

                if(counter>5){
                        alert("Only 5 textboxes allow");
                        return false;
                }

                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter);

                newTextBoxDiv.after().html('<label class="control-label form-control-label text-muted">Add New Link #'+ counter +'</label>' +
                    '<div class="addEmbeded"><div class="addMoreLinks"><input type="text" class="form-control moreLinks" name="link[]" id="textbox' + counter + '" value="" placeholder="Please Add Embeded Url"></div><div class="previewStart"><a href="javascript:void(0)" class="textbox' + counter + '" id="previewIcon" onclick="getInputValue(this)"><i class="fa fa-eye"></i> preview</a></div></div>');

                newTextBoxDiv.appendTo("#TextBoxesGroup");


                counter++;
             });

             $("#removeButton").click(function () {
                if(counter==2){
                    alert("No more textbox to remove");
                    return false;
                }

                counter--;

                $("#TextBoxDiv" + counter).remove();

             });
    });

    function removeStyle(objfield) {
        objfield.style.borderColor = "";
        objfield.style.border = "";
    }

    function  getInputValue(elem) {

        let src = document.getElementById(elem.className).value
        if (src === "") {
            toastr.error('Please Add url embeded');
            return false;
        }

        var match_link = src.match(/iframe/g);
        // var match_link = src.match(/embed|w.soundcloud.com|bandcamp|widget/g);

        if(match_link == null)
        {
            toastr.error('Please Add correct url embeded');
            return false;
        }

        if(src){
            document.querySelector('#previewLinkBlock').style.display = 'block';
            document.querySelector('#previewLink').innerHTML = "";
            document.querySelector('#previewLink').innerHTML = src;
        }else{
            toastr.error('Please Add correct url embeded');
            return false;
        }

    }
    </script>
<script>
    // Image Track Song Preview
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('imgTrackPreview').setAttribute('src', e.target.result );
                $('#imgTrackPreview').hide();
                $('#imgTrackPreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageTrackUpload").change(function () {
        readURL(this);
    });


    // audio track
    function readAudioURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('audioTrackPreview').setAttribute('src', e.target.result );
                $('#audioTrackPreview').hide();
                $('#audioTrackPreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#audioTrackUpload").change(function () {
        readAudioURL(this);
    });
</script>
    <script src="{{asset('js/custom/artist/verified-coverage.js')}}"></script>
    <script>
        function coverageVerifiedOpen(verified_coverage_id)
        {
            var linkRedirect = $('#coverageVerifiedID'+verified_coverage_id).data('link');
            console.log(verified_coverage_id);
            console.log(linkRedirect);
            console.log(window.location.origin);
            window.open(
                linkRedirect,
                '_blank' // <- This is what makes it open in a new window.
            );
        }
    </script>
@endsection

