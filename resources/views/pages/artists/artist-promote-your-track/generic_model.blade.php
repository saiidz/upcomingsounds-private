<!-- View Track Modal -->
<div id="view-track" class="modal black-overlay" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Essentials</h5>
            </div>
            <div class="modal-body p-lg">
                <form method="POST" id="track_view_song">
                    @csrf
                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">Artist</label>
                        <div>
                            <input value="{{($user_artist->artistUser) ? $user_artist->artistUser->artist_name : $user_artist->name}}"
                                   class="form-control" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">Track title</label>
                        <div>
                            <input id="trackTitle" class="form-control" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group TrackReleased">
                        <a href="#" target="_blank" rel="noopener" class="tw-p-4 tw-mb-2 tw-mt-2">
                            <div class="tw-bg-white tw-rounded-sm tw-shadow tw-transition-shadow tw-duration-150 vCardContainer helpBlockContainer tw-p-4">
                                <div class="tw-flex">
                                    <div class="logoContainer">
                                        <img src="{{asset('images/favicon.png')}}" class="logo">
                                    </div>
                                    <div class="tw-flex tw-flex-col">
                                        <span class="text 375:tw-mb-2">
                                            Can I send a track not released yet?
                                        </span>
                                        <span class="text description">
                                          How to send a track or demo before its release
                                        </span>
                                    </div>
                                </div> <!---->
                            </div>
                        </a>
                    </div>

                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">Release Date</label>
                        <div>
                            <input id="dateViewpicker" disabled="disabled"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="form-group TrackReleased">
                        <a href="#" target="_blank" rel="noopener" class="tw-p-4 tw-mb-2 tw-mt-2">
                            <div class="tw-bg-white tw-rounded-sm tw-shadow tw-transition-shadow tw-duration-150 vCardContainer helpBlockContainer tw-p-4">
                                <div class="tw-flex">
                                    <div class="logoContainer">
                                        <img src="{{asset('images/favicon.png')}}" class="logo">
                                    </div>
                                    <div class="tw-flex tw-flex-col">
                                        <span class="text 375:tw-mb-2">
                                            What kind of links can I use on Upcoming?
                                        </span>
                                        <span class="text description">
                                          The ultimate guide on how to share your music on Groover like a rockstar
                                        </span>
                                    </div>
                                </div> <!---->
                            </div>
                        </a>
                    </div>

                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">
                            <a href="https://www.youtube.com/" target="_blank" rel="noopener">
                                <span style="color: #02b875 !important;">YouTube</span>
                            </a> /
                            <a href="https://soundcloud.com/" target="_blank" rel="noopener">
                                <span style="color: #02b875 !important;">SoundCloud</span>
                            </a> link</label>
                        <div>
                            <input id="trueUrlView"
                                   class="form-control">
                            <div id="previewView">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">
                            <a href="https://www.spotify.com/us/" target="_blank" rel="noopener">
                                <span style="color: #02b875 !important;">Spotify track</span>
                            </a>
                             link</label>
                        <div>
                            <input id="spotifyTrackViewUrl" class="form-control">
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
