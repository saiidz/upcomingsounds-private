<div class="col-lg-{{(Request::is('dashboard') == 'true') ? 4 : 3}} w-xxl w-auto-md">
    <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
        
        {{-- Activity Section --}}
        @if(Request::is('dashboard') == 'true')
            <div id="coverageCurator" class="m-b" style="background-color: #373a3c; border-radius: 8px; padding: 15px;">
                <h6 class="text-center text-white">Your Monthly Activity</h6>
                <div class="text-center text-white">
                    <span class="amount activeAmount" style="font-size: 14px;">Status: Active</span>
                    <img class="icon_UP" style="width:20px; margin-left: 5px;" src="{{asset('images/coin_bg.png')}}">
                </div>
            </div>
        @endif

        @if (Auth::check())
            {{-- Verification Check --}}
            @if (auth()->user()->is_verified != 1)
                <div class="getVerified">
                    <a class="btn btn-sm rounded primary m-b-2 text-white" href="{{ route('curator.get.verified') }}">Get Verified</a>
                </div>
            @endif

            {{-- FIXED REFERRAL BOX --}}
            <div class="bgGradient p-a m-b" style="background: #f8f9fa; border: 1px solid #dee2e6; border-radius: 8px;">
                <h6 class="text text-muted _600" style="margin-bottom: 10px;">Referral Program</h6>
                <p class="text-sm" style="line-height: 1.4; color: #444;">
                    <strong>BE A PART OF THE GROWTH!</strong><br>
                    Refer artists and earn <strong>10 USC</strong> or the equivalent per sign-up. Help them develop their career and grow our community!
                </p>

                @php $referrals = auth()->user()->getReferrals(); @endphp
                @if (!empty($referrals) && $referrals->count() > 0)
                    @foreach($referrals as $referral)
                        <label class="text-muted text-xs m-t-sm">Your Referral Link:</label>
                        <input class="form-control" value="{{ $referral->link }}" readonly style="font-size: 11px; background: #fff;">
                        <p class="text-xs m-t-xs">Users referred: {{ \App\Models\ReferralRelationship::where('referral_link_id',$referral->id)->count() }}</p>
                    @endforeach
                @else
                    <div class="alert alert-info text-xs" style="margin-top: 10px; padding: 8px;">
                        Invite artists to join! Your unique link will appear here once activated.
                    </div>
                @endif
            </div>

            {{-- FIXED WIDGET TOOL --}}
            <div id="us-widget-tool" style="background: #1e293b; color: white; border-radius: 12px; padding: 15px; width: 100% !important; box-sizing: border-box;">
                <style>
                    #us-widget-tool h6 { color: #fff; margin-bottom: 12px; font-size: 13px; }
                    .us-btn-row { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 4px; margin-bottom: 10px; }
                    .us-btn-row button { padding: 6px 2px; font-size: 10px; background: #0f172a; border: 1px solid #334155; color: #94a3b8; border-radius: 4px; cursor: pointer; }
                    .us-btn-row button.active { background: #02b875; color: white; border-color: #02b875; }
                    #us-widget-tool textarea { width: 100%; height: 50px; background: #0b1120; color: #cbd5e1; font-size: 10px; padding: 8px; border-radius: 4px; border: 1px solid #334155; resize: none; }
                    .us-copy-btn { width: 100%; background: #02b875; border: none; color: white; padding: 10px; border-radius: 6px; margin-top: 8px; font-weight: bold; cursor: pointer; font-size: 12px; }
                </style>
                
                <h6>Widget Generator</h6>
                <div class="us-btn-row">
                    <button class="active" onclick="usSetSize('sidebar')">Sidebar</button>
                    <button onclick="usSetSize('banner')">Banner</button>
                    <button onclick="usSetSize('large')">Large</button>
                </div>
                <textarea id="usCodeOutput" readonly placeholder="Widget code will appear here..."></textarea>
                <button class="us-copy-btn" onclick="usCopyCode(this)">Copy Code</button>
            </div>
        @endif

        {{-- Footer Links --}}
        <div class="nav text-sm _600 m-t-lg">
            <a href="{{ url('about-us') }}" class="nav-link text-muted m-r-xs">About</a>
            <a href="{{ url('contact-us') }}" class="nav-link text-muted m-r-xs">Contact</a>
            <a href="{{ url('term-of-service') }}" class="nav-link text-muted m-r-xs">Terms</a>
            <a href="{{ url('privacy-policy') }}" class="nav-link text-muted m-r-xs">Privacy</a>
        </div>
        <p class="text-muted text-xs m-t-sm">&copy; {{ date('Y') }} Upcoming Sounds</p>
    </div>
</div>

<script>
    function usCopyCode(btn) { 
        var copyText = document.getElementById("usCodeOutput");
        copyText.select();
        document.execCommand("copy");
        var original = btn.innerText;
        btn.innerText = "Copied!";
        setTimeout(function(){ btn.innerText = original; }, 2000);
    }
    function usSetSize(size) {
        // Your logic for setting widget size
        console.log("Size set to: " + size);
    }
</script>
