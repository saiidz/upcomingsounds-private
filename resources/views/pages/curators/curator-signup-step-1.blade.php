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
                        <div class="photo"> <img src="{{asset('images/influencer.svg')}}">
                        </div>
                        <div class="content_artist">
                            <p class="Iam_artist"> Influencer</p>
                            <p class="Iam_artist_detail">Share music to your TikTok, Instagram or even repost on SoundCloud and start the next trend.  </p>
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
                            <p class="Iam_artist">Playlist Curator</p>
                            <p class="Iam_artist_detail"> Get fresh daily new music to your Spotify, Deezer, or apple music playlists.  </p>
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
                            <p class="Iam_artist">Youtube Channel</p>
                            <p class="Iam_artist_detail"> Make an impact, upload videos to your youtube channel share them with the world.</p>
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
                            <p class="Iam_artist">Radio / TV</p>
                            <p class="Iam_artist_detail">Sponsor or promote music on your programs or daily live shows. </p>
                        </div>
                        <div class="artist_footer">
                            <a class="button transparent  tellMeMore siGnup1" href="{{route('curator.signup.step.2')}}?signup=radio_tv">Start</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 curator_col">
                    <div class="cardcontainer curator_container">
                        <div class="photo"> <img src="{{asset('images/record_label.svg')}}">
                        </div>
                        <div class="content_artist">
                            <p class="Iam_artist">Record label / Manager</p>
                            <p class="Iam_artist_detail">Discover new talents, make record deals connect with bands and indie artists. </p>
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
                        <div class="photo"> <img src="{{asset('images/blog.svg')}}">
                        </div>
                        <div class="content_artist">
                            <p class="Iam_artist">Blog</p>
                            <p class="Iam_artist_detail"> Get daily content for your blog, create reviews and share new hits with some extra income. </p>
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
                            <p class="Iam_artist">Monitor / Publisher / sync</p>
                            <p class="Iam_artist_detail">work with the new talents, guide them to start their career, or help them sync or publish their art</p>
                        </div>
                        <div class="artist_footer">
                            <a class="button transparent  tellMeMore siGnup1" href="{{route('curator.signup.step.2')}}?signup=monitor_publisher_synch">Start</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 curator_col">
                    <div class="cardcontainer curator_container">
                        <div class="photo"> <img src="{{asset('images/journalist_media.svg')}}">
                        </div>
                        <div class="content_artist">
                            <p class="Iam_artist">Journalist / Media </p>
                            <p class="Iam_artist_detail">Generate press releases for the new stars, write about the upcoming sounds, make the article to share with the news. </p>
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
                            <p class="Iam_artist">Brooker / Booking agent</p>
                            <p class="Iam_artist_detail">Book your favorite indie artist or band for your upcoming gig/event. </p>
                        </div>
                        <div class="artist_footer">
                            <a class="button transparent  tellMeMore siGnup1" href="{{route('curator.signup.step.2')}}?signup=brooker_booking">Start</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 curator_col">
                    <div class="cardcontainer curator_container">
                        <div class="photo"> <img src="{{asset('images/sound_expert.svg')}}">
                        </div>
                        <div class="content_artist">
                            <p class="Iam_artist">Sound expert / Producer</p>
                            <p class="Iam_artist_detail">Offer your professional advice, help indie artists or bands to improve their sound quality, or even master their tracks.</p>
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
