<?php

return [
    // SMS.ir Api Key
    'api-key' => env('SMSIR_API_KEY', 'Your api key'),
    // SMS.ir Secret Key
    'secret-key' => env('SMSIR_SECRET_KEY', 'Your secret key'),
    // Your sms.ir line number
    'line-number' => env('SMSIR_LINE_NUMBER', 'Your Sms.ir Line Number'),
    //HTTP Request Timeout (seconds)
    'request-timeout'=>10
];
