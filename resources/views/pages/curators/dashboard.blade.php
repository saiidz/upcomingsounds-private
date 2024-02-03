@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Dashboard')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('css/curator-dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/gijgo.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css">
    <style>
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
    </style>
@endsection

@section('content')
    <!-- ############ PAGE START-->
{{--    <div id="campaignAddRemove">--}}
{{--        @include('pages.curators.collapsed_sidebar')--}}
{{--    </div>--}}
    <div class="page-content">
        <div class="padding p-b-0">
            <div class="con m-b" id="curatorBanner" style="background-color: transparent">
{{--            <div class="con m-b" id="curatorBanner" style="background: url({{asset(!empty($theme->curator_banner_img) ? $theme->curator_banner_img : 'images/banner_cd.png')}}) center center no-repeat;">--}}
                <header>
{{--                    <h1>SITE TITLE</h1>--}}
                </header>
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
                                            <h3 class="title animated bounceInLeft" @if($premium_campaign->artistTrack) onclick="openNav({{$premium_campaign->id}})" style="cursor:pointer; color:#e26e6b !important;" @endif>
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
                                                @if(!empty($premium_campaign->banner_img) && $premium_campaign->banner_img_status == 1)
                                                    <img class="border" src="{{asset('uploads/banner_img')}}/{{$premium_campaign->banner_img}}" alt="" />
                                                @else
                                                    @if(!empty($premium_campaign->track_id))
                                                        <img class="border" src="{{asset('images/border.png')}}" alt="" />
                                                    @endif
                                                @endif

{{--                                                    @if(!empty($theme_settings->curator_border) && $theme_settings->curator_border == 'on')--}}
{{--                                                        <img class="border" src="{{asset('images/border.png')}}" alt="" />--}}
{{--                                                    @endif--}}

                                                @if(!empty($premium_campaign->artistTrack) && !empty($premium_campaign->artistTrack->track_thumbnail))
                                                    <div class="trackThumbnail">
                                                        <img class="thumbnail" src="{{asset('uploads/track_thumbnail')}}/{{$premium_campaign->artistTrack->track_thumbnail}}" alt="" />
                                                    </div>
                                                @elseif(empty($premium_campaign->artistTrack) && !empty($premium_campaign->track_thumbnail))
                                                    <div class="trackThumbnail">
                                                        <img class="thumbnail" src="{{asset('uploads/track_thumbnail')}}/{{$premium_campaign->track_thumbnail}}" alt="" />
                                                    </div>
                                                @else
                                                    {{--                                                <div class="trackThumbnail">--}}
                                                    {{--                                                    <img class="thumbnail" src="{{asset('images/banner_cd.png')}}" alt="" />--}}
                                                    {{--                                                </div>--}}
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
                                <div class="item r" onclick="openNav({{$pro_premium_campaign->id}})" style="cursor:pointer;" data-id="item-{{$pro_premium_campaign->artistTrack->id}}" data-src="{{URL('/')}}/uploads/audio/{{$pro_premium_campaign->artistTrack->audio}}">
                                    <div class="item-media primary">
                                        @if(!empty($pro_premium_campaign->artistTrack->track_thumbnail))
                                            <a href="javascript:void(0)" class="item-media-content" onclick="openNav({{$pro_premium_campaign->id}})"
                                               style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$pro_premium_campaign->artistTrack->track_thumbnail}});"></a>
                                        @else
                                            <a href="javascript:void(0)" onclick="openNav({{$pro_premium_campaign->id}})" class="item-media-content"
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
                                            <a href="javascript:void(0)" onclick="openNav({{$pro_premium_campaign->id}})">{{$pro_premium_campaign->artistTrack->name}}</a>
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
                            <div class="item r" onclick="openNav({{$pro_campaign->id}})" style="cursor:pointer;" data-id="item-{{$pro_campaign->artistTrack->id}}" data-src="{{URL('/')}}/uploads/audio/{{$pro_campaign->artistTrack->audio}}">
                                <div class="item-media ">
                                    @if(!empty($pro_campaign->artistTrack->track_thumbnail))
                                        <a href="javascript:void(0)" class="item-media-content" onclick="openNav({{$pro_campaign->id}})"
                                           style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$pro_campaign->artistTrack->track_thumbnail}});"></a>
                                    @else
                                        <a href="javascript:void(0)" onclick="openNav({{$pro_campaign->id}})" class="item-media-content"
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
                                        <a href="javascript:void(0)" onclick="openNav({{$pro_campaign->id}})">{{$pro_campaign->artistTrack->name}}</a>
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

        <div class="row-col">
            <div class="col-lg-8 b-r no-border-md">
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
                                    <div class="item r" onclick="openNav({{$advance_campaign->id}})" style="cursor:pointer;" data-id="item-{{$advance_campaign->artistTrack->id}}" data-src="{{URL('/')}}/uploads/audio/{{$advance_campaign->artistTrack->audio}}">
                                        <div class="item-media item-media-4by3">
                                            @if(!empty($advance_campaign->artistTrack->track_thumbnail))
                                                <a href="javascript:void(0)" class="item-media-content" onclick="openNav({{$advance_campaign->id}})"
                                                   style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$advance_campaign->artistTrack->track_thumbnail}});"></a>
                                            @else
                                                <a href="javascript:void(0)" onclick="openNav({{$advance_campaign->id}})" class="item-media-content"
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
                                                <a href="javascript:void(0)" onclick="openNav({{$advance_campaign->id}})">{{$advance_campaign->artistTrack->name}}</a>
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

                        @if(count($advance_campaigns) > 0)
                            @foreach($advance_campaigns as $advance_campaign)
                                <div class="">
                                    <div class="item r" onclick="openNav({{$advance_campaign->id}})" style="cursor:pointer;" data-id="item-{{$advance_campaign->artistTrack->id}}" data-src="{{URL('/')}}/uploads/audio/{{$advance_campaign->artistTrack->audio}}">
                                        <div class="item-media item-media-4by3">
                                            @if(!empty($advance_campaign->artistTrack->track_thumbnail))
                                                <a href="javascript:void(0)" class="item-media-content" onclick="openNav({{$advance_campaign->id}})"
                                                   style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$advance_campaign->artistTrack->track_thumbnail}});"></a>
                                            @else
                                                <a href="javascript:void(0)" onclick="openNav({{$advance_campaign->id}})" class="item-media-content"
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
                                                <a href="javascript:void(0)" onclick="openNav({{$advance_campaign->id}})">{{$advance_campaign->artistTrack->name}}</a>
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


                    {{--    New    --}}
{{--                    <div class="row">--}}
{{--                        @if(count($standard_campaigns) > 0)--}}
{{--                            @foreach($standard_campaigns as $standard_campaign)--}}
{{--                                <div class="col-xs-4 col-sm-4 col-md-3">--}}
{{--                                    <div class="item r" onclick="openNav({{$standard_campaign->id}})" style="cursor:pointer;" data-id="item-{{$standard_campaign->artistTrack->id}}" data-src="{{URL('/')}}/uploads/audio/{{$standard_campaign->artistTrack->audio}}">--}}
{{--                                        <div class="item-media ">--}}
{{--                                            @if(!empty($standard_campaign->artistTrack->track_thumbnail))--}}
{{--                                                <a href="javascript:void(0)" class="item-media-content" onclick="openNav({{$standard_campaign->id}})"--}}
{{--                                                   style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$standard_campaign->artistTrack->track_thumbnail}});"></a>--}}
{{--                                            @else--}}
{{--                                                <a href="javascript:void(0)" class="item-media-content" onclick="openNav({{$standard_campaign->id}})"--}}
{{--                                                   style="background-image: url({{asset('images/b2.jpg')}});"></a>--}}
{{--                                            @endif--}}

{{--                                            @if(!empty($standard_campaign->artistTrack->audio))--}}
{{--                                                <div class="item-overlay center">--}}
{{--                                                    <button  class="btn-playpause">Play</button>--}}
{{--                                                </div>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                        <div class="item-info">--}}
{{--                                            <div class="item-overlay bottom text-right">--}}
{{--                                                @if(!empty($standard_campaign->curatorFavoriteTrack) && $standard_campaign->curatorFavoriteTrack->status == \App\Templates\IFavoriteTrackStatus::SAVE)--}}
{{--                                                    <a href="javascript:void(0)" class="btn-favorite" @if($standard_campaign->artistTrack) onclick="favoriteTrack({{$standard_campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>--}}
{{--                                                        <i class=" {{ !empty($standard_campaign->curatorFavoriteTrack) ? 'fa fa-heart colorAdd' : 'fa fa-heart-o' }}"></i>--}}
{{--                                                    </a>--}}
{{--                                                @else--}}
{{--                                                    @if(empty($standard_campaign->curatorFavoriteTrack))--}}
{{--                                                        <a href="javascript:void(0)" class="btn-favorite" @if($standard_campaign->artistTrack) onclick="favoriteTrack({{$standard_campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>--}}
{{--                                                            <i class="fa fa-heart-o"></i>--}}
{{--                                                        </a>--}}
{{--                                                    @endif--}}
{{--                                                @endif--}}
{{--                                                <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
{{--                                                <div class="dropdown-menu pull-right black lt"></div>--}}
{{--                                            </div>--}}
{{--                                            <div class="item-title text-ellipsis">--}}
{{--                                                <a href="javascript:void(0)" onclick="openNav({{$standard_campaign->id}})">{{$standard_campaign->artistTrack->name}}</a>--}}
{{--                                            </div>--}}
{{--                                            <div class="item-author text-sm text-ellipsis ">--}}
{{--                                                <a href="javascript:void(0)" class="text-muted">Jeremy Scott</a>--}}
{{--                                            </div>--}}


{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        @else--}}
{{--                            <div class="item-title text-ellipsis">--}}
{{--                                <h3 class="white" style="text-align:center;font-size: 15px;">Not New Found</h3>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
                    <div class="row row-sm item-masonry item-info-overlay">
                        <div class="col-sm-12 text-white m-b-sm">
                            <div class="owl-carousel owl-theme owl-dots-sm owl-dots-bottom-left " data-ui-jp="owlCarousel" data-ui-options="{
                             items: 1
                            ,loop: true
                            ,autoplay: true
                            ,nav: true
                            ,animateOut:&#x27;fadeOut&#x27;
                          }">
                                @if(count($standard_campaigns) > 0)
                                    @foreach($standard_campaigns as $standard_campaign)
                                        <div class="item r" onclick="openNav({{$standard_campaign->id}})" style="cursor:pointer;" data-id="item-{{$standard_campaign->artistTrack->id}}" data-src="{{URL('/')}}/uploads/audio/{{$standard_campaign->artistTrack->audio}}">
                                            <div class="item-media primary">
                                                @if(!empty($standard_campaign->artistTrack->track_thumbnail))
                                                    <a href="javascript:void(0)" class="item-media-content" onclick="openNav({{$standard_campaign->id}})"
                                                       style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$standard_campaign->artistTrack->track_thumbnail}});"></a>
                                                @else
                                                    <a href="javascript:void(0)" onclick="openNav({{$standard_campaign->id}})" class="item-media-content"
                                                       style="background-image: url({{asset('images/b4.jpg')}});"></a>
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
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis">
                                                    <a href="javascript:void(0)" onclick="openNav({{$standard_campaign->id}})">{{$standard_campaign->artistTrack->name}}</a>
                                                </div>
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
                    </div>
                    {{--    New    --}}


{{--                    <h2 class="widget-title h4 m-b">Tracks from labels</h2>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-xs-4 col-sm-4 col-md-3">--}}
{{--                            <div class="item r" data-id="item-3" data-src="">--}}
{{--                                <div class="item-media ">--}}
{{--                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b2.jpg');"></a>--}}
{{--                                    <div class="item-overlay center">--}}
{{--                                        <button  class="btn-playpause">Play</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="item-info">--}}
{{--                                    <div class="item-overlay bottom text-right">--}}
{{--                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>--}}
{{--                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
{{--                                        <div class="dropdown-menu pull-right black lt"></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-title text-ellipsis">--}}
{{--                                        <a href="javascript:void(0)">I Wanna Be In the Cavalry</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-author text-sm text-ellipsis ">--}}
{{--                                        <a href="javascript:void(0)" class="text-muted">Jeremy Scott</a>--}}
{{--                                    </div>--}}


{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-4 col-sm-4 col-md-3">--}}
{{--                            <div class="item r" data-id="item-5" data-src="http://streaming.radionomy.com/JamendoLounge">--}}
{{--                                <div class="item-media ">--}}
{{--                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b4.jpg');"></a>--}}
{{--                                    <div class="item-overlay center">--}}
{{--                                        <button  class="btn-playpause">Play</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="item-info">--}}
{{--                                    <div class="item-overlay bottom text-right">--}}
{{--                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>--}}
{{--                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
{{--                                        <div class="dropdown-menu pull-right black lt"></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-title text-ellipsis">--}}
{{--                                        <a href="javascript:void(0)">Live Radio</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-author text-sm text-ellipsis ">--}}
{{--                                        <a href="javascript:void(0)" class="text-muted">Radionomy</a>--}}
{{--                                    </div>--}}


{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-4 col-sm-4 col-md-3">--}}
{{--                            <div class="item r" data-id="item-6" data-src="">--}}
{{--                                <div class="item-media ">--}}
{{--                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b5.jpg');"></a>--}}
{{--                                    <div class="item-overlay center">--}}
{{--                                        <button  class="btn-playpause">Play</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="item-info">--}}
{{--                                    <div class="item-overlay bottom text-right">--}}
{{--                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>--}}
{{--                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
{{--                                        <div class="dropdown-menu pull-right black lt"></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-title text-ellipsis">--}}
{{--                                        <a href="javascript:void(0)">Body on me</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-author text-sm text-ellipsis ">--}}
{{--                                        <a href="javascript:void(0)" class="text-muted">Rita Ora</a>--}}
{{--                                    </div>--}}


{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-4 col-sm-4 col-md-3">--}}
{{--                            <div class="item r" data-id="item-10" data-src="">--}}
{{--                                <div class="item-media ">--}}
{{--                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b9.jpg');"></a>--}}
{{--                                    <div class="item-overlay center">--}}
{{--                                        <button  class="btn-playpause">Play</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="item-info">--}}
{{--                                    <div class="item-overlay bottom text-right">--}}
{{--                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>--}}
{{--                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
{{--                                        <div class="dropdown-menu pull-right black lt"></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-title text-ellipsis">--}}
{{--                                        <a href="javascript:void(0)">The Open Road</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-author text-sm text-ellipsis ">--}}
{{--                                        <a href="javascript:void(0)" class="text-muted">Postiljonen</a>--}}
{{--                                    </div>--}}


{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-4 col-sm-4 col-md-3">--}}
{{--                            <div class="item r" data-id="item-12" data-src="">--}}
{{--                                <div class="item-media ">--}}
{{--                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b11.jpg');"></a>--}}
{{--                                    <div class="item-overlay center">--}}
{{--                                        <button  class="btn-playpause">Play</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="item-info">--}}
{{--                                    <div class="item-overlay bottom text-right">--}}
{{--                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>--}}
{{--                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
{{--                                        <div class="dropdown-menu pull-right black lt"></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-title text-ellipsis">--}}
{{--                                        <a href="javascript:void(0)">Happy ending</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-author text-sm text-ellipsis ">--}}
{{--                                        <a href="javascript:void(0)" class="text-muted">Postiljonen</a>--}}
{{--                                    </div>--}}


{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-4 col-sm-4 col-md-3">--}}
{{--                            <div class="item r" data-id="item-4" data-src="">--}}
{{--                                <div class="item-media ">--}}
{{--                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b3.jpg');"></a>--}}
{{--                                    <div class="item-overlay center">--}}
{{--                                        <button  class="btn-playpause">Play</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="item-info">--}}
{{--                                    <div class="item-overlay bottom text-right">--}}
{{--                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>--}}
{{--                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
{{--                                        <div class="dropdown-menu pull-right black lt"></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-title text-ellipsis">--}}
{{--                                        <a href="javascript:void(0)">What A Time To Be Alive</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-author text-sm text-ellipsis ">--}}
{{--                                        <a href="javascript:void(0)" class="text-muted">Judith Garcia</a>--}}
{{--                                    </div>--}}


{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-4 col-sm-4 col-md-3">--}}
{{--                            <div class="item r" data-id="item-11" data-src="">--}}
{{--                                <div class="item-media ">--}}
{{--                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b10.jpg');"></a>--}}
{{--                                    <div class="item-overlay center">--}}
{{--                                        <button  class="btn-playpause">Play</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="item-info">--}}
{{--                                    <div class="item-overlay bottom text-right">--}}
{{--                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>--}}
{{--                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
{{--                                        <div class="dropdown-menu pull-right black lt"></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-title text-ellipsis">--}}
{{--                                        <a href="javascript:void(0)">Spring</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-author text-sm text-ellipsis ">--}}
{{--                                        <a href="javascript:void(0)" class="text-muted">Pablo Nouvelle</a>--}}
{{--                                    </div>--}}


{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-4 col-sm-4 col-md-3">--}}
{{--                            <div class="item r" data-id="item-2" data-src="">--}}
{{--                                <div class="item-media ">--}}
{{--                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b1.jpg');"></a>--}}
{{--                                    <div class="item-overlay center">--}}
{{--                                        <button  class="btn-playpause">Play</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="item-info">--}}
{{--                                    <div class="item-overlay bottom text-right">--}}
{{--                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>--}}
{{--                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
{{--                                        <div class="dropdown-menu pull-right black lt"></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-title text-ellipsis">--}}
{{--                                        <a href="javascript:void(0)">Fireworks</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-author text-sm text-ellipsis ">--}}
{{--                                        <a href="javascript:void(0)" class="text-muted">Kygo</a>--}}
{{--                                    </div>--}}


{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


                    <h2 class="widget-title h4 m-b">Recommand for you</h2>
                    <div class="row item-list item-list-md m-b">
                        <div class="col-sm-6">
                            <div class="item r" data-id="item-5" data-src="http://streaming.radionomy.com/JamendoLounge">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b4.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
{{--                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
                                        <div class="dropdown-menu pull-right black lt"></div>
                                    </div>
                                    <div class="item-title text-ellipsis">
                                        <a href="javascript:void(0)">Live Radio</a>
                                    </div>
                                    <div class="item-author text-sm text-ellipsis ">
                                        <a href="javascript:void(0)" class="text-muted">Radionomy</a>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="item r" data-id="item-2" data-src="">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b1.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
{{--                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
                                        <div class="dropdown-menu pull-right black lt"></div>
                                    </div>
                                    <div class="item-title text-ellipsis">
                                        <a href="javascript:void(0)">Fireworks</a>
                                    </div>
                                    <div class="item-author text-sm text-ellipsis ">
                                        <a href="javascript:void(0)" class="text-muted">Kygo</a>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="item r" data-id="item-11" data-src="">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b10.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
{{--                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
                                        <div class="dropdown-menu pull-right black lt"></div>
                                    </div>
                                    <div class="item-title text-ellipsis">
                                        <a href="javascript:void(0)">Spring</a>
                                    </div>
                                    <div class="item-author text-sm text-ellipsis ">
                                        <a href="javascript:void(0)" class="text-muted">Pablo Nouvelle</a>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="item r" data-id="item-1" data-src="">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b0.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
{{--                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
                                        <div class="dropdown-menu pull-right black lt"></div>
                                    </div>
                                    <div class="item-title text-ellipsis">
                                        <a href="javascript:void(0)">Pull Up</a>
                                    </div>
                                    <div class="item-author text-sm text-ellipsis ">
                                        <a href="javascript:void(0)" class="text-muted">Summerella</a>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="item r" data-id="item-12" data-src="">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b11.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
{{--                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
                                        <div class="dropdown-menu pull-right black lt"></div>
                                    </div>
                                    <div class="item-title text-ellipsis">
                                        <a href="javascript:void(0)">Happy ending</a>
                                    </div>
                                    <div class="item-author text-sm text-ellipsis ">
                                        <a href="javascript:void(0)" class="text-muted">Postiljonen</a>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="item r" data-id="item-4" data-src="">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b3.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
{{--                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
                                        <div class="dropdown-menu pull-right black lt"></div>
                                    </div>
                                    <div class="item-title text-ellipsis">
                                        <a href="javascript:void(0)">What A Time To Be Alive</a>
                                    </div>
                                    <div class="item-author text-sm text-ellipsis ">
                                        <a href="javascript:void(0)" class="text-muted">Judith Garcia</a>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="item r" data-id="item-7" data-src="">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b6.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
{{--                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
                                        <div class="dropdown-menu pull-right black lt"></div>
                                    </div>
                                    <div class="item-title text-ellipsis">
                                        <a href="javascript:void(0)">Reflection (Deluxe)</a>
                                    </div>
                                    <div class="item-author text-sm text-ellipsis ">
                                        <a href="javascript:void(0)" class="text-muted">Fifth Harmony</a>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="item r" data-id="item-9" data-src="">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b8.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
{{--                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
                                        <div class="dropdown-menu pull-right black lt"></div>
                                    </div>
                                    <div class="item-title text-ellipsis">
                                        <a href="javascript:void(0)">All I Need</a>
                                    </div>
                                    <div class="item-author text-sm text-ellipsis ">
                                        <a href="javascript:void(0)" class="text-muted">Pablo Nouvelle</a>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="item r" data-id="item-3" data-src="">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b2.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
{{--                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
                                        <div class="dropdown-menu pull-right black lt"></div>
                                    </div>
                                    <div class="item-title text-ellipsis">
                                        <a href="javascript:void(0)">I Wanna Be In the Cavalry</a>
                                    </div>
                                    <div class="item-author text-sm text-ellipsis ">
                                        <a href="javascript:void(0)" class="text-muted">Jeremy Scott</a>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="item r" data-id="item-10" data-src="">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b9.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
{{--                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
                                        <div class="dropdown-menu pull-right black lt"></div>
                                    </div>
                                    <div class="item-title text-ellipsis">
                                        <a href="javascript:void(0)">The Open Road</a>
                                    </div>
                                    <div class="item-author text-sm text-ellipsis ">
                                        <a href="javascript:void(0)" class="text-muted">Postiljonen</a>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('pages.curators.panels.right-sidebar')
        </div>
    </div>

    <!-- ############ PAGE END-->
@endsection

@section('page-script')
    <script src="{{asset('js/custom/curator/curator-dashboard.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
    <script>
        var preload = document.getElementById("loadings");
        function loader(){
            preload.style.display='none';
        }
        function showLoader(){
            preload.style.display='block';
        }
    </script>
    <script>
        function openNav(campaign_id) {
            showLoader();
            //send ajax
            $.ajax({
                type: "GET",
                url: '{{route('get.active.campaign')}}',
                data: {campaign_id:campaign_id},
                dataType: 'json',
                success: function (data) {
                    loader();
                    if (data.success) {
                        $('#campaignAddRemove').empty();
                        $('#campaignAddRemove').html(data.campaign);
                        $('#campaign_ID').val(data.campaign_id);
                        $('#mySidebarCollapsed').addClass('mySidebarCollapsed');
                        // remove offer on curator dashboard
                        $('#hideShowOffer').remove()
                        // show submit coverage
                        $('#submitCoverage').css('display', 'inline-block');
                        // document.getElementById("mySidebarCollapsed").style.width = "490px";
                        document.getElementById("app-body").style.marginLeft = "490px";
                    }
                    if (data.error) {
                        toastr.error(data.error);
                    }
                },
            });
        }

        function closeNav() {
            $('#mySidebarCollapsed').addClass('mySidebarCollapsedRemove');
            // document.getElementById("mySidebarCollapsed").style.width = "0";
            document.getElementById("app-body").style.marginLeft= "0";
        }

        // submit coverage work start
        function submitCoverage()
        {
            $('#camArtTraLink').css('display','none');
            $('#artistTrackTagsHideShow').css('display','none');
            $('#campaignBtnHideShow').css('display','none');

            $('#submitCoverageShowHide').css('display','block');
        }

        function backToSubmitCoverageShowHide()
        {
            $('#submitCoverageShowHide').css('display','none');

            $('#camArtTraLink').css('display','block');
            $('#artistTrackTagsHideShow').css('display','block');
            $('#campaignBtnHideShow').css('display','block');
        }
        function validateURL(url) {
            var reurl = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
            return reurl.test(url);
        }
        function finalSubmitCoverage(artist_id,track_id)
        {
            let campaign_ID = $('#campaign_ID').val()
            var typeSubmitCoverage = $('#typeSubmitCoverage option').filter(':selected').val();
            let messageSubmitCoverage = $('#messageSubmitCoverage').val()
            var linksSubmitCoverage = $("input[name='completion_url[]']")
                .map(function(){return $(this).val();}).get();

            if(typeSubmitCoverage == '')
            {
                toastr.error('Please Select Type');
                return false;
            }

            if(linksSubmitCoverage == '')
            {
                toastr.error('Please Add Links');
                return false;
            }

            $("input[name='completion_url[]']").each(function(){
                isValid = validateURL($(this).val());
                return isValid;
            });

            if (!isValid){
                toastr.error('Please enter a valid URL, remember including http://');
                return false;
            }

            if(messageSubmitCoverage == '')
            {
                toastr.error('Please Add Message');
                return false;
            }

            if(campaign_ID == '')
            {
                toastr.error('Problem in Offer Template');
                return false;
            }

            showLoader();
            $.ajax({
                type: "POST",
                url: '{{route('curator.store.submit.coverage')}}',
                data: {
                    offer_type_id:typeSubmitCoverage,
                    links:linksSubmitCoverage,
                    message:messageSubmitCoverage,
                    artistID:artist_id,
                    trackID:track_id,
                    campaign_ID:campaign_ID,
                },
                dataType: 'json',
                success: function (data) {
                    loader();
                    if (data.success) {
                        toastr.success(data.success);
                        window.location.replace('{{route('curator.submit.coverage')}}');
                    }
                    if (data.error) {
                        toastr.error(data.error);
                    }
                },
            })
        }
        // submit coverage work start
    </script>
    <script type="text/javascript">

        var counter = 2;

        function addLinkButton()
        {
            if(counter>5){
                toastr.error('Only 5 Links allow');
                // alert("Only 5 Links allow");
                return false;
            }

            var newTextBoxDiv = $(document.createElement('div'))
                .attr("id", 'TextBoxDiv' + counter);

            newTextBoxDiv.after().html('<div class="addEmbeded m-b" style="display: block !important;"><div class="addMoreLinks" style="width: 100% !important;"><input type="text" class="form-control moreLinks" name="completion_url[]" id="textbox' + counter + '" value="" placeholder="Please Add Completion Url"></div></div>');

            newTextBoxDiv.appendTo("#TextBoxesGroup");


            counter++;
        }

        function removeAddButton()
        {
            if(counter==2){
                toastr.error('No more textbox to remove');
                // alert("No more textbox to remove");
                return false;
            }

            counter--;

            $("#TextBoxDiv" + counter).remove();
        }

    </script>

    {{--Claim USC --}}
    <script>
        function addToWalletUSC()
        {
            let usc_wallet = $('.activeAmount').html();
            showLoader();
            $.ajax({
                type: "POST",
                url: '{{route('curator.store.usc.submit.coverage')}}',
                data: {
                    usc_wallet:usc_wallet,
                },
                dataType: 'json',
                success: function (data) {
                    loader();
                    if (data.success) {
                        toastr.success(data.success);
                        location.reload();
                    }
                    if (data.error) {
                        toastr.error(data.error);
                    }
                },
            })
        }
    </script>
    {{--Claim USC --}}
@endsection
