
<form method="POST" action="{{url('/store-track')}}" class="basicform_with_reload"
      enctype="multipart/form-data">
    @csrf
    <div class="page-title m-b">
        <h4 class="inline m-a-0 update_profile">Add a song</h4>
    </div>
    <div class="item-except text-sm text-muted h-2x m-t-sm">
        Let influencers discover your songs when they visit your profile by completing your discography.
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Title</div>
        <div class="col-sm-9">
            <input type="text" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{old('name')}}"
                   placeholder="Add your release title">
            <div id="error_message_name" class="red-text" style="color:red; padding:4px;"></div>
            @error('name')
            <small class="red-text ml-10" role="alert">
                {{ $message }}
            </small>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Description/Press Release</div>
        <div class="col-sm-9">
            <textarea name="description"
                      placeholder="Tell us more about your artwork... "
                      class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
            <div id="error_message_description" class="red-text" style="color:red; padding:4px;"></div>
            @error('description')
            <small class="red-text ml-10" role="alert">
                {{ $message }}
            </small>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Release Type</div>
        <div class="col-sm-9">
            <div class="col s12">
                <p class="mb-1">
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
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Demo(Is it an unfinished song?)</div>
        <div class="col-sm-9" id="deMo">
            <label class="switch">
                <input type="checkbox" name="demo">
                <span class="slider round switchDemo"></span>
            </label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Release Date (optional)</div>
        <div class="col-sm-9" id="releaseDateTrack">
            <input id="datepicker" name="release_date" value="{{old('release_date')}}"
                   class="form-control release_date">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <div id="preview"></div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3"></div>
        <div class="col-sm-9 text-warning">
           <h6>Insert your embedded player code (from any digital stores: Spotify; Apple Music; Amazon Music; Deezer; Soundcloud; YouTube; Anghami; Bandcamp.)</h6>
        </div>
    </div>

    <div class="form-group row" id="previewLinkBlock" style="display: none">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <div id="previewLink"></div>
        </div>
    </div>
    <div class="form-group row">
        <div id="TextBoxesGroup">
            <div id="TextBoxDiv1">
                <div class="col-sm-3 form-control-label text-muted">Add New Link #1</div>
                <div class="col-sm-9 m-b">
                    <div class="addEmbeded">
                        <div class="addMoreLinks">
                            <input type="text" name="link[]" onclick="removeStyle(this);"
                            class="form-control moreLinks @error('link') is-invalid @enderror"
                            value="{{old('link')}}" id="textbox1"
                            placeholder="Please Add Embeded Url">
                        </div>

                        <div class="previewStart">
                            <a href="javascript:void(0)" class="textbox1" id="previewIcon" onclick="getInputValue(this)"><i class="fa fa-eye"></i> preview</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <div class="addMoreRemoveLink">
                <div class="plusIcon">
                    <i class="fa fa-plus" id="addLinkButton">Add New Link</i>
                </div>
                <div class="plusIconRemove">
                    <i class="fa fa-remove" id="removeButton">Remove Link</i>
                </div>
            </div>
        </div>

    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">EP/LP Link (optional)</div>
        <div class="col-sm-9">
            <input type="url" name="ep_lp_link"
                   class="form-control @error('ep_lp_link') is-invalid @enderror"
                   value="{{old('ep_lp_link')}}"
                   placeholder="https://xyz.com">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Song Thumbnail</div>
        <div class="col-sm-9">
            <input type='file' class="form-control" id="imageTrackUpload" name="track_thumbnail"
                   accept=".png, .jpg, .jpeg" />
            <label for="imageTrackUpload"></label>
            <div class="imgTrackPreview">
                <img src=""
                     id="imgTrackPreview" style="display:none;">
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Track Images/Pdf</div>
        <div class="col-sm-9">
            <input type='file' class="form-control" id="multipleImageTrackUpload" name="track_images[]" multiple="multiple"
                   accept=".png, .jpg, .jpeg, .pdf" />
            <label for="multipleImageTrackUpload"></label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Song Upload(mp3)</div>
        <div class="col-sm-9">
            <input type='file' class="form-control" name="audio" id="audioTrackUpload"
                   accept=".mp3" />
            <label for="imageTrackUpload"></label>
            <div class="audioTrackPreview">
                <audio controls="" src="" type="audio/mp3" controlslist="nodownload" id="audioTrackPreview" style="display:none;"></audio>
            </div>
            @error('audio')
                <small class="red-text ml-10" role="alert">
                    {{ $message }}
                </small>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted" style="color: red !important">Unreleased</div>
        <div class="col-sm-9">
            <div class="col s12">
                <p class="mb-1">
                    <label>
                        <span class="afterRelease">After Release date, may we publicity display this in our submissions directory</span>
                    </label>
                </p>
                <p class="mb-1">
                    <label>
                        <input type="checkbox" class="filled-in"
                               name="display_profile"
                               value="1"/>
                        <span class="text-muted">Display on my public profile </span>
                    </label>
                </p>
            </div>
        </div>
    </div>

    <div class="form-group row">
        {{-- <div class="col-sm-3 form-control-label text-muted">Unreleased Test</div> --}}
        <div class="col-sm-9">
            <div class="col s12">
                <p class="mb-1">
                    <input type="text" class="form-control" placeholder="e.g. Please do not share this before 31 Dec"
                               name="audio_description" />
                </p>
                <p class="mb-1">
                    <p class="text-muted">Is This a Cover or a remix</p>
                    <div class="remix">
                        <label>
                            <input type="checkbox" class="radio audioCover" value="original" name="audio_cover" />   Original</label>
                        <label>
                            <input type="checkbox" class="radio audioCover" value="cover" name="audio_cover" />   Cover</label>
                        <label>
                            <input type="checkbox" class="radio audioCover" value="remix" name="audio_cover" />   Remix</label>
                    </div>
                </p>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 text-muted">Track's lyrics  language(s) (optional)</div>
        <div class="col-sm-9">
            <div class="features-box-select-language">
                <select class="form-control-label" name="language[]" id="choices-multiple-remove-button" placeholder="You can select mutiple languages" multiple>
                    @if(!empty($languages))
                        @foreach($languages as $language)
                            <option value="{{$language->id}}">{{$language->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Permissions / Copyright
            <div class="mrg-top-10 mrg-bottom-20 small grey-text">
                <span>Want to learn more?</span>
                <!-- Button trigger modal -->
                <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCenter">
                    Click Here
                </a>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="col s12">
                <p class="mb-1">
                    <div class="remix">
                        <label>
                            <input type="checkbox" class="radio permissionCopyright" value="no" name="permission_copyright" />   No, they cannot upload an MP3 to their own channel
                            <div class="grey-text small" style="margin-left: 18px;">We will ask them to use the streaming links you provided</div>
                        </label>
                    </div>
                </p>
            </div>
            <div class="col s12">
                <p class="mb-1">
                    <div class="remix">
                        <label>
                            <input type="checkbox" class="radio permissionCopyright" value="yes" name="permission_copyright" />   Yes, let them upload this song
                            <div class="grey-text small" style="margin-left: 18px;">Often required by YouTube channels and Radio stations</div>
                        </label>
                    </div>
                </p>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 text-muted">Pitch Description</div>
        <div class="col-sm-9">
            <textarea name="pitch_description"
                      placeholder="Tell us more about your artwork... "
                      class="form-control @error('pitch_description') is-invalid @enderror">{{old('pitch_description')}}</textarea>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 text-muted"></div>
        <div class="col-sm-9">
            <button type="button" class="slide-toggle btn btn-sm rounded addYourInterest">Add Your Genres/Interest</button>
        </div>
    </div>

    <div class="form-group row interestShow" style="display: none;">
        <div class="col-sm-3 form-control-label text-muted">Select your genres/interests.</div>
        <div class="col-sm-9" id="trackAddFeatures">
            <div class="section" id="faq">
                @if (!empty($curator_featuress))
                    @foreach ($curator_featuress as $key => $curator_sub_features)

                        <div class="row">
                            <div class="col s12 m6 l10">
                                <h4 class="card-title bold"><span class="text tw-mr-2">{{ $loop->iteration }}.</span> {{ $key }}  </h4>
                            </div>
                        </div>
                        <div class="underline"></div>
                        <div class="row music"></div>
                            @error('tag')
                                <small class="red-text" role="alert">
                                    {{ $message }}
                                </small>
                            @enderror
                            <div class="faq row">
                                <div class="col s12 m9 l12">
                                    <div class="features-box-select">
                                        <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="You can select {{ $key }}" multiple>
                                            @if(!empty($curator_sub_features))
                                                @foreach($curator_sub_features as $feature)
                                                    <option value="{{$feature->id}}">{{$feature->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>


    <div class="form-group row">
        {{-- <button type="submit" class="btn btn-sm rounded add_track"> --}}
        <button type="submit" class="btn btn-sm rounded add_track basicbtn">
            Add Song</button>
    </div>
</form>
<!-- Permission Copy Right Modal -->
<div id="exampleModalCenter" class="modal fade black-overlay" data-backdrop="false">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- Permission Copy Right Modal -->
<script>
    // function validURL(str) {
    //     var pattern = new RegExp("^((https|http)?://)"); // protocol

    //     return !!pattern.test(str);
    // }
    function  getInputValue(elem) {

        let src = document.getElementById(elem.className).value
        if (src === "") {
            toastr.error('Please Add url embeded');
            return false;
        }
        // url = validURL(src);

        // if(url == false)
        // {
        //     toastr.error('Please Add correct url embeded');
        //     return false;
        // }

        var match_link = src.match(/iframe/g);
        // var match_link = src.match(/embed|w.soundcloud.com|bandcamp|widget/g);

        if(match_link == null)
        {
            toastr.error('Please Add correct url embeded');
            return false;
        }

        if(src){
            document.querySelector('#previewLinkBlock').style.display = 'block';
            document.querySelector('#previewLink').innerHTML = "";
            document.querySelector('#previewLink').innerHTML = src;
        }else{
            toastr.error('Please Add correct url embeded');
            return false;
        }

        // if(match_link[0].indexOf("embed") !== -1){
        //     document.querySelector('#previewLinkBlock').style.display = 'block';
        //     document.querySelector('#previewLink').innerHTML = "";
        //     document.querySelector('#previewLink').innerHTML = '<iframe style="border-radius:12px" id="previewLink" src="'+src+'" width="100%" height="380" frameBorder="0" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';
        // }else if(match_link[0].indexOf("widget") !== -1){
        //     document.querySelector('#previewLinkBlock').style.display = 'block';
        //     document.querySelector('#previewLink').innerHTML = "";
        //     document.querySelector('#previewLink').innerHTML = '<iframe style="border-radius:12px" id="previewLink" src="'+src+'" width="100%" height="380" frameBorder="0" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';
        // }else if(match_link[0].indexOf("w.soundcloud.com") !== -1){
        //     document.querySelector('#previewLinkBlock').style.display = 'block';
        //     document.querySelector('#previewLink').innerHTML = "";
        //     document.querySelector('#previewLink').innerHTML = '<iframe style="border-radius:12px" id="previewLink" src="'+src+'" width="100%" height="380" frameBorder="0" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';
        // }else if(match_link[0].indexOf("bandcamp") !== -1){
        //     document.querySelector('#previewLinkBlock').style.display = 'block';
        //     document.querySelector('#previewLink').innerHTML = "";
        //     document.querySelector('#previewLink').innerHTML = '<iframe style="border-radius:12px" id="previewLink" src="'+src+'" width="100%" height="380" frameBorder="0" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';
        // }else{
        //     toastr.error('Please Add correct url embeded');
        //     return false;
        // }
    }
</script>
