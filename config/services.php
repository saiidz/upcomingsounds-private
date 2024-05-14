<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'twitter' => [
        'client_id' => env('TWITTER_API_KEY'),
        'client_secret' => env('TWITTER_API_SECRET_KEY'),
        'redirect' => env('TWITTER_CALLBACK_URL'),
    ],
    'facebook' => [
        'client_id' => env('FACEBOOK_API_KEY'),
        'client_secret' => env('FACEBOOK_API_SECRET_KEY'),
        'redirect' => env('FACEBOOK_CALLBACK_URL'),
    ],
    'google' => [
        'client_id' => env('GOOGLE_API_KEY'),
        'client_secret' => env('GOOGLE_API_SECRET_KEY'),
        'redirect' => env('GOOGLE_CALLBACK_URL'),
    ],
    'spotify' => [
        'client_id' => env('SPOTIFY_CLIENT_ID'),
        'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
        'redirect' => env('SPOTIFY_REDIRECT_URI')
    ],
    'twilio' => [
        'twilio_sid' => env('TWILIO_SID'),
        'twilio_token' => env('TWILIO_TOKEN'),
        'twilio_from' => env('TWILIO_FROM')
    ],
    'amazonSms' => [
        'key' => env('AMAZON_SMS_KEY'),
        'secret' => env('AMAZON_SMS_SECRET'),
    ],
    'Sendgrid' => [
        'SENDGRID_API_KEY' => env('SENDGRID_API_KEY'),
    ],
    'stripe' => [
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

//    'firebase' => [
//        'api_key' => 'AIzaSyB1t3A3Wsypmiw7X2XEjuhYg1EEaUwVByI',
//        'auth_domain' => 'testing-fa666.firebaseapp.com',
//        'database_url' => 'https://testing-fa666-default-rtdb.firebaseio.com/',
//        'secret' => 'lFxem0KyJvbKhIWnlWDp3LWGaYFdip937opricEd',
//        'storage_bucket' => 'testing-fa666.appspot.com',
//        'project_id' => 'testing-fa666',
//        'messaging_sender_id' => '250434995581',
//        'appId' => '1:250434995581:web:56053413df18e6f7cab814'
//    ],
    'firebase' => [
        'api_key' => 'AIzaSyDnmxZsLMDafaI88IXOoGjM2DK2j1HtY04',
        'auth_domain' => 'upcomingsounds.firebaseapp.com',
        'database_url' => 'https://upcomingsounds-default-rtdb.firebaseio.com/',
        'secret' => 'lFxem0KyJvbKhIWnlWDp3LWGaYFdip937opricEd',
        'storage_bucket' => 'upcomingsounds.appspot.com',
        'project_id' => 'upcomingsounds',
        'messaging_sender_id' => '936754145543'
    ],

//    'firebase' => [
//        'api_key' => 'AIzaSyAFAG0STRC3knHuMsk6rs0WNbpqtsfrCJA',
//        'auth_domain' => 'toontutor.firebaseapp.com',
//        'database_url' => 'https://toontutor-default-rtdb.firebaseio.com/',
//        'secret' => 'n6iw1beLejVZNEd5UVqtuX7bMzgWyOC2wmb4sVk8',
//        'storage_bucket' => 'toontutor.appspot.com',
//        'project_id' => 'toontutor',
//        'messaging_sender_id' => '191310619833'
//    ],

];
