<div class="page-title m-b">
    <h4 class="inline m-a-0 update_profile">Basic Info</h4>
</div>
<div class="form-group row">
    <div class="col-sm-2 form-control-label">Name:</div>
    <div class="col-sm-9">
        <div
            class="col-sm-3 form-control-label text-muted">{{ isset($user_curator->name) ? $user_curator->name : ''  }}</div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2 form-control-label">Email:</div>
    <div class="col-sm-9">
        <div
            class="col-sm-3 form-control-label text-muted">{{ isset($user_curator->email) ? $user_curator->email : ''  }}</div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2 form-control-label">Phone Number:</div>
    <div class="col-sm-9">
        <div
            class="col-sm-3 form-control-label text-muted">{{ isset($user_curator->phone_number) ? $user_curator->phone_number : ''  }}</div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2 form-control-label">Address:</div>
    <div class="col-sm-9">
        <div
            class="col-sm-3 form-control-label text-muted">{{ isset($user_curator->address) ? $user_curator->address : ''  }}</div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2 form-control-label">TasteMaker Approved:</div>
    <div class="col-sm-9">
        <div
            class="col-sm-3 form-control-label text-muted" style="color:#02b875 !important">{{ ($user_curator->is_approved == 1) ? Str::upper('Approved') : ''  }}</div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2 form-control-label text-muted">Public Profile Display:</div>
    <div class="col-sm-9" id="deMo">
        <label class="switch">
            <input type="checkbox" name="demo" id="curatorChangePublicProfile" value="" {{ ($user_curator->is_public_profile == 1) ? 'checked' : ''  }}>
            <span class="slider round switchDemo"></span>
        </label>
    </div>
</div>

@if(!empty($user_curator->curatorUser))
    <div class="page-title m-b">
        <h4 class="inline m-a-0 update_profile">TasteMaker Info</h4>
    </div>

    <div class="form-group row">
        <div class="col-sm-2 form-control-label">TasteMaker Signup From:</div>
        <div class="col-sm-9">
            <div
                class="col-sm-3 form-control-label text-muted">{{($user_curator->curatorUser) ? Str::upper($user_curator->curatorUser->curator_signup_from) : ''}}</div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2 form-control-label">TasteMaker Name:
        </div>
        <div class="col-sm-9">
            <div
                class="col-sm-3 form-control-label text-muted">{{isset($user_curator->curatorUser) ? $user_curator->curatorUser->tastemaker_name : ''}}</div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2 form-control-label">Country:</div>
        <div class="col-sm-9">
            <div
                class="col-sm-3 form-control-label text-muted">{{isset($user_curator->curatorUser) ? $user_curator->curatorUser->country->name : ''}}</div>
        </div>
    </div>

    <div class="page-title m-b">
        <h4 class="inline m-a-0 update_profile">Curator's Bio</h4>
    </div>
    <div class="form-group row">
        <div class="col-sm-3 form-control-label">Bio:</div>
        <div class="col-sm-9">
            <div class="form-control-label text-muted">
                <p>{{isset($user_curator->curatorUser) ? $user_curator->curatorUser->curator_bio : ''}}</p>
            </div>
        </div>
    </div>

    <div class="page-title m-b-1">
        <h4 class="inline m-a-0 update_profile">Genres</h4>
    </div>
    <div class="form-group row">
        <div class="artist-features">
            @if(count($user_curator->curatorUserTags) > 0)
                @php
                    $userTags = $user_curator->curatorUserTags->chunk(6);
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
