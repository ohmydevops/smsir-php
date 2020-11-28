<?php
return [
    // SMS.ir Api Key
    'api-key' => env('SMSIR-API-KEY', 'Your api key'),
    // SMS.ir Secret Key
    'secret-key' => env('SMSIR-SECRET-KEY', 'Your secret key'),
    // Your sms.ir line number
    'line-number' => env('SMSIR-LINE-NUMBER', 'Your Sms.ir Line Number'),
    //HTTP Request Timeout (seconds)
    'request-timeout'=>10
];
