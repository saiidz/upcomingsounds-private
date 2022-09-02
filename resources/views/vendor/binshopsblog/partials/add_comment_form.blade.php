<div class='add_comment_area'>

    <!--comment form-->
    <div class="comment-form wow fadeIn animated">
        <div class="widget-header-2 position-relative mb-30">
            <h5 class="mt-5 mb-30">Leave a Reply</h5>
        </div>
        <form class="form-contact comment_form" method='post' action='{{route("binshopsblog.comments.add_new_comment",[app('request')->get('locale'),$post->slug])}}' id="commentForm">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <textarea
                            class="form-control"
                            name='comment'
                            required
                            id="comment"
                            placeholder="Write Comment"
                            cols="30" rows="9">{{old("comment")}}</textarea>
                    </div>
                </div>
                @if(config("binshopsblog.comments.save_user_id_if_logged_in", true) == false || !\Auth::check())

                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control" name="author_name" id="author_name" required type="text" placeholder="Name" value="{{old("author_name")}}">
                        </div>
                    </div>

                    @if(config("binshopsblog.comments.ask_for_author_email"))
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="author_email" required id="author_email" type="email" placeholder="Your Email (won't be displayed publicly)" value="{{old("author_email")}}">
                            </div>
                        </div>
                    @endif
                @endif

                @if(config("binshopsblog.comments.ask_for_author_website"))
                    <div class="col-12">
                        <div class="form-group">
                            <label id="author_website_label" for="author_website">Your Website
                                <small>(Will be displayed)</small>
                            </label>
                            <input class="form-control" name="author_website" id="author_website" type="text" placeholder="Your Website URL" value="{{old("author_website")}}">
                        </div>
                    </div>
                @endif
            </div>
            @if($captcha)
                {{--Captcha is enabled. Load the type class, and then include the view as defined in the captcha class --}}
                {{-- @include($captcha->view()) --}}
            @endif

            <div class="form-group">
                <input type='submit' class="btn button button-contactForm"
                   value='Post Comment'>
                {{-- <button type="submit" class="btn button button-contactForm">Post Comment</button> --}}
            </div>
        </form>
    </div>

</div>



{{-- <div class='add_comment_area'>
    <h5 class='text-center'>Add a comment</h5>
    <form method='post' action='{{route("binshopsblog.comments.add_new_comment",[app('request')->get('locale'),$post->slug])}}'>
        @csrf


        <div class="form-group ">

            <label id="comment_label" for="comment">Your Comment </label>
                    <textarea
                            class="form-control"
                            name='comment'
                            required
                            id="comment"
                            placeholder="Write your comment here"
                            rows="7">{{old("comment")}}</textarea>


        </div>

        <div class='container-fluid'>
            <div class='row'>

                @if(config("binshopsblog.comments.save_user_id_if_logged_in", true) == false || !\Auth::check())

                    <div class='col'>
                        <div class="form-group ">
                            <label id="author_name_label" for="author_name">Your Name </label>
                            <input
                                    type='text'
                                    class="form-control"
                                    name='author_name'
                                    id="author_name"
                                    placeholder="Your name"
                                    required
                                    value="{{old("author_name")}}">
                        </div>
                    </div>

                    @if(config("binshopsblog.comments.ask_for_author_email"))
                        <div class='col'>
                            <div class="form-group">
                                <label id="author_email_label" for="author_email">Your Email
                                    <small>(won't be displayed publicly)</small>
                                </label>
                                <input
                                        type='email'
                                        class="form-control"
                                        name='author_email'
                                        id="author_email"
                                        placeholder="Your Email"
                                        required
                                        value="{{old("author_email")}}">
                            </div>
                        </div>
                    @endif
                @endif


                @if(config("binshopsblog.comments.ask_for_author_website"))
                    <div class='col'>
                        <div class="form-group">
                            <label id="author_website_label" for="author_website">Your Website
                                <small>(Will be displayed)</small>
                            </label>
                            <input
                                    type='url'
                                    class="form-control"
                                    name='author_website'
                                    id="author_website"
                                    placeholder="Your Website URL"
                                    value="{{old("author_website")}}">
                        </div>
                    </div>

                @endif
            </div>
        </div>


        @if($captcha)
            {{--Captcha is enabled. Load the type class, and then include the view as defined in the captcha class --}}
            {{-- @include($captcha->view())
        @endif


        <div class="form-group ">
            <input type='submit' class="form-control input-sm btn btn-success "
                   value='Add Comment'>
        </div>

    </form> --}}
{{-- </div> --}}
