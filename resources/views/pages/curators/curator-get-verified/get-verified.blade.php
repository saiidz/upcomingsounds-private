@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Curator Get Verified')

{{-- page style --}}
@section('page-style')
        <style>
            .landing-headline {
                margin: 20px auto !important;
            }
            .applyForm{
                float: right;
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
{{--                        <div class="col-xs-12 col-sm-12 m5 bullets offset-m1">--}}
{{--                            <img src="{{asset('images/music.svg')}}">--}}
{{--                            <h5>--}}
{{--                                <span>Full dashboard Access</span>--}}
{{--                            </h5>--}}
{{--                            <p class="text-muted text-md m-t-2">--}}
{{--                                <span>With this option, you can access all features of our easy-to-use dashboard, including the offers section. </span>--}}
{{--                            </p>--}}
{{--                        </div>--}}
                        <div class="clearfix"></div>
                    </div>
                </main>
            </div>



        {{--  New Work           --}}
            @if (!empty($curatorVerificationForm) && !empty($curatorVerificationForm->user)
                        && $curatorVerificationForm->status == \App\Templates\IOfferTemplateStatus::PENDING)
                <section class="m-t-lg">
                    <div class="container">
                        <div class="py-5 text-center">
                            <h3>Your verification is pending. please wait for admin approval and check email as well.</h3>
                        </div>
                    </div>
                </section>
            @elseif(!empty($curatorVerificationForm) && !empty($curatorVerificationForm->user)
                        && $curatorVerificationForm->status == \App\Templates\IOfferTemplateStatus::ACCEPTED
                        && $curatorVerificationForm->user->is_verified == 1
                       && $curatorVerificationForm->user->is_rejected == 0)
                <section class="m-t-lg">
                    <div class="container">
                        <div class="py-5 text-center">
                            <h3>You are verified congratulation.</h3>
                        </div>
                    </div>
                </section>
            @else

                @if(!empty($curatorVerificationForm) && !empty($curatorVerificationForm->user)
                        && $curatorVerificationForm->status == \App\Templates\IOfferTemplateStatus::REJECTED)
                    <section class="m-t-lg">
                        <div class="container">
                            <div class="py-5 text-center">
                                <h3 style="color: red !important;">{!! $curatorVerificationForm->message !!}</h3>
                            </div>
                        </div>
                    </section>
                @endif

                @if($curatorVerificationFormCount >= 3 && $user->is_allow_curator_verification == 0 && !empty($curatorVerificationForm)
                           && $curatorVerificationForm->status == \App\Templates\IOfferTemplateStatus::REJECTED)
                    <section class="m-t-lg">
                        <div class="container">
                            <div class="py-5 text-center">
                                <h3>You have completed chance. Now you cannot send again submit verification form.</h3>
                            </div>
                        </div>
                    </section>
                @else
                        <section class="m-t-lg card">
                            <div class="container p-t-2">
                                <div class="py-5 text-center">
                                    <h3>Verification Form</h3>
                                </div>
                                <div class="row m-t-sm">
                                    <div class="col-md-12">
                                        <span id="verificationCuratorForm"></span>
                                    </div>
                                </div>
                                <form class="new_basicform_with_reload" id="verificationCuratorForm"
                                      method="POST" action="{{route('curator.verification.form')}}">
                                    @csrf
                                    @php
                                        $count = 1
                                    @endphp
                                    <input type="hidden" name="apply_count" value="{{ !empty($curatorVerificationForm) ? $curatorVerificationForm->apply_count + $count : 1 }}">
                                    <div class="row m-t-sm">
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="text-black">Curator Type:</label>
                                            <input type="text" name="curator_type"
                                                   class="form-control" readonly value="{{ !empty($user_curator) && !empty($user_curator->curatorUser) ? ucfirst($user_curator->curatorUser->curator_signup_from ) : '' }}" autofocus>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="text-black">Select Sub Category:</label>
                                            <select name="sub_curator_type" id="" class="form-control">
                                                <option value="" selected disabled>Please Select Sub Category</option>
                                                @if (!empty($user_curator) && !empty($user_curator->curatorUser))
                                                    @if ($user_curator->curatorUser->curator_signup_from == \App\Templates\ICuratorSignup::INFLUENCER)
                                                        <option value="tikTok">TikTok</option>
                                                        <option value="instagram">Instagram</option>
                                                        <option value="soundcloud">SoundCloud</option>
                                                    @elseif ($user_curator->curatorUser->curator_signup_from == \App\Templates\ICuratorSignup::PLAYLISTCURATOR)
                                                        <option value="spotify">Spotify</option>
                                                        <option value="soundcloud">SoundCloud</option>
                                                        <option value="deezer">Deezer</option>
                                                        <option value="applemusic">Apple Music</option>
                                                    @elseif ($user_curator->curatorUser->curator_signup_from == \App\Templates\ICuratorSignup::YOUTUBECHANNEL)
                                                        <option value="youtube_channel">Youtube Channel</option>
                                                        <option value="youtube_playlist">Youtube Playlist</option>
                                                    @elseif ($user_curator->curatorUser->curator_signup_from == \App\Templates\ICuratorSignup::JOURNALISTMEDIA
                                                            || $user_curator->curatorUser->curator_signup_from == \App\Templates\ICuratorSignup::RADIOTV
                                                            || $user_curator->curatorUser->curator_signup_from == \App\Templates\ICuratorSignup::MEDIA
                                                            || $user_curator->curatorUser->curator_signup_from == \App\Templates\ICuratorSignup::LABELMANAGER
                                                            || $user_curator->curatorUser->curator_signup_from == \App\Templates\ICuratorSignup::MONITORPUBLISHERSYNCH
                                                            || $user_curator->curatorUser->curator_signup_from == \App\Templates\ICuratorSignup::BROOKERBOOKING
                                                            || $user_curator->curatorUser->curator_signup_from == \App\Templates\ICuratorSignup::SOUNDEXPERTPRODUCER)
                                                        <option value="journalist_media">Journalist & Media</option>
                                                        <option value="radio_tv">Radio / TV</option>
                                                        <option value="blog">Blog</option>
                                                        <option value="magazine">Magazine</option>
                                                        <option value="newspaper">Newspaper</option>
                                                        <option value="influencer">Influencer</option>
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
                                            <input type="text" name="phone_number"
                                                   class="form-control" readonly value="{{ !empty($user_curator) ? $user_curator->phone_number : '' }}" autofocus>
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
                                        <span>
                                            To get verified on Upcomingsounds.com, the process involves showcasing the impact of selected tracks across various influential platforms.
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-2">
                                        <div class="col-md-12 mb-3">
                                            <div class="">
                                        <span>
                                            To track Spotify, Apple, Deezer, SoundCloud, and other platform streams/plays on an artist's profile, curators are required to add one suggested track to their playlists for one week
                                        </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row m-t-2">
                                        <div class="col-md-12 mb-3">
                                            <div class="">
                                        <span>
                                            Bloggers seeking verification must display traffic statistics, and monthly/daily readership, and include one article/review/online feature with links to the artist's website.

                                        </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row m-t-2">
                                        <div class="col-md-12 mb-3">
                                            <div class="">
                                        <span>
                                            YouTube channels will need to add tracks or videos to their channel.
                                        </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row m-t-2">
                                        <div class="col-md-12 mb-3">
                                            <div class="">
                                        <span>
                                            Influencers on Instagram, Facebook, Snapchat, TikTok, and similar platforms will showcase followers, views, and likes from features in their stories.

                                        </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row m-t-2">
                                        <div class="col-md-12 mb-3">
                                            <div class="">
                                        <span>
                                            Verification aims to affirm that curators and influencers can effectively promote new and upcoming artists, substantiated by tangible engagement and impact across these diverse platforms.
                                        </span>
                                            </div>
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
                                            <textarea name="description_details" id="descriptionDetails" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="row m-t-lg">
                                        <div class="col-md-12 mb-2">
                                            {!! !empty($theme->get_verified_link_1) ? $theme->get_verified_link_1 : null   !!}
                                            {!! !empty($theme->get_verified_link_2) ? $theme->get_verified_link_2 : null !!}
                                            {!! !empty($theme->get_verified_link_3) ? $theme->get_verified_link_3 : null !!}
                                            {!! !empty($theme->get_verified_link_4) ? $theme->get_verified_link_4 : null !!}
                                            {!! !empty($theme->get_verified_link_5) ? $theme->get_verified_link_5 : null !!}
                                            {!! !empty($theme->get_verified_link_6) ? $theme->get_verified_link_6 : null !!}
                                            {!! !empty($theme->get_verified_link_7) ? $theme->get_verified_link_7 : null !!}
                                            {!! !empty($theme->get_verified_link_8) ? $theme->get_verified_link_8 : null !!}
                                            {!! !empty($theme->get_verified_link_9) ? $theme->get_verified_link_9 : null !!}
                                            {!! !empty($theme->get_verified_link_10) ? $theme->get_verified_link_10 : null !!}
                                            {{--                                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/3vo4PmB8cVL3B2eb0vgKsd?utm_source=generator" width="100%" height="100" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>--}}
                                            {{--                                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/6XmeZ0pUoUheuzZTXbFjmA?utm_source=generator" width="100%" height="100" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>--}}
                                            {{--                                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/0UqEAK9Sbv6rLGzGi5rHHf?utm_source=generator" width="100%" height="100" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>--}}

                                            {{--                                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/1WSCdUV91ridWUPxEPwq6o?utm_source=generator" width="100%" height="100" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>--}}
                                            {{--                                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/5folHZZCD9Ioo3Gzu7gfiN?utm_source=generator" width="100%" height="100" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>--}}

                                            {{--                                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/2jEJ3CCG7v0i8SPIX6oETD?utm_source=generator" width="100%" height="100" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>--}}

                                            {{--                                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/6OZuv9PMatpxM1E0Duf6wg?utm_source=generator" width="100%" height="100" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>--}}

                                            {{--                                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/0MKZYlvOGtVAivpTyHEVih?utm_source=generator" width="100%" height="100" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>--}}

                                            {{--                                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/0tdE2fFez5TZcUIo44owAW?utm_source=generator" width="100%" height="100" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>--}}

                                            {{--                                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/1Z9qBVuGqsaNHjzsHWnGkH?utm_source=generator" width="100%" height="100" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>--}}
                                        </div>
                                    </div>

                                    <hr class="mb-4">
                                    <button class="btn circle btn-outline b-primary p-x-md applyForm basicbtn" type="submit">Apply</button>
                                </form>
                            </div>
                        </section>
                @endif
            @endif

            {{--  New Work           --}}









{{--            @if (!empty($curatorVerificationForm) && $curatorVerificationForm->apply_count == 3--}}
{{--            && !empty($curatorVerificationForm->user) && $curatorVerificationForm->user->is_verified == 0--}}
{{--            && $curatorVerificationForm->user->is_rejected == 0)--}}
{{--                <section class="m-t-lg card">--}}
{{--                    <div class="container">--}}
{{--                        <div class="py-5 text-center">--}}
{{--                            <h3>You have completed three chance. Now you cannot send again submit verification form.</h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </section>--}}
{{--            @elseif (!empty($curatorVerificationForm) && $curatorVerificationForm->apply_count == 3--}}
{{--                    && !empty($curatorVerificationForm->user) && $curatorVerificationForm->user->is_verified == 1)--}}
{{--                <section class="m-t-lg card">--}}
{{--                    <div class="container">--}}
{{--                        <div class="py-5 text-center">--}}
{{--                            <h3>You are verified congratulation.</h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </section>--}}
{{--            @elseif (!empty($curatorVerificationForm) && $curatorVerificationForm->apply_count == 3--}}
{{--                    && !empty($curatorVerificationForm->user) && $curatorVerificationForm->user->is_rejected == 1)--}}
{{--                <section class="m-t-lg card">--}}
{{--                    <div class="container">--}}
{{--                        <div class="py-5 text-center">--}}
{{--                            <h3>You are rejected.</h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </section>--}}
{{--            @else--}}
{{--                <section class="m-t-lg card">--}}
{{--                    <div class="container">--}}
{{--                        <div class="py-5 text-center">--}}
{{--                            <h3>Verification Form</h3>--}}
{{--                        </div>--}}
{{--                        <div class="row m-t-sm">--}}
{{--                            <div class="col-md-12">--}}
{{--                                <span id="verificationCuratorForm"></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <form class="new_basicform_with_reload" id="verificationCuratorForm"--}}
{{--                                method="POST" action="{{route('curator.verification.form')}}">--}}
{{--                            @csrf--}}
{{--                            @php--}}
{{--                                $count = 1--}}
{{--                            @endphp--}}
{{--                            <input type="hidden" name="apply_count" value="{{ !empty($curatorVerificationForm) ? $curatorVerificationForm->apply_count + $count : 1 }}">--}}
{{--                            <div class="row m-t-sm">--}}
{{--                                <div class="col-md-6 mb-3">--}}
{{--                                    <label for="email" class="text-black">Curator Type:</label>--}}
{{--                                    <input type="text" name="curator_type"--}}
{{--                                            class="form-control" readonly value="{{ !empty($user_curator) && !empty($user_curator->curatorUser) ? ucfirst($user_curator->curatorUser->curator_signup_from ) : '' }}" autofocus>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6 mb-3">--}}
{{--                                    <label for="email" class="text-black">Select Sub Category:</label>--}}
{{--                                    <select name="sub_curator_type" id="" class="form-control">--}}
{{--                                        <option value="" selected disabled>Please Select Sub Category</option>--}}
{{--                                        @if (!empty($user_curator) && !empty($user_curator->curatorUser))--}}
{{--                                            @if ($user_curator->curatorUser->curator_signup_from == \App\Templates\ICuratorSignup::INFLUENCER)--}}
{{--                                                <option value="tikTok">TikTok</option>--}}
{{--                                                <option value="instagram">Instagram</option>--}}
{{--                                                <option value="soundcloud">SoundCloud</option>--}}
{{--                                            @elseif ($user_curator->curatorUser->curator_signup_from == \App\Templates\ICuratorSignup::PLAYLISTCURATOR)--}}
{{--                                                <option value="spotify">Spotify</option>--}}
{{--                                                <option value="soundcloud">SoundCloud</option>--}}
{{--                                                <option value="deezer">Deezer</option>--}}
{{--                                                <option value="applemusic">Apple Music</option>--}}
{{--                                            @elseif ($user_curator->curatorUser->curator_signup_from == \App\Templates\ICuratorSignup::YOUTUBECHANNEL)--}}
{{--                                                <option value="youtube_channel">Youtube Channel</option>--}}
{{--                                                <option value="youtube_playlist">Youtube Playlist</option>--}}
{{--                                            @elseif ($user_curator->curatorUser->curator_signup_from == \App\Templates\ICuratorSignup::JOURNALISTMEDIA--}}
{{--                                                    || $user_curator->curatorUser->curator_signup_from == \App\Templates\ICuratorSignup::RADIOTV--}}
{{--                                                    || $user_curator->curatorUser->curator_signup_from == \App\Templates\ICuratorSignup::MEDIA--}}
{{--                                                    || $user_curator->curatorUser->curator_signup_from == \App\Templates\ICuratorSignup::LABELMANAGER--}}
{{--                                                    || $user_curator->curatorUser->curator_signup_from == \App\Templates\ICuratorSignup::MONITORPUBLISHERSYNCH--}}
{{--                                                    || $user_curator->curatorUser->curator_signup_from == \App\Templates\ICuratorSignup::BROOKERBOOKING--}}
{{--                                                    || $user_curator->curatorUser->curator_signup_from == \App\Templates\ICuratorSignup::SOUNDEXPERTPRODUCER)--}}
{{--                                                <option value="journalist_media">Journalist & Media</option>--}}
{{--                                                <option value="radio_tv">Radio / TV</option>--}}
{{--                                                <option value="blog">Blog</option>--}}
{{--                                                <option value="magazine">Magazine</option>--}}
{{--                                                <option value="newspaper">Newspaper</option>--}}
{{--                                                <option value="influencer">Influencer</option>--}}

{{--                                                --}}{{-- <option value="pro_exeprt">Pro Exeprt</option>--}}
{{--                                                <option value="sound_expert">Sound expert</option>--}}
{{--                                                <option value="produce">Produce</option>--}}
{{--                                                <option value="record_label">Record label</option>--}}
{{--                                                <option value="manager">Manager</option>--}}
{{--                                                <option value="music_supervisor">Music supervisor</option>--}}
{{--                                                <option value="monitor">Monitor</option>--}}
{{--                                                <option value="publisher">Publisher</option>--}}
{{--                                                <option value="sync">Sync</option> --}}
{{--                                            @endif--}}
{{--                                        @endif--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row m-t-sm">--}}
{{--                                <div class="col-md-4 mb-3">--}}
{{--                                    <label for="name" class="text-black">Name:</label>--}}
{{--                                    <input type="text" name="name"--}}
{{--                                            class="form-control" value="{{ old('name') }}" autofocus>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4 mb-3">--}}
{{--                                    <label for="email" class="text-black">Verified Phone Number:</label>--}}
{{--                                    <input type="text" name="phone_number"--}}
{{--                                            class="form-control" readonly value="{{ !empty($user_curator) ? $user_curator->phone_number : '' }}" autofocus>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4 mb-3">--}}
{{--                                    <label for="email" class="text-black">Upload valid ID/Passport:</label>--}}
{{--                                    <input type="file" name="image" accept="image/*, .pdf"--}}
{{--                                            class="form-control" value="" autofocus>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row m-t-2">--}}
{{--                                <div class="col-md-12 mb-3">--}}
{{--                                    <div class="">--}}
{{--                                        <span>--}}
{{--                                            To get verified on Upcomingsounds.com, the process involves showcasing the impact of selected tracks across various influential platforms.--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row m-t-2">--}}
{{--                                <div class="col-md-12 mb-3">--}}
{{--                                    <div class="">--}}
{{--                                        <span>--}}
{{--                                            To track Spotify, Apple, Deezer, SoundCloud, and other platform streams/plays on an artist's profile, curators are required to add one suggested track to their playlists for one week--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row m-t-2">--}}
{{--                                <div class="col-md-12 mb-3">--}}
{{--                                    <div class="">--}}
{{--                                        <span>--}}
{{--                                            Bloggers seeking verification must display traffic statistics, and monthly/daily readership, and include one article/review/online feature with links to the artist's website.--}}

{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row m-t-2">--}}
{{--                                <div class="col-md-12 mb-3">--}}
{{--                                    <div class="">--}}
{{--                                        <span>--}}
{{--                                            YouTube channels will need to add tracks or videos to their channel.--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row m-t-2">--}}
{{--                                <div class="col-md-12 mb-3">--}}
{{--                                    <div class="">--}}
{{--                                        <span>--}}
{{--                                            Influencers on Instagram, Facebook, Snapchat, TikTok, and similar platforms will showcase followers, views, and likes from features in their stories.--}}

{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row m-t-2">--}}
{{--                                <div class="col-md-12 mb-3">--}}
{{--                                    <div class="">--}}
{{--                                        <span>--}}
{{--                                            Verification aims to affirm that curators and influencers can effectively promote new and upcoming artists, substantiated by tangible engagement and impact across these diverse platforms.--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row m-t-2">--}}
{{--                                <div class="col-md-12 mb-3">--}}
{{--                                    <div class="">--}}
{{--                                        <h5>To speed up the application process, please provide the following information so we can get you approved and up and--}}
{{--                                            running as a verified, certified member of the UPCOMING SOUNDS team.</h5>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row m-t-sm">--}}
{{--                                <div class="col-md-12 mb-3">--}}
{{--                                    <input type="text" name="information"--}}
{{--                                            class="form-control" value="{{ old('information') }}" autofocus>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row m-t-2">--}}
{{--                                <div class="col-md-12 mb-3">--}}
{{--                                    <div class="">--}}
{{--                                        <h5>Explain how your playlists grew in popularity with screenshorts.</h5>--}}
{{--                                        <span>Provide any proof of monthly activity I.e., Spotify for Artists screenshorts form past months of activity--}}
{{--                                            or screenshorts from an artist's "Discovered on" section, showing your playlists.--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row m-t-sm">--}}
{{--                                <div class="col-md-12 mb-3">--}}
{{--                                    <textarea name="description_details" id="descriptionDetails" class="form-control"></textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row m-t-lg">--}}
{{--                                <div class="col-md-12 mb-2">--}}
{{--                                        {!! !empty($theme->get_verified_link_1) ? $theme->get_verified_link_1 : null   !!}--}}
{{--                                    {!! !empty($theme->get_verified_link_2) ? $theme->get_verified_link_2 : null !!}--}}
{{--                                    {!! !empty($theme->get_verified_link_3) ? $theme->get_verified_link_3 : null !!}--}}
{{--                                    {!! !empty($theme->get_verified_link_4) ? $theme->get_verified_link_4 : null !!}--}}
{{--                                    {!! !empty($theme->get_verified_link_5) ? $theme->get_verified_link_5 : null !!}--}}
{{--                                    {!! !empty($theme->get_verified_link_6) ? $theme->get_verified_link_6 : null !!}--}}
{{--                                    {!! !empty($theme->get_verified_link_7) ? $theme->get_verified_link_7 : null !!}--}}
{{--                                    {!! !empty($theme->get_verified_link_8) ? $theme->get_verified_link_8 : null !!}--}}
{{--                                    {!! !empty($theme->get_verified_link_9) ? $theme->get_verified_link_9 : null !!}--}}
{{--                                    {!! !empty($theme->get_verified_link_10) ? $theme->get_verified_link_10 : null !!}--}}
{{--                                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/3vo4PmB8cVL3B2eb0vgKsd?utm_source=generator" width="100%" height="100" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>--}}
{{--                                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/6XmeZ0pUoUheuzZTXbFjmA?utm_source=generator" width="100%" height="100" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>--}}
{{--                                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/0UqEAK9Sbv6rLGzGi5rHHf?utm_source=generator" width="100%" height="100" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>--}}

{{--                                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/1WSCdUV91ridWUPxEPwq6o?utm_source=generator" width="100%" height="100" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>--}}
{{--                                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/5folHZZCD9Ioo3Gzu7gfiN?utm_source=generator" width="100%" height="100" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>--}}

{{--                                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/2jEJ3CCG7v0i8SPIX6oETD?utm_source=generator" width="100%" height="100" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>--}}

{{--                                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/6OZuv9PMatpxM1E0Duf6wg?utm_source=generator" width="100%" height="100" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>--}}

{{--                                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/0MKZYlvOGtVAivpTyHEVih?utm_source=generator" width="100%" height="100" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>--}}

{{--                                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/0tdE2fFez5TZcUIo44owAW?utm_source=generator" width="100%" height="100" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>--}}

{{--                                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/1Z9qBVuGqsaNHjzsHWnGkH?utm_source=generator" width="100%" height="100" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <hr class="mb-4">--}}
{{--                            <button class="btn circle btn-outline b-primary p-x-md applyForm basicbtn" type="submit">Apply</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </section>--}}
{{--            @endif--}}

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
     CKEDITOR.replace( 'description_details' );
 </script>

@endsection
