<h5 class="m-b">Popular</h5>
<div class="row item-list item-list-md item-list-li m-b" id="tracks">
    @if(count($user->artistTrackPopular) > 0)
        @foreach($user->artistTrackPopular as $track)
            <div class="col-md-12 col-lg-6">
                <div class="item r" data-id="item-{{$track->id}}" data-src="{{URL('/')}}/uploads/audio/{{$track->audio}}">
                    <div class="item-media ">
                        @if(!empty($track->track_thumbnail))
                            <a href="javascript:void(0)" class="item-media-content"
                               style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$track->track_thumbnail}});"></a>
                        @else
                            <a href="javascript:void(0)" class="item-media-content"
                               style="background-image: url({{asset('images/b4.jpg')}});"></a>
                        @endif
                        <div class="item-overlay center">
                            <button  class="btn-playpause">Play</button>
                        </div>
                    </div>
                    <div class="item-info">
                        {{--                <div class="item-overlay bottom text-right">--}}
                        {{--                    <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>--}}
                        {{--                    <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>--}}
                        {{--                    <div class="dropdown-menu pull-right black lt"></div>--}}
                        {{--                </div>--}}
                        <div class="item-title text-ellipsis">
                            <a href="javascript:void(0)">{{$track->name}}</a>
                        </div>
{{--                        <div class="item-author text-sm text-ellipsis hide">--}}
{{--                            <a href="javascript:void(0)" class="text-muted">Kygo</a>--}}
{{--                        </div>--}}
                        <div class="item-meta text-sm text-muted">
                  <span class="item-meta-stats text-xs ">
                    <i class="fa fa-play text-muted"></i> 30
                    <i class="fa fa-heart m-l-sm text-muted"></i> 10
                  </span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="item-title text-ellipsis">
            <h3 class="white" style="text-align:center;font-size: 15px;">Not Found</h3>
        </div>
    @endif
</div>
<h5 class="m-b">Albums</h5>
<div class="row m-b">
    @if(count($user->artistTrackAlbum) > 0)
        @foreach($user->artistTrackAlbum as $track)
            <div class="col-xs-4 col-sm-4 col-md-3">
                <div class="item r" data-id="item-{{$track->id}}" data-src="{{URL('/')}}/uploads/audio/{{$track->audio}}">
                    <div class="item-media ">
                        @if(!empty($track->track_thumbnail))
                            <a href="javascript:void(0)" class="item-media-content"
                               style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$track->track_thumbnail}});"></a>
                        @else
                            <a href="javascript:void(0)" class="item-media-content"
                               style="background-image: url({{asset('images/b4.jpg')}});"></a>
                        @endif
                        <div class="item-overlay center">
                            <button  class="btn-playpause">Play</button>
                        </div>
                    </div>
                    <div class="item-info">
                        <div class="item-title text-ellipsis">
                            <a href="javascript:void(0)">{{$track->name}}</a>
                        </div>
{{--                        <div class="item-author text-sm text-ellipsis hide">--}}
{{--                            <a href="javascript:void(0)" class="text-muted">{{$track->user->name}}</a>--}}
{{--                        </div>--}}
{{--                        <div class="item-meta text-sm text-muted">--}}
{{--              		          <span class="item-meta-stats text-xs ">--}}
{{--              		          	<i class="fa fa-play text-muted"></i> 200--}}
{{--              		          	<i class="fa fa-heart m-l-sm text-muted"></i> 510--}}
{{--              		          </span>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="item-title text-ellipsis">
            <h3 class="white" style="text-align:center;font-size: 15px;">Not Found</h3>
        </div>
    @endif
</div>
