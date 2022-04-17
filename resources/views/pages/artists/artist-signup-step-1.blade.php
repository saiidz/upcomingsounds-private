{{-- layout --}}
@extends('layouts.artist-guest')

{{-- page title --}}
@section('title','Artist Signup')

{{-- page content --}}
@section('content')
    <div class="app-body">
        <div class="b-t">
            <div class="center-block text-center">
                <div class="p-a-md">
                    <div>
                        <h4><span class="Gary">Gary</span> from UpcomingSounds</h4>
                        <p class="text-muted m-y">
                            Hey! Could you tell us more about you?
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div id="snackbar"></div>
                <div class="col-md-6">
                    <div class="cardcontainer">
                        <div class="photo"> <img src="{{asset('images/artist.svg')}}">
                        </div>
                        <div class="content_artist">
                            <p class="Iam_artist">I'm an artist</p>
                            <p class="Iam_artist_detail">Fill in your artist profile and send your music to the curators and pros available on UpcomingSounds</p>
                        </div>
                        <div class="artist_footer">
                            <a class="button transparent  tellMeMore siGnup1" href="{{route('artist.signup.step.2')}}?signup=artist">Start</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cardcontainer">
                        <div class="photo"> <img src="{{asset('images/artist_representative.svg')}}">
                        </div>
                        <div class="content_artist">
                            <p class="Iam_artist">I'm an artist representative</p>
                            <p class="Iam_artist_detail">Set up a profile for each one of your artists and send their tracks to the music curators & pros available on UpcomingSounds</p>
                        </div>
                        <div class="artist_footer">
                            <a class="button transparent  tellMeMore siGnup1" href="{{route('artist.signup.representative.step.2')}}?signup=representative">Start</a>
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
