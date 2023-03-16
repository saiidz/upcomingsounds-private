@if(is_countable($messages) && count($messages) > 0)
    @foreach($messages as $item)
        @if($item->user_id == Auth::Id())
            <article class="msg-container msg-remote" id="msg-0">
                <div class="msg-box">
                    <a href="{{!empty(getProfileImage($item->user)) ? getProfileImage($item->user) : '----'}}" target="_blank">
                        <img class="user-img" id="user-0" src="{{!empty(getProfileImage($item->user)) ? getProfileImage($item->user) : '----'}}" />
                    </a>
                    <div class="flr">
                        <div class="messages">
                            <p class="msg" id="msg-0">
                                {{ $item->message ?? '' }}
                            </p>
                        </div>
                        <span class="timestamp"><span class="username">{{!empty($item->user) ? $item->user->name : '----'}}</span>&bull;<span class="posttime">{{$item->created_at->diffForHumans()}}</span></span>
                    </div>
                </div>
            </article>
        @else
            <article class="msg-container msg-self" id="msg-0">
                <div class="msg-box">
                    <div class="flr">
                        <div class="messages">
                            <p class="msg" id="msg-2">
                                {{ $item->message ?? '' }}
                            </p>
                        </div>
                        <span class="timestamp"><span class="username">{{!empty($item->user) ? $item->user->name : '----'}}</span>&bull;<span class="posttime">{{$item->created_at->diffForHumans()}}</span></span>
                    </div>
                    <a href="{{!empty(getProfileImage($item->user)) ? getProfileImage($item->user) : '----'}}" target="_blank">
                        <img class="user-img" id="user-0" src="{{!empty(getProfileImage($item->user)) ? getProfileImage($item->user) : '----'}}" />
                    </a>
                </div>
            </article>
        @endif
    @endforeach
@endif
