<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
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

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'facebook' => [
        'client_id' => '313352253444372',
        'client_secret' => '1a36fe05cd867cb4c654df75c2549235',
        'redirect' => 'http://localhost/holidaylandmark/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '671183517986-fe6847tgalllak5aqln65fno8rai64tl.apps.googleusercontent.com',
        'client_secret' => '24YHav2_7PoIcseFojXfbJqb',
        'redirect' => 'http://localhost/holidaylandmark/auth/google/callback',
    ],
    

];
