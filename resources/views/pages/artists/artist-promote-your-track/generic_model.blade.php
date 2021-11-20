<!-- View Track Modal -->
<div id="view-track" class="modal black-overlay" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Essentials</h5>
            </div>
            <div class="modal-body p-lg">
                <form method="POST" action="" data-edit-track-id=""
                      enctype="multipart/form-data" id="track_edit_song" name="track_edit_song">
                    @csrf
                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">YouTube / SoundCloud link</label>
                        <div>
                            <input type="text" name="youtube_soundcloud_url" id="trueUrlEdit"
                                   class="form-control"
                                   placeholder="https://www.youtube.com/watch?v=iLd8ugdjJgk" required>
                            <div id="previewEdit">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">Spotify track link (optional)</label>
                        <div>
                            <input type="url" name="spotify_track_url" id="spotifyTrackUrl" value=""
                                   class="form-control"
                                   placeholder="https://open.spotify.com/artist/5eJu3FXEJJGVaQpAeQjdwg">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">Title</label>
                        <div>
                            <input type="text" name="name" id="trackEditTitle"
                                   class="form-control"
                                   value=""
                                   placeholder="Your Title" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">Description</label>
                        <div>
                                   <textarea name="description" value="" id="trackEditDescription"
                                             placeholder="Your description..."
                                             class="form-control" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">Song Thumbnail</label>
                        <div>
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
                        <button type="button" class="btn dark-white rounded update_track_not" id="update_track_not" data-dismiss="modal">Cancle</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- View Track Modal -->
