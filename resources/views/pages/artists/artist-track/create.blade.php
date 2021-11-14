<form method="POST" action="{{url('/store-track')}}"
      enctype="multipart/form-data" id="track_song" name="track_song">
    @csrf
    <div class="page-title m-b">
        <h4 class="inline m-a-0 update_profile">Add a song</h4>
    </div>
    <div class="item-except text-sm text-muted h-2x m-t-sm">
        Complete your discography and let influencers discover your songs when they visit your profile.
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">YouTube / SoundCloud link</div>
        <div class="col-sm-9">
            <input type="text" name="youtube_soundcloud_url" id="trueUrl" onclick="removeStyle(this);"
                   class="form-control @error('youtube_soundcloud_url') is-invalid @enderror" value=""
                   placeholder="https://www.youtube.com/watch?v=iLd8ugdjJgk" required>
            <div id="error_message_youtube_soundcloud" class="red-text" style="color:red; padding:4px;"></div>
            @error('youtube_soundcloud_url')
            <small id="error_message"class="red-text ml-10" role="alert">
                {{ $message }}
            </small>
            @enderror
            <div class="row">
                <div class="col-sm-12">
                    <div id="preview"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Spotify track link (optional)</div>
        <div class="col-sm-9">
            <input type="url" name="spotify_track_url" onclick="removeStyle(this);"
                   class="form-control @error('spotify_track_url') is-invalid @enderror"
                   value=""
                   placeholder="https://open.spotify.com/artist/5eJu3FXEJJGVaQpAeQjdwg" required>
            <div id="error_message_spotify_track" class="red-text" style="color:red; padding:4px;"></div>
            @error('spotify_track_url')
            <small class="red-text ml-10" role="alert">
                {{ $message }}
            </small>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Title</div>
        <div class="col-sm-9">
            <input type="text" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{old('name')}}"
                   placeholder="Your Title" required>
            <div id="error_message_name" class="red-text" style="color:red; padding:4px;"></div>
            @error('name')
            <small class="red-text ml-10" role="alert">
                {{ $message }}
            </small>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Description</div>
        <div class="col-sm-9">
            <textarea name="description"
                      placeholder="Your description..."
                      class="form-control @error('description') is-invalid @enderror" required></textarea>
            <div id="error_message_description" class="red-text" style="color:red; padding:4px;"></div>
            @error('description')
            <small class="red-text ml-10" role="alert">
                {{ $message }}
            </small>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Song Thumbnail</div>
        <div class="col-sm-9">
            <input type='file' class="form-control" id="imageTrackUpload" name="track_photo"
                   accept=".png, .jpg, .jpeg" />
            <label for="imageTrackUpload"></label>
            <div class="imgTrackPreview">
                <img src=""
                     id="imgTrackPreview" style="display:none;">
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Song Category</div>
        <div class="col-sm-9">
            <select class="form-control c-select" name="song_category" required>
                <option value="" disabled selected>Choose Song Category</option>
                @foreach($track_categories as $song_cat)
                    <option value="{{$song_cat->id}}">{{$song_cat->name}}</option>
                @endforeach
            </select>
            <div id="error_message_song_category" class="red-text" style="color:red; padding:4px;"></div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted">Release Date (optional)</div>
        <div class="col-sm-9">
            <input id="datepicker" name="release_date"
                   class="form-control release_date">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 form-control-label text-muted"></div>
        <div class="col-sm-9">
            <div class="col s12">
                <p class="mb-1">
                    <label>
                        <input type="checkbox" class="filled-in"
                               name="display_profile"
                               value="1"/>
                        <span class="text-muted">Display on my public profile </span>
                    </label>
                </p>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <button type="submit" class="btn btn-sm rounded add_track" onclick='return validateAddTrackForm("track_song")'>
            Add Song</button>
    </div>
</form>
