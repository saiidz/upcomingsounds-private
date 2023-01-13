@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Saved Artist')

@section('page-style')

@endsection

@section('content')
    <!-- ############ PAGE START-->
    <div class="page-content">
        <div class="row-col">
            <div class="col-lg-9 b-r no-border-md">
                <div class="padding">
                    <div class="page-title m-b">
                        <h1 class="inline m-a-0">Artists</h1>
                        <div class="dropdown inline">
                            <button class="btn btn-sm no-bg h4 m-y-0 v-b dropdown-toggle text-primary" data-toggle="dropdown">By name</button>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item active">
                                    By name
                                </a>
                                <a href="#" class="dropdown-item">
                                    Songs
                                </a>
                            </div>
                        </div>
                    </div>

                    <div data-ui-jp="jscroll" data-ui-options="{
            autoTrigger: false,
            loadingHtml: '<i class=\'fa fa-refresh fa-spin text-md text-muted\'></i>',
            padding: 50,
            nextSelector: 'a.jscroll-next:last'
          }">
                        <div class="row row-lg">
                            @if(count($savedArtists) > 0)
                                @foreach($savedArtists as $savedArtist)

                                    @php
                                        if(!empty($savedArtist->artistUser))
                                        {
                                            $mystring = $savedArtist->artistUser->profile;
                                            $findhttps   = 'https';
                                            $findhttp   = 'http';
                                            $poshttps = strpos($mystring, $findhttps);

                                            $poshttp = strpos($mystring, $findhttp);
                                            if($poshttps != false){
                                                $pos = $poshttps;
                                            }else{
                                                $pos = $poshttp;
                                            }
                                        }
                                    @endphp

                                    <div class="col-xs-4 col-sm-4 col-md-3">
                                        <div class="item">
                                            <div class="item-media rounded ">
                                                @if(!empty($savedArtist->artistUser))
                                                    <a href="javascript:void(0)" id="publicProfile{{$savedArtist->artistUser->id}}" data-value="{{route('artist.public.profile',$savedArtist->artistUser->name)}}" onclick="publicProfileSaved({{$savedArtist->artistUser->id}})" id="publicProfileBlank">
                                                        @if($pos === false)
                                                            @if(!empty($savedArtist->artistUser->profile))
                                                                <div class="item-media-content"
                                                                     style="background-image: url({{URL('/')}}/uploads/profile/{{$savedArtist->artistUser->profile}});"></div>
                                                            @else
                                                                <div class="item-media-content"
                                                                     style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                                                            @endif
                                                        @elseif($pos == 0)
                                                            @if(!empty($savedArtist->artistUser->profile))
                                                                <div class="item-media-content"
                                                                     style="background-image: url({{$savedArtist->artistUser->profile}});"></div>
                                                            @else
                                                                <div class="item-media-content"
                                                                     style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                                                            @endif
                                                        @else
                                                            <div class="item-media-content"
                                                                 style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                                                        @endif
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="item-info text-center">
                                                <div class="item-title text-ellipsis">
                                                    <a href="{{route('artist.public.profile',$savedArtist->artistUser->name)}}">{{!empty($savedArtist->artistUser) ? $savedArtist->artistUser->name : '----'}}</a>
                                                    <div class="text-sm text-muted">{{(!empty($savedArtist->artistUser) && !empty($savedArtist->artistUser->artistTrack)) ? $savedArtist->artistUser->artistTrack->count() : 0 }} Tracks</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="item-title text-ellipsis">
                                    <h3 class="white" style="text-align:center;font-size: 15px;">Not Saved Artist Found</h3>
                                </div>
                            @endif
                        </div>
{{--                        <a href="scroll.author.html" class="btn btn-sm white rounded jscroll-next">Show More</a>--}}
                    </div>
                </div>
            </div>
            @include('pages.curators.panels.right-sidebar')
        </div>
    </div>
    <!-- ############ PAGE END-->
@endsection

@section('page-script')

@endsection
