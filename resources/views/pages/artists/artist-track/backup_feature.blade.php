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
                                {{-- <div class="collapsible-header features_tAgs">
                                    World Music
                                </div> --}}
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
