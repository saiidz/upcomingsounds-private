<div id="selectionMainDiv">
    <div id="selectionInnerDiv">
        <div class="title__container">
            <div class="separatortrack">
                <div class="promoteAddTrack" style="display: flex;align-items: center;justify-content: space-between;margin: 0;padding: 0;">
                    <h4><span style="padding-bottom: 5px; ">Verified</span> Selected Curator</h4>
{{--                    <h4><span style="border-bottom: 5px solid #da4441;padding-bottom: 5px; ">Verified</span> Selected Curator</h4>--}}
                    <div>
                        <h3 id="showCuratorProsSelect" style="color: #02b875 !important;">
                            Total : <span id="totalUSCCredits" style="color: #02b875 !important;"> {{ $uscSelectedCreditSum ?? 0 }}</span>  <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">
                        </h3>
                        @if($missingAmountUSC > 0)
                            <h3 id="showContributionTotal" style="color: #02b875 !important;">
                                Missing USC Credits : <span id="missingUSCCredits" style="color: #da4441 !important;">{{ $missingAmountUSC ?? 0 }}</span>  <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">
                            </h3>
                        @endif
                    </div>
                    <a class="m-b-md" href="{{ url('/wallet') }}">
                        <span class="amount">{{\App\Models\User::artistBalance()}} USC</span>
                        <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">
                    </a>
                </div>
            </div>
        </div>


        {{-- curator selected--}}
        <div class="page-content">
            <div class="row-col">
                <div class="col-lg-9 b-r no-border-md">
                    <div class="padding">
                        <div class="artistTrackInfo">
                            <h4><span style="padding-bottom: 5px; ">My</span> Track Recap</h4>
                            <p class="m-b-md m-t-md">Track, track info and pitch will be shared with {{ $countVerifiedCoverages ?? 0 }} curators</p>
                            <div class="input__container">
                                <div class="row item-list item-list-md m-b" id="StepFirst">
                                    @if(!empty($artistTrack))
                                        <div class="col-sm-6 promoteArtist" >
                                            <div class="item r" data-id="item-{{$artistTrack->id}}" style="background-color: rgba(120, 120, 120, 0.1);" id="promoteArtistItem_{{$artistTrack->id}}">
                                                <div class="item-media">
                                                    @if(!empty($artistTrack->track_thumbnail))
                                                        <a href="javascript:void(0)" class="item-media-content" style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$artistTrack->track_thumbnail}});"></a>
                                                    @else
                                                        <a href="javascript:void(0)" class="item-media-content" style="background-image: url({{asset('images/b4.jpg')}});"></a>
                                                    @endif
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-title bottom text-right">
                                                        <input type="hidden" class="oneTrackSelectedArtist" value="{{$artistTrack->id}}"/>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <div>{{$artistTrack->name}}</div>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis ">
                                                        <div class="text-muted">{{($user_artist->name) ? $user_artist->name : ''}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-sm-6">
                                            <div class="item r" data-id="item-5">
                                                There are no results to show
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    {{-- selected verified coverage curators --}}
                        <div class="selec_Cov_cura">
                            <h4><span style="padding-bottom: 5px; ">My {{ $countVerifiedCoverages ?? 0 }}</span> Selected Curators</h4>
                            <div class="input__container">
                                <div class="row item-list item-list-md m-b" id="StepFirst">
                                    @if(count($verifiedCoverages) > 0)
                                        @foreach($verifiedCoverages as $verifiedCoverage)
                                            <div class="col-sm-6 promoteArtist" >
                                                <div class="item r" data-id="item-{{$verifiedCoverage->id}}" id="promoteArtistItem_{{$verifiedCoverage->id}}">
                                                    <div class="item-media">
                                                        @php
                                                            $mystring = !empty($verifiedCoverage->user->profile) ? $verifiedCoverage->user->profile : null;
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
                                                            @if(!empty($verifiedCoverage->user->profile))
                                                                <img src="{{URL('/')}}/uploads/profile/{{$verifiedCoverage->user->profile}}" alt="" class="profile-image">
                                                                <a href="javascript:void(0)" id="curatorPublicProfilePic{{$verifiedCoverage->user->id}}" data-value="{{route('taste.maker.public.profile',$verifiedCoverage->user->name)}}" onclick="publicProfilePictureCurator({{$verifiedCoverage->user->id}})"
                                                                   class="item-media-content" style="background-image: url({{URL('/')}}/uploads/profile/{{$verifiedCoverage->user->profile}});"></a>
                                                            @else
                                                                <a href="javascript:void(0)" id="curatorPublicProfilePic{{$verifiedCoverage->user->id}}" data-value="{{route('taste.maker.public.profile',$verifiedCoverage->user->name)}}" onclick="publicProfilePictureCurator({{$verifiedCoverage->user->id}})"
                                                                   class="item-media-content" style="background-image: url({{asset('images/profile_images_icons.svg')}});"></a>
                                                            @endif
                                                        @elseif($pos == 0)
                                                            <a href="javascript:void(0)" id="curatorPublicProfilePic{{$verifiedCoverage->user->id}}" data-value="{{route('taste.maker.public.profile',$verifiedCoverage->user->name)}}" onclick="publicProfilePictureCurator({{$verifiedCoverage->user->id}})"
                                                               class="item-media-content" style="background-image: url({{asset($verifiedCoverage->user->profile)}});"></a>
                                                        @else

                                                        @endif
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="item-title bottom text-right">
                                                            <img class="flag_icon" src="{{asset('images/flags')}}/{{$verifiedCoverage->user->curatorUser->country->flag_icon}}.png" alt="{{$verifiedCoverage->user->curatorUser->country->flag_icon}}">
                                                            <span class="text-muted"
                                                                  style="font-size:15px">{{($verifiedCoverage->user->curatorUser->country) ? $verifiedCoverage->user->curatorUser->country->name : ''}}</span>
                                                        </div>
                                                        <div class="item-title text-ellipsis">
                                                            <a href="javascript:void(0)" id="curatorPublicProfile{{$verifiedCoverage->user->id}}" data-value="{{route('taste.maker.public.profile',$verifiedCoverage->user->name)}}" onclick="publicProfileCurator({{$verifiedCoverage->user->id}})" id="publicProfileBlank">
                                                                {{ !empty($verifiedCoverage->user) ? $verifiedCoverage->user->name : '------'}}
                                                            </a>
                                                        </div>
                                                        <div class="item-author text-sm text-ellipsis ">
                                                            <div class="text-muted">
                                                                {{ !empty($verifiedCoverage->user->curatorUser->curator_signup_from) ? ucwords(str_replace("_", " ", $verifiedCoverage->user->curatorUser->curator_signup_from)) : '------' }}
                                                                '
                                                                <span class="text-muted"
                                                                      style="font-size:15px">{{ !empty($verifiedCoverage->offerType->name) ? $verifiedCoverage->offerType->name : '------' }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="item-title bottom text-right">
                                                             <span class="amount" style="color:#02b875 !important">{{ !empty($verifiedCoverage->contribution) ? $verifiedCoverage->contribution : 0 }}</span>
                                                            <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-sm-6">
                                            <div class="item r" data-id="item-5">
                                                There are no results to show
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    {{-- selected verified coverage curators --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- curator selected--}}
    </div>

    <div class="buttons">
        <a class="m-b-md rounded addTrack nxt__btn" onclick="prevChangeSelectedCuratorForm();"> Back</a>
        <a class="m-b-md rounded addTrack nxt__btn" onclick="nextForm('final_verified_content_curator');"> Pay</a>
    </div>

</div>
