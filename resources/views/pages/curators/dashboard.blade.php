@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Dashboard')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('css/curator-dashboard.css') }}">
    <style>
        #loadings {
            background: rgba(255, 255, 255, .4) url({{asset('images/loader.gif')}}) no-repeat center center !important;
        }
    </style>
@endsection

@section('content')
    <!-- ############ PAGE START-->
    <div id="campaignAddRemove">
        @include('pages.curators.collapsed_sidebar')
    </div>
    <div class="page-content">
        <div class="padding p-b-0">
            <div class="con m-b">
                <div class="con__slide  con__slide--1">
                  <div class="con__slide-top con__slide--1-top active-slide-left-top">
                    <div class='con__slide-top-inner con__slide--1-top-inner'>
                      <div class='con__slide-top-inner-text con__slide--1-top-inner-text active-slide1-top-text'>
                        <h1 class='con__slide-h con__slide--1-top-h'>some nice slider<br> here wow</h1>
                      </div>
                      {{-- <div class='con__slide-top-inner-text con__slide--1-top-inner-text active-slide1-top-text'>
                        <p class="text-white">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque in ipsam nulla vero, animi pariatur unde facere optio officia cupiditate nihil rerum et a, fugiat excepturi modi qui ratione nesciunt.</p>
                      </div> --}}
                    </div>
                  </div>
                  <!--     slide--1 top end -->
                  <div class="con__slide-bot  con__slide--1-bot active-slide-left-bot">
                    <div class='con__slide-bot-text con__slide--1-bot-text active-slide1-bot-text'>
                      <h1 class='con__slide-h con__slide--1-bot-h'>some nice slider<br> here wow</h1>
                    </div>
                  </div>
                  <!--    slide--1 bot end -->
                  <div class="con__slide-content con__slide--1-content active-slide-left-content">
                    <svg class='con__slide--1-content-logo' version="1" xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 600.000000 600.000000"><path d="M280.5 13.6c-19 1.9-25.9 2.9-38.5 5.4-73.3 14.6-139.2 59.2-181.4 122.8-24.5 36.8-40.2 79.8-45.8 125.2-1.6 13.5-1.6 51.5 0 65 5.6 45.4 21.3 88.4 45.8 125.2 47.1 70.9 121.3 116.5 206.4 127 5.8.7 20.4 1.3 32.5 1.3 12.1 0 26.7-.6 32.5-1.3 115.7-14.2 209.7-93.7 242.6-205.1 3.8-12.9 7.7-31.8 9.6-47.1 1.6-13.5 1.6-51.4 0-65-5.6-45.4-21.3-88.4-45.8-125.2-46.2-69.6-118.6-115-201.5-126.3-10.9-1.5-48.1-2.7-56.4-1.9zm39 47.4c63.6 5.9 120.7 35.1 161.2 82.4 33.4 39.1 52.5 84.4 57.3 136.1 4.2 45.6-6.5 95.6-29 135.7-29.5 52.4-75.8 91.3-131.5 110.5-72.2 24.8-149.5 14.4-213.1-28.8-30.3-20.6-55.7-48.5-74.4-81.7-22.5-40.1-33.2-90.1-29-135.7 6.2-67.1 37.6-125.6 90-167.5 46.5-37.4 109.5-56.4 168.5-51z"/><path d="M295 123.3c-1.9.7-40.7 26.1-86.2 56.5-64.5 43-83.1 55.9-84.5 58.4-1.7 3.1-1.8 7.5-1.8 61.3 0 53.9.1 58.2 1.8 61.3 1.4 2.5 20.1 15.5 85.5 59.1 49.2 32.8 85.1 56 87 56.4 1.9.4 4.9.1 7-.6 2-.7 40.9-26.1 86.4-56.5 64.5-43 83.1-55.9 84.5-58.4 1.7-3.1 1.8-7.5 1.8-61.3 0-53.9-.1-58.2-1.8-61.3-1.4-2.5-20.1-15.5-85.8-59.2-46.1-30.8-84.5-56-85.2-56-.6 0-2.1-.2-3.2-.5s-3.6.1-5.5.8zm-11 78.9l-.1 35.3-32.8 21.8-32.9 21.9-26.6-17.8-26.6-17.7 58.7-39.3c32.4-21.6 59.1-39.3 59.6-39.3.4-.1.7 15.8.7 35.1zm91 4.1l59 39.4-26.6 17.7-26.6 17.8-32.9-21.9-32.8-21.8-.1-35.3c0-19.3.2-35.2.5-35.2s27.1 17.7 59.5 39.3zm-49.2 74.8c14.1 9.4 26 17.5 26.5 17.8 1 1-52.1 36.4-53.6 35.8-3.2-1.4-52.1-34.8-51.8-35.5.5-.9 51.3-35 52.4-35.1.4-.1 12.3 7.6 26.5 17zm-135.2 18.5s-8.5 5.8-18.8 12.8L153 325.1V274l18.9 12.7c10.4 7.1 18.8 12.8 18.7 12.9zm255.4-.1V325l-18.8-12.7-18.8-12.8 18.5-12.7c10.3-6.9 18.7-12.7 18.9-12.7.1-.1.2 11.4.2 25.4zm-194.8 40.2l32.7 21.8.1 35.2c0 19.4-.2 35.3-.5 35.3s-27.1-17.7-59.5-39.3l-59-39.4 26.2-17.6c14.5-9.6 26.5-17.6 26.8-17.6.3-.1 15.2 9.7 33.2 21.6zm156.3-4l26.5 17.6-59 39.4c-32.4 21.6-59.2 39.3-59.5 39.3-.3 0-.5-15.9-.5-35.3l.1-35.2 32.7-21.7c18-12 32.8-21.8 33-21.8.1 0 12.1 7.9 26.7 17.7z"/></svg>
                  </div>
                  <!--     slide--1 content end -->
                </div>
                <!-- slide--1 end -->

                <!--   slide 2 -->
                <div class="con__slide con__slide--right con__slide--2">
                  <div class="con__slide-top con__slide--right-top con__slide--2-top active-slide-right-top">
                    <div class='con__slide-top-inner con__slide--right-top-inner con__slide--2-top-inner'>
                      <div class='con__slide-top-inner-text con__slide--right-top-inner-text con__slide--2-top-inner-text active-slide2-top-text'>
                        <h1 class='con__slide-h con__slide--right-top-h con__slide--2-top-h'>another slide<br> such wow</h1>
                      </div>
                    </div>
                  </div>
                  <!--     slide--2 top end -->
                  <div class="con__slide-bot con__slide--right-bot con__slide--2-bot active-slide-right-bot">
                    <div class='con__slide-bot-text con__slide--right-bot-text con__slide--2-bot-text active-slide2-bot-text'>
                      <h1 class='con__slide-h con__slide--right-bot-h con__slide--2-bot-h'>another slide<br> such wow</h1>
                    </div>
                  </div>
                  <!--     slide--2 bot end -->
                  <div class="con__slide-content con__slide--right-content con__slide--2-content active-slide-right-content">
                    <img class='con__slide--right-content-image con__slide--2-content-image' src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/537051/doge_snow.png" alt="" />
                  </div>
                  <!--     slide--2 content end -->
                </div>
                <!-- slide--2 end -->

                <div class="con__slide con__slide--3">
                  <div class="con__slide-top  con__slide--3-top active-slide-left-top">
                    <div class='con__slide-top-inner con__slide--3-top-inner'>
                      <div class='con__slide-top-inner-text con__slide--3-top-inner-text active-slide3-top-text'>
                        <h1 class='con__slide-h con__slide--3-top-h'>half collored<br> text so nice</h1>
                      </div>
                    </div>
                  </div>
                  <!--    slide--3 top end -->
                  <div class="con__slide-bot  con__slide--3-bot active-slide-left-bot">
                    <div class='con__slide-bot-text con__slide--3-bot-text active-slide3-bot-text'>
                      <h1 class='con__slide-h  con__slide--3-bot-h'>half collored<br> text so nice</h1>
                    </div>
                  </div>
                  <!--    slide--3 bot end -->
                  <div class="con__slide-content con__slide--3-content active-slide-left-content">
                    <img class='con__slide--right-content-image con__slide--3-content-image' src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/537051/butterfly_(1).png" alt="" />
                  </div>
                  <!--     slide--3 content end -->
                </div>
                <!-- slide--3 end -->

                <div class="con__slide con__slide--right con__slide--4">
                  <div class="con__slide-top con__slide--right-top con__slide--4-top active-slide-right-top">
                    <div class='con__slide-top-inner con__slide--right-top-inner con__slide--4-top-inner'>
                      <div class='con__slide-top-inner-text con__slide--right-top-inner-text con__slide--4-top-inner-text active-slide4-top-text'>
                        <h1 class='con__slide-h con__slide--right-top-h con__slide--4-top-h'><a class='con__slide--4-top-h-link' href="https://codepen.io/mrspok407/" target="_blank">checkout my<br> other pens</a></h1>
                      </div>
                    </div>
                  </div>
                  <!--     slide--4 top end -->
                  <div class="con__slide-bot con__slide--right-bot con__slide--4-bot active-slide-right-bot">
                    <div class='con__slide-bot-text con__slide--right-bot-text con__slide--4-bot-text active-slide4-bot-text'>
                      <h1 class='con__slide-h con__slide--right-bot-h con__slide--4-bot-h'><a class='con__slide--4-bot-h-link' href="https://codepen.io/mrspok407/" target="_blank">checkout my<br> other pens</a></h1>
                    </div>
                  </div>
                  <!--     slide--4 bot end -->
                  <div class="con__slide-content con__slide--right-content con__slide--4-content active-slide-right-content">
                    <a href="https://twitter.com/mrspok407" target="_blank"><img class='con__slide--right-content-image con__slide--4-content-image' src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/537051/twi_(1).png" alt="" /></a>
                  </div>
                  <!--     slide--4 content end -->
                </div>
                <!-- slide--4 end -->

                <div class="con__nav">
                  <div data-target='up' class=' con__nav-scroll--goup'></div>
                  <div data-target='down' class=' con__nav-scroll--godown'></div>
                  <ul class='con__nav-list'>
                    <li data-target="1" class='con__nav-item con__nav-item--1 nav-active'></li>
                    <li data-target="2" class='con__nav-item con__nav-item--2'></li>
                    <li data-target="3" class='con__nav-item con__nav-item--3'></li>
                    <li data-target="4" class='con__nav-item con__nav-item--4'></li>
                  </ul>
                </div>
              <!--   nav end -->
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
                                <div class="item r" data-id="item-{{$pro_premium_campaign->artistTrack->id}}" data-src="{{URL('/')}}/uploads/audio/{{$pro_premium_campaign->artistTrack->audio}}">
                                    <div class="item-media primary">
                                        @if(!empty($pro_premium_campaign->artistTrack->track_thumbnail))
                                            <a href="javascript:void(0)" class="item-media-content" onclick="openNav({{$pro_premium_campaign->id}})"
                                               style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$pro_premium_campaign->artistTrack->track_thumbnail}});"></a>
                                        @else
                                            <a href="javascript:void(0)" onclick="openNav({{$pro_premium_campaign->id}})" class="item-media-content"
                                               style="background-image: url({{asset('images/b4.jpg')}});"></a>
                                        @endif
                                        <div class="item-overlay center">
                                            <button class="btn-playpause">Play</button>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="item-overlay bottom text-right">
                                            <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                            <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
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
                                <h3 class="white" style="text-align:center">Not Campaign Found</h3>
                            </div>
                        @endif
{{--                        <div class="item r" data-id="item-115" data-src="http://api.soundcloud.com/tracks/239793212/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">--}}
{{--                            <div class="item-media primary">--}}
{{--                                <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/c1.jpg');"></a>--}}
{{--                                <div class="item-overlay center">--}}
{{--                                    <button class="btn-playpause">Play</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="item-info">--}}
{{--                                <div class="item-overlay bottom text-right">--}}
{{--                                    <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>--}}
{{--                                    <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
{{--                                    <div class="dropdown-menu pull-right black lt"></div>--}}
{{--                                </div>--}}
{{--                                <div class="item-title text-ellipsis">--}}
{{--                                    <a href="javascript:void(0)">New Album from Nouvelle</a>--}}
{{--                                </div>--}}
{{--                                <div class="item-author text-sm text-ellipsis">--}}
{{--                                    <a href="javascript:void(0)" class="text-muted">Nouvelle</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="item r" data-id="item-116" data-src="http://api.soundcloud.com/tracks/260682299/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">--}}
{{--                            <div class="item-media info">--}}
{{--                                <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/c2.jpg');"></a>--}}
{{--                                <div class="item-overlay center">--}}
{{--                                    <button class="btn-playpause">Play</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="item-info">--}}
{{--                                <div class="item-overlay bottom text-right">--}}
{{--                                    <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>--}}
{{--                                    <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
{{--                                    <div class="dropdown-menu pull-right black lt"></div>--}}
{{--                                </div>--}}
{{--                                <div class="item-title text-ellipsis">--}}
{{--                                    <a href="javascript:void(0)">Blind Me</a>--}}
{{--                                </div>--}}
{{--                                <div class="item-author text-sm text-ellipsis">--}}
{{--                                    <a href="javascript:void(0)" class="text-muted">Fifty</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="item r" data-id="item-117" data-src="http://api.soundcloud.com/tracks/232886537/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">--}}
{{--                            <div class="item-media accent">--}}
{{--                                <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/c3.jpg');"></a>--}}
{{--                                <div class="item-overlay center">--}}
{{--                                    <button class="btn-playpause">Play</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="item-info">--}}
{{--                                <div class="item-overlay bottom text-right">--}}
{{--                                    <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>--}}
{{--                                    <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
{{--                                    <div class="dropdown-menu pull-right black lt"></div>--}}
{{--                                </div>--}}
{{--                                <div class="item-title text-ellipsis">--}}
{{--                                    <a href="javascript:void(0)">New Track from Pablo Nouvelle</a>--}}
{{--                                </div>--}}
{{--                                <div class="item-author text-sm text-ellipsis">--}}
{{--                                    <a href="javascript:void(0)" class="text-muted">Pablo Nouvelle</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>

                @if(count($pro_campaigns) > 0)
                    @foreach($pro_campaigns as $pro_campaign)
                        <div class="col-sm-3 col-xs-6">
                            <div class="item r" data-id="item-{{$pro_campaign->artistTrack->id}}" data-src="{{URL('/')}}/uploads/audio/{{$pro_campaign->artistTrack->audio}}">
                                <div class="item-media ">
                                    @if(!empty($pro_campaign->artistTrack->track_thumbnail))
                                        <a href="javascript:void(0)" class="item-media-content" onclick="openNav({{$pro_campaign->id}})"
                                           style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$pro_campaign->artistTrack->track_thumbnail}});"></a>
                                    @else
                                        <a href="javascript:void(0)" onclick="openNav({{$pro_campaign->id}})" class="item-media-content"
                                           style="background-image: url({{asset('images/b4.jpg')}});"></a>
                                    @endif
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
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
                        <h3 class="white" style="text-align:center">Not Pro Campaign Found</h3>
                    </div>
                @endif
{{--                <div class="col-sm-3 col-xs-6">--}}
{{--                    <div class="item r" data-id="item-1" data-src="http://api.soundcloud.com/tracks/269944843/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">--}}
{{--                        <div class="item-media ">--}}
{{--                            <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b0.jpg');"></a>--}}
{{--                            <div class="item-overlay center">--}}
{{--                                <button  class="btn-playpause">Play</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="item-info">--}}
{{--                            <div class="item-overlay bottom text-right">--}}
{{--                                <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>--}}
{{--                                <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
{{--                                <div class="dropdown-menu pull-right black lt"></div>--}}
{{--                            </div>--}}
{{--                            <div class="item-title text-ellipsis">--}}
{{--                                <a href="javascript:void(0)">Pull Up</a>--}}
{{--                            </div>--}}
{{--                            <div class="item-author text-sm text-ellipsis ">--}}
{{--                                <a href="javascript:void(0)" class="text-muted">Summerella</a>--}}
{{--                            </div>--}}


{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-3 col-xs-6">--}}
{{--                    <div class="item r" data-id="item-2" data-src="http://api.soundcloud.com/tracks/259445397/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">--}}
{{--                        <div class="item-media ">--}}
{{--                            <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b1.jpg');"></a>--}}
{{--                            <div class="item-overlay center">--}}
{{--                                <button  class="btn-playpause">Play</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="item-info">--}}
{{--                            <div class="item-overlay bottom text-right">--}}
{{--                                <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>--}}
{{--                                <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
{{--                                <div class="dropdown-menu pull-right black lt"></div>--}}
{{--                            </div>--}}
{{--                            <div class="item-title text-ellipsis">--}}
{{--                                <a href="javascript:void(0)">Fireworks</a>--}}
{{--                            </div>--}}
{{--                            <div class="item-author text-sm text-ellipsis ">--}}
{{--                                <a href="javascript:void(0)" class="text-muted">Kygo</a>--}}
{{--                            </div>--}}


{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-3 col-xs-6">--}}
{{--                    <div class="item r" data-id="item-3" data-src="http://api.soundcloud.com/tracks/79031167/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">--}}
{{--                        <div class="item-media ">--}}
{{--                            <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b2.jpg');"></a>--}}
{{--                            <div class="item-overlay center">--}}
{{--                                <button  class="btn-playpause">Play</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="item-info">--}}
{{--                            <div class="item-overlay bottom text-right">--}}
{{--                                <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>--}}
{{--                                <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
{{--                                <div class="dropdown-menu pull-right black lt"></div>--}}
{{--                            </div>--}}
{{--                            <div class="item-title text-ellipsis">--}}
{{--                                <a href="javascript:void(0)">I Wanna Be In the Cavalry</a>--}}
{{--                            </div>--}}
{{--                            <div class="item-author text-sm text-ellipsis ">--}}
{{--                                <a href="javascript:void(0)" class="text-muted">Jeremy Scott</a>--}}
{{--                            </div>--}}


{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-3 col-xs-6">--}}
{{--                    <div class="item r" data-id="item-4" data-src="http://api.soundcloud.com/tracks/230791292/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">--}}
{{--                        <div class="item-media ">--}}
{{--                            <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b3.jpg');"></a>--}}
{{--                            <div class="item-overlay center">--}}
{{--                                <button  class="btn-playpause">Play</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="item-info">--}}
{{--                            <div class="item-overlay bottom text-right">--}}
{{--                                <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>--}}
{{--                                <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
{{--                                <div class="dropdown-menu pull-right black lt"></div>--}}
{{--                            </div>--}}
{{--                            <div class="item-title text-ellipsis">--}}
{{--                                <a href="javascript:void(0)">What A Time To Be Alive</a>--}}
{{--                            </div>--}}
{{--                            <div class="item-author text-sm text-ellipsis ">--}}
{{--                                <a href="javascript:void(0)" class="text-muted">Judith Garcia</a>--}}
{{--                            </div>--}}


{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>

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
                                                <a href="javascript:void(0)" class="item-media-content" onclick="openNav({{$advance_campaign->id}})"
                                                   style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$advance_campaign->artistTrack->track_thumbnail}});"></a>
                                            @else
                                                <a href="javascript:void(0)" onclick="openNav({{$advance_campaign->id}})" class="item-media-content"
                                                   style="background-image: url({{asset('images/b4.jpg')}});"></a>
                                            @endif
                                            <div class="item-overlay center">
                                                <button  class="btn-playpause">Play</button>
                                            </div>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-overlay bottom text-right">
                                                <a href="javascript:void(0)" onclick="favorite({{$advance_campaign->id}})" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                                <a href="javascript:void(0)" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
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
                                <h3 class="white" style="text-align:center">Not Trending Found</h3>
                            </div>
                        @endif

{{--                        <div class="">--}}
{{--                            <div class="item r" data-id="item-5" data-src="http://streaming.radionomy.com/JamendoLounge">--}}
{{--                                <div class="item-media item-media-4by3">--}}
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
                    </div>

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
                                                <a href="javascript:void(0)" class="item-media-content" onclick="openNav({{$standard_campaign->id}})"
                                                   style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$standard_campaign->artistTrack->track_thumbnail}});"></a>
                                            @else
                                                <a href="javascript:void(0)" class="item-media-content" onclick="openNav({{$standard_campaign->id}})"
                                                   style="background-image: url({{asset('images/b2.jpg')}});"></a>
                                            @endif
                                            <div class="item-overlay center">
                                                <button  class="btn-playpause">Play</button>
                                            </div>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-overlay bottom text-right">
                                                <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                                <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu pull-right black lt"></div>
                                            </div>
                                            <div class="item-title text-ellipsis">
                                                <a href="javascript:void(0)" onclick="openNav({{$standard_campaign->id}})">{{$standard_campaign->artistTrack->name}}</a>
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
                                <h3 class="white" style="text-align:center">Not New Found</h3>
                            </div>
                        @endif
{{--                        <div class="col-xs-4 col-sm-4 col-md-3">--}}
{{--                            <div class="item r" data-id="item-3" data-src="http://api.soundcloud.com/tracks/79031167/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">--}}
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
                    </div>

                    <h2 class="widget-title h4 m-b">Tracks from labels</h2>
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-3">
                            <div class="item r" data-id="item-3" data-src="http://api.soundcloud.com/tracks/79031167/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b2.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
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
                        <div class="col-xs-4 col-sm-4 col-md-3">
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
                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
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
                        <div class="col-xs-4 col-sm-4 col-md-3">
                            <div class="item r" data-id="item-6" data-src="http://api.soundcloud.com/tracks/236107824/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b5.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                        <div class="dropdown-menu pull-right black lt"></div>
                                    </div>
                                    <div class="item-title text-ellipsis">
                                        <a href="javascript:void(0)">Body on me</a>
                                    </div>
                                    <div class="item-author text-sm text-ellipsis ">
                                        <a href="javascript:void(0)" class="text-muted">Rita Ora</a>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-3">
                            <div class="item r" data-id="item-10" data-src="http://api.soundcloud.com/tracks/237514750/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b9.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
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
                        <div class="col-xs-4 col-sm-4 col-md-3">
                            <div class="item r" data-id="item-12" data-src="http://api.soundcloud.com/tracks/174495152/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b11.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
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
                        <div class="col-xs-4 col-sm-4 col-md-3">
                            <div class="item r" data-id="item-4" data-src="http://api.soundcloud.com/tracks/230791292/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b3.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
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
                        <div class="col-xs-4 col-sm-4 col-md-3">
                            <div class="item r" data-id="item-11" data-src="http://api.soundcloud.com/tracks/218060449/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b10.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
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
                        <div class="col-xs-4 col-sm-4 col-md-3">
                            <div class="item r" data-id="item-2" data-src="http://api.soundcloud.com/tracks/259445397/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b1.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
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
                    </div>
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
                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
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
                            <div class="item r" data-id="item-2" data-src="http://api.soundcloud.com/tracks/259445397/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b1.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
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
                            <div class="item r" data-id="item-11" data-src="http://api.soundcloud.com/tracks/218060449/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b10.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
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
                            <div class="item r" data-id="item-1" data-src="http://api.soundcloud.com/tracks/269944843/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b0.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
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
                            <div class="item r" data-id="item-12" data-src="http://api.soundcloud.com/tracks/174495152/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b11.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
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
                            <div class="item r" data-id="item-4" data-src="http://api.soundcloud.com/tracks/230791292/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b3.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
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
                            <div class="item r" data-id="item-7" data-src="http://api.soundcloud.com/tracks/245566366/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b6.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
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
                            <div class="item r" data-id="item-9" data-src="http://api.soundcloud.com/tracks/264094434/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b8.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
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
                            <div class="item r" data-id="item-3" data-src="http://api.soundcloud.com/tracks/79031167/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b2.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
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
                            <div class="item r" data-id="item-10" data-src="http://api.soundcloud.com/tracks/237514750/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media ">
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/b9.jpg');"></a>
                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-overlay bottom text-right">
                                        <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
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
                        document.getElementById("mySidebarCollapsed").style.width = "490px";
                        document.getElementById("app-body").style.marginLeft = "490px";
                    }
                    if (data.error) {
                        toastr.error(data.error);
                    }
                },
            });
        }

        function closeNav() {
            document.getElementById("mySidebarCollapsed").style.width = "0";
            document.getElementById("app-body").style.marginLeft= "0";
        }
    </script>
@endsection
