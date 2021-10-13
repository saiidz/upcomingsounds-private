<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use Config;
use Illuminate\Support\Str;
use SendGrid\Mail\Mail;

class Helper
{
    public static function fallback (Request $request){
        if($request->expectsJson()){
            return sendError($request->wantsJson(),null,'Invalid URL or METHOD!', null, 404);
        }else{
            return response()->view('errors.404');
        }
    }

//    public function sendEmailViaSendGrid($to, $subject, $htmlBody, $textBody = '')
//    {
//        $email = new Mail();
//        $email->setfrom('no-reply@upcomingsounds.com', 'Email Verify Upcoming Sounds');
//        $email->addTo($to);
//        $email->setSubject($subject);
//        $email->addContent("text/plain", $textBody);
//        $email->addContent('text/html', html_entity_decode($htmlBody));
//
//         $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
//        try {
//            $response = $sendgrid->send($email);
//            return ['status' => $response->statusCode()];
//            // echo '<pre>';
//            // print $response->statusCode() . "\n";
//            // print_r($response->headers());
//            // print $response->body() . "\n";
//        } catch (Exception $e) {
//            // echo '<pre>';
//            // echo 'Caught exception: '. $e->getMessage() ."\n";
//            return ['status' => $e->statusCode(), 'message'=> $e->getMessage()];
//        }
//    }
}
