<div class="col-lg-{{(Request::is('dashboard') == 'true') ? 4 : 3}} w-xxl w-auto-md">
    <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
        
        {{-- 1. MONTHLY ACTIVITY TRACKER (Dashboard Only) --}}
        @if(Request::is('dashboard') == 'true')
            <div id="coverageCurator" class="m-b" style="background-color: #373a3c; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.2);">
                <div class="padding">
                    <h6 class="text-center text-white m-b-sm">Your Monthly Activity</h6>
                    @php
                        $countSubmitCoverages = !empty($submitCoverages) ? $submitCoverages->count() : 0;
                        // Use your existing Tier constants
                        $tiersOne = \App\Templates\ITiers::TEARS_ONE;
                    @endphp
                    
                    <div class="text-center text-white m-b">
                        <span class="text">
                            @if($countSubmitCoverages >= 500 && $countSubmitCoverages < 900)
                                <span class="amount activeAmount" style="font-size: 1.5rem; font-weight: bold; color: #02b875;">25</span> USC
                            @elseif($countSubmitCoverages >= 900 && $countSubmitCoverages < 1200)
                                <span class="amount activeAmount" style="font-size: 1.5rem; font-weight: bold; color: #02b875;">45</span> USC
                            @elseif($countSubmitCoverages >= 1200 && $countSubmitCoverages < 1400)
                                <span class="amount activeAmount" style="font-size: 1.5rem; font-weight: bold; color: #02b875;">63</span> USC
                            @elseif($countSubmitCoverages >= 1400 && $countSubmitCoverages < 1550)
                                <span class="amount activeAmount" style="font-size: 1.5rem; font-weight: bold; color: #02b875;">79</span> USC
                            @elseif($countSubmitCoverages >= 1550)
                                <span class="amount activeAmount" style="font-size: 1.5rem; font-weight: bold; color: #02b875;">91</span> USC
                            @else
                                <span class="amount" style="font-size: 1.5rem; font-weight: bold;">0 USC</span>
                            @endif
                            <img class="icon_UP" style="width:25px; height:25px; vertical-align: middle;" src="{{asset('images/coin_bg.png')}}">
                        </span>
                    </div>

                    <div class="progress" style="overflow: unset !important; background: transparent; height: auto;">
                        <div style="justify-content: space-between; align-items: center; display: flex; margin-bottom: 5px;">
                            <span class="text-white" style="font-size: 10px;">0 <img src="{{asset('images/coin_bg.png')}}" width="8"></span>
                            <span class="text-white" style="font-size: 10px;">25 <img src="{{asset('images/coin_bg.png')}}" width="8"></span>
                            <span class="text-white" style="font-size: 10px;">45 <img src="{{asset('images/coin_bg.png')}}" width="8"></span>
                            <span class="text-white" style="font-size: 10px;">63 <img src="{{asset('images/coin_bg.png')}}" width="8"></span>
                            <span class="text-white" style="font-size: 10px;">91 <img src="{{asset('images/coin_bg.png')}}" width="8"></span>
                        </div>
                        
                        <div style="display: flex; height: 25px; background: #232526; border-radius: 4px; overflow: hidden;">
                            <div class="progress-bar {{ $countSubmitCoverages >= 500 ? 'green' : 'grey-50' }}" style="width: 20%; border-right: 1px solid #373a3c;"></div>
                            <div class="progress-bar {{ $countSubmitCoverages >= 900 ? 'green' : 'grey-50' }}" style="width: 20%; border-right: 1px solid #373a3c;"></div>
                            <div class="progress-bar {{ $countSubmitCoverages >= 1200 ? 'green' : 'grey-50' }}" style="width: 20%; border-right: 1px solid #373a3c;"></div>
                            <div class="progress-bar {{ $countSubmitCoverages >= 1400 ? 'green' : 'grey-50' }}" style="width: 20%; border-right: 1px solid #373a3c;"></div>
                            <div class="progress-bar {{ $countSubmitCoverages >= 1550 ? 'green' : 'grey-50' }}" style="width: 20%;"></div>
                        </div>
                    </div>

                    <div class="text-white m-t-sm text-center">
                        @php $progress = ($countSubmitCoverages / 500) * 100; @endphp
                        <small style="font-size: 11px; opacity: 0.8;">
                            {{ $countSubmitCoverages < 1550 ? 'You are '.round($progress, 1).'% to your next pay level' : 'Maximum Tier Reached!' }}
                        </small>
                    </div>

                    @if(in_array($countSubmitCoverages, [500, 900, 1200, 1400]) || $countSubmitCoverages >= 1550)
                        <div class="text-center m-t-sm">
                            <a class="btn btn-xs rounded primary text-white" onclick="addToWalletUSC()" href="javascript:void(0)">Claim USC</a>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        {{-- 2. GET VERIFIED (Hides automatically after Admin Approval) --}}
        @if (Auth::check() && auth()->user()->is_verified != 1)
            <div class="getVerified m-b" id="getNoVerified">
                <a class="btn btn-sm rounded primary btn-block text-white" href="{{ route('curator.get.verified') }}">
                    <i class="fa fa-shield m-r-xs"></i> Get Verified
                </a>
                <p class="text-muted text-center m-t-xs" style="font-size: 10px;">Unlock exclusive features & faster payouts.</p>
            </div>
        @endif

        {{-- 3. REFERRAL PROGRAM & WIDGET GENERATOR --}}
        @if (Auth::check() && auth()->user())
            @if (!empty(auth()->user()->getReferrals()))
                @foreach(auth()->user()->getReferrals() as $referral)
                    <div class="bgGradient padding m-b" style="background: #2e3133; border-radius: 12px; border: 1px solid #3d4043;">
                        <h6 class="text text-muted" style="font-size: 12px; text-transform: uppercase;">Referral Program</h6>
                        <p class="text-xs m-b-sm">Earn 10 USC for every artist you refer to the platform.</p>
                        
                        <label class="text-muted" style="font-size: 10px;">YOUR PERSONAL LINK</label>
                        <input id="tastemaker_name" class="form-control input-sm m-b-sm" style="background: #1a1c1d; border: 1px solid #444; color: #02b875;" value="{{ $referral->link }}" readonly>
                        
                        @php
                            $relationships = \App\Models\ReferralRelationship::where('referral_link_id',$referral->id)->get();
                            $validRefs = $relationships->filter(fn($r) => !empty($r->campaign))->count();
                        @endphp
                        <p class="text-sm">Total Referrals: <strong class="text-white">{{ $validRefs }}</strong></p>

                        <hr style="border-top: 1px solid #444; margin: 15px 0;">

                        {{-- WIDGET GENERATOR TOOL --}}
                        <div id="us-widget-tool">
                            <style>
                                #us-widget-tool h2 { font-size: 12px; color: #fff; text-transform: uppercase; margin-bottom: 10px; display: flex; justify-content: space-between; }
                                .us-size-btn { flex: 1; padding: 5px; background: #1a1c1d; border: 1px solid #444; border-radius: 4px; font-size: 10px; cursor: pointer; text-align: center; color: #999; }
                                .us-size-btn.active { background: #02b875; color: white; border-color: #02b875; }
                                .us-preview-area { background: #111; border-radius: 6px; padding: 10px; margin: 10px 0; min-height: 60px; display: flex; align-items: center; justify-content: center; overflow: hidden; }
                                #usCodeOutput { width: 100%; height: 50px; background: #000; border: 1px solid #444; color: #aaa; font-family: monospace; font-size: 9px; padding: 5px; border-radius: 4px; }
                                .us-copy-btn { width: 100%; background: #02b875; border: none; color: white; padding: 7px; margin-top: 8px; border-radius: 4px; font-weight: bold; cursor: pointer; font-size: 11px; }
                            </small></style>

                            <h2>Widget Generator <button id="usToggleBtn" style="background:none; border:none; color:#555; cursor:pointer;" onclick="usToggleTool()">Hide</button></h2>
                            
                            <div id="us-widget-content">
                                <div style="display: flex; gap: 5px;">
                                    <div class="us-size-btn active" onclick="usSetSize('sidebar')">Sidebar</div>
                                    <div class="us-size-btn" onclick="usSetSize('banner')">Banner</div>
                                    <div class="us-size-btn" onclick="usSetSize('large')">Large</div>
                                </div>

                                <div class="us-preview-area" id="usPreviewContainer"></div>

                                <textarea id="usCodeOutput" readonly></textarea>
                                <button class="us-copy-btn" onclick="usCopyCode(this)">Copy Widget Code</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        @endif

        {{-- 4. FOOTER LINKS & COPYRIGHT --}}
        <div class="b-b m-y-sm" style="opacity: 0.1;"></div>
        <div class="nav text-sm _600">
            <a href="{{ url('about-us') }}" class="nav-link text-muted m-r-xs">About</a>
            <a href="{{ url('contact-us') }}" class="nav-link text-muted m-r-xs">Contact</a>
            <a href="{{ url('term-of-service') }}" class="nav-link text-muted m-r-xs">Terms</a>
            <a href="{{ url('privacy-policy') }}" class="nav-link text-muted m-r-xs">Privacy</a>
        </div>
        <p class="text-muted text-xs p-b-lg m-t-sm">&copy; Copyright {{ date('Y') }} Upcoming Sounds</p>
    </div>
</div>

<script>
window.addEventListener('load', function() {
    const LOGO = "https://upcomingsounds.com/images/logo.png";
    let currentSize = 'sidebar';
    const content = document.getElementById('us-widget-content');
    const btn = document.getElementById('usToggleBtn');

    if (localStorage.getItem('usWidgetState') === 'hidden') {
        content.style.display = 'none';
        btn.innerText = 'Show';
    }

    window.usToggleTool = function() {
        const isHidden = content.style.display === 'none';
        content.style.display = isHidden ? 'block' : 'none';
        btn.innerText = isHidden ? 'Hide' : 'Show';
        localStorage.setItem('usWidgetState', isHidden ? 'visible' : 'hidden');
    };

    function getReferralLink() {
        const refInput = document.getElementById('tastemaker_name');
        return (refInput && refInput.value.includes('/ref/')) ? refInput.value : "https://upcomingsounds.com/";
    }

    const layouts = {
        sidebar: { w: 300, h: 250, cls: 'us-s' },
        banner: { w: 728, h: 90, cls: 'us-b' },
        large: { w: 970, h: 250, cls: 'us-l' }
    };

    window.usSetSize = function(size) {
        currentSize = size;
        document.querySelectorAll('.us-size-btn').forEach(b => {
            b.classList.toggle('active', b.innerText.toLowerCase() === size);
        });
        usUpdate();
    };

    window.usCopyCode = function(btn) {
        const txt = document.getElementById("usCodeOutput");
        txt.select();
        document.execCommand("copy");
        const old = btn.innerText;
        btn.innerText = "Copied!";
        setTimeout(() => btn.innerText = old, 2000);
    };

    function usUpdate() {
        const url = getReferralLink();
        const cfg = layouts[currentSize];
        const css = `<style>body{margin:0;overflow:hidden;font-family:sans-serif}.us-root{width:100%;height:100%;background:linear-gradient(135deg,#111,#222);color:#fff;display:flex;box-sizing:border-box;position:relative;border:1px solid #333}.us-logo{display:block;object-fit:contain;max-width:100%}.us-cta{background:#fff;color:#000;text-decoration:none;padding:8px 16px;border-radius:20px;font-size:12px;font-weight:700;white-space:nowrap}.us-slider{overflow:hidden;position:relative;display:flex;align-items:center;justify-content:center;flex:1}.us-track{display:flex;flex-direction:column;text-align:center;animation:s 9s infinite cubic-bezier(.4,0,.2,1);width:100%}.us-item{height:100%;display:flex;align-items:center;justify-content:center;line-height:1.3;color:#ddd;text-align:center;padding:0 5px}@keyframes s{0%,25%{transform:translateY(0)}33%,58%{transform:translateY(-100%)}66%,92%{transform:translateY(-200%)}100%{transform:translateY(0)}}.us-s{flex-direction:column;align-items:center;justify-content:center;padding:20px}.us-s .us-logo{height:50px;margin-bottom:10px}.us-s .us-slider{height:60px;margin-bottom:10px}.us-b{flex-direction:row;align-items:center;justify-content:space-between;padding:0 25px}.us-b .us-logo{height:40px;margin-right:15px}.us-l{flex-direction:row;align-items:center;justify-content:space-around;padding:0 40px}.us-l .us-logo{height:60px}</style>`;
        const html = `<div class="us-root ${cfg.cls}"><img src="${LOGO}" class="us-logo"><div class="us-slider"><div class="us-track"><div class="us-item">Submit your music</div><div class="us-item">Join our community</div><div class="us-item">Be heard</div></div></div><a href="${url}" target="_blank" class="us-cta">Get Started</a></div>`;
        const srcDoc = `<html><head>${css}</head><body>${html}</body></html>`.replace(/"/g, '&quot;');
        
        const code = `<iframe srcdoc="${srcDoc}" width="${cfg.w}" height="${cfg.h}" style="width:100%;max-width:${cfg.w}px;height:${cfg.h}px;border:none;display:block;margin:0 auto;" scrolling="no" frameborder="0"></iframe>`;
        
        document.getElementById('usCodeOutput').value = code;
        document.getElementById('usPreviewContainer').innerHTML = `<div style="transform: scale(${currentSize === 'sidebar' ? 0.5 : 0.25}); transform-origin: center;">${code.replace('width="100%"', `width="${cfg.w}"`)}</div>`;
    }

    usUpdate();
});
</script>
