<fieldset id="form1">
    <div class="sub__title__container ">
        <p>Step 1/3</p>
        <h2>Start by adding your release or select one if you have already!</h2>
        <p class="m-b-md">You are one step closer to spreading your art to the world, now add a new track and fill out the required information.</p>
        {{-- <a class="m-b-md rounded addTrack" data-toggle="modal" data-target="#add-track-promote" href="javascript:void(0)">
           Add New track
        </a> --}}
    </div>
    @php
        $SelectedTrack =  $_GET['track_id'] ??'';
    @endphp
    <div class="input__container">
        <div class="row item-list item-list-md m-b">
            @if(count($artist_tracks) > 0)
                @foreach($artist_tracks as $track)
                    <div class="col-sm-6 promoteArtist" onclick="artistTrack({{$track->id}})" >
                        <div class="item r {{!empty($SelectedTrack) && ($SelectedTrack == $track->id) ? 'item_artist' : ''}}" data-id="item-{{$track->id}}" id="promoteArtistItem_{{$track->id}}">
                            <div class="item-media">
                                {{-- @if(!empty($track->track_thumbnail))
                                    <a href="javascript:void(0)" class="item-media-content" onclick="viewTrack({{$track->id}})" data-toggle="modal" data-target="#view-track"
                                       style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$track->track_thumbnail}});"></a>
                                @else
                                    <a href="javascript:void(0)" class="item-media-content" onclick="viewTrack({{$track->id}})" data-toggle="modal" data-target="#view-track"
                                       style="background-image: url({{asset('images/b4.jpg')}});"></a>
                                @endif --}}
                                @if(!empty($track->track_thumbnail))
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$track->track_thumbnail}});"></a>
                                @else
                                    <a href="javascript:void(0)" class="item-media-content" style="background-image: url({{asset('images/b4.jpg')}});"></a>
                                @endif
                            </div>
                            <div class="item-info">
                                <div class="item-title bottom text-right">
                                    <input type="checkbox" class="oneTrackSelected" {{!empty($SelectedTrack) && ($SelectedTrack == $track->id) ? 'checked' : ''}} id="oneTrackSelected_{{$track->id}}" value="{{$track->id}}" name="track_id" required />
                                </div>
                                <div class="item-title text-ellipsis">
                                    <div>{{$track->name}}</div>
                                </div>
                                <div class="item-author text-sm text-ellipsis ">
                                    <div class="text-muted">{{($user_artist->name) ? $user_artist->name : ''}}</div>
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
{{--        <a class="m-b-md rounded addTrack nxt__btn" onclick="nextForm('step_one');"> Next</a>--}}
        <div class="buttons" style="justify-content: flex-start !important;">
            <a class="m-b-md rounded addTrack" data-toggle="modal" data-target="#add-track-promote" href="javascript:void(0)">
                Submit New Release
            </a>
            <a class="m-b-md rounded addTrack nxt__btn" id="firstStepBtn" onclick="nextForm('step_one');"> Next</a>
        </div>
    </div>
</fieldset>


