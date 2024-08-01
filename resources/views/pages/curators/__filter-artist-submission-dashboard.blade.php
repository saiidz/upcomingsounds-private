@if(!empty($campaignsArtistSubmissions))
    @foreach($campaignsArtistSubmissions as $campaignsArtistSubmission)
        <div class="">
            <div class="item r" onclick="openNav({{$campaignsArtistSubmission->id}})" style="cursor:pointer;" data-id="item-{{$campaignsArtistSubmission->artistTrack->id}}" data-src="{{URL('/')}}/uploads/audio/{{$campaignsArtistSubmission->artistTrack->audio}}">
                <div class="item-media item-media-4by3">
                    @if(!empty($campaignsArtistSubmission->artistTrack->track_thumbnail))
                        <a href="javascript:void(0)" class="item-media-content"
                           style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$campaignsArtistSubmission->artistTrack->track_thumbnail}});"></a>
                    @else
                        <a href="javascript:void(0)" class="item-media-content"
                           style="background-image: url({{asset('images/b4.jpg')}});"></a>
                    @endif

                    @if(!empty($campaignsArtistSubmission->artistTrack->audio))
                        <div class="item-overlay center">
                            <button  class="btn-playpause">Play</button>
                        </div>
                    @endif
                </div>
                <div class="item-info">
                    <div class="item-overlay bottom text-right">
                        @if(!empty($campaignsArtistSubmission->curatorFavoriteTrack) && $campaignsArtistSubmission->curatorFavoriteTrack->status == \App\Templates\IFavoriteTrackStatus::SAVE)
                            <a href="javascript:void(0)" class="btn-favorite" @if($campaignsArtistSubmission->artistTrack) onclick="favoriteTrack({{$campaignsArtistSubmission->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                <i class=" {{ !empty($campaignsArtistSubmission->curatorFavoriteTrack) ? 'fa fa-heart colorAdd' : 'fa fa-heart-o' }}"></i>
                            </a>
                        @else
                            @if(empty($campaignsArtistSubmission->curatorFavoriteTrack))
                                <a href="javascript:void(0)" class="btn-favorite" @if($campaignsArtistSubmission->artistTrack) onclick="favoriteTrack({{$campaignsArtistSubmission->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                    <i class="fa fa-heart-o"></i>
                                </a>
                            @endif
                        @endif
                        {{--                                                <a href="javascript:void(0)" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
                        <div class="dropdown-menu pull-right black lt"></div>
                    </div>
                    <div class="item-title text-ellipsis">
                        <a href="javascript:void(0)" onclick="openNav({{$campaignsArtistSubmission->id}})">{{$campaignsArtistSubmission->artistTrack->name}}</a>
                    </div>
                    <div class="item-author text-sm text-ellipsis ">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
