<!-- Add Track Modal -->
<div id="add-track-promote" class="modal black-overlay" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add a song</h5>
            </div>
            <div class="modal-body p-lg">
                <form method="POST" action=""
                      enctype="multipart/form-data" class="basicform_with_reset">
                    @csrf

                    <div class="item-except text-sm text-muted h-2x m-t-sm">
                        Complete your discography and let influencers discover your songs when they visit your profile.
                    </div>

                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">Title</label>
                        <div>
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{old('name')}}"
                                placeholder="Your Title" required>
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
                            <textarea name="description"
                                placeholder="Tell us more about your artwork... "
                                class="form-control @error('description') is-invalid @enderror" required>{{old('description')}}</textarea>

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
                                        <input type="checkbox" class="radio releaseType" value="single" name="release_type" />   Single</label>
                                    <label>
                                        <input type="checkbox" class="radio releaseType" value="album" name="release_type" />   Album</label>
                                    <label>
                                        <input type="checkbox" class="radio releaseType" value="ep" name="release_type" />   EP</label>
                                    <label>
                                        <input type="checkbox" class="radio releaseType" value="video" name="release_type" />   Video</label>
                                </div>
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">Demo(Is it an unfinished song?`)</label>
                        <div id="deMo">
                            <label class="switch">
                                <input type="checkbox" name="demo">
                                <span class="slider round switchDemo"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">Release Date (optional)</label>
                        <div id="releaseDateTrack">
                            <input id="datepickerAddTrack" name="release_date" value="{{old('release_date')}}"
                                   class="form-control release_date">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-control-label text-muted"><a href="https://www.youtube.com/" target="_blank" style="color:#d64441;" rel="noopener noreferrer">YouTube</a> link</div>
                        <div>
                            <input type="text" name="youtube_soundcloud_url" id="trueUrl" onclick="removeStyle(this);"
                                   class="form-control @error('youtube_soundcloud_url') is-invalid @enderror" value="{{old('youtube_soundcloud_url')}}"
                                   placeholder="https://www.youtube.com/watch?v=iLd8ugdjJgk" required>
                            @error('youtube_soundcloud_url')
                                <small id="error_message"class="red-text ml-10" role="alert">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="text-warning">
                           <h6>(Caption for iframe add)</h6>
                        </div>
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
                        <button type="submit" id="updateTrack" class="btn btn-sm rounded add_track basicbtn" onclick='return validateEditTrackForm("track_edit_song")'>
                            Create</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- Add Track Modal -->

<script>
    /*--------------------------------------
          basicform submit With Reset
    ---------------------------------------*/
$(".basicform_with_reset").on('submit', function(e){
    alert('aa');
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var basicbtnhtml=$('.basicbtn').html();
    $.ajax({
        type: 'POST',
        url: this.action,
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData:false,
        beforeSend: function() {

            $('.basicbtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div> Please Wait....');
            $('.basicbtn').attr('disabled','');

        },

        success: function(response){
            $('.basicbtn').removeAttr('disabled')
            // Sweet('success',response);
            toastr.error(response);
            $('.basicbtn').html(basicbtnhtml);
            $('.basicform_with_reset').trigger('reset');
        },
        error: function(xhr, status, error)
        {
            console.log(xhr);
            $('.basicbtn').html(basicbtnhtml);
            $('.basicbtn').removeAttr('disabled')
            $('.errorarea').show();
            $.each(xhr.responseJSON.errors, function (key, item)
            {
                // Sweet('error',item)
                toastr.error(item);
                $("#errors").html("<li class='text-danger'>"+item+"</li>")
            });
            errosresponse(xhr, status, error);
        }
    })
});
</script>
