<div class="col-lg-{{(Request::is('dashboard') == 'true') ? 4 : 3}} w-xxl w-auto-md">
    <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
        
        {{-- 1. MONTHLY ACTIVITY TRACKER --}}
        @if(Request::is('dashboard') == 'true')
            <div id="coverageCurator" class="m-b" style="background-color: #373a3c; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.2);">
                <div class="padding">
                    <h6 class="text-center text-white m-b-sm">Your Monthly Activity</h6>
                    @php
                        $countSubmitCoverages = !empty($submitCoverages) ? $submitCoverages->count() : 0;
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

                    <div style="display: flex; height: 15px; background: #232526; border-radius: 10px; overflow: hidden; margin-bottom: 10px;">
                        <div class="progress-bar {{ $countSubmitCoverages >= 500 ? 'green' : 'grey-50' }}" style="width: 20%; border-right: 1px solid #373a3c;"></div>
                        <div class="progress-bar {{ $countSubmitCoverages >= 900 ? 'green' : 'grey-50' }}" style="width: 20%; border-right: 1px solid #373a3c;"></div>
                        <div class="progress-bar {{ $countSubmitCoverages >= 1200 ? 'green' : 'grey-50' }}" style="width: 20%; border-right: 1px solid #373a3c;"></div>
                        <div class="progress-bar {{ $countSubmitCoverages >= 1400 ? 'green' : 'grey-50' }}" style="width: 20%; border-right: 1px solid #373a3c;"></div>
                        <div class="progress-bar {{ $countSubmitCoverages >= 1550 ? 'green' : 'grey-50' }}" style="width: 20%;"></div>
                    </div>

                    @if(in_array($countSubmitCoverages, [500, 900, 1200, 1400]) || $countSubmitCoverages >= 1550)
                        <div class="text-center m-t-sm">
                            <a class="btn btn-xs rounded primary text-white" onclick="addToWalletUSC()" href="javascript:void(0)">Claim USC</a>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        {{-- 2. GET VERIFIED (Hides after Admin Approval) --}}
        @if (Auth::check() && auth()->user()->is_verified != 1)
            <div class="getVerified m-b">
                <a class="btn btn-sm rounded primary btn-block text-white" href="{{ route('curator.get.verified') }}">
                    <i class="fa fa-shield m-r-xs"></i> Get Verified
                </a>
            </div>
        @endif

        {{-- 3. REFERRAL SECTION & WIDGET GENERATOR --}}
        @if (Auth::check() && !empty(auth()->user()->getReferrals()))
            @foreach(auth()->user()->getReferrals() as $referral)
                <div class="bgGradient padding m-b" style="background: #2e3133; border-radius: 12px; border: 1px solid #3d4043;">
                    <h6 class="text text-muted" style="font-size: 11px; text-transform: uppercase; letter-spacing: 1px;">Referral Program</h6>
                    
                    <div class="form-group m-t-sm">
                        <label class="text-muted" style="font-size: 10px;">YOUR UNIQUE LINK (Earnings: 10 USC/Artist)</label>
                        <div class="input-group">
                            <input id="tastemaker_name" class="form-control input-sm" style="background: #1a1c1d; border: 1px solid #444; color: #02b875;" value="{{ $referral->link }}" readonly>
                        </div>
                    </div>

                    <hr style="border-top: 1px solid #444; margin: 15px 0;">

                    {{-- WIDGET GENERATOR --}}
                    <div id="us-widget-tool">
                        <style>
                            .us-size-btn { flex: 1; padding: 5px; background: #1a1c1d; border: 1px solid #444; border-radius: 4px; font-size: 10px; cursor: pointer; text-align: center; color: #777; transition: 0.2s; }
                            .us-size-btn.active { background: #02b875; color: white; border-color: #02b875; }
                            .us-preview-area { background: #111; border-radius: 6px; padding: 10px; margin: 10px 0; min-height: 50px; display: flex; align-items: center; justify-content: center; overflow: hidden; position: relative; }
                            #usCodeOutput { width: 100%; height: 50px; background: #000; border: 1px solid #444; color: #5cffbe; font-family: monospace; font-size: 9px; padding: 5px; border-radius: 4px; overflow: hidden; }
                            .us-ref-badge { position: absolute; top: 5px; right: 5px; font-size: 8px; color: #02b875; font-weight: bold; background: rgba(2, 184, 117, 0.1); padding: 2px 5px; border-radius: 4px; }
                        </style>

                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                            <h6 style="margin:0; font-size: 11px; color: #eee;">WIDGET GENERATOR</h6>
                            <span id="refActive" style="font-size: 9px; color: #02b875;"><i class="fa fa-link"></i> Ref Link Active</span>
                        </div>
                        
                        <div style="display: flex; gap: 5px;">
                            <div class="us-size-btn active" data-size="sidebar" onclick="usSetSize('sidebar')">Sidebar</div>
                            <div class="us-size-btn" data-size="banner" onclick="usSetSize('banner')">Banner</div>
                            <div class="us-size-btn" data-size="large" onclick="usSetSize('large')">Large</div>
                        </div>

                        <div class="us-preview-area">
                            <div class="us-ref-badge">Tracking ID: {{ substr($referral->link, -6) }}</div>
                            <div id="usPreviewContainer"></div>
                        </div>

                        <textarea id="usCodeOutput" readonly></textarea>
                        <button class="btn btn-sm primary btn-block m-t-sm" style="font-weight: bold;" onclick="usCopyCode(this)">COPY WIDGET CODE</button>
                    </div>
                </div>
            @endforeach
        @endif

        {{-- 4. FOOTER --}}
        <div class="nav text-sm _600 m-t">
            <a href="{{ url('about-us') }}" class="nav-link text-muted m-r-xs">About</a>
            <a href="{{ url('contact-us') }}" class="nav-link text-muted m-r-xs">Contact</a>
            <a href="{{ url('privacy-policy') }}" class="nav-link text-muted m-r-xs">Privacy</a>
        </div>
        <p class="text-muted text-xs p-b-lg">&copy; {{ date('Y') }} Upcoming Sounds</p>
    </div>
</div>

<script>
window.addEventListener('load', function() {
    const LOGO = "https://upcomingsounds.com/images/logo.png";
    let currentSize = 'sidebar';

    const layouts = {
        sidebar: { w: 300, h: 250, cls: 'us-s' },
        banner: { w: 728, h: 90, cls: 'us-b' },
        large: { w: 970, h: 250, cls: 'us-l' }
    };

    window.usSetSize = function(size) {
        currentSize = size;
        document.querySelectorAll('.us-size-btn').forEach(b => {
            b.classList.toggle('active', b.getAttribute('data-size') === size);
        });
        usUpdate();
    };

    window.usCopyCode = function(btn) {
        const txt = document.getElementById("usCodeOutput");
        txt.select();
        document.execCommand("copy");
        const oldText = btn.innerText;
        btn.innerText = "COPIED!";
        setTimeout(() => btn.innerText = oldText, 2000);
    };

    function usUpdate() {
        const refLink = document.getElementById('tastemaker_name').value;
        const cfg = layouts[currentSize];
        
        // CSS for the iFrame content
        const css = `<style>body{margin:0;overflow:hidden;font-family:sans-serif}.root{width:100%;height:100%;background:linear-gradient(135deg,#111,#222);color:#fff;display:flex;box-sizing:border-box;position:relative;border:1px solid #333}.logo{display:block;object-fit:contain;max-width:100%}.cta{background:#fff;color:#000;text-decoration:none;padding:8px 16px;border-radius:20px;font-size:12px;font-weight:700;white-space:nowrap}.slider{overflow:hidden;position:relative;display:flex;align-items:center;justify-content:center;flex:1}.track{display:flex;flex-direction:column;text-align:center;animation:s 9s infinite cubic-bezier(.4,0,.2,1);width:100%}.item{height:100%;display:flex;align-items:center;justify-content:center;line-height:1.3;color:#ddd;text-align:center;padding:0 5px}@keyframes s{0%,25%{transform:translateY(0)}33%,58%{transform:translateY(-100%)}66%,92%{transform:translateY(-200%)}100%{transform:translateY(0)}}.us-s{flex-direction:column;align-items:center;justify-content:center;padding:20px}.us-s .logo{height:50px;margin-bottom:10px}.us-s .slider{height:60px;margin-bottom:10px}.us-b{flex-direction:row;align-items:center;justify-content:space-between;padding:0 25px}.us-b .logo{height:40px;margin-right:15px}.us-l{flex-direction:row;align-items:center;justify-content:space-around;padding:0 40px}.us-l .logo{height:60px}</style>`;
        
        // HTML for the iFrame content using the Dynamic Ref Link
        const html = `<div class="root ${cfg.cls}"><img src="${LOGO}" class="logo"><div class="slider"><div class="track"><div class="item">Submit your music</div><div class="item">Join our community</div><div class="item">Be heard</div></div></div><a href="${refLink}" target="_blank" class="cta">Get Started</a></div>`;
        
        const srcDoc = `<html><head>${css}</head><body>${html}</body></html>`.replace(/"/g, '&quot;');
        const code = `<iframe srcdoc="${srcDoc}" width="${cfg.w}" height="${cfg.h}" style="width:100%;max-width:${cfg.w}px;height:${cfg.h}px;border:none;display:block;margin:0 auto;" scrolling="no" frameborder="0"></iframe>`;
        
        document.getElementById('usCodeOutput').value = code;
        document.getElementById('usPreviewContainer').innerHTML = `<div style="transform: scale(${currentSize === 'sidebar' ? 0.45 : 0.2}); transform-origin: center;">${code.replace('width="100%"', `width="${cfg.w}"`)}</div>`;
    }

    usUpdate();
});
</script>
