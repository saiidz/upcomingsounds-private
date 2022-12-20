<div class="page-title m-b">
    <h4 class="inline m-a-0 update_profile">Basic Info</h4>
</div>
<div class="form-group row">
    <div class="col-sm-2 form-control-label">Name:</div>
    <div class="col-sm-9">
        <div
            class="col-sm-3 form-control-label text-muted">{{ isset($user->name) ? $user->name : ''  }}</div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2 form-control-label">Email:</div>
    <div class="col-sm-9">
        <div
            class="col-sm-3 form-control-label text-muted">{{ isset($user->email) ? $user->email : ''  }}</div>
    </div>
</div>
@if(!empty($user->artistUser))
    @if($user->artistUser->artist_signup_from == 'artist')
        <input type="hidden" name="artist_signup_from"
               value="{{($user->artistUser) ? $user->artistUser->artist_signup_from : ''}}">
        <div class="page-title m-b">
            <h4 class="inline m-a-0 update_profile">Artist Info</h4>
        </div>

    @elseif($user->artistUser->artist_signup_from == 'artist_representative')
        <input type="hidden" name="artist_signup_from"
               value="{{($user->artistUser) ? $user->artistUser->artist_signup_from : ''}}">
        <div class="page-title m-b">
            <h4 class="inline m-a-0 update_profile">Artist Representative
                Info</h4>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">What kind of
                artist representative are you ?
            </div>
            <div class="col-sm-9">
                <div class="col s12">
                    <p class="mb-1">
                        @if($user->artistUser->artist_representative_record)
                            <label>
                                <span>{{ $user->artistUser->artist_representative_record }}</span>
                            </label>
                        @endif
                    </p>
                </div>
            </div>
        </div>

    @else
    @endif

    <div class="form-group row">
        <div class="col-sm-2 form-control-label">Artist Name:
        </div>
        <div class="col-sm-9">
            <div
                class="col-sm-3 form-control-label text-muted">{{isset($user->artistUser) ? $user->artistUser->artist_name : ''}}</div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2 form-control-label">Country:</div>
        <div class="col-sm-9">
            <div
                class="col-sm-3 form-control-label text-muted">{{isset($user->artistUser) ? $user->artistUser->country->name : ''}}</div>
        </div>
    </div>

    <div class="page-title m-b">
        <h4 class="inline m-a-0 update_profile">Artist's Bio</h4>
    </div>
    <div class="form-group row">
        <div class="col-sm-2 form-control-label">Bio:</div>
        <div class="col-sm-9">
            <div class="form-control-label text-muted">
                <p>{{isset($user->artistUser) ? $user->artistUser->artist_bio : ''}}</p>
            </div>
        </div>
    </div>

    <div class="page-title m-b">
        <h4 class="inline m-a-0 update_profile">Right now</h4>
    </div>
    <div class="form-group row">
        <div class="col-sm-2 form-control-label">Hot News:</div>
        <div class="col-sm-9">
            <div class="col-sm-3 form-control-label text-muted">
                <p>{{isset($user->artistUser) ? $user->artistUser->hot_news : ''}}</p>
            </div>
        </div>
    </div>

    <div class="page-title m-b-1">
        <h4 class="inline m-a-0 update_profile">Genres</h4>
    </div>
    <div class="form-group row">
        <div class="artist-features">
            @if(count($user->userTags) > 0)
                @php
                    $userTags = $user->userTags->chunk(6);
                @endphp
                @foreach($userTags as $tags)
                    <ul>
                        @foreach($tags as $tag)
                            <li>{{$tag->featureTag->name}}</li>
                        @endforeach
                    </ul>
                @endforeach
            @endif
        </div>
    </div>
@endif
