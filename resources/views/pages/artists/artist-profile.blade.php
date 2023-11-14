@extends('pages.artists.panels.layout')

{{-- page title --}}
@section('title','Artist Profile')

@section('page-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/gijgo.min.css')}}" type="text/css" />
{{--    <link rel="stylesheet" href="{{asset('css/custom/custom.css')}}" type="text/css" />--}}
    <style>
        #loadings {
            background: rgba(255, 255, 255, .4) url({{asset('images/loader.gif')}}) no-repeat center center !important;
        }
        /*ul.ks-cboxtags li{*/
        /*    display: inline-table !important;*/
        /*}*/
        /*ul.ks-cboxtags li input[type="checkbox"] {*/
        /*     opacity: 1 !important;*/
        /*}*/
        .red-text{
            color:red !important;
        }
        /*ul.ks-cboxtags li input[type="checkbox"]:checked + label{*/
        /*    background-color:#02b875 !important;*/
        /*    color:white;*/
        /*}*/
        .custom-icon::before {
            content: "";
            background-image: url({{asset('/images/artist_us.png')}});
            width: 22px;
            height: 22px;
            display: inline-block;
            background-size: cover;
            margin-top: 7px;
        }
        .ItemNotify{
            background-color: rgba(120, 120, 120, 0.1);
        }
    </style>
@endsection

@section('content')
            <!-- ############ PAGE START-->
            <div class="page-bg" data-stellar-ratio="2" style="background-image: url({{asset('images/a3.jpg')}});"></div>
            <div class="page-content">
                <div class="padding b-b">
                    <div class="row-col">
                        <div class="col-sm w w-auto-xs m-b">
                            <div class="item w rounded">
                                <div class="item-media">
                                    @php
                                        $mystring = $user_artist->profile;
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
                                        @if(!empty($user_artist->profile))
                                            <div class="item-media-content" id="upload_profile"
                                                 style="background-image: url({{URL('/')}}/uploads/profile/{{$user_artist->profile}});"></div>
                                        @else
                                            <div class="item-media-content" id="upload_profile"
                                                 style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                                        @endif
                                    @elseif($pos == 0)
                                        <div class="item-media-content" id="upload_profile"
                                             style="background-image: url({{$user_artist->profile}});"></div>
                                    @else
                                        <div class="item-media-content" id="upload_profile"
                                             style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="p-l-md no-padding-xs">
                                <h1 class="page-title">
                                    <span class="h1 _800">{{($user_artist) ? $user_artist->name : ''}}
                                        @if ($user_artist->is_verified == 1)
                                            <img src="{{ asset('images/verified_icon.svg') }}" style="width: 22px;" alt="">
                                        @endif
                                    </span>
                                </h1>
                                <p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis"  style="font-size: 14px;">
                                    @if(!empty($user_artist->artistUser->artist_bio))
                                        {{$user_artist->artistUser->artist_bio}}
                                    @endif
                                </p>

                                @if(!empty($user_artist->artistUser->country))
                                    <div class="block flag_style clearfix m-b">
                                        <img class="flag_icon" src="{{asset('images/flags')}}/{{$user_artist->artistUser->country->flag_icon}}.png" alt="{{$user_artist->artistUser->country->flag_icon}}">
{{--                                        @foreach($countries_flag as $flag)--}}
{{--                                            @if($flag['iso_a2'] == $user_artist->artistUser->country->iso2)--}}
{{--                                                {!! $flag->flag['flag-icon'] !!}--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
                                        <span class="text-muted"
                                              style="font-size:15px">{{($user_artist->artistUser->country) ? $user_artist->artistUser->country->name : ''}}</span>
                                    </div>
                                @endif
                                <form class="profile-pic" id="profileBtnShow" method="post"
                                      enctype="multipart/form-data" style="display:none;">
                                    <div class="item-action m-b">
                                        <label for="file" class="btn btn-sm rounded primary">Update Profile Picture</label>
                                        <input id="file" type="file" class="btn btn-sm rounded primary" name="file"
                                               accept="image/*"/>
                                        {{--                                        <a href="#" class="btn btn-sm rounded primary">Upload</a>--}}
                                        {{--                                    <a href="#" class="btn btn-sm rounded white">Edit Profile</a>--}}
                                    </div>
                                </form>

                                <div class="block clearfix m-b">
                                    {{-- <span>9</span> <span class="text-muted">Albums</span>, --}}
                                    @if(!empty($artist_track_count) && $artist_track_count !== 0)
                                    <span>{{ $artist_track_count  }}</span> <span
                                        class="text-muted">Tracks</span>
                                    @endif
                                </div>
                                <div class="row-col m-b">
                                    <div class="col-xs">
                                        @if(!empty($user_artist->artistUser->instagram_url))
                                            <a href="{{$user_artist->artistUser->instagram_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored light-blue-800"
                                               title="Instagram">
                                                <i class="fa fa-instagram"></i>
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user_artist->artistUser->facebook_url))
                                            <a href="{{$user_artist->artistUser->facebook_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored indigo"
                                               title="Facebook">
                                                <i class="fa fa-facebook"></i>
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user_artist->artistUser->spotify_url))
                                            <a href="{{$user_artist->artistUser->spotify_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored light-green-500"
                                               title="Spotify">
                                                <i class="fa fa-spotify"></i>
                                                <i class="fa fa-spotify"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user_artist->artistUser->soundcloud_url))
                                            <a href="{{$user_artist->artistUser->soundcloud_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored orange-700"
                                               title="SoundCloud">
                                                <i class="fa fa-soundcloud"></i>
                                                <i class="fa fa-soundcloud"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user_artist->artistUser->youtube_url))
                                            <a href="{{$user_artist->artistUser->youtube_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored red-600"
                                               title="Youtube">
                                                <i class="fa fa-youtube"></i>
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user_artist->artistUser->website_url))
                                            <a href="{{$user_artist->artistUser->website_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Website">
                                                <i class="fa fa-link"></i>
                                                <i class="fa fa-link"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user_artist->artistUser->deezer_url))
                                            <a href="{{$user_artist->artistUser->deezer_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#eb9d00;" title="Deezer">
                                                <i class="fab fa-deezer"></i>
                                                <i class="fab fa-deezer"></i>
                                                {{--                                                <span class="iconify" data-icon="fa-brands:deezer"></span>--}}
{{--                                                <i class="iconify" data-icon="fa-brands:deezer"></i>--}}
                                            </a>
                                        @endif
                                        @if(!empty($user_artist->artistUser->bandcamp_url))
                                            <a href="{{$user_artist->artistUser->bandcamp_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Bandcamp">
                                                <i class="fa fa-bandcamp"></i>
                                                <i class="fa fa-bandcamp"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user_artist->artistUser->tiktok_url))
                                            <a href="{{$user_artist->artistUser->tiktok_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Tiktok">
                                                <i class="fab fa-tiktok"></i>
                                                <i class="fab fa-tiktok"></i>
{{--                                                <i class="iconify" data-icon="fa-brands:tiktok"></i>--}}
                                            </a>
                                        @endif

                                        @if($user_artist->is_public_profile == 1)
                                            <a href="{{route('artist.public.profile',$user_artist->name)}}" target="_blank" id="Public_Profile"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333 !important;" title="Public Profile">
                                                <i class="custom-icon"></i>
                                                <i class="custom-icon"></i>
{{--                                                <img src="{{asset('/images/artist_us.png')}}" alt="" style="width: 20px !important;">--}}
                                            </a>
                                        @else
                                            <a href="{{route('artist.public.profile',$user_artist->name)}}" target="_blank" id="Public_Profile"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333 !important; display:none;" title="Public Profile">
                                                <i class="custom-icon"></i>
                                                <i class="custom-icon"></i>
{{--                                                <img src="{{asset('/images/artist_us.png')}}" alt="" style="width: 20px !important;">--}}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row-col">
                    <div class="col-lg-9 b-r no-border-md">
                        <div class="padding p-y-0 m-b-md">
                            <div class="nav-active-border b-primary bottom m-b-md m-t">
                                <ul class="nav l-h-2x" data-ui-jp="taburl">
                                    <li class="nav-item m-r inline">
                                        <a class="nav-link active RemoveUpload" href="#" data-toggle="tab"
                                           data-target="#track">Tracks</a>
                                    </li>
                                    <li class="nav-item m-r inline">
                                        <a class="nav-link RemoveUpload" href="#" data-toggle="tab"
                                           data-target="#playlist">Lists</a>
                                    </li>
                                    <li class="nav-item m-r inline">
                                        <a class="nav-link RemoveUpload" href="#" data-toggle="tab" data-target="#like">Saved</a>
                                    </li>
                                    <li class="nav-item m-r inline">
                                        <a class="nav-link RemoveUpload" href="#" data-toggle="tab"
                                           data-target="#profile">Profile</a>
                                    </li>
                                    <li class="nav-item m-r inline" id="EditProfileTapShow" style="display:none;">
                                        <a class="nav-link"  id="EditProfile" href="#" data-toggle="tab"
                                           data-target="#edit-profile">Edit Profile</a>
                                    </li>
                                    <li class="nav-item m-r inline">
                                        <a class="nav-link RemoveUpload" id="AddTrack" href="#" data-toggle="tab"
                                           data-target="#add-track">Add a Track</a>
                                    </li>
                                    <li class="nav-item m-r inline">
                                        <a class="nav-link RemoveUpload" href="#" data-toggle="tab"
                                           data-target="#notification-center">Notification Center ({{$unReadNotifications->count()}})</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                {{--               Artist Tracks                     --}}
                                <div class="tab-pane active" id="track">
                                    @include('pages.artists.artist-track.index')
                                </div>
                                {{--               Artist Tracks                     --}}

                                <div class="tab-pane" id="playlist">
                                    <div class="row m-b">
                                        <div class="col-xs-4 col-sm-4 col-md-3">
                                            <div class="item r" data-id="item-2"
                                                 data-src="http://api.soundcloud.com/tracks/259445397/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="javascript:void(0)" class="item-media-content"
                                                       style="background-image: url('images/b1.jpg');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="javascript:void(0)">Fireworks</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis hide">
                                                        <a href="javascript:void(0)" class="text-muted">Kygo</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
              		          <span class="item-meta-stats text-xs ">
              		          	<i class="fa fa-play text-muted"></i> 30
              		          	<i class="fa fa-heart m-l-sm text-muted"></i> 10
              		          </span>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-3">
                                            <div class="item r" data-id="item-10"
                                                 data-src="http://api.soundcloud.com/tracks/237514750/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="javascript:void(0)" class="item-media-content"
                                                       style="background-image: url('images/b9.jpg');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="javascript:void(0)">The Open Road</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis hide">
                                                        <a href="javascript:void(0)" class="text-muted">Postiljonen</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
              		          <span class="item-meta-stats text-xs ">
              		          	<i class="fa fa-play text-muted"></i> 860
              		          	<i class="fa fa-heart m-l-sm text-muted"></i> 240
              		          </span>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-3">
                                            <div class="item r" data-id="item-1"
                                                 data-src="http://api.soundcloud.com/tracks/269944843/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="javascript:void(0)" class="item-media-content"
                                                       style="background-image: url('images/b0.jpg');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="javascript:void(0)">Pull Up</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis hide">
                                                        <a href="javascript:void(0)" class="text-muted">Summerella</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
              		          <span class="item-meta-stats text-xs ">
              		          	<i class="fa fa-play text-muted"></i> 3200
              		          	<i class="fa fa-heart m-l-sm text-muted"></i> 210
              		          </span>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="like">
                                    @include('pages.artists.artist-profile-panels.artist-saved-curators')
                                </div>
                                {{--               Artist Profile                     --}}
                                <div class="tab-pane" id="profile">
                                    @include('pages.artists.artist-profile-panels.artist-show-profile')
                                </div>
                                {{--               Artist Profile                     --}}

                                {{--               Artist Update Profile                     --}}
                                <div class="tab-pane" id="edit-profile">
                                    @include('pages.artists.artist-profile-panels.artist-edit-profile')
                                </div>
                                {{--               Artist Update Profile                     --}}

                                <div class="tab-pane" id="add-track">
                                    {{--               Artist Update Profile                     --}}
                                    @include('pages.artists.artist-track.create')
                                    {{--               Artist Update Profile                     --}}
                                </div>

                                {{--               Curator Notification Center                     --}}
                                <div class="tab-pane" id="notification-center">
                                    @include('pages.artists.artist-profile-panels.artist-notification-center')
                                </div>
                                {{--               Curator Notification Center                     --}}
                            </div>
                        </div>
                    </div>
                    @include('pages.artists.panels.right-sidebar')
                </div>
            </div>

            <!-- ############ PAGE END-->


@endsection

@section('page-script')
    <script src="{{asset('js/track.js')}}"></script>
    <script>
        $(document).ready(function(){
            $(".slide-toggle").click(function(){
                $(".interestShow").animate({
                    height: "toggle"
                });
            });
        });

        function removeStyle(objfield) {
            objfield.style.borderColor = "";
            objfield.style.border = "";
        }
    </script>
    <script>
        // Image Track Song Preview
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('imgTrackPreview').setAttribute('src', e.target.result );
                    $('#imgTrackPreview').hide();
                    $('#imgTrackPreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageTrackUpload").change(function () {
            readURL(this);
        });

        // Image Edit Track Preview
        function readEditURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('imgEditTrackPreview').setAttribute('src', e.target.result );
                    $('#imgEditTrackPreview').hide();
                    $('#imgEditTrackPreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageEditTrackUpload").change(function () {
            readEditURL(this);
        });

        // audio track
        function readAudioURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('audioTrackPreview').setAttribute('src', e.target.result );
                    $('#audioTrackPreview').hide();
                    $('#audioTrackPreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#audioTrackUpload").change(function () {
            readAudioURL(this);
        });

        // edit track
        $("#audioEditTrackPreview").change(function () {
            readAudioEditURL(this);
        });

        function readAudioEditURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('audioEditTrack').setAttribute('src', e.target.result );
                    $('#audioEditTrack').hide();
                    $('#audioEditTrack').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script src="{{asset('js/gijgo.min.js')}}"></script>
    <script>
        var dateToday = new Date();
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            format: "yyyy-mm-dd",
            // minDate: dateToday

        });
        $('#dateEditpicker').datepicker({
            iconsLibrary: 'fontawesome',
            format: "yyyy-mm-dd",
            // minDate: dateToday
        });
    </script>
    <script>
        $(document).ready(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#file').change(function (e) {
                e.preventDefault();
                var formData = new FormData();
                formData.append('file', this.files[0]);
                // console.log(this.files[0]);
                // Preloader
                // $("#loading").delay(700).fadeOut("slow");
                // return false;
                showLoader();
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/upload-artist-profile')}}",
                    data: formData,
                    // dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if (data.success) {
                            loader();
                            var image = document.getElementById('upload_profile');
                            var path = window.location.origin + '/uploads/profile/' + data.profile_user;
                            image.style.backgroundImage = "url('" + path + "')";
                            $('#snackbar').html(data.success);
                            $('#snackbar').addClass("show");
                            setTimeout(function () {
                                $('#snackbar').removeClass("show");
                            }, 5000);
                        }
                        if (data.error) {
                            // loader();
                            $('#snackbarError').html(data.error);
                            $('#snackbarError').addClass("show");
                            setTimeout(function () {
                                $('#snackbarError').removeClass("show");
                            }, 5000);

                        }
                    },
                });
            });
        });
        $('#EditProfile').click(function () {
            var display_btn = document.getElementById('profileBtnShow');
            display_btn.style.display = 'block';
        });

        $('.RemoveUpload').click(function () {
            var display_upload = document.getElementById('profileBtnShow');
            display_upload.style.display = 'none';
            $("#EditProfileTapShow").css({ display: "none" });
        });
        $('#EditProfileTapHide').click(function () {
            // document.getElementById('EditProfileTapShow').style.display = 'inline-block';
            $("#EditProfileTapShow").css({ display: "inline-block" });
        });
    </script>
    <script>
        var preload = document.getElementById("loadings");
        function loader(){
            preload.style.display='none';
        }
        function showLoader(){
            preload.style.display='block';
        }
    </script>
    <script>
        // Edit Track
        let count =0;
        function editTrack(track_id){
            showLoader();
             count++;
            $.ajax({
                type: "GET",
                url: '{{url('/edit-track')}}/' + track_id,
                dataType: 'JSON',
                success:function (data){
                    loader();
                    console.log(data);
                    $('#track_edit_song').trigger("reset");
                    // $('#track_edit_song').attr('data-edit-track-id',data.artist_track.id);

                    var url = '{{url('update-track')}}/' + data.artist_track.id;
                    document.getElementById('track_edit_song').setAttribute('action',url);

                    // url links
                    let counter_count = 1
                    $('#TextBoxesGroupEdit').empty();

                    // add counter in addlink
                    $('#addLinkButtonEdit').attr('data-counter',data.artist_track_links.length);
                    $('#removeButtonEdit').attr('data-counter',data.artist_track_links.length);
                    // links iframe
                    $.each(data.artist_track_links, function(key, value){
                        var linkIframe = value.link;
                        let linkIframeNew = linkIframe.replace(/\"/g, "");
                        var newTextBoxDiv = $(document.createElement('div'))
                            .attr("id", 'TextBoxEditDiv' + counter_count);
                        newTextBoxDiv.after().html('<div class="col-sm-3 form-control-label text-muted">Add New Link #'+ counter_count +'</div>' +
                            '<div class="col-sm-9 m-b"> <div class="addEmbeded"><div class="addMoreLinks"><input type="text" class="form-control moreLinks" name="link[]" id="textbox' + counter_count + '" value="'+linkIframeNew+'" placeholder="Please Add Embeded Url"></div><div class="previewStart"><a href="javascript:void(0)" class="textbox' + counter_count + '" id="previewIcon" onclick="getInputValueEdit(this)"><i class="fa fa-eye"></i> preview</a></div></div></div>');

                        newTextBoxDiv.appendTo("#TextBoxesGroupEdit");
                        counter_count++;
                    });

                    $('#epLpLink').val(data.artist_track.ep_lp_link);
                    $('#trackEditTitle').val(data.artist_track.name);
                    $('#trackEditDescription').val(data.artist_track.description);
                    $('#trackEditPitchDescription').val(data.artist_track.pitch_description);
                    $('.trackEditID').val(data.artist_track.id);

                    var path = window.location.origin + '/uploads/track_thumbnail/' + data.artist_track.track_thumbnail;
                    document.getElementById('imgEditTrackPreview').setAttribute('src', path );
                    $('#imgEditTrackPreview').hide();
                    $('#imgEditTrackPreview').fadeIn(650);

                    // multiple Images display
                    if(data.artist_track_images.length > 0)
                    {
                        $.each(data.artist_track_images, function (key, value){
                            var path_image = window.location.origin + '/uploads/track_images/' + value.path;
                            if(value.type == 'pdf')
                            {
                                $('#multipleImgEditTrackPdf').append('<div class="PdfClose" id="removeImgPdf-'+value.id+'"><iframe src="'+path_image+'" type="application/pdf" width="30%" height="30%"></iframe><a href="javascript:void(0)" class="closebtn" onclick="deleteImagePdf('+value.id+')">×</a></div>')
                            }else{
                                $('#multipleImgEditTrack').append('<div class="ImageClose" id="removeImgPdf-'+value.id+'"><img src="'+path_image+'" id="multipleImgEditTrackPreview" class="multipleImgEditTrackPreview"><a href="javascript:void(0)" class="closebtn" onclick="deleteImagePdf('+value.id+')">×</a></div>')
                            }

                        });
                    }else{
                        $('#multipleImgEditTrack').empty();
                        $('#multipleImgEditTrackPdf').empty();
                    }

                    if(data.artist_track.demo == 'on')
                    {
                        $('#demoChecked').prop('checked', true);
                        var path_audio = window.location.origin + '/uploads/audio/' + data.artist_track.audio;
                        document.getElementById('audioEditTrack').setAttribute('src', path_audio );

                    }else{
                        $('#demoChecked').prop('checked', false);
                    }



                    $('#dateEditpicker').val(data.artist_track.release_date);
                    if(data.artist_track.display_profile == "1"){
                        $('#displayEditProfile').attr( 'checked', true );
                    }else{
                        $('#displayEditProfile').attr( 'checked', false );
                    }

                    if(data.artist_track.audio_description)
                    {
                        $('#audioDescription').val(data.artist_track.audio_description);
                    }else{
                        $('#audioDescription').val('Ready to share');
                    }


                    $('.audioSingleEdit').prop('checked', false );
                    $('.audioAlbumEdit').prop('checked', false );
                    $('.audioEpEdit').prop('checked', false );
                    $('.audioVideoEdit').prop('checked', false );

                    if(data.artist_track.release_type == "single"){
                        $('.audioSingleEdit').prop('checked', true );
                    }else if(data.artist_track.release_type == "album"){
                        $('.audioAlbumEdit').prop('checked', true );
                    }else if(data.artist_track.release_type == "ep"){
                        $('.audioEpEdit').prop('checked', true );
                    }else if(data.artist_track.release_type == "video"){
                        $('.audioVideoEdit').prop('checked', true );
                    }else{
                        $('.audioSingleEdit').prop('checked', false );
                        $('.audioAlbumEdit').prop('checked', false );
                        $('.audioEpEdit').prop('checked', false );
                        $('.audioVideoEdit').prop('checked', false );
                    }

                    $('.audioOriginalEdit').prop('checked', false );
                    $('.audioCoverEdit').prop('checked', false );
                    $('.audioRemixEdit').prop('checked', false );

                    if(data.artist_track.audio_cover == "original"){
                        $('.audioOriginalEdit').prop('checked', true );
                    }else if(data.artist_track.audio_cover == "cover"){
                        $('.audioCoverEdit').prop('checked', true );
                    }else if(data.artist_track.audio_cover == "remix"){
                        $('.audioRemixEdit').prop('checked', true );
                    }else{
                        $('.audioOriginalEdit').prop('checked', false );
                        $('.audioCoverEdit').prop('checked', false );
                        $('.audioRemixEdit').prop('checked', false );
                    }

                    // language list
                    if(count==1)
                    {
                        var firstElement = document.getElementById('editTrackLanguages');
                        const choices1 = new Choices(firstElement, {
                            removeItemButton: true,
                            choices: data.selected_languages,
                        });
                    }

                    // copyright permission
                    $('#permissionCopyrightNo').prop('checked', false );
                    $('#permissionCopyrightYes').prop('checked', false );

                    if(data.artist_track.permission_copyright == "yes"){
                        $('#permissionCopyrightYes').prop('checked', true );
                    }else if(data.artist_track.permission_copyright == "no"){
                        $('#permissionCopyrightNo').prop('checked', true );
                    }else{
                        $('#permissionCopyrightNo').prop('checked', false );
                        $('#permissionCopyrightYes').prop('checked', false );
                    }

                    // artist track tags
                    if(data.new_curator_features)
                    {
                        // console.log(data.new_curator_features);
                        let count_feature = 1;
                        $.each(data.new_curator_features,function (key, value_feature){

                            $('#editTrackCuratorFeature').append('<div class="row">',
                                '<div class="col s12 m6 l10">',
                                '<h4 class="card-title bold"><span class="text tw-mr-2">'+count_feature+'.</span>'+key+'</h4>',
                                '</div>',
                                '</div><div class="underline"></div><div class="row music"></div>',
                                '<div class="faq row">',
                                '<div class="col s12 m9 l12">',
                                '<div class="features-box-select">',
                                '<select class="form-control-label" name="tag[]" id="'+key+'" placeholder="You can select '+key+'" multiple>',

                                '</select>',
                                '</div>',
                        '</div>',
                        '</div>',
                            );
                            count_feature++;
                        });

                        $.each(data.new_curator_features,function (key, value_feature){
                            new Choices(document.getElementById(key), {
                                removeItemButton: true,
                                choices: value_feature,
                            })
                        })

                    }
                }
            });
        }

        // deleteImagePdf
        function closeModel(name){
            if(name == "imgPdf")
            {
                $('#delete-imgPdf-tag-modal').modal('hide');
            }else if(name == "copyRight"){
                $('#exampleModalCenterEdit').modal('hide');
            }
            $('body').addClass('open-modal');
            $('body').addClass('openModal');
        }

        function deleteImagePdf(id)
        {
            $('.deleteImgPdfTrack').attr('data-img-pdf-id',id);
            $('#delete-imgPdf-tag-modal').modal('show');
        }

        $('#delete_Image_Pdf').click(function (event) {
            event.preventDefault();
            var img_pdf_id = $('.deleteImgPdfTrack').attr('data-img-pdf-id');
            var url= "{{url('/delete-track-image')}}";
            $.ajax({
                type: "DELETE",
                url: url,
                data:{
                    "_token": "{{ csrf_token() }}",
                    "img_pdf_id": img_pdf_id,
                },
                success: function (data) {
                    if(data.success){
                        $('#removeImgPdf-'+img_pdf_id).remove();
                        $('#snackbar').html(data.success);
                        $('#snackbar').addClass("show");
                        setTimeout(function () {
                            $('#snackbar').removeClass("show");
                        }, 5000);
                        $('#delete-imgPdf-tag-modal').modal('hide');
                        $('body').addClass('open-modal');
                        $('body').addClass('openModal');
                    }
                }
            });
        });
        // deleteImagePdf
        document.getElementById('update_track_not').addEventListener('click', function (){
            document.querySelector('#previewLinkEdit').innerHTML = "";
            location.reload();
        });
        function  getInputValueEdit(elem) {

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

            if (match_link == null) {
                toastr.error('Please Add correct url embeded');
                return false;
            }

            if (src) {
                document.querySelector('#previewLinkBlockEdit').style.display = 'block';
                document.querySelector('#previewLinkEdit').innerHTML = "";
                document.querySelector('#previewLinkEdit').innerHTML = src;
            } else {
                toastr.error('Please Add correct url embeded');
                return false;
            }
        }
    </script>
    {{-- Mulple links --}}
    <script type="text/javascript">



        $(document).ready(function(){

            var counter = 2;

            $("#addLinkButton").click(function () {

                if(counter>5){
                    alert("Only 5 Links allow");
                    return false;
                }

                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter);

                newTextBoxDiv.after().html('<div class="col-sm-3 form-control-label text-muted">Add New Link #'+ counter +'</div>' +
                    '<div class="col-sm-9 m-b"> <div class="addEmbeded"><div class="addMoreLinks"><input type="text" class="form-control moreLinks" name="link[]" id="textbox' + counter + '" value="" placeholder="Please Add Embeded Url"></div><div class="previewStart"><a href="javascript:void(0)" class="textbox' + counter + '" id="previewIcon" onclick="getInputValue(this)"><i class="fa fa-eye"></i> preview</a></div></div></div>');

                newTextBoxDiv.appendTo("#TextBoxesGroup");


                counter++;
            });

            $("#removeButton").click(function () {
                if(counter==2){
                    alert("No more textbox to remove");
                    return false;
                }

                counter--;

                $("#TextBoxDiv" + counter).remove();

            });

            // Edit AddLink Button new



            $("#addLinkButtonEdit").on("click",function (e) {
                e.preventDefault();

                let counter_edit = $(this).attr('data-counter');
                counter_edit++;
                if(counter_edit>5){
                    alert("Only 5 Links allow");
                    return false;
                }

                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxEditDiv' + counter_edit);

                newTextBoxDiv.after().html('<div class="col-sm-3 form-control-label text-muted">Add New Link #'+ counter_edit +'</div>' +
                    '<div class="col-sm-9 m-b"> <div class="addEmbeded"><div class="addMoreLinks"><input type="text" class="form-control moreLinks" name="link[]" id="textbox' + counter_edit + '" value="" placeholder="Please Add Embeded Url"></div><div class="previewStart"><a href="javascript:void(0)" class="textbox' + counter_edit + '" id="previewIcon" onclick="getInputValueEdit(this)"><i class="fa fa-eye"></i> preview</a></div></div></div>');

                newTextBoxDiv.appendTo("#TextBoxesGroupEdit");

                // counter_edit++;
                $('.addLinkButtonEdit').attr('data-counter','');
                $('.addLinkButtonEdit').attr('data-counter',counter_edit);
                $('.removeButtonEdit').attr('data-counter','');
                $('.removeButtonEdit').attr('data-counter',counter_edit);
            });

            $("#removeButtonEdit").on("click",function (e) {
                e.preventDefault();
                let counter_edit = $(this).attr('data-counter');

                if(counter_edit==1){
                    alert("No more textbox to remove");
                    return false;
                }
                $("#TextBoxEditDiv" + counter_edit).remove();

                counter_edit--;
                $('.addLinkButtonEdit').attr('data-counter','');
                $('.addLinkButtonEdit').attr('data-counter',counter_edit);
                $('.removeButtonEdit').attr('data-counter','');
                $('.removeButtonEdit').attr('data-counter',counter_edit);

            });
        });
    </script>

    <script>
        // Delete Track Model
        function deleteTrack(track_id){
            $('.deleteTrack').attr('data-track-id',track_id);
        }
        $('#delete_track').click(function (event) {
            event.preventDefault();
            var track_id = $('.deleteTrack').attr('data-track-id');
            var url= "{{url('/delete-track')}}/"+track_id;
            $.ajax({
                type: "DELETE",
                url: url,
                data:{
                    "_token": "{{ csrf_token() }}",
                    "track_id": track_id,
                },
                success: function (data) {
                    if(data.success){
                        // $('#ShowVehicleMsg').html('<div class="card-alert card green lighten-5 remove_message"><div class="card-content green-text"><p>'+data.success+'</p></div><button type="button" class="close red-text" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>')
                        $('#remove_track-'+track_id).remove();
                        $('#snackbar').html(data.success);
                        $('#snackbar').addClass("show");
                        setTimeout(function () {
                            $('#snackbar').removeClass("show");

                        }, 5000);
                    }
                }
            });
        });
        // requestEdit Track Model
        function requestEditTrack(track_id){
            $('.trackID').val(track_id);
        }
    </script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>

{{--    <script>--}}
{{--        // Change Artist password--}}
{{--        $('#changePasswordArtist').on('submit', function(e){--}}
{{--            e.preventDefault();--}}

{{--            $.ajax({--}}
{{--                url:$(this).attr('action'),--}}
{{--                method:$(this).attr('method'),--}}
{{--                data:new FormData(this),--}}
{{--                processData:false,--}}
{{--                dataType:'json',--}}
{{--                contentType:false,--}}
{{--                beforeSend:function(){--}}
{{--                    $(document).find('span.error-text').text('');--}}
{{--                },--}}
{{--                success:function(data){--}}
{{--                    if(data.status == 0){--}}
{{--                        $.each(data.error, function(prefix, val){--}}
{{--                            $('span.'+prefix+'_error').text(val[0]);--}}
{{--                        });--}}
{{--                    }else{--}}
{{--                        document.getElementById('change-password').style.display = 'none';--}}
{{--                        $('#changePasswordArtist')[0].reset();--}}
{{--                        $('#snackbar').html(data.msg);--}}
{{--                        $('#snackbar').addClass("show");--}}
{{--                        setTimeout(function () {--}}
{{--                            $('#snackbar').removeClass("show");--}}

{{--                        }, 5000);--}}
{{--                        // alert(data.msg);--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--        document.getElementById('closeChangeArtistPassword').addEventListener('click', function (){--}}
{{--            document.querySelector('#changePasswordArtist').reset();--}}
{{--        });--}}
{{--    </script>--}}

    {{-- add track --}}
    <script>
        $('.audioCover').on('click', function(){
            var $box = $(this);
            if($box.is(':checked'))
            {
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                $(group).prop('checked', false);
                $box.prop("checked", true);
            }else {
                $box.prop("checked", false);
            }
        });
        $('.releaseType').on('click', function(){
            var $box = $(this);
            if($box.is(':checked'))
            {
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                $(group).prop('checked', false);
                $box.prop("checked", true);
            }else {
                $box.prop("checked", false);
            }
        });
        $('.permissionCopyright').on('click', function(){
            var $box = $(this);
            if($box.is(':checked'))
            {
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                $(group).prop('checked', false);
                $box.prop("checked", true);
            }else {
                $box.prop("checked", false);
            }
        });
    </script>

    <script src="{{asset('app-assets/js/artist/artist.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {

            $('.ckeditor').ckeditor();

        });
    </script>
{{--    Promote to track redirect and checked track--}}
    <script>
        function promoteTrackRedirect(track_id)
        {
            window.open(
                window.location.origin + '/promote-your-track/?track_id='+track_id,
                '_self' // <- This is what makes it open in a new window.
            );
        }
    </script>
{{--    Promote to track redirect and checked track--}}

{{--    Public Profile Display--}}
    <script>
        $('#changePublicProfile').on('change', function() {
            let checked = $(this).is(':checked')
            if(checked == 'true'){
                var data = checked;
            }else{
                var data = checked;
            }
            var url = "{{route('artist.change.public.profile')}}";
            $.ajax({
                type: "POST",
                url: url,
                data:{
                    "_token": "{{ csrf_token() }}",
                    "is_public_profile": data,
                },
                success: function (data) {
                    if(data.success){
                        if(data.is_public_profile == 0)
                        {
                            $('#Public_Profile').css('display', 'none');
                        }else{
                            $('#Public_Profile').css('display', 'inline-block');
                        }
                        $('#snackbar').html(data.success);
                        $('#snackbar').addClass("show");
                        setTimeout(function () {
                            $('#snackbar').removeClass("show");
                        }, 5000);
                    }
                }
            });
        });
    </script>
{{--    Public Profile Display--}}

    {{--    Notification Display--}}
    <script>
        function sendMarkRequest(id = null) {
            return $.ajax("{{ route('artist.markNotification') }}", {
                method: 'POST',

                data: {
                    _token: '{{ csrf_token() }}',
                    id
                }
            });
        }
        $('.mark-as-read').click(function() {
            let request = sendMarkRequest($(this).data('id'));
            request.done(() => {
                location.reload();
                // $(this).parents('div.alert').remove();
            });
        });
        $('#mark-all').click(function() {
            let request = sendMarkRequest();
            request.done(() => {
                location.reload();
            })
        });
        function sendNotifySubmit()
        {
            var form = document.getElementById("form-notification");
            form.submit();
        }
    </script>
    {{--    Notification Display--}}

@endsection
