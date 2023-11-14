@if(!empty($savedCurators) && count($savedCurators) > 0)
    <div class="row m-b">
        @foreach($savedCurators as $savedCurator)
            <div class="col-xs-4 col-sm-4 col-md-3">
                <div class="item r" data-id="item-10">
                    <div class="item-media ">
                        @php
                            $mystring = $savedCurator->curatorUser->profile;
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
                            @if(!empty($savedCurator->curatorUser->profile))
                                <div class="item-media-content"
                                     style="background-image: url({{URL('/')}}/uploads/profile/{{$savedCurator->curatorUser->profile}});"></div>
                            @else
                                <div class="item-media-content"
                                     style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                            @endif
                        @elseif($pos == 0)
                            <div class="item-media-content"
                                 style="background-image: url({{$savedCurator->curatorUser->profile}});"></div>
                        @else
                            <div class="item-media-content"
                                 style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                        @endif
                    </div>
                    <div class="item-info">
                        <div class="item-overlay bottom text-right" style="opacity:1 !important;">
                            <a href="#" class="btn-favorite"><i
                                    class="fa fa-heart-o"></i></a>
                        </div>
                        <div class="item-title text-ellipsis">
                            <a href="{{route('taste.maker.public.profile',$savedCurator->curatorUser->name)}}" target="_blank">
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
