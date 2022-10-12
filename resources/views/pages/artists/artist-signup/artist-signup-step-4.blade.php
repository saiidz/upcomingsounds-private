{{-- layout --}}
@extends('layouts.artist-guest')

{{-- page title --}}
@section('title','Artist Signup Step Three')

{{-- page style --}}
@section('page-style')
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('vendors/vendors.min.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-faq.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-faq.css')}}">
    <style>
        ul.ks-cboxtags li input[type="checkbox"]:checked + label::before {
            /*content: "";*/
            /*content: url("../images/select-tick.svg");*/
            /*width: 23px;*/
            /*height: 34px;*/
            /*margin: 0 5px 0 0px;*/
            /*background-position: 40px;*/
            /*display: block;*/
            /*transform: translate(-2px, 5px);*/
        }
        ul.ks-cboxtags li input[type="checkbox"]:checked + label{
            background-color:#02b875 !important;
            color:white;
        }
    </style>
@endsection

{{-- page content --}}
@section('content')
    <div class="app-body">
        <div class="b-t">
            <div class="center-block text-center">
                <div class="p-a-md">
                    <div>
                        <h4><span class="Gary">Gary</span> from Upcoming Sounds</h4>
                        <p class="text-muted m-y">
                            And now, {{(auth()->user()) ? auth()->user()->name : 'test'}}, how would you describe your
                            musical universe?
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- BEGIN: Page Main-->
        <div id="main">
            <div class="row">
                <div class="col s9 sTep4">
                    <div class="container">
                        <!-- Input Fields -->
                        <div class="row">
                            <div class="col s12">
                                <div id="input-fields" class="card card-tabs cardsTep2">
                                    <div class="card-content">
                                        <div id="view-input-fields">
                                            <div class="row">
                                                <div class="col s12 m6 l10">
                                                    <h4 class="card-title bold"><span class="text tw-mr-2">1.</span> Your universe</h4>
                                                </div>
                                            </div>
                                            <div class="underline"></div>
                                            <div class="row music">
                                                <div class="col s12 m6 l10">
                                                    <h6 class="card-title bold">Music genres <span class="text tw-mr-2"
                                                                                                   style="color:gray;">(Optional)</span>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <form method="POST" action="{{route('artist.signup.step.4.post')}}"
                                                          enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="section" id="faq">
                                                            @if(isset($new_features) && !empty($new_features))
                                                                @foreach ($new_features as $key => $new_feature)

                                                                    @error('tag')
                                                                        <small class="red-text" role="alert">
                                                                            {{ $message }}
                                                                        </small>
                                                                    @enderror
                                                                    <div class="faq row">
                                                                        <div class="col s12 m9 l12">
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
                                                                    @error('tag')
                                                                    <small class="red-text" role="alert">
                                                                        {{ $message }}
                                                                    </small>
                                                                    @enderror
                                                                    <div class="faq row">
                                                                        <div class="col s12 m9 l12">
                                                                            <div class="collapsible-header features_tAgs">
                                                                                Metal
                                                                            </div>
                                                                            <div class="features-box">
                                                                                <ul class="ks-cboxtags">
                                                                                    @foreach($features[0]->featureTags as $feature)
                                                                                        <li>
                                                                                            <input type="checkbox"
                                                                                                   id="checkboxOne{{$feature->id}}"
                                                                                                   name="tag[]" value="{{$feature->id}}"
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
                                                                            <div class="col s12 m9 l12">
                                                                                <div class="collapsible-header features_tAgs">
                                                                                    Reggae
                                                                                </div>
                                                                                <div class="features-box">
                                                                                    <ul class="ks-cboxtags">
                                                                                        @foreach($features[1]->featureTags as $feature)
                                                                                            <li>
                                                                                                <input type="checkbox"
                                                                                                       id="checkboxOne{{$feature->id}}"
                                                                                                       name="tag[]" value="{{$feature->id}}"
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
                                                                            <div class="col s12 m9 l12">
                                                                                <div class="collapsible-header features_tAgs">
                                                                                    Popular Music
                                                                                </div>
                                                                                <div class="features-box">
                                                                                    <ul class="ks-cboxtags">
                                                                                        @foreach($features[2]->featureTags as $feature)
                                                                                            <li>
                                                                                                <input type="checkbox"
                                                                                                       id="checkboxOne{{$feature->id}}"
                                                                                                       name="tag[]" value="{{$feature->id}}"
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
                                                                            <div class="col s12 m9 l12">
                                                                                <div class="collapsible-header features_tAgs">
                                                                                    Classic / Instrumental
                                                                                </div>
                                                                                <div class="features-box">
                                                                                    <ul class="ks-cboxtags">
                                                                                        @foreach($features[3]->featureTags as $feature)
                                                                                            <li>
                                                                                                <input type="checkbox"
                                                                                                       id="checkboxOne{{$feature->id}}"
                                                                                                       name="tag[]" value="{{$feature->id}}"
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
                                                                            <div class="col s12 m9 l12">
                                                                                <div class="collapsible-header features_tAgs">
                                                                                    Electronic
                                                                                </div>
                                                                                <div class="features-box">
                                                                                    <ul class="ks-cboxtags">
                                                                                        @foreach($features[4]->featureTags as $feature)
                                                                                            <li>
                                                                                                <input type="checkbox"
                                                                                                       id="checkboxOne{{$feature->id}}"
                                                                                                       name="tag[]" value="{{$feature->id}}"
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
                                                                            <div class="col s12 m9 l12">
                                                                                <div class="collapsible-header features_tAgs">
                                                                                    Folk / Acoustic
                                                                                </div>
                                                                                <div class="features-box">
                                                                                    <ul class="ks-cboxtags">
                                                                                        @foreach($features[5]->featureTags as $feature)
                                                                                            <li>
                                                                                                <input type="checkbox"
                                                                                                       id="checkboxOne{{$feature->id}}"
                                                                                                       name="tag[]" value="{{$feature->id}}"
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
                                                                            <div class="col s12 m9 l12">
                                                                                <div class="collapsible-header features_tAgs">
                                                                                    Jazz
                                                                                </div>
                                                                                <div class="features-box">
                                                                                    <ul class="ks-cboxtags">
                                                                                        @foreach($features[6]->featureTags as $feature)
                                                                                            <li>
                                                                                                <input type="checkbox"
                                                                                                       id="checkboxOne{{$feature->id}}"
                                                                                                       name="tag[]" value="{{$feature->id}}"
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
                                                                            <div class="col s12 m9 l12">
                                                                                <div class="collapsible-header features_tAgs">
                                                                                    Pop
                                                                                </div>
                                                                                <div class="features-box">
                                                                                    <ul class="ks-cboxtags">
                                                                                        @foreach($features[7]->featureTags as $feature)
                                                                                            <li>
                                                                                                <input type="checkbox"
                                                                                                       id="checkboxOne{{$feature->id}}"
                                                                                                       name="tag[]" value="{{$feature->id}}"
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
                                                                            <div class="col s12 m9 l12">
                                                                                <div class="collapsible-header features_tAgs">
                                                                                    R&B / Soul
                                                                                </div>
                                                                                <div class="features-box">
                                                                                    <ul class="ks-cboxtags">
                                                                                        @foreach($features[8]->featureTags as $feature)
                                                                                            <li>
                                                                                                <input type="checkbox"
                                                                                                       id="checkboxOne{{$feature->id}}"
                                                                                                       name="tag[]" value="{{$feature->id}}"
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
                                                                            <div class="col s12 m9 l12">
                                                                                <div class="collapsible-header features_tAgs">
                                                                                    Rock / Punk
                                                                                </div>
                                                                                <div class="features-box">
                                                                                    <ul class="ks-cboxtags">
                                                                                        @foreach($features[9]->featureTags as $feature)
                                                                                            <li>
                                                                                                <input type="checkbox"
                                                                                                       id="checkboxOne{{$feature->id}}"
                                                                                                       name="tag[]" value="{{$feature->id}}"
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
                                                                            <div class="col s12 m9 l12">
                                                                                <div class="collapsible-header features_tAgs">
                                                                                    World
                                                                                </div>
                                                                                <div class="features-box">
                                                                                    <ul class="ks-cboxtags">
                                                                                        @foreach($features[10]->featureTags as $feature)
                                                                                            <li>
                                                                                                <input type="checkbox"
                                                                                                       id="checkboxOne{{$feature->id}}"
                                                                                                       name="tag[]" value="{{$feature->id}}"
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
                                                                            <div class="col s12 m9 l12">
                                                                                <div class="collapsible-header features_tAgs">
                                                                                    Moods
                                                                                </div>
                                                                                <div class="features-box">
                                                                                    <ul class="ks-cboxtags">
                                                                                        @foreach($features[11]->featureTags as $feature)
                                                                                            <li>
                                                                                                <input type="checkbox"
                                                                                                       id="checkboxOne{{$feature->id}}"
                                                                                                       name="tag[]" value="{{$feature->id}}"
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
                                                                            <div class="col s12 m9 l12">
                                                                                <div class="collapsible-header features_tAgs">
                                                                                    Evolution & Status
                                                                                </div>
                                                                                <div class="features-box">
                                                                                    <ul class="ks-cboxtags">
                                                                                        @foreach($features[12]->featureTags as $feature)
                                                                                            <li>
                                                                                                <input type="checkbox"
                                                                                                       id="checkboxOne{{$feature->id}}"
                                                                                                       name="tag[]" value="{{$feature->id}}"
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
                                                                            <div class="col s12 m9 l12">
                                                                                <div class="collapsible-header features_tAgs">
                                                                                    Hip-hop / Rap
                                                                                </div>
                                                                                <div class="features-box">
                                                                                    <ul class="ks-cboxtags">
                                                                                        @foreach($features[13]->featureTags as $feature)
                                                                                            <li>
                                                                                                <input type="checkbox"
                                                                                                       id="checkboxOne{{$feature->id}}"
                                                                                                       name="tag[]" value="{{$feature->id}}"
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

                                                        <div class="section" id="faq">
                                                            <div class="faq row">
                                                                <div class="col s12 m12 l12">
                                                                    <ul class="collapsible categories-collapsible">
                                                                        <li class="active">
                                                                            <div class="collapsible-header">Q: Need help defining your musical universe? <i class="material-icons">
                                                                                    keyboard_arrow_right </i></div>
                                                                            <div class="collapsible-body">
                                                                                <p>Knowing more about your musical universe allows us to recommend curators and pros who are the most relevant for you. If you have trouble defining your music, write to us, we will be happy to listen to your music and help you :)</p>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="collapsible-header">Q: Nothing's set in stone! ;) <i class="material-icons">
                                                                                    keyboard_arrow_right </i></div>
                                                                            <div class="collapsible-body">
                                                                                <p>You will be able to update these elements as your musical universe evolves over time, no need to worry too much about it. </p>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <button class="tellMeMore left LeftSide" onclick="window.history.go(-1); return false;" style="border:none;">Previous</button>
                                                                <button class="tellMeMore right RightSide" style="border:none;"
                                                                        type="submit">Next
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-overlay"></div>
                </div>
            </div>
        </div>
        <!-- END: Page Main-->

    </div>

@endsection


{{-- page script --}}
@section('page-script')
    <script src="{{asset('js/vendors.min.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
@endsection
