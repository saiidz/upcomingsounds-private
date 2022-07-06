<!-- Add Track Modal -->
<div id="add-track-promote" class="modal black-overlay" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add a song</h5>
            </div>
            <div class="modal-body p-lg">
                <form method="post" action="{{ route('storeTrack') }}" class="basicform_with_reload">
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
                                <span class="slider round switchDemo switchStyle"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">Release Date (optional)</label>
                        <div id="releaseDateTrack">
                            <input id="datepickerPromoteDate" name="release_date" value="{{old('release_date')}}"
                                class="form-control release_date">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="text-warning">
                           <h6>Insert your embedded player code (from any digital stores: Spotify; Apple Music; Amazon Music; Deezer; Soundcloud; YouTube; Anghami; Bandcamp.)</h6>
                        </div>
                    </div>

                    <div class="form-group" id="previewLinkBlock" style="display: none">
                        <div id="previewLink"></div>
                    </div>

                    <div class="form-group">
                        <div id="TextBoxesGroup">
                            <div id="TextBoxDiv1">
                                <label class="control-label form-control-label text-muted">Add New Link #1</label>
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
                        <div class="addMoreRemoveLink">
                            <div class="plusIcon">
                                <i class="fa fa-plus" id="addLinkButton">Add New Link</i>
                            </div>
                            <div class="plusIconRemove">
                                <i class="fa fa-remove" id="removeButton">Remove Link</i>
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
                            <input type='file' class="form-control" id="imageTrackUpload" name="track_thumbnail"
                                accept=".png, .jpg, .jpeg" required />
                            <label for="imageTrackUpload"></label>
                            <div class="imgTrackPreview">
                                <img src=""
                                    id="imgTrackPreview" style="display:none;">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">Song Upload(mp3)</label>
                        <div>
                            <input type='file' class="form-control" name="audio" id="audioTrackUpload"
                                accept=".mp3" />
                            <label for="imageTrackUpload"></label>
                            <div class="audioTrackPreview">
                                <audio controls="" src="" type="audio/mp3" controlslist="nodownload" id="audioTrackPreview" style="display:none;"></audio>
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

                    <div class="form-group">
                        <label class="control-label form-control-label text-muted">Track's lyrics  language(s) (optional)</label>
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

                    <div class="form-group">
                        <div class="form-control-label text-muted">Permissions / Copyright
                            <div class="mrg-top-10 mrg-bottom-20 small grey-text">
                                <span>Want to learn more?</span>
                                <!-- Button trigger modal -->
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCenter">
                                    Click Here
                                </a>
                            </div>
                        </div>
                        <p class="mb-1">
                            <div class="remix">
                                <label>
                                    <input type="checkbox" class="radio permissionCopyright" value="no" name="permission_copyright" />   No, they cannot upload an MP3 to their own channel
                                    <div class="grey-text small" style="margin-left: 18px;">We will ask them to use the streaming links you provided</div>
                                </label>
                            </div>
                        </p>
                        <p class="mb-1">
                            <div class="remix">
                                <label>
                                    <input type="checkbox" class="radio permissionCopyright" value="yes" name="permission_copyright" />   Yes, let them upload this song
                                    <div class="grey-text small" style="margin-left: 18px;">Often required by YouTube channels and Radio stations</div>
                                </label>
                            </div>
                        </p>
                    </div>

                    <div class="form-group">
                        <button type="button" class="slide-toggle btn btn-sm rounded addYourInterest">Add Your Genres/Interest</button>
                    </div>

                    <div class="form-group  interestShow" style="display: none;">
                        <div class="form-control-label text-muted">Select your genres/interests.</div>
                        <div id="trackAddFeatures">
                            <div class="section" id="faq">
                                @if(isset($curator_features) && !empty($curator_features))
                                    <div class="m6 l10">
                                        <h4 class="card-title bold"><span class="text tw-mr-2">1.</span> Interests:  </h4>
                                    </div>
                                    <div class="underline"></div>
                                    <div class=" music"></div>
                                    @if($curator_features[0]->name == 'I would love to recieve')
                                        @error('tag')
                                            <small class="red-text" role="alert">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                        <div class="faq ">
                                            <div class=" m9 l12">
                                                <div class="features-box-select">
                                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="You can select interests that correspond with your releases" multiple>
                                                        @if(!empty($curator_features))
                                                            @foreach($curator_features[0]->curatorFeatureTag as $feature)
                                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="">
                                        <div class=" m6 l10">
                                            <h4 class="card-title bold"><span class="text tw-mr-2">2.</span> GENRES</h4>
                                        </div>
                                    </div>
                                    <div class="underline"></div>
                                    <div class=" music"></div>
                                    @if($curator_features[1]->name == 'Alternative / Indie')
                                        <div class="faq ">
                                            <div class=" m9 l12">
                                                <div class="features-box-select">
                                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Alternative / Indie" multiple>
                                                        @if(!empty($curator_features))
                                                            @foreach($curator_features[1]->curatorFeatureTag as $feature)
                                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($curator_features[2]->name == 'Blogwave')
                                        <div class="faq ">
                                            <div class=" m9 l12">
                                                <div class="features-box-select">
                                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Blogwave" multiple>
                                                        @if(!empty($curator_features))
                                                            @foreach($curator_features[2]->curatorFeatureTag as $feature)
                                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($curator_features[3]->name == 'Classic')
                                        <div class="faq ">
                                            <div class=" m9 l12">
                                                <div class="features-box-select">
                                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Classic" multiple>
                                                        @if(!empty($curator_features))
                                                            @foreach($curator_features[3]->curatorFeatureTag as $feature)
                                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($curator_features[4]->name == 'Classical / Jazz')
                                        <div class="faq ">
                                            <div class=" m9 l12">
                                                <div class="features-box-select">
                                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Classical / Jazz" multiple>
                                                        @if(!empty($curator_features))
                                                            @foreach($curator_features[4]->curatorFeatureTag as $feature)
                                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($curator_features[5]->name == 'EDM')
                                        <div class="faq ">
                                            <div class=" m9 l12">
                                                <div class="features-box-select">
                                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select EDM" multiple>
                                                        @if(!empty($curator_features))
                                                            @foreach($curator_features[5]->curatorFeatureTag as $feature)
                                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($curator_features[6]->name == 'Electronica / Breaks')
                                        <div class="faq ">
                                            <div class=" m9 l12">
                                                <div class="features-box-select">
                                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Electronica / Breaks" multiple>
                                                        @if(!empty($curator_features))
                                                            @foreach($curator_features[6]->curatorFeatureTag as $feature)
                                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($curator_features[7]->name == 'Folk')
                                        <div class="faq ">
                                            <div class=" m9 l12">
                                                <div class="features-box-select">
                                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Folk" multiple>
                                                        @if(!empty($curator_features))
                                                            @foreach($curator_features[7]->curatorFeatureTag as $feature)
                                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($curator_features[8]->name == 'Hip-hop / Rap')
                                        <div class="faq ">
                                            <div class=" m9 l12">
                                                <div class="features-box-select">
                                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Hip-hop / Rap" multiple>
                                                        @if(!empty($curator_features))
                                                            @foreach($curator_features[8]->curatorFeatureTag as $feature)
                                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($curator_features[9]->name == 'House / Techno')
                                        <div class="faq ">
                                            <div class=" m9 l12">
                                                <div class="features-box-select">
                                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select House / Techno" multiple>
                                                        @if(!empty($curator_features))
                                                            @foreach($curator_features[9]->curatorFeatureTag as $feature)
                                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($curator_features[10]->name == 'IDM / Downtempo')
                                        <div class="faq ">
                                            <div class=" m9 l12">
                                                <div class="features-box-select">
                                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select IDM / Downtempo" multiple>
                                                        @if(!empty($curator_features))
                                                            @foreach($curator_features[10]->curatorFeatureTag as $feature)
                                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($curator_features[11]->name == 'Metal / Hard Rock')
                                        <div class="faq ">
                                            <div class=" m9 l12">
                                                <div class="features-box-select">
                                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Metal / Hard Rock" multiple>
                                                        @if(!empty($curator_features))
                                                            @foreach($curator_features[11]->curatorFeatureTag as $feature)
                                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($curator_features[12]->name == 'Other')
                                        <div class="faq ">
                                            <div class=" m9 l12">
                                                <div class="features-box-select">
                                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Other" multiple>
                                                        @if(!empty($curator_features))
                                                            @foreach($curator_features[12]->curatorFeatureTag as $feature)
                                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($curator_features[13]->name == 'Pop')
                                        <div class="faq ">
                                            <div class=" m9 l12">
                                                <div class="features-box-select">
                                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Pop" multiple>
                                                        @if(!empty($curator_features))
                                                            @foreach($curator_features[13]->curatorFeatureTag as $feature)
                                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($curator_features[14]->name == 'Punk / Ska')
                                        <div class="faq ">
                                            <div class=" m9 l12">
                                                <div class="features-box-select">
                                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Punk / Ska" multiple>
                                                        @if(!empty($curator_features))
                                                            @foreach($curator_features[14]->curatorFeatureTag as $feature)
                                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($curator_features[15]->name == 'RnB / Funk / Soul')
                                        <div class="faq ">
                                            <div class=" m9 l12">
                                                <div class="features-box-select">
                                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select RnB / Funk / Soul" multiple>
                                                        @if(!empty($curator_features))
                                                            @foreach($curator_features[15]->curatorFeatureTag as $feature)
                                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($curator_features[16]->name == 'World Music')
                                        <div class="faq ">
                                            <div class=" m9 l12">
                                                <div class="features-box-select">
                                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select World Music" multiple>
                                                        @if(!empty($curator_features))
                                                            @foreach($curator_features[16]->curatorFeatureTag as $feature)
                                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="form-group modal-footer">
                        <button type="button" class="btn dark-white rounded update_track_not" id="update_track_not" data-dismiss="modal">Cancle</button>
                        <button type="submit" class="btn btn-sm rounded add_track basicbtn">
                            Create</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- Add Track Modal -->
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
