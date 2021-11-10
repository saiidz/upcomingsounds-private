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
                            @if($track->is_locked == 0)
                                <button class="btn btn-xs white" onclick="editTrack({{$track->id}})" data-toggle="modal" data-target="#edit-track">Edit</button>
                            @endif
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



    <!-- Edit Track Modal -->
        <div id="edit-track" class="modal black-overlay" data-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Track</h5>
                    </div>
                    <div class="modal-body p-lg">
                        <form method="POST" action="" data-edit-track-id=""
                              enctype="multipart/form-data" id="track_edit_song" name="track_edit_song">
                            @csrf
                            <div class="form-group">
                                <label class="control-label form-control-label text-muted">YouTube / SoundCloud link</label>
                                <div>
                                    <input type="text" name="youtube_soundcloud_url" id="trueUrlEdit" onclick="removeStyle(this);"
                                           class="form-control @error('youtube_soundcloud_url') is-invalid @enderror"
                                           placeholder="https://www.youtube.com/watch?v=iLd8ugdjJgk" required>
                                    <div id="error_message_edit_youtube_soundcloud" class="red-text" style="color:red; padding:4px;"></div>
                                    @error('youtube_soundcloud_url')
                                    <small id="error_message"class="red-text ml-10" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                    <div id="previewEdit">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label form-control-label text-muted">Spotify track link (optional)</label>
                                <div>
                                    <input type="url" name="spotify_track_url" id="spotifyTrackUrl" value="" onclick="removeStyle(this);"
                                           class="form-control @error('spotify_track_url') is-invalid @enderror"
                                           placeholder="https://open.spotify.com/artist/5eJu3FXEJJGVaQpAeQjdwg">
                                    <div id="error_message_edit_spotify_track" class="red-text" style="color:red; padding:4px;"></div>
                                    @error('spotify_track_url')
                                    <small class="red-text ml-10" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label form-control-label text-muted">Title</label>
                                <div>
                                    <input type="text" name="name" id="trackEditTitle"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value=""
                                           placeholder="Your Title" required>
                                    <div id="error_message_edit_name" class="red-text" style="color:red; padding:4px;"></div>
                                    @error('name')
                                    <small class="red-text ml-10" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label form-control-label text-muted">Description</label>
                                <div>
                                   <textarea name="description" value="" id="trackEditDescription"
                                             placeholder="Your description..."
                                             class="form-control @error('description') is-invalid @enderror" required></textarea>
                                    <div id="error_message_edit_description" class="red-text" style="color:red; padding:4px;"></div>
                                    @error('description')
                                    <small class="red-text ml-10" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label form-control-label text-muted">Song Thumbnail</label>
                                <div>
                                    <input type='file' class="form-control" id="imageEditTrackUpload" name="track_thumbnail"
                                           accept=".png, .jpg, .jpeg" />
                                    <label for="imageEditTrackUpload"></label>
                                    <div class="imgEditTrackPreview">
                                        <img src=""
                                             id="imgEditTrackPreview" style="display:none;">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label form-control-label text-muted">Song Category</label>
                                <div>
                                    <select class="form-control c-select" id="songEditCategory" name="song_category" required></select>
                                    <div id="error_message_edit_song_category" class="red-text" style="color:red; padding:4px;"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label form-control-label text-muted">Release Date (optional)</label>
                                <div>
                                    <input id="dateEditpicker" value="" name="release_date"
                                           class="form-control release_date">
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <p class="mb-1">
                                        <label>
                                            <input type="checkbox" class="filled-in"
                                                   name="display_profile"
                                                   id="displayEditProfile"
                                                   value="1"/>
                                            <span class="text-muted">Display on my public profile </span>
                                        </label>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group modal-footer">
                                <button type="button" class="btn dark-white rounded update_track_not" id="update_track_not" data-dismiss="modal">No</button>
                                {{--                                <button type="button" class="btn danger p-x-md" data-dismiss="modal">Yes</button>--}}
                                <button type="submit" id="updateTrack" class="btn btn-sm rounded add_track" onclick='return validateEditTrackForm("track_edit_song")'>
                                    Update</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div>
        </div>
        <!-- Edit Track Modal -->



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

