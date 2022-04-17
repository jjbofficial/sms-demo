<?php

return [

    'apiKey' => env('ARKESEL_API_KEY', ''),

    'apiUrl' => env('ARKESEL_API_URL', 'https://sms.arkesel.com/api'),

    'sandbox' => (bool) env('ARKESEL_SANDBOX_MODE', false),

    'sender' => env('APP_NAME', 'Laravel'),
];
