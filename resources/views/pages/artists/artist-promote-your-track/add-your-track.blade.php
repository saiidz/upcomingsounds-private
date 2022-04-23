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
                                    <fieldset id="form1">
                                        <div class="sub__title__container ">
                                            <p>Step 1/4</p>
                                            <h2>Start by adding your track or select one if you have already!</h2>
                                            <p class="m-b-md">you're one step closer to spreading your art to the world,
                                            continue by adding a new track and filling in the required info.</p>
                                            <a class="m-b-md rounded addTrack" href="{{url('/artist-profile')}}#add-track">
                                               Add New track
                                            </a>
                                        </div>

                                        <div class="input__container">
                                            <div class="row item-list item-list-md m-b">
                                                @if(count($artist_tracks) > 0)
                                                    @foreach($artist_tracks as $track)
                                                        <div class="col-sm-6">
                                                            <div class="item r" data-id="item-5">
                                                                <div class="item-media">
                                                                    @if(!empty($track->track_thumbnail))
                                                                        <a href="javascript:void(0)" class="item-media-content" onclick="viewTrack({{$track->id}})" data-toggle="modal" data-target="#view-track"
                                                                           style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$track->track_thumbnail}});"></a>
                                                                    @else
                                                                        <a href="javascript:void(0)" class="item-media-content" onclick="viewTrack({{$track->id}})" data-toggle="modal" data-target="#view-track"
                                                                           style="background-image: url({{asset('images/b4.jpg')}});"></a>
                                                                    @endif
                                                                </div>
                                                                <div class="item-info">
                                                                    <div class="item-title bottom text-right">
                                                                        <input type="checkbox" class="oneTrackSelected" value="{{$track->id}}" name="track_id" />
                                                                    </div>
                                                                    <div class="item-title text-ellipsis">
                                                                        <div>{{$track->name}}</div>
                                                                    </div>
                                                                    <div class="item-author text-sm text-ellipsis ">
                                                                        <div class="text-muted">{{($user_artist->name) ? $user_artist->name : ''}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="col-sm-6">
                                                        <div class="item r" data-id="item-5">
                                                            Not Found
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <a class="m-b-md rounded addTrack nxt__btn" onclick="nextForm();"> Next</a>
                                        </div>
                                    </fieldset>
                                    <fieldset class="active__form" id="form2">
                                        <div class="sub__title__container">
                                            <p>Step 2/4</p>
                                            <h2>Right now... What are you looking for?</h2>
                                            <p>Choosing any of these options will let us guide you to the media outlets, curators, and music professionals who best meet your needs. At UpcomingSounds, we guarantee that they'll listen to your track and give you feedback. If your music catches their attention, they are likely to share it or contact you!!</p>
                                            <span class="text-muted">Your answer is private and will not be shared with influencers.</span>
                                        </div>
                                        <div class="input__container">
                                            <div class="selection newB" id="receivedDetails1">
                                                <div class="imoji">
                                                    <img src="{{asset('images/objective_coaching.png')}}">
{{--                                                    <ion-icon name="happy"></ion-icon>--}}
                                                </div>
                                                <div class="descriptionTitle">
                                                    <h3>Receive Detailed Advice</h3>
                                                    <p>I'm looking for professional feedback for my project and demos, allowing me to know what to improve: arrangement, mixing, production, visual content.</p>
                                                </div>
                                                <div class="item-title bottom text-right form2CheckedBox">
                                                    <input type="checkbox" name="received_details" />
                                                </div>
                                            </div>
                                            <div class="selection exitB" id="getVisibility1">
                                                <div class="imoji">
                                                    <img src="{{asset('images/objective_visibility.png')}}">
{{--                                                    <ion-icon name="business"></ion-icon>--}}
                                                </div>
                                                <div class="descriptionTitle">
                                                    <h3>Get Media Coverage and Social Exposure </h3>
                                                    <p>I'm looking for  youtube upload, playlists placement, radio broadcasts, social media posts /stories, shares, or reviews from media outlets</p>
                                                </div>
                                                <div class="item-title bottom text-right form2CheckedBox">
                                                    <input type="checkbox"  name="get_visibility" />
                                                </div>
                                            </div>
                                            <div class="selection exitB" id="buildProfessional1">
                                                <div class="imoji">
                                                    <img src="{{asset('images/objective_partnerships.png')}}">
{{--                                                    <ion-icon name="business"></ion-icon>--}}
                                                </div>
                                                <div class="descriptionTitle">
                                                    <h3>Establish my Professorial Music Career</h3>
                                                    <p>I'm looking for record deals with labels, booking agents, publishers, and music supervisors (in charge of placing music in movies or TV commercials).</p>
                                                </div>
                                                <div class="item-title bottom text-right form2CheckedBox">
                                                    <input type="checkbox"  name="get_visibility" />
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

        $(document).ready(function(){
            $('.oneTrackSelected').click(function() {
                $('.oneTrackSelected').not(this).prop('checked', false);
            });
        });

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
            console.log("hellonext");
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

