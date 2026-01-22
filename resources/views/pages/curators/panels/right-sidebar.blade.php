<style>
  /* --- WIDGET STYLES --- */
  :root {
    --us-green: #00dda2;    /* Change to #D32F2F if you want Red */
    --us-text: #ffffff;
  }
  .us-widget {
    background: #1e1e1e;
    color: var(--us-text);
    border-radius: 4px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  }
  .us-widget.size-visual {
    width: 100%;
    display: flex;
    flex-direction: column;
    text-align: center;
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.9)), url('https://upcomingsounds.com/images/logo.png'); /* Ensure this path is correct */
    background-size: cover;
    background-position: center;
    padding: 20px;
  }
  .us-widget h3 { margin: 0 0 5px; font-size: 18px; color: #fff; }
  .us-widget p { margin: 0 0 15px; color: #ccc; font-size: 13px; }
  
  .input-group { display: flex; height: 35px; }
  .link-input {
    flex: 1;
    background: #000;
    border: 1px solid #333;
    color: var(--us-green);
    padding: 0 10px;
    font-size: 12px;
    outline: none;
    border-radius: 4px 0 0 4px;
  }
  .btn-copy {
    width: 60px;
    background: var(--us-green);
    color: #000;
    border: none;
    font-weight: bold;
    cursor: pointer;
    font-size: 11px;
    border-radius: 0 4px 4px 0;
  }
  .btn-copy:hover { background: #fff; }
</style>
<div class="col-lg-{{(Request::is('dashboard') == 'true') ? 4 : 3}} w-xxl w-auto-md">
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
                                        @php
                                                $progress = ($countSubmitCoverages / \App\Templates\ITiers::TEARS_ONE) * 100;
                                        @endphp
                                        <p>{{'You are '.$progress.'% to your next pay level'}}</p>
{{--                                        @if($countSubmitCoverages >= $tOne && $countSubmitCoverages <= 334)--}}
{{--                                            <p>{{\App\Templates\ITiers::PERCENTAGE_25}}</p>--}}
{{--                                        @elseif($countSubmitCoverages >= 334 && $countSubmitCoverages != 500) --}}{{-- 167+167=334 --}}
{{--                                             <p>{{\App\Templates\ITiers::PERCENTAGE_75}}l</p>--}}
{{--                                        @elseif($countSubmitCoverages >= 500) --}}{{-- 167+167+166=500 --}}
{{--                                            <p>You {{\App\Templates\ITiers::PERCENTAGE_100}}</p>--}}
{{--                                        @else--}}
{{--                                            <p>{{\App\Templates\ITiers::PERCENTAGE_0}}</p>--}}
{{--                                        @endif--}}
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
                                        @if($countSubmitCoverages >= 500 && $countSubmitCoverages <= 501)
                                            <div class="getVerified">
                                                <a class="btn btn-sm rounded primary text-white" onclick="addToWalletUSC()" href="javascript:void(0)">Claim USC</a>
                                            </div>
                                        @endif
                                    @elseif($countSubmitCoverages >= 900 && $countSubmitCoverages <= 901)
{{--                                    @elseif($countSubmitCoverages >= 900 && $countSubmitCoverages < 1200)--}}
                                        @if($countSubmitCoverages >= 900)
                                            <div class="getVerified">
                                                <a class="btn btn-sm rounded primary text-white" onclick="addToWalletUSC()" href="javascript:void(0)">Claim USC</a>
                                            </div>
                                        @endif
                                    @elseif($countSubmitCoverages >= 1200 && $countSubmitCoverages < 1201)
{{--                                    @elseif($countSubmitCoverages >= 1200 && $countSubmitCoverages < 1400)--}}
                                        @if($countSubmitCoverages >= 1200)
                                            <div class="getVerified">
                                                <a class="btn btn-sm rounded primary text-white" onclick="addToWalletUSC()" href="javascript:void(0)">Claim USC</a>
                                            </div>
                                        @endif
                                    @elseif($countSubmitCoverages >= 1400 && $countSubmitCoverages < 1401)
{{--                                    @elseif($countSubmitCoverages >= 1400 && $countSubmitCoverages < 1550)--}}
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
{{-- --- WIDGET GENERATION & DISPLAY SECTION --- --}}
@php
    // 1. PREPARE DATA
    // Get Avatar (Fallback to Logo)
    $avatarImg = !empty(auth()->user()->avatar) ? auth()->user()->avatar : asset('images/logo.png');
    $refUrl = $referral->link;
    $uniqueID = $referral->id;

    // 2. DEFINE THE WIDGET HTML CODES (Inline Styles for Portability)
    
    // STYLE A: CARD (300x380)
    $codeCard = '
    <div style="width: 300px; height: 380px; background: #1e1e1e; font-family: Helvetica, Arial, sans-serif; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.5); text-align: center;">
        <div style="height: 200px; background: url(\''.$avatarImg.'\') center/cover;"></div>
        <div style="padding: 20px; color: #fff;">
            <h3 style="margin: 0 0 5px; font-size: 20px;">Refer & Earn</h3>
            <p style="font-size: 13px; color: #b3b3b3; margin: 0 0 15px 0;">Get 10 USC for every artist you refer!</p>
            <a href="'.$refUrl.'" target="_blank" style="display: block; background: #00dda2; color: #000; padding: 12px; text-decoration: none; font-weight: bold; border-radius: 4px; font-size: 14px;">GET STARTED</a>
        </div>
    </div>';

    // STYLE B: WIDE (100% x 160) - Good for Blogs
    $codeWide = '
    <div style="width: 100%; max-width: 600px; height: 160px; background: #1e1e1e; display: flex; align-items: center; border-radius: 8px; overflow: hidden; font-family: Helvetica, Arial, sans-serif; box-shadow: 0 4px 15px rgba(0,0,0,0.5);">
        <div style="width: 140px; height: 100%; background: url(\''.$avatarImg.'\') center/cover;"></div>
        <div style="flex: 1; padding: 20px; color: #fff;">
            <h3 style="margin: 0 0 5px; font-size: 22px;">Invite Artists</h3>
            <p style="font-size: 13px; color: #b3b3b3; margin: 0 0 15px 0;">Share your unique link and earn rewards.</p>
            <a href="'.$refUrl.'" target="_blank" style="background: #00dda2; color: #000; padding: 8px 15px; text-decoration: none; font-weight: bold; border-radius: 4px; font-size: 12px;">JOIN NOW</a>
        </div>
    </div>';

    // STYLE C: COMPACT (100% x 80) - Good for Footers
    $codeCompact = '
    <div style="width: 100%; max-width: 600px; height: 80px; background: #1e1e1e; display: flex; align-items: center; padding: 0 15px; border-radius: 8px; font-family: Helvetica, Arial, sans-serif; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
        <div style="width: 50px; height: 50px; background: #00dda2; color: #000; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 24px; border-radius: 4px; margin-right: 15px;">$</div>
        <div style="flex: 1; color: #fff;">
            <h3 style="font-size: 16px; margin: 0;">Referral Program</h3>
            <span style="font-size: 12px; color: #b3b3b3;">Earn 10 USC per signup</span>
        </div>
        <a href="'.$refUrl.'" target="_blank" style="background: #333; color: #fff; padding: 6px 12px; text-decoration: none; font-size: 11px; border-radius: 4px; border: 1px solid #444;">LINK</a>
    </div>';

@endphp

{{-- 3. DISPLAY AREA (Visuals are scaled down 50% for the dashboard) --}}
<div class="padding">
    <h6 class="text-white m-b-md">Embeddable Widgets</h6>
    <p class="text-muted text-xs m-b-lg">Choose a style, copy the code, and paste it on your website.</p>

    {{-- CSS to shrink the previews without changing the actual code --}}
    <style>
        .widget-preview-row { margin-bottom: 20px; border-bottom: 1px solid #333; padding-bottom: 20px; }
        .scale-wrapper { 
            transform: scale(0.5); 
            transform-origin: top left; 
            margin-bottom: -50%; /* Pulls up the empty space left by scaling */
        }
        /* Adjust wrapper sizes to match the 50% scale */
        .wrap-card { width: 150px; height: 190px; } 
        .wrap-wide { width: 100%; height: 80px; }
        .wrap-compact { width: 100%; height: 40px; }
        
        .copy-actions { margin-top: 10px; display: flex; justify-content: space-between; align-items: center; }
        .btn-copy-code { background: #00dda2; color: #000; border: none; padding: 5px 10px; font-size: 11px; font-weight: bold; cursor: pointer; border-radius: 3px; }
    </style>

    {{-- WIDGET 1: CARD --}}
    <div class="widget-preview-row">
        <h6 class="text-muted text-xs">1. Card Style (300x380)</h6>
        <div class="scale-wrapper wrap-card">
            {!! $codeCard !!}
        </div>
        <div class="copy-actions">
            <span class="text-muted text-xs">Great for Sidebars</span>
            <textarea id="code-card-{{$uniqueID}}" style="display:none;">{{ $codeCard }}</textarea>
            <button class="btn-copy-code" onclick="copyEmbed('code-card-{{$uniqueID}}', this)">COPY CODE</button>
        </div>
    </div>

    {{-- WIDGET 2: WIDE --}}
    <div class="widget-preview-row">
        <h6 class="text-muted text-xs">2. Wide Style (Responsive)</h6>
        <div class="scale-wrapper wrap-wide">
            {!! $codeWide !!}
        </div>
        <div class="copy-actions">
            <span class="text-muted text-xs">Great for Blog Posts</span>
            <textarea id="code-wide-{{$uniqueID}}" style="display:none;">{{ $codeWide }}</textarea>
            <button class="btn-copy-code" onclick="copyEmbed('code-wide-{{$uniqueID}}', this)">COPY CODE</button>
        </div>
    </div>

    {{-- WIDGET 3: COMPACT --}}
    <div class="widget-preview-row" style="border: none;">
        <h6 class="text-muted text-xs">3. Compact Style</h6>
        <div class="scale-wrapper wrap-compact">
            {!! $codeCompact !!}
        </div>
        <div class="copy-actions">
            <span class="text-muted text-xs">Great for Footers</span>
            <textarea id="code-compact-{{$uniqueID}}" style="display:none;">{{ $codeCompact }}</textarea>
            <button class="btn-copy-code" onclick="copyEmbed('code-compact-{{$uniqueID}}', this)">COPY CODE</button>
        </div>
    </div>
    
</div>

{{-- 4. JAVASCRIPT FOR COPY BUTTON (Use the existing one or add this at the bottom) --}}
<script>
    function copyEmbed(elementId, btnElement) {
      var copyText = document.getElementById(elementId);
      copyText.style.display = 'block'; // Show briefly to select
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      
      try {
          document.execCommand('copy');
          var originalText = btnElement.innerText;
          btnElement.innerText = "COPIED!";
          btnElement.style.background = "#fff";
          setTimeout(function(){ 
              btnElement.innerText = originalText; 
              btnElement.style.background = "#00dda2";
          }, 2000);
      } catch (err) {
          alert('Oops, unable to copy');
      }
      copyText.style.display = 'none'; // Hide again
    }
</script>
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
<script>
    // Function for the Link Copy Button
    function copyLink(elementId) {
      var copyText = document.getElementById(elementId);
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      navigator.clipboard.writeText(copyText.value);
      
      // Visual feedback
      var btn = event.target;
      btn.innerText = "Copied!";
      setTimeout(function(){ btn.innerText = "Copy"; }, 2000);
    }

    // Function for the HTML Embed Code Button
    function copyEmbed(elementId) {
      var copyText = document.getElementById(elementId);
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      navigator.clipboard.writeText(copyText.value);

      // Visual feedback
      var btn = event.target;
      btn.innerText = "COPIED!";
      btn.style.background = "#fff";
      setTimeout(function(){ 
          btn.innerText = "COPY CODE"; 
          btn.style.background = "#00dda2";
      }, 2000);
    }
</script>
