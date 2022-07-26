@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Curator Profile')

@section('page-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/gijgo.min.css')}}" type="text/css" />
    <style>
        #loadings {
            background: rgba(255, 255, 255, .4) url({{asset('images/loader.gif')}}) no-repeat center center !important;
        }
        .red-text{
            color:red !important;
        }
        .collapsible-header.features_tAgs {
            color: #000 !important;
        }
        ul.ks-cboxtags li .pleaseAny {
            background-color: red !important;
            color: white !important;
        }
    </style>
@endsection

@section('content')
    <!-- ############ PAGE START-->
<!-- ############ PAGE START-->
<div class="page-bg" data-stellar-ratio="2" style="background-image: url({{asset('images/a3.jpg')}});"></div>
<div class="page-content">
    <div class="padding b-b">
        <div class="row-col">
            <div class="col-sm w w-auto-xs m-b">
                <div class="item w rounded">
                    <div class="item-media">
                        @php
                            $mystring = $user_curator->profile;
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
                            @if(!empty($user_curator->profile))
                                <div class="item-media-content" id="upload_profile"
                                     style="background-image: url({{URL('/')}}/uploads/profile/{{$user_curator->profile}});"></div>
                            @else
                                <div class="item-media-content" id="upload_profile"
                                     style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                            @endif
                        @elseif($pos == 0)
                            <div class="item-media-content" id="upload_profile"
                                 style="background-image: url({{$user_curator->profile}});"></div>
                        @else
                            <div class="item-media-content" id="upload_profile"
                                 style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                        @endif

                    </div>
                </div>
                <div>
                    @if (!empty($user_curator->curatorUser->curator_bio))
                        <div class="page-title m-b">
                            <h4 class="inline m-a-0 biO" style="font-size: ">Bio</h4>
                        </div>
                        <p id="bioInfo" class="text-muted">{{Str::limit($user_curator->curatorUser->curator_bio, 50)}}</p>
                        <a href="javascript:void(0)" class="seeMoreBio" onclick="seeMoreBio()">See more</a>
                    @endif
                </div>
            </div>
            <div class="col-sm">
                <div class="p-l-md no-padding-xs">
                    <h1 class="page-title">
                        <span class="h1 _800">{{($user_curator) ? $user_curator->name : ''}}
                            @if ($user_curator->is_verified == 1)
                                <img src="{{ asset('images/verified_icon.svg') }}" style="width: 22px;" alt="">
                            @endif
                        </span>
                    </h1>
                    <p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis">
                        @if(!empty($user_curator->curatorUser->curator_signup_from))
                            {{Str::upper ($user_curator->curatorUser->curator_signup_from)}}
                        @endif
                    </p>

                    @if(!empty($user_curator->curatorUser->country))
                        <div class="block flag_style clearfix m-b">
                            <img class="flag_icon" src="{{asset('images/flags')}}/{{$user_curator->curatorUser->country->flag_icon}}.png" alt="{{$user_curator->curatorUser->country->flag_icon}}">
{{--                                        @foreach($countries_flag as $flag)--}}
{{--                                            @if($flag['iso_a2'] == $user_curator->artistUser->country->iso2)--}}
{{--                                                {!! $flag->flag['flag-icon'] !!}--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
                            <span class="text-muted"
                                  style="font-size:15px">{{($user_curator->curatorUser->country) ? $user_curator->curatorUser->country->name : ''}}</span>
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

                    {{-- <div class="block clearfix m-b">
                        <span>9</span> <span class="text-muted">Albums</span>,
                        @if(!empty($artist_track_count) && $artist_track_count !== 0)
                        <span>{{ $artist_track_count  }}</span> <span
                            class="text-muted">Tracks</span>
                        @endif
                    </div> --}}
                    <div class="row-col m-b">
                        <div class="col-xs">
                            @if(!empty($user_curator->curatorUser->instagram_url))
                                <a href="{{$user_curator->curatorUser->instagram_url}}" target="_blank"
                                   class="btn btn-icon btn-social rounded btn-social-colored light-blue-800"
                                   title="Instagram">
                                    <i class="fa fa-instagram"></i>
                                    <i class="fa fa-instagram"></i>
                                </a>
                            @endif
                            @if(!empty($user_curator->curatorUser->facebook_url))
                                <a href="{{$user_curator->curatorUser->facebook_url}}" target="_blank"
                                   class="btn btn-icon btn-social rounded btn-social-colored indigo"
                                   title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                    <i class="fa fa-facebook"></i>
                                </a>
                            @endif
                            @if(!empty($user_curator->curatorUser->spotify_url))
                                <a href="{{$user_curator->curatorUser->spotify_url}}" target="_blank"
                                   class="btn btn-icon btn-social rounded btn-social-colored light-green-500"
                                   title="Spotify">
                                    <i class="fa fa-spotify"></i>
                                    <i class="fa fa-spotify"></i>
                                </a>
                            @endif
                            @if(!empty($user_curator->curatorUser->soundcloud_url))
                                <a href="{{$user_curator->curatorUser->soundcloud_url}}" target="_blank"
                                   class="btn btn-icon btn-social rounded btn-social-colored orange-700"
                                   title="SoundCloud">
                                    <i class="fa fa-soundcloud"></i>
                                    <i class="fa fa-soundcloud"></i>
                                </a>
                            @endif
                            @if(!empty($user_curator->curatorUser->youtube_url))
                                <a href="{{$user_curator->curatorUser->youtube_url}}" target="_blank"
                                   class="btn btn-icon btn-social rounded btn-social-colored red-600"
                                   title="Youtube">
                                    <i class="fa fa-youtube"></i>
                                    <i class="fa fa-youtube"></i>
                                </a>
                            @endif
                            @if(!empty($user_curator->curatorUser->website_url))
                                <a href="{{$user_curator->curatorUser->website_url}}" target="_blank"
                                   class="btn btn-icon btn-social rounded btn-social-colored"
                                   style="background-color:#333;" title="Website">
                                    <i class="fa fa-link"></i>
                                    <i class="fa fa-link"></i>
                                </a>
                            @endif
                            @if(!empty($user_curator->curatorUser->deezer_url))
                                <a href="{{$user_curator->curatorUser->deezer_url}}" target="_blank"
                                   class="btn btn-icon btn-social rounded btn-social-colored"
                                   style="background-color:#eb9d00;" title="Deezer">
                                    {{--                                                <span class="iconify" data-icon="fa-brands:deezer"></span>--}}
                                    <i class="iconify" data-icon="fa-brands:deezer"></i>
                                </a>
                            @endif
                            @if(!empty($user_curator->curatorUser->apple_url))
                                <a href="{{$user_curator->curatorUser->apple_url}}" target="_blank"
                                   class="btn btn-icon btn-social rounded btn-social-colored"
                                   style="background-color:#333;" title="Bandcamp">
                                    <i class="fa fa-apple"></i>
                                    <i class="fa fa-apple"></i>
                                </a>
                            @endif
                            @if(!empty($user_curator->curatorUser->tiktok_url))
                                <a href="{{$user_curator->curatorUser->tiktok_url}}" target="_blank"
                                   class="btn btn-icon btn-social rounded btn-social-colored"
                                   style="background-color:#333;" title="Tiktok">
                                   <i class="fab fa-tiktok"></i>
                                    <i class="fab fa-tiktok"></i>
                                    {{-- <i class="iconify" data-icon="fa-brands:tiktok"></i> --}}
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
                               data-target="#profile">Profile</a>
                        </li>
                        <li class="nav-item m-r inline">
                            <a class="nav-link RemoveUpload" href="#" data-toggle="tab"
                               data-target="#stats">Stats</a>
                        </li>
                        <li class="nav-item m-r inline">
                            <a class="nav-link RemoveUpload" href="#" data-toggle="tab"
                               data-target="#track">Tracks</a>
                        </li>
                        <li class="nav-item m-r inline">
                            <a class="nav-link RemoveUpload" href="#" data-toggle="tab"
                               data-target="#playlist">Lists</a>
                        </li>
                        <li class="nav-item m-r inline">
                            <a class="nav-link RemoveUpload" href="#" data-toggle="tab"
                               data-target="#notification-center">Notification Center</a>
                        </li>
                        <li class="nav-item m-r inline" id="EditProfileTapShow" style="display:none;">
                            <a class="nav-link"  id="EditProfile" href="#" data-toggle="tab"
                               data-target="#edit-profile">Edit Profile</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    {{--               Curator Profile                     --}}
                    <div class="tab-pane active" id="profile">
                        @include('pages.curators.curator-profile-panels.curator-show-profile')
                    </div>
                    {{--               Curator Profile                     --}}

                    {{--               Curator Stats                     --}}
                    <div class="tab-pane" id="stats">
                        @include('pages.curators.curator-profile-panels.curator-stats')
                    </div>
                    {{--               Curator Stats                     --}}

                    {{--               Curator Tracks                     --}}
                    <div class="tab-pane" id="track">
                        @include('pages.curators.curator-profile-panels.curator-tracks')
                    </div>
                    {{--               Curator Tracks                     --}}

                    {{--               Curator Playlist                     --}}
                    <div class="tab-pane" id="playlist">
                        @include('pages.curators.curator-profile-panels.curator-list')
                    </div>
                    {{--               Curator Playlist                     --}}

                    {{--               Curator Notification Center                     --}}
                    <div class="tab-pane" id="notification-center">
                        @include('pages.curators.curator-profile-panels.curator-notification-center')
                    </div>
                    {{--               Curator Notification Center                     --}}

                    {{--               Curator Update Profile                     --}}
                    <div class="tab-pane" id="edit-profile">
                        {{-- curator-edit-profile --}}
                        @include('pages.curators.curator-profile-panels.curator-edit-profile')
                    </div>
                    {{--               Curator Update Profile                     --}}
                </div>
            </div>
        </div>
        @include('pages.curators.panels.right-sidebar')
    </div>
</div>
    <!-- ############ PAGE END-->
@endsection

@section('page-script')

<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="{{asset('js/gijgo.min.js')}}"></script>
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
            console.log(this.files[0]);
            // Preloader
            // $("#loading").delay(700).fadeOut("slow");
            // return false;
            showLoader();
            $.ajax({
                type: 'POST',
                url: "{{ url('/upload-curator-profile')}}",
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

    // addMoreClassic
    function addMoreClassic(id)
    {
        $('#curatorFeatureId').val(id);
        $('#addMoreClassic').modal('show');
    }
    // delete tag feature
    function deleteTagCurator(feature_id)
    {
        $('.deleteTagCurator').attr('data-feature-id',feature_id);
        $('#delete-feature-tag-modal').modal('show');
    }
    $('#delete_FeatureTag').click(function (event) {
            event.preventDefault();
            var feature_id = $('.deleteTagCurator').attr('data-feature-id');
            var url= "{{url('/delete-feature-tag')}}";
            $.ajax({
                type: "DELETE",
                url: url,
                data:{
                    "_token": "{{ csrf_token() }}",
                    "feature_id": feature_id,
                },
                success: function (data) {
                    if(data.success){
                        $('#remove_feature-'+feature_id).remove();
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

<script>

    var curator_bio = {!! json_encode($user_curator->curatorUser->curator_bio) !!};
    if(curator_bio)
    {
        // var counter = 0
        function seeMoreBio()
        {
            // counter += 1
            // if(counter == 2)
            // {
            //     $('#bioInfo').empty();
            //     $('#bioInfo').text(curator_bio.substring(0,50) + '.....');
            //     // $('#bioInfo').html(curator_bio);
            // }
            $('#bioInfo').empty();
            $('#bioInfo').html(curator_bio);
        }
    }
</script>
@endsection
