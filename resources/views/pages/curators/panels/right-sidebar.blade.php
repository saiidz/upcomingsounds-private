<div class="col-lg-{{(Request::is('dashboard') == 'true') ? 5 : 3}} w-xxl w-auto-md">
    <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
        @if(Request::is('dashboard') == 'true')
            <div id="coverageCurator" class="m-b" style="background-color: #373a3c;">
                <div class="padding">
                    <h6 class="text-center text-white">Your Monthly Activity</h6>
                    <span class="text">
                    <div class="text-center text-white">
                        <span class="amount">0 USC</span>
                        <img class="icon_UP" style="width:25px; height:25px;" src="{{asset('images/coin_bg.png')}}">
                    </div>
                </span>
                    <div class="row item-list item-list-sm m-b">
                        <div class="col-xs-12">
                            <div class="item r">
                                <div class="progress" style="overflow: unset !important;">
                                    <div style="justify-content: space-between !important;align-items: center !important;display: flex !important;">
                                        <div>
                                            <span class="text-white">0</span>
                                            <img class="icon_UP" style="width:10px; height:10px;" src="{{asset('images/coin_bg.png')}}">
                                        </div>
                                        <div>
                                            <span class="text-white">25</span>
                                            <img class="icon_UP" style="width:10px; height:10px;" src="{{asset('images/coin_bg.png')}}">
                                        </div>
                                        <div>
                                            <span class="text-white">45</span>
                                            <img class="icon_UP" style="width:10px; height:10px;" src="{{asset('images/coin_bg.png')}}">
                                        </div>
                                        <div>
                                            <span class="text-white">63</span>
                                            <img class="icon_UP" style="width:10px; height:10px;" src="{{asset('images/coin_bg.png')}}">
                                        </div>
                                        <div>
                                            <span class="text-white">79</span>
                                            <img class="icon_UP" style="width:10px; height:10px;" src="{{asset('images/coin_bg.png')}}">
                                        </div>
                                        <div>
                                            <span class="text-white">91</span>
                                            <img class="icon_UP" style="width:10px; height:10px;" src="{{asset('images/coin_bg.png')}}">
                                        </div>

                                    </div>
{{--                                    primary
danger
primary
info--}}
                                    <div class="progress-bar progressBar grey-50" style="width: 19%; height:30px !important;margin-right: 2px; padding-top: 5px;">25%</div>
                                    <div class="progress-bar progressBar grey-50" style="width: 19%; height:30px !important;margin-right: 2px; padding-top: 5px;">45%</div>
                                    <div class="progress-bar progressBar grey-50" style="width: 19%; height:30px !important;margin-right: 2px; padding-top: 5px;">63%</div>
                                    <div class="progress-bar progressBar grey-50" style="width: 19%; height:30px !important;margin-right: 2px; padding-top: 5px;">79%</div>
                                    <div class="progress-bar progressBar grey-50" style="width: 19%; height:30px !important;margin-right: 2px; padding-top: 5px;">91%</div>
                                </div>
                                <div class="text-white m-t-3">
                                    <p>You are 0% to your next pay level</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--                <div class="row item-list item-list-sm m-b">--}}
                    {{--                    <div class="col-xs-12">--}}
                    {{--                        <div class="item r" data-id="item-3"--}}
                    {{--                             data-src="">--}}
                    {{--                            <div class="item-media ">--}}
                    {{--                                <a href="javascript:void(0)" class="item-media-content"--}}
                    {{--                                   style="background-image: url('images/b2.jpg');"></a>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="item-info">--}}
                    {{--                                <div class="item-title text-ellipsis">--}}
                    {{--                                    <a href="javascript:void(0)">I Wanna Be In the Cavalry</a>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="item-author text-sm text-ellipsis ">--}}
                    {{--                                    <a href="javascript:void(0)" class="text-muted">Jeremy Scott</a>--}}
                    {{--                                </div>--}}


                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}

                </div>
            </div>
        @endif


        @if (Auth::check() && auth()->user())
                @if (auth()->user()->is_verified == 1)
{{--                    <div class="getVerified">--}}
{{--                        <span class="btn btn-sm rounded primary m-b-2 text-white">get verified</span>--}}
{{--                    </div>--}}
                @else
                    <div class="getVerified" id="getNoVerified" style="display: none;">
                        <a class="btn btn-sm rounded primary m-b-2 text-white" href="{{ route('curator.get.verified') }}">get verified</a>
                    </div>
                @endif
            @if (!empty(auth()->user()->getReferrals()))
                @forelse(auth()->user()->getReferrals() as $referral)
                <div class="bgGradient">
                    <h6 class="text text-muted">Referral Program</h6>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <p>BE A PART OF THE GROWTH OF OUR COMMUNITY!
                                By referring artists to our platform, you will be able to help them develop their career program and earn 10 USC or the equivalent in British pounds per sign-up.
                                You can help them sign up by sending them this link:</p>
                        </div>
                    </div>
                    <h6 class="text text-muted">Referral Link</h6>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input id="tastemaker_name" class="form-control" value="{{ $referral->link }}">
                        </div>
                    </div>
                    @php
                    $relationships = \App\Models\ReferralRelationship::where('referral_link_id',$referral->id)->get();
                    $count = 0;
                    foreach ($relationships as $key => $relationship)
                    {
                        $key = 1;
                        if(!empty($relationship->campaign))
                        {
                            $count+= $key;
                        }
                    }
                    @endphp
                    <p>
                        Number of referred users: {{ $count }}
{{--                        Number of referred users: {{ $referral->relationships()->count() }}--}}
                    </p>
                    <p>*Earning potential based on referrals depending on the artist membership package purchased.</p>
                </div>
                @empty
                    No referrals
                @endforelse
            @endif
        @endif

        {{-- <h6 class="text text-muted">Go mobile</h6>
        <div class="btn-groups">
            <a href="" class="btn btn-sm dark lt m-r-xs" style="width: 135px">
                <span class="pull-left m-r-sm">
                    <i class="fa fa-apple fa-2x"></i>
                </span>
                <span class="clear text-left l-h-1x">
                    <span class="text-muted text-xxs">Download on the</span>
                    <b class="block m-b-xs">App Store</b>
                </span>
            </a>
            <a href="" class="btn btn-sm dark lt" style="width: 133px">
                <span class="pull-left m-r-sm">
                    <i class="fa fa-play fa-2x"></i>
                </span>
                <span class="clear text-left l-h-1x">
                    <span class="text-muted text-xxs">Get it on</span>
                    <b class="block m-b-xs m-r-xs">Google Play</b>
                </span>
            </a>
        </div> --}}
        <div class="b-b m-y"></div>
        <div class="nav text-sm _600">
            <a href="{{ url('about-us') }}" class="nav-link text-muted m-r-xs">About</a>
            <a href="{{ url('contact-us') }}" class="nav-link text-muted m-r-xs">Contact</a>
            <a href="{{ url('term-of-service') }}" class="nav-link text-muted m-r-xs">Term of Service</a>
            {{-- <a href="#" class="nav-link text-muted m-r-xs">Legal</a> --}}
            <a href="{{ url('privacy-policy') }}" class="nav-link text-muted m-r-xs">Policy Privacy</a>
        </div>
        <p class="text-muted text-xs p-b-lg">&copy; Copyright {{ date('Y') }}</p>
    </div>
</div>
