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

    'facebook' =>[
       'client_id' => '1320604325545415',
       'client_secret' => 'e9a68b91f50921527c40ca8d0f043164',
       'redirect' => 'http://giaynew.demo.com/login/callback'
    ],
//GG local
    // 'google' => [
    // 'client_id' => '381378445544-e5shaj4vefq5sj909r02tm80f27b5gok.apps.googleusercontent.com',
    // 'client_secret' => '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',
    // 'redirect' => 'http://giaynew.demo.com/login/google/callback'
    // ],

    'google' => [
        'client_id' => '381378445544-e5shaj4vefq5sj909r02tm80f27b5gok.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/login/google/callback'
        ],




//GG onl
    // 'google' => [
    // 'client_id' => '381378445544-e5shaj4vefq5sj909r02tm80f27b5gok.apps.googleusercontent.com',
    // 'client_secret' => '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',
    // 'redirect' => 'http://lav2.cf/login/google/callback'
    // ],
];