<div class="row item-list item-list-by m-b">
    @if(count($artist_tracks) > 0)
        @foreach($artist_tracks as $track)
            <div class="col-xs-12">
                <div class="item r" data-id="item-{{$track->id}}"
                     data-src="http://api.soundcloud.com/tracks/237514750/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                    <div class="item-media ">
                        @if(!empty($track->track_thumbnail))
                            <a href="#" class="item-media-content"
                               style="background-image: url({{URL('/')}}/uploads/track_thumbnail/{{$track->track_thumbnail}});"></a>
                        @else
                            <a href="#" class="item-media-content"
                               style="background-image: url({{asset('images/b9.jpg')}});"></a>
                        @endif
                        <div class="item-overlay center">
                            <button class="btn-playpause">Play</button>
                        </div>
                    </div>
                    <div class="item-info">
                        <div class="item-overlay bottom text-right">
                            <a href="#" class="btn-favorite"><i
                                    class="fa fa-heart-o"></i></a>
                            <a href="#" class="btn-more" data-toggle="dropdown"><i
                                    class="fa fa-ellipsis-h"></i></a>
                            <div class="dropdown-menu pull-right black lt"></div>
                        </div>
                        <div class="item-title text-ellipsis">
                            <a href="#">{{$track->name}}</a>
                        </div>
                        <div class="item-author text-sm text-ellipsis hide">
                            <a href="#" class="text-muted">{{($track->user->name) ? $track->user->name : ''}}</a>
                        </div>
                        <div class="item-meta text-sm text-muted">
                            <span class="item-meta-category">
                                <a href="#" class="label">{{($track->trackCategory) ? ucfirst($track->trackCategory->name) : ''}}</a>
{{--                                <a href="browse.html" class="label">{{($track->trackCategory) ? ucfirst($track->trackCategory->name) : ''}}</a>--}}
                            </span>
                            <span class="item-meta-date text-xs">{{\Carbon\Carbon::parse($track->release_date)->format('M d Y')}}</span>
                        </div>

                        <div
                            class="item-except visible-list text-sm text-muted h-2x m-t-sm">
                            {{$track->description}}
                        </div>

                        <div class="item-action visible-list m-t-sm">
                            <a href="#" class="btn btn-xs white">Edit</a>
                            <a href="#" class="btn btn-xs white" data-toggle="modal"
                               data-target="#delete-modal">Delete</a>
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

    {{--    <div class="col-xs-12">--}}
    {{--        <div class="item r" data-id="item-9"--}}
    {{--             data-src="http://api.soundcloud.com/tracks/264094434/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">--}}
    {{--            <div class="item-media ">--}}
    {{--                <a href="#" class="item-media-content"--}}
    {{--                   style="background-image: url('images/b8.jpg');"></a>--}}
    {{--                <div class="item-overlay center">--}}
    {{--                    <button class="btn-playpause">Play</button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="item-info">--}}
    {{--                <div class="item-overlay bottom text-right">--}}
    {{--                    <a href="#" class="btn-favorite"><i--}}
    {{--                            class="fa fa-heart-o"></i></a>--}}
    {{--                    <a href="#" class="btn-more" data-toggle="dropdown"><i--}}
    {{--                            class="fa fa-ellipsis-h"></i></a>--}}
    {{--                    <div class="dropdown-menu pull-right black lt"></div>--}}
    {{--                </div>--}}
    {{--                <div class="item-title text-ellipsis">--}}
    {{--                    <a href="track.detail.html">All I Need</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-author text-sm text-ellipsis hide">--}}
    {{--                    <a href="artist.detail.html" class="text-muted">Pablo--}}
    {{--                        Nouvelle</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-meta text-sm text-muted">--}}
    {{--                                                        <span class="item-meta-category"><a href="browse.html"--}}
    {{--                                                                                            class="label">Jazz</a></span>--}}
    {{--                    <span class="item-meta-date text-xs">02.04.2016</span>--}}
    {{--                </div>--}}

    {{--                <div--}}
    {{--                    class="item-except visible-list text-sm text-muted h-2x m-t-sm">--}}
    {{--                    Tandem linguam nescio? Sed hoc sane concedamus.--}}
    {{--                </div>--}}

    {{--                <div class="item-action visible-list m-t-sm">--}}
    {{--                    <a href="#" class="btn btn-xs white">Edit</a>--}}
    {{--                    <a href="#" class="btn btn-xs white" data-toggle="modal"--}}
    {{--                       data-target="#delete-modal">Delete</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <div class="col-xs-12">--}}
    {{--        <div class="item r" data-id="item-4"--}}
    {{--             data-src="http://api.soundcloud.com/tracks/230791292/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">--}}
    {{--            <div class="item-media ">--}}
    {{--                <a href="track.detail.html" class="item-media-content"--}}
    {{--                   style="background-image: url('images/b3.jpg');"></a>--}}
    {{--                <div class="item-overlay center">--}}
    {{--                    <button class="btn-playpause">Play</button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="item-info">--}}
    {{--                <div class="item-overlay bottom text-right">--}}
    {{--                    <a href="#" class="btn-favorite"><i--}}
    {{--                            class="fa fa-heart-o"></i></a>--}}
    {{--                    <a href="#" class="btn-more" data-toggle="dropdown"><i--}}
    {{--                            class="fa fa-ellipsis-h"></i></a>--}}
    {{--                    <div class="dropdown-menu pull-right black lt"></div>--}}
    {{--                </div>--}}
    {{--                <div class="item-title text-ellipsis">--}}
    {{--                    <a href="track.detail.html">What A Time To Be Alive</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-author text-sm text-ellipsis hide">--}}
    {{--                    <a href="artist.detail.html" class="text-muted">Judith--}}
    {{--                        Garcia</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-meta text-sm text-muted">--}}
    {{--                                                        <span class="item-meta-category"><a href="browse.html"--}}
    {{--                                                                                            class="label">Electro</a></span>--}}
    {{--                    <span class="item-meta-date text-xs">04.05.2016</span>--}}
    {{--                </div>--}}

    {{--                <div--}}
    {{--                    class="item-except visible-list text-sm text-muted h-2x m-t-sm">--}}
    {{--                    Verum hoc idem saepe faciamus inguam nescio? Sed hoc sane--}}
    {{--                    concedamus.--}}
    {{--                </div>--}}

    {{--                <div class="item-action visible-list m-t-sm">--}}
    {{--                    <a href="#" class="btn btn-xs white">Edit</a>--}}
    {{--                    <a href="#" class="btn btn-xs white" data-toggle="modal"--}}
    {{--                       data-target="#delete-modal">Delete</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <div class="col-xs-12">--}}
    {{--        <div class="item r" data-id="item-2"--}}
    {{--             data-src="http://api.soundcloud.com/tracks/259445397/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">--}}
    {{--            <div class="item-media ">--}}
    {{--                <a href="track.detail.html" class="item-media-content"--}}
    {{--                   style="background-image: url('images/b1.jpg');"></a>--}}
    {{--                <div class="item-overlay center">--}}
    {{--                    <button class="btn-playpause">Play</button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="item-info">--}}
    {{--                <div class="item-overlay bottom text-right">--}}
    {{--                    <a href="#" class="btn-favorite"><i--}}
    {{--                            class="fa fa-heart-o"></i></a>--}}
    {{--                    <a href="#" class="btn-more" data-toggle="dropdown"><i--}}
    {{--                            class="fa fa-ellipsis-h"></i></a>--}}
    {{--                    <div class="dropdown-menu pull-right black lt"></div>--}}
    {{--                </div>--}}
    {{--                <div class="item-title text-ellipsis">--}}
    {{--                    <a href="track.detail.html">Fireworks</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-author text-sm text-ellipsis hide">--}}
    {{--                    <a href="artist.detail.html" class="text-muted">Kygo</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-meta text-sm text-muted">--}}
    {{--                                                        <span class="item-meta-category"><a href="browse.html"--}}
    {{--                                                                                            class="label">Jazz</a></span>--}}
    {{--                    <span class="item-meta-date text-xs">02.05.2016</span>--}}
    {{--                </div>--}}

    {{--                <div--}}
    {{--                    class="item-except visible-list text-sm text-muted h-2x m-t-sm">--}}
    {{--                    Hidem saepe faciamus. Quid ad utilitatem tantae pecuniae? Utram--}}
    {{--                    tandem linguam nescio? Sed hoc sane concedamus.--}}
    {{--                </div>--}}

    {{--                <div class="item-action visible-list m-t-sm">--}}
    {{--                    <a href="#" class="btn btn-xs white">Edit</a>--}}
    {{--                    <a href="#" class="btn btn-xs white" data-toggle="modal"--}}
    {{--                       data-target="#delete-modal">Delete</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <div class="col-xs-12">--}}
    {{--        <div class="item r" data-id="item-12"--}}
    {{--             data-src="http://api.soundcloud.com/tracks/174495152/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">--}}
    {{--            <div class="item-media ">--}}
    {{--                <a href="track.detail.html" class="item-media-content"--}}
    {{--                   style="background-image: url('images/b11.jpg');"></a>--}}
    {{--                <div class="item-overlay center">--}}
    {{--                    <button class="btn-playpause">Play</button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="item-info">--}}
    {{--                <div class="item-overlay bottom text-right">--}}
    {{--                    <a href="#" class="btn-favorite"><i--}}
    {{--                            class="fa fa-heart-o"></i></a>--}}
    {{--                    <a href="#" class="btn-more" data-toggle="dropdown"><i--}}
    {{--                            class="fa fa-ellipsis-h"></i></a>--}}
    {{--                    <div class="dropdown-menu pull-right black lt"></div>--}}
    {{--                </div>--}}
    {{--                <div class="item-title text-ellipsis">--}}
    {{--                    <a href="track.detail.html">Happy ending</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-author text-sm text-ellipsis hide">--}}
    {{--                    <a href="artist.detail.html" class="text-muted">Postiljonen</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-meta text-sm text-muted">--}}
    {{--                                                        <span class="item-meta-category"><a href="browse.html"--}}
    {{--                                                                                            class="label">Latin</a></span>--}}
    {{--                    <span class="item-meta-date text-xs">09.06.2016</span>--}}
    {{--                </div>--}}

    {{--                <div--}}
    {{--                    class="item-except visible-list text-sm text-muted h-2x m-t-sm">--}}
    {{--                    Utilitatem tantae pecuniae? Utram tandem linguam nescio? Sed hoc--}}
    {{--                    sane concedamus.--}}
    {{--                </div>--}}

    {{--                <div class="item-action visible-list m-t-sm">--}}
    {{--                    <a href="#" class="btn btn-xs white">Edit</a>--}}
    {{--                    <a href="#" class="btn btn-xs white" data-toggle="modal"--}}
    {{--                       data-target="#delete-modal">Delete</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <div class="col-xs-12">--}}
    {{--        <div class="item r" data-id="item-6"--}}
    {{--             data-src="http://api.soundcloud.com/tracks/236107824/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">--}}
    {{--            <div class="item-media ">--}}
    {{--                <a href="track.detail.html" class="item-media-content"--}}
    {{--                   style="background-image: url('images/b5.jpg');"></a>--}}
    {{--                <div class="item-overlay center">--}}
    {{--                    <button class="btn-playpause">Play</button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="item-info">--}}
    {{--                <div class="item-overlay bottom text-right">--}}
    {{--                    <a href="#" class="btn-favorite"><i--}}
    {{--                            class="fa fa-heart-o"></i></a>--}}
    {{--                    <a href="#" class="btn-more" data-toggle="dropdown"><i--}}
    {{--                            class="fa fa-ellipsis-h"></i></a>--}}
    {{--                    <div class="dropdown-menu pull-right black lt"></div>--}}
    {{--                </div>--}}
    {{--                <div class="item-title text-ellipsis">--}}
    {{--                    <a href="track.detail.html">Body on me</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-author text-sm text-ellipsis hide">--}}
    {{--                    <a href="artist.detail.html" class="text-muted">Rita Ora</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-meta text-sm text-muted">--}}
    {{--                                                        <span class="item-meta-category"><a href="browse.html"--}}
    {{--                                                                                            class="label">Nature</a></span>--}}
    {{--                    <span class="item-meta-date text-xs">09.04.2016</span>--}}
    {{--                </div>--}}

    {{--                <div--}}
    {{--                    class="item-except visible-list text-sm text-muted h-2x m-t-sm">--}}
    {{--                    Tantae pecuniae? Utram tandem linguam nescio? Sed hoc sane--}}
    {{--                    concedamus.--}}
    {{--                </div>--}}

    {{--                <div class="item-action visible-list m-t-sm">--}}
    {{--                    <a href="#" class="btn btn-xs white">Edit</a>--}}
    {{--                    <a href="#" class="btn btn-xs white" data-toggle="modal"--}}
    {{--                       data-target="#delete-modal">Delete</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <div class="col-xs-12">--}}
    {{--        <div class="item r" data-id="item-11"--}}
    {{--             data-src="http://api.soundcloud.com/tracks/218060449/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">--}}
    {{--            <div class="item-media ">--}}
    {{--                <a href="track.detail.html" class="item-media-content"--}}
    {{--                   style="background-image: url('images/b10.jpg');"></a>--}}
    {{--                <div class="item-overlay center">--}}
    {{--                    <button class="btn-playpause">Play</button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="item-info">--}}
    {{--                <div class="item-overlay bottom text-right">--}}
    {{--                    <a href="#" class="btn-favorite"><i--}}
    {{--                            class="fa fa-heart-o"></i></a>--}}
    {{--                    <a href="#" class="btn-more" data-toggle="dropdown"><i--}}
    {{--                            class="fa fa-ellipsis-h"></i></a>--}}
    {{--                    <div class="dropdown-menu pull-right black lt"></div>--}}
    {{--                </div>--}}
    {{--                <div class="item-title text-ellipsis">--}}
    {{--                    <a href="track.detail.html">Spring</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-author text-sm text-ellipsis hide">--}}
    {{--                    <a href="artist.detail.html" class="text-muted">Pablo--}}
    {{--                        Nouvelle</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-meta text-sm text-muted">--}}
    {{--                                                        <span class="item-meta-category"><a href="browse.html"--}}
    {{--                                                                                            class="label">Indie</a></span>--}}
    {{--                    <span class="item-meta-date text-xs">09.03.2016</span>--}}
    {{--                </div>--}}

    {{--                <div--}}
    {{--                    class="item-except visible-list text-sm text-muted h-2x m-t-sm">--}}
    {{--                    Saepe faciamus. Quid ad utilitatem tantae pecuniae? Utram tandem--}}
    {{--                    linguam nescio? Sed hoc sane concedamus.--}}
    {{--                </div>--}}

    {{--                <div class="item-action visible-list m-t-sm">--}}
    {{--                    <a href="#" class="btn btn-xs white">Edit</a>--}}
    {{--                    <a href="#" class="btn btn-xs white" data-toggle="modal"--}}
    {{--                       data-target="#delete-modal">Delete</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <div class="col-xs-12">--}}
    {{--        <div class="item r" data-id="item-3"--}}
    {{--             data-src="http://api.soundcloud.com/tracks/79031167/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">--}}
    {{--            <div class="item-media ">--}}
    {{--                <a href="track.detail.html" class="item-media-content"--}}
    {{--                   style="background-image: url('images/b2.jpg');"></a>--}}
    {{--                <div class="item-overlay center">--}}
    {{--                    <button class="btn-playpause">Play</button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="item-info">--}}
    {{--                <div class="item-overlay bottom text-right">--}}
    {{--                    <a href="#" class="btn-favorite"><i--}}
    {{--                            class="fa fa-heart-o"></i></a>--}}
    {{--                    <a href="#" class="btn-more" data-toggle="dropdown"><i--}}
    {{--                            class="fa fa-ellipsis-h"></i></a>--}}
    {{--                    <div class="dropdown-menu pull-right black lt"></div>--}}
    {{--                </div>--}}
    {{--                <div class="item-title text-ellipsis">--}}
    {{--                    <a href="track.detail.html">I Wanna Be In the Cavalry</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-author text-sm text-ellipsis hide">--}}
    {{--                    <a href="artist.detail.html" class="text-muted">Jeremy Scott</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-meta text-sm text-muted">--}}
    {{--                                                        <span class="item-meta-category"><a href="browse.html"--}}
    {{--                                                                                            class="label">DJ</a></span>--}}
    {{--                    <span class="item-meta-date text-xs">09.04.2016</span>--}}
    {{--                </div>--}}

    {{--                <div--}}
    {{--                    class="item-except visible-list text-sm text-muted h-2x m-t-sm">--}}
    {{--                    Tantae pecuniae? Utram tandem linguam nescio? Sed hoc sane--}}
    {{--                    concedamus.--}}
    {{--                </div>--}}

    {{--                <div class="item-action visible-list m-t-sm">--}}
    {{--                    <a href="#" class="btn btn-xs white">Edit</a>--}}
    {{--                    <a href="#" class="btn btn-xs white" data-toggle="modal"--}}
    {{--                       data-target="#delete-modal">Delete</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <div class="col-xs-12">--}}
    {{--        <div class="item r" data-id="item-5"--}}
    {{--             data-src="http://streaming.radionomy.com/JamendoLounge">--}}
    {{--            <div class="item-media ">--}}
    {{--                <a href="track.detail.html" class="item-media-content"--}}
    {{--                   style="background-image: url('images/b4.jpg');"></a>--}}
    {{--                <div class="item-overlay center">--}}
    {{--                    <button class="btn-playpause">Play</button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="item-info">--}}
    {{--                <div class="item-overlay bottom text-right">--}}
    {{--                    <a href="#" class="btn-favorite"><i--}}
    {{--                            class="fa fa-heart-o"></i></a>--}}
    {{--                    <a href="#" class="btn-more" data-toggle="dropdown"><i--}}
    {{--                            class="fa fa-ellipsis-h"></i></a>--}}
    {{--                    <div class="dropdown-menu pull-right black lt"></div>--}}
    {{--                </div>--}}
    {{--                <div class="item-title text-ellipsis">--}}
    {{--                    <a href="track.detail.html">Live Radio</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-author text-sm text-ellipsis hide">--}}
    {{--                    <a href="artist.detail.html" class="text-muted">Radionomy</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-meta text-sm text-muted">--}}
    {{--                                                        <span class="item-meta-category"><a href="browse.html"--}}
    {{--                                                                                            class="label">Electro</a></span>--}}
    {{--                    <span class="item-meta-date text-xs">09.05.2016</span>--}}
    {{--                </div>--}}

    {{--                <div--}}
    {{--                    class="item-except visible-list text-sm text-muted h-2x m-t-sm">--}}
    {{--                    Verum hoc idem saepe faciamus. Quid ad utilitatem tantae--}}
    {{--                    pecuniae? Utram tandem linguam nescio? Sed hoc sane concedamus.--}}
    {{--                </div>--}}

    {{--                <div class="item-action visible-list m-t-sm">--}}
    {{--                    <a href="#" class="btn btn-xs white">Edit</a>--}}
    {{--                    <a href="#" class="btn btn-xs white" data-toggle="modal"--}}
    {{--                       data-target="#delete-modal">Delete</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <div class="col-xs-12">--}}
    {{--        <div class="item r" data-id="item-8"--}}
    {{--             data-src="http://api.soundcloud.com/tracks/236288744/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">--}}
    {{--            <div class="item-media ">--}}
    {{--                <a href="track.detail.html" class="item-media-content"--}}
    {{--                   style="background-image: url('images/b7.jpg');"></a>--}}
    {{--                <div class="item-overlay center">--}}
    {{--                    <button class="btn-playpause">Play</button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="item-info">--}}
    {{--                <div class="item-overlay bottom text-right">--}}
    {{--                    <a href="#" class="btn-favorite"><i--}}
    {{--                            class="fa fa-heart-o"></i></a>--}}
    {{--                    <a href="#" class="btn-more" data-toggle="dropdown"><i--}}
    {{--                            class="fa fa-ellipsis-h"></i></a>--}}
    {{--                    <div class="dropdown-menu pull-right black lt"></div>--}}
    {{--                </div>--}}
    {{--                <div class="item-title text-ellipsis">--}}
    {{--                    <a href="track.detail.html">Simple Place To Be</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-author text-sm text-ellipsis hide">--}}
    {{--                    <a href="artist.detail.html" class="text-muted">RYD</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-meta text-sm text-muted">--}}
    {{--                                                        <span class="item-meta-category"><a href="browse.html"--}}
    {{--                                                                                            class="label">Radio</a></span>--}}
    {{--                    <span class="item-meta-date text-xs">09.04.2016</span>--}}
    {{--                </div>--}}

    {{--                <div--}}
    {{--                    class="item-except visible-list text-sm text-muted h-2x m-t-sm">--}}
    {{--                    Ad utilitatem tantae pecuniae? Utram tandem linguam nescio? Sed--}}
    {{--                    hoc sane concedamus.--}}
    {{--                </div>--}}

    {{--                <div class="item-action visible-list m-t-sm">--}}
    {{--                    <a href="#" class="btn btn-xs white">Edit</a>--}}
    {{--                    <a href="#" class="btn btn-xs white" data-toggle="modal"--}}
    {{--                       data-target="#delete-modal">Delete</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <div class="col-xs-12">--}}
    {{--        <div class="item r" data-id="item-7"--}}
    {{--             data-src="http://api.soundcloud.com/tracks/245566366/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">--}}
    {{--            <div class="item-media ">--}}
    {{--                <a href="track.detail.html" class="item-media-content"--}}
    {{--                   style="background-image: url('images/b6.jpg');"></a>--}}
    {{--                <div class="item-overlay center">--}}
    {{--                    <button class="btn-playpause">Play</button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="item-info">--}}
    {{--                <div class="item-overlay bottom text-right">--}}
    {{--                    <a href="#" class="btn-favorite"><i--}}
    {{--                            class="fa fa-heart-o"></i></a>--}}
    {{--                    <a href="#" class="btn-more" data-toggle="dropdown"><i--}}
    {{--                            class="fa fa-ellipsis-h"></i></a>--}}
    {{--                    <div class="dropdown-menu pull-right black lt"></div>--}}
    {{--                </div>--}}
    {{--                <div class="item-title text-ellipsis">--}}
    {{--                    <a href="track.detail.html">Reflection (Deluxe)</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-author text-sm text-ellipsis hide">--}}
    {{--                    <a href="artist.detail.html" class="text-muted">Fifth--}}
    {{--                        Harmony</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-meta text-sm text-muted">--}}
    {{--                                                        <span class="item-meta-category"><a href="browse.html"--}}
    {{--                                                                                            class="label">Pop</a></span>--}}
    {{--                    <span class="item-meta-date text-xs">05.05.2016</span>--}}
    {{--                </div>--}}

    {{--                <div--}}
    {{--                    class="item-except visible-list text-sm text-muted h-2x m-t-sm">--}}
    {{--                    Quid ad utilitatem tantae pecuniae? Utram tandem linguam nescio?--}}
    {{--                    Sed hoc sane concedamus.--}}
    {{--                </div>--}}

    {{--                <div class="item-action visible-list m-t-sm">--}}
    {{--                    <a href="#" class="btn btn-xs white">Edit</a>--}}
    {{--                    <a href="#" class="btn btn-xs white" data-toggle="modal"--}}
    {{--                       data-target="#delete-modal">Delete</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <div class="col-xs-12">--}}
    {{--        <div class="item r" data-id="item-1"--}}
    {{--             data-src="http://api.soundcloud.com/tracks/269944843/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">--}}
    {{--            <div class="item-media ">--}}
    {{--                <a href="track.detail.html" class="item-media-content"--}}
    {{--                   style="background-image: url('images/b0.jpg');"></a>--}}
    {{--                <div class="item-overlay center">--}}
    {{--                    <button class="btn-playpause">Play</button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="item-info">--}}
    {{--                <div class="item-overlay bottom text-right">--}}
    {{--                    <a href="#" class="btn-favorite"><i--}}
    {{--                            class="fa fa-heart-o"></i></a>--}}
    {{--                    <a href="#" class="btn-more" data-toggle="dropdown"><i--}}
    {{--                            class="fa fa-ellipsis-h"></i></a>--}}
    {{--                    <div class="dropdown-menu pull-right black lt"></div>--}}
    {{--                </div>--}}
    {{--                <div class="item-title text-ellipsis">--}}
    {{--                    <a href="track.detail.html">Pull Up</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-author text-sm text-ellipsis hide">--}}
    {{--                    <a href="artist.detail.html" class="text-muted">Summerella</a>--}}
    {{--                </div>--}}
    {{--                <div class="item-meta text-sm text-muted">--}}
    {{--                                                        <span class="item-meta-category"><a href="browse.html"--}}
    {{--                                                                                            class="label">Blue</a></span>--}}
    {{--                    <span class="item-meta-date text-xs">30.05.2016</span>--}}
    {{--                </div>--}}

    {{--                <div--}}
    {{--                    class="item-except visible-list text-sm text-muted h-2x m-t-sm">--}}
    {{--                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--                    Quamquam tu hanc copiosiorem etiam soles dicere. Nihil illinc--}}
    {{--                    huc pervenit.--}}
    {{--                </div>--}}

    {{--                <div class="item-action visible-list m-t-sm">--}}
    {{--                    <a href="#" class="btn btn-xs white">Edit</a>--}}
    {{--                    <a href="#" class="btn btn-xs white" data-toggle="modal"--}}
    {{--                       data-target="#delete-modal">Delete</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
</div>
{{--<a href="#" class="btn btn-sm white rounded">Show More</a>--}}
