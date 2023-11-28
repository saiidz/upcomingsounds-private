<div id="selectionMainDiv">
    <div id="selectionInnerDiv">
{{--        <div class="infoPanel progressivePromosInfoPanel tw-top-0 tw-left-0 tw-z-10 md:tw-sticky">--}}
{{--            <div class="tw-w-full lg:tw-flex lg:tw-space-x-6">--}}
{{--                <div class="tw-text-center lg:tw-flex lg:tw-w-4/12 lg:tw-flex-col lg:tw-text-left"><span class="text tw-mb-2 tw-block">--}}
{{--          Benefit from our welcome offer, up to 20% discount--}}
{{--          </span> <span class="text tw-mb-5 tw-block lg:tw-mb-0">Available for a limited time,<br>valid on your first campaign only</span>--}}
{{--                </div>--}}
{{--                <div class="infoPanelCellsContainer tw--mx-6 tw-flex tw-items-center tw-space-x-4 tw-overflow-x-auto tw-text-center sm:tw--mx-8 md:tw--mx-10 md:tw-space-x-6 lg:tw-w-8/12">--}}
{{--                    <!---->--}}
{{--                    <div class="infoPanelCell tw-rounded-sm tw-border tw-border-solid tw-border-white">--}}
{{--                        <div class="tw-flex tw-items-baseline tw-justify-center"><span class="text tw-mb-1 tw-inline-block">--}}
{{--                x15&nbsp;--}}
{{--                </span> <i class="fas fa-user-friends tw-text-white md:tw-text-base"></i> <span class="text tw-mb-1 tw-inline-block">--}}
{{--                &nbsp;= -5%--}}
{{--                </span>--}}
{{--                        </div>--}}
{{--                        <span class="text tw-block">--}}
{{--             on your selection--}}
{{--             </span>--}}
{{--                    </div>--}}
{{--                    <div class="infoPanelCell tw-rounded-sm tw-border tw-border-solid tw-border-white">--}}
{{--                        <div class="tw-flex tw-items-baseline tw-justify-center"><span class="text tw-mb-1 tw-inline-block">--}}
{{--                x40&nbsp;--}}
{{--                </span> <i class="fas fa-user-friends tw-text-white md:tw-text-base"></i> <span class="text tw-mb-1 tw-inline-block">--}}
{{--                &nbsp;= -10%--}}
{{--                </span>--}}
{{--                        </div>--}}
{{--                        <span class="text tw-block">--}}
{{--             on your selection--}}
{{--             </span>--}}
{{--                    </div>--}}
{{--                    <div class="infoPanelCell tw-rounded-sm tw-border tw-border-solid tw-border-white">--}}
{{--                        <div class="tw-flex tw-items-baseline tw-justify-center"><span class="text tw-mb-1 tw-inline-block">--}}
{{--                x80&nbsp;--}}
{{--                </span> <i class="fas fa-user-friends tw-text-white md:tw-text-base"></i> <span class="text tw-mb-1 tw-inline-block">--}}
{{--                &nbsp;= -15%--}}
{{--                </span>--}}
{{--                        </div>--}}
{{--                        <span class="text tw-block">--}}
{{--             on your selection--}}
{{--             </span>--}}
{{--                    </div>--}}
{{--                    <div class="infoPanelCell tw-rounded-sm tw-border tw-border-solid tw-border-white">--}}
{{--                        <div class="tw-flex tw-items-baseline tw-justify-center"><span class="text tw-mb-1 tw-inline-block">--}}
{{--                x150&nbsp;--}}
{{--                </span> <i class="fas fa-user-friends tw-text-white md:tw-text-base"></i> <span class="text tw-mb-1 tw-inline-block">--}}
{{--                &nbsp;= -20%--}}
{{--                </span>--}}
{{--                        </div>--}}
{{--                        <span class="text tw-block">--}}
{{--             on your selection--}}
{{--             </span>--}}
{{--                    </div>--}}
{{--                    <!---->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="title__container">
            <div class="separatortrack">
                <div class="promoteAddTrack">
                    <a class="m-b-md" href="{{ url('/wallet') }}">
                        <span class="amount">{{\App\Models\User::artistBalance()}} USC</span>
                        <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">
                    </a>
                </div>
                <h4>{{ !empty($curators) ? $curators->count() : '' }} curators & pros recommended for you</h4>
{{--                <p class="text-muted">A tailor-made selection based on the information you shared with us</p>--}}
                {{-- <div class="separator"></div> --}}
            </div>
        </div>

        {{-- curator selected--}}
        <div class="page-content">
            <div class="row-col">
                <div class="col-lg-9 b-r no-border-md">
                    <div class="padding">
                        <div data-ui-jp="jscroll" class="jscroll-loading-center" data-ui-options="{
                    autoTrigger: true,
                    loadingHtml: '<i class=\'fa fa-refresh fa-spin text-md text-muted\'></i>',
                    padding: 50,
                    nextSelector: 'a.jscroll-next:last'
                }">
                            <div class="row">
                                @if(!empty($curators) && count($curators) > 0)
                                    @foreach($curators as $curator)
                                        <div class="col-xs-4 col-sm-4 col-md-3">
                                            <div class="item r" data-id="item-100">
                                                <div class="item-media itemCurator">
{{--                                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url(http://localhost:8001/uploads/track_thumbnail/default_1683229746Payfast-logo.png);"></a>--}}
                                                    <div class="item-media-content itemMediaCurator">
                                                        @php
                                                            $mystring = !empty($curator->user->profile) ? $curator->user->profile : null;
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
                                                            @if(!empty($curator->user->profile))
                                                                <img src="{{URL('/')}}/uploads/profile/{{$curator->user->profile}}" alt="" class="profile-image">
                                                            @else
                                                                <img src="{{asset('images/profile_images_icons.svg')}}" alt="" class="profile-image">
                                                            @endif
                                                        @elseif($pos == 0)
                                                            <img src="{{asset($curator->user->profile)}}" alt="" class="profile-image">
                                                        @else

                                                        @endif

                                                        <img src="{{asset('images/bg_curator_profile.png')}}" alt="" class="background-image">
                                                    </div>
                                                </div>
                                                <div class="item-info" style="position: relative !important;padding: 10px 0 20px 0 !important;border-radius: inherit !important;">
                                                    <div class="item-overlay bottom text-right" style="bottom: 100% !important; opacity: 1 !important;">
                                                        @if(!empty($curator->artistFavoriteCurator) && !empty($curator->user))
                                                            <a href="javascript:void(0)" class="btn-favorite" @if($curator->user) onclick="favoriteCurator({{ $curator->user->id }},'promoteTrack')" @endif data-toggle="tooltip" title="Saved Curator">
                                                                <i class=" {{ !empty($curator->artistFavoriteCurator) ? 'fa fa-heart colorAdd' : 'fa fa-heart-o' }} addClassFavorite{{ $curator->user->id }}" style="font-size: 25px !important;"></i>
                                                            </a>
                                                        @else
                                                            @if(empty($curator->artistFavoriteCurator) && !empty($curator->user))
                                                                <a href="javascript:void(0)" class="btn-favorite" @if($curator->user) onclick="favoriteCurator({{ $curator->user->id }},'promoteTrack')" @endif data-toggle="tooltip" title="Saved Curator">
                                                                    <i class="fa fa-heart-o addClassFavorite{{ $curator->user->id }}" style="font-size: 25px !important;"></i>
                                                                </a>
                                                            @endif
                                                        @endif
{{--                                                        <a href="javascript:void(0)" class="btn-favorite" onclick="favoriteTrack(100,'SAVE')" data-toggle="tooltip" title="Saved Curator">--}}
{{--                                                            <i class="fa fa-heart-o"></i>--}}
{{--                                                        </a>--}}
{{--                                                        <a href="#" class="btn-more" data-toggle="dropdown">--}}
{{--                                                            <i class="fa fa-ellipsis-h"></i>--}}
{{--                                                        </a>--}}
{{--                                                        <div class="dropdown-menu pull-right black lt"></div>--}}
                                                    </div>
                                                    <div class="" style="justify-content: space-between !important;align-items: center !important;display: flex !important;">
                                                        @if(!empty($curator->user->name))
{{--                                                            <a href="{{route('taste.maker.public.profile',$curator->user->name)}}" target="_blank">--}}
                                                                <h3>{{ $curator->user->name}}</h3>
{{--                                                            </a>--}}
                                                        @endif

                                                        @if(!empty($curator->user->curatorUser->country))
                                                            <div class="item-author text-ellipsis">
                                                                <div class="clearfix m-b-sm">
                                                                    <img class="flag_icon" src="{{asset('images/flags')}}/{{$curator->user->curatorUser->country->flag_icon}}.png" alt="{{$curator->user->curatorUser->country->flag_icon}}">
                                                                    <span class="text-muted"
                                                                          style="font-size:15px">{{($curator->user->curatorUser->country) ? $curator->user->curatorUser->country->name : ''}}</span>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>

{{--                                                    <div class="item-title text-ellipsis">--}}
{{--                                                        <a href="javascript:void(0)">{{ !empty($curator->user->name) ? $curator->user->name : '------' }}</a>--}}
{{--                                                    </div>--}}
                                                    <div class="item-author text-ellipsis">
                                                        <span class="text-muted">{{ !empty($curator->user->curatorUser->curator_signup_from) ? ucwords(str_replace("_", " ", $curator->user->curatorUser->curator_signup_from)) : '------' }}</span>
                                                    </div>
                                                    <div class="item-author text-ellipsis">
                                                        <span class="text-muted">Coverage Type: {{ !empty($curator->offerType->name) ? $curator->offerType->name : '------' }}</span>
                                                    </div>
                                                    <div class="" style="justify-content: space-between !important;align-items: center !important;display: flex !important;">
                                                        <div class="item-author text-ellipsis">
                                                            <span class="text-muted">
                                                                {{--                                                        @if($curator->time_to_publish)--}}
                                                                {{--                                                        @else--}}
                                                                {{ !empty($curator->time_to_publish) ? $curator->time_to_publish : '------' }} days for coverage
    {{--                                                        @endif--}}
                                                            </span>
                                                        </div>

                                                        @php
                                                            $encodedId = base64_encode($curator->id);
                                                        @endphp
                                                        <a class="m-b-md" href="javascript:void(0)" data-value="first" id="click_C_V_C{{ $curator->id }}" onclick="selectCuratorVerifiedCoverage('{{ $encodedId }}')">
                                                            <div style="background-color: #02b875 !important;padding: 5px;" id="selectC_V_C{{ $curator->id }}">
                                                                <span class="amount">Select for {{ !empty($curator->contribution) ? $curator->contribution : 0 }}  USC</span>
                                                                <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">
                                                            </div>
                                                        </a>
                                                        <input type="hidden" id="curatorNameIDs{{ $curator->id }}" value="{{ !empty($curator->user->name) ? $curator->user->name : '' }}">
                                                        <input type="hidden" id="contribution_V_C_IDs{{ $curator->id }}" value="{{ !empty($curator->contribution) ? $curator->contribution : 0 }}">
                                                        <input type="hidden" id="verifiedCoverageIds{{ $curator->id }}" name="verified_coverage_ids" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- curator selected--}}
    </div>

    <div class="buttons">
        <a class="m-b-md rounded addTrack nxt__btn" onclick="prevSelectedCuratorForm();"> Back</a>
        <div>
            <h3 id="showCuratorProsSelect" style="color: #da4441 !important;"></h3>
            <h3 id="showContributionTotal" style="display:none;">
                <span class="show_C_Amount"></span>
                <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">
            </h3>
        </div>
        <a class="m-b-md rounded addTrack nxt__btn" onclick="nextForm('step_three');"> Next</a>
    </div>

</div>
