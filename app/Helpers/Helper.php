<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
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

    /**
     * @param $filePath
     * @param $file
     * @return bool|string
     */
    public static function S3_UPLOAD($filePath = null, $file)
    {
        Log::info('S3 Image Response');
        Log::info(json_encode($filePath));
        Log::info(json_encode($file));

        return Storage::disk('s3')->put($filePath, file_get_contents($file));
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
