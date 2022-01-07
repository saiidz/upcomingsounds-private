{{-- layout --}}
@extends('layouts.curator-guest')

{{-- page title --}}
@section('title','Taste Maker Signup')

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
                                                    <h4 class="card-title bold"><span class="text tw-mr-2">1.</span> INTERESTS</h4>
                                                </div>
                                            </div>
                                            <div class="underline"></div>
                                            <div class="row music">
{{--                                                <div class="col s12 m6 l10">--}}
{{--                                                    <h6 class="card-title bold">INTERESTS <span class="text tw-mr-2"--}}
{{--                                                                                                   style="color:gray;">(Optional)</span>--}}
{{--                                                    </h6>--}}
{{--                                                </div>--}}
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <form method="POST" action="{{route('curator.signup.step.features.post')}}"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="section" id="faq">
                                                            @if(isset($curator_features) && !empty($curator_features))
                                                                @if($curator_features[0]->name == 'Interest')
                                                                    @error('tag')
                                                                    <small class="red-text" role="alert">
                                                                        {{ $message }}
                                                                    </small>
                                                                    @enderror
                                                                    <div class="faq row">
                                                                        <div class="col s12 m9 l12">
                                                                            <div class="collapsible-header features_tAgs">
                                                                                Interest
                                                                            </div>
                                                                            <div class="features-box">
                                                                                <ul class="ks-cboxtags">
                                                                                    @foreach($curator_features[0]->curatorFeatureTag as $feature)
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

                                                                @if($curator_features[13]->name == 'Punk / Ska')
                                                                    <div class="faq row">
                                                                        <div class="col s12 m9 l12">
                                                                            <div class="collapsible-header features_tAgs">
                                                                                Punk / Ska
                                                                            </div>
                                                                            <div class="features-box">
                                                                                <ul class="ks-cboxtags">
                                                                                    @foreach($curator_features[13]->curatorFeatureTag as $feature)
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

                                                                @if($curator_features[13]->name == 'RnB / Funk / Soul')
                                                                    <div class="faq row">
                                                                        <div class="col s12 m9 l12">
                                                                            <div class="collapsible-header features_tAgs">
                                                                                RnB / Funk / Soul
                                                                            </div>
                                                                            <div class="features-box">
                                                                                <ul class="ks-cboxtags">
                                                                                    @foreach($curator_features[13]->curatorFeatureTag as $feature)
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

                                                                @if($curator_features[13]->name == 'World Music')
                                                                    <div class="faq row">
                                                                        <div class="col s12 m9 l12">
                                                                            <div class="collapsible-header features_tAgs">
                                                                                World Music
                                                                            </div>
                                                                            <div class="features-box">
                                                                                <ul class="ks-cboxtags">
                                                                                    @foreach($curator_features[13]->curatorFeatureTag as $feature)
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

                                                            @endif

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
