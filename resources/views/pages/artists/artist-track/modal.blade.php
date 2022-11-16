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
                        <div>
                            <p class="mb-1">
                                <p class="text-muted">Release Type</p>
                                <div class="remix">
                                    <label>
                                        <input type="checkbox" class="radio releaseType audioSingleEdit" value="single" name="release_type" />   Single</label>
                                    <label>
                                        <input type="checkbox" class="radio releaseType audioAlbumEdit" value="album" name="release_type" />   Album</label>
                                    <label>
                                        <input type="checkbox" class="radio releaseType audioEpEdit" value="ep" name="release_type" />   EP</label>
                                    <label>
                                        <input type="checkbox" class="radio releaseType audioVideoEdit" value="video" name="release_type" />   Video</label>
                                </div>
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">Demo(Is it an unfinished song?`)</label>
                        <div id="deMo">
                            <label class="switch">
                                <input type="checkbox" name="demo" id="demoChecked">
                                <span class="slider round switchDemo"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">Release Date (optional)</label>
                        <div>
                            <input id="dateEditpicker" value="" name="release_date"
                                   class="form-control release_date">
                        </div>
                    </div>

{{--                    <div class="form-group">--}}
{{--                        <label class="control-label form-control-label text-muted">Song Category</label>--}}
{{--                        <div>--}}
{{--                            <select class="form-control c-select" id="songEditCategory" name="song_category" required></select>--}}
{{--                            <div id="error_message_edit_song_category" class="red-text" style="color:red; padding:4px;"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="form-group text-warning">
                        <h6>Insert your embedded player code (from any digital stores: Spotify; Apple Music; Amazon Music; Deezer; Soundcloud; YouTube; Anghami; Bandcamp.)</h6>
                    </div>

                    {{-- <div class="form-group">
                        <label class="control-label form-control-label text-muted">YouTube Link</label>
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
                    </div> --}}

                    {{-- <div class="form-group">
                        <label class="control-label form-control-label text-muted">SoundCloud Link</label>
                        <div>
                            <input type="text" name="soundcloudUrl" id="soundcloudUrlEdit" onclick="removeStyle(this);"
                                   class="form-control @error('soundcloudUrl') is-invalid @enderror"
                                   placeholder="https://soundcloud.com">
                            <div id="error_message_edit_soundcloud" class="red-text" style="color:red; padding:4px;"></div>
                            @error('soundcloudUrl')
                            <small id="error_message"class="red-text ml-10" role="alert">
                                {{ $message }}
                            </small>
                            @enderror
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
                    </div> --}}
                    <div class="form-group" id="previewLinkBlockEdit" style="display: none">
                        <div id="previewLinkEdit"></div>
                    </div>

                    <div id="TextBoxesGroupEdit">

                    </div>

                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">EP/LP Link (optional)</label>
                        <div>
                            <input type="url" name="ep_lp_link" id="epLpLink" value="" onclick="removeStyle(this);"
                                   class="form-control @error('ep_lp_link') is-invalid @enderror"
                                   placeholder="https://xyz.com">
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
                        <label class="control-label form-control-label text-muted">Song Upload(mp3)</label>
                        <div>
                            <input type='file' class="form-control" name="audio"
                                   accept=".mp3" />
                            <label for="imageEditTrackUpload"></label>
                            <div class="audioEditTrackPreview">
                                <audio controls="" src="" type="audio/mp3" controlslist="nodownload" id="audioEditTrack"></audio>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <p class="mb-1">
                                <label>
                                    <span class="afterRelease">After Release date, may we publicity display this in our submissions directory</span>
                                </label>
                            </p>
                            <p class="mb-1">
                                <label>
                                    <input type="checkbox" class="filled-in"
                                           name="display_profile"
                                           id="displayEditProfile"
                                           value="1"/>
                                    <span class="text-muted">Display on my public profile </span>
                                </label>
                            </p>
                            <p class="mb-1">
                                <input type="text" id="audioDescription" class="form-control" placeholder="e.g. Please do not share this before 31 Dec"
                                           name="audio_description" />
                            </p>
                            <p class="mb-1">
                                <p class="text-muted">Is This a Cover or a remix</p>
                                <div class="remix">
                                    <label>
                                        <input type="checkbox" class="radio audioCover audioOriginalEdit" value="original" name="audio_cover" />   Original</label>
                                    <label>
                                        <input type="checkbox" class="radio audioCover audioCoverEdit" value="cover" name="audio_cover" />   Cover</label>
                                    <label>
                                        <input type="checkbox" class="radio audioCover audioRemixEdit" value="remix" name="audio_cover" />   Remix</label>
                                </div>
                            </p>
                        </div>
                    </div>

                    <div class="form-group modal-footer">
                        <button type="button" class="btn dark-white rounded update_track_not" id="update_track_not" data-dismiss="modal">Cancle</button>
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

<!-- Delete Track Modal -->
<div id="delete-track-modal" class="modal fade animate black-overlay" data-backdrop="false">
    <div class="row-col h-v">
        <div class="row-cell v-m">
            <div class="modal-dialog modal-sm">
                <div class="modal-content flip-y">
                    <div class="modal-body text-center">
                        <p class="p-y m-t"><i class="fa fa-remove text-warning fa-3x"></i></p>
                        <p>Are you sure to delete this track?</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-default p-x-md" href="javascript:void(0)" data-dismiss="modal">No</a>
                        <a class="btn red p-x-md deleteTrack" id="delete_track" data-track-id="" data-dismiss="modal" href="javascript:void(0)">Yes</a>
                        {{--                                <button type="button" class="btn btn-default p-x-md" data-dismiss="modal">No--}}
                        {{--                                </button>--}}
                        {{--                                <button type="button" class="btn red p-x-md" data-dismiss="modal">Yes</button>--}}
                    </div>
                </div><!-- /.modal-content -->
            </div>
        </div>
    </div>
</div>
<!-- / Delete Track Modal -->


<!-- Permission Copy Right Modal -->
<div id="edit-track" class="modal fade black-overlay" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Track</h5>
            </div>
            <div class="modal-body">
                What's the deal with copyrights?
                When submitting your song, you'll probably see a prompt asking if you're willing to sign a copyright agreement so that someone can upload the song to their channel.

                The copyright agreements are 90% for YouTube channels (occasionally others might ask if they can upload to their Facebook or a radio show, for example). The copyright is you giving them permission to upload the song without getting in trouble. YouTube has all sorts of automatic copyright stuff going on, so if they do get in trouble, they can just show the copyright agreement you signed and say "see, they gave us permission!"

                As for the monetization -- a lot of those YouTube channels run ads on their videos. If you give them permission to monetize your video, they can run ads and keep all the money. The idea is that in exchange, you get exposure. (Also worth noting that YouTube has some of the worst monetization of any music platform, so it's not like you're losing out on much).

                Them having your song on their channel doesn't mean you can't put it on your own official channel.

                Will it make a difference if you allow monetization or not? Nope! SubmitHub will automatically filter out any channels who require monetization, so if your preference is non-monetization, you'll never be sending your song to someone who requires that.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- Permission Copy Right Modal -->

<!-- Request Edit Modal -->
<div id="requestEdit" class="modal fade black-overlay" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Request To Admin For Edit Track</h5>
            </div>
            <form class="new_basicform_approved_with_reload" action="{{route('request.edit.track',)}}" method="post">
                @csrf
                <input type="hidden" name="track_id" class="trackID" value="">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-group">
                            <textarea class="form-control ckeditor" name="description_details" id="descriptionApprovedDetails" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary basicbtn">Send</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- Permission Copy Right Modal -->
