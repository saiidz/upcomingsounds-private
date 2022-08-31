@forelse($comments as $comment)

    <div class="comment-list wow fadeIn animated">
        <div class="single-comment justify-content-between d-flex">
            <div class="user justify-content-between d-flex">
                <div class="thumb">
                    @if (!empty($comment->user->profile))
                        <img src="{{ asset($comment->user->profile) }}" alt="">
                    @else
                        <img src="{{ asset('images/author.jpg') }}" alt="">
                    @endif
                </div>
                <div class="desc">
                    <p class="comment">
                        {!! nl2br(e($comment->comment))!!}
                    </p>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center" style="display: flex;">
                            <h5>
                                <a href="{{$comment->author_website}}" target='_blank'>{{$comment->author()}}</a>
                            </h5>
                            <p class="date" title='{{$comment->created_at}}'>{{$comment->created_at->diffForHumans()}}</p>
                        </div>
                        @if(config("binshopsblog.comments.ask_for_author_website") && $comment->author_website)
                            <div class="reply-btn">
                                <a href='{{$comment->author_website}}' class='btn-reply' target='_blank' rel='noopener'>(Website)</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@empty
    <div class='alert alert-info'>No comments yet! Why don't you be the first?</div>
@endforelse

@if(count($comments)> config("binshopsblog.comments.max_num_of_comments_to_show",500) - 1)
    <p><em>Only the first {{config("binshopsblog.comments.max_num_of_comments_to_show",500)}} comments are
            shown.</em>
    </p>
@endif





{{-- @forelse($comments as $comment)



    <div class="card bg-light mb-3">
        <div class="card-header">
            {{$comment->author()}}

            @if(config("binshopsblog.comments.ask_for_author_website") && $comment->author_website)
                (<a href='{{$comment->author_website}}' target='_blank' rel='noopener'>website</a>)
            @endif

            <span class="float-right" title='{{$comment->created_at}}'><small>{{$comment->created_at->diffForHumans()}}</small></span>
        </div>
        <div class="card-body bg-white">
            <p class="card-text">{!! nl2br(e($comment->comment))!!}</p>
        </div>
    </div>





@empty
    <div class='alert alert-info'>No comments yet! Why don't you be the first?</div>
@endforelse

@if(count($comments)> config("binshopsblog.comments.max_num_of_comments_to_show",500) - 1)
    <p><em>Only the first {{config("binshopsblog.comments.max_num_of_comments_to_show",500)}} comments are
            shown.</em>
    </p>
@endif
 --}}
