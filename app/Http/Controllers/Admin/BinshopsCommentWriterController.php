<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\LoadLanguage;
use BinshopsBlog\Captcha\UsesCaptcha;
use BinshopsBlog\Events\CommentAdded;
use BinshopsBlog\Models\BinshopsComment;
use BinshopsBlog\Captcha\CaptchaAbstract;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AddNewCommentRequest;
use App\Http\Middleware\UserCanManageBlogPosts;
use BinshopsBlog\Models\BinshopsPostTranslation;

class BinshopsCommentWriterController extends Controller
{
    use UsesCaptcha;

    public function __construct()
    {
        $this->middleware(UserCanManageBlogPosts::class);
        $this->middleware(LoadLanguage::class);

    }

    /**
     * Let a guest (or logged in user) submit a new comment for a blog post
     *
     * @param AddNewCommentRequest $request
     * @param $blog_post_slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function addNewComment(Request $request, $locale, $blog_post_slug)
    {
        $validator = Validator::make($request->all(), [
            'comment' => ['required', 'string', 'min:3', 'max:1000'],
            'author_name' => ['string', 'min:1', 'max:50'],
            'author_email' => ['string', 'nullable', 'min:1', 'max:254', 'email'],
            'author_website' => ['string', 'nullable', 'min:' . strlen("http://a.b"), 'max:175', 'active_url',],
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (config("binshopsblog.comments.type_of_comments_to_show", "built_in") !== 'built_in') {
            throw new \RuntimeException("Built in comments are disabled");
        }

        $post_translation = BinshopsPostTranslation::where("slug", $blog_post_slug)
            ->with('post')
            ->firstOrFail();
        $blog_post = $post_translation->post;

        /** @var CaptchaAbstract $captcha */
        $captcha = $this->getCaptchaObject();
        if ($captcha) {
            $captcha->runCaptchaBeforeAddingComment($request, $blog_post);
        }

        $new_comment = $this->createNewComment($request, $blog_post);

        return view("binshopsblog::saved_comment", [
            'captcha' => $captcha,
            'blog_post' => $post_translation,
            'new_comment' => $new_comment
        ]);

    }

    /**
     * @param AddNewCommentRequest $request
     * @param $blog_post
     * @return BinshopsComment
     */
    protected function createNewComment($request, $blog_post)
    {
        $new_comment = new BinshopsComment($request->all());

        if (config("binshopsblog.comments.save_ip_address")) {
            $new_comment->ip = $request->ip();
        }
        if (config("binshopsblog.comments.ask_for_author_website")) {
            $new_comment->author_website = $request->get('author_website');
        }
        if (config("binshopsblog.comments.ask_for_author_email")) {
            $new_comment->author_email = $request->get('author_email');
        }
        if (config("binshopsblog.comments.save_user_id_if_logged_in", true) && Auth::check()) {
            $new_comment->user_id = Auth::user()->id;
        }

        $new_comment->approved = config("binshopsblog.comments.auto_approve_comments", true) ? true : false;

        $blog_post->comments()->save($new_comment);

        event(new CommentAdded($blog_post, $new_comment));

        return $new_comment;
    }
}
