@extends('pages.artists.panels.layout')

{{-- page title --}}
@section('title','Add Your Track')

@section('page-style')
    <link rel="stylesheet" href="{{asset('css/custom/add-your-track.css')}}" type="text/css"/>
@endsection

@section('content')
    <!-- ############ PAGE START-->

    <div class="page-content">

        <div class="padding p-b-0">
            <div class="row row-sm item-masonry item-info-overlay">
                <div class="col-sm-12 text-white m-b-sm">
                    <div class="form__container">
                        <div class="title__container">
                            <h1>Add your track</h1>
                            <div class="separator"></div>
                            <a class="m-b-md rounded addTrack" data-toggle="modal" data-target="#add-track-promote" href="javascript:void(0)">
                                Add New track
                             </a>
                        </div>
                        <div class="body__container">
                            <div class="left__container">
                                <div class="side__titles">
                                    <div class="title__name">
                                        <h3>My track</h3>
                                        <p>Step 1. <span id="inProgress">In progress</span></p>
                                    </div>
                                    <div class="title__name">
                                        <h3>My selection</h3>
                                        <p>Step 2. <span id="inComplete">Complete</span></p>
                                    </div>
                                    <div class="title__name">
                                        <h3>My messages</h3>
                                        <p>Step 3 <span id="myMessage"></span></p>
                                    </div>
                                    <div class="title__name">
                                        <h3>My recap</h3>
                                        <p>Step 4 <span id="myRecap"></span></p>
                                    </div>
                                </div>
                                <div class="progress__bar__container">
                                    <ul>
                                        <li class="active" id="icon1">
                                            <i class="fa fa-unlock-alt"></i>
                                        </li>
                                        <li id="icon2">
                                            <i class="fa fa-unlock-alt"></i>
                                        </li>
                                        <li id="icon3">
                                            <i class="fa fa-unlock-alt"></i>
                                        </li>
                                        <li id="icon4">
                                            <i class="fa fa-unlock-alt"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="right__container">
                                <form method="POST" action="{{url('store/track/campaign')}}" enctype="multipart/form-data">
                                    @csrf
                                    @include('pages.artists.artist-promote-your-track.form-wizard.step-one')
                                    <fieldset class="active__form" id="form2">
                                        <div class="sub__title__container">
                                            <p>Step 2/4</p>
                                            <h2>Right now... What are you looking for?</h2>
                                            <p>Choosing any of these options will let us guide you to the media outlets, curators, and music professionals who best meet your needs. At UpcomingSounds, we guarantee that they'll listen to your track and give you feedback. If your music catches their attention, they are likely to share it or contact you!!</p>
                                            <span class="text-muted">Your answer is private and will not be shared with influencers.</span>
                                        </div>
                                        <div class="input__container">
                                            <div class="selection selection_received newB" id="receivedDetails1" onclick="stepTwoReceivedTrack()">
                                                <div class="imoji">
                                                    <img src="{{asset('images/objective_coaching.png')}}">
{{--                                                    <ion-icon name="happy"></ion-icon>--}}
                                                </div>
                                                <div class="descriptionTitle">
                                                    <h3>Recieve Detailed Advice</h3>
                                                    <p>I'm looking for professional feedback for my project and demos in order to know what to improve: arrangement, mixing, production, visual content.</p>
                                                </div>
                                                <div class="item-title bottom text-right form2CheckedBox">
                                                    <input type="checkbox" name="received_details" id="received_details" value="1" />
                                                </div>
                                            </div>
                                            <div class="selection selection_media exitB" id="getVisibility1" onclick="stepTwoMediaTrack()">
                                                <div class="imoji">
                                                    <img src="{{asset('images/objective_visibility.png')}}">
{{--                                                    <ion-icon name="business"></ion-icon>--}}
                                                </div>
                                                <div class="descriptionTitle">
                                                    <h3>Get media coverage and social media exposure</h3>
                                                    <p>Specifically, I am looking for YouTube uploads, playlist placements, radio broadcasts, social media posts, or reviews from media outlets.</p>
                                                </div>
                                                <div class="item-title bottom text-right form2CheckedBox">
                                                    <input type="checkbox"  name="get_visibility" id="get_visibility" value="2" />
                                                </div>
                                            </div>
                                            <div class="selection selection_establish exitB" id="buildProfessional1" onclick="stepTwoEstablishTrack()">
                                                <div class="imoji">
                                                    <img src="{{asset('images/objective_partnerships.png')}}">
{{--                                                    <ion-icon name="business"></ion-icon>--}}
                                                </div>
                                                <div class="descriptionTitle">
                                                    <h3>Establish my Professorial Music Career</h3>
                                                    <p>It is my goal to secure record deals with labels, booking agents, publishers, and music supervisors (those who place music in movies or TV commercials).</p>
                                                </div>
                                                <div class="item-title bottom text-right form2CheckedBox">
                                                    <input type="checkbox" name="get_establish" id="get_establish" value="3"/>
                                                </div>
                                            </div>
                                            <div class="buttons"><a class="m-b-md rounded addTrack prev__btn" onclick="prevForm();">Back</a> <a
                                                    class="m-b-md rounded addTrack nxt__btn" onclick="nextForm();">Next</a></div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="active__form" id="form3">
                                        <div class="sub__title__container">
                                            <p>Step 3/4</p>
                                            <h2>What service are looking for ?</h2>
                                            <p>Please let us know what type of business best describes you as entreprenuer
                                                or businessman.</p>
                                        </div>
                                        <div class="input__container">
                                            <div class="selection newB">
                                                <div class="imoji">
                                                    <img src="{{asset('images/objective_partnerships.png')}}">
{{--                                                    <ion-icon name="desktop"></ion-icon>--}}
                                                </div>
                                                <div class="descriptionTitle">
                                                    <h3>Website Development</h3>
                                                    <p>Development of online websites</p>
                                                </div>
                                            </div>
                                            <div class="selection exitB">
                                                <div class="imoji">
                                                    <ion-icon name="phone-portrait"></ion-icon>
                                                </div>
                                                <div class="descriptionTitle">
                                                    <h3>Development of Mobile App</h3>
                                                    <p>Development of android and IOS mobile app</p>
                                                </div>
                                            </div>
                                            <div class="buttons"><a class="m-b-md rounded addTrack prev__btn" onclick="prevForm();">Back</a> <a
                                                    class="m-b-md rounded addTrack nxt__btn" onclick="nextForm();">Next</a></div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="active__form" id="form4">
                                        <div class="sub__title__container">
                                            <p>Step 4/4</p>
                                            <h2>Please select your budget</h2>
                                            <p>Please let us know budget for your project so yes are great that we can give
                                                the right quote thanks</p>
                                        </div>
                                        <div class="input__container"><input type="range" min="10000" max="500000"
                                                                             value="250000" class="slider">
                                            <div class="output__value"></div>
                                            <div class="buttons">
                                                <a class="m-b-md rounded addTrack prev__btn" onclick="prevForm();">Back</a>
                                                <button type="submit" value="Submit" class="btn btn-sm rounded addTrack" onclick="nextForm();">Submit</button>
{{--                                                <a--}}
{{--                                                    class="m-b-md rounded addTrack m-b-md rounded addTrack nxt__btn"  onclick="nextForm();">Next</a></div>--}}
                                        </div>
                                    </fieldset>
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
                </div>
            </div>
        </div>

    </div>

    @include('pages.artists.artist-promote-your-track.generic_model')
    <!-- ############ PAGE END-->
@endsection

@section('page-script')
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
        }
        $(document).ready(function(){
            $('.oneTrackSelected').click(function() {
                $('.oneTrackSelected').not(this).prop('checked', false);
            });
        });

        // step 2 artist track
        function stepTwoReceivedTrack()
        {
            $('.selection_media').removeClass('step_media');
            $('.selection_establish').removeClass('step_establish');

            $('#receivedDetails1').addClass('step_received');

            // $('.oneTrackSelected').prop('checked', false);
            $('#get_visibility').prop('checked', false);
            $('#get_establish').prop('checked', false);

            $('#received_details').prop('checked', true);

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
                        toastr.success(data.success);
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
            $('#received_details').prop('checked', false);
            $('#get_establish').prop('checked', false);

            $('#get_visibility').prop('checked', true);

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
                        window.location.reload();
                        toastr.success(data.success);
                    }

                },
            });
        }

        function stepTwoEstablishTrack()
        {
            $('.selection_media').removeClass('step_media');
            $('.selection_received').removeClass('step_received');

            $('#buildProfessional1').addClass('step_establish');

            $('#received_details').prop('checked', false);
            $('#get_visibility').prop('checked', false);
            $('#get_establish').prop('checked', true);

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
                        toastr.success(data.success);
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
        const icon4 = document.querySelector('#icon4');
        // const icon5 = document.querySelector('#icon5');


        var viewId = 1;

        function nextForm() {
            // check value track come
            let track_id = $('.oneTrackSelected').is(':checked');
            console.log(track_id);
            if(track_id == false)
            {
                toastr.error('Please Select Track');
                return false;
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
                icon4.classList.remove('active');
                // icon5.classList.remove('active');
            }
            if (viewId === 2) {
                // alert('viewId1');
                icon2.classList.add('active');
                icon3.classList.remove('active');
                icon4.classList.remove('active');
                // icon5.classList.remove('active');
            }
            if (viewId === 3) {
                // alert('viewId3');
                icon3.classList.add('active');
                icon4.classList.remove('active');
                // icon5.classList.remove('active');
            }
            if (viewId === 4) {
                // alert('viewId4');
                icon4.classList.add('active');
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
                icon4.classList.remove('active');
                // icon5.classList.remove('active');

            }
        }

        function progressBar() {
            if (viewId === 2) {
                // alert('viewId2');
                icon2.classList.add('active');
            }
            if (viewId === 3) {
                // alert('viewId3');
                icon3.classList.add('active');
            }
            if (viewId === 4) {
                // alert('viewId4');
                icon4.classList.add('active');
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
                icon4.classList.remove('active');
                // icon5.classList.remove('active');

            }
        }

        function displayForms() {

            if (viewId > 4) {
                viewId = 1;
            }

            if (viewId === 1) {

                document.getElementById('inProgress').innerHTML = 'In progress';
                form1.style.display = 'block';

                form2.style.display = 'none';
                document.getElementById('inComplete').innerHTML = 'Complete'

                form3.style.display = 'none';
                form4.style.display = 'none';
                // form5.style.display = 'none';

            } else if (viewId === 2) {

                document.getElementById('inProgress').innerHTML = 'Modify'
                form1.style.display = 'none';

                document.getElementById('inComplete').innerHTML = 'In progress'
                form2.style.display = 'block';

                document.getElementById('myMessage').innerHTML = 'Complete'
                form3.style.display = 'none';

                form4.style.display = 'none';
                // form5.style.display = 'none';

            } else if (viewId === 3) {
                form1.style.display = 'none';

                document.getElementById('inComplete').innerHTML = 'Modify'
                form2.style.display = 'none';

                document.getElementById('myMessage').innerHTML = 'In progress'
                form3.style.display = 'block';
                form4.style.display = 'none';
                // form5.style.display = 'none';
            } else if (viewId === 4) {
                form1.style.display = 'none';
                form2.style.display = 'none';

                document.getElementById('myMessage').innerHTML = 'Modify'
                form3.style.display = 'none';

                document.getElementById('myRecap').innerHTML = 'Complete'
                form4.style.display = 'block';
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

        var slider = document.querySelector(".slider");
        var output = document.querySelector(".output__value");
        output.innerHTML = slider.value;

        slider.oninput = function () {
            output.innerHTML = this.value;
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

@endsection

