@if(!empty($savedCurators) && count($savedCurators) > 0)
    <div class="row m-b">
        @foreach($savedCurators as $savedCurator)
            <div class="col-xs-4 col-sm-4 col-md-3">
                <div class="item r" data-id="item-10">
                    <div class="item-media itemCurator">
                        {{--                                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url(http://localhost:8001/uploads/track_thumbnail/default_1683229746Payfast-logo.png);"></a>--}}
                        <div class="item-media-content itemMediaCurator">
                            @php
                                $mystring = !empty($savedCurator->curatorUser->profile) ? $savedCurator->curatorUser->profile : null;
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
                            <a href="javascript:void(0)" id="curatorPublicProfile{{$savedCurator->curatorUser->id}}" data-value="{{route('taste.maker.public.profile',$savedCurator->curatorUser->name)}}" onclick="publicProfileCurator({{$savedCurator->curatorUser->id}})" id="publicProfileBlank">
                                @if($pos === false)
                                    @if(!empty($savedCurator->curatorUser->profile))
                                        <img src="{{URL('/')}}/uploads/profile/{{$savedCurator->curatorUser->profile}}" alt="" class="profile-image">
                                    @else
                                        <img src="{{asset('images/profile_images_icons.svg')}}" alt="" class="profile-image">
                                    @endif
                                @elseif($pos == 0)
                                    <img src="{{asset($savedCurator->curatorUser->profile)}}" alt="" class="profile-image">
                                @else

                                @endif

                                <img src="{{asset('images/bg_curator_profile.png')}}" alt="" class="background-image">
                            </a>
                        </div>
                    </div>

{{--                    <div class="item-media ">--}}
{{--                        @php--}}
{{--                            $mystring = $savedCurator->curatorUser->profile;--}}
{{--                            $findhttps   = 'https';--}}
{{--                            $findhttp   = 'http';--}}
{{--                            $poshttps = strpos($mystring, $findhttps);--}}

{{--                            $poshttp = strpos($mystring, $findhttp);--}}
{{--                            if($poshttps != false){--}}
{{--                                $pos = $poshttps;--}}
{{--                            }else{--}}
{{--                                $pos = $poshttp;--}}
{{--                            }--}}
{{--                        @endphp--}}
{{--                        <a href="javascript:void(0)" id="curatorPublicProfile{{$savedCurator->curatorUser->id}}" data-value="{{route('taste.maker.public.profile',$savedCurator->curatorUser->name)}}" onclick="publicProfileCurator({{$savedCurator->curatorUser->id}})" id="publicProfileBlank">--}}
{{--                            @if($pos === false)--}}
{{--                                @if(!empty($savedCurator->curatorUser->profile))--}}
{{--                                    <div class="item-media-content"--}}
{{--                                         style="background-image: url({{URL('/')}}/uploads/profile/{{$savedCurator->curatorUser->profile}});"></div>--}}
{{--                                @else--}}
{{--                                    <div class="item-media-content"--}}
{{--                                         style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>--}}
{{--                                @endif--}}
{{--                            @elseif($pos == 0)--}}
{{--                                <div class="item-media-content"--}}
{{--                                     style="background-image: url({{$savedCurator->curatorUser->profile}});"></div>--}}
{{--                            @else--}}
{{--                                <div class="item-media-content"--}}
{{--                                     style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>--}}
{{--                            @endif--}}
{{--                        </a>--}}
{{--                    </div>--}}
                    <div class="item-info">
                        <div class="item-overlay bottom text-right" style="opacity:1 !important;">
                            @if(!empty($savedCurator) && !empty($savedCurator->curatorUser))
                                <a href="javascript:void(0)" class="btn-favorite" @if($savedCurator->curatorUser) onclick="favoriteCurator({{ $savedCurator->curatorUser->id }},'saved')" @endif data-toggle="tooltip" title="Saved Curator">
                                    <i class=" {{ !empty($savedCurator) ? 'fa fa-heart colorAdd' : 'fa fa-heart-o' }} addClassFavorite{{ $savedCurator->curatorUser->id }}"></i>
                                </a>
                            @else
                                @if(empty($savedCurator) && !empty($savedCurator->curatorUser))
                                    <a href="javascript:void(0)" class="btn-favorite" @if($savedCurator->curatorUser) onclick="favoriteCurator({{ $savedCurator->curatorUser->id }},'saved')" @endif data-toggle="tooltip" title="Saved Curator">
                                        <i class="fa fa-heart-o addClassFavorite{{ $savedCurator->curatorUser->id }}"></i>
                                    </a>
                                @endif
                            @endif
{{--                            <a href="#" class="btn-favorite"><i--}}
{{--                                    class="fa fa-heart-o"></i></a>--}}
                        </div>
                        <div class="item-title text-ellipsis">
                            <a href="javascript:void(0)" id="curatorPublicProfile{{$savedCurator->curatorUser->id}}" data-value="{{route('taste.maker.public.profile',$savedCurator->curatorUser->name)}}" onclick="publicProfileCurator({{$savedCurator->curatorUser->id}})" id="publicProfileBlank">
                                {{($savedCurator->curatorUser) ? $savedCurator->curatorUser->name : ''}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="item-title text-ellipsis">
        <h3 class="white" style="text-align:center">Not Found</h3>
    </div>
@endif
