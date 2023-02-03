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

    'google' => [
        'client_id'    => '289520262256-nad2s6im0lpjmgjj9m1t68kdook4q2ju.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect'     => 'http://bluebis.customerdevsites.com/google/callback', 
    ],

    'facebook' => [
        'client_id' => '1292663964644685', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'client_secret' => '4a07f438c7544a3c2e21ea98b6613f37', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'redirect' => 'http://127.0.0.1:8000/facebook/callback/'
    ],

];
