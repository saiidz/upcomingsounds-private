@extends('pages.artists.panels.layout')

{{-- page title --}}
@section('title','Public Profile Artist')

@section('page-style')
    <link rel="stylesheet" href="{{asset('css/custom/custom.css')}}" type="text/css" />
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
    <style>
        svg.svg-inline--fa {
            font-size: inherit !important;
        }
        /*.profile_public{*/
        /*    margin-left: 12.5rem;*/
        /*}*/
    </style>
@endsection

@section('content')
    <!-- ############ PAGE START-->
    <div class="page-content">
        <div class="padding b-b profile_public">
            <div class="row-col">
                <div class="col-sm w w-auto-xs m-b">
                    <div class="item w rounded">
                        <div class="item-media">
                            @php
                                $mystring = $user->profile;
                                $findhttps   = 'https';
                                $findhttp   = 'http';
                                $poshttps = strpos($mystring, $findhttps);

                                $poshttp = strpos($mystring, $findhttp);
                                if($poshttps != false){
                                    $pos = $poshttps;
                                }else{
                                    $pos = $poshttp;
                                }
                            @endphp
                            @if($pos === false)
                                @if(!empty($user->profile))
                                    <div class="item-media-content"
                                         style="background-image: url({{URL('/')}}/uploads/profile/{{$user->profile}});"></div>
                                @else
                                    <div class="item-media-content"
                                         style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                                @endif
                            @elseif($pos == 0)
                                <div class="item-media-content"
                                     style="background-image: url({{$user->profile}});"></div>
                            @else
                                <div class="item-media-content"
                                     style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="p-l-md no-padding-xs">
                        <div class="page-title">
                            <h1 class="inline">{{($user) ? $user->name : ''}}</h1>
                            <label class="fa fa-star text-primary text-lg m-b v-m m-l-xs" title="Pro"></label>
                        </div>
                        <p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis" style="font-size: 14px;">
                            @if(!empty($user->artistUser->artist_bio))
                                {{$user->artistUser->artist_bio}}
                            @endif
                        </p>
                        <div class="item-action m-b">
{{--                            <a class="btn btn-icon white rounded btn-share pull-right" href="javascript:void(0)" id="shareArtistProfile" data-url_root="{{route('artist.public.profile',$user->name)}}" data-toggle="modal" data-target="#share-modal">--}}
{{--                                <i class="fa fa-share-alt"></i>--}}
{{--                            </a>--}}
                            <button class="btn-playpause text-primary m-r-sm"></button>
                            <span>
                                @if(!empty($user->artistTrackAlbum))
                                    {{$user->artistTrackAlbum->count()}}
                                @endif Albums, @if(!empty($user->artistTrack))
                                        {{$user->artistTrack->count()}}
                                    @endif Tracks</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-col">
            <div class="col-lg-9 b-r no-border-md">
                <div class="padding">
                    <div class="nav-active-border b-primary bottom m-b-md">
                        <ul class="nav l-h-2x">
                            <li class="nav-item m-r inline">
                                <a class="nav-link active" href="#" data-toggle="tab" data-target="#tab_1">Overview</a>
                            </li>
                            <li class="nav-item m-r inline">
                                <a class="nav-link" href="#" data-toggle="tab" data-target="#tab_4">Profile</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            @include('pages.artists.artist-public-profile.overview')
                        </div>
                        <div class="tab-pane" id="tab_4">
                            @include('pages.artists.artist-public-profile.show-profile')
                        </div>
                    </div>
                </div>
            </div>
            @include('pages.artists.panels.right-sidebar')
        </div>
    </div>

    <!-- ############ PAGE END-->
    @include('welcome-panels.welcome-footer')
@endsection

@section('page-script')
    <script>
        $('#shareArtistProfile').on('click', function (){
           let url = $(this).data('url_root');
           $('#publicArtistLink').val(url);
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" async integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
