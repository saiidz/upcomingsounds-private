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
                    <a class="btn btn-sm rounded primary m-b-2 text-white" href="{{ route('curator.get.verified') }}">get verified</a>
                </div>
            @endif

            {{-- START OF REFERRAL BOX (ALWAYS VISIBLE) --}}
            <div class="bgGradient p-a m-b">
                <h6 class="text text-muted">Referral Program</h6>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <p><strong>BE A PART OF THE GROWTH OF OUR COMMUNITY!</strong><br>
                        By referring artists to our platform, you will be able to help them develop their
                        career program and earn 10 USC or the equivalent in British pounds per sign-up.
                        You can help them sign up by sending them this link:</p>
                    </div>
                </div>

                @if (!empty(auth()->user()->getReferrals()) && auth()->user()->getReferrals()->count() > 0)
                    @foreach(auth()->user()->getReferrals() as $referral)
                        <h6 class="text text-muted">Referral Link</h6>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input id="tastemaker_name" class="form-control" value="{{ $referral->link }}" readonly>
                            </div>
                        </div>
                        <p>Number of referred users: {{ \App\Models\ReferralRelationship::where('referral_link_id',$referral->id)->count() }}</p>
                    @endforeach
                @else
                    <p class="text-muted">No referral link generated yet. Please contact support.</p>
                @endif
                <p class="text-xs text-muted">*Earning potential based on referrals depending on the artist membership package purchased.</p>
            </div>
            {{-- END OF REFERRAL BOX --}}
        @endif

        {{-- KEEPING YOUR WIDGET TOOL EXACTLY AS IT WAS --}}
        <div id="us-widget-tool">
            <style>
                #us-widget-tool { width: 65%; margin: 0 auto; min-width: 320px; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #1e293b; color: #f8fafc; border-radius: 12px; padding: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); box-sizing: border-box; transition: all 0.3s ease; }
                #us-widget-tool h2 { margin: 0 0 15px 0; text-align: center; font-size: 1.4rem; background: linear-gradient(to right, #fff, #cbd5e1); -webkit-background-clip: text; -webkit-text-fill-color: transparent; display: flex; align-items: center; justify-content: center; gap: 10px; }
                .us-toggle-btn { background: transparent; border: 1px solid #475569; color: #94a3b8; font-size: 0.75rem; padding: 4px 10px; border-radius: 15px; cursor: pointer; text-transform: uppercase; letter-spacing: 0.5px; -webkit-text-fill-color: #94a3b8; transition: all 0.2s; }
                .us-toggle-btn:hover { color: white; border-color: #02b875; background: rgba(2, 184, 117, 0.1); -webkit-text-fill-color: white; }
                #us-widget-content { display: block; overflow: hidden; }
                #us-widget-tool .us-controls { display: flex; flex-direction: column; gap: 15px; margin-bottom: 20px; border-bottom: 1px solid #334155; padding-bottom: 20px; }
                #us-widget-tool label { display: block; font-size: 0.75rem; color: #94a3b8; font-weight: 700; text-transform: uppercase; margin-bottom: 8px; letter-spacing: 0.5px; }
                #us-widget-tool .us-size-selector { display: flex; gap: 10px; flex-wrap: wrap; }
                #us-widget-tool .us-size-btn { flex: 1; padding: 10px; border: 1px solid #334155; background: #0f172a; color: #94a3b8; border-radius: 6px; cursor: pointer; text-align: center; font-size: 0.85rem; transition: all 0.2s; }
                #us-widget-tool .us-size-btn:hover { background: #1e293b; border-color: #02b875; color: white; }
                #us-widget-tool .us-size-btn.active { background: #02b875; color: white; border-color: #02b875; box-shadow: 0 0 10px rgba(2, 184, 117, 0.3); }
                #us-widget-tool .us-preview-wrapper { background: #0f172a; border: 2px dashed #334155; border-radius: 8px; padding: 20px; display: flex; justify-content: center; align-items: center; min-height: 150px; margin-bottom: 20px; position: relative; }
                #us-widget-tool .us-preview-label { position: absolute; top: 8px; left: 10px; font-size: 10px; color: #475569; text-transform: uppercase; }
                #usPreviewContainer { max-width: 100%; display: flex; justify-content: center; }
                #us-widget-tool textarea { width: 100%; height: 80px; background: #0b1120; border: 1px solid #334155; color: #cbd5e1; padding: 12px; border-radius: 6px; font-family: monospace; font-size: 0.8rem; resize: none; box-sizing: border-box; display: block; }
                #us-widget-tool .us-copy-btn { background: #02b875; color: white; border: none; padding: 10px 20px; border-radius: 6px; font-weight: bold; cursor: pointer; font-size: 0.9rem; margin-top: 10px; float: right; transition: background 0.2s; }
                #us-widget-tool .us-copy-btn:hover { background: #029e63; }
                #us-widget-tool::after { content: ""; display: table; clear: both; }
                @media (max-width: 600px) { #us-widget-tool { width: 95%; padding: 15px; } }
            </style>

            <h2>Widget Generator <button id="usToggleBtn
