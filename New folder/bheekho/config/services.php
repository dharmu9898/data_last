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
    'client_id' => '3023342927773486',
    'client_secret' => '791256e20840ed82db776886787d08bf',
    'redirect' => 'http://localhost/bheekho/auth/facebook/callback',
    ],

    'google' => [
    'client_id' => '906072249051-24ghdkjhtu5vc14o9jua4q3p0bu3nop8.apps.googleusercontent.com',
    'client_secret' => 'h9gW3_vOhzJvR2sLUnBhcZoH',
    'redirect' => 'http://localhost/bheekho/auth/google/callback',
    ],

];
