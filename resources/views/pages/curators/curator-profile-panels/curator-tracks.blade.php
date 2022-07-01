<div class="row item-list item-list-by m-b">
    <div class="col-xs-12" >
        <div class="item r"
                data-src="http://api.soundcloud.com/tracks/237514750/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
            <div class="item-media ">
                <a href="javascript:void(0)" class="item-media-content"
                        style="background-image: url({{asset('images/b9.jpg')}});"></a>
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
                <div class="item-title text-ellipsis">
                    <a href="javascript:void(0)">Test</a>
                </div>
                <div class="item-author text-sm text-ellipsis hide">
                    <a href="javascript:void(0)" class="text-muted">Test</a>
                </div>
                <div class="item-meta text-sm text-muted">
                    <span class="item-meta-category">
                        <a href="javascript:void(0)" class="label">Test</a>
                    </span>
                    <span class="item-meta-date text-xs">{{ \Carbon\Carbon::now()->format('M d Y')}}</span>
                </div>

                <div
                    class="item-except visible-list text-sm text-muted h-2x m-t-sm">
                    Test
                </div>

                {{-- <div class="item-action visible-list m-t-sm">
                    @if($track->is_locked == 0)
                        <button class="btn btn-xs white" onclick="editTrack({{$track->id}})" data-toggle="modal" data-target="#edit-track">Edit</button>
                    @endif
                    <a href="javascript:void(0)" onclick="deleteTrack({{$track->id}})" class="btn btn-xs white" data-toggle="modal"
                        data-target="#delete-track-modal">Delete</a>
                        <a href="{{url('promote-your-track')}}" class="btn btn-xs white">Promote Your Track</a>
                </div> --}}
            </div>
        </div>
    </div>
</div>

