{{--<div class="page-title m-b">--}}
{{--    <h4 class="inline m-a-0 update_profile">Basic Info</h4>--}}
{{--</div>--}}
{{--<div class="form-group row">--}}
{{--    <div class="col-sm-2 form-control-label">Name:</div>--}}
{{--    <div class="col-sm-9">--}}
{{--        <div--}}
{{--            class="col-sm-3 form-control-label text-muted">{{ isset($user->name) ? $user->name : ''  }}</div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="form-group row">--}}
{{--    <div class="col-sm-2 form-control-label">Email:</div>--}}
{{--    <div class="col-sm-9">--}}
{{--        <div--}}
{{--            class="col-sm-3 form-control-label text-muted">{{ isset($user->email) ? $user->email : ''  }}</div>--}}
{{--    </div>--}}
{{--</div>--}}
@if(!empty($user->curatorUser))
    <div class="page-title m-b">
        <h4 class="inline m-a-0 update_profile">Info</h4>
    </div>

{{--    <div class="form-group row">--}}
{{--        <div class="col-sm-2 form-control-label">TasteMaker Signup From:</div>--}}
{{--        <div class="col-sm-9">--}}
{{--            <div--}}
{{--                class="col-sm-3 form-control-label text-muted">{{($user->curatorUser) ? Str::upper($user->curatorUser->curator_signup_from) : ''}}</div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="form-group row">--}}
{{--        <div class="col-sm-2 form-control-label">TasteMaker Name:--}}
{{--        </div>--}}
{{--        <div class="col-sm-9">--}}
{{--            <div--}}
{{--                class="col-sm-3 form-control-label text-muted">{{isset($user->curatorUser) ? $user->curatorUser->tastemaker_name : ''}}</div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="form-group row">
        <div class="col-sm-2 form-control-label">Country:</div>
        <div class="col-sm-9">
            <div
                class="col-sm-3 form-control-label text-muted">{{isset($user->curatorUser) ? $user->curatorUser->country->name : ''}}</div>
        </div>
    </div>

    <div class="page-title m-b">
        <h4 class="inline m-a-0 update_profile">Curator's Bio</h4>
    </div>
    <div class="form-group row">
        <div class="col-sm-2 form-control-label">Bio:</div>
        <div class="col-sm-9">
            <div class="form-control-label text-muted">
                <p>{{isset($user->curatorUser) ? $user->curatorUser->curator_bio : ''}}</p>
            </div>
        </div>
    </div>

    <div class="page-title m-b-1">
        <h4 class="inline m-a-0 update_profile">Genres</h4>
    </div>
    <div class="form-group row">
        <div class="artist-features">
            @if(count($user->curatorUserTags) > 0)
                @php
                    $userTags = $user->curatorUserTags->chunk(6);
                @endphp
                @foreach($userTags as $tags)
                    <ul>
                        @foreach($tags as $tag)
                            <li>{{$tag->curatorFeatureTag->name}}</li>
                        @endforeach
                    </ul>
                @endforeach
            @endif
        </div>
    </div>
@endif
