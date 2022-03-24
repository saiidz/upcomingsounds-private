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
                      placeholder="Your description..."
                      class="form-control @error('description') is-invalid @enderror" required></textarea>
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
            <input id="datepicker" name="release_date"
                   class="form-control release_date">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Song Category</div>
        <div class="col-sm-9">
            <select class="form-control c-select" name="song_category" required>
                <option value="" disabled selected>Choose Song Category</option>
                @foreach($track_categories as $song_cat)
                    <option value="{{$song_cat->id}}">{{$song_cat->name}}</option>
                @endforeach
            </select>
            <div id="error_message_song_category" class="red-text" style="color:red; padding:4px;"></div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Select Genre (You can select only 3 features per genre)</div>
        <div class="col-sm-9" id="trackAddFeatures">
            <div class="section" id="faq">
                @if(isset($curator_features) && !empty($curator_features))
                    <div class="row">
                        <div class="col s12 m6 l10">
                            <h4 class="card-title bold"><span class="text tw-mr-2">1.</span> I would love to recieve....</h4>
                        </div>
                    </div>
                    <div class="underline"></div>
                    <div class="row music"></div>
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
                                                       name="tag_would_love[]" value="{{$feature->id}}"
                                                       class="@error('tag_would_love') is-invalid @enderror">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_would_love')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                                       name="tag_alternative[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_alternative')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($curator_features[2]->name == 'Blogwave')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                <div class="collapsible-header features_tAgs">
                                    Blogwave
                                </div>
                                <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[2]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOne{{$feature->id}}"
                                                       name="tag_blogwave[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_blogwave')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                                       name="tag_classic[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_classic')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                                       name="tag_classical_jazz[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_classical_jazz')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                                       name="tag_EDM[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_EDM')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                                       name="tag_electronica[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_electronica')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                                       name="tag_folk[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_folk')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                                       name="tag_hip_hop[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_hip_hop')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                                       name="tag_house[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_house')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                                       name="tag_idm[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_idm')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                                       name="tag_metal_hard_Rock[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_metal_hard_Rock')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                                       name="tag_other[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_other')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                                       name="tag_pop[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_pop')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                                       name="tag_punk[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_punk')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                                       name="tag_rnb[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_rnb')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                                       name="tag_world_music[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_world_music')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOne{{$feature->id}}"
                                                       name="tag_classic_instrumental[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_classic_instrumental')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOne{{$feature->id}}"
                                                       name="tag_electronic[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_electronic')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOne{{$feature->id}}"
                                                       name="tag_folk_acoustic[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_folk_acoustic')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif


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
{{--                                                       id="checkboxOne{{$feature->id}}"--}}
{{--                                                       name="tag[]" value="{{$feature->id}}"--}}
{{--                                                       class="">--}}
{{--                                                <label--}}
{{--                                                    for="checkboxOne{{$feature->id}}">--}}
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

                    @if($curator_features[21]->name == 'Jazz')
                        <div class="faq row">
                            <div class="col s12 m9 l12">
                                <div class="collapsible-header features_tAgs">
                                    Jazz
                                </div>
                                <div class="features-box">
                                    <ul class="ks-cboxtags">
                                        @foreach($curator_features[21]->curatorFeatureTag as $feature)
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOne{{$feature->id}}"
                                                       name="tag_jazz[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_jazz')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOne{{$feature->id}}"
                                                       name="tag_metal[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_metal')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOne{{$feature->id}}"
                                                       name="tag_pop_new[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_pop_new')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
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
                                            <li>
                                                <input type="checkbox"
                                                       id="checkboxOne{{$feature->id}}"
                                                       name="tag_popular_music[]" value="{{$feature->id}}"
                                                       class="">
                                                <label
                                                    for="checkboxOne{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('tag_popular_music')
                                    <small class="red-text" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif
                @endif

            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">YouTube / SoundCloud link</div>
        <div class="col-sm-9">
            <input type="text" name="youtube_soundcloud_url" id="trueUrl" onclick="removeStyle(this);"
                   class="form-control @error('youtube_soundcloud_url') is-invalid @enderror" value=""
                   placeholder="https://www.youtube.com/watch?v=iLd8ugdjJgk" required>
            <div id="error_message_youtube_soundcloud" class="red-text" style="color:red; padding:4px;"></div>
            @error('youtube_soundcloud_url')
            <small id="error_message"class="red-text ml-10" role="alert">
                {{ $message }}
            </small>
            @enderror
            <div class="row">
                <div class="col-sm-12">
                    <div id="preview"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Spotify track link (optional)</div>
        <div class="col-sm-9">
            <input type="url" name="spotify_track_url" onclick="removeStyle(this);"
                   class="form-control @error('spotify_track_url') is-invalid @enderror"
                   value=""
                   placeholder="https://open.spotify.com/artist/5eJu3FXEJJGVaQpAeQjdwg" required>
            <div id="error_message_spotify_track" class="red-text" style="color:red; padding:4px;"></div>
            @error('spotify_track_url')
            <small class="red-text ml-10" role="alert">
                {{ $message }}
            </small>
            @enderror
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
        <div class="col-sm-3 form-control-label text-muted"></div>
        <div class="col-sm-9">
            <div class="col s12">
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
        <button type="submit" class="btn btn-sm rounded add_track" onclick='return validateAddTrackForm("track_song")'>
            Add Song</button>
    </div>
</form>
