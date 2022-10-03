@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Curator Get Verified')

{{-- page style --}}
@section('page-style')
        <style>
            .landing-headline {
                margin: 20px auto !important;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom/for-curators.css')}}">
@endsection

@section('content')
    <!-- ############ PAGE START-->

    <div class="page-content">

        {{-- <div class="padding p-b-0">
            <div class="page-title m-b">
                <h1 class="inline m-a-0">Get Verified</h1>
            </div>
        </div> --}}

        <div class=" owl-theme videoWlcome">
            <div class="row-col">
                <main class="col-lg-12 no-padding" id="main-content">
                    <div id="landing-page">
                        <div id="landing-header" class="full-landing">
                            <img src="{{asset('images/verified_banner_upcoming_sounds.jpg')}}"><h1 class="full-landing-text container">
                                <span>Get Verified
                                </span>
                            </h1>
                        </div>
                    </div>
                    <div class="container landing-headline">
                        <h3>
                            <span>GET VERIFIED</span>
                        </h3>
                        <div class="">
                            <span>
                                <p class="text-muted text-md">The first question is, why should you get verified on upcoming sounds? </p>
                            </span>
                        </div>
                    </div>

                    <div class="container landing-headline">
                        <h3>
                            <span>Exposure</span>
                        </h3>
                        <div class="">
                            <span>
                                <p class="text-muted text-md">As a result of becoming verified, you will appear first in the eyes of music artists, managers, PRs, labels, and representatives.</p>
                            </span>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="container landing-bullets">
                        <div class="col-xs-12 col-sm-12 m5 bullets">
                            <img src="{{asset('images/verified_pros_curators.svg')}}">
                            <h5>
                                <span>Authenticity</span>
                            </h5>
                            <p class="text-muted text-md m-t-2">
                                <span>You'll build your brand and credibility because we trust you, and creators willing to pay for your services will be satisfied with the results you deliver. </span>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-12 m5 bullets offset-m1">
                            <img src="{{asset('images/music.svg')}}">
                            <h5>
                                <span>Full dashboard Access</span>
                            </h5>
                            <p class="text-muted text-md m-t-2">
                                <span>With this option, you can access all features of our easy-to-use dashboard, including the offers section. </span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 m5 bullets">
                            <img src="{{asset('images/ditch_the_emails.svg')}}">
                            <h5>
                                <span>Increase your profits</span>
                            </h5>
                            <p class="text-muted text-md m-t-2">
                                <span>Making an offer is a great way to maximize your sales and increase your income instead of getting paid a small amount.</span>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-12 m5 bullets offset-m1">
                            <img src="{{asset('images/music.svg')}}">
                            <h5>
                                <span>Full dashboard Access</span>
                            </h5>
                            <p class="text-muted text-md m-t-2">
                                <span>With this option, you can access all features of our easy-to-use dashboard, including the offers section. </span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </main>
            </div>

            <section class="m-t-lg card">
                <div class="container">
                    <div class="py-5 text-center">
                        <h3>Verification Form</h3>
                    </div>
                    <form class="form-contact"
                            method="POST" action="{{route('curator.transfer')}}" autocomplete="off"
                            id="transferCuratorForm" novalidate>
                        @csrf

                        <div class="row m-t-sm">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="text-black">Curator Type:</label>
                                <input type="text" name="curator_type"
                                        class="form-control" readonly disabled value="{{ !empty($user_curator) && !empty($user_curator->curatorUser) ? ucfirst($user_curator->curatorUser->curator_signup_from ) : '' }}" autofocus>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="text-black">Select Sub Category:</label>
                                <select name="sub_curator_type" id="" class="form-control">
                                    <option value="" selected disabled>Please Select Sub Category</option>
                                    @if (!empty($user_curator) && !empty($user_curator->curatorUser))
                                        @if ($user_curator->curatorUser->curator_signup_from == 'influencer')
                                            <option value="tikTok">TikTok</option>
                                            <option value="instagram">Instagram</option>
                                            <option value="soundcloud">SoundCloud</option>
                                        @elseif ($user_curator->curatorUser->curator_signup_from == 'playlist_curator')
                                            <option value="spotify">Spotify</option>
                                            <option value="soundcloud">SoundCloud</option>
                                            <option value="deezer">Deezer</option>
                                            <option value="applemusic">Apple Music</option>
                                        @elseif ($user_curator->curatorUser->curator_signup_from == 'youtube_channel')
                                            <option value="youtube_channel">Youtube Channel</option>
                                            <option value="youtube_playlist">Youtube Playlist</option>
                                        @elseif ($user_curator->curatorUser->curator_signup_from == 'journalist_media'
                                                || $user_curator->curatorUser->curator_signup_from == 'radio_tv'
                                                || $user_curator->curatorUser->curator_signup_from == 'media'
                                                || $user_curator->curatorUser->curator_signup_from == 'label_manager'
                                                || $user_curator->curatorUser->curator_signup_from == 'monitor_publisher_synch'
                                                || $user_curator->curatorUser->curator_signup_from == 'brooker_booking'
                                                || $user_curator->curatorUser->curator_signup_from == 'sound_expert_producer')
                                            <option value="pro_exeprt">Pro Exeprt</option>
                                            <option value="sound_expert">Sound expert</option>
                                            <option value="produce">Produce</option>
                                            <option value="record_label">Record label</option>
                                            <option value="manager">Manager</option>
                                            <option value="music_supervisor">Music supervisor</option>
                                            <option value="monitor">Monitor</option>
                                            <option value="publisher">Publisher</option>
                                            <option value="sync">Sync</option>
                                        @endif
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row m-t-sm">
                            <div class="col-md-4 mb-3">
                                <label for="name" class="text-black">Name:</label>
                                <input type="text" name="name"
                                        class="form-control" value="{{ old('name') }}" autofocus>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email" class="text-black">Verified Phone Number:</label>
                                <input type="text"
                                        class="form-control" readonly disabled value="{{ !empty($user_curator) ? $user_curator->phone_number : '' }}" autofocus>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email" class="text-black">Upload valid ID/Passport:</label>
                                <input type="file" name="image" accept="image/*, .pdf"
                                        class="form-control" value="" autofocus>
                            </div>
                        </div>
                        <div class="row m-t-2">
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <h5>To speed up the application process, please provide the following information so we can get you approved and up and
                                        running as a verified, certified member of the UPCOMING SOUNDS team.</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-sm">
                            <div class="col-md-12 mb-3">
                                <input type="text" name="information"
                                        class="form-control" value="{{ old('information') }}" autofocus>
                            </div>
                        </div>

                        <div class="row m-t-2">
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <h5>Explain how your playlists grew in popularity with screenshorts.</h5>
                                    <span>Provide any proof of monthly activity I.e., Spotify for Artists screenshorts form past months of activity
                                        or screenshorts from an artist's "Discovered on" section, showing your playlists.
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-sm">
                            <div class="col-md-12 mb-3">
                                <textarea name="descriptions" class="form-control">{{ old('description_details') }}</textarea>
                            </div>
                        </div>

                        <hr class="mb-4">
                        <button class="btn circle btn-outline b-primary p-x-md auth_btn Rigister billingInfo" type="submit">Apply</button>
                    </form>
                </div>
            </section>
        </div>

        {{-- <div class="row-col">
            <div class="col-lg-9 b-r no-border-md">

            </div>
            @include('pages.curators.panels.right-sidebar')
        </div> --}}
    </div>

    <!-- ############ PAGE END-->
@endsection

@section('page-script')
 {{-- CkEditor --}}
 <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
 <script>
     CKEDITOR.replace( 'descriptions' );
 </script>

@endsection
