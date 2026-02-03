<div class="col-lg-{{(Request::is('dashboard') == 'true') ? 4 : 3}} w-xxl w-auto-md">
    <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
        @if(Request::is('dashboard') == 'true')
            <div id="coverageCurator" class="m-b" style="background-color: #373a3c; border-radius: 8px;">
                <div class="padding">
                    <h6 class="text-center text-white">Your Monthly Activity</h6>
                    @php
                        $countSubmitCoverages = !empty($submitCoverages) ? $submitCoverages->count() : 0;
                        $tiersOne = \App\Templates\ITiers::TEARS_ONE;
                    @endphp
                    <div class="text-center text-white">
                        <span class="amount activeAmount">Status: Active</span>
                        <img class="icon_UP" style="width:25px; height:25px;" src="{{asset('images/coin_bg.png')}}">
                    </div>
                </div>
            </div>
        @endif

        @if (Auth::check() && auth()->user())
            @if (auth()->user()->is_verified != 1)
                <div class="getVerified" id="getNoVerified">
                    <a class="btn btn-sm rounded primary m-b-2 text-white" href="{{ route('curator.get.verified') }}">Get Verified</a>
                </div>
            @endif

            {{-- ALWAYS VISIBLE REFERRAL TEXT --}}
            <div class="bgGradient p-a m-b" style="background: rgba(0,0,0,0.05); border-radius: 8px; border: 1px solid rgba(0,0,0,0.1);">
                <h6 class="text text-muted _600">Referral Program</h6>
                <p class="text-sm">
                    <strong>BE A PART OF THE GROWTH OF OUR COMMUNITY!</strong><br>
                    By referring artists to our platform, you will be able to help them develop their
                    career program and earn <strong>10 USC</strong> or the equivalent in British pounds per sign-up.
                </p>

                @if (!empty(auth()->user()->getReferrals()) && auth()->user()->getReferrals()->count() > 0)
                    @foreach(auth()->user()->getReferrals() as $referral)
                        <h6 class="text text-muted text-xs m-t">Your Referral Link</h6>
                        <input id="tastemaker_name" class="form-control m-b-sm" value="{{ $referral->link }}" readonly style="font-size: 11px;">
                        <p class="text-xs">Referred users: {{ \App\Models\ReferralRelationship::where('referral_link_id',$referral->id)->count() }}</p>
                    @endforeach
                @else
                    <div class="alert alert-info text-xs m-t-sm" style="padding: 8px;">
                        Invite artists to join! Your unique referral link will appear here once activated.
                    </div>
                @endif
                <p class="text-xxs text-muted m-t-sm">*Earning potential depends on the artist membership package purchased.</p>
            </div>
        @endif

        {{-- WIDGET GENERATOR - FIXED CSS FOR SIDEBAR --}}
        <div id="us-widget-tool">
            <style>
                #us-widget-tool { width: 100% !important; font-family: sans-serif; background: #1e293b; color: #f8fafc; border-radius: 12px; padding: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); box-sizing: border-box; margin-bottom: 20px; }
                #us-widget-tool h2 { margin: 0 0 12px 0; font-size: 1.1rem; display: flex; justify-content: space-between; align-items: center; color: #fff; }
                .us-size-selector { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 6px; margin-bottom: 12px; }
                .us-size-btn { padding: 6px 2px; border: 1px solid #334155; background: #0f172a; color: #94a3b8; border-radius: 6px; cursor: pointer; text-align: center; font-size: 0.7rem; line-height: 1.2; }
                .us-size-btn.active { background: #02b875; color: white; border-color: #02b875; }
                .us-preview-wrapper { background: #0f172a; border: 1px dashed #334155; border-radius: 8px; padding: 10px; margin-bottom: 12px; min-height: 80px; display: flex; align-items: center; justify-content: center; overflow: hidden; }
                #usPreviewContainer { width: 100%; transform: scale(0.9); }
                #us-widget-tool textarea { width: 100%; height: 50px; background: #0b1120; border: 1px solid #334155; color: #cbd5e1; padding: 8px; border-radius: 6px; font-family: monospace; font-size: 0.7rem; resize: none; margin-bottom: 8px; }
                .us-copy-btn { width: 100%; background: #02b875; color: white; border: none; padding: 8px; border-radius: 6px; font-weight: bold; cursor: pointer; font-size: 0.85rem; }
                .us-toggle-btn { background: #334155; border: none; color: #fff; font-size: 0.65rem; padding: 4px 8px; border-radius: 4px; cursor: pointer; }
            </style>

            <h2>Widget <button id="usToggleBtn" class="us-toggle-btn" onclick="usToggleTool()">Hide</button></h2>

            <div id="us-widget-content">
                <div class="us-controls">
                    <label style="font-size: 0.7rem; color: #94a3b8; text-transform: uppercase; font-weight: 700;">Select Design</label>
                    <div class="us-size-selector">
                        <div class="us-size-btn active" onclick="usSetSize('sidebar')">Sidebar<br>300px</div>
                        <div class="us-size-btn" onclick="usSetSize('banner')">Banner<br>728px</div>
                        <div class="us-size-btn" onclick="usSetSize('large')">Large<br>970px</div>
                    </div>
                </div>
                <div class="us-preview-wrapper"><div id="usPreviewContainer"></div></div>
                <textarea id="usCodeOutput" readonly></textarea>
                <button class="us-copy-btn" onclick="usCopyCode(this)">Copy Code</button>
            </div>
        </div>

        <script>
            window.addEventListener('load', function() {
                const LOGO = "https://upcomingsounds.com/images/logo.png";
                let currentSize = 'sidebar';
                const content = document.getElementById('us-widget-content');
                const btn = document.getElementById('usToggleBtn');
                window.usToggleTool = function() {
                    if (content.style.display === 'none') { content.style.display = 'block'; btn.innerText = 'Hide'; }
                    else { content.style.display = 'none'; btn.innerText = 'Show'; }
                };
                function getReferralLink() {
                    const inputs = document.getElementsByTagName('input');
                    for(let i=0; i<inputs.length; i++) { if(inputs[i].value && inputs[i].value.includes('/ref/')) return inputs[i].value; }
                    return "https://upcomingsounds.com/";
                }
                const layouts = { sidebar: { w: 300, h: 250 }, banner: { w: 728, h: 90 }, large: { w: 970, h: 250 } };
                window.usSetSize = function(size) { currentSize = size; 
                    document.querySelectorAll('.us-size-btn').forEach(b => b.classList.remove('active'));
                    event.currentTarget.classList.add('active');
                    usUpdate(); 
                };
                window.usCopyCode = function(btn) { const txt = document.getElementById("usCodeOutput"); txt.select(); document.execCommand("copy"); btn.innerText = "Copied!"; setTimeout(() => btn.innerText = "Copy Code", 2000); };
                function usUpdate() {
                    const url = getReferralLink();
                    const cfg = layouts[currentSize];
                    const css = `<style>body{margin:0;overflow:hidden;font-family:sans-serif}.us-root{width:100%;height:100%;background:linear-gradient(135deg,#111,#222);color:#fff;display:flex;box-sizing:border-box;position:relative;border:1px solid #333;align-items:center;justify-content:center;padding:10px;text-align:center;flex-direction:column}.us-logo{height:40px;margin-bottom:10px}.us-cta{background:#fff;color:#000;text-decoration:none;padding:6px 12px;border-radius:20px;font-size:11px;font-weight:700}</style>`;
                    const html = `<div class="us-root"><img src="${LOGO}" class="us-logo"><div style="margin-bottom:10px;font-size:12px;">Submit your music to my playlist</div><a href="${url}" target="_blank" class="us-cta">Get Started</a></div>`;
                    const srcDoc = `<html><head>${css}</head><body>${html}</body></html>`.replace(/"/g, '&quot;');
                    document.getElementById('usCodeOutput').value = `<iframe srcdoc="${srcDoc}" width="${cfg.w}" height="${cfg.h}" style="border:none;" scrolling="no"></iframe>`;
                    document.getElementById('usPreviewContainer').innerHTML = html;
                }
                usUpdate();
            });
        </script>

        <div class="b-b m-y"></div>
        <div class="nav text-sm _600">
            <a href="{{ url('about-us') }}" class="nav-link text-muted m-r-xs">About</a>
            <a href="{{ url('contact-us') }}" class="nav-link text-muted m-r-xs">Contact</a>
            <a href="{{ url('term-of-service') }}" class="nav-link text-muted m-r-xs">Term of Service</a>
            <a href="{{ url('privacy-policy') }}" class="nav-link text-muted m-r-xs">Policy Privacy</a>
        </div>
        <p class="text-muted text-xs p-b-lg">&copy; Copyright {{ date('Y') }}</p>
    </div>
</div>
