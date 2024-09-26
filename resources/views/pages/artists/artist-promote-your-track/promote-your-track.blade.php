@extends('pages.artists.panels.layout')

{{-- page title --}}
@section('title','Promote Your Track')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('css/curator-dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css">
    <style>
        .sidebarCollapsed {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 999;
            top: 0;
            right: 0;
            background-color: #363c43;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidebarCollapsed a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidebarCollapsed a:hover {
            color: #f1f1f1;
        }

        .sidebarCollapsed .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }


        /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
        @media screen and (max-height: 450px) {
            .sidebarCollapsed {padding-top: 15px;}
            .sidebarCollapsed a {font-size: 18px;}
            /*.sidebarCollapsed*/
            /*{*/
            /*    width: 475px;*/
            /*}*/
        }
        @media (min-width: 320px) and (max-width: 480px) {

            /* CSS */

            .sidebarCollapsed .closebtn {
                top: 40px;
            }
        }
        #loadings {
            background: rgba(255, 255, 255, .4) url({{asset('images/loader.gif')}}) no-repeat center center !important;
        }
        .slide-iframe iframe button .ytp-large-play-button-red-bg {
            display: none !important;
        }
        iframe .ytp-cued-thumbnail-overlay .ytp-large-play-button {
            display: none !important;
        }
        .notFoundCampaign
        {
            display: flex !important;
            align-items: center!important;
            justify-content: center!important;
            background-color: #363c43!important;
        }
        .itemMed:after {padding-top: 2% !important;}
        ::-webkit-scrollbar {
            width: 5px;
        }

        .outer-right {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .border_image {
            position: relative;
            width: 300px;
            height: 300px;
        }

        .border {
            position: relative;
            z-index: 2;
            width: 100%;
            height: 100%;
        }

        .thumbnail {
            position: absolute;
            top: 3px;
            left: 70px;
            height: 100%;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            z-index: 1;
        }
        .tHmW1{
            width: 50% !important;
        }
        .thWN2{
            width: 100% !important;
        }
        .titleTextColor{
            color: black !important;
            font-size: 20px !important;
        }
    </style>
@endsection

@section('content')
    <!-- ############ PAGE START-->

    <div class="page-content">

        <div class="padding p-b-0">
            <div class="page-title m-b">
                <h1 class="inline m-a-0 titleColor">Welcome {{($user_artist) ? $user_artist->name : ''}} ready to promote your track?</h1>
            </div>
            <div class="page-title m-b-2">
                <a class="btn btn-lg rounded add_your_track" href="{{url('/promote-your-track')}}">
                    <div class="btnTitle">Promote Your Track</div>
                    <div class="btnSubtitle">
                        And get access to curators
{{--                        And get access to {{ $curators }} curators & pros--}}
                    </div>
                </a>
{{--                <h2 class="widget-title h4 m-b">--}}
{{--                    And get access to 1249 curators & pros--}}
{{--                </h2>--}}
            </div>

        {{--    Slider        --}}
            <div class="con m-b" id="curatorBanner" style="background-color: transparent">
                <section class="main-slider">
                    @if(count($premium_campaigns) > 0)
                        @foreach($premium_campaigns as $key => $premium_campaign)
                            @php
                                $days = \Illuminate\Support\Carbon::parse($premium_campaign->updated_at)->addDays($premium_campaign->add_days);
                                $date = \Illuminate\Support\Carbon::today();
                            @endphp
                            @if($date >= $days)
                                @php
                                    $remove_banner = \App\Models\Campaign::where('id',$premium_campaign->id)->first();
                                    $remove_banner->update(['add_remove_banner' => 0]);
                                @endphp
                                <div class="item-title text-ellipsis notFoundCampaign">
                                    <h3 class="" style="text-align:center;font-size: 30px;">Not Active Campaign Found</h3>
                                </div>
                            @else
                                @if($premium_campaign->add_remove_banner == 1)
                                    <div class="item image">
                                        <span class="loading">Loading...</span>
                                        <div class="outer-left">
                                            <h1 class="headline animated fadeInLeft">
                                                {{ !empty($premium_campaign->artistTrack) ? $premium_campaign->artistTrack->name : (!empty($premium_campaign->track_name) ? $premium_campaign->track_name : '') }}<br />
                                            </h1>
                                            <h3 class="title animated bounceInLeft" @if($premium_campaign->artistTrack)  style="cursor:pointer; color:#e26e6b !important;" @endif>
                                                {{ !empty($premium_campaign->artistTrack) ? $premium_campaign->artistTrack->user->name : (!empty($premium_campaign->artist_name) ? $premium_campaign->artist_name : '') }}
                                            </h3>
                                            <p class="description animated fadeInDown delay-06s">
                                                {{ !empty($premium_campaign->artistTrack) ? \Illuminate\Support\Str::limit($premium_campaign->artistTrack->description, 400, $end='...') : (!empty($premium_campaign->track_description) ? $premium_campaign->track_description : '') }}
                                            </p>
                                            @if(!empty($premium_campaign->artistTrack) && !empty($premium_campaign->artistTrack->audio))
                                                <div class="item r" data-id="item-{{$premium_campaign->artistTrack->id}}" data-src="{{URL('/')}}/uploads/audio/{{$premium_campaign->artistTrack->audio}}">
                                                    <div class="item-media itemMed">
                                                        <div class="item-media-content" id="itemMediaContent"></div>
                                                        <div class="">
                                                            <button class="btn-playpause">Play</button>
                                                        </div>
                                                    </div>
                                                    <div class="item-info" style="display:none;">
                                                        <div class="item-title text-ellipsis">
                                                            <a href="javascript:void(0)">
                                                                {{ !empty($premium_campaign->artistTrack) ? $premium_campaign->artistTrack->user->name : (!empty($premium_campaign->artist_name) ? $premium_campaign->artist_name : '') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif(empty($premium_campaign->artistTrack) && !empty($premium_campaign->audio))
                                                <div class="item r" data-id="item-{{$premium_campaign->id}}" data-src="{{URL('/')}}/uploads/audio/{{$premium_campaign->audio}}">
                                                    <div class="item-media itemMed">
                                                        <div class="item-media-content" id="itemMediaContent"></div>
                                                        <div class="">
                                                            <button  class="btn-playpause">Play</button>
                                                        </div>
                                                    </div>
                                                    <div class="item-info" style="display:none;">
                                                        <div class="item-title text-ellipsis">
                                                            <a href="javascript:void(0)">
                                                                {{ !empty($premium_campaign->artistTrack) ? $premium_campaign->artistTrack->user->name : (!empty($premium_campaign->artist_name) ? $premium_campaign->artist_name : '') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                            @endif

                                            @if($premium_campaign->button_status == 1)
                                                <a href="{{ $premium_campaign->button_link }}" target="_blank" class="nav-link">
                                                    <span class="btn btn-sm rounded primary _600">{{ $premium_campaign->button_text }}</span>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="outer-right">
                                            <div class="border_image">
                                                @if(!empty($premium_campaign->banner_img_one) && $premium_campaign->banner_img_one_status == 1)
                                                    <img class="border animated fadeInLeft" src="{{asset('uploads/banner_img')}}/{{$premium_campaign->banner_img_one}}" alt="" />
                                                @else
                                                    @if(!empty($premium_campaign->track_id))
                                                        <img class="border animated fadeInLeft" src="{{asset('images/border.png')}}" alt="" />
                                                    @endif
                                                @endif

                                                @if(!empty($theme_settings->curator_border) && $theme_settings->curator_border == 'on')
                                                    <img class="border" src="{{asset('images/border.png')}}" alt="" />
                                                @endif

                                                @if(!empty($premium_campaign->track_id))
                                                    @if(!empty($premium_campaign->artistTrack) && !empty($premium_campaign->artistTrack->track_thumbnail))
                                                        <div class="thumbnail animated fadeInLeft tHmW1" style="background-image:url({{asset('uploads/track_thumbnail')}}/{{$premium_campaign->artistTrack->track_thumbnail}});"></div>
                                                    @elseif(empty($premium_campaign->artistTrack) && !empty($premium_campaign->track_thumbnail))
                                                        <div class="thumbnail animated fadeInLeft tHmW1" style="background-image:url({{asset('uploads/track_thumbnail')}}/{{$premium_campaign->track_thumbnail}});"></div>
                                                    @else
                                                        <div class="thumbnail animated fadeInLeft tHmW1" style="background-image:url({{asset('images/banner_cd.png')}});"></div>
                                                    @endif
                                                @else
                                                    @if(!empty($premium_campaign->banner_img) && $premium_campaign->banner_img_status == 1)
                                                        @if($premium_campaign->banner_img_one_status == 0)
                                                            <img class="border animated fadeInLeft" src="{{asset('uploads/banner_img')}}/{{$premium_campaign->banner_img}}" alt="" />
                                                        @else
                                                            <div class="thumbnail animated fadeInLeft @if(!empty($premium_campaign->banner_img_one) && $premium_campaign->banner_img_one_status == 1) tHmW1 @else thWN2 @endif" style="background-image:url({{asset('uploads/banner_img')}}/{{$premium_campaign->banner_img}});"></div>
                                                        @endif
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <figure>
                                            @if(!empty($premium_campaign->link))
                                                @php
                                                    $videoCode = explode('v=',$premium_campaign->link);
                                                @endphp
                                                @if(!empty($videoCode[1]))
                                                    <div class="slide-iframe slide-media" style="background-image:url({{asset(!empty($theme->curator_banner_img) ? $theme->curator_banner_img : 'images/banner_cd.png')}});">
                                                        <iframe class="iframe-entity" width="560" height="315" src="https://www.youtube.com/embed/{{$videoCode[1]}}?autoplay=1&mute=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                        {{--                                                    <iframe class="iframe-entity" width="560" height="315" src="https://www.youtube.com/embed/{{$videoCode[1]}}" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--}}
                                                        {{--                                                    <iframe class="iframe-entity" width="560" height="315"  src="https://www.youtube.com/embed/{{$videoCode[1]}}?rel0&autoplay=1&loop=1" frameborder="0" allow="accelerometer; autoplay; modestbranding; encrypted-media; gyroscope; picture-in-picture"></iframe>--}}
                                                        {{--                                                    <iframe class="iframe-entity" width="560" height="315" src="https://www.youtube.com/embed/{{$videoCode[1]}}?autoplay=1&mute=1&controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                                                        {{--                                                <iframe class="iframe-entity" width="560" height="315"  src="https://www.youtube-nocookie.com/embed/{{$videoCode[1]}}?rel0&autoplay=1&controls=0&loop=1" frameborder="0" allow="accelerometer; autoplay; modestbranding; encrypted-media; gyroscope; picture-in-picture"></iframe>--}}
                                                    </div>
                                                @endif
                                            @else
                                                <div class="slide-image slide-media" style="background-image:url({{asset(!empty($theme->curator_banner_img) ? $theme->curator_banner_img : 'images/banner_cd.png')}});">
                                                    <img data-lazy="{{asset(!empty($theme->curator_banner_img) ? $theme->curator_banner_img : 'images/banner_cd.png')}}" class="image-entity" />
                                                </div>
                                            @endif
                                        </figure>
                                    </div>
                                @endif

                            @endif
                        @endforeach
                    @else
                        <div class="item-title text-ellipsis notFoundCampaign">
                            <h3 class="" style="text-align:center;font-size: 30px;">Not Campaign Found</h3>
                        </div>
                    @endif
                </section>
            </div>
        {{--    Slider        --}}

            <div class="page-title m-b">
                <h1 class="inline m-a-0">{{ __('Upcoming Sounds featured tracks') }}</h1>
            </div>

            <div class="row row-sm item-masonry item-info-overlay">
                <div class="col-sm-6 text-white m-b-sm">
                    <div class="owl-carousel owl-theme owl-dots-sm owl-dots-bottom-left " data-ui-jp="owlCarousel" data-ui-options="{
		                     items: 1
		                    ,loop: true
		                    ,autoplay: true
		                    ,nav: true
		                    ,animateOut:&#x27;fadeOut&#x27;
		                  }">
                        @if(count($pro_premium_campaigns) > 0)
                            @foreach($pro_premium_campaigns as $pro_premium_campaign)
                                <div class="item r" data-id="item-{{$pro_premium_campaign->artistTrack->id}}" data-src="{{URL('/')}}/uploads/audio/{{$pro_premium_campaign->artistTrack->audio}}">
                                    <div class="item-media primary">
                                        @if(!empty($pro_premium_campaign->artistTrack->track_thumbnail))
                                            <a href="javascript:void(0)" class="item-media-content"
                                               style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$pro_premium_campaign->artistTrack->track_thumbnail}});"></a>
                                        @else
                                            <a href="javascript:void(0)"  class="item-media-content"
                                               style="background-image: url({{asset('images/b4.jpg')}});"></a>
                                        @endif

                                        @if(!empty($pro_premium_campaign->artistTrack->audio))
                                            <div class="item-overlay center">
                                                <button  class="btn-playpause">Play</button>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="item-info">
                                        <div class="item-overlay bottom text-right">

                                            @if(!empty($pro_premium_campaign->curatorFavoriteTrack) && $pro_premium_campaign->curatorFavoriteTrack->status == \App\Templates\IFavoriteTrackStatus::SAVE)
                                                <a href="javascript:void(0)" class="btn-favorite" @if($pro_premium_campaign->artistTrack) onclick="favoriteTrack({{$pro_premium_campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                                    <i class=" {{ !empty($pro_premium_campaign->curatorFavoriteTrack) ? 'fa fa-heart colorAdd' : 'fa fa-heart-o' }}"></i>
                                                </a>
                                            @else
                                                @if(empty($pro_premium_campaign->curatorFavoriteTrack))
                                                    <a href="javascript:void(0)" class="btn-favorite" @if($pro_premium_campaign->artistTrack) onclick="favoriteTrack({{$pro_premium_campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                @endif
                                            @endif

                                            {{--                                            <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
                                            <div class="dropdown-menu pull-right black lt"></div>
                                        </div>
                                        <div class="item-title text-ellipsis">
                                            <a href="javascript:void(0)" >{{$pro_premium_campaign->artistTrack->name}}</a>
                                        </div>
                                        {{--                                        <div class="item-author text-sm text-ellipsis">--}}
                                        {{--                                            <a href="javascript:void(0)" class="text-muted">Nouvelle</a>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="item-title text-ellipsis">
                                <h3 class="white" style="text-align:center;font-size: 15px;">Not Campaign Found</h3>
                            </div>
                        @endif
                    </div>
                </div>

                @if(count($pro_campaigns) > 0)
                    @foreach($pro_campaigns as $pro_campaign)
                        <div class="col-sm-3 col-xs-6">
                            <div class="item r" data-id="item-{{$pro_campaign->artistTrack->id}}" data-src="{{URL('/')}}/uploads/audio/{{$pro_campaign->artistTrack->audio}}">
                                <div class="item-media ">
                                    @if(!empty($pro_campaign->artistTrack->track_thumbnail))
                                        <a href="javascript:void(0)" class="item-media-content"
                                           style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$pro_campaign->artistTrack->track_thumbnail}});"></a>
                                    @else
                                        <a href="javascript:void(0)"  class="item-media-content"
                                           style="background-image: url({{asset('images/b4.jpg')}});"></a>
                                    @endif

                                    @if(!empty($pro_campaign->artistTrack->audio))
                                        <div class="item-overlay center">
                                            <button  class="btn-playpause">Play</button>
                                        </div>
                                    @endif
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        @if(!empty($pro_campaign->curatorFavoriteTrack) && $pro_campaign->curatorFavoriteTrack->status == \App\Templates\IFavoriteTrackStatus::SAVE)
                                            <a href="javascript:void(0)" class="btn-favorite" @if($pro_campaign->artistTrack) onclick="favoriteTrack({{$pro_campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                                <i class=" {{ !empty($pro_campaign->curatorFavoriteTrack) ? 'fa fa-heart colorAdd' : 'fa fa-heart-o' }}"></i>
                                            </a>
                                        @else
                                            @if(empty($pro_campaign->curatorFavoriteTrack))
                                                <a href="javascript:void(0)" class="btn-favorite" @if($pro_campaign->artistTrack) onclick="favoriteTrack({{$pro_campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                            @endif
                                        @endif
                                        {{--                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
                                        <div class="dropdown-menu pull-right black lt"></div>
                                    </div>
                                    <div class="item-title text-ellipsis">
                                        <a href="javascript:void(0)" >{{$pro_campaign->artistTrack->name}}</a>
                                    </div>
                                    <div class="item-author text-sm text-ellipsis ">
                                        {{--                                        <a href="javascript:void(0)" class="text-muted">Summerella</a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="item-title text-ellipsis">
                        <h3 class="white" style="text-align:center;font-size: 15px;">Not Pro Campaign Found</h3>
                    </div>
                @endif
            </div>
        </div>
{{--        @include('pages.artists.artist-promote-your-track.collapsed_sidebar')--}}
        <div class="row-col">
            <div class="col-lg-9 b-r no-border-md">
                <div class="padding">
                    <h2 class="widget-title h4 m-b">Trending</h2>
                    <div class="owl-carousel owl-theme owl-dots-center" data-ui-jp="owlCarousel" data-ui-options="{
					margin: 20,
					responsiveClass:true,
				    responsive:{
				    	0:{
				    		items: 2
				    	},
				        543:{
				            items: 3
				        }
				    }
				}">
                        @if(count($advance_campaigns) > 0)
                            @foreach($advance_campaigns as $advance_campaign)
                                <div class="">
                                    <div class="item r" data-id="item-{{$advance_campaign->artistTrack->id}}" data-src="{{URL('/')}}/uploads/audio/{{$advance_campaign->artistTrack->audio}}">
                                        <div class="item-media item-media-4by3">
                                            @if(!empty($advance_campaign->artistTrack->track_thumbnail))
                                                <a href="javascript:void(0)" class="item-media-content"
                                                   style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$advance_campaign->artistTrack->track_thumbnail}});"></a>
                                            @else
                                                <a href="javascript:void(0)"  class="item-media-content"
                                                   style="background-image: url({{asset('images/b4.jpg')}});"></a>
                                            @endif

                                            @if(!empty($advance_campaign->artistTrack->audio))
                                                <div class="item-overlay center">
                                                    <button  class="btn-playpause">Play</button>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="item-info">
                                            <div class="item-overlay bottom text-right">
                                                @if(!empty($advance_campaign->curatorFavoriteTrack) && $advance_campaign->curatorFavoriteTrack->status == \App\Templates\IFavoriteTrackStatus::SAVE)
                                                    <a href="javascript:void(0)" class="btn-favorite" @if($advance_campaign->artistTrack) onclick="favoriteTrack({{$advance_campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                                        <i class=" {{ !empty($advance_campaign->curatorFavoriteTrack) ? 'fa fa-heart colorAdd' : 'fa fa-heart-o' }}"></i>
                                                    </a>
                                                @else
                                                    @if(empty($advance_campaign->curatorFavoriteTrack))
                                                        <a href="javascript:void(0)" class="btn-favorite" @if($advance_campaign->artistTrack) onclick="favoriteTrack({{$advance_campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                    @endif
                                                @endif
                                                {{--                                                <a href="javascript:void(0)" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
                                                <div class="dropdown-menu pull-right black lt"></div>
                                            </div>
                                            <div class="item-title text-ellipsis">
                                                <a href="javascript:void(0)" >{{$advance_campaign->artistTrack->name}}</a>
                                            </div>
                                            <div class="item-author text-sm text-ellipsis ">
                                                {{--                                                <a href="javascript:void(0)" class="text-muted">Radionomy</a>--}}
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="item-title text-ellipsis">
                                <h3 class="white" style="text-align:center;font-size: 15px;">Not Trending Found</h3>
                            </div>
                        @endif
                    </div>

                    {{-- Trendng Handle Admin Side --}}
                    <h2 class="widget-title h4 m-b">Trending</h2>
                    <div class="owl-carousel owl-theme owl-dots-center" data-ui-jp="owlCarousel" data-ui-options="{
					margin: 20,
					responsiveClass:true,
				    responsive:{
				    	0:{
				    		items: 2
				    	},
				        543:{
				            items: 3
				        }
				    }
				}">

                        @if(count($trending_campaigns) > 0)
                            @foreach($trending_campaigns as $trending_campaign)
                                <div class="">
                                    <div class="item r" data-id="item-{{$trending_campaign->artistTrack->id}}" data-src="{{URL('/')}}/uploads/audio/{{$trending_campaign->artistTrack->audio}}">
                                        <div class="item-media item-media-4by3">
                                            @if(!empty($trending_campaign->artistTrack->track_thumbnail))
                                                <a href="javascript:void(0)" class="item-media-content"
                                                   style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$trending_campaign->artistTrack->track_thumbnail}});"></a>
                                            @else
                                                <a href="javascript:void(0)"  class="item-media-content"
                                                   style="background-image: url({{asset('images/b4.jpg')}});"></a>
                                            @endif

                                            @if(!empty($trending_campaign->artistTrack->audio))
                                                <div class="item-overlay center">
                                                    <button  class="btn-playpause">Play</button>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="item-info">
                                            <div class="item-overlay bottom text-right">
                                                @if(!empty($trending_campaign->curatorFavoriteTrack) && $trending_campaign->curatorFavoriteTrack->status == \App\Templates\IFavoriteTrackStatus::SAVE)
                                                    <a href="javascript:void(0)" class="btn-favorite" @if($trending_campaign->artistTrack) onclick="favoriteTrack({{$trending_campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                                        <i class=" {{ !empty($trending_campaign->curatorFavoriteTrack) ? 'fa fa-heart colorAdd' : 'fa fa-heart-o' }}"></i>
                                                    </a>
                                                @else
                                                    @if(empty($trending_campaign->curatorFavoriteTrack))
                                                        <a href="javascript:void(0)" class="btn-favorite" @if($trending_campaign->artistTrack) onclick="favoriteTrack({{$trending_campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                    @endif
                                                @endif
                                                {{--                                                <a href="javascript:void(0)" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
                                                <div class="dropdown-menu pull-right black lt"></div>
                                            </div>
                                            <div class="item-title text-ellipsis">
                                                <a href="javascript:void(0)" >{{$trending_campaign->artistTrack->name}}</a>
                                            </div>
                                            <div class="item-author text-sm text-ellipsis ">
                                                {{--                                                <a href="javascript:void(0)" class="text-muted">Radionomy</a>--}}
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="item-title text-ellipsis">
                                <h3 class="white" style="text-align:center;font-size: 15px;">Not Trending Found</h3>
                            </div>
                        @endif
                    </div>
                    {{-- Trendng Handle Admin Side --}}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="dropdown inline">
                                <h2 class="inline widget-title h4">New</h2>
                                <button class="btn btn-sm no-bg h4 m-y-0 v-b faFIlter dropdown-toggle text-primary" data-toggle="dropdown">
                                    <i class="fa fa-filter"></i>
                                </button>
                                @if(!empty($curator_features))
                                    <div class="dropdown-menu">
                                        @foreach($curator_features as $curator_feature)
                                            <a href="javascript:void(0)" class="dropdown-item">{{$curator_feature->name}}</a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @if(count($standard_campaigns) > 0)
                            @foreach($standard_campaigns as $standard_campaign)
                                <div class="col-xs-4 col-sm-4 col-md-3">
                                    <div class="item r" data-id="item-{{$standard_campaign->artistTrack->id}}" data-src="{{URL('/')}}/uploads/audio/{{$standard_campaign->artistTrack->audio}}">
                                        <div class="item-media ">
                                            @if(!empty($standard_campaign->artistTrack->track_thumbnail))
                                                <a href="javascript:void(0)" class="item-media-content"
                                                   style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$standard_campaign->artistTrack->track_thumbnail}});"></a>
                                            @else
                                                <a href="javascript:void(0)" class="item-media-content"
                                                   style="background-image: url({{asset('images/b2.jpg')}});"></a>
                                            @endif

                                            @if(!empty($standard_campaign->artistTrack->audio))
                                                <div class="item-overlay center">
                                                    <button  class="btn-playpause">Play</button>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="item-info">
                                            <div class="item-overlay bottom text-right">
                                                @if(!empty($standard_campaign->curatorFavoriteTrack) && $standard_campaign->curatorFavoriteTrack->status == \App\Templates\IFavoriteTrackStatus::SAVE)
                                                    <a href="javascript:void(0)" class="btn-favorite" @if($standard_campaign->artistTrack) onclick="favoriteTrack({{$standard_campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                                        <i class=" {{ !empty($standard_campaign->curatorFavoriteTrack) ? 'fa fa-heart colorAdd' : 'fa fa-heart-o' }}"></i>
                                                    </a>
                                                @else
                                                    @if(empty($standard_campaign->curatorFavoriteTrack))
                                                        <a href="javascript:void(0)" class="btn-favorite" @if($standard_campaign->artistTrack) onclick="favoriteTrack({{$standard_campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                    @endif
                                                @endif
                                                {{--                                                <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
                                                <div class="dropdown-menu pull-right black lt"></div>
                                            </div>
                                            <div class="item-title text-ellipsis">
                                                <a href="javascript:void(0)" >{{$standard_campaign->artistTrack->name}}</a>
                                            </div>
                                            <div class="item-author text-sm text-ellipsis ">
                                                {{--                                                <a href="javascript:void(0)" class="text-muted">Jeremy Scott</a>--}}
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="item-title text-ellipsis">
                                <h3 class="white" style="text-align:center;font-size: 15px;">Not New Found</h3>
                            </div>
                        @endif
                    </div>
                    <h2 class="widget-title h4 m-b">Recommend for you</h2>
                    <div class="row item-list item-list-md m-b">
                        @if(count($recommendSubmitCoverages) > 0)
                            @foreach($recommendSubmitCoverages as $recommendSubmitCoverage)
                                <div class="col-sm-6">
                                    <div class="item r" data-id="item-5"">

                                        <div class="item-media ">
                                            @if(!empty($recommendSubmitCoverage->artistTrack->track_thumbnail))
                                                <a href="javascript:void(0)" class="item-media-content"
                                                   style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$recommendSubmitCoverage->artistTrack->track_thumbnail}});"></a>
                                            @else
                                                <a href="javascript:void(0)" class="item-media-content"
                                                   style="background-image: url({{asset('images/b4.jpg')}});"></a>
                                            @endif

                                            {{--                                            <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b4.jpg');"></a>--}}
                                        </div>
                                        <div class="item-info">
                                            <div class="item-title text-ellipsis">
                                                <a href="javascript:void(0)">{{$recommendSubmitCoverage->artistTrack->name}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="item-title text-ellipsis">
                                <h3 class="white" style="text-align:center;font-size: 15px;">Not Recommend Found</h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @include('pages.artists.panels.right-sidebar')
        </div>
    </div>

    <!-- ############ PAGE END-->
@endsection

@section('page-script')
    <script src="{{asset('js/custom/curator/curator-dashboard.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
    <script>
        // function openNav() {
        //     document.getElementById("mySidebarCollapsed").style.width = "490px";
        //     document.getElementById("app-body").style.marginLeft = "490px";
        // }
        //
        // function closeNav() {
        //     document.getElementById("mySidebarCollapsed").style.width = "0";
        //     document.getElementById("app-body").style.marginLeft= "0";
        // }
    </script>
@endsection
