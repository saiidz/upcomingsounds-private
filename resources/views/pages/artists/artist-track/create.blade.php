
<form method="POST" action="{{url('/store-track')}}"
      enctype="multipart/form-data" id="track_song" name="track_song">
    @csrf
    <div class="page-title m-b">
        <h4 class="inline m-a-0 update_profile">Add a song</h4>
    </div>
    <div class="item-except text-sm text-muted h-2x m-t-sm">
        Complete your discography and let influencers discover your songs when they visit your profile.
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Title</div>
        <div class="col-sm-9">
            <input type="text" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{old('name')}}"
                   placeholder="Your Title" required>
            <div id="error_message_name" class="red-text" style="color:red; padding:4px;"></div>
            @error('name')
            <small class="red-text ml-10" role="alert">
                {{ $message }}
            </small>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Description</div>
        <div class="col-sm-9">
            <textarea name="description"
                      placeholder="Tell us more about your artwork... "
                      class="form-control @error('description') is-invalid @enderror" required>{{old('description')}}</textarea>
            <div id="error_message_description" class="red-text" style="color:red; padding:4px;"></div>
            @error('description')
            <small class="red-text ml-10" role="alert">
                {{ $message }}
            </small>
            @enderror
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
        <div class="col-sm-3 form-control-label text-muted"><a href="https://www.youtube.com/" target="_blank" style="color:#d64441;" rel="noopener noreferrer">YouTube</a> or <a href="https://soundcloud.com/discover" style="color:#d64441;" target="_blank" rel="noopener noreferrer">Soundcloud</a> link</div>
        <div class="col-sm-9">
            <input type="text" name="youtube_soundcloud_url" id="trueUrl" onclick="removeStyle(this);"
                   class="form-control @error('youtube_soundcloud_url') is-invalid @enderror" value="{{old('youtube_soundcloud_url')}}"
                   placeholder="https://www.youtube.com/watch?v=iLd8ugdjJgk" required>
            <div id="error_message_youtube_soundcloud" class="red-text" style="color:red; padding:4px;"></div>
            @error('youtube_soundcloud_url')
            <small id="error_message"class="red-text ml-10" role="alert">
                {{ $message }}
            </small>
            @enderror
            {{-- <div class="row">
                <div class="col-sm-12">
                    <div id="preview"></div>
                </div>
            </div> --}}
        </div>
    </div>

    {{-- <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">SoundCloud link</div>
        <div class="col-sm-9">
            <input type="text" name="soundcloudUrl" onclick="removeStyle(this);"
                   class="form-control @error('soundcloudUrl') is-invalid @enderror" value="{{old('soundcloudUrl')}}"
                   placeholder="https://soundcloud.com">
            <div id="error_message_soundcloud" class="red-text" style="color:red; padding:4px;"></div>
            @error('soundcloudUrl')
            <small class="red-text ml-10" role="alert">
                {{ $message }}
            </small>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Spotify track link (optional)</div>
        <div class="col-sm-9">
            <input type="url" name="spotify_track_url" onclick="removeStyle(this);"
                   class="form-control @error('spotify_track_url') is-invalid @enderror"
                   value="{{old('spotify_track_url')}}"
                   placeholder="https://open.spotify.com/artist/5eJu3FXEJJGVaQpAeQjdwg">
            <div id="error_message_spotify_track" class="red-text" style="color:red; padding:4px;"></div>
            @error('spotify_track_url')
            <small class="red-text ml-10" role="alert">
                {{ $message }}
            </small>
            @enderror
        </div>
    </div> --}}
    <div class="form-group row" id="previewLinkBlock" style="display: none">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <div id="previewLink"></div>
        </div>
    </div>
    <div class="form-group row">
        {{-- <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <div class="plusIcon">
                <i class="fa fa-remove" id="removeButton">Remove Link</i>
            </div>
        </div> --}}

        <div id="TextBoxesGroup">
            <div id="TextBoxDiv1">
                <div class="col-sm-3 form-control-label text-muted">Add New Link #1</div>
                <div class="col-sm-9 m-b">
                    <div class="addEmbeded">
                        <div class="addMoreLinks">
                            <input type="url" name="link[]" onclick="removeStyle(this);"
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
                   accept=".png, .jpg, .jpeg" required />
            <label for="imageTrackUpload"></label>
            <div class="imgTrackPreview">
                <img src=""
                     id="imgTrackPreview" style="display:none;">
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Song Upload(mp3)</div>
        <div class="col-sm-9">
            <input type='file' class="form-control" name="audio" id="audioTrackUpload"
                   accept=".mp3" required />
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
        <div class="col-sm-3 form-control-label text-muted">Select your genres/interests.</div>
        <div class="col-sm-9" id="trackAddFeatures">
            <div class="section" id="faq">
                @if(isset($curator_features) && !empty($curator_features))
                    <div class="row">
                        <div class="col s12 m6 l10">
                            <h4 class="card-title bold"><span class="text tw-mr-2">1.</span> Interests:  </h4>
                        </div>
                    </div>
                    <div class="underline"></div>
                    <div class="row music"></div>
                    @if($curator_features[0]->name == 'I would love to recieve')
                    {{-- @if($curator_features[0]->name == 'You can select interests that correspond with your releases.') --}}
                        @error('tag')
                            <small class="red-text" role="alert">
                                {{ $message }}
                            </small>
                        @enderror
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                {{-- <div class="collapsible-header features_tAgs">
                                    I would love to recieve....
                                </div> --}}
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="You can select interests that correspond with your releases" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[0]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                {{-- <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[0]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="@error('tag') is-invalid @enderror">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col s12 m6 l10">
                            <h4 class="card-title bold"><span class="text tw-mr-2">2.</span> GENRES</h4>
                        </div>
                    </div>
                    <div class="underline"></div>
                    <div class="row music"></div>
                    @if($curator_features[1]->name == 'Alternative / Indie')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                {{-- <div class="collapsible-header features_tAgs">
                                    Alternative / Indie
                                </div> --}}
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Alternative / Indie" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[1]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                {{-- <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[1]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    @endif

                    @if($curator_features[2]->name == 'Blogwave')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                {{-- <div class="collapsible-header features_tAgs">
                                    Blogwave
                                </div> --}}
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Blogwave" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[2]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                {{-- <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[2]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    @endif
                    @if($curator_features[3]->name == 'Classic')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                {{-- <div class="collapsible-header features_tAgs">
                                    Classic
                                </div> --}}
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Classic" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[3]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                {{-- <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[3]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    @endif

                    @if($curator_features[4]->name == 'Classical / Jazz')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                {{-- <div class="collapsible-header features_tAgs">
                                    Classical / Jazz
                                </div> --}}
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Classical / Jazz" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[4]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                {{-- <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[4]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    @endif

                    @if($curator_features[5]->name == 'EDM')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                {{-- <div class="collapsible-header features_tAgs">
                                    EDM
                                </div> --}}
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select EDM" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[5]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                {{-- <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[5]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    @endif

                    @if($curator_features[6]->name == 'Electronica / Breaks')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                {{-- <div class="collapsible-header features_tAgs">
                                    Electronica / Breaks
                                </div> --}}
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Electronica / Breaks" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[6]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                {{-- <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[6]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    @endif

                    @if($curator_features[7]->name == 'Folk')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                {{-- <div class="collapsible-header features_tAgs">
                                    Folk
                                </div> --}}
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Folk" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[7]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                {{-- <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[7]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    @endif

                    @if($curator_features[8]->name == 'Hip-hop / Rap')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                {{-- <div class="collapsible-header features_tAgs">
                                    Hip-hop / Rap
                                </div> --}}
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Hip-hop / Rap" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[8]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                {{-- <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[8]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    @endif

                    @if($curator_features[9]->name == 'House / Techno')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                {{-- <div class="collapsible-header features_tAgs">
                                    House / Techno
                                </div> --}}
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select House / Techno" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[9]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                {{-- <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[9]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    @endif

                    @if($curator_features[10]->name == 'IDM / Downtempo')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                {{-- <div class="collapsible-header features_tAgs">
                                    IDM / Downtempo
                                </div> --}}
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select IDM / Downtempo" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[10]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                {{-- <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[10]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    @endif

                    @if($curator_features[11]->name == 'Metal / Hard Rock')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                {{-- <div class="collapsible-header features_tAgs">
                                    Metal / Hard Rock
                                </div> --}}
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Metal / Hard Rock" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[11]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                {{-- <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[11]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    @endif

                    @if($curator_features[12]->name == 'Other')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                {{-- <div class="collapsible-header features_tAgs">
                                    Other
                                </div> --}}
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Other" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[12]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                {{-- <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[12]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    @endif

                    @if($curator_features[13]->name == 'Pop')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                {{-- <div class="collapsible-header features_tAgs">
                                    Pop
                                </div> --}}
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Pop" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[13]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                {{-- <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[13]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    @endif

                    @if($curator_features[14]->name == 'Punk / Ska')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                {{-- <div class="collapsible-header features_tAgs">
                                    Punk / Ska
                                </div> --}}
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select Punk / Ska" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[14]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                {{-- <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[14]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    @endif

                    @if($curator_features[15]->name == 'RnB / Funk / Soul')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                {{-- <div class="collapsible-header features_tAgs">
                                    RnB / Funk / Soul
                                </div> --}}
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select RnB / Funk / Soul" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[15]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                {{-- <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[15]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    @endif

                    @if($curator_features[16]->name == 'World Music')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                <div class="collapsible-header features_tAgs">
                                    World Music
                                </div>
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select World Music" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[16]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                {{-- <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[16]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    @endif
                    {{-- <div class="row">
                        <div class="col s12 m6 l10">
                            <h4 class="card-title bold"><span class="text tw-mr-2">3.</span> Please don't send me any...</h4>
                        </div>
                    </div>
                    <div class="underline"></div>
                    <div class="row music"></div>

                    @if($curator_features[17]->name == 'Classic / Instrumental')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                <div class="collapsible-header features_tAgs">
                                    Classic / Instrumental
                                </div>
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select features tags" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[17]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[17]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($curator_features[18]->name == 'Electronic')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                <div class="collapsible-header features_tAgs">
                                    Electronic
                                </div>
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select features tags" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[18]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[18]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($curator_features[19]->name == 'Folk / Acoustic')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                <div class="collapsible-header features_tAgs">
                                    Folk / Acoustic
                                </div>
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select features tags" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[19]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[19]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif --}}


                    {{--                    @if($curator_features[20]->name == 'Hip-hop / Rap')--}}
                    {{--                        <div class="faq row">--}}
                    {{--                            <div class="col s12 m9 l12">--}}
                    {{--                                <div class="collapsible-header features_tAgs">--}}
                    {{--                                    Hip-hop / Rap--}}
                    {{--                                </div>--}}
                    {{--                                <div class="features-box">--}}
                    {{--                                    <ul class="ks-cboxtags">--}}
                    {{--                                        @foreach($curator_features[20]->curatorFeatureTag as $feature)--}}
                    {{--                                            <li>--}}
                    {{--                                                <input type="checkbox"--}}
                    {{--                                                       id="checkboxOneCat{{$feature->id}}"--}}
                    {{--                                                       name="tag[]" value="{{$feature->id}}"--}}
                    {{--                                                       class="">--}}
                    {{--                                                <label--}}
                    {{--                                                    for="checkboxOneCat{{$feature->id}}">--}}
                    {{--                                                    {{$feature->name}}--}}
                    {{--                                                </label>--}}
                    {{--                                            </li>--}}
                    {{--                                        @endforeach--}}
                    {{--                                    </ul>--}}
                    {{--                                    @error('tag_folk_acoustic')--}}
                    {{--                                    <small class="red-text" role="alert">--}}
                    {{--                                        {{ $message }}--}}
                    {{--                                    </small>--}}
                    {{--                                    @enderror--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    @endif--}}

                    {{-- @if($curator_features[21]->name == 'Jazz')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                <div class="collapsible-header features_tAgs">
                                    Jazz
                                </div>
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select features tags" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[21]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[21]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($curator_features[22]->name == 'Metal')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                <div class="collapsible-header features_tAgs">
                                    Metal
                                </div>
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select features tags" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[22]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[22]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($curator_features[23]->name == 'Pop')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                <div class="collapsible-header features_tAgs">
                                    Pop
                                </div>
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select features tags" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[23]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[23]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($curator_features[24]->name == 'Popular Music')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                <div class="collapsible-header features_tAgs">
                                    Popular Music
                                </div>
                                <div class="features-box-select">
                                    <select class="form-control-label" name="tag[]" id="choices-multiple-remove-button" placeholder="Select features tags" multiple>
                                        @if(!empty($curator_features))
                                            @foreach($curator_features[24]->curatorFeatureTag as $feature)
                                                <option value="{{$feature->id}}">{{$feature->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[24]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOneCat{{$feature->id}}"
                                                       name="tag[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOneCat{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif --}}
                @endif

            </div>
        </div>
    </div>



{{--    <div class="form-group row">--}}
{{--        <div class="col-sm-3 form-control-label text-muted">Song Category</div>--}}
{{--        <div class="col-sm-9">--}}
{{--            <select class="form-control c-select" name="song_category" required>--}}
{{--                <option value="" disabled selected>Choose Song Category</option>--}}
{{--                @foreach($track_categories as $song_cat)--}}
{{--                    <option value="{{$song_cat->id}}">{{$song_cat->name}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--            <div id="error_message_song_category" class="red-text" style="color:red; padding:4px;"></div>--}}
{{--        </div>--}}
{{--    </div>--}}



    <div class="form-group row">
        {{-- <button type="submit" class="btn btn-sm rounded add_track"> --}}
        <button type="submit" class="btn btn-sm rounded add_track" onclick='return validateAddTrackForm("track_song")'>
            Add Song</button>
    </div>
</form>
<script>
    function validURL(str) {
        var pattern = new RegExp("^((https|http)?://)"); // protocol

        return !!pattern.test(str);
    }
    function  getInputValue(elem) {

        let src = document.getElementById(elem.className).value
        if (src === "") {
            toastr.error('Please Add url embeded');
            return false;
        }
        url = validURL(src);

        if(url == false)
        {
            toastr.error('Please Add correct url embeded');
            return false;
        }

        var match_link = src.match(/embed|w.soundcloud.com|bandcamp|widget/g);

        if(match_link == null)
        {
            toastr.error('Please Add correct url embeded');
            return false;
        }

        if(match_link[0].indexOf("embed") !== -1){
            document.querySelector('#previewLinkBlock').style.display = 'block';
            document.querySelector('#previewLink').innerHTML = "";
            document.querySelector('#previewLink').innerHTML = '<iframe style="border-radius:12px" id="previewLink" src="'+src+'" width="100%" height="380" frameBorder="0" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';
        }else if(match_link[0].indexOf("widget") !== -1){
            document.querySelector('#previewLinkBlock').style.display = 'block';
            document.querySelector('#previewLink').innerHTML = "";
            document.querySelector('#previewLink').innerHTML = '<iframe style="border-radius:12px" id="previewLink" src="'+src+'" width="100%" height="380" frameBorder="0" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';
        }else if(match_link[0].indexOf("w.soundcloud.com") !== -1){
            document.querySelector('#previewLinkBlock').style.display = 'block';
            document.querySelector('#previewLink').innerHTML = "";
            document.querySelector('#previewLink').innerHTML = '<iframe style="border-radius:12px" id="previewLink" src="'+src+'" width="100%" height="380" frameBorder="0" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';
        }else if(match_link[0].indexOf("bandcamp") !== -1){
            document.querySelector('#previewLinkBlock').style.display = 'block';
            document.querySelector('#previewLink').innerHTML = "";
            document.querySelector('#previewLink').innerHTML = '<iframe style="border-radius:12px" id="previewLink" src="'+src+'" width="100%" height="380" frameBorder="0" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';
        }else{
            toastr.error('Please Add correct url embeded');
            return false;
        }
    }
</script>
