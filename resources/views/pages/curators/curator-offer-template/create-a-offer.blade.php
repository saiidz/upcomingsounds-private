@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Create a offer')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('css/curator-dashboard.css') }}">
    <link rel="stylesheet" href="{{asset('css/custom/custom.css')}}" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/gijgo.min.css')}}" type="text/css" />
    <style>
        svg.svg-inline--fa {
            font-size: inherit !important;
        }
        /*.profile_public{*/
        /*    margin-left: 12.5rem;*/
        /*}*/
        .artist-features {
            display: flex;
            align-items: center;
            margin: 0 28px 20px 10px;
            flex-wrap: wrap;
        }
        .artist-features ul {
            margin: 0;
            padding: 0 0px 0 40px;
        }
        .artist-features ul li {
            color: #8d8ca4;
            font-size: 16px;
            line-height: 16px;
            margin: 10px 0 0 0;
        }
        .artist-features ul li::marker {
            color: #02b875;
        }
        .custom-icon::before {
            content: "";
            background-image: url({{asset('/images/artist_us.png')}});
            width: 22px;
            height: 22px;
            display: inline-block;
            background-size: cover;
            margin-top: 7px;
        }
        .iconUsc {
            /*padding-left: 25px;*/
        {{--background: url({{asset('images/coin_bg.png')}}) no-repeat left;--}}
/*background-size: 20px;*/
            height: 25px;
            margin-top: 3px;
            margin-right: 2px;
        }
        .coinContribution{
            display:flex;
        }
        .coinContribution .form-control{
            /*border-left: 2px solid grey;*/
            width: 500px;
        }
        .textOffer{
            justify-content: space-between !important;
            align-items: center !important;
            display: flex !important;
        }
    </style>
@endsection

@section('content')
    <!-- ############ PAGE START-->

    <div class="page-content">
        <div class="row-col">
            <div class="col-lg-9 b-r no-border-md">
                <div class="padding">
                    <div class="page-title m-b proposition_header">
                        <h1 class="inline m-a-0 titleColor">Create a Offer</h1>
                        <a href="{{ url()->previous() }}"
                           class="btn btn-sm rounded proposition">
                            Back</a>
                    </div>
                    <div class="row-col">
                        <div class="col-sm w w-auto-xs m-b">
                            <div class="item w rounded">
                                <div class="item-media">
                                    @php
                                        $mystring = $user->profile;
                                        $findhttps   = 'https';
                                        $findhttp   = 'http';
                                        $poshttps = strpos($mystring, $findhttps);

                                        $poshttp = strpos($mystring, $findhttp);
                                        if($poshttps != false){
                                            $pos = $poshttps;
                                        }else{
                                            $pos = $poshttp;
                                        }
                                    @endphp
                                    @if($pos === false)
                                        @if(!empty($user->profile))
                                            <div class="item-media-content"
                                                 style="background-image: url({{URL('/')}}/uploads/profile/{{$user->profile}});"></div>
                                        @else
                                            <div class="item-media-content"
                                                 style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                                        @endif
                                    @elseif($pos == 0)
                                        <div class="item-media-content"
                                             style="background-image: url({{$user->profile}});"></div>
                                    @else
                                        <div class="item-media-content"
                                             style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="p-l-md no-padding-xs">
                                <div class="page-title">
                                    <h1 class="inline">{{($user) ? $user->name : ''}}</h1>
                                </div>
                                <p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis" style="font-size: 14px;">
                                    @if(!empty($user->artistUser->artist_bio))
                                        {{$user->artistUser->artist_bio}}
                                    @endif
                                </p>
                                @if(!empty($user->artistUser->country))
                                    <div class="block flag_style clearfix m-b">
                                        <img class="flag_icon" src="{{asset('images/flags')}}/{{$user->artistUser->country->flag_icon}}.png" alt="{{$user->artistUser->country->flag_icon}}">
                                        <span class="text-muted"
                                              style="font-size:15px">{{($user->artistUser->country) ? $user->artistUser->country->name : ''}}</span>
                                    </div>
                                @endif
                                <div class="row-col m-b" id="socialView_S">
                                    <div class="col-xs">
                                        @if(!empty($user->artistUser->instagram_url))
                                            <a href="{{$user->artistUser->instagram_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored light-blue-800"
                                               title="Instagram">
                                                <i class="fa fa-instagram"></i>
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user->artistUser->facebook_url))
                                            <a href="{{$user->artistUser->facebook_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored indigo"
                                               title="Facebook">
                                                <i class="fa fa-facebook"></i>
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user->artistUser->spotify_url))
                                            <a href="{{$user->artistUser->spotify_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored light-green-500"
                                               title="Spotify">
                                                <i class="fa fa-spotify"></i>
                                                <i class="fa fa-spotify"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user->artistUser->soundcloud_url))
                                            <a href="{{$user->artistUser->soundcloud_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored orange-700"
                                               title="SoundCloud">
                                                <i class="fa fa-soundcloud"></i>
                                                <i class="fa fa-soundcloud"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user->artistUser->youtube_url))
                                            <a href="{{$user->artistUser->youtube_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored red-600"
                                               title="Youtube">
                                                <i class="fa fa-youtube"></i>
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user->artistUser->website_url))
                                            <a href="{{$user->artistUser->website_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Website">
                                                <i class="fa fa-link"></i>
                                                <i class="fa fa-link"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user->artistUser->deezer_url))
                                            <a href="{{$user->artistUser->deezer_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#eb9d00;" title="Deezer">
                                                <i class="fab fa-deezer"></i>
                                                <i class="fab fa-deezer"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user->artistUser->bandcamp_url))
                                            <a href="{{$user->artistUser->bandcamp_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Bandcamp">
                                                <i class="fa fa-bandcamp"></i>
                                                <i class="fa fa-bandcamp"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user->artistUser->tiktok_url))
                                            <a href="{{$user->artistUser->tiktok_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Tiktok">
                                                <i class="fab fa-tiktok"></i>
                                                <i class="fab fa-tiktok"></i>
                                            </a>
                                        @endif
                                        @if($user->is_public_profile == 1)
                                            <a href="{{route('artist.public.profile',$user->name)}}" target="_blank" id="Public_Profile"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333 !important;" title="Public Profile">
                                                <i class="custom-icon"></i>
                                                <i class="custom-icon"></i>
                                            </a>
                                        @else
                                            <a href="{{route('artist.public.profile',$user->name)}}" target="_blank" id="Public_Profile"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333 !important; display:none;" title="Public Profile">
                                                <i class="custom-icon"></i>
                                                <i class="custom-icon"></i>
                                            </a>
                                        @endif
                                    </div>
                                    {{--View Submission  --}}
                                    <a href="javascript:void(0)" onclick="openNav({{!empty($campaign) ? $campaign->id : null}})"
                                       class="btn btn-sm rounded proposition">
                                        View Submission</a>
                                    {{--View Submission  --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="m-t-3">
                        <div class="page-title m-b">
                            <h6 class="inline m-a-0" id="submitSuccessMessage"></h6>
                        </div>
                        <form method="POST" action="{{route('curator.store.offer.template')}}"
                              enctype="multipart/form-data" class="new_basicform_with_reload" id="new_basicform_with_reload_direct">
                            @csrf
                            <input type="hidden" name="directOffer" value="1">
                            <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
                            <div class="form-group">
                                <label class="control-label form-control-label text-muted">Title</label>
                                <div>
                                    <input type="text" name="title"
                                           class="form-control"
                                           value="{{old('title') }}"
                                           placeholder="Your Title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label form-control-label text-muted">Offer Type</label>
                                <div>
                                    <select class="form-control" name="offer_type">
                                        <option disabled selected>Please Choose</option>
                                        @if(!empty($offer_types))
                                            @foreach($offer_types as $offer_type)
                                                <option value="{{$offer_type->id}}">{{$offer_type->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="textOffer">
                                    <label class="control-label form-control-label text-muted">Offer Text</label>
                                    <span class="h6 _800 text-white" data-toggle="tooltip" title="You can personalize your offers by entering the shortcodes below, which will replace campaign specific information when displayed to artists

{ARTIST}
{TITLE}
{RELEASE_DATE}"><span style="color: #02b875 !important;">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#provideModalCenter">
                    {{\App\Templates\IMessageTemplates::PROVIDE_A}}
                </a></span></span>
                                </div>
                                <div>
                                   <textarea name="description_details" id="descriptionDetails"
                                             placeholder="Offer Text..."
                                             class="form-control ckeditor">{{old('description_details')}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="control-label form-control-label text-muted">Contribution</label>
                                    <div class="coinContribution">
                                        <img src="{{asset('images/coin_bg.png')}}" class="iconUsc" alt="">
                                        <input type="number" name="contribution" value="{{old('contribution')}}" min="1" data-toggle="tooltip" title="{{ \App\Templates\IMessageTemplates::CONTRIBUTION_TEXT }}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label form-control-label text-muted">Alternative Option</label>
                                    <select class="form-control" name="alternative_option">
                                        <option disabled selected>Please Choose</option>
                                        @if(!empty($alternative_options))
                                            @foreach($alternative_options as $alternative_option)
                                                <option value="{{$alternative_option->id}}">{{$alternative_option->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="control-label form-control-label text-muted">Offer Expiry Date</label>
                                    <div>
                                        <input id="datePickerOfferExpiry" name="expiry_date" value="{{getDateNewFormat(\Illuminate\Support\Carbon::today(),30)}}"
                                               class="form-control datePickerOfferE">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label form-control-label text-muted">Approx Publish Date</label>
                                    <div>
                                        <input id="datePickerPublishDate" name="publish_date" value=""
                                               class="form-control datePickerOfferP">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group m-t-2">
                                <label class="control-label form-control-label text-muted">
                                    <input type="checkbox" class="radio permissionCopyright has-value" value="1" name="confirm">
                                    As a representative of the organization selected for this offer, by clicking this box I confirm my authority to create, edit, and post offers for the proposal I have created.
                                </label>
                            </div>

                            <div class="form-group modal-footer">
                                <button type="submit" id="updateTrack" class="btn btn-sm rounded add_track basicbtn">
                                    Submit</button>
                                <a href="{{route('curator.proposition')}}" class="btn btn-sm rounded add_track">Back</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            @include('pages.curators.panels.right-sidebar')
        </div>
    </div>

    <!-- ############ PAGE END-->
    <!-- Permission Copy Right Modal -->
    <div id="provideModalCenter" class="modal fade black-overlay" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Provide a customised experience</h5>
                </div>
                <div class="modal-body">
                    <p>You can personalize your offers by entering the shortcodes below, which will replace campaign specific information when displayed to artists</p>

                    <p>{ARTIST}</p>
                    <p>{TITLE}</p>
                    <p>{RELEASE_DATE}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div>
    </div>
    <!-- Permission Copy Right Modal -->
@endsection


@section('page-script')
    <script src="{{asset('js/gijgo.min.js')}}"></script>
    <script>
        $('.datePickerOfferE').datepicker({
            iconsLibrary: 'fontawesome',
            format: "yyyy-mm-dd",

        });
        $('.datePickerOfferP').datepicker({
            iconsLibrary: 'fontawesome',
            format: "yyyy-mm-dd",

        });

        var preload = document.getElementById("loadings");
        function loader(){
            preload.style.display='none';
        }
        function showLoader(){
            preload.style.display='block';
        }
    </script>
    <script>
        function openNav(campaign_id) {
            showLoader();
            //send ajax
            $.ajax({
                type: "GET",
                url: '{{route('get.active.campaign')}}',
                data: {campaign_id:campaign_id},
                dataType: 'json',
                success: function (data) {
                    loader();
                    if (data.success) {
                        $('#campaignAddRemove').empty();
                        $('#campaignAddRemove').html(data.campaign);
                        $('#campaign_ID').val(data.campaign_id);
                        $('.campaignBtn').remove();
                        $('#mySidebarCollapsed').addClass('mySidebarCollapsed');
                        // document.getElementById("mySidebarCollapsed").style.width = "490px";
                        document.getElementById("app-body").style.marginLeft = "490px";
                    }
                    if (data.error) {
                        toastr.error(data.error);
                    }
                },
            });
        }

        function closeNav() {
            $('#mySidebarCollapsed').addClass('mySidebarCollapsedRemove');
            // document.getElementById("mySidebarCollapsed").style.width = "0";
            document.getElementById("app-body").style.marginLeft= "0";
        }
    </script>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {

            $('.ckeditor').ckeditor();

        });
    </script>
@endsection
