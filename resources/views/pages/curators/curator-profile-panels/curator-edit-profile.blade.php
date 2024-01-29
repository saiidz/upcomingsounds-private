<form method="POST" action="{{url('/update-curator-profile')}}"
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
                   value="{{ isset($user_curator->name) ? $user_curator->name : ''  }}"
                   placeholder="Username" required>
            @error('name')
                <small class="red-text ml-10" role="alert">
                    {{ $message }}
                </small>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Address</div>
        <div class="col-sm-9">
            <input type="text" name="address"
                   class="form-control @error('address') is-invalid @enderror"
                   value="{{ isset($user_curator->address) ? $user_curator->address : ''  }}"
                   placeholder="Address" required>
            @error('address')
                <small class="red-text ml-10" role="alert">
                    {{ $message }}
                </small>
            @enderror
        </div>
    </div>
    @if(!empty($user_curator->curatorUser))
        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">TasteMaker Name
            </div>
            <div class="col-sm-9">
                <input id="tastemaker_name"
                       class="form-control @error('tastemaker_name') is-invalid @enderror"
                       name="tastemaker_name"
                       value="{{isset($user_curator->curatorUser) ? $user_curator->curatorUser->tastemaker_name : ''}}"
                       type="text" placeholder="TasteMaker Name" required>
                @error('tastemaker_name')
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
                                @if($country->id == $user_curator->curatorUser->country_id) selected @endif>{{$country->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="page-title m-b">
            <h4 class="inline m-a-0 update_profile">Curator's Bio</h4>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">Bio</div>
            <div class="col-sm-9">
                <textarea name="curator_bio"
                            placeholder="Parisian singer, songwriter & producer..."
                            class="form-control @error('curator_bio') is-invalid @enderror">{{isset($user_curator->curatorUser) ? $user_curator->curatorUser->curator_bio : ''}}</textarea>
                @error('curator_bio')
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
                       value="{{isset($user_curator->curatorUser) ? $user_curator->curatorUser->instagram_url : ''}}"
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
                       value="{{isset($user_curator->curatorUser) ? $user_curator->curatorUser->facebook_url : ''}}"
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
                       value="{{isset($user_curator->curatorUser) ? $user_curator->curatorUser->spotify_url : ''}}"
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
                       value="{{isset($user_curator->curatorUser) ? $user_curator->curatorUser->soundcloud_url : ''}}"
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
                       value="{{isset($user_curator->curatorUser) ? $user_curator->curatorUser->youtube_url : ''}}"
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
                       value="{{isset($user_curator->curatorUser) ? $user_curator->curatorUser->website_url : ''}}"
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
                       value="{{isset($user_curator->curatorUser) ? $user_curator->curatorUser->deezer_url : ''}}"
                       type="text">
                @error('deezer_url')
                <small class="red-text" role="alert">
                    {{ $message }}
                </small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">Apple
            </div>
            <div class="col-sm-9">
                <input id="apple_url"
                       class="form-control @error('apple_url') is-invalid @enderror"
                       placeholder="https://www.apple.com/"
                       name="apple_url"
                       value="{{isset($user_curator->curatorUser) ? $user_curator->curatorUser->apple_url : ''}}"
                       type="text">
                @error('apple_url')
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
                           value="{{isset($$user_curator->curatorUser) ? $$user_curator->curatorUser->tiktok_url : ''}}"
                           type="text">
                    @error('tiktok_url')
                    <small class="red-text" role="alert">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
            </div>

{{--        <div class="page-title m-b-2">--}}
{{--            <h4 class="inline m-a-0 update_profile">Your universe</h4>--}}
{{--        </div>--}}

        <div class="row">
            <div class="col s12 m6 l10">
                <h4 class="card-title bold"><span class="text tw-mr-2">1.</span> I would love to recieve....</h4>
            </div>
        </div>
        <div class="underline"></div>
        <div class="row music"></div>
        <div class="form-group row">
            <div class="col-sm-12">
                <div class="section" id="faq">

                    @if(isset($curator_features) && !empty($curator_features))
                        @if($curator_features[0]->name == 'I would love to recieve')
                            @error('tag')
                            <small class="red-text" role="alert">
                                {{ $message }}
                            </small>
                            @enderror
                            <div class="faq row">
                                <div class="col s12 m9 l12">
                                    <div class="collapsible-header features_tAgs">
                                        I would love to recieve....
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[0]->curatorFeatureTag as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
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
                                    <div class="collapsible-header features_tAgs">
                                        Alternative / Indie
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[1]->curatorFeatureTag as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
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

                        @if($curator_features[2]->name == 'Blogwave')
                            <div class="faq row">
                                <div class="col s12 m9 l12">
                                    <div class="collapsible-header features_tAgs">
                                        Popular Music
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[2]->curatorFeatureTag as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
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
                        @if($curator_features[3]->name == 'Classic')
                            <div class="faq row">
                                <div class="col s12 m9 l12">
                                    <div class="collapsible-header features_tAgs">
                                        Classic
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[3]->curatorFeatureTag as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
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

                        @if($curator_features[4]->name == 'Classical / Jazz')
                            <div class="faq row">
                                <div class="col s12 m9 l12">
                                    <div class="collapsible-header features_tAgs">
                                        Classical / Jazz
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[4]->curatorFeatureTag as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
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

                        @if($curator_features[5]->name == 'EDM')
                            <div class="faq row">
                                <div class="col s12 m9 l12">
                                    <div class="collapsible-header features_tAgs">
                                        EDM
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[5]->curatorFeatureTag as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
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

                        @if($curator_features[6]->name == 'Electronica / Breaks')
                            <div class="faq row">
                                <div class="col s12 m9 l12">
                                    <div class="collapsible-header features_tAgs">
                                        Electronica / Breaks
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[6]->curatorFeatureTag as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
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

                        @if($curator_features[7]->name == 'Folk')
                            <div class="faq row">
                                <div class="col s12 m9 l12">
                                    <div class="collapsible-header features_tAgs">
                                        Folk
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[7]->curatorFeatureTag as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
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

                        @if($curator_features[8]->name == 'Hip-hop / Rap')
                            <div class="faq row">
                                <div class="col s12 m9 l12">
                                    <div class="collapsible-header features_tAgs">
                                        Hip-hop / Rap
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[8]->curatorFeatureTag as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
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

                        @if($curator_features[9]->name == 'House / Techno')
                            <div class="faq row">
                                <div class="col s12 m9 l12">
                                    <div class="collapsible-header features_tAgs">
                                        House / Techno
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[9]->curatorFeatureTag as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
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

                        @if($curator_features[10]->name == 'IDM / Downtempo')
                            <div class="faq row">
                                <div class="col s12 m9 l12">
                                    <div class="collapsible-header features_tAgs">
                                        IDM / Downtempo
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[10]->curatorFeatureTag as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
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

                        @if($curator_features[11]->name == 'Metal / Hard Rock')
                            <div class="faq row">
                                <div class="col s12 m9 l12">
                                    <div class="collapsible-header features_tAgs">
                                        Metal / Hard Rock
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[11]->curatorFeatureTag as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
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

                        @if($curator_features[12]->name == 'Other')
                            <div class="faq row">
                                <div class="col s12 m9 l12">
                                    <div class="collapsible-header features_tAgs">
                                        Other
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[12]->curatorFeatureTag as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
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

                        @if($curator_features[13]->name == 'Pop')
                            <div class="faq row">
                                <div class="col s12 m9 l12">
                                    <div class="collapsible-header features_tAgs">
                                        Pop
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[13]->curatorFeatureTag as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
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

                        @if($curator_features[14]->name == 'Punk / Ska')
                            <div class="faq row">
                                <div class="col s12 m9 l12">
                                    <div class="collapsible-header features_tAgs">
                                        Punk / Ska
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[14]->curatorFeatureTag as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
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

                        @if($curator_features[15]->name == 'RnB / Funk / Soul')
                            <div class="faq row">
                                <div class="col s12 m9 l12">
                                    <div class="collapsible-header features_tAgs">
                                        RnB / Funk / Soul
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[15]->curatorFeatureTag as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
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

                        @if($curator_features[16]->name == 'World Music')
                            <div class="faq row">
                                <div class="col s12 m9 l12">
                                    <div class="collapsible-header features_tAgs">
                                        World Music
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[16]->curatorFeatureTag as $feature)
                                                <li>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
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
                        <div class="row">
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
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[17]->curatorFeatureTag as $feature)
                                            <li id="remove_feature-{{ $feature->id }}">
                                                <span class="closeTag"><i class="fa fa-remove text-warning" style="font-size: 18px;" onclick="deleteTagCurator({{ $feature->id }})"></i></span>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
                                                            class="">
                                                    <label class="pleaseAny"
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                            <li>
                                                <a href="javascript:void(0)" class="addMoreClassic" onclick="addMoreClassic({{ $curator_features[17]->id }})">Add More</a>
                                            </li>
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
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[18]->curatorFeatureTag as $feature)
                                            <li id="remove_feature-{{ $feature->id }}">
                                                <span class="closeTag"><i class="fa fa-remove text-warning" style="font-size: 18px;" onclick="deleteTagCurator({{ $feature->id }})"></i></span>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
                                                            class="">
                                                    <label class="pleaseAny"
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                            <li>
                                                <a href="javascript:void(0)" class="addMoreClassic" onclick="addMoreClassic({{ $curator_features[18]->id }})">Add More</a>
                                            </li>
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
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[19]->curatorFeatureTag as $feature)
                                                <li id="remove_feature-{{ $feature->id }}">
                                                    <span class="closeTag"><i class="fa fa-remove text-warning" style="font-size: 18px;" onclick="deleteTagCurator({{ $feature->id }})"></i></span>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
                                                            class="">
                                                    <label class="pleaseAny"
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                            <li>
                                                <a href="javascript:void(0)" class="addMoreClassic" onclick="addMoreClassic({{ $curator_features[19]->id }})">Add More</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif


                        @if($curator_features[20]->name == 'Hip-hop / Rap')
                            <div class="faq row">
                                <div class="col s12 m9 l12">
                                    <div class="collapsible-header features_tAgs">
                                        Hip-hop / Rap
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[20]->curatorFeatureTag as $feature)
                                            <li id="remove_feature-{{ $feature->id }}">
                                                <span class="closeTag"><i class="fa fa-remove text-warning" style="font-size: 18px;" onclick="deleteTagCurator({{ $feature->id }})"></i></span>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
                                                            class="">
                                                    <label class="pleaseAny"
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                            <li>
                                                <a href="javascript:void(0)" class="addMoreClassic" onclick="addMoreClassic({{ $curator_features[20]->id }})">Add More</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($curator_features[21]->name == 'Jazz')
                            <div class="faq row">
                                <div class="col s12 m9 l12">
                                    <div class="collapsible-header features_tAgs">
                                        Jazz
                                    </div>
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[21]->curatorFeatureTag as $feature)
                                            <li id="remove_feature-{{ $feature->id }}">
                                                <span class="closeTag"><i class="fa fa-remove text-warning" style="font-size: 18px;" onclick="deleteTagCurator({{ $feature->id }})"></i></span>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
                                                            class="">
                                                    <label class="pleaseAny"
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                            <li>
                                                <a href="javascript:void(0)" class="addMoreClassic" onclick="addMoreClassic({{ $curator_features[21]->id }})">Add More</a>
                                            </li>
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
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[22]->curatorFeatureTag as $feature)
                                            <li id="remove_feature-{{ $feature->id }}">
                                                <span class="closeTag"><i class="fa fa-remove text-warning" style="font-size: 18px;" onclick="deleteTagCurator({{ $feature->id }})"></i></span>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
                                                            class="">
                                                    <label class="pleaseAny"
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                            <li>
                                                <a href="javascript:void(0)" class="addMoreClassic" onclick="addMoreClassic({{ $curator_features[22]->id }})">Add More</a>
                                            </li>
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
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[23]->curatorFeatureTag as $feature)
                                            <li id="remove_feature-{{ $feature->id }}">
                                                <span class="closeTag"><i class="fa fa-remove text-warning" style="font-size: 18px;" onclick="deleteTagCurator({{ $feature->id }})"></i></span>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
                                                            class="">
                                                    <label class="pleaseAny"
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                            <li>
                                                <a href="javascript:void(0)" class="addMoreClassic" onclick="addMoreClassic({{ $curator_features[23]->id }})">Add More</a>
                                            </li>
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
                                    <div class="features-box">
                                        <ul class="ks-cboxtags">
                                            @foreach($curator_features[24]->curatorFeatureTag as $feature)
                                            <li id="remove_feature-{{ $feature->id }}">
                                                <span class="closeTag"><i class="fa fa-remove text-warning" style="font-size: 18px;" onclick="deleteTagCurator({{ $feature->id }})"></i></span>
                                                    <input type="checkbox"
                                                            id="checkboxOne{{$feature->id}}"
                                                            name="tag[]" {{in_array($feature->id, $selected_feature) ? 'checked' : ''}} value="{{$feature->id}}"
                                                            class="">
                                                    <label class="pleaseAny"
                                                        for="checkboxOne{{$feature->id}}">
                                                        {{$feature->name}}
                                                    </label>
                                                </li>
                                            @endforeach
                                            <li>
                                                <a href="javascript:void(0)" class="addMoreClassic" onclick="addMoreClassic({{ $curator_features[24]->id }})">Add More</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif

                </div>
            </div>
        </div>
    @endif
    <div class="form-group row">
        <input type="submit" value="Update"
               class="btn btn-sm rounded artist_update">
    </div>

</form>
