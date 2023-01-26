<!-- Edit Track Modal -->
<div id="edit-track" class="modal fade animate black-overlay" tab-index="-1" data-backdrop="false" aria-labelledby="edit-track"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Track</h5>
            </div>
            <div class="modal-body p-lg">
                <form method="POST" action="" id="track_edit_song"
                      enctype="multipart/form-data" class="basicform_with_reload">
                    @csrf
                    <input type="hidden" name="track_id" class="trackEditID" value="">
                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">Title</label>
                        <div>
                            <input type="text" name="name" id="trackEditTitle"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value=""
                                   placeholder="Your Title">
                            <div id="error_message_edit_name" class="red-text" style="color:red; padding:4px;"></div>
                            @error('name')
                            <small class="red-text ml-10" role="alert">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">Description/Press Release</label>
                        <div>
                                   <textarea name="description" value="" id="trackEditDescription"
                                             placeholder="Your description..."
                                             class="form-control @error('description') is-invalid @enderror"></textarea>
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
                    <p class="mb-1">
                        <label class="text-warning">Not Released Yet?</label>
                        <input type="text" id="audioDescription" class="form-control" placeholder="e.g. Please do not share this before 31 Dec"
                               name="audio_description" />
                    </p>
                    <div class="form-group text-warning">
                        <h6>Insert your embedded player code (from any digital stores: Spotify; Apple Music; Amazon Music; Deezer; Soundcloud; YouTube; Anghami; Bandcamp.)</h6>
                    </div>

                    <div class="form-group" id="previewLinkBlockEdit" style="display: none">
                        <div class="col-sm-12">
                            <div id="previewLinkEdit"></div>
                        </div>
                    </div>

{{--                    <div id="TextBoxesGroupEdit">--}}

{{--                    </div>--}}

                    <div class="form-group row" id="LinksIframeEdit">
                        <div id="TextBoxesGroupEdit">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <div class="addMoreRemoveLink">
                                <div class="plusIcon">
                                    <i class="fa fa-plus addLinkButtonEdit" id="addLinkButtonEdit" data-counter="">Add New Link</i>
                                </div>
                                <div class="plusIconRemove">
                                    <i class="fa fa-remove removeButtonEdit" id="removeButtonEdit" data-counter="">Remove Link</i>
                                </div>
                            </div>
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
                        <label class="control-label form-control-label text-muted">Track Images/Pdf</label>
                        <div>
                            <input type='file' class="form-control" id="multipleImageEditTrackUpload" name="track_images[]" multiple="multiple"
                                   accept=".png, .jpg, .jpeg, .pdf" />
                            <label for="multipleImageEditTrackUpload"></label>
                            <div id="multipleImgEditTrack">
                                <div class="form-group"><label class="control-label form-control-label text-muted">Images</label></div>
                            </div>
                            <div id="multipleImgEditTrackPdf">
                                <div class="form-group"><label class="control-label form-control-label text-muted">Pdf</label></div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">Song Upload(mp3)</label>
                        <div>
                            <input type='file' class="form-control" name="audio" id="audioEditTrackPreview"
                                   accept=".mp3" />
                            <label for="imageEditTrackUpload"></label>
                            <div class="audioEditTrackPreview">
                                <audio controls="" src="" type="audio/mp3" controlslist="nodownload" id="audioEditTrack"></audio>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <div class="text-muted" style="color: red !important">Unreleased</div>
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
{{--                            <p class="mb-1">--}}
{{--                                <input type="text" id="audioDescription" class="form-control" placeholder="e.g. Please do not share this before 31 Dec"--}}
{{--                                           name="audio_description" />--}}
{{--                            </p>--}}
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

                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">Track's lyrics  language(s) (optional)</label>
                        <div class="features-box-select-language" id="trackEditLanguages">
                            <select class="form-control-label editTrackLanguages" name="language[]" id="editTrackLanguages" placeholder="You can select mutiple languages" multiple>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="text-muted">Permissions / Copyright
                            <div class="mrg-top-10 mrg-bottom-20 small grey-text">
                                <span>Want to learn more?</span>
                                <!-- Button trigger modal -->
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCenterEdit">
                                    Click Here
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col s12">
                                <p class="mb-1">
                                <div class="remix">
                                    <label>
                                        <input type="checkbox" class="radio permissionCopyright" id="permissionCopyrightNo" value="no" name="permission_copyright" />   No, they cannot upload an MP3 to their own channel
                                        <div class="grey-text small" style="margin-left: 18px;">We will ask them to use the streaming links you provided</div>
                                    </label>
                                </div>
                                </p>
                            </div>
                            <div class="col s12">
                                <p class="mb-1">
                                <div class="remix">
                                    <label>
                                        <input type="checkbox" class="radio permissionCopyright" id="permissionCopyrightYes" value="yes" name="permission_copyright" />   Yes, let them upload this song
                                        <div class="grey-text small" style="margin-left: 18px;">Often required by YouTube channels and Radio stations</div>
                                    </label>
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">Pitch Description</label>
                        <div>
                                   <textarea name="pitch_description" value="" id="trackEditPitchDescription"
                                             placeholder="Your description..."
                                             class="form-control @error('pitch_description') is-invalid @enderror"></textarea>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom:10px;">
                        <button type="button" class="slide-toggle btn btn-sm rounded addYourInterest">Add Your Genres/Interest</button>
                    </div>

                    <div class="form-group interestShow" style="display: none;">
                        <label class=" control-label form-control-label text-muted" style="margin-top:10px">Select your genres/interests.</label>
                        <div class="col-sm-12" id="trackAddFeatures">
                            <div class="section" id="editTrackCuratorFeature">
                            </div>
                        </div>
                    </div>

                    <div class="form-group modal-footer">
                        <button type="button" class="btn dark-white rounded update_track_not" id="update_track_not">Cancle</button>
                        {{--                                <button type="button" class="btn danger p-x-md" data-dismiss="modal">Yes</button>--}}
                        <button type="submit" id="updateTrack" class="btn btn-sm rounded add_track basicbtn">
                            Submit</button>
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

<!-- Permission Copy Right Modal -->
<div id="exampleModalCenterEdit" class="modal fade black-overlay" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">What's the deal with copyrights?</h5>
            </div>
            <div class="modal-body">
                When submitting your song, you'll probably see a prompt asking if you're willing to sign a copyright agreement so that someone can upload the song to their channel.

                The copyright agreements are 90% for YouTube channels (occasionally others might ask if they can upload to their Facebook or a radio show, for example). The copyright is you giving them permission to upload the song without getting in trouble. YouTube has all sorts of automatic copyright stuff going on, so if they do get in trouble, they can just show the copyright agreement you signed and say "see, they gave us permission!"

                As for the monetization -- a lot of those YouTube channels run ads on their videos. If you give them permission to monetize your video, they can run ads and keep all the money. The idea is that in exchange, you get exposure. (Also worth noting that YouTube has some of the worst monetization of any music platform, so it's not like you're losing out on much).

                Them having your song on their channel doesn't mean you can't put it on your own official channel.

                Will it make a difference if you allow monetization or not? Nope! SubmitHub will automatically filter out any channels who require monetization, so if your preference is non-monetization, you'll never be sending your song to someone who requires that.
            </div>
            <div class="modal-footer">
{{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                <a class="btn btn-secondary" href="javascript:void(0)" onclick="closeModel('copyRight')">Close</a>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- Permission Copy Right Modal -->


<!-- Delete Track Modal -->
<div id="delete-imgPdf-tag-modal" class="modal fade animate black-overlay" data-backdrop="false" aria-labelledby="delete-imgPdf-tag-modal"
     aria-hidden="true">
    <div class="row-col h-v">
        <div class="row-cell v-m">
            <div class="modal-dialog modal-sm">
                <div class="modal-content flip-y">
                    <div class="modal-body text-center">
                        <p class="p-y m-t"><i class="fa fa-remove text-warning fa-3x"></i></p>
                        <p>Are you sure to delete this Image/Pdf?</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-default p-x-md" href="javascript:void(0)" onclick="closeModel('imgPdf')">No</a>
                        <a class="btn red p-x-md deleteImgPdfTrack" id="delete_Image_Pdf" data-img-pdf-id="" href="javascript:void(0)">Yes</a>
                    </div>
                </div><!-- /.modal-content -->
            </div>
        </div>
    </div>
</div>
<!-- Delete Feature Tag Modal -->
