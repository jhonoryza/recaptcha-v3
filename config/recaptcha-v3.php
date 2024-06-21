<?php

return [
    'google_recaptcha' => [
        'url' => env('GOOGLE_RECAPTCHA_URL', 'https://www.google.com/recaptcha/api/siteverify'),
        'site_key' => env('GOOGLE_RECAPTCHA_SITE_KEY'),
        'secret_key' => env('GOOGLE_RECAPTCHA_SECRET_SITE_KEY'),
        'min_score' => env('GOOGLE_RECAPTCHA_MIN_SCORE', 0.5),
    ]
];