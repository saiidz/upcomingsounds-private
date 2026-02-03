<div class="col-lg-{{(Request::is('dashboard') == 'true') ? 4 : 3}} w-xxl w-auto-md">
    <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
        
        @if(Request::is('dashboard') == 'true')
            {{-- ACTIVITY TRACKER --}}
            <div id="coverageCurator" class="m-b" style="background-color: #373a3c;">
                <div class="padding">
                    <h6 class="text-center text-white">Your Monthly Activity</h6>
                    @php $countSubmitCoverages = !empty($submitCoverages) ? $submitCoverages->count() : 0; @endphp
                    <div class="text-center text-white">
                        <span class="text">
                            @if($countSubmitCoverages >= 500 && $countSubmitCoverages < 900)
                                <span class="amount activeAmount">25</span> USC
                            @elseif($countSubmitCoverages >= 900 && $countSubmitCoverages < 1200)
                                <span class="amount activeAmount">45</span> USC
                            @elseif($countSubmitCoverages >= 1200 && $countSubmitCoverages < 1400)
                                <span class="amount activeAmount">63 USC</span>
                            @elseif($countSubmitCoverages >= 1400 && $countSubmitCoverages < 1550)
                                <span class="amount activeAmount">79</span> USC
                            @elseif($countSubmitCoverages >= 1550)
                                <span class="amount activeAmount">91</span> USC
                            @else
                                <span class="amount">0 USC</span>
                            @endif
                            <img class="icon_UP" style="width:25px; height:25px;" src="{{asset('images/coin_bg.png')}}">
                        </span>
                    </div>

                    <div class="progress m-t" style="overflow: unset !important;">
                        <div style="justify-content: space-between; align-items: center; display: flex;">
                            <span class="text-white text-xs">0</span>
                            <span class="text-white text-xs">25</span>
                            <span class="text-white text-xs">45</span>
                            <span class="text-white text-xs">63</span>
                            <span class="text-white text-xs">91</span>
                        </div>
                        <div style="display: flex; height: 30px;">
                            <div class="progress-bar {{ $countSubmitCoverages >= 500 ? 'green' : 'grey-50' }}" style="width: 20%;"></div>
                            <div class="progress-bar {{ $countSubmitCoverages >= 900 ? 'green' : 'grey-50' }}" style="width: 20%;"></div>
                            <div class="progress-bar {{ $countSubmitCoverages >= 1200 ? 'green' : 'grey-50' }}" style="width: 20%;"></div>
                            <div class="progress-bar {{ $countSubmitCoverages >= 1400 ? 'green' : 'grey-50' }}" style="width: 20%;"></div>
                            <div class="progress-bar {{ $countSubmitCoverages >= 1550 ? 'green' : 'grey-50' }}" style="width: 20%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (Auth::check() && auth()->user()->is_verified != 1)
            <div class="getVerified m-b">
                <a class="btn btn-sm rounded primary btn-block text-white" href="{{ route('curator.get.verified') }}">get verified</a>
            </div>
        @endif

        @if (Auth::check() && !empty(auth()->user()->getReferrals()))
            @foreach(auth()->user()->getReferrals() as $referral)
                <div class="bgGradient">
                    <h6 class="text text-muted">Referral Program</h6>
                    <input id="tastemaker_name" class="form-control" value="{{ $referral->link }}" readonly>
                    <p class="m-t-sm text-xs">Referred users: {{ \App\Models\ReferralRelationship::where('referral_link_id',$referral->id)->get()->filter(fn($r) => !empty($r->campaign))->count() }}</p>

                    <div class="b-b m-y" style="opacity:0.1"></div>

                    <div id="us-widget-tool">
                        <style>
                            .us-label { color: #888; font-size: 10px; text-transform: uppercase; margin-top: 10px; display: block; }
                            .us-size-btn { flex: 1; padding: 6px; background: #222; border: 1px solid #444; color: #888; border-radius: 4px; cursor: pointer; text-align: center; font-size: 10px; }
                            .us-size-btn.active { background: #02b875; color: #fff; border-color: #02b875; }
                            .us-preview { background: #111; border: 1px solid #333; border-radius: 6px; padding: 10px; margin: 10px 0; display: flex; align-items: center; justify-content: center; overflow: hidden; }
                            .us-input-box { width: 100%; background: #111; border: 1px solid #333; color: #02b875; font-family: monospace; font-size: 10px; padding: 6px; border-radius: 4px; }
                        </style>

                        <h6 class="text-white">Widget Generator</h6>
                        <div style="display: flex; gap: 5px; margin-bottom: 10px;">
                            <div class="us-size-btn active" data-size="sidebar" onclick="usSetSize('sidebar')">Sidebar</div>
                            <div class="us-size-btn" data-size="banner" onclick="usSetSize('banner')">Banner</div>
                            <div class="us-size-btn" data-size="large" onclick="usSetSize('large')">Large</div>
                        </div>

                        <div class="us-preview" id="usPreviewContainer"></div>

                        <span class="us-label">Direct Referral Link:</span>
                        <div class="input-group">
                            <input id="usActiveLinkDisplay" class="us-input-box" readonly>
                            <span class="input-group-btn">
                                <button class="btn btn-xs white" style="height:27px" onclick="usCopyLink(this)">Copy Link</button>
                            </span>
                        </div>

                        <span class="us-label">Embed Code:</span>
                        <textarea id="usCodeOutput" class="us-input-box m-b-sm" style="height: 50px;" readonly></textarea>
                        <button class="btn btn-xs primary btn-block" onclick="usCopyEmbed(this)">Copy Embed Code</button>
                    </div>
                </div>
            @endforeach
        @endif

        <div class="b-b m-y" style="opacity:0.1"></div>
        <div class="nav text-sm _600">
            <a href="{{ url('about-us') }}" class="nav-link text-muted m-r-xs">About</a>
            <a href="{{ url('contact-us') }}" class="nav-link text-muted m-r-xs">Contact</a>
            <a href="{{ url('privacy-policy') }}" class="nav-link text-muted m-r-xs">Privacy</a>
        </div>
        <p class="text-muted text-xs p-b-lg">&copy; {{ date('Y') }}</p>
    </div>
</div>

<script>
window.addEventListener('load', function() {
    const LOGO = "https://upcomingsounds.com/images/logo.png";
    let currentSize = 'sidebar';
    const layouts = { sidebar: { w: 300, h: 250, cls: 'us-s' }, banner: { w: 728, h: 90, cls: 'us-b' }, large: { w: 970, h: 250, cls: 'us-l' } };

    window.usSetSize = size => { currentSize = size; document.querySelectorAll('.us-size-btn').forEach(b => b.classList.toggle('active', b.getAttribute('data-size') === size)); usUpdate(); };

    window.usCopyLink = btn => { document.getElementById("usActiveLinkDisplay").select(); document.execCommand("copy"); const old = btn.innerText; btn.innerText = "Done!"; setTimeout(() => btn.innerText = old, 2000); };

    window.usCopyEmbed = btn => { document.getElementById("usCodeOutput").select(); document.execCommand("copy"); btn.innerText = "Copied!"; setTimeout(() => btn.innerText = "Copy Embed Code", 2000); };

    function usUpdate() {
        const refLink = document.getElementById('tastemaker_name').value;
        document.getElementById('usActiveLinkDisplay').value = refLink;
        const cfg = layouts[currentSize];
        const css = `<style>body{margin:0;overflow:hidden;font-family:sans-serif}.root{width:100%;height:100%;background:linear-gradient(135deg,#111,#222);color:#fff;display:flex;box-sizing:border-box;position:relative;border:1px solid #333}.logo{display:block;object-fit:contain;max-width:100%}.cta{background:#fff;color:#000;text-decoration:none;padding:8px 16px;border-radius:20px;font-size:12px;font-weight:700;white-space:nowrap}.slider{overflow:hidden;position:relative;display:flex;align-items:center;justify-content:center;flex:1}.track{display:flex;flex-direction:column;text-align:center;animation:s 9s infinite cubic-bezier(.4,0,.2,1);width:100%}.item{height:100%;display:flex;align-items:center;justify-content:center;line-height:1.3;color:#ddd;text-align:center;padding:0 5px}@keyframes s{0%,25%{transform:translateY(0)}33%,58%{transform:translateY(-100%)}66%,92%{transform:translateY(-200%)}100%{transform:translateY(0)}}.us-s{flex-direction:column;align-items:center;justify-content:center;padding:20px}.us-s .logo{height:50px;margin-bottom:10px}.us-s .slider{height:60px;margin-bottom:10px}.us-b{flex-direction:row;align-items:center;justify-content:space-between;padding:0 25px}.us-b .logo{height:40px;margin-right:15px}.us-l{flex-direction:row;align-items:center;justify-content:space-around;padding:0 40px}.us-l .logo{height:60px}</style>`;
        const html = `<div class="root ${cfg.cls}"><img src="${LOGO}" class="logo"><div class="slider"><div class="track"><div class="item">Submit your music</div><div class="item">Join our community</div><div class="item">Be heard</div></div></div><a href="${refLink}" target="_blank" class="cta">Get Started</a></div>`;
        const srcDoc = `<html><head>${css}</head><body>${html}</body></html>`.replace(/"/g, '&quot;');
        const code = `<iframe srcdoc="${srcDoc}" width="${cfg.w}" height="${cfg.h}" style="width:100%;max-width:${cfg.w}px;height:${cfg.h}px;border:none;display:block;margin:0 auto;" scrolling="no" frameborder="0"></iframe>`;
        document.getElementById('usCodeOutput').value = code;
        document.getElementById('usPreviewContainer').innerHTML = `<div style="transform: scale(${currentSize === 'sidebar' ? 0.4 : 0.2}); transform-origin: center;">${code.replace('width="100%"', `width="${cfg.w}"`)}</div>`;
    }
    usUpdate();
});
</script>
