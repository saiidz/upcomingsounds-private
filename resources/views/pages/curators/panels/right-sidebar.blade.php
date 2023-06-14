<div class="col-lg-{{(Request::is('dashboard') == 'true') ? 5 : 3}} w-xxl w-auto-md">
    <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
        @if(Request::is('dashboard') == 'true')
            <div id="coverageCurator" class="m-b" style="background-color: #373a3c;">
                <div class="padding">
                    <h6 class="text-center text-white">Your Monthly Activity</h6>
                    @php
                        $countSubmitCoverages = !empty($submitCoverages) ? $submitCoverages->count() : 0;
//                                                                $countSubmitCoverages = \App\Templates\ITiers::T_ONE;

                        // tier one
                        $tiersOne = \App\Templates\ITiers::TEARS_ONE;
                        $tOne = rtrim(floatval(round($tiersOne/3)), '.0'); // Output: 167
//                        dump($tOne);

                        // tier two
                        $tiersTwo = \App\Templates\ITiers::TEARS_TWO;
                        $tTwo = rtrim(floatval(round($tiersTwo/3)), '.0'); // Output: 133
//                                        dump($tTwo);

                        // tier three
                        $tiersThree = \App\Templates\ITiers::TEARS_THREE;
                        $tThree = $tiersThree/3; // Output: 100
//                                        dump($tThree);

                        // tier four
                        $tiersFour = \App\Templates\ITiers::TEARS_FOUR;
                        $tFour = rtrim(floatval(round($tiersFour/3)), '.0'); // Output: 67
//                                        dump($tFour);

                        // tier five
                        $tiersFive = \App\Templates\ITiers::TEARS_FIVE;
                        $tFive = $tiersFive/3; // Output: 50
//                                        dump($tFive);

                        //$sum = 34 + 33 + 33;

                    @endphp
                    <span class="text">
                    <div class="text-center text-white">
                        @if($countSubmitCoverages >= \App\Templates\ITiers::TEARS_ONE && $countSubmitCoverages < 900)
                            @if($countSubmitCoverages >= 500)
                                <span class="amount activeAmount" >25</span> USC {{--25--}}
                            @else
                                <span class="amount">0 USC</span>
                            @endif
                        @elseif($countSubmitCoverages >= 900 && $countSubmitCoverages < 1200)
                            @if($countSubmitCoverages >= 900)
                                <span class="amount activeAmount" >45</span> USC {{--25+20=45--}}
                            @else
                                <span class="amount">0 USC</span>
                            @endif
                        @elseif($countSubmitCoverages >= 1200 && $countSubmitCoverages < 1400)
                            @if($countSubmitCoverages >= 1200)
                                <span class="amount activeAmount" >63 USC</span> {{--25+20+18=63--}}
                            @else
                                <span class="amount">0 USC</span>
                            @endif
                        @elseif($countSubmitCoverages >= 1400 && $countSubmitCoverages < 1550)
                            @if($countSubmitCoverages >= 1400)
                                <span class="amount activeAmount" >79</span> USC {{--25+20+18+16=79--}}
                            @else
                                <span class="amount">0 USC</span>
                            @endif
                        @elseif($countSubmitCoverages <= 1550)
                            @if($countSubmitCoverages >= 1550)
                                <span class="amount activeAmount" >91</span> USC {{--25+20+18+16+12=91--}}
                            @else
                                <span class="amount">0 USC</span>
                            @endif
                        @else
                            <span class="amount">0 USC</span>
                        @endif
                        <img class="icon_UP" style="width:25px; height:25px;" src="{{asset('images/coin_bg.png')}}">
                    </div>
                </span>
                    <div class="row item-list item-list-sm m-b">
                        <div class="col-xs-12">
                            <div class="item r">
                                <div class="progress" style="overflow: unset !important;">
                                    <div
                                        style="justify-content: space-between !important;align-items: center !important;display: flex !important;">
                                        <div>
                                            <span class="text-white">0</span>
                                            <img class="icon_UP" style="width:10px; height:10px;"
                                                 src="{{asset('images/coin_bg.png')}}">
                                        </div>
                                        <div>
                                            <span class="text-white">25</span>
                                            <img class="icon_UP" style="width:10px; height:10px;"
                                                 src="{{asset('images/coin_bg.png')}}">
                                        </div>
                                        <div>
                                            <span class="text-white">45</span>
                                            <img class="icon_UP" style="width:10px; height:10px;"
                                                 src="{{asset('images/coin_bg.png')}}">
                                        </div>
                                        <div>
                                            <span class="text-white">63</span>
                                            <img class="icon_UP" style="width:10px; height:10px;"
                                                 src="{{asset('images/coin_bg.png')}}">
                                        </div>
                                        <div>
                                            <span class="text-white">79</span>
                                            <img class="icon_UP" style="width:10px; height:10px;"
                                                 src="{{asset('images/coin_bg.png')}}">
                                        </div>
                                        <div>
                                            <span class="text-white">91</span>
                                            <img class="icon_UP" style="width:10px; height:10px;"
                                                 src="{{asset('images/coin_bg.png')}}">
                                        </div>

                                    </div>

                                    {{-- First Tiers --}}
                                    <div class="progress-bar progressBar grey-50"
                                         style="width: 19%; height:30px !important;margin-right: 2px;">
                                        @if($countSubmitCoverages <= \App\Templates\ITiers::TEARS_ONE)
                                            @if($countSubmitCoverages >= $tOne && $countSubmitCoverages <= 334)
                                                <div class="yellow"
                                                     style="width: 25%; height:30px !important; padding-top: 5px;"></div>
                                            @elseif($countSubmitCoverages >= 334 && $countSubmitCoverages != 500) {{-- 167+167=334 --}}
                                                <div class="red"
                                                     style="width: 75%; height:30px !important; padding-top: 5px;"></div>
                                            @elseif($countSubmitCoverages >= 500) {{-- 167+167+166=500 --}}
                                                <div class="green"
                                                     style="width: 100%; height:30px !important; padding-top: 5px;"></div>
                                            @else
                                                <div class="grey-50"
                                                     style="width: 25%; height:30px !important; padding-top: 5px;"></div>
                                            @endif
                                        @else
                                            <div class="green"
                                                 style="width: 100%; height:30px !important; padding-top: 5px;"></div>
                                        @endif
                                    </div>

                                    {{-- Second Tiers --}}
                                    <div class="progress-bar progressBar grey-50"
                                         style="width: 19%; height:30px !important;margin-right: 2px;">
                                        @if($countSubmitCoverages <= 900) {{-- 500+400 =900 --}}
                                            @if($countSubmitCoverages >= 633 && $countSubmitCoverages <= 766)
                                                <div class="yellow"
                                                     style="width: 25%; height:30px !important; padding-top: 5px;"></div>
                                            @elseif($countSubmitCoverages >= 766 && $countSubmitCoverages != 900) {{-- 500+400=334 --}}
                                                <div class="red"
                                                     style="width: 75%; height:30px !important; padding-top: 5px;"></div>
                                            @elseif($countSubmitCoverages >= 900) {{-- 500+400=900 --}}
                                                <div class="green"
                                                     style="width: 100%; height:30px !important; padding-top: 5px;"></div>
                                            @else
                                                <div class="grey-50"
                                                     style="width: 25%; height:30px !important; padding-top: 5px;"></div>
                                            @endif
                                        @else
                                            <div class="green"
                                                 style="width: 100%; height:30px !important; padding-top: 5px;"></div>
                                        @endif
                                    </div>

                                    {{-- Third Tiers --}}
                                    <div class="progress-bar progressBar grey-50"
                                         style="width: 19%; height:30px !important;margin-right: 2px;">
                                        @if($countSubmitCoverages <= 1200) {{-- 900+300 =1200 --}}
                                            @if($countSubmitCoverages >= 1000 && $countSubmitCoverages <= 1100)
                                                <div class="yellow"
                                                     style="width: 25%; height:30px !important; padding-top: 5px;"></div>
                                            @elseif($countSubmitCoverages >= 1100 && $countSubmitCoverages != 1200) {{-- 167+167=334 --}}
                                            <div class="red"
                                                 style="width: 75%; height:30px !important; padding-top: 5px;"></div>
                                            @elseif($countSubmitCoverages >= 1200) {{-- 167+167+166=500 --}}
                                            <div class="green"
                                                 style="width: 100%; height:30px !important; padding-top: 5px;"></div>
                                            @else
                                                <div class="grey-50"
                                                     style="width: 25%; height:30px !important; padding-top: 5px;"></div>
                                            @endif
                                        @else
                                            <div class="green"
                                                 style="width: 100%; height:30px !important; padding-top: 5px;"></div>
                                        @endif
                                    </div>

                                    {{-- Four Tiers --}}
                                    <div class="progress-bar progressBar grey-50"
                                         style="width: 19%; height:30px !important;margin-right: 2px;">
                                        @if($countSubmitCoverages <= 1400) {{-- 1200+200 =1400 --}}
                                            @if($countSubmitCoverages >= 1267 && $countSubmitCoverages <= 1334)
                                                <div class="yellow"
                                                     style="width: 25%; height:30px !important; padding-top: 5px;"></div>
                                            @elseif($countSubmitCoverages >= 1334 && $countSubmitCoverages != 1400) {{-- 1200+200 =1400 --}}
                                                <div class="red"
                                                     style="width: 75%; height:30px !important; padding-top: 5px;"></div>
                                            @elseif($countSubmitCoverages >= 1400) {{-- 1200+200 =1400 --}}
                                                <div class="green"
                                                     style="width: 100%; height:30px !important; padding-top: 5px;"></div>
                                            @else
                                                <div class="grey-50"
                                                     style="width: 25%; height:30px !important; padding-top: 5px;"></div>
                                            @endif
                                        @else
                                            <div class="green"
                                                 style="width: 100%; height:30px !important; padding-top: 5px;"></div>
                                        @endif
                                    </div>

                                    {{-- Five Tiers --}}
                                    <div class="progress-bar progressBar grey-50"
                                         style="width: 19%; height:30px !important;margin-right: 2px;">
                                        @if($countSubmitCoverages <= 1550) {{-- 1400+150 =1550 --}}
                                            @if($countSubmitCoverages >= 1450 && $countSubmitCoverages <= 1500)
                                                <div class="yellow"
                                                     style="width: 25%; height:30px !important; padding-top: 5px;"></div>
                                            @elseif($countSubmitCoverages >= 1500 && $countSubmitCoverages != 1550) {{-- 1400+150 =1550 --}}
                                            <div class="red"
                                                 style="width: 75%; height:30px !important; padding-top: 5px;"></div>
                                            @elseif($countSubmitCoverages >= 1550) {{-- 1400+150 =1550 --}}
                                            <div class="green"
                                                 style="width: 100%; height:30px !important; padding-top: 5px;"></div>
                                            @else
                                                <div class="grey-50"
                                                     style="width: 25%; height:30px !important; padding-top: 5px;"></div>
                                            @endif
                                        @else
                                            <div class="green"
                                                 style="width: 100%; height:30px !important; padding-top: 5px;"></div>
                                        @endif
                                    </div>
                                </div>

                                {{-- Percentage tiers--}}
                                <div class="text-white m-t-3">
                                    {{-- First Tiers Percentage--}}
                                    @if($countSubmitCoverages <= \App\Templates\ITiers::TEARS_ONE)
                                        @if($countSubmitCoverages >= $tOne && $countSubmitCoverages <= 334)
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_25}}</p>
                                        @elseif($countSubmitCoverages >= 334 && $countSubmitCoverages != 500) {{-- 167+167=334 --}}
                                             <p>{{\App\Templates\ITiers::PERCENTAGE_75}}l</p>
                                        @elseif($countSubmitCoverages >= 500) {{-- 167+167+166=500 --}}
                                            <p>You {{\App\Templates\ITiers::PERCENTAGE_100}}</p>
                                        @else
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_0}}</p>
                                        @endif
                                     {{-- Second Tiers Percentage--}}
                                    @elseif($countSubmitCoverages <= 900)
                                        @if($countSubmitCoverages >= 633 && $countSubmitCoverages <= 766)
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_25}}</p>
                                        @elseif($countSubmitCoverages >= 766 && $countSubmitCoverages != 900) {{-- 167+167=334 --}}
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_75}}</p>
                                        @elseif($countSubmitCoverages >= 900) {{-- 167+167+166=500 --}}
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_100}}</p>
                                        @else
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_0}}</p>
                                        @endif
                                    {{-- Third Tiers Percentage--}}
                                    @elseif($countSubmitCoverages <= 1200)
                                        @if($countSubmitCoverages >= 1000 && $countSubmitCoverages <= 1100)
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_25}}</p>
                                        @elseif($countSubmitCoverages >= 1100 && $countSubmitCoverages != 1200) {{-- 167+167=334 --}}
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_75}}</p>
                                        @elseif($countSubmitCoverages >= 1200) {{-- 167+167+166=500 --}}
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_100}}</p>
                                        @else
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_0}}</p>
                                        @endif
                                    {{-- Four Tiers Percentage--}}
                                    @elseif($countSubmitCoverages <= 1400)
                                        @if($countSubmitCoverages >= 1267 && $countSubmitCoverages <= 1334)
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_25}}</p>
                                        @elseif($countSubmitCoverages >= 1334 && $countSubmitCoverages != 1400) {{-- 1200+200 =1400 --}}
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_75}}</p>
                                        @elseif($countSubmitCoverages >= 1400) {{-- 167+167+166=500 --}}
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_100}}</p>
                                        @else
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_0}}</p>
                                        @endif
                                    {{-- Five Tiers Percentage--}}
                                    @elseif($countSubmitCoverages <= 1550) {{-- 1400+150 =1550 --}}
                                        @if($countSubmitCoverages >= 1450 && $countSubmitCoverages <= 1500)
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_25}}</p>
                                        @elseif($countSubmitCoverages >= 1500 && $countSubmitCoverages != 1550) {{-- 1400+150 =1550 --}}
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_75}}</p>
                                        @elseif($countSubmitCoverages >= 1550) {{-- 1400+150 =1550 --}}
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_100}}</p>
                                        @else
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_0}}</p>
                                        @endif
                                    @else
                                        <p>You are 100% to your next pay level</p>
                                    @endif

                                    {{-- Claim Button show --}}
                                    @if($countSubmitCoverages >= \App\Templates\ITiers::TEARS_ONE && $countSubmitCoverages < 900)
                                        @if($countSubmitCoverages >= 500)
                                            <div class="getVerified">
                                                <a class="btn btn-sm rounded primary text-white" onclick="addToWalletUSC()" href="javascript:void(0)">Claim USC</a>
                                            </div>
                                        @endif
                                    @elseif($countSubmitCoverages >= 900 && $countSubmitCoverages < 1200)
                                        @if($countSubmitCoverages >= 900)
                                            <div class="getVerified">
                                                <a class="btn btn-sm rounded primary text-white" onclick="addToWalletUSC()" href="javascript:void(0)">Claim USC</a>
                                            </div>
                                        @endif
                                    @elseif($countSubmitCoverages >= 1200 && $countSubmitCoverages < 1400)
                                        @if($countSubmitCoverages >= 1200)
                                            <div class="getVerified">
                                                <a class="btn btn-sm rounded primary text-white" onclick="addToWalletUSC()" href="javascript:void(0)">Claim USC</a>
                                            </div>
                                        @endif
                                    @elseif($countSubmitCoverages >= 1400 && $countSubmitCoverages < 1550)
                                        @if($countSubmitCoverages >= 1400)
                                            <div class="getVerified">
                                                <a class="btn btn-sm rounded primary text-white" onclick="addToWalletUSC()" href="javascript:void(0)">Claim USC</a>
                                            </div>
                                        @endif
                                    @elseif($countSubmitCoverages <= 1550)
                                        @if($countSubmitCoverages >= 1550)
                                            <div class="getVerified">
                                                <a class="btn btn-sm rounded primary text-white" onclick="addToWalletUSC()" href="javascript:void(0)">Claim USC</a>
                                            </div>
                                        @endif
                                    @endif
                                    {{-- Claim Button show --}}

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
                    <a class="btn btn-sm rounded primary m-b-2 text-white" href="{{ route('curator.get.verified') }}">get
                        verified</a>
                </div>
            @endif
            @if (!empty(auth()->user()->getReferrals()))
                @forelse(auth()->user()->getReferrals() as $referral)
                    <div class="bgGradient">
                        <h6 class="text text-muted">Referral Program</h6>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <p>BE A PART OF THE GROWTH OF OUR COMMUNITY!
                                    By referring artists to our platform, you will be able to help them develop their
                                    career program and earn 10 USC or the equivalent in British pounds per sign-up.
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
                        <p>*Earning potential based on referrals depending on the artist membership package
                            purchased.</p>
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
