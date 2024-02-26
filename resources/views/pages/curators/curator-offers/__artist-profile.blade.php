<div class="item-media">
    @php
        $mystring = $sendOffer->userArtist->profile;
        $findhttps   = 'https';
        $findhttp   = 'http';
        $poshttps = strpos($mystring, $findhttps);

        $poshttp = strpos($mystring, $findhttp);
        if($poshttps != false){
            $pos = $poshttps;
        }else{
            $pos = $poshttp;
        }
    @endphp
    @if($pos === false)
        @if(!empty($sendOffer->userArtist->profile))
            <div class="item-media-content" id="upload_profile"
                 style="background-image: url({{URL('/')}}/uploads/profile/{{$sendOffer->userArtist->profile}});"></div>
        @else
            <div class="item-media-content" id="upload_profile"
                 style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
        @endif
    @elseif($pos == 0)
        <div class="item-media-content" id="upload_profile"
             style="background-image: url({{$sendOffer->userArtist->profile}});"></div>
    @else
        <div class="item-media-content" id="upload_profile"
             style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
    @endif
</div>
