<form method="POST" action="{{url('/update-artist-profile')}}"
      enctype="multipart/form-data">
    @csrf
    <div class="page-title m-b">
        <h4 class="inline m-a-0 update_profile">Basic Info</h4>
    </div>
    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Name</div>
        <div class="col-sm-9">
            <input type="text" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ isset($user_artist->name) ? $user_artist->name : ''  }}"
                   placeholder="Username" required>
            @error('name')
            <small class="red-text ml-10" role="alert">
                {{ $message }}
            </small>
            @enderror
        </div>
    </div>
    @if(!empty($user_artist->artistUser))
        @if($user_artist->artistUser->artist_signup_from == 'artist')
            <input type="hidden" name="artist_signup_from"
                   value="{{($user_artist->artistUser) ? $user_artist->artistUser->artist_signup_from : ''}}">
            <div class="page-title m-b">
                <h4 class="inline m-a-0 update_profile">Artist Info</h4>
            </div>

        @elseif($user_artist->artistUser->artist_signup_from == 'artist_representative')
            <input type="hidden" name="artist_signup_from"
                   value="{{($user_artist->artistUser) ? $user_artist->artistUser->artist_signup_from : ''}}">
            <div class="page-title m-b">
                <h4 class="inline m-a-0 update_profile">Artist Representative
                    Info</h4>
            </div>

            <div class="form-group row">
                <div class="col-sm-3 form-control-label text-muted">What kind of
                    artist representative are you ?
                </div>
                <div class="col-sm-9">
                    <div class="col s12">
                        <p class="mb-1">
                            <label>
                                <input type="checkbox"
                                       {{($user_artist->artistUser->artist_representative_record == 1) ? 'checked' : ''}} class="filled-in"
                                       name="artist_representative_record"
                                       value="1"/>
                                <span>Record Label 🎧</span>
                            </label>
                            <label class="record_label">
                                <input type="checkbox"
                                       {{($user_artist->artistUser->artist_representative_manager == 2) ? 'checked' : ''}} class="filled-in"
                                       name="artist_representative_manager"
                                       value="2"/>
                                <span>Manager 🚀</span>
                            </label>
                        </p>
                    </div>
                    <div class="col s12">
                        <p class="mb-1">
                            <label>
                                <input type="checkbox"
                                       {{($user_artist->artistUser->artist_representative_press == 3) ? 'checked' : ''}} class="filled-in"
                                       name="artist_representative_press"
                                       value="3"/>
                                <span>Press Officer 🎤</span>
                            </label>
                            <label class="record_label">
                                <input type="checkbox"
                                       {{($user_artist->artistUser->artist_representative_publisher == 4) ? 'checked' : ''}} class="filled-in"
                                       name="artist_representative_publisher"
                                       value="4"/>
                                <span>Publisher 🎯</span>
                            </label>
                        </p>
                    </div>
                </div>
            </div>

        @else
        @endif



        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">Artist Name
            </div>
            <div class="col-sm-9">
                <input id="artist_name"
                       class="form-control @error('artist_name') is-invalid @enderror"
                       name="artist_name"
                       value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->artist_name : ''}}"
                       type="text" placeholder="Artist Name" required>
                @error('artist_name')
                <small class="red-text" role="alert">
                    {{ $message }}
                </small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">Country</div>
            <div class="col-sm-9">
                <select class="form-control c-select" name="country_name">
                    <option value="" disabled selected>Choose Country</option>
                    @foreach($countries as $country)
                        <option value="{{$country->id}}"
                                @if($country->id == $user_artist->artistUser->country_id) selected @endif>{{$country->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="page-title m-b">
            <h4 class="inline m-a-0 update_profile">Artist's Bio</h4>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">Bio</div>
            <div class="col-sm-9">
                                                    <textarea name="artist_bio"
                                                              placeholder="Parisian singer, songwriter & producer..."
                                                              class="form-control @error('artist_bio') is-invalid @enderror">{{isset($user_artist->artistUser) ? $user_artist->artistUser->artist_bio : ''}}</textarea>
                @error('artist_bio')
                <small class="red-text ml-10" role="alert">
                    {{ $message }}
                </small>
                @enderror
            </div>
        </div>

        <div class="page-title m-b">
            <h4 class="inline m-a-0 update_profile">Right now</h4>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">Hot News</div>
            <div class="col-sm-9">
                                                    <textarea name="hot_news"
                                                              placeholder="I'm releasing my next EP in March..."
                                                              class="form-control @error('hot_news') is-invalid @enderror">{{isset($user_artist->artistUser) ? $user_artist->artistUser->hot_news : ''}}</textarea>
                @error('hot_news')
                <small class="red-text ml-10" role="alert">
                    {{ $message }}
                </small>
                @enderror
            </div>
        </div>

        <div class="page-title m-b">
            <h4 class="inline m-a-0 update_profile">Social Media Links</h4>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">Instagram</div>
            <div class="col-sm-9">
                <input id="instagram_url"
                       class="form-control @error('instagram_url') is-invalid @enderror"
                       placeholder="https://www.instagram.com/username"
                       name="instagram_url"
                       value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->instagram_url : ''}}"
                       type="text">
                @error('instagram_url')
                <small class="red-text" role="alert">
                    {{ $message }}
                </small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">Facebook</div>
            <div class="col-sm-9">
                <input id="facebook_url"
                       class="form-control @error('facebook_url') is-invalid @enderror"
                       placeholder="https://www.facebook.com/username"
                       name="facebook_url"
                       value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->facebook_url : ''}}"
                       type="text">
                @error('facebook_url')
                <small class="red-text" role="alert">
                    {{ $message }}
                </small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">Spotify</div>
            <div class="col-sm-9">
                <input id="spotify_url"
                       class="form-control @error('spotify_url') is-invalid @enderror"
                       placeholder="https://www.spotify.com/username"
                       name="spotify_url"
                       value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->spotify_url : ''}}"
                       type="text">
                @error('spotify_url')
                <small class="red-text" role="alert">
                    {{ $message }}
                </small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">Sound Cloud
            </div>
            <div class="col-sm-9">
                <input id="soundcloud_url"
                       class="form-control @error('soundcloud_url') is-invalid @enderror"
                       placeholder="https://www.soundcloud.com/username"
                       name="soundcloud_url"
                       value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->soundcloud_url : ''}}"
                       type="text">
                @error('soundcloud_url')
                <small class="red-text" role="alert">
                    {{ $message }}
                </small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">Youtube</div>
            <div class="col-sm-9">
                <input id="youtube_url"
                       class="form-control @error('youtube_url') is-invalid @enderror"
                       placeholder="https://www.youtube.com/username"
                       name="youtube_url"
                       value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->youtube_url : ''}}"
                       type="text">
                @error('youtube_url')
                <small class="red-text" role="alert">
                    {{ $message }}
                </small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">Add Website
            </div>
            <div class="col-sm-9">
                <input id="website_url"
                       class="form-control @error('website_url') is-invalid @enderror"
                       placeholder="https://www.website.com/"
                       name="website_url"
                       value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->website_url : ''}}"
                       type="text">
                @error('website_url')
                <small class="red-text" role="alert">
                    {{ $message }}
                </small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">Deezer
            </div>
            <div class="col-sm-9">
                <input id="deezer_url"
                       class="form-control @error('deezer_url') is-invalid @enderror"
                       placeholder="https://www.deezer.com/"
                       name="deezer_url"
                       value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->deezer_url : ''}}"
                       type="text">
                @error('deezer_url')
                <small class="red-text" role="alert">
                    {{ $message }}
                </small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">Bandcamp
            </div>
            <div class="col-sm-9">
                <input id="bandcamp_url"
                       class="form-control @error('bandcamp_url') is-invalid @enderror"
                       placeholder="https://www.bandcamp.com/"
                       name="bandcamp_url"
                       value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->bandcamp_url : ''}}"
                       type="text">
                @error('bandcamp_url')
                <small class="red-text" role="alert">
                    {{ $message }}
                </small>
                @enderror
            </div>
        </div>

            <div class="form-group row">
                <div class="col-sm-3 form-control-label text-muted">Tiktok
                </div>
                <div class="col-sm-9">
                    <input id="tiktok_url"
                           class="form-control @error('tiktok_url') is-invalid @enderror"
                           placeholder="https://www.tiktok.com/"
                           name="tiktok_url"
                           value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->tiktok_url : ''}}"
                           type="text">
                    @error('tiktok_url')
                    <small class="red-text" role="alert">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
            </div>

        <div class="page-title m-b-2">
            <h4 class="inline m-a-0 update_profile">Your universe</h4>
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
                <h6 class="card-title bold">Music genres <span
                        class="text tw-mr-2"
                        style="color:gray;">(Optional)</span>
                </h6>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                <div class="section" id="faq">
                    @if(isset($new_features) && !empty($new_features))
                        @foreach ($new_features as $key => $new_feature)
                            <div class="faq row">
                                <div class="col-sm-12">
                                    <div class="collapsible-header features_tAgs">
                                        {{ $key }}
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($new_feature as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                        id="checkboxOne{{$feature->id}}"
                                                        name="tag[]" value="{{$feature->id}}"
                                                        {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                        class="@error('tag') is-invalid @enderror">
                                                    <label
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    {{-- @if(isset($features) && !empty($features))
                        @if($features[0]->name == 'Metal')
                            <div class="faq row">
                                <div class="col-sm-12">
                                    <div
                                        class="collapsible-header features_tAgs">
                                        Metal
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($features[0]->featureTags as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                           id="checkboxOne{{$feature->id}}"
                                                           name="tag[]"
                                                           value="{{$feature->id}}"
                                                           {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                           class="@error('tag') is-invalid @enderror">
                                                    <label
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($features[1]->name == 'Reggae')
                            <div class="faq row">
                                <div class="col-sm-12">
                                    <div
                                        class="collapsible-header features_tAgs">
                                        Reggae
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($features[1]->featureTags as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                           id="checkboxOne{{$feature->id}}"
                                                           name="tag[]"
                                                           value="{{$feature->id}}"
                                                           {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                           class="">
                                                    <label
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($features[2]->name == 'Popular Music')
                            <div class="faq row">
                                <div class="col-sm-12">
                                    <div
                                        class="collapsible-header features_tAgs">
                                        Popular Music
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($features[2]->featureTags as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                           id="checkboxOne{{$feature->id}}"
                                                           name="tag[]"
                                                           value="{{$feature->id}}"
                                                           {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                           class="">
                                                    <label
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($features[3]->name == 'Classic / Instrumental')
                            <div class="faq row">
                                <div class="col-sm-12">
                                    <div
                                        class="collapsible-header features_tAgs">
                                        Classic / Instrumental
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($features[3]->featureTags as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                           id="checkboxOne{{$feature->id}}"
                                                           name="tag[]"
                                                           value="{{$feature->id}}"
                                                           {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                           class="">
                                                    <label
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($features[4]->name == 'Electronic')
                            <div class="faq row">
                                <div class="col-sm-12">
                                    <div
                                        class="collapsible-header features_tAgs">
                                        Electronic
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($features[4]->featureTags as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                           id="checkboxOne{{$feature->id}}"
                                                           name="tag[]"
                                                           value="{{$feature->id}}"
                                                           {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                           class="">
                                                    <label
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($features[5]->name == 'Folk / Acoustic')
                            <div class="faq row">
                                <div class="col-sm-12">
                                    <div
                                        class="collapsible-header features_tAgs">
                                        Folk / Acoustic
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($features[5]->featureTags as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                           id="checkboxOne{{$feature->id}}"
                                                           name="tag[]"
                                                           value="{{$feature->id}}"
                                                           {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                           class="">
                                                    <label
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($features[6]->name == 'Jazz')
                            <div class="faq row">
                                <div class="col-sm-12">
                                    <div
                                        class="collapsible-header features_tAgs">
                                        Jazz
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($features[6]->featureTags as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                           id="checkboxOne{{$feature->id}}"
                                                           name="tag[]"
                                                           value="{{$feature->id}}"
                                                           {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                           class="">
                                                    <label
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($features[7]->name == 'Pop')
                            <div class="faq row">
                                <div class="col-sm-12">
                                    <div
                                        class="collapsible-header features_tAgs">
                                        Pop
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($features[7]->featureTags as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                           id="checkboxOne{{$feature->id}}"
                                                           name="tag[]"
                                                           value="{{$feature->id}}"
                                                           {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                           class="">
                                                    <label
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($features[8]->name == 'R&B / Soul')
                            <div class="faq row">
                                <div class="col-sm-12">
                                    <div
                                        class="collapsible-header features_tAgs">
                                        R&B / Soul
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($features[8]->featureTags as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                           id="checkboxOne{{$feature->id}}"
                                                           name="tag[]"
                                                           value="{{$feature->id}}"
                                                           {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                           class="">
                                                    <label
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($features[9]->name == 'Rock / Punk')
                            <div class="faq row">
                                <div class="col-sm-12">
                                    <div
                                        class="collapsible-header features_tAgs">
                                        Rock / Punk
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($features[9]->featureTags as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                           id="checkboxOne{{$feature->id}}"
                                                           name="tag[]"
                                                           value="{{$feature->id}}"
                                                           {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                           class="">
                                                    <label
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($features[10]->name == 'World')
                            <div class="faq row">
                                <div class="col-sm-12">
                                    <div
                                        class="collapsible-header features_tAgs">
                                        World
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($features[10]->featureTags as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                           id="checkboxOne{{$feature->id}}"
                                                           name="tag[]"
                                                           value="{{$feature->id}}"
                                                           {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                           class="">
                                                    <label
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($features[11]->name == 'Moods')
                            <div class="faq row">
                                <div class="col-sm-12">
                                    <div
                                        class="collapsible-header features_tAgs">
                                        Moods
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($features[11]->featureTags as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                           id="checkboxOne{{$feature->id}}"
                                                           name="tag[]"
                                                           value="{{$feature->id}}"
                                                           {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                           class="">
                                                    <label
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($features[12]->name == 'Evolution & Status')
                            <div class="faq row">
                                <div class="col-sm-12">
                                    <div
                                        class="collapsible-header features_tAgs">
                                        Evolution & Status
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($features[12]->featureTags as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                           id="checkboxOne{{$feature->id}}"
                                                           name="tag[]"
                                                           value="{{$feature->id}}"
                                                           {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                           class="">
                                                    <label
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($features[13]->name == 'Hip-hop / Rap')
                            <div class="faq row">
                                <div class="col-sm-12">
                                    <div
                                        class="collapsible-header features_tAgs">
                                        Hip-hop / Rap
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($features[13]->featureTags as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                           id="checkboxOne{{$feature->id}}"
                                                           name="tag[]"
                                                           value="{{$feature->id}}"
                                                           {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                           class="">
                                                    <label
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endif --}}

                </div>
            </div>
        </div>
    @endif
    <div class="form-group row">
        <input type="submit" value="Update"
               class="btn btn-sm rounded artist_update">
    </div>

</form>
