<div class="col-lg-{{(Request::is('dashboard') == 'true') ? 4 : 3}} w-xxl w-auto-md">
    <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
        
        {{-- 1. FULL ACTIVITY LADDER --}}
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
                    
                    <div class="text-center text-white m-b">
                        <span class="amount activeAmount" style="font-size: 18px; font-weight: bold;">Status: Active</span>
                        <img class="icon_UP" style="width:25px; height:25px;" src="{{asset('images/coin_bg.png')}}">
                    </div>

                    <div class="progress m-b-sm" style="overflow: unset !important; height: 25px; display: flex;">
                        <div class="progress-bar {{ $countSubmitCoverages >= 500 ? 'green' : ($countSubmitCoverages >= 167 ? 'yellow' : 'grey-50') }}" style="width: 19%; margin-right: 2px; height: 100%;"></div>
                        <div class="progress-bar {{ $countSubmitCoverages >= 900 ? 'green' : ($countSubmitCoverages >= 633 ? 'yellow' : 'grey-50') }}" style="width: 19%; margin-right: 2px; height: 100%;"></div>
                        <div class="progress-bar {{ $countSubmitCoverages >= 1200 ? 'green' : ($countSubmitCoverages >= 1000 ? 'yellow' : 'grey-50') }}" style="width: 19%; margin-right: 2px; height: 100%;"></div>
                        <div class="progress-bar {{ $countSubmitCoverages >= 1400 ? 'green' : ($countSubmitCoverages >= 1267 ? 'yellow' : 'grey-50') }}" style="width: 19%; margin-right: 2px; height: 100%;"></div>
                        <div class="progress-bar {{ $countSubmitCoverages >= 1550 ? 'green' : ($countSubmitCoverages >= 1450 ? 'yellow' : 'grey-50') }}" style="width: 19%; margin-right: 2px; height: 100%;"></div>
                    </div>
                    <p class="text-white text-xs text-center">Refer to Tier levels for USC rewards</p>
                </div>
            </div>
        @endif

        {{-- 2. REVIVED REFERRAL PROGRAM (ALWAYS VISIBLE) --}}
        @if (Auth::check())
            <div class="bgGradient p-a m-b" style="border: 1px solid rgba(0,0,0,0.1); border-radius: 4px;">
                <h6 class="text text-muted _600">Referral Program</h6>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <p class="text-sm">
                            <strong>BE A PART OF THE GROWTH OF OUR COMMUNITY!</strong><br>
                            By referring artists to our platform, you will be able to help them develop their
                            career program and earn <strong>10 USC</strong> or the equivalent in British pounds per sign-up.
                        </p>
                    </div>
                </div>

                @php $referrals = auth()->user()->getReferrals(); @endphp
                @if (!empty($referrals) && $referrals->count() > 0)
                    @foreach($referrals as $referral)
                        <h6 class="text text-muted text-xs">Your Referral Link</h6>
                        <input id="tastemaker_name" class="form-control m-b-sm" value="{{ $referral->link }}" readonly style="font-size: 11px;">
                        <p class="text-xs">Number of referred users: {{ \App\Models\ReferralRelationship::where('referral_link_id',$referral->id)->count() }}</p>
                    @endforeach
                @else
                    <div class="alert alert-info text-xs">Your unique referral link will appear here once activated.</div>
                @endif
                <p class="text-xxs text-muted">*Earning potential depends on artist membership package.</p>
            </div>
        @endif

        {{-- 3. ORIGINAL WIDGET GENERATOR (65% WIDTH) --}}
        <div id="us-widget-tool">
            <style>
                #us-widget-tool { width: 65%; margin: 20px auto; min-width: 320px; font-family: -apple-system, sans-serif; background: #1e293b; color: #f8fafc; border-radius: 12px; padding: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); box-sizing: border-box; }
                #us-widget-tool h2 { margin: 0 0 15px 0; text-align: center; font-size: 1.4rem; background: linear-gradient(to right, #fff, #cbd5e1); -webkit-background-clip: text; -webkit-text-fill-color: transparent; display: flex; align-items: center; justify-content: center; gap: 10px; }
                .us-size-selector { display: flex; gap: 10px; margin-bottom: 15px; }
                .us-size-btn { flex: 1; padding: 10px; border: 1px solid #334155; background: #0f172a; color: #94a3b8; border-radius: 6px; cursor: pointer; text-align: center; font-size: 0.85rem; }
                .us-size-btn.active { background: #02b875; color: white; border-color: #02b875; }
                #us-widget-tool textarea { width: 100%; height: 80px; background: #0b1120; border: 1px solid #334155; color: #cbd5e1; padding: 12px; border-radius: 6px; resize: none; font-size: 11px; font-family: monospace; }
                .us-copy-btn { background: #02b875; color: white; border: none; padding: 10px 20px; border-radius: 6px; font-weight: bold; cursor: pointer; margin-top: 10px; float: right; }
                #us-widget-tool::after { content: ""; display: table; clear: both; }
            </style>

            <h2>Widget Generator</h2>
            <div class="us-size-selector">
                <div class="us-size-btn active" onclick="usSetSize('sidebar', this)">Sidebar</div>
                <div class="us-size-btn" onclick="usSetSize('banner', this)">Banner</div>
                <div class="us-size-btn" onclick="usSetSize('large', this)">Large</div>
            </div>
            <textarea id="usCodeOutput" readonly placeholder="Select a size to generate code..."></textarea>
            <button class="us-copy-btn" onclick="usCopyCode(this)">Copy Code</button>
        </div>

        {{-- FOOTER --}}
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

<script>
    function usSetSize(size, element) {
        document.querySelectorAll('.us-size-btn').forEach(btn => btn.classList.remove('active'));
        element.classList.add('active');
        // Add your specific widget generation JS here if needed
    }
    function usCopyCode(btn) {
        var copyText = document.getElementById("usCodeOutput");
        copyText.select();
        document.execCommand("copy");
        var original = btn.innerText;
        btn.innerText = "Copied!";
        setTimeout(function(){ btn.innerText = original; }, 2000);
    }
</script>
