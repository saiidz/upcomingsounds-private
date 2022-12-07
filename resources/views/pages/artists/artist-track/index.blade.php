<div class="row item-list item-list-by m-b">
    @if(count($artist_tracks) > 0)
        @foreach($artist_tracks as $track)
            <div class="col-xs-12" id="remove_track-{{$track->id}}">
                <div class="item r" data-id="item-{{$track->id}}"
                     data-src="{{URL('/')}}/uploads/audio/{{$track->audio}}">
                    <div class="item-media ">
{{--                        {{dd($track->track_thumbnail)}}--}}
                        @if(!empty($track->track_thumbnail))
                            <a href="javascript:void(0)" class="item-media-content"
                               style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$track->track_thumbnail}});"></a>
                        @else
                            <a href="javascript:void(0)" class="item-media-content"
                               style="background-image: url({{asset('images/b9.jpg')}});"></a>
                        @endif
                        <div class="item-overlay center">
                            <button class="btn-playpause">Play</button>
                        </div>
                    </div>
                    <div class="item-info">
                        <div class="item-overlay bottom text-right">
                            <a href="javascript:void(0)" class="btn-favorite"><i
                                    class="fa fa-heart-o"></i></a>
                            <a href="javascript:void(0)" class="btn-more" data-toggle="dropdown"><i
                                    class="fa fa-ellipsis-h"></i></a>
                            <div class="dropdown-menu pull-right black lt"></div>

                        </div>
                        <div class="item bottom text-right">
                            @if ($track->is_approved == 1)
                                <span class="text-primary">Approved</span>
                            @else
                                <span class="text-danger">Pending</span>
                            @endif

                        </div>
                        <div class="item-title text-ellipsis">
                            <a href="javascript:void(0)">{{$track->name}}</a>
                        </div>
                        <div class="item-author text-sm text-ellipsis hide">
                            <a href="javascript:void(0)" class="text-muted">{{($track->user->name) ? $track->user->name : ''}}</a>
                        </div>
                        <div class="item-meta text-sm text-muted">
                            <span class="item-meta-category">
                                <a href="javascript:void(0)" class="label">{{($track->trackCategory) ? ucfirst($track->trackCategory->name) : ''}}</a>
{{--                                <a href="browse.html" class="label">{{($track->trackCategory) ? ucfirst($track->trackCategory->name) : ''}}</a>--}}
                            </span>
                            <span class="item-meta-date text-xs">{{($track->release_date) ? \Carbon\Carbon::parse($track->release_date)->format('M d Y') : ''}}</span>
                        </div>

                        <div
                            class="item-except visible-list text-sm text-muted h-2x m-t-sm">
                            {{$track->description}}
                        </div>

                        <div class="item-action visible-list m-t-sm">
                            @if($track->is_locked == 0 && $track->is_approved == 0)
                                <button class="btn btn-xs white" onclick="editTrack({{$track->id}})" data-toggle="modal" data-target="#edit-track">Edit</button>
                            @else
{{--                                <button class="btn btn-xs white" data-toggle="modal" data-target="#requestEdit">Request To Edit</button>--}}
                                <a href="javascript:void(0)" onclick="requestEditTrack({{$track->id}})" class="btn btn-xs white" data-toggle="modal"
                                   data-target="#requestEdit">Request To Edit</a>
                            @endif

                            @if(count($track->campaign) > 0 && !empty($track->campaign))
                                <div class="btn btn-xs white">
                                    <span class="text-primary">Added In Campaign</span>
                                </div>
                            @else
                                <a href="javascript:void(0)" onclick="deleteTrack({{$track->id}})" class="btn btn-xs white" data-toggle="modal"
                                   data-target="#delete-track-modal">Delete</a>
                                @if($track->is_approved == 1)
                                        <a href="javascript:void(0)" onclick="promoteTrackRedirect({{$track->id}})" class="btn btn-xs white">Promote Your Track</a>
                                @endif

                            @endif
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    @else
        <div class="item-title text-ellipsis">
            <h3 class="white" style="text-align:center">Not Found</h3>
        </div>
    @endif

    @include('pages.artists.artist-track.modal')

    <!-- Edit Track Modal -->
</div>
{{--<a href="#" class="btn btn-sm white rounded">Show More</a>--}}

