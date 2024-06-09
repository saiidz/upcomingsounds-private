@extends('pages.artists.panels.layout')

{{-- page title --}}
@section('title','Verified Content Creator Curator')


@section('content')
    <!-- ############ PAGE START-->

    <div class="page-content">
        <div class="row-col">
            <div class="col-lg-9 b-r no-border-md">
                <div class="padding">
                    <div class="page-title m-b">
                        <h1 class="inline m-a-0 titleColor">Verified Content Creator</h1>
                    </div>
                    <div class="row item-list item-list-by m-b">
                        @if(!empty($verifiedContentCreatorCurators) && count($verifiedContentCreatorCurators) > 0)
                            @foreach($verifiedContentCreatorCurators as $verifiedContentCreatorCurator)
                                <div class="col-xs-12 remove_offer m-b" id="remove_offer-{{$verifiedContentCreatorCurator->id}}">
                                    <div class="item r Item" data-id="item-{{$verifiedContentCreatorCurator->id}}">
                                        <div class="item-media">
                                            @php
                                                $mystring = $verifiedContentCreatorCurator->userCurator->profile;
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
                                                @if(!empty($verifiedContentCreatorCurator->userCurator->profile))
                                                    <div class="item-media-content" id="upload_profile"
                                                         style="background-image: url({{URL('/')}}/uploads/profile/{{$verifiedContentCreatorCurator->userCurator->profile}});"></div>
                                                @else
                                                    <div class="item-media-content" id="upload_profile"
                                                         style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                                                @endif
                                            @elseif($pos == 0)
                                                <div class="item-media-content" id="upload_profile"
                                                     style="background-image: url({{$verifiedContentCreatorCurator->userCurator->profile}});"></div>
                                            @else
                                                <div class="item-media-content" id="upload_profile"
                                                     style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                                            @endif
                                        </div>
                                        <div class="item-info">
                                            <div class="bottom text-right">
                                                @if($verifiedContentCreatorCurator->pay_now == 'yes')
                                                    <span style="color:#02b875 !important">Status: </span><span class="text-primary">{{__('PAID')}}</span>
                                                @endif
                                            </div>
                                            <div class="item-title text-ellipsis">
                                                <span class="text-muted">{{!empty($verifiedContentCreatorCurator->userCurator) ? $verifiedContentCreatorCurator->userCurator->name : '----'}}</span>
                                            </div>
                                            <div class="item-author text-sm text-ellipsis hide">
                                            </div>
                                            <div class="item-meta text-sm text-muted">
                                                <span class="item-meta-date text-xs">{{($verifiedContentCreatorCurator->created_at) ? \Carbon\Carbon::parse($verifiedContentCreatorCurator->created_at)->format('M d Y') : ''}}</span>
                                            </div>

                                            <div class="m-t-sm offerAlternative">
                                                <div>
                                                    <span style="color:#02b875 !important">Contribution: </span><span class="btn btn-xs white">{{($verifiedContentCreatorCurator->verifiedCoverage->contribution) ? $verifiedContentCreatorCurator->verifiedCoverage->contribution : '----'}}</span>
                                                </div>
                                                <div>
                                                    <span style="color:#02b875 !important">Offer Type: </span><span class="btn btn-xs white">{{!empty($verifiedContentCreatorCurator->verifiedCoverage->offerType->name) ? $verifiedContentCreatorCurator->verifiedCoverage->offerType->name : '----'}}</span>
                                                </div>
                                                <div>
                                                    <span style="color:#02b875 !important">Time To Publish: </span><span class="btn btn-xs white">{{($verifiedContentCreatorCurator->verifiedCoverage->time_to_publish) ? $verifiedContentCreatorCurator->verifiedCoverage->time_to_publish . ' days for coverage' : '----'}}</span>
                                                </div>
                                            </div>
                                            <div class="m-t-sm campaignBtn" style="display:flex">
                                                <form id="form-verified{{$verifiedContentCreatorCurator->id}}" action="{{route('curator.coverage.verified.show',encrypt($verifiedContentCreatorCurator->id))}}">
                                                    <a href="javascript:void(0)" class="btn btn-xs white" onclick="verifiedContentCreatorCuratorShow({{$verifiedContentCreatorCurator->id}})" id="offerTemplateEdit">View Offer</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @include('pages.curators.__not-found-records')
                        @endif
                    </div>
                </div>
            </div>
            @include('pages.artists.panels.right-sidebar')
        </div>
    </div>

    <!-- ############ PAGE END-->
@endsection

