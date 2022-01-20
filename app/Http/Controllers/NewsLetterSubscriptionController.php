<?php

namespace App\Http\Controllers;

use App\Models\NewsLetterSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class NewsLetterSubscriptionController extends Controller
{
    /*
      * newsLetter Subscriptions
    */
    public function newsLetter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|string|email|unique:news_letter_subscriptions',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $input = $request->all();
        $input['status'] = 1;
        NewsLetterSubscription::create($input);

        // Send Email of newsletter subscriptions emails
        $data['email'] = $request->get('email');
        $data["title"] = "Newsletter Subscribe Upcoming Sounds";

        Mail::send('emails.newsLetterSubscription', $data, function($message)use($data) {
            $message->from('info@upcomingsounds.com');
            $message->to($data["email"], $data["email"])
                ->subject($data["title"]);
        });

        return redirect()->back()->with('success', 'Newsletter Subscriber successfully.');
    }
}
