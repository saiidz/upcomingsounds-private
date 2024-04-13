@if(!empty($campaigns))
    @foreach($campaigns as $campaign)
        <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 col-xl-3">
            <div class="item r" data-id="item-{{$campaign->artistTrack->id}}" data-src="{{URL('/')}}/uploads/audio/{{$campaign->artistTrack->audio}}">
                <div class="item-media">
                    @if(!empty($campaign->artistTrack->track_thumbnail))
                        <a href="javascript:void(0)" class="item-media-content" onclick="openNav({{$campaign->id}})"
                           style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$campaign->artistTrack->track_thumbnail}});"></a>
                    @else
                        <a href="javascript:void(0)" onclick="openNav({{$campaign->id}})" class="item-media-content"
                           style="background-image: url({{asset('images/b4.jpg')}});"></a>
                    @endif

                    @if(!empty($campaign->artistTrack->audio))
                        <div class="item-overlay center">
                            <button  class="btn-playpause">Play</button>
                        </div>
                    @endif
                </div>
                <div class="item-info">
                    <div class="item-overlay bottom text-right">
                        @if(!empty($campaign->curatorFavoriteTrack) && $campaign->curatorFavoriteTrack->status == \App\Templates\IFavoriteTrackStatus::SAVE)
                            <a href="javascript:void(0)" class="btn-favorite" @if($campaign->artistTrack) onclick="favoriteTrack({{$campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                <i class=" {{ !empty($campaign->curatorFavoriteTrack) ? 'fa fa-heart colorAdd' : 'fa fa-heart-o' }}"></i>
                            </a>
                        @else
                            @if(empty($campaign->curatorFavoriteTrack))
                                <a href="javascript:void(0)" class="btn-favorite" @if($campaign->artistTrack) onclick="favoriteTrack({{$campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                    <i class="fa fa-heart-o"></i>
                                </a>
                            @endif
                        @endif


                        {{--                                                            <a href="#" class="btn-more" data-toggle="dropdown">--}}
                        {{--                                                                <i class="fa fa-ellipsis-h"></i>--}}
                        {{--                                                            </a>--}}
                        <div class="dropdown-menu pull-right black lt"></div>
                    </div>
                    <div class="item-title text-ellipsis">
                        <a href="javascript:void(0)" onclick="openNav({{$campaign->id}})">{{$campaign->artistTrack->name}} ({{!empty($campaign->user) ? $campaign->user->name : '---'}})</a>
                    </div>
                    <div class="item-author text-ellipsis">
                        <span class="text-muted">Release Date: {{ getDateFormat($campaign->artistTrack->release_date) }}</span>
{{--                        <span class="text-muted">Release Date: {{ getDateFormat($campaign->artistTrack->created_at) }}</span>--}}
                    </div>
                    <div class="item-author text-ellipsis">
                        @if(!empty($campaign->user) && !empty($campaign->user->artistUser->country))
                            <div class="clearfix m-b-sm">
                                <img class="flag_icon" src="{{asset('images/flags')}}/{{$campaign->user->artistUser->country->flag_icon}}.png" alt="{{$campaign->user->artistUser->country->flag_icon}}">
                                <span class="text-muted"
                                      style="font-size:15px">{{($campaign->user->artistUser->country) ? $campaign->user->artistUser->country->name : ''}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="item-author text-sm text-ellipsis">
                        <a href="javascript:void(0)" class="text-muted">{{Str::ucfirst($campaign->package_name) ?? '----'}}</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="item-title text-ellipsis">
        <h3 class="white" style="text-align:center;font-size: 15px;">Not Campaign Found</h3>
    </div>
@endif
