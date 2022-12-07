@extends('pages.artists.panels.layout')

{{-- page title --}}
@section('title','Promote Your Track')

@section('page-style')
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
    </style>
@endsection

@section('content')
    <!-- ############ PAGE START-->

    <div class="page-content">

        <div class="padding p-b-0">
            <div class="page-title m-b">
                <h1 class="inline m-a-0">Welcome {{($user_artist) ? $user_artist->name : ''}} ready to promote your track?</h1>
            </div>
            <div class="page-title m-b-2">
                <a class="btn btn-lg rounded add_your_track" href="{{url('/promote-your-track')}}">
                    <div class="btnTitle">Add your track</div>
                    <div class="btnSubtitle">
                        And get access to {{ $curators }} curators & pros
                    </div>
                </a>
{{--                <h2 class="widget-title h4 m-b">--}}
{{--                    And get access to 1249 curators & pros--}}
{{--                </h2>--}}
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
                        <div class="item r" data-id="item-115" data-src="http://api.soundcloud.com/tracks/239793212/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                            <div class="item-media primary">
                                <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/c1.jpg');"></a>
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
                                    <a href="javascript:void(0)">New Album from Nouvelle</a>
                                </div>
                                <div class="item-author text-sm text-ellipsis">
                                    <a href="javascript:void(0)" class="text-muted">Nouvelle</a>
                                </div>
                            </div>
                        </div>
                        <div class="item r" data-id="item-116" data-src="http://api.soundcloud.com/tracks/260682299/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                            <div class="item-media info">
                                <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/c2.jpg');"></a>
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
                                    <a href="javascript:void(0)">Blind Me</a>
                                </div>
                                <div class="item-author text-sm text-ellipsis">
                                    <a href="javascript:void(0)" class="text-muted">Fifty</a>
                                </div>
                            </div>
                        </div>
                        <div class="item r" data-id="item-117" data-src="http://api.soundcloud.com/tracks/232886537/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                            <div class="item-media accent">
                                <a href="javascript:void(0)" class="item-media-content" style="background-image: url('images/c3.jpg');"></a>
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
                                    <a href="javascript:void(0)">New Track from Pablo Nouvelle</a>
                                </div>
                                <div class="item-author text-sm text-ellipsis">
                                    <a href="javascript:void(0)" class="text-muted">Pablo Nouvelle</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
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
                <div class="col-sm-3 col-xs-6">
                    <div class="item r" data-id="item-2" data-src="{{URL('/')}}/uploads/audio/default_1668626804testmp3.mp3">
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
                <div class="col-sm-3 col-xs-6">
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
                <div class="col-sm-3 col-xs-6">
                    <div class="item r" data-id="item-4" data-src="{{URL('/')}}/uploads/audio/default_1668626804testmp3.mp3">
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
                        <div class="">
                            <div class="item r" data-id="item-5" data-src="{{URL('/')}}/uploads/audio/default_1668626804testmp3.mp3">
                                <div class="item-media item-media-4by3">
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
                        <div class="">
                            <div class="item r" data-id="item-7" data-src="{{URL('/')}}/uploads/audio/default_1668626804testmp3.mp3">
                                <div class="item-media item-media-4by3">
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
                        <div class="">
                            <div class="item r" data-id="item-11" data-src="{{URL('/')}}/uploads/audio/default_1668626804testmp3.mp3">
                                <div class="item-media item-media-4by3">
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
                        <div class="">
                            <div class="item r" data-id="item-3" data-src="http://api.soundcloud.com/tracks/79031167/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media item-media-4by3">
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
                        <div class="">
                            <div class="item r" data-id="item-10" data-src="http://api.soundcloud.com/tracks/237514750/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media item-media-4by3">
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
                        <div class="">
                            <div class="item r" data-id="item-4" data-src="{{URL('/')}}/uploads/audio/default_1668626804testmp3.mp3">
                                <div class="item-media item-media-4by3">
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
                        <div class="">
                            <div class="item r" data-id="item-2" data-src="{{URL('/')}}/uploads/audio/default_1668626804testmp3.mp3">
                                <div class="item-media item-media-4by3">
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
                        <div class="">
                            <div class="item r" data-id="item-6" data-src="http://api.soundcloud.com/tracks/236107824/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media item-media-4by3">
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
                    </div>
                    <h2 class="widget-title h4 m-b">New</h2>
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
                            <div class="item r" data-id="item-12" data-src="{{URL('/')}}/uploads/audio/default_1668626804testmp3.mp3">
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
                            <div class="item r" data-id="item-4" data-src="{{URL('/')}}/uploads/audio/default_1668626804testmp3.mp3">
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
                            <div class="item r" data-id="item-11" data-src="{{URL('/')}}/uploads/audio/default_1668626804testmp3.mp3">
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
                            <div class="item r" data-id="item-2" data-src="{{URL('/')}}/uploads/audio/default_1668626804testmp3.mp3">
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
                            <div class="item r" data-id="item-2" data-src="{{URL('/')}}/uploads/audio/default_1668626804testmp3.mp3">
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
                            <div class="item r" data-id="item-11" data-src="{{URL('/')}}/uploads/audio/default_1668626804testmp3.mp3">
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
                            <div class="item r" data-id="item-1" data-src="{{URL('/')}}/uploads/audio/default_1668626804testmp3.mp3">
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
                            <div class="item r" data-id="item-12" data-src="{{URL('/')}}/uploads/audio/default_1668626804testmp3.mp3">
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
                            <div class="item r" data-id="item-4" data-src="{{URL('/')}}/uploads/audio/default_1668626804testmp3.mp3">
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
            @include('pages.artists.panels.right-sidebar')
        </div>
    </div>

    <!-- ############ PAGE END-->
@endsection

@section('page-script')
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
