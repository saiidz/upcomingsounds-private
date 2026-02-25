@extends('pages.artists.panels.layout')

{{-- page title --}}
@section('title','Curator Offer Details')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('css/curator-dashboard.css') }}">
    <link rel="stylesheet" href="{{asset('css/custom/custom.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/custom/chat.css')}}" type="text/css" />

    {{-- Use ONE FontAwesome (v6 for new icons) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Syne:wght@600;700;800&display=swap" rel="stylesheet">

    <style>
        #loadings {
            background: rgba(255,255,255,.45) url({{asset('images/loader.gif')}}) no-repeat center center !important;
        }
        .cke_notifications_area { display:none; }

        /* Safer scoped base (avoid all:initial which can break layout components) */
        .co-page{
            font-family: 'Inter', sans-serif;
            color:#12121e;
        }
        .co-page *,.co-page *::before,.co-page *::after{ box-sizing:border-box; }

        /* ── TOKENS ── */
        .co-page {
            --co-bg:          #f2f2f6;
            --co-white:       #ffffff;
            --co-border:      #e3e3ea;
            --co-soft:        #ebebf2;
            --co-text:        #12121e;
            --co-sub:         #5f5f78;
            --co-muted:       #9f9fb8;
            --co-green:       #02b875;
            --co-green-bg:    #edfaf3;
            --co-green-br:    #a8e8cc;
            --co-red:         #e03820;
            --co-red-bg:      #fdf2f0;
            --co-red-br:      #f5bdb0;
            --co-amber:       #c47c00;
            --co-amber-bg:    #fef8ec;
            --co-amber-br:    #f5d98a;
            --co-purple:      #6457e8;
            --co-purple-bg:   #f0effd;
            --co-purple-br:   #c8c4f5;
            --co-ink:         #0e0e1c;
            --co-radius:      14px;
            --co-radius-sm:   9px;
        }

        .co-wrap{ padding:24px 28px 60px; }

        /* ── CURATOR CARD ── */
        .co-curator-card{
            background:var(--co-white);
            border:1px solid var(--co-border);
            border-radius:var(--co-radius);
            overflow:hidden;
            margin-bottom:18px;
            box-shadow:0 1px 4px rgba(0,0,0,0.04);
        }
        .co-curator-banner{
            height:80px;
            background:var(--co-ink);
            position:relative;
            overflow:hidden;
        }
        .co-curator-banner::before{
            content:'';
            position:absolute; inset:0;
            background:
                radial-gradient(ellipse at 15% 50%, rgba(2,184,117,0.25) 0%, transparent 55%),
                radial-gradient(ellipse at 85% 50%, rgba(100,87,232,0.2) 0%, transparent 55%);
        }
        .co-curator-banner::after{
            content:'';
            position:absolute; inset:0;
            background-image:repeating-linear-gradient(
                90deg, transparent, transparent 40px,
                rgba(255,255,255,0.015) 40px, rgba(255,255,255,0.015) 41px
            );
        }
        .co-curator-body{ padding:0 20px 20px; }
        .co-curator-toprow{
            display:flex; align-items:flex-end; gap:14px;
            margin-top:-26px; margin-bottom:14px;
        }

        /* MERGED: old “profile image on top of background image” logic */
        .co-avatar-wrap{
            width:56px; height:56px;
            border-radius:12px;
            border:3px solid var(--co-white);
            overflow:hidden;
            background:var(--co-soft);
            box-shadow:0 2px 10px rgba(0,0,0,0.15);
            flex-shrink:0;
            position:relative;
        }
        .co-avatar-wrap .profile-image{
            position:absolute;
            top:50%; left:50%;
            transform:translate(-50%,-50%);
            width:100%; height:100%;
            object-fit:cover;
            border-radius:10px;
            z-index:2;
        }
        .co-avatar-wrap .background-image{
            position:absolute;
            top:0; left:0;
            width:100%; height:100%;
            object-fit:cover;
            z-index:1;
            opacity:.85;
        }

        .co-name-block{ flex:1; padding-bottom:2px; }
        .co-name{
            font-family:'Syne',sans-serif;
            font-size:19px; font-weight:800;
            color:var(--co-text);
            line-height:1.15;
            display:flex; align-items:center; gap:7px; flex-wrap:wrap;
        }
        .co-verified-dot{
            width:17px; height:17px;
            background:var(--co-green);
            border-radius:50%;
            display:inline-flex; align-items:center; justify-content:center;
            flex-shrink:0;
        }
        .co-verified-dot::after{
            content:'';
            display:block; width:8px; height:5px;
            border-left:1.8px solid #fff;
            border-bottom:1.8px solid #fff;
            transform:rotate(-45deg) translate(0.5px,-0.8px);
        }
        .co-curator-type{
            font-size:10px; font-weight:700;
            letter-spacing:.1em;
            text-transform:uppercase;
            color:var(--co-muted);
            margin-top:3px;
        }
        .co-meta-row{
            display:flex; align-items:center; gap:14px;
            flex-wrap:wrap; margin-bottom:14px;
        }
        .co-meta-item{
            display:flex; align-items:center; gap:6px;
            font-size:12px; color:var(--co-sub); font-weight:500;
        }
        .co-meta-item img{ height:15px; }

        .co-socials{ display:flex; gap:7px; flex-wrap:wrap; margin-bottom:16px; }
        .co-soc{
            width:32px; height:32px; border-radius:8px;
            display:flex; align-items:center; justify-content:center;
            font-size:13px; text-decoration:none;
            border:1px solid transparent;
            transition:transform .12s, box-shadow .12s;
        }
        .co-soc:hover{ transform:translateY(-2px); box-shadow:0 4px 10px rgba(0,0,0,0.1); }
        .co-soc-ig{ background:#fef0f7; color:#c13584; border-color:#f5d0e8; }
        .co-soc-fb{ background:#edf3ff; color:#1877f2; border-color:#c8d9f7; }
        .co-soc-sp{ background:var(--co-green-bg); color:#1db954; border-color:var(--co-green-br); }
        .co-soc-sc{ background:#fff3ee; color:#ff5500; border-color:#ffd4c2; }
        .co-soc-yt{ background:#fff0f0; color:#ff0000; border-color:#ffd0d0; }
        .co-soc-web{ background:var(--co-soft); color:var(--co-sub); border-color:var(--co-border); }
        .co-soc-dz{ background:#fffbf0; color:#eb9d00; border-color:#ffe8a0; }
        .co-soc-ap{ background:var(--co-soft); color:var(--co-text); border-color:var(--co-border); }
        .co-soc-tt{ background:#f5f5f5; color:#010101; border-color:#e0e0e0; }

        .co-bio-label{
            font-family:'Syne',sans-serif;
            font-size:12px; font-weight:700;
            color:var(--co-text);
            margin-bottom:6px;
            display:flex; align-items:center; gap:10px;
        }
        .co-bio-label::after{
            content:''; flex:1; height:1px;
            background:linear-gradient(to right, var(--co-border), transparent);
        }
        .co-bio-text{ font-size:13px; color:var(--co-sub); line-height:1.7; }
        .co-see-more{
            color:var(--co-purple);
            font-size:12px; font-weight:600;
            cursor:pointer; margin-left:4px;
            text-decoration:none;
        }
        .co-see-more:hover{ text-decoration:underline; }

        /* ── SECTION CARD ── */
        .co-card{
            background:var(--co-white);
            border:1px solid var(--co-border);
            border-radius:var(--co-radius);
            margin-bottom:16px;
            box-shadow:0 1px 4px rgba(0,0,0,0.04);
            overflow:hidden;
        }
        .co-card-header{ padding:16px 20px 0; }
        .co-section-title{
            font-family:'Syne',sans-serif;
            font-size:12px; font-weight:700;
            color:var(--co-text);
            display:flex; align-items:center; gap:10px;
            padding-bottom:12px;
            border-bottom:1px solid var(--co-soft);
        }
        .co-section-title::after{
            content:''; flex:1; height:1px;
            background:linear-gradient(to right, var(--co-soft), transparent);
        }
        .co-card-body{ padding:16px 20px 20px; }

        .co-contrib{
            display:flex; align-items:center; gap:14px;
            background:var(--co-ink);
            border-radius:var(--co-radius-sm);
            padding:16px 18px;
            margin-bottom:18px;
        }
        .co-contrib-coin{ width:36px; height:36px; flex-shrink:0; object-fit:contain; }
        .co-contrib-amount{
            font-family:'Syne',sans-serif;
            font-size:26px; font-weight:800;
            color:var(--co-green); line-height:1;
        }
        .co-contrib-usc{ font-size:13px; color:rgba(255,255,255,0.35); font-weight:400; margin-left:3px; }
        .co-contrib-div{ width:1px; height:32px; background:rgba(255,255,255,0.1); }
        .co-contrib-right{ flex:1; }
        .co-contrib-type{ font-size:13px; font-weight:600; color:#fff; }
        .co-contrib-alt{ font-size:11px; color:rgba(255,255,255,0.38); margin-top:3px; }

        .co-ir{
            display:grid;
            grid-template-columns:160px 1fr;
            gap:8px;
            padding:10px 0;
            border-bottom:1px solid var(--co-soft);
            align-items:baseline;
        }
        .co-ir:last-child{ border-bottom:none; }
        .co-ir-label{ font-size:12px; font-weight:600; color:var(--co-muted); }
        .co-ir-value{ font-size:13px; font-weight:500; color:var(--co-text); }
        .co-ir-value.prose{ font-weight:400; color:var(--co-sub); line-height:1.65; }

        .co-badge{
            display:inline-flex; align-items:center; gap:5px;
            padding:4px 10px;
            border-radius:20px;
            font-size:11px; font-weight:700;
            letter-spacing:.04em;
            text-transform:uppercase;
        }
        .co-badge::before{ content:''; width:5px; height:5px; border-radius:50%; background:currentColor; }
        .co-badge-pending{ background:var(--co-amber-bg); color:var(--co-amber); border:1px solid var(--co-amber-br); }
        .co-badge-accepted{ background:var(--co-green-bg); color:var(--co-green); border:1px solid var(--co-green-br); }
        .co-badge-rejected{ background:var(--co-red-bg); color:var(--co-red); border:1px solid var(--co-red-br); }
        .co-badge-expired{ background:var(--co-soft); color:var(--co-muted); border:1px solid var(--co-border); }
        .co-badge-completed{ background:var(--co-green-bg); color:var(--co-green); border:1px solid var(--co-green-br); }
        .co-badge-alternative{ background:var(--co-purple-bg); color:var(--co-purple); border:1px solid var(--co-purple-br); }

        .co-offer-text{
            background:var(--co-soft);
            border-left:3px solid var(--co-purple);
            border-radius:0 var(--co-radius-sm) var(--co-radius-sm) 0;
            padding:14px 16px;
            font-size:13px;
            line-height:1.8;
            color:var(--co-sub);
        }
        .co-offer-text a{ color:var(--co-purple); font-weight:600; text-decoration:none; }
        .co-offer-text a:hover{ text-decoration:underline; }

        .co-status-panel{
            border-radius:var(--co-radius-sm);
            padding:16px 18px;
            display:flex; align-items:flex-start; gap:14px;
            margin-bottom:14px;
        }
        .co-sp-icon{
            width:38px; height:38px; border-radius:9px;
            display:flex; align-items:center; justify-content:center;
            font-size:15px; flex-shrink:0;
        }
        .co-sp-title{ font-weight:700; font-size:14px; margin-bottom:3px; }
        .co-sp-sub{ font-size:12px; color:var(--co-sub); }

        .co-sp-accepted{ background:var(--co-green-bg); border:1px solid var(--co-green-br); }
        .co-sp-accepted .co-sp-icon{ background:var(--co-green); color:#fff; }
        .co-sp-accepted .co-sp-title{ color:var(--co-green); }

        .co-sp-rejected{ background:var(--co-red-bg); border:1px solid var(--co-red-br); }
        .co-sp-rejected .co-sp-icon{ background:var(--co-red); color:#fff; }
        .co-sp-rejected .co-sp-title{ color:var(--co-red); }

        .co-sp-expired{ background:var(--co-soft); border:1px solid var(--co-border); }
        .co-sp-expired .co-sp-icon{ background:var(--co-border); color:var(--co-muted); }
        .co-sp-expired .co-sp-title{ color:var(--co-sub); }

        .co-sp-completed{ background:var(--co-green-bg); border:1px solid var(--co-green-br); }
        .co-sp-completed .co-sp-icon{ background:var(--co-green); color:#fff; }
        .co-sp-completed .co-sp-title{ color:var(--co-green); }

        .co-sp-alt{ background:var(--co-purple-bg); border:1px solid var(--co-purple-br); }
        .co-sp-alt .co-sp-icon{ background:var(--co-purple); color:#fff; }
        .co-sp-alt .co-sp-title{ color:var(--co-purple); }

        .co-msg-box{
            border-radius:var(--co-radius-sm);
            padding:14px 16px;
            font-size:13px; color:var(--co-sub); line-height:1.65;
            margin-bottom:14px;
        }
        .co-msg-red{ background:var(--co-red-bg); border:1px solid var(--co-red-br); }
        .co-msg-purple{ background:var(--co-purple-bg); border:1px solid var(--co-purple-br); }

        .co-actions{
            display:flex; gap:10px; flex-wrap:wrap;
            padding:16px 20px;
            border-top:1px solid var(--co-soft);
        }
        .co-btn{
            display:inline-flex; align-items:center; justify-content:center; gap:8px;
            padding:11px 22px;
            border-radius:var(--co-radius-sm);
            font-size:13px; font-weight:700;
            cursor:pointer;
            text-decoration:none;
            border:none;
            transition:opacity .15s, transform .1s;
            flex:1; min-width:130px;
            font-family:'Inter',sans-serif;
        }
        .co-btn:hover{ opacity:.88; transform:translateY(-1px); }
        .co-btn:active{ transform:translateY(0); opacity:1; }
        .co-btn-pay{ background:var(--co-green); color:#fff; }
        .co-btn-alt{ background:var(--co-soft); color:var(--co-text); border:1.5px solid var(--co-border); }
        .co-btn-decline{ background:var(--co-red-bg); color:var(--co-red); border:1.5px solid var(--co-red-br); }
        .co-btn img{ width:20px; height:20px; object-fit:contain; }

        .co-work-link{
            display:inline-flex; align-items:center; gap:8px;
            padding:9px 16px;
            border-radius:var(--co-radius-sm);
            background:var(--co-purple-bg);
            color:var(--co-purple);
            border:1px solid var(--co-purple-br);
            font-size:13px; font-weight:600;
            text-decoration:none;
            transition:background .15s;
        }
        .co-work-link:hover{ background:var(--co-purple-br); }
        .co-work-imgs{ display:flex; flex-wrap:wrap; gap:8px; padding:0 20px 20px; }
        .co-work-img{
            width:80px; height:80px;
            border-radius:9px; object-fit:cover;
            border:1px solid var(--co-border);
            transition:transform .15s; cursor:pointer;
        }
        .co-work-img:hover{ transform:scale(1.06); }

        @media (max-width:680px){
            .co-wrap{ padding:14px 12px 60px; }
            .co-ir{ grid-template-columns:1fr; gap:2px; }
            .co-ir-label{ font-size:11px; }
            .co-contrib{ flex-wrap:wrap; }
        }
    </style>
@endsection

@section('content')
<div class="page-content">
    <div class="row-col">
        <div class="col-lg-8 b-r no-border-md">

            <div class="co-page co-wrap">

                {{-- Title row --}}
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:20px; flex-wrap:wrap; gap:10px;">
                    <h1 style="font-family:'Syne',sans-serif; font-size:20px; font-weight:800; color:#12121e; margin:0;">
                        Curator Offer Details
                    </h1>
                    <a href="{{ url()->previous() }}"
                       style="display:inline-flex; align-items:center; gap:7px; padding:9px 16px; background:#12121e; color:#fff; border-radius:9px; font-size:12px; font-weight:700; text-decoration:none; font-family:'Inter',sans-serif;"
                       onmouseover="this.style.opacity='.8'" onmouseout="this.style.opacity='1'">
                        <i class="fa-solid fa-arrow-left" style="font-size:11px;"></i> Back
                    </a>
                </div>

                {{-- Curator card --}}
                <div class="co-curator-card">
                    <div class="co-curator-banner"></div>
                    <div class="co-curator-body">
                        <div class="co-curator-toprow">
                            <div class="co-avatar-wrap">
                                @php
                                    $mystring = $send_offer->userCurator->profile;
                                    $poshttps = strpos($mystring, 'https');
                                    $poshttp  = strpos($mystring, 'http');
                                    $pos = ($poshttps !== false) ? $poshttps : $poshttp;
                                @endphp

                                @if($pos === false)
                                    @if(!empty($send_offer->userCurator->profile))
                                        <img src="{{URL('/')}}/uploads/profile/{{$send_offer->userCurator->profile}}" alt="" class="profile-image">
                                    @else
                                        <img src="{{asset('images/profile_images_icons.svg')}}" alt="" class="profile-image">
                                    @endif
                                @elseif($pos == 0)
                                    <img src="{{asset($send_offer->userCurator->profile)}}" alt="" class="profile-image">
                                @else
                                    <img src="{{asset('images/profile_images_icons.svg')}}" alt="" class="profile-image">
                                @endif

                                {{-- old background image --}}
                                <img src="{{asset('images/bg_curator_profile.png')}}" alt="" class="background-image">
                            </div>

                            <div class="co-name-block">
                                <div class="co-name">
                                    {{ ($send_offer->userCurator) ? $send_offer->userCurator->name : '' }}
                                    @if($send_offer->userCurator->is_verified == 1)
                                        <span class="co-verified-dot" title="Verified"></span>
                                    @endif
                                </div>
                                <div class="co-curator-type">
                                    @if(!empty($send_offer->userCurator->curatorUser->curator_signup_from))
                                        {{ Str::upper(ucwords(str_replace('_', ' ', $send_offer->userCurator->curatorUser->curator_signup_from))) }}
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if(!empty($send_offer->userCurator->curatorUser->country))
                            <div class="co-meta-row">
                                <span class="co-meta-item">
                                    <img src="{{asset('images/flags')}}/{{$send_offer->userCurator->curatorUser->country->flag_icon}}.png"
                                         alt="{{$send_offer->userCurator->curatorUser->country->flag_icon}}">
                                    {{ $send_offer->userCurator->curatorUser->country->name }}
                                </span>
                            </div>
                        @endif

                        <div class="co-socials">
                            @if(!empty($send_offer->userCurator->curatorUser->instagram_url))
                                <a href="{{$send_offer->userCurator->curatorUser->instagram_url}}" target="_blank" class="co-soc co-soc-ig" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                            @endif
                            @if(!empty($send_offer->userCurator->curatorUser->facebook_url))
                                <a href="{{$send_offer->userCurator->curatorUser->facebook_url}}" target="_blank" class="co-soc co-soc-fb" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                            @endif
                            @if(!empty($send_offer->userCurator->curatorUser->spotify_url))
                                <a href="{{$send_offer->userCurator->curatorUser->spotify_url}}" target="_blank" class="co-soc co-soc-sp" title="Spotify"><i class="fa-brands fa-spotify"></i></a>
                            @endif
                            @if(!empty($send_offer->userCurator->curatorUser->soundcloud_url))
                                <a href="{{$send_offer->userCurator->curatorUser->soundcloud_url}}" target="_blank" class="co-soc co-soc-sc" title="SoundCloud"><i class="fa-brands fa-soundcloud"></i></a>
                            @endif
                            @if(!empty($send_offer->userCurator->curatorUser->youtube_url))
                                <a href="{{$send_offer->userCurator->curatorUser->youtube_url}}" target="_blank" class="co-soc co-soc-yt" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
                            @endif
                            @if(!empty($send_offer->userCurator->curatorUser->website_url))
                                <a href="{{$send_offer->userCurator->curatorUser->website_url}}" target="_blank" class="co-soc co-soc-web" title="Website"><i class="fa-solid fa-link"></i></a>
                            @endif
                            @if(!empty($send_offer->userCurator->curatorUser->deezer_url))
                                <a href="{{$send_offer->userCurator->curatorUser->deezer_url}}" target="_blank" class="co-soc co-soc-dz" title="Deezer"><i class="fa-brands fa-deezer"></i></a>
                            @endif
                            @if(!empty($send_offer->userCurator->curatorUser->apple_url))
                                <a href="{{$send_offer->userCurator->curatorUser->apple_url}}" target="_blank" class="co-soc co-soc-ap" title="Apple Music"><i class="fa-brands fa-apple"></i></a>
                            @endif
                            @if(!empty($send_offer->userCurator->curatorUser->tiktok_url))
                                <a href="{{$send_offer->userCurator->curatorUser->tiktok_url}}" target="_blank" class="co-soc co-soc-tt" title="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                            @endif
                        </div>

                        @if(!empty($send_offer->userCurator->curatorUser->curator_bio))
                            <div class="co-bio-label">Bio</div>
                            <p class="co-bio-text" id="bioInfo">
                                {{ Str::limit($send_offer->userCurator->curatorUser->curator_bio, 120) }}
                            </p>
                            <a href="javascript:void(0)" class="co-see-more" onclick="seeMoreBio()">See more</a>
                        @endif
                    </div>
                </div>

                {{-- Send Offer Info --}}
                <div class="co-card">
                    <div class="co-card-header">
                        <div class="co-section-title">Send Offer Info</div>
                    </div>
                    <div class="co-card-body">

                        <div class="co-contrib">
                            <img src="{{ asset('images/coin_bg.png') }}" class="co-contrib-coin" alt="USC">
                            <div>
                                <div class="co-contrib-amount">
                                    {{ !empty($send_offer->curatorOfferTemplate) ? $send_offer->curatorOfferTemplate->contribution : 0 }}
                                    <span class="co-contrib-usc">USC</span>
                                </div>
                            </div>
                            <div class="co-contrib-div"></div>
                            <div class="co-contrib-right">
                                <div class="co-contrib-type">
                                    {{ !empty($send_offer->curatorOfferTemplate) ? $send_offer->curatorOfferTemplate->offerType->name : '----' }}
                                </div>
                                <div class="co-contrib-alt">
                                    Alt: {{ !empty($send_offer->curatorOfferTemplate) ? $send_offer->curatorOfferTemplate->alternativeOption->name : '----' }}
                                </div>
                            </div>
                        </div>

                        <div class="co-ir">
                            <span class="co-ir-label">Expiry Date</span>
                            <span class="co-ir-value">{{ !empty($send_offer) ? getDateFormat($send_offer->expiry_date) : '----' }}</span>
                        </div>
                        <div class="co-ir">
                            <span class="co-ir-label">Approx. Publish Date</span>
                            <span class="co-ir-value">{{ !empty($send_offer) ? getDateFormat($send_offer->publish_date) : '----' }}</span>
                        </div>
                        <div class="co-ir">
                            <span class="co-ir-label">Offer Status</span>
                            <span class="co-ir-value">
                                @if($send_offer->status == \App\Templates\IOfferTemplateStatus::PENDING)
                                    <span class="co-badge co-badge-pending">{{ $send_offer->status }}</span>
                                @elseif($send_offer->status == \App\Templates\IOfferTemplateStatus::REJECTED)
                                    <span class="co-badge co-badge-rejected">{{ $send_offer->status }}</span>
                                @elseif($send_offer->status == \App\Templates\IOfferTemplateStatus::ACCEPTED)
                                    <span class="co-badge co-badge-accepted">{{ $send_offer->status }}</span>
                                @elseif($send_offer->status == \App\Templates\IOfferTemplateStatus::EXPIRED)
                                    <span class="co-badge co-badge-expired">{{ $send_offer->status }}</span>
                                @elseif($send_offer->status == \App\Templates\IOfferTemplateStatus::COMPLETED)
                                    <span class="co-badge co-badge-completed">{{ $send_offer->status }}</span>
                                @elseif($send_offer->status == \App\Templates\IOfferTemplateStatus::ALTERNATIVE)
                                    <span class="co-badge co-badge-alternative">{{ $send_offer->status }}</span>
                                @else
                                    <span class="co-badge co-badge-pending">{{ $send_offer->status }}</span>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Track Info --}}
                <div class="co-card">
                    <div class="co-card-header">
                        <div class="co-section-title">Track Info</div>
                    </div>
                    <div class="co-card-body">
                        <div class="co-ir">
                            <span class="co-ir-label">Track Name</span>
                            <span class="co-ir-value">{{ !empty($send_offer->artistTrack) ? $send_offer->artistTrack->name : '----' }}</span>
                        </div>
                        <div class="co-ir">
                            <span class="co-ir-label">Release Type</span>
                            <span class="co-ir-value">
                                {{ !empty($send_offer->artistTrack) ? Str::ucfirst($send_offer->artistTrack->audio_cover).' '.Str::ucfirst($send_offer->artistTrack->release_type) : '----' }}
                            </span>
                        </div>
                        <div class="co-ir">
                            <span class="co-ir-label">Release Date</span>
                            <span class="co-ir-value">{{ !empty($send_offer->artistTrack) ? getDateFormat($send_offer->artistTrack->release_date) : '----' }}</span>
                        </div>

                        <div class="co-ir" style="align-items:flex-start;">
                            <span class="co-ir-label" style="padding-top:1px;">Description</span>
                            <span class="co-ir-value prose" id="desInfo">
                                {{ !empty($send_offer->artistTrack->description) ? Str::limit($send_offer->artistTrack->description, 120) : '-----' }}
                                <a href="javascript:void(0)" class="co-see-more" onclick="seeMoreDes()">Read more</a>
                            </span>
                        </div>

                        <div class="co-ir" style="align-items:flex-start;">
                            <span class="co-ir-label" style="padding-top:1px;">Pitch</span>
                            <span class="co-ir-value prose" id="pitchInfo">
                                {{ !empty($send_offer->artistTrack->pitch_description) ? Str::limit($send_offer->artistTrack->pitch_description, 120) : '-----' }}
                                <a href="javascript:void(0)" class="co-see-more" onclick="seeMorePitch()">Read more</a>
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Offer Description --}}
                <div class="co-card">
                    <div class="co-card-header">
                        <div class="co-section-title">Offer Description</div>
                    </div>
                    <div class="co-card-body">
                        @php
                            $offerText = $send_offer->curatorOfferTemplate->offer_text ?? '--';
                            $artistName = $send_offer->userArtist->name
                                        ?? $send_offer->artistTrack->user->name
                                        ?? auth()->user()->name
                                        ?? 'Artist';
                            $trackTitle = $send_offer->artistTrack->name ?? 'your track';

                            $offerText = str_replace('{ARTIST}', $artistName, $offerText);
                            $offerText = str_replace('{TITLE}',  $trackTitle,  $offerText);

                            $offerText = preg_replace(
                                '/<p>((http|https):\/\/[^\s]+)<\/p>/',
                                '<a href="$1" target="_blank">$1</a>',
                                $offerText
                            );
                        @endphp

                        <div class="co-offer-text" id="descriptionContainerOfferText">
                            {!! !empty($send_offer->curatorOfferTemplate) ? $offerText : '----' !!}
                        </div>
                    </div>
                </div>

                {{-- Status panels + actions --}}
                @if(!empty($send_offer) && $send_offer->status == \App\Templates\IOfferTemplateStatus::REJECTED)
                    <div class="co-card">
                        <div class="co-card-body" style="padding-bottom:14px;">
                            <div class="co-status-panel co-sp-rejected">
                                <div class="co-sp-icon"><i class="fa-solid fa-xmark"></i></div>
                                <div>
                                    <div class="co-sp-title">Offer Declined</div>
                                    <div class="co-sp-sub">This offer has been declined.</div>
                                </div>
                            </div>
                            <div class="co-msg-box co-msg-red">
                                {!! !empty($send_offer->message) ? $send_offer->message : '----' !!}
                            </div>
                        </div>
                    </div>

                @elseif(!empty($send_offer) && $send_offer->status == \App\Templates\IOfferTemplateStatus::ALTERNATIVE)
                    <div class="co-card">
                        <div class="co-card-body" style="padding-bottom:14px;">
                            <div class="co-status-panel co-sp-alt">
                                <div class="co-sp-icon"><i class="fa-solid fa-shuffle"></i></div>
                                <div>
                                    <div class="co-sp-title">Free Alternative Proposed</div>
                                    <div class="co-sp-sub">The curator has offered a free alternative.</div>
                                </div>
                            </div>
                            <div class="co-msg-box co-msg-purple">
                                {!! !empty($send_offer->message) ? $send_offer->message : '----' !!}
                            </div>
                        </div>
                    </div>

                @elseif(!empty($send_offer) && $send_offer->status == \App\Templates\IOfferTemplateStatus::ACCEPTED)
                    <div class="co-card">
                        <div class="co-card-body">
                            <div class="co-status-panel co-sp-accepted">
                                <div class="co-sp-icon"><i class="fa-solid fa-check"></i></div>
                                <div>
                                    <div class="co-sp-title">Offer Accepted!</div>
                                    <div class="co-sp-sub">The curator has accepted your offer and will begin working on it.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                @elseif(!empty($send_offer) && $send_offer->status == \App\Templates\IOfferTemplateStatus::EXPIRED)
                    <div class="co-card">
                        <div class="co-card-body">
                            <div class="co-status-panel co-sp-expired">
                                <div class="co-sp-icon"><i class="fa-solid fa-hourglass-end"></i></div>
                                <div>
                                    <div class="co-sp-title">Offer Expired</div>
                                    <div class="co-sp-sub">This offer has passed its expiry date and is no longer active.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                @elseif(!empty($send_offer) && $send_offer->status == \App\Templates\IOfferTemplateStatus::COMPLETED)
                    <div class="co-card">
                        <div class="co-card-body" style="padding-bottom:8px;">
                            <div class="co-status-panel co-sp-completed">
                                <div class="co-sp-icon"><i class="fa-solid fa-star"></i></div>
                                <div>
                                    <div class="co-sp-title">Offer Completed!</div>
                                    <div class="co-sp-sub">The curator has finished working on your track.</div>
                                </div>
                            </div>
                        </div>

                        @if(!empty($send_offer->submitWork))
                            @if(!empty($send_offer->submitWork->submitWorkLinks))
                                <div style="padding:0 20px 14px; display:flex; flex-wrap:wrap; gap:8px;">
                                    @foreach($send_offer->submitWork->submitWorkLinks as $link)
                                        <a href="{{$link->link}}" target="_blank" class="co-work-link">
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i> View Completed Work
                                        </a>
                                    @endforeach
                                </div>
                            @endif

                            @if(!empty($send_offer->submitWork->submitWorkImages))
                                <div class="co-work-imgs">
                                    @foreach($send_offer->submitWork->submitWorkImages as $image)
                                        <a href="{{asset('uploads/submit_work_images')}}/{{$image->path}}" target="_blank">
                                            <img src="{{asset('uploads/submit_work_images')}}/{{$image->path}}" class="co-work-img" alt="">
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        @endif
                    </div>

                @else
                    {{-- Pending actions --}}
                    <div class="co-card" id="curatorOfferBtn">
                        <div class="co-card-body">
                            <p style="font-size:12px; color:var(--co-muted); margin-bottom:14px;">
                                USC will only be deducted once the curator completes the work.
                            </p>
                        </div>
                        <div class="co-actions">
                            <a href="javascript:void(0)"
                               data-toggle="modal" data-target="#confirmPayUSCModal"
                               class="co-btn co-btn-pay UscOfferPay"
                               data-contribution="{{!empty($send_offer->curatorOfferTemplate) ? $send_offer->curatorOfferTemplate->contribution : 0}}">
                                <img src="{{ asset('images/coin_bg.png') }}" alt="USC">
                                Pay {{ !empty($send_offer->curatorOfferTemplate) ? $send_offer->curatorOfferTemplate->contribution : 0 }} USC
                            </a>

                            <a href="javascript:void(0)" data-toggle="modal" data-target="#freeAlternativeOffer"
                               class="co-btn co-btn-alt">
                                <i class="fa-solid fa-shuffle"></i> Free Alternative
                            </a>

                            <a href="javascript:void(0)" data-toggle="modal" data-target="#declineOffer"
                               class="co-btn co-btn-decline">
                                <i class="fa-solid fa-xmark"></i> Decline
                            </a>
                        </div>
                    </div>
                @endif

            </div>

        </div>

        @include('pages.artists.artist-offers.modal.modal')

        @if($send_offer->status == \App\Templates\IOfferTemplateStatus::EXPIRED)
            @include('pages.curators.panels.right-sidebar')
        @else
            @include('pages.chat.right-sidebar-chat')
        @endif
    </div>
</div>
@endsection

@section('page-script')
    <script src="{{asset('app-assets/js/artist/artist.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

    <script>
        $(document).ready(function () { $('.ckeditor').ckeditor(); });
    </script>

    <script>
        var preload = document.getElementById("loadings");
        function loader() { preload.style.display = 'none'; }
        function showLoader() { preload.style.display = 'block'; }
    </script>

    <script>
        // MERGED: old behavior (empty + html) — more reliable with existing markup
        var curator_bio = {!! json_encode($send_offer->userCurator->curatorUser->curator_bio) !!};
        if(curator_bio){
            function seeMoreBio(){
                $('#bioInfo').empty();
                $('#bioInfo').html(curator_bio);
            }
        }

        var track_des = {!! !empty($send_offer->artistTrack->description) ? json_encode($send_offer->artistTrack->description) : 'null' !!};
        if(track_des){
            function seeMoreDes(){
                $('#desInfo').empty();
                $('#desInfo').html(track_des);
            }
        }

        var track_pitch = {!! !empty($send_offer->artistTrack->pitch_description) ? json_encode($send_offer->artistTrack->pitch_description) : 'null' !!};
        if(track_pitch){
            function seeMorePitch(){
                $('#pitchInfo').empty();
                $('#pitchInfo').html(track_pitch);
            }
        }
    </script>

    <script>
        // Pay USC (keep existing workflow)
        $('#payUSCOffer').click(function (event) {
            event.preventDefault();
            var send_offer_id = "{!! encrypt(!empty($send_offer) ? $send_offer->id : null) !!}";
            var contribution  = $('.UscOfferPay').attr('data-contribution');
            var url = "{{route('artist.offer.pay')}}";
            showLoader();
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "send_offer_id": send_offer_id,
                    "contribution": contribution,
                },
                success: function (data) {
                    loader();
                    if (data.success) {
                        toastr.success(data.success);
                        window.location = '{{ URL::to('/accepted-offer') }}';
                    }
                    if (data.error_wallet) {
                        toastr.error(data.error_wallet);
                        window.open('{{ URL::to('/wallet') }}', '_blank');
                    }
                    if (data.error) { toastr.error(data.error); }
                }
            });
        });
    </script>
@endsection
