@if(!empty($standard_campaigns))
    @foreach($standard_campaigns as $standard_campaign)
        <div class="item r" onclick="openNav({{$standard_campaign->id}})" style="cursor:pointer;" data-id="item-{{$standard_campaign->artistTrack->id}}" data-src="{{URL('/')}}/uploads/audio/{{$standard_campaign->artistTrack->audio}}">
            <div class="item-media primary">
                @if(!empty($standard_campaign->artistTrack->track_thumbnail))
                    <a href="javascript:void(0)" class="item-media-content" onclick="openNav({{$standard_campaign->id}})"
                       style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$standard_campaign->artistTrack->track_thumbnail}});"></a>
                @else
                    <a href="javascript:void(0)" onclick="openNav({{$standard_campaign->id}})" class="item-media-content"
                       style="background-image: url({{asset('images/b4.jpg')}});"></a>
                @endif

                @if(!empty($standard_campaign->artistTrack->audio))
                    <div class="item-overlay center">
                        <button  class="btn-playpause">Play</button>
                    </div>
                @endif
            </div>
            <div class="item-info">
                <div class="item-overlay bottom text-right">

                    @if(!empty($standard_campaign->curatorFavoriteTrack) && $standard_campaign->curatorFavoriteTrack->status == \App\Templates\IFavoriteTrackStatus::SAVE)
                        <a href="javascript:void(0)" class="btn-favorite" @if($standard_campaign->artistTrack) onclick="favoriteTrack({{$standard_campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                            <i class=" {{ !empty($standard_campaign->curatorFavoriteTrack) ? 'fa fa-heart colorAdd' : 'fa fa-heart-o' }}"></i>
                        </a>
                    @else
                        @if(empty($standard_campaign->curatorFavoriteTrack))
                            <a href="javascript:void(0)" class="btn-favorite" @if($standard_campaign->artistTrack) onclick="favoriteTrack({{$standard_campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                <i class="fa fa-heart-o"></i>
                            </a>
                        @endif
                    @endif
                    <div class="dropdown-menu pull-right black lt"></div>
                </div>
                <div class="item-title text-ellipsis">
                    <a href="javascript:void(0)" onclick="openNav({{$standard_campaign->id}})">{{$standard_campaign->artistTrack->name}}</a>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="item-title text-ellipsis">
        <h3 class="white" style="text-align:center;font-size: 15px;">Not Campaign Found</h3>
    </div>
@endif
