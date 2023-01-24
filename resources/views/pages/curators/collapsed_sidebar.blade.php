@if(!empty($campaign))
    <div id="mySidebarCollapsed" class="sidebarCollapsed mySidebarCollapsedShowHide">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav({{$campaign->id}})">×</a>
        <div id="mySidebarCollapsedShowHide">
            <div class="padding b-b">
                <div class="row-col">
                    <div class="col-sm w w-auto-xs m-b">
                        <div class="item w rounded">
                            <div class="item-media">
                                @php
                                    if(!empty($campaign->artistTrack) && !empty($campaign->artistTrack->user))
                                    {
                                        $mystring = $campaign->artistTrack->user->profile;
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

                                @if(!empty($campaign->artistTrack) && !empty($campaign->artistTrack->user))
                                    <a href="javascript:void(0)" data-value="{{route('artist.public.profile',$campaign->artistTrack->user->name)}}" onclick="publicProfileBlank()" id="publicProfileBlank">
                                        @if($pos === false)
                                            @if(!empty($campaign->artistTrack) && !empty($campaign->artistTrack->user->profile))
                                                <div class="item-media-content"
                                                     style="background-image: url({{URL('/')}}/uploads/profile/{{$campaign->artistTrack->user->profile}});"></div>
                                            @else
                                                <div class="item-media-content"
                                                     style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                                            @endif
                                        @elseif($pos == 0)
                                            @if(!empty($campaign->artistTrack) && !empty($campaign->artistTrack->user->profile))
                                                <div class="item-media-content"
                                                     style="background-image: url({{$campaign->artistTrack->user->profile}});"></div>
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
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="p-l-md no-padding-xs">
                            <h1 class="page-title">
                                <span class="h4 _800">{{ (!empty($campaign->artistTrack) && !empty($campaign->artistTrack->user)) ? $campaign->artistTrack->user->name : '----'}}</span>
                            </h1>
                            @if(!empty($campaign->artistTrack) && !empty($campaign->artistTrack->user->artistUser->country))
                                <div class="block clearfix m-b">
                                    <img class="flag_icon" src="{{asset('images/flags')}}/{{$campaign->artistTrack->user->artistUser->country->flag_icon}}.png" alt="{{$campaign->artistTrack->user->artistUser->country->flag_icon}}">
                                    <span class="text-white" style="font-size:15px">
                                    {{($campaign->artistTrack->user->artistUser->country) ? $campaign->artistTrack->user->artistUser->country->name : ''}}
                                </span>
                                </div>
                            @endif

                            <div class="row-col m-b">
                                <div class="col-xs">
                                    @if(!empty($campaign->artistTrack) && !empty($campaign->artistTrack->user->artistUser->instagram_url))
                                        <a href="{{$campaign->artistTrack->user->artistUser->instagram_url}}" target="_blank"
                                           class="btn btn-icon btn-social rounded btn-social-colored light-blue-800"
                                           title="Instagram">
                                            <i class="fa fa-instagram"></i>
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    @endif
                                    @if(!empty($campaign->artistTrack) && !empty($campaign->artistTrack->user->artistUser->facebook_url))
                                        <a href="{{$campaign->artistTrack->user->artistUser->facebook_url}}" target="_blank"
                                           class="btn btn-icon btn-social rounded btn-social-colored indigo"
                                           title="Facebook">
                                            <i class="fa fa-facebook"></i>
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    @endif
                                    @if(!empty($campaign->artistTrack) && !empty($campaign->artistTrack->user->artistUser->spotify_url))
                                        <a href="{{$campaign->artistTrack->user->artistUser->spotify_url}}" target="_blank"
                                           class="btn btn-icon btn-social rounded btn-social-colored light-green-500"
                                           title="Spotify">
                                            <i class="fa fa-spotify"></i>
                                            <i class="fa fa-spotify"></i>
                                        </a>
                                    @endif
                                    @if(!empty($campaign->artistTrack) && !empty($campaign->artistTrack->user->artistUser->soundcloud_url))
                                        <a href="{{$campaign->artistTrack->user->artistUser->soundcloud_url}}" target="_blank"
                                           class="btn btn-icon btn-social rounded btn-social-colored orange-700"
                                           title="SoundCloud">
                                            <i class="fa fa-soundcloud"></i>
                                            <i class="fa fa-soundcloud"></i>
                                        </a>
                                    @endif
                                    @if(!empty($campaign->artistTrack) && !empty($campaign->artistTrack->user->artistUser->youtube_url))
                                        <a href="{{$campaign->artistTrack->user->artistUser->youtube_url}}" target="_blank"
                                           class="btn btn-icon btn-social rounded btn-social-colored red-600"
                                           title="Youtube">
                                            <i class="fa fa-youtube"></i>
                                            <i class="fa fa-youtube"></i>
                                        </a>
                                    @endif
                                    @if(!empty($campaign->artistTrack) && !empty($campaign->artistTrack->user->artistUser->website_url))
                                        <a href="{{$campaign->artistTrack->user->artistUser->website_url}}" target="_blank"
                                           class="btn btn-icon btn-social rounded btn-social-colored"
                                           style="background-color:#333;" title="Website">
                                            <i class="fa fa-link"></i>
                                            <i class="fa fa-link"></i>
                                        </a>
                                    @endif
                                    @if(!empty($campaign->artistTrack) && !empty($campaign->artistTrack->user->artistUser->deezer_url))
                                        <a href="{{$campaign->artistTrack->user->artistUser->deezer_url}}" target="_blank"
                                           class="btn btn-icon btn-social rounded btn-social-colored"
                                           style="background-color:#eb9d00;" title="Deezer">
                                            <i class="fab fa-deezer"></i>
                                            <i class="fab fa-deezer"></i>
                                        </a>
                                    @endif
                                    @if(!empty($campaign->artistTrack) && !empty($campaign->artistTrack->user->artistUser->bandcamp_url))
                                        <a href="{{$campaign->artistTrack->user->artistUser->bandcamp_url}}" target="_blank"
                                           class="btn btn-icon btn-social rounded btn-social-colored"
                                           style="background-color:#333;" title="Bandcamp">
                                            <i class="fa fa-bandcamp"></i>
                                            <i class="fa fa-bandcamp"></i>
                                        </a>
                                    @endif
                                    @if(!empty($campaign->artistTrack) && !empty($campaign->artistTrack->user->artistUser->tiktok_url))
                                        <a href="{{$campaign->artistTrack->user->artistUser->tiktok_url}}" target="_blank"
                                           class="btn btn-icon btn-social rounded btn-social-colored"
                                           style="background-color:#333;" title="Tiktok">
                                            <i class="fab fa-tiktok"></i>
                                            <i class="fab fa-tiktok"></i>
                                        </a>
                                    @endif
                                    @if(!empty($campaign->artistTrack) && !empty($campaign->artistTrack->user) && $campaign->artistTrack->user->is_public_profile == 1)
                                        <a href="{{route('artist.public.profile',$campaign->artistTrack->user->name)}}" target="_blank"
                                           class="btn btn-icon btn-social rounded btn-social-colored"
                                           style="background-color:#333 !important;" title="Public Profile">
                                            <i class="custom-icon"></i>
                                            <i class="custom-icon"></i>
                                        </a>
                                    @else
                                        <a href="{{route('artist.public.profile',$campaign->artistTrack->user->name)}}" target="_blank"
                                           class="btn btn-icon btn-social rounded btn-social-colored"
                                           style="background-color:#333 !important; display:none;" title="Public Profile">
                                            <i class="custom-icon"></i>
                                            <i class="custom-icon"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapsed_list">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="startCollapse">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3>{{ !empty($campaign->artistTrack) ? $campaign->artistTrack->name : '----'}}</h3>

                                @if(!empty($campaign->curatorFavoriteArtist) && !empty($campaign->artistTrack->user))
                                    <a href="javascript:void(0)" class="btn-favorite" @if($campaign->artistTrack) onclick="favoriteArtist({{$campaign->artistTrack->user->id}})" @endif data-toggle="tooltip" title="Saved Artist">
                                        <i class=" {{ !empty($campaign->curatorFavoriteTrack) ? 'fa fa-heart colorAdd' : 'fa fa-heart-o' }}"></i>
                                    </a>
                                @else
                                    @if(empty($campaign->curatorFavoriteArtist) && !empty($campaign->artistTrack->user))
                                        <a href="javascript:void(0)" class="btn-favorite" @if($campaign->artistTrack) onclick="favoriteArtist({{$campaign->artistTrack->user->id}})" @endif data-toggle="tooltip" title="Saved Artist">
                                            <i class="fa fa-heart-o"></i>
                                        </a>
                                    @endif
                                @endif
                            </div>
                            <div class="d-flex justify-content-between align-items-center p-b-1">
                                <span class="h6 _800 text-white" >Release Kind: <span style="color: #02b875 !important;">{{ !empty($campaign->artistTrack) ? Str::ucfirst($campaign->artistTrack->audio_cover) : '----'}}</span></span>
                                <span class="h6 _800 text-white">Release Type: <span style="color: #02b875 !important;">{{ !empty($campaign->artistTrack) ? Str::ucfirst($campaign->artistTrack->release_type) : '----'}}</span></span>
                            </div>
                            <div class="d-flex p-b-1">
                                <span class="h6 _800 text-white" >Release Date: <span style="color: #02b875 !important;">{{ !empty($campaign->artistTrack) ? getDateFormat($campaign->artistTrack->release_date) : '----'}}</span></span>
                            </div>

                            @if(!empty($campaign->artistTrack) && !empty($campaign->artistTrack->audio_description))
                                <div class="item-except text-sm text-white">
                                    <p>
                                        <span class="h6 _800 text-white">Don`t Share: </span>{{ $campaign->artistTrack->audio_description }}
                                    </p>
                                </div>
                            @endif

                            @if(!empty($campaign->artistTrack) && count($campaign->artistTrack->artistTrackLanguages) > 0)
                                <div class="item-info-tag">
                                    <div class="item-action">
                                        <div>
                                            <span class="h6 _800 text-white">Track Languages: </span>
                                            @foreach($campaign->artistTrack->artistTrackLanguages as $language)
                                                <span class="btn btn-xs white campaignTag">{{$language->language->name}}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if(!empty($campaign->artistTrack) && !empty($campaign->artistTrack->pitch_description))
                                <div class="item-except text-sm text-white">
                                    <p>
                                        <span class="h6 _800 text-white">Pitch: </span>{{ !empty($campaign->artistTrack) ? $campaign->artistTrack->pitch_description : '-----'}}
                                    </p>
                                </div>
                            @endif

                            <div class="item-except text-sm text-white">
                                <p>
                                    {{ !empty($campaign->artistTrack) ? $campaign->artistTrack->description : '-----'}}
                                </p>
                            </div>
                            <div class="row" id="camArtTraLink">
                                @if(count($campaign->artistTrack->artistTrackLinks) > 0)
                                    @foreach($campaign->artistTrack->artistTrackLinks as $link)
                                        @if(!empty($link->link))
                                            <div class="col-sm-12" id="camArtLinks">
                                                @php
                                                    echo $link->link;
                                                @endphp
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    @if(!empty($campaign->artistTrack) && !empty($campaign->artistTrack->track_thumbnail))
                                        <div class="col-sm-12" id="camArtLinks">
                                            <img src="{{asset('uploads/track_thumbnail')}}/{{$campaign->artistTrack->track_thumbnail}}" style="width:100%" alt="">
                                        </div>
                                    @endif
                                @endif
                            </div>
                            <div class="item-info-tag m-t-2">
                                @if(!empty($campaign->artistTrack->artistTrackTags))
                                    <div class="item-action">
                                        <div>
                                            @foreach($campaign->artistTrack->artistTrackTags as $tag)
                                                <span class="btn btn-xs white campaignTag">{{$tag->curatorFeatureTag->name}}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="campaignBtn">
                                <a href="javascript:void(0)" class="btn btn-sm rounded campaign_btn basicbtn">
                                    Report</a>
                                @if (Auth::check() && auth()->user() && auth()->user()->is_verified == 1)
                                    <a href="javascript:void(0)" onclick="offerShowHide()" class="btn btn-sm rounded campaign_btn basicbtn">
                                        Offer</a>
                                @endif
                                {{--                          @if(!empty($campaign->curatorFavoriteTrack) && $campaign->curatorFavoriteTrack->status == \App\Templates\IFavoriteTrackStatus::ACCEPTED)--}}
                                {{--                              <a href="javascript:void(0)" class="btn btn-sm rounded campaign_btn basicbtn {{ !empty($campaign->curatorFavoriteTrack) ? 'colorBgAdd' : '' }}"--}}
                                {{--                                 @if($campaign->artistTrack) onclick="favoriteTrack({{$campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::ACCEPTED}}')" @endif>--}}
                                {{--                                  Offer</a>--}}
                                {{--                          @else--}}
                                {{--                              @if(empty($campaign->curatorFavoriteTrack))--}}
                                {{--                                  <a href="javascript:void(0)" class="btn btn-sm rounded campaign_btn basicbtn"--}}
                                {{--                                     @if($campaign->artistTrack) onclick="favoriteTrack({{$campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::ACCEPTED}}')" @endif>--}}
                                {{--                                      Offer</a>--}}
                                {{--                              @endif--}}
                                {{--                          @endif--}}

                                @if(!empty($campaign->curatorFavoriteTrack) && $campaign->curatorFavoriteTrack->status == \App\Templates\IFavoriteTrackStatus::SAVE)
                                    <a href="javascript:void(0)" class="btn btn-sm rounded campaign_btn basicbtn {{ !empty($campaign->curatorFavoriteTrack) ? 'colorBgAdd' : '' }}"
                                       @if($campaign->artistTrack) onclick="favoriteTrack({{$campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                        Save</a>
                                @else
                                    @if(empty($campaign->curatorFavoriteTrack))
                                        <a href="javascript:void(0)" class="btn btn-sm rounded campaign_btn basicbtn"
                                           @if($campaign->artistTrack) onclick="favoriteTrack({{$campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                            Save</a>
                                    @endif
                                @endif

                                @if(!empty($campaign->curatorFavoriteTrack) && $campaign->curatorFavoriteTrack->status == \App\Templates\IFavoriteTrackStatus::REJECTED)
                                    <a href="javascript:void(0)" class="btn btn-sm rounded campaign_btn basicbtn {{ !empty($campaign->curatorFavoriteTrack) ? 'colorBgAdd' : '' }}"
                                       @if($campaign->artistTrack) onclick="favoriteTrack({{$campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::REJECTED}}')" @endif>
                                        Decline</a>
                                @else
                                    @if(empty($campaign->curatorFavoriteTrack))
                                        <a href="javascript:void(0)" class="btn btn-sm rounded campaign_btn basicbtn"
                                           @if($campaign->artistTrack) onclick="favoriteTrack({{$campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::REJECTED}}')" @endif>
                                            Decline</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--   Template buttons show     --}}
        @if (Auth::check() && auth()->user() && auth()->user()->is_verified == 1)
            <div id="templateCollapsedShowHide" style="display:none;">
                <div class="collapsed_list">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="startCollapse">
                                @if(!empty($offerTemplates) && (count($offerTemplates) > 0))
                                    <div class="templateBtn text-center">
                                        <div class="form-group">
                                            <select name="type" class="selectOffer">
                                                <option value="" disabled selected>Select Template</option>
                                                @foreach($offerTemplates as $offerTemplate)
                                                    <option value="{{ $offerTemplate->id }}">{{ $offerTemplate->title ?? '----' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @else
                                    <div class="templateBtn text-center">
                                        <a href="{{route('curator.create.offer.template')}}" class="btn btn-sm rounded tem_btn basicbtn">
                                            Setup a new offer template</a>
                                    </div>
                                @endif
                                <span class="or_">OR</span>
                                <div class="offerBtn text-center">
                                    <a href="javascript:void(0)" class="btn btn-sm rounded tem_btn basicbtn">
                                        Select an offer</a>
                                </div>
                                <span class="or_">OR</span>
                                <div class="submitCBtn text-center">
                                    <a href="javascript:void(0)" class="btn btn-sm rounded tem_btn basicbtn">
                                        Submit Coverage</a>
                                </div>
                                <div class="campaignBtn" style="margin-top: 115px; !important;">
                                    <a href="javascript:void(0)" onclick="backToShowHide()" class="btn btn-sm rounded campaign_btn basicbtn">
                                        Back to Overview</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        {{--   Template buttons show     --}}
    </div>
@endif
