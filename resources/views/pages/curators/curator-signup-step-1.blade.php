{{-- layout --}}
@extends('layouts.curator-guest')

{{-- page title --}}
@section('title','Taste Maker Signup')

{{-- page content --}}
@section('content')
    <div class="app-body">
        <div class="b-t">
            <div class="center-block text-center">
                <div class="p-a-md">
                    <div>
                        <h4><span class="saiidzeidan">Gary</span> from Upcoming Sounds</h4>
                        <p class="text-muted m-y">
                            Hey! Could you tell us more about you?
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div id="snackbar"></div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 curator_col">
                    <div class="cardcontainer curator_container">
                        <div class="photo"> <img src="{{asset('images/Illu.svg')}}">
                        </div>
                        <div class="content_artist">
                            <p class="Iam_artist">I'm an Influencer</p>
                            <p class="Iam_artist_detail">Fill in your artist profile and send your music to the curators and pros available on Upcoming Sounds</p>
                        </div>
                        <div class="artist_footer">
                            <a class="button transparent  tellMeMore siGnup1" href="{{route('curator.signup.step.2')}}?signup=influencer">Start</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 curator_col">
                    <div class="cardcontainer curator_container">
                        <div class="photo"> <img src="{{asset('images/curator_playlist.svg')}}">
                        </div>
                        <div class="content_artist">
                            <p class="Iam_artist">I'm an Playlist Curator</p>
                            <p class="Iam_artist_detail">Set up a profile for each one of your artists and send their tracks to the music curators & pros available on Upcoming Sounds</p>
                        </div>
                        <div class="artist_footer">
                            <a class="button transparent  tellMeMore siGnup1" href="{{route('curator.signup.step.2')}}?signup=playlist_curator">Start</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 curator_col">
                    <div class="cardcontainer curator_container">
                        <div class="photo"> <img src="{{asset('images/youtube.svg')}}">
                        </div>
                        <div class="content_artist">
                            <p class="Iam_artist">I'm an Youtube Channel</p>
                            <p class="Iam_artist_detail">Set up a profile for each one of your artists and send their tracks to the music curators & pros available on Upcoming Sounds</p>
                        </div>
                        <div class="artist_footer">
                            <a class="button transparent  tellMeMore siGnup1" href="{{route('curator.signup.step.2')}}?signup=youtube_channel">Start</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 curator_col">
                    <div class="cardcontainer curator_container">
                        <div class="photo"> <img src="{{asset('images/radio.svg')}}">
                        </div>
                        <div class="content_artist">
                            <p class="Iam_artist">I'm an Radio / TV</p>
                            <p class="Iam_artist_detail">Set up a profile for each one of your artists and send their tracks to the music curators & pros available on Upcoming Sounds</p>
                        </div>
                        <div class="artist_footer">
                            <a class="button transparent  tellMeMore siGnup1" href="{{route('curator.signup.step.2')}}?signup=radio_tv">Start</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 curator_col">
                    <div class="cardcontainer curator_container">
                        <div class="photo"> <img src="{{asset('images/Illu1.svg')}}">
                        </div>
                        <div class="content_artist">
                            <p class="Iam_artist">I'm an Record label / Manager</p>
                            <p class="Iam_artist_detail">Set up a profile for each one of your artists and send their tracks to the music curators & pros available on Upcoming Sounds</p>
                        </div>
                        <div class="artist_footer">
                            <a class="button transparent  tellMeMore siGnup1" href="{{route('curator.signup.step.2')}}?signup=label_manager">Start</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 curator_col">
                    <div class="cardcontainer curator_container">
                        <div class="photo"> <img src="{{asset('images/Illu1.svg')}}">
                        </div>
                        <div class="content_artist">
                            <p class="Iam_artist">I'm an Media</p>
                            <p class="Iam_artist_detail">Set up a profile for each one of your artists and send their tracks to the music curators & pros available on Upcoming Sounds</p>
                        </div>
                        <div class="artist_footer">
                            <a class="button transparent  tellMeMore siGnup1" href="{{route('curator.signup.step.2')}}?signup=media">Start</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 curator_col">
                    <div class="cardcontainer curator_container">
                        <div class="photo"> <img src="{{asset('images/Illu1.svg')}}">
                        </div>
                        <div class="content_artist">
                            <p class="Iam_artist">I'm an Monitor / Publisher / synch</p>
                            <p class="Iam_artist_detail">Set up a profile for each one of your artists and send their tracks to the music curators & pros available on Upcoming Sounds</p>
                        </div>
                        <div class="artist_footer">
                            <a class="button transparent  tellMeMore siGnup1" href="{{route('curator.signup.step.2')}}?signup=monitor_publisher_synch">Start</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 curator_col">
                    <div class="cardcontainer curator_container">
                        <div class="photo"> <img src="{{asset('images/Illu1.svg')}}">
                        </div>
                        <div class="content_artist">
                            <p class="Iam_artist">I'm an Journalist / Media</p>
                            <p class="Iam_artist_detail">Set up a profile for each one of your artists and send their tracks to the music curators & pros available on Upcoming Sounds</p>
                        </div>
                        <div class="artist_footer">
                            <a class="button transparent  tellMeMore siGnup1" href="{{route('curator.signup.step.2')}}?signup=journalist_media">Start</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 curator_col">
                    <div class="cardcontainer curator_container">
                        <div class="photo"> <img src="{{asset('images/Illu1.svg')}}">
                        </div>
                        <div class="content_artist">
                            <p class="Iam_artist">I'm an Brooker / Booking agent</p>
                            <p class="Iam_artist_detail">Set up a profile for each one of your artists and send their tracks to the music curators & pros available on Upcoming Sounds</p>
                        </div>
                        <div class="artist_footer">
                            <a class="button transparent  tellMeMore siGnup1" href="{{route('curator.signup.step.2')}}?signup=brooker_booking">Start</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 curator_col">
                    <div class="cardcontainer curator_container">
                        <div class="photo"> <img src="{{asset('images/Illu1.svg')}}">
                        </div>
                        <div class="content_artist">
                            <p class="Iam_artist">I'm an Sound expert / Producer</p>
                            <p class="Iam_artist_detail">Set up a profile for each one of your artists and send their tracks to the music curators & pros available on Upcoming Sounds</p>
                        </div>
                        <div class="artist_footer">
                            <a class="button transparent  tellMeMore siGnup1" href="{{route('curator.signup.step.2')}}?signup=sound_expert_producer">Start</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- page script --}}
@section('page-script')

@endsection
