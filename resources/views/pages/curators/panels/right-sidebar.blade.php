<div class="col-lg-{{(Request::is('dashboard') == 'true') ? 4 : 3}} w-xxl w-auto-md">
    <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
        @if(Request::is('dashboard') == 'true')
            <div id="coverageCurator" class="m-b" style="background-color: #373a3c;">
                <div class="padding">
                    <h6 class="text-center text-white">Your Monthly Activity</h6>
                    @php
                        $countSubmitCoverages = !empty($submitCoverages) ? $submitCoverages->count() : 0;
                        $tiersOne = \App\Templates\ITiers::TEARS_ONE;
                        $tOne = rtrim(floatval(round($tiersOne/3)), '.0');
                        $tiersTwo = \App\Templates\ITiers::TEARS_TWO;
                        $tTwo = rtrim(floatval(round($tiersTwo/3)), '.0');
                        $tiersThree = \App\Templates\ITiers::TEARS_THREE;
                        $tThree = $tiersThree/3;
                        $tiersFour = \App\Templates\ITiers::TEARS_FOUR;
                        $tFour = rtrim(floatval(round($tiersFour/3)), '.0');
                        $tiersFive = \App\Templates\ITiers::TEARS_FIVE;
                        $tFive = $tiersFive/3;
                    @endphp
                    <span class="text">
                    <div class="text-center text-white">
                        @if($countSubmitCoverages >= \App\Templates\ITiers::TEARS_ONE && $countSubmitCoverages < 900)
                            @if($countSubmitCoverages >= 500)
                                <span class="amount activeAmount" >25</span> USC
                            @else
                                <span class="amount">0 USC</span>
                            @endif
                        @elseif($countSubmitCoverages >= 900 && $countSubmitCoverages < 1200)
                            @if($countSubmitCoverages >= 900)
                                <span class="amount activeAmount" >45</span> USC
                            @else
                                <span class="amount">0 USC</span>
                            @endif
                        @elseif($countSubmitCoverages >= 1200 && $countSubmitCoverages < 1400)
                            @if($countSubmitCoverages >= 1200)
                                <span class="amount activeAmount" >63 USC</span>
                            @else
                                <span class="amount">0 USC</span>
                            @endif
                        @elseif($countSubmitCoverages >= 1400 && $countSubmitCoverages < 1550)
                            @if($countSubmitCoverages >= 1400)
                                <span class="amount activeAmount" >79</span> USC
                            @else
                                <span class="amount">0 USC</span>
                            @endif
                        @elseif($countSubmitCoverages <= 1550)
                            @if($countSubmitCoverages >= 1550)
                                <span class="amount activeAmount" >91</span> USC
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
                                    <div style="justify-content: space-between !important;align-items: center !important;display: flex !important;">
                                        <div><span class="text-white">0</span><img class="icon_UP" style="width:10px; height:10px;" src="{{asset('images/coin_bg.png')}}"></div>
                                        <div><span class="text-white">25</span><img class="icon_UP" style="width:10px; height:10px;" src="{{asset('images/coin_bg.png')}}"></div>
                                        <div><span class="text-white">45</span><img class="icon_UP" style="width:10px; height:10px;" src="{{asset('images/coin_bg.png')}}"></div>
                                        <div><span class="text-white">63</span><img class="icon_UP" style="width:10px; height:10px;" src="{{asset('images/coin_bg.png')}}"></div>
                                        <div><span class="text-white">79</span><img class="icon_UP" style="width:10px; height:10px;" src="{{asset('images/coin_bg.png')}}"></div>
                                        <div><span class="text-white">91</span><img class="icon_UP" style="width:10px; height:10px;" src="{{asset('images/coin_bg.png')}}"></div>
                                    </div>

                                    <div class="progress-bar progressBar grey-50" style="width: 19%; height:30px !important;margin-right: 2px;">
                                        @if($countSubmitCoverages <= \App\Templates\ITiers::TEARS_ONE)
                                            @if($countSubmitCoverages >= $tOne && $countSubmitCoverages <= 334)
                                                <div class="yellow" style="width: 25%; height:30px !important; padding-top: 5px;"></div>
                                            @elseif($countSubmitCoverages >= 334 && $countSubmitCoverages != 500)
                                                <div class="red" style="width: 75%; height:30px !important; padding-top: 5px;"></div>
                                            @elseif($countSubmitCoverages >= 500)
                                                <div class="green" style="width: 100%; height:30px !important; padding-top: 5px;"></div>
                                            @else
                                                <div class="grey-50" style="width: 25%; height:30px !important; padding-top: 5px;"></div>
                                            @endif
                                        @else
                                            <div class="green" style="width: 100%; height:30px !important; padding-top: 5px;"></div>
                                        @endif
                                    </div>

                                    <div class="progress-bar progressBar grey-50" style="width: 19%; height:30px !important;margin-right: 2px;">
                                        @if($countSubmitCoverages <= 900)
                                            @if($countSubmitCoverages >= 633 && $countSubmitCoverages <= 766)
                                                <div class="yellow" style="width: 25%; height:30px !important; padding-top: 5px;"></div>
                                            @elseif($countSubmitCoverages >= 766 && $countSubmitCoverages != 900)
                                                <div class="red" style="width: 75%; height:30px !important; padding-top: 5px;"></div>
                                            @elseif($countSubmitCoverages >= 900)
                                                <div class="green" style="width: 100%; height:30px !important; padding-top: 5px;"></div>
                                            @else
                                                <div class="grey-50" style="width: 25%; height:30px !important; padding-top: 5px;"></div>
                                            @endif
                                        @else
                                            <div class="green" style="width: 100%; height:30px !important; padding-top: 5px;"></div>
                                        @endif
                                    </div>

                                    <div class="progress-bar progressBar grey-50" style="width: 19%; height:30px !important;margin-right: 2px;">
                                        @if($countSubmitCoverages <= 1200)
                                            @if($countSubmitCoverages >= 1000 && $countSubmitCoverages <= 1100)
                                                <div class="yellow" style="width: 25%; height:30px !important; padding-top: 5px;"></div>
                                            @elseif($countSubmitCoverages >= 1100 && $countSubmitCoverages != 1200)
                                                <div class="red" style="width: 75%; height:30px !important; padding-top: 5px;"></div>
                                            @elseif($countSubmitCoverages >= 1200)
                                                <div class="green" style="width: 100%; height:30px !important; padding-top: 5px;"></div>
                                            @else
                                                <div class="grey-50" style="width: 25%; height:30px !important; padding-top: 5px;"></div>
                                            @endif
                                        @else
                                            <div class="green" style="width: 100%; height:30px !important; padding-top: 5px;"></div>
                                        @endif
                                    </div>
                                    
                                    <div class="progress-bar progressBar grey-50" style="width: 19%; height:30px !important;margin-right: 2px;">
                                        @if($countSubmitCoverages <= 1400)
                                            @if($countSubmitCoverages >= 1267 && $countSubmitCoverages <= 1334)
                                                <div class="yellow" style="width: 25%; height:30px !important; padding-top: 5px;"></div>
                                            @elseif($countSubmitCoverages >= 1334 && $countSubmitCoverages != 1400)
                                                <div class="red" style="width: 75%; height:30px !important; padding-top: 5px;"></div>
                                            @elseif($countSubmitCoverages >= 1400)
                                                <div class="green" style="width: 100%; height:30px !important; padding-top: 5px;"></div>
                                            @else
                                                <div class="grey-50" style="width: 25%; height:30px !important; padding-top: 5px;"></div>
                                            @endif
                                        @else
                                            <div class="green" style="width: 100%; height:30px !important; padding-top: 5px;"></div>
                                        @endif
                                    </div>

                                    <div class="progress-bar progressBar grey-50" style="width: 19%; height:30px !important;margin-right: 2px;">
                                        @if($countSubmitCoverages <= 1550)
                                            @if($countSubmitCoverages >= 1450 && $countSubmitCoverages <= 1500)
                                                <div class="yellow" style="width: 25%; height:30px !important; padding-top: 5px;"></div>
                                            @elseif($countSubmitCoverages >= 1500 && $countSubmitCoverages != 1550)
                                                <div class="red" style="width: 75%; height:30px !important; padding-top: 5px;"></div>
                                            @elseif($countSubmitCoverages >= 1550)
                                                <div class="green" style="width: 100%; height:30px !important; padding-top: 5px;"></div>
                                            @else
                                                <div class="grey-50" style="width: 25%; height:30px !important; padding-top: 5px;"></div>
                                            @endif
                                        @else
                                            <div class="green" style="width: 100%; height:30px !important; padding-top: 5px;"></div>
                                        @endif
                                    </div>
                                </div>

                                <div class="text-white m-t-3">
                                    @if($countSubmitCoverages <= \App\Templates\ITiers::TEARS_ONE)
                                        @php $progress = ($countSubmitCoverages / \App\Templates\ITiers::TEARS_ONE) * 100; @endphp
                                        <p>{{'You are '.$progress.'% to your next pay level'}}</p>
                                    @elseif($countSubmitCoverages <= 900)
                                        @if($countSubmitCoverages >= 633 && $countSubmitCoverages <= 766)
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_25}}</p>
                                        @elseif($countSubmitCoverages >= 766 && $countSubmitCoverages != 900)
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_75}}</p>
                                        @elseif($countSubmitCoverages >= 900)
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_100}}</p>
                                        @else
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_0}}</p>
                                        @endif
                                    @elseif($countSubmitCoverages <= 1200)
                                        @if($countSubmitCoverages >= 1000 && $countSubmitCoverages <= 1100)
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_25}}</p>
                                        @elseif($countSubmitCoverages >= 1100 && $countSubmitCoverages != 1200)
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_75}}</p>
                                        @elseif($countSubmitCoverages >= 1200)
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_100}}</p>
                                        @else
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_0}}</p>
                                        @endif
                                    @elseif($countSubmitCoverages <= 1400)
                                        @if($countSubmitCoverages >= 1267 && $countSubmitCoverages <= 1334)
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_25}}</p>
                                        @elseif($countSubmitCoverages >= 1334 && $countSubmitCoverages != 1400)
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_75}}</p>
                                        @elseif($countSubmitCoverages >= 1400)
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_100}}</p>
                                        @else
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_0}}</p>
                                        @endif
                                    @elseif($countSubmitCoverages <= 1550)
                                        @if($countSubmitCoverages >= 1450 && $countSubmitCoverages <= 1500)
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_25}}</p>
                                        @elseif($countSubmitCoverages >= 1500 && $countSubmitCoverages != 1550)
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_75}}</p>
                                        @elseif($countSubmitCoverages >= 1550)
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_100}}</p>
                                        @else
                                            <p>{{\App\Templates\ITiers::PERCENTAGE_0}}</p>
                                        @endif
                                    @else
                                        <p>You are 100% to your next pay level</p>
                                    @endif
                                    
                                    @if($countSubmitCoverages >= \App\Templates\ITiers::TEARS_ONE && $countSubmitCoverages < 900)
                                        @if($countSubmitCoverages >= 500 && $countSubmitCoverages <= 501)
                                            <div class="getVerified"><a class="btn btn-sm rounded primary text-white" onclick="addToWalletUSC()" href="javascript:void(0)">Claim USC</a></div>
                                        @endif
                                    @elseif($countSubmitCoverages >= 900 && $countSubmitCoverages <= 901)
                                        @if($countSubmitCoverages >= 900)
                                            <div class="getVerified"><a class="btn btn-sm rounded primary text-white" onclick="addToWalletUSC()" href="javascript:void(0)">Claim USC</a></div>
                                        @endif
                                    @elseif($countSubmitCoverages >= 1200 && $countSubmitCoverages < 1201)
                                        @if($countSubmitCoverages >= 1200)
                                            <div class="getVerified"><a class="btn btn-sm rounded primary text-white" onclick="addToWalletUSC()" href="javascript:void(0)">Claim USC</a></div>
                                        @endif
                                    @elseif($countSubmitCoverages >= 1400 && $countSubmitCoverages < 1401)
                                        @if($countSubmitCoverages >= 1400)
                                            <div class="getVerified"><a class="btn btn-sm rounded primary text-white" onclick="addToWalletUSC()" href="javascript:void(0)">Claim USC</a></div>
                                        @endif
                                    @elseif($countSubmitCoverages <= 1550)
                                        @if($countSubmitCoverages >= 1550)
                                            <div class="getVerified"><a class="btn btn-sm rounded primary text-white" onclick="addToWalletUSC()" href="javascript:void(0)">Claim USC</a></div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (Auth::check() && auth()->user())
            @if (auth()->user()->is_verified != 1)
                <div class="getVerified" id="getNoVerified" style="display: none;">
                    <a class="btn btn-sm rounded primary m-b-2 text-white" href="{{ route('curator.get.verified') }}">get verified</a>
                </div>
            @endif

            {{-- REVIVED TEXT BLOCK --}}
            <div class="bgGradient p-a m-b">
                <h6 class="text text-muted">Referral Program</h6>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <p>BE A PART OF THE GROWTH OF OUR COMMUNITY!
                            By referring artists to our platform, you will be able to help them develop their
                            career program and earn 10 USC or the equivalent in British pounds per sign-up.
                            You can help them sign up by sending them this link:</p>
                    </div>
                </div>

                @php $referralData = auth()->user()->getReferrals(); @endphp
                @if (!empty($referralData))
                    @forelse($referralData as $referral)
                        <h6 class="text text-muted">Referral Link</h6>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input id="tastemaker_name" class="form-control" value="{{ $referral->link }}">
                            </div>
                        </div>
                        @php
                            $relationships = \App\Models\ReferralRelationship::where('referral_link_id',$referral->id)->get();
                            $count = 0;
                            foreach ($relationships as $key => $relationship) {
                                if(!empty($relationship->campaign)) { $count++; }
                            }
                        @endphp
                        <p>Number of referred users: {{ $count }}</p>
                    @empty
                        <p class="text-muted">No active referral links found.</p>
                    @endforelse
                @endif
                <p class="text-xs text-muted">*Earning potential based on referrals depending on the artist membership package purchased.</p>
            </div>
        @endif

        {{-- WIDGET GENERATOR - RESPONSIVE & SCALED --}}
        <div id="us-widget-tool">
            <style>
                #us-widget-tool { width: 100% !important; margin: 0 auto; min-width: 250px; font-family: sans-serif; background: #1e293b; color: #f8fafc; border-radius: 12px; padding: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); box-sizing: border-box; }
                #us-widget-tool h2 { margin: 0 0 15px 0; text-align: center; font-size: 1.2rem; background: linear-gradient(to right, #fff, #cbd5e1); -webkit-background-clip: text; -webkit-text-fill-color: transparent; display: flex; align-items: center; justify-content: center; gap: 10px; }
                .us-size-selector { display: flex; gap: 5px; margin-bottom: 15px; flex-wrap: wrap; }
                .us-size-btn { flex: 1; padding: 8px 4px; border: 1px solid #334155; background: #0f172a; color: #94a3b8; border-radius: 6px; cursor: pointer; text-align: center; font-size: 0.75rem; }
                .us-size-btn.active { background: #02b875; color: white; border-color: #02b875; }
                .us-preview-wrapper { background: #0f172a; border: 1px dashed #334155; border-radius: 8px; padding: 10px; margin-bottom: 15px; overflow: hidden; display: flex; justify-content: center; }
                /* SCALE THE PREVIEW SO IT FITS SIDEBAR BUT REPRESENTS ACTUAL SIZE */
                #usPreviewContainer { transform: scale(0.8); transform-origin: center top; width: 100%; max-height: 150px; }
                #us-widget-tool textarea { width: 100%; height: 60px; background: #0b1120; border: 1px solid #334155; color: #cbd5e1; padding: 10px; border-radius: 6px; font-size: 0.75rem; resize: none; }
                .us-copy-btn { background: #02b875; color: white; border: none; padding: 10px; border-radius: 6px; font-weight: bold; cursor: pointer; width: 100%; margin-top: 10px; }
                .us-toggle-btn { background: #334155; border: none; color: #fff; font-size: 0.6rem; padding: 2px 8px; border-radius: 10px; cursor: pointer; }
            </style>

            <h2>Widget <button id="usToggleBtn" class="us-toggle-btn" onclick="usToggleTool()">Hide</button></h2>
            <div id="us-widget-content">
                <div class="us-controls">
                    <label style="font-size: 0.7rem; color: #94a3b8;">SELECT DESIGN</label>
                    <div class="us-size-selector">
                        <div class="us-size-btn active" onclick="usSetSize('sidebar')">Sidebar</div>
                        <div class="us-size-btn" onclick="usSetSize('banner')">Banner</div>
                        <div class="us-size-btn" onclick="usSetSize('large')">Large</div>
                    </div>
                </div>
                <div class="us-preview-wrapper"><div id="usPreviewContainer"></div></div>
                <textarea id="usCodeOutput" readonly></textarea>
                <button class="us-copy-btn" onclick="usCopyCode(this)">Copy Code</button>
            </div>
        </div>

        <div class="b-b m-y"></div>
        <div class="nav text-sm _600">
            <a href="{{ url('about-us') }}" class="nav-link text-muted m-r-xs">About</a>
            <a href="{{ url('contact-us') }}" class="nav-link text-muted m-r-xs">Contact</a>
            <a href="{{ url('term-of-service') }}" class="nav-link text-muted m-r-xs">Terms</a>
            <a href="{{ url('privacy-policy') }}" class="nav-link text-muted m-r-xs">Privacy</a>
        </div>
        <p class="text-muted text-xs p-b-lg">&copy; {{ date('Y') }} Upcoming Sounds</p>
    </div>
</div>
