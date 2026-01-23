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
                    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpcomingSounds Widget Generator</title>
    <style>
        :root {
            --primary: #6366f1;
            --secondary: #a855f7;
            --bg: #0f172a;
            --surface: #1e293b;
            --text: #f8fafc;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: var(--bg);
            color: var(--text);
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        /* --- Generator UI --- */
        .generator-container {
            width: 100%;
            max-width: 1000px;
            background: var(--surface);
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }

        h1 { margin-top: 0; text-align: center; background: linear-gradient(to right, #fff, #94a3b8); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        
        .controls {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #334155;
        }

        .input-group { display: flex; flex-direction: column; gap: 8px; }
        label { font-size: 0.85rem; color: #94a3b8; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; }
        input[type="text"] {
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #334155;
            background: #0f172a;
            color: #fff;
            font-size: 1rem;
            width: 100%;
            box-sizing: border-box;
        }
        input[type="text"]:focus { border-color: var(--primary); outline: none; }

        .size-selector { display: flex; gap: 10px; }
        .size-btn {
            flex: 1;
            padding: 12px;
            border: 1px solid #334155;
            background: #0f172a;
            color: #94a3b8;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
            font-weight: 500;
            text-align: center;
        }
        .size-btn:hover { background: #1e293b; border-color: var(--primary); }
        .size-btn.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
            box-shadow: 0 0 15px rgba(99, 102, 241, 0.4);
        }

        /* Preview Area */
        .preview-wrapper {
            background: #0f172a;
            border: 2px dashed #334155;
            border-radius: 12px;
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 300px;
            overflow: hidden;
            position: relative;
        }
        .preview-label {
            position: absolute;
            top: 10px; left: 10px;
            font-size: 0.75rem; color: #475569;
            text-transform: uppercase; letter-spacing: 1px;
        }

        /* Code Output */
        .output-section { margin-top: 30px; }
        textarea {
            width: 100%; height: 120px;
            background: #0b1120;
            border: 1px solid #334155;
            color: #cbd5e1;
            padding: 15px;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            font-size: 0.85rem;
            resize: none;
            box-sizing: border-box;
        }
        
        .action-row {
            display: flex; justify-content: flex-end; margin-top: 10px;
        }
        .copy-btn {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white; border: none;
            padding: 12px 24px; border-radius: 8px;
            font-weight: bold; cursor: pointer;
            transition: transform 0.1s;
        }
        .copy-btn:active { transform: scale(0.98); }

        /* --- WIDGET INTERNAL STYLES (Hidden from view, used for injection) --- */
        .us-widget-root {
            width: 100%; height: 100%;
            background: linear-gradient(135deg, #111, #1a1a1a);
            color: white;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            overflow: hidden;
            position: relative;
            display: flex;
            box-sizing: border-box;
            border: 1px solid #333;
        }
        /* Logo styling updated to fit your specific logo better */
        .us-logo-img { display: block; object-fit: contain; max-width: 100%; }
        
        .us-cta {
            background: white; color: black;
            text-decoration: none; padding: 8px 18px;
            border-radius: 20px; font-size: 13px; font-weight: 700;
            white-space: nowrap; transition: background 0.2s;
        }
        .us-cta:hover { background: #e2e8f0; }
        .us-slider {
            overflow: hidden; position: relative;
            display: flex; align-items: center; justify-content: center;
        }
        .us-slide-track {
            display: flex; flex-direction: column; text-align: center;
            animation: scrollText 9s infinite cubic-bezier(0.4, 0, 0.2, 1);
        }
        .us-slide-item {
            display: flex; align-items: center; justify-content: center;
            line-height: 1.3; color: #e2e8f0; text-align: center; padding: 0 5px;
        }

        /* --- VARIANT SPECIFIC STYLES --- */
        /* Sidebar (300x250) */
        .us-widget-sidebar { flex-direction: column; align-items: center; justify-content: center; padding: 20px; }
        .us-widget-sidebar .us-logo-img { height: 50px; margin-bottom: 15px; } /* Increased height for your logo */
        .us-widget-sidebar .us-slider { width: 100%; height: 60px; margin-bottom: 15px; }
        .us-widget-sidebar .us-slide-item { height: 60px; font-size: 15px; }
        .us-widget-sidebar .us-slide-track { animation-name: scrSidebar; }
        @keyframes scrSidebar{0%,25%{transform:translateY(0)}33%,58%{transform:translateY(-60px)}66%,92%{transform:translateY(-120px)}100%{transform:translateY(0)}}

        /* Banner (728x90) */
        .us-widget-banner { flex-direction: row; align-items: center; justify-content: space-between; padding: 0 25px; }
        .us-widget-banner .us-logo-img { height: 40px; margin-right: 15px; flex-shrink: 0; }
        .us-widget-banner .us-slider { flex: 1; height: 50px; margin: 0 15px; }
        .us-widget-banner .us-slide-item { height: 50px; font-size: 16px; }
        .us-widget-banner .us-cta { flex-shrink: 0; }
        .us-widget-banner .us-slide-track { animation-name: scrBanner; }
        @keyframes scrBanner{0%,25%{transform:translateY(0)}33%,58%{transform:translateY(-50px)}66%,92%{transform:translateY(-100px)}100%{transform:translateY(0)}}

        /* Large Banner (970x250) */
        .us-widget-large { flex-direction: row; align-items: center; justify-content: space-around; padding: 0 40px; }
        .us-widget-large .us-logo-img { height: 60px; }
        .us-widget-large .us-slider { width: 50%; height: 80px; }
        .us-widget-large .us-slide-item { height: 80px; font-size: 22px; }
        .us-widget-large .us-cta { font-size: 16px; padding: 12px 24px; }
        .us-widget-large .us-slide-track { animation-name: scrLarge; }
        @keyframes scrLarge{0%,25%{transform:translateY(0)}33%,58%{transform:translateY(-80px)}66%,92%{transform:translateY(-160px)}100%{transform:translateY(0)}}

        /* RESPONSIVE TWEAKS */
        @media (max-width: 600px) {
            .us-widget-banner { padding: 0 10px; }
            .us-widget-banner .us-logo-img { height: 28px; margin-right: 8px; }
            .us-widget-banner .us-slide-item { font-size: 13px; }
            .us-widget-banner .us-cta { padding: 6px 12px; font-size: 11px; }
            .us-widget-large { flex-direction: column; justify-content: center; padding: 20px; text-align: center; }
            .us-widget-large .us-logo-img { margin-bottom: 10px; }
            .us-widget-large .us-slider { width: 100%; margin-bottom: 10px; }
        }
    </style>
</head>
<body>

<div class="generator-container">
    <h1>Widget Generator</h1>
    
    <div class="controls">
        <div class="input-group">
            <label>Referral URL</label>
            <input type="text" id="refUrl" value="https://upcomingsounds.com/ref/curator123">
        </div>

        <div class="input-group">
            <label>Select Widget Layout</label>
            <div class="size-selector">
                <div class="size-btn active" onclick="setSize('sidebar')">Sidebar<br><small>300x250</small></div>
                <div class="size-btn" onclick="setSize('banner')">Banner<br><small>728x90</small></div>
                <div class="size-btn" onclick="setSize('large')">Big Banner<br><small>970x250</small></div>
            </div>
        </div>
    </div>

    <div class="preview-wrapper">
        <span class="preview-label">Live Preview</span>
        <div id="previewContainer">
            </div>
    </div>

    <div class="output-section">
        <label>Copy & Paste this code to your website:</label>
        <textarea id="codeOutput" readonly></textarea>
        <div class="action-row">
            <button class="copy-btn" onclick="copyCode()">Copy Code</button>
        </div>
    </div>
</div>

<script>
    // --- CONFIGURATION ---
    const LOGO_URL = "https://upcomingsounds.com/images/logo.png";
    // ---------------------

    let currentSize = 'sidebar';
    const dims = {
        sidebar: { w: 300, h: 250, class: 'us-widget-sidebar' },
        banner: { w: 728, h: 90, class: 'us-widget-banner' },
        large: { w: 970, h: 250, class: 'us-widget-large' }
    };

    function setSize(size) {
        currentSize = size;
        document.querySelectorAll('.size-btn').forEach(btn => btn.classList.remove('active'));
        event.currentTarget.classList.add('active');
        updateWidget();
    }

    function updateWidget() {
        const url = document.getElementById('refUrl').value;
        const config = dims[currentSize];

        // 1. Build Preview
        const previewHtml = `
            <div class="us-widget-root ${config.class}" style="width:${config.w}px; height:${config.h}px;">
                <img src="${LOGO_URL}" alt="UpcomingSounds" class="us-logo-img">
                <div class="us-slider">
                    <div class="us-slide-track">
                        <div class="us-slide-item">Submit your music to my playlist</div>
                        <div class="us-slide-item">Join our community for free</div>
                        <div class="us-slide-item">Be heard on UpcomingSounds.com</div>
                    </div>
                </div>
                <a href="${url}" target="_blank" class="us-cta">Get Started</a>
            </div>
        `;
        document.getElementById('previewContainer').innerHTML = previewHtml;

        // 2. Build Code (Self-contained Iframe)
        const iframeCss = `
<style>
body{margin:0;overflow:hidden;font-family:sans-serif;}
.us-widget-root{width:100%;height:100%;background:linear-gradient(135deg,#111,#222);color:white;display:flex;box-sizing:border-box;position:relative;border:1px solid #333;}
.us-logo-img{display:block;object-fit:contain;max-width:100%;}
.us-cta{background:white;color:black;text-decoration:none;padding:8px 16px;border-radius:20px;font-size:12px;font-weight:bold;white-space:nowrap;}
.us-slider{overflow:hidden;position:relative;display:flex;align-items:center;justify-content:center;}
.us-slide-track{display:flex;flex-direction:column;text-align:center;animation:scr 9s infinite cubic-bezier(0.4,0,0.2,1);}
.us-slide-item{display:flex;align-items:center;justify-content:center;line-height:1.3;color:#ddd;text-align:center;padding:0 5px;}
/* Sidebar */
.us-widget-sidebar{flex-direction:column;align-items:center;justify-content:center;padding:20px;}
.us-widget-sidebar .us-logo-img{height:50px;margin-bottom:10px;}
.us-widget-sidebar .us-slider{width:100%;height:60px;margin-bottom:10px;}
.us-widget-sidebar .us-slide-item{height:60px;font-size:14px;}
.us-widget-sidebar .us-slide-track{animation-name:scrSidebar;}
@keyframes scrSidebar{0%,25%{transform:translateY(0)}33%,58%{transform:translateY(-60px)}66%,92%{transform:translateY(-120px)}100%{transform:translateY(0)}}
/* Banner */
.us-widget-banner{flex-direction:row;align-items:center;justify-content:space-between;padding:0 25px;}
.us-widget-banner .us-logo-img{height:40px;margin-right:15px;flex-shrink:0;}
.us-widget-banner .us-slider{flex:1;height:50px;margin:0 10px;}
.us-widget-banner .us-slide-item{height:50px;font-size:16px;}
.us-widget-banner .us-cta{flex-shrink:0;}
.us-widget-banner .us-slide-track{animation-name:scrBanner;}
@keyframes scrBanner{0%,25%{transform:translateY(0)}33%,58%{transform:translateY(-50px)}66%,92%{transform:translateY(-100px)}100%{transform:translateY(0)}}
/* Large */
.us-widget-large{flex-direction:row;align-items:center;justify-content:space-around;padding:0 40px;}
.us-widget-large .us-logo-img{height:60px;}
.us-widget-large .us-slider{width:50%;height:80px;}
.us-widget-large .us-slide-item{height:80px;font-size:22px;}
.us-widget-large .us-slide-track{animation-name:scrLarge;}
@keyframes scrLarge{0%,25%{transform:translateY(0)}33%,58%{transform:translateY(-80px)}66%,92%{transform:translateY(-160px)}100%{transform:translateY(0)}}
/* Mobile Responsiveness inside Iframe */
@media (max-width: 600px) {
    .us-widget-banner{padding:0 10px;}
    .us-widget-banner .us-logo-img{height:28px;margin-right:5px;}
    .us-widget-banner .us-slide-item{font-size:12px;}
    .us-widget-banner .us-cta{padding:5px 10px;font-size:10px;}
    .us-widget-large{flex-direction:column;justify-content:center;padding:20px;text-align:center;}
    .us-widget-large .us-logo-img{margin-bottom:10px;}
    .us-widget-large .us-slider{width:100%;}
}
</style>
        `;

        const iframeBody = `
<div class="us-widget-root ${config.class}">
    <img src="${LOGO_URL}" alt="UpcomingSounds" class="us-logo-img">
    <div class="us-slider"><div class="us-slide-track">
        <div class="us-slide-item">Submit your music to my playlist</div>
        <div class="us-slide-item">Join our community for free</div>
        <div class="us-slide-item">Be heard on UpcomingSounds.com</div>
    </div></div>
    <a href="${url}" target="_blank" class="us-cta">Get Started</a>
</div>`;

        const srcDoc = `<html><head>${iframeCss}</head><body>${iframeBody}</body></html>`.replace(/"/g, '&quot;');
        
        // Final code with max-width:100% for responsiveness
        const finalCode = `<iframe srcdoc="${srcDoc}" width="${config.w}" height="${config.h}" frameborder="0" scrolling="no" style="width:100%; max-width:${config.w}px; height:${config.h}px; border:none; overflow:hidden; display:block; margin:0 auto;"></iframe>`;
        
        document.getElementById('codeOutput').value = finalCode;
    }

    function copyCode() {
        const copyText = document.getElementById("codeOutput");
        copyText.select();
        document.execCommand("copy");
        const btn = document.querySelector('.copy-btn');
        const oldText = btn.innerText;
        btn.innerText = "Copied!";
        setTimeout(() => btn.innerText = oldText, 2000);
    }

    document.getElementById('refUrl').addEventListener('input', updateWidget);
    // Initial Load
    updateWidget();
</script>

</body>
</html>

```
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
