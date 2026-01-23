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
<div id="us-widget-tool">
    <style>
        /* Tool Container - 65% Width & Centered */
        #us-widget-tool {
            width: 65%;
            margin: 0 auto;
            min-width: 320px;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: #1e293b;
            color: #f8fafc;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            box-sizing: border-box;
        }

        #us-widget-tool h2 {
            margin: 0 0 20px 0;
            text-align: center;
            font-size: 1.4rem;
            background: linear-gradient(to right, #fff, #cbd5e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Controls Section */
        #us-widget-tool .us-controls {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 20px;
            border-bottom: 1px solid #334155;
            padding-bottom: 20px;
        }

        #us-widget-tool label {
            display: block;
            font-size: 0.75rem;
            color: #94a3b8;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        /* Size Selector Buttons */
        #us-widget-tool .us-size-selector {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        #us-widget-tool .us-size-btn {
            flex: 1;
            padding: 10px;
            border: 1px solid #334155;
            background: #0f172a;
            color: #94a3b8;
            border-radius: 6px;
            cursor: pointer;
            text-align: center;
            font-size: 0.85rem;
            transition: all 0.2s;
        }

        #us-widget-tool .us-size-btn:hover { background: #1e293b; border-color: #6366f1; color: white; }
        #us-widget-tool .us-size-btn.active { background: #6366f1; color: white; border-color: #6366f1; box-shadow: 0 0 10px rgba(99, 102, 241, 0.3); }

        /* Preview Area */
        #us-widget-tool .us-preview-wrapper {
            background: #0f172a;
            border: 2px dashed #334155;
            border-radius: 8px;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 150px;
            margin-bottom: 20px;
            position: relative;
        }
        
        #us-widget-tool .us-preview-label {
            position: absolute; top: 8px; left: 10px; font-size: 10px; color: #475569; text-transform: uppercase;
        }

        #usPreviewContainer { max-width: 100%; display: flex; justify-content: center; }

        /* Code Output Area */
        #us-widget-tool textarea {
            width: 100%;
            height: 80px;
            background: #0b1120;
            border: 1px solid #334155;
            color: #cbd5e1;
            padding: 12px;
            border-radius: 6px;
            font-family: monospace;
            font-size: 0.8rem;
            resize: none;
            box-sizing: border-box;
            display: block;
        }

        #us-widget-tool .us-copy-btn {
            background: linear-gradient(135deg, #6366f1, #a855f7);
            color: white; border: none; padding: 10px 20px; border-radius: 6px; font-weight: bold; cursor: pointer; font-size: 0.9rem;
            margin-top: 10px; float: right;
        }
        
        /* Clearfix for float */
        #us-widget-tool::after { content: ""; display: table; clear: both; }

        /* Responsive Mobile Tweaks */
        @media (max-width: 600px) {
            #us-widget-tool { width: 95%; padding: 15px; }
            #us-widget-tool .us-size-selector { flex-direction: row; }
        }
    </style>

    <h2>Widget Generator</h2>
    
    <div class="us-controls">
        <div>
            <label>Select Widget Design</label>
            <div class="us-size-selector">
                <div class="us-size-btn active" onclick="usSetSize('sidebar')">Sidebar<br><small>300px</small></div>
                <div class="us-size-btn" onclick="usSetSize('banner')">Banner<br><small>728px</small></div>
                <div class="us-size-btn" onclick="usSetSize('large')">Large<br><small>970px</small></div>
            </div>
        </div>
    </div>

    <div class="us-preview-wrapper">
        <span class="us-preview-label">Preview</span>
        <div id="usPreviewContainer"></div>
    </div>

    <div>
        <label>Copy Code</label>
        <textarea id="usCodeOutput" readonly></textarea>
        <button class="us-copy-btn" onclick="usCopyCode(this)">Copy Code</button>
    </div>
</div>

<script>
    (function(){
        // --- CONFIG ---
        const LOGO = "https://upcomingsounds.com/images/logo.png";
        let currentSize = 'sidebar';
        
        // --- AUTO-DETECT REFERRAL LINK ---
        function getReferralLink() {
            // 1. Search for any input field that contains '/ref/' in its value
            const inputs = document.getElementsByTagName('input');
            for(let i=0; i<inputs.length; i++) {
                if(inputs[i].value && inputs[i].value.includes('/ref/')) {
                    return inputs[i].value;
                }
            }
            // 2. Search for any visible link that contains '/ref/'
            const links = document.getElementsByTagName('a');
            for(let i=0; i<links.length; i++) {
                if(links[i].href && links[i].href.includes('/ref/')) {
                    return links[i].href;
                }
            }
            // 3. Fallback (if the user is looking at the tool but not logged in/no link found)
            return "https://upcomingsounds.com/";
        }

        const layouts = {
            sidebar: { w: 300, h: 250, cls: 'us-layout-sidebar' },
            banner: { w: 728, h: 90, cls: 'us-layout-banner' },
            large: { w: 970, h: 250, cls: 'us-layout-large' }
        };

        window.usSetSize = function(size) {
            currentSize = size;
            document.querySelectorAll('#us-widget-tool .us-size-btn').forEach(b => b.classList.remove('active'));
            event.target.closest('.us-size-btn').classList.add('active');
            usUpdate();
        };

        window.usCopyCode = function(btn) {
            const txt = document.getElementById("usCodeOutput");
            txt.select();
            document.execCommand("copy");
            const oldText = btn.innerText;
            btn.innerText = "Copied!";
            setTimeout(() => btn.innerText = oldText, 2000);
        };

        function usUpdate() {
            // Grab the link dynamically every time we update
            const url = getReferralLink();
            const cfg = layouts[currentSize];
            
            // Render Preview
            const previewHTML = `
                <style>
                    .us-w-root { font-family:sans-serif; background:linear-gradient(135deg,#111,#222); color:#fff; display:flex; box-sizing:border-box; position:relative; overflow:hidden; border:1px solid #333; }
                    .us-w-img { display:block; object-fit:contain; max-width:100%; }
                    .us-w-cta { background:#fff; color:#000; text-decoration:none; padding:6px 12px; border-radius:20px; font-size:11px; font-weight:700; white-space:nowrap; transition:0.2s; }
                    .us-w-cta:hover { background:#e2e8f0; }
                    .us-w-slider { overflow:hidden; position:relative; display:flex; align-items:center; justify-content:center; }
                    .us-w-track { display:flex; flex-direction:column; text-align:center; animation:usS 9s infinite cubic-bezier(.4,0,.2,1); }
                    .us-w-item { display:flex; align-items:center; justify-content:center; line-height:1.2; color:#ddd; text-align:center; padding:0 4px; }
                    @keyframes usS { 0%,25%{transform:translateY(0)} 33%,58%{transform:translateY(-100%)} 66%,92%{transform:translateY(-200%)} 100%{transform:translateY(0)} }
                    /* Layouts */
                    .us-layout-sidebar { flex-direction:column; align-items:center; justify-content:center; padding:15px; }
                    .us-layout-sidebar .us-w-img { height:40px; margin-bottom:8px; }
                    .us-layout-sidebar .us-w-slider { width:100%; height:50px; margin-bottom:8px; }
                    .us-layout-sidebar .us-w-item { height:100%; font-size:13px; }
                    .us-layout-banner { flex-direction:row; align-items:center; justify-content:space-between; padding:0 20px; }
                    .us-layout-banner .us-w-img { height:30px; margin-right:12px; }
                    .us-layout-banner .us-w-slider { flex:1; height:40px; margin:0 10px; }
                    .us-layout-banner .us-w-item { height:100%; font-size:14px; }
                    .us-layout-large { flex-direction:row; align-items:center; justify-content:space-around; padding:0 30px; }
                    .us-layout-large .us-w-img { height:50px; }
                    .us-layout-large .us-w-slider { width:50%; height:70px; }
                    .us-layout-large .us-w-item { height:100%; font-size:18px; }
                    /* Preview Mobile Fix */
                    @media(max-width:600px){ .us-layout-large { flex-direction:column; padding:10px; text-align:center; } .us-layout-large .us-w-slider { width:100%; margin:10px 0; } }
                </style>
                <div class="us-w-root ${cfg.cls}" style="width:${cfg.w}px; height:${cfg.h}px; max-width:100%;">
                    <img src="${LOGO}" class="us-w-img">
                    <div class="us-w-slider"><div class="us-w-track">
                        <div class="us-w-item">Submit your music to my playlist</div>
                        <div class="us-w-item">Join our community for free</div>
                        <div class="us-w-item">Be heard on UpcomingSounds.com</div>
                    </div></div>
                    <a href="${url}" target="_blank" class="us-w-cta">Get Started</a>
                </div>`;
            
            document.getElementById('usPreviewContainer').innerHTML = previewHTML;

            // Generate Embed Code (Compressed)
            const css = `<style>body{margin:0;overflow:hidden;font-family:sans-serif}.us-root{width:100%;height:100%;background:linear-gradient(135deg,#111,#222);color:#fff;display:flex;box-sizing:border-box;position:relative;border:1px solid #333}.us-logo{display:block;object-fit:contain;max-width:100%}.us-cta{background:#fff;color:#000;text-decoration:none;padding:8px 16px;border-radius:20px;font-size:12px;font-weight:700;white-space:nowrap}.us-slider{overflow:hidden;position:relative;display:flex;align-items:center;justify-content:center}.us-track{display:flex;flex-direction:column;text-align:center;animation:s 9s infinite cubic-bezier(.4,0,.2,1)}.us-item{display:flex;align-items:center;justify-content:center;line-height:1.3;color:#ddd;text-align:center;padding:0 5px}@keyframes s{0%,25%{transform:translateY(0)}33%,58%{transform:translateY(-100%)}66%,92%{transform:translateY(-200%)}100%{transform:translateY(0)}}.us-s{flex-direction:column;align-items:center;justify-content:center;padding:20px}.us-s .us-logo{height:50px;margin-bottom:10px}.us-s .us-slider{width:100%;height:60px;margin-bottom:10px}.us-s .us-item{height:100%;font-size:14px}.us-b{flex-direction:row;align-items:center;justify-content:space-between;padding:0 25px}.us-b .us-logo{height:40px;margin-right:15px;flex-shrink:0}.us-b .us-slider{flex:1;height:50px;margin:0 10px}.us-b .us-item{height:100%;font-size:16px}.us-b .us-cta{flex-shrink:0}.us-l{flex-direction:row;align-items:center;justify-content:space-around;padding:0 40px}.us-l .us-logo{height:60px}.us-l .us-slider{width:50%;height:80px}.us-l .us-item{height:100%;font-size:22px}@media(max-width:600px){.us-b{padding:0 10px}.us-b .us-logo{height:28px}.us-b .us-item{font-size:12px}.us-l{flex-direction:column;justify-content:center;padding:20px;text-align:center}.us-l .us-logo{margin-bottom:10px}.us-l .us-slider{width:100%}}</style>`;
            
            let frameClass = 'us-s';
            if(currentSize === 'banner') frameClass = 'us-b';
            if(currentSize === 'large') frameClass = 'us-l';

            const html = `<div class="us-root ${frameClass}"><img src="${LOGO}" class="us-logo"><div class="us-slider"><div class="us-track"><div class="us-item">Submit your music to my playlist</div><div class="us-item">Join our community for free</div><div class="us-item">Be heard on UpcomingSounds.com</div></div></div><a href="${url}" target="_blank" class="us-cta">Get Started</a></div>`;
            const srcDoc = `<html><head>${css}</head><body>${html}</body></html>`.replace(/"/g, '&quot;');
            
            const code = `<iframe srcdoc="${srcDoc}" width="${cfg.w}" height="${cfg.h}" style="width:100%;max-width:${cfg.w}px;height:${cfg.h}px;border:none;display:block;margin:0 auto;" scrolling="no" frameborder="0"></iframe>`;
            
            document.getElementById('usCodeOutput').value = code;
        }

        // Initialize on load
        usUpdate();
    })();
</script>
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
