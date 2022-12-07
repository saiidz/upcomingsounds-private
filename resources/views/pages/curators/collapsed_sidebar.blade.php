@if(!empty($campaign))
    <div id="mySidebarCollapsed" class="sidebarCollapsed">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav({{$campaign->id}})">×</a>
        <h1>{{$campaign->artistTrack->name}}</h1>

    </div>
@endif
