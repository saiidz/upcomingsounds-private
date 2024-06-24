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
                            <div class="sticky-bar">
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
                                <span class="h6 _800 text-white" >Release Type:
                                    <span style="color: #02b875 !important;">{{ !empty($campaign->artistTrack) ? Str::ucfirst($campaign->artistTrack->audio_cover) .' '. Str::ucfirst($campaign->artistTrack->release_type)  : '----'}}</span>
                                </span>
                                    {{--                                <span class="h6 _800 text-white" >Release Kind: <span style="color: #02b875 !important;">{{ !empty($campaign->artistTrack) ? Str::ucfirst($campaign->artistTrack->audio_cover) : '----'}}</span></span>--}}
                                    {{--                                <span class="h6 _800 text-white">Release Type: <span style="color: #02b875 !important;">{{ !empty($campaign->artistTrack) ? Str::ucfirst($campaign->artistTrack->release_type) : '----'}}</span></span>--}}
                                </div>
                                <div class="d-flex p-b-1">
                                    <span class="h6 _800 text-white" >Release Date: <span style="color: #02b875 !important;">{{ !empty($campaign->artistTrack) ? getDateFormat($campaign->artistTrack->release_date) : '----'}}</span></span>
                                </div>

                                @if(!empty($campaign->artistTrack) && !empty($campaign->artistTrack->audio_description))
                                    <div class="item-except text-sm text-white">
                                        <p>
                                            <span class="h6 _800 text-white" style="color:red !important;">{{ ($campaign->artistTrack->release_date < \Illuminate\Support\Carbon::now()) ? 'Embargo:' : 'Embargo:'}} </span>{{ $campaign->artistTrack->audio_description }}
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
                                <div class="item-except text-sm text-white">
                                    <p>
                                        <span class="h6 _800 text-white">Description: </span> {{ !empty($campaign->artistTrack) ? $campaign->artistTrack->description : '-----'}}
                                    </p>
                                </div>
                                @if(!empty($campaign->artistTrack) && !empty($campaign->artistTrack->pitch_description))
                                    <div class="item-except text-sm text-white">
                                        <p>
                                            <span class="h6 _800 text-white">Pitch: </span>{{ !empty($campaign->artistTrack) ? $campaign->artistTrack->pitch_description : '-----'}}
                                        </p>
                                    </div>
                                @endif


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
                                <div class="item-info-tag m-t-2" id="artistTrackTagsHideShow">
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

                                {{--   Submit Coverage     --}}
                                <div id="submitCoverageShowHide" style="display:none;">
                                    <div class="collapsed_list">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="startCollapse">
                                                    <div class="d-flex form-group">
                                                        <label class="control-label form-control-label text-white">Coverage Type:</label>
                                                        <div>
                                                            <select class="form-control" name="offer_type" id="typeSubmitCoverage">
                                                                <option disabled selected value="">Please Choose Coverage</option>
{{--                                                                <option disabled selected value="">Please Choose Submit Coverage</option>--}}
                                                                @if(!empty($offer_types))
                                                                    @foreach($offer_types as $offer_type)
                                                                        <option value="{{$offer_type->id}}" {{(!empty($offer_template) && $offer_type->id == $offer_template->offer_type) ? 'selected' : '' }}>{{$offer_type->name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="item-except text-sm text-white">
                                                        <p>You may use an image hosting site (such as Imgur.com) Completed Work lUr!e a specific URL.Share the link to your image.</p>
                                                    </div>
                                                    <div class="d-flex form-group">
                                                        <label class="control-label form-control-label text-white">Completed Work Url:</label>
                                                        <div id="TextBoxesGroup">
                                                            <div id="TextBoxDiv1">
                                                                <div class="addEmbeded m-b" style="display: block !important;">
                                                                    <div class="addMoreLinks" style="width: 100% !important;">
                                                                        <input type="text" name="completion_url[]"
                                                                               class="form-control moreLinks linksSubmitCoverage"
                                                                               value="" id="textbox1"
                                                                               placeholder="Please Add Completion Url">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="addMoreRemoveLink">
                                                                <div class="plusIcon">
                                                                    <i class="fa fa-plus" onclick="addLinkButton()" style=" cursor: pointer;color: #02b875;">Add New Link</i>
                                                                </div>
                                                                <div class="plusIconRemove">
                                                                    <i class="fa fa-remove" onclick="removeAddButton()" id="removeButton">Remove Link</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex form-group">
                                                        <label class="control-label form-control-label text-white">Message:</label>
                                                        <div>
                                                            <textarea id="messageSubmitCoverage" class="form-control" cols="30" rows="10"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="campaignBtn" style="margin-top: 10px; !important; text-align: center;" >
                                                        <a href="javascript:void(0)" onclick="finalSubmitCoverage({{$campaign->user_id}},{{$campaign->track_id}})" class="btn btn-sm rounded campaign_btn saveColorBgAdd">
                                                            Submit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--   Submit Coverage     --}}

                            </div>

                            <div class="campaignBtn" id="campaignBtnHideShow">
{{--                                <a href="javascript:void(0)" class="btn btn-sm rounded campaign_btn">--}}
{{--                                    Report</a>--}}
                                {{-- It is for curator dashboard--}}
                                <a href="javascript:void(0)" style="display:none;" onclick="submitCoverage()" id="submitCoverage" class="btn btn-sm rounded campaign_btn saveColorBgAdd">
                                    Submit Coverage</a>
                                {{-- It is for curator dashboard--}}

                                @if (Auth::check() && auth()->user() && auth()->user()->is_verified == 1)
                                    <a href="javascript:void(0)" id="hideShowOffer" onclick="offerShowHide()" class="btn btn-sm rounded campaign_btn saveColorBgAdd">
                                        Offer</a>

                                {{--                          @if(!empty($campaign->curatorFavoriteTrack) && $campaign->curatorFavoriteTrack->status == \App\Templates\IFavoriteTrackStatus::ACCEPTED)--}}
                                {{--                              <a href="javascript:void(0)" class="btn btn-sm rounded campaign_btn  {{ !empty($campaign->curatorFavoriteTrack) ? 'colorBgAdd' : '' }}"--}}
                                {{--                                 @if($campaign->artistTrack) onclick="favoriteTrack({{$campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::ACCEPTED}}')" @endif>--}}
                                {{--                                  Offer</a>--}}
                                {{--                          @else--}}
                                {{--                              @if(empty($campaign->curatorFavoriteTrack))--}}
                                {{--                                  <a href="javascript:void(0)" class="btn btn-sm rounded campaign_btn "--}}
                                {{--                                     @if($campaign->artistTrack) onclick="favoriteTrack({{$campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::ACCEPTED}}')" @endif>--}}
                                {{--                                      Offer</a>--}}
                                {{--                              @endif--}}
                                {{--                          @endif--}}

                                    @if(!empty($campaign->curatorFavoriteTrack) && $campaign->curatorFavoriteTrack->status == \App\Templates\IFavoriteTrackStatus::SAVE)
                                        <a href="javascript:void(0)" class="btn btn-sm rounded campaign_btn {{ !empty($campaign->curatorFavoriteTrack) ? 'colorBgAdd' : '' }}"
                                           @if($campaign->artistTrack) onclick="favoriteTrack({{$campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                            Save</a>
                                    @else
                                        @if(empty($campaign->curatorFavoriteTrack))
                                            <a href="javascript:void(0)" class="btn btn-sm rounded campaign_btn saveColorBgAdd"
                                               @if($campaign->artistTrack) onclick="favoriteTrack({{$campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                                Save</a>
                                        @endif
                                    @endif

                                    @if(!empty($campaign->curatorFavoriteTrack) && $campaign->curatorFavoriteTrack->status == \App\Templates\IFavoriteTrackStatus::REJECTED)
                                        <a href="javascript:void(0)" class="btn btn-sm rounded campaign_btn  {{ !empty($campaign->curatorFavoriteTrack) ? 'colorBgAdd' : '' }}"
                                           @if($campaign->artistTrack) onclick="favoriteTrack({{$campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::REJECTED}}')" @endif>
                                            Decline</a>
                                    @else
                                        @if(empty($campaign->curatorFavoriteTrack))
                                            <a href="javascript:void(0)" class="btn btn-sm rounded campaign_btn declineColorBgAdd"
                                               @if($campaign->artistTrack) onclick="favoriteTrack({{$campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::REJECTED}}')" @endif>
                                                Decline</a>
                                        @endif
                                    @endif
                                @endif
                            </div>

                            <div class="campaignBtn" id="campaignBtnSubmitCoverage" style="margin-top: 115px; !important; display:none;" >
                                <a href="javascript:void(0)" onclick="backToSubmitCoverageShowHide()" class="btn btn-sm rounded campaign_btn saveColorBgAdd">
                                    Back</a>
{{--                                <a href="javascript:void(0)" onclick="finalSubmitCoverage({{$campaign->user_id}},{{$campaign->track_id}})" class="btn btn-sm rounded campaign_btn ">--}}
{{--                                    Submit</a>--}}
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
                                            <select name="type" id="selectOffer" class="selectOffer" onchange="selectOfferTemplate(this.value)">
                                                <option value="Select Template" disabled selected>Select Template</option>
                                                @foreach($offerTemplates as $offerTemplate)
                                                    <option value="{{ $offerTemplate->id }}">{{ $offerTemplate->title ?? '----' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @else
                                    <div class="templateBtn text-center">
                                        <a href="{{route('curator.create.offer.template')}}" class="btn btn-sm rounded tem_btn ">
                                            Setup a new offer template</a>
                                    </div>
                                @endif
                                <span class="or_">OR</span>
                                <div class="offerBtn text-center">
                                    <a href="{{route('curator.direct.create.offer.template',['aid' => !empty($campaign->artistTrack) ? encrypt($campaign->artistTrack->user->id) : null,'cid' => encrypt($campaign->id)])}}" class="btn btn-sm rounded tem_btn ">
                                        Create a Offer</a>
                                </div>
{{--                                <span class="or_">OR</span>--}}
{{--                                <div class="submitCBtn text-center">--}}
{{--                                    <a href="javascript:void(0)" class="btn btn-sm rounded tem_btn ">--}}
{{--                                        Submit Coverage</a>--}}
{{--                                </div>--}}
                                <div class="campaignBtn" style="margin-top: 40px; !important;">
                                    <a href="javascript:void(0)" id="backToOverview" onclick="backToShowHide('overview')" class="btn btn-sm rounded campaign_btn saveColorBgAdd">
                                        Back to Overview</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="offerSendCollapsedShowHide" style="display:none;">
                <div class="collapsed_list">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="startCollapse">
                                <div class="sticky-bar-offer-type">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 id="nameOffer_"></h3>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center p-b-1">
                                        <span class="_800 text-white" >Offer Type: <span style="color: inherit !important;opacity: 0.6;" id="typeOffer_"></span></span>
                                        <span class="_800 text-white">Alternative Option: <span style="color: inherit !important;opacity: 0.6;" id="alternativeOffer_"></span></span>
                                        {{--                                    <span class="_800 text-white">Alternative Option: <span style="color: #02b875 !important;" id="alternativeOffer_"></span></span>--}}
                                    </div>
                                    <div class="d-flex p-b-1">
                                        <span class="h6 _800 text-white" >Contribution: <span style="color: #02b875 !important;" id="contribution_"></span></span>
                                    </div>
                                    <div class="item-except text-sm text-white">
                                        <p>
                                            <span class="h6 _800 text-white">Offer Text: <span style="color: inherit !important;opacity: 0.6;font-size: 0.9rem;" id="offerText_"></span></span>
                                        </p>
                                    </div>
                                    <input type="hidden" id="offerTemplateID" value="">
                                    <input type="hidden" id="campaign_ID" value="">
                                    <div class="d-flex form-group">
                                        <label class="control-label form-control-label text-white">Offer Expiry Date:</label>
                                        <div>
                                            <input id="datePickerOfferExpiry" value="{{getDateNewFormat(\Illuminate\Support\Carbon::today(),30)}}"
                                                   class="form-control datePickerE" style="background-color:white;">
                                        </div>
                                    </div>
                                    <div class="d-flex form-group">
                                        <label class="control-label form-control-label text-white">Approx Approximate Publish Date:</label>
                                        <div>
                                            <input id="datePickerPublishDate" value=""
                                                   class="form-control datePickerP" style="background-color:white;">
                                        </div>
                                    </div>
                                </div>
                                <div class="campaignBtn" style="margin-top: 115px; !important;" id="sendOfferHideShowCampaign">
                                    <a href="javascript:void(0)" onclick="backToShowHide('back')" class="btn btn-sm rounded campaign_btn saveColorBgAdd">
                                        Back</a>
                                    <a href="javascript:void(0)" onclick="sendOffer({{$campaign->user_id}},{{$campaign->track_id}})" class="btn btn-sm rounded campaign_btn saveColorBgAdd">
                                        Send Offer</a>
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
