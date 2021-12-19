<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use SendGrid\Mail\Mail;
use Twilio\Rest\Client;

class Helper
{
    public static function fallback (Request $request){
        if($request->expectsJson()){
            return sendError($request->wantsJson(),null,'Invalid URL or METHOD!', null, 404);
        }else{
            return response()->view('errors.404');
        }
    }
    public static function twilioOtp(String $phone_number, String $msg)
    {
        $account_sid = Config::get('services.twilio.twilio_sid');
        $auth_token = Config::get('services.twilio.twilio_token');
        $twilio_number = Config::get('services.twilio.twilio_from');

//        $account_sid = env("TWILIO_SID");
//        $auth_token = env("TWILIO_TOKEN");
//        $twilio_number = env("TWILIO_FROM");

        $client = new Client($account_sid, $auth_token);
        $client->messages->create($phone_number, [
            'from' => $twilio_number,
            'body' => $msg
        ]);
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

    public static function getDetails($pageUrl) {
        $url = $pageUrl;
        $ch = curl_init();
        dd(curl_getinfo($ch));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($ch);
        curl_close($ch);

        $output;
        $metaPos = strpos($result, "<meta content=");
        if($metaPos != false)
        {
            $meta = substr($result ,$metaPos,70);

            //meghdare followers
            $followerPos = strpos($meta , "Followers");
            $followers = substr($meta , 15 , $followerPos-15);
            $output[0] = $followers;
dd($output);
            //meghdare followings
            // $commaPos = strpos($meta , ',');
            $followingPos = strpos($meta, 'Following');
            $followings = substr($meta , $followerPos+10 , $followingPos - ($followerPos+10));
            $output[1] = $followings;


            //meghdare posts
            $seccondCommaPos = $followingPos + 10;
            $postsPos = strpos($meta, 'Post');
            $posts = substr($meta, $seccondCommaPos , $postsPos - $seccondCommaPos);
            $output[2] = $posts;

            //image finder
            $imgPos = strpos($result, "og:image");
            $image = substr($result , $imgPos+19 , 200);
            $endimgPos = strpos($image, "/>");
            $finalImagePos = substr($result, $imgPos+19 , $endimgPos-2);
            $output[3] = $finalImagePos;

            return $output;
        }
        else
        {
            return null;
        }
    }
}
