<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Amirbagh75\SMSIR\SmsIRClient;

$apiKey = getenv('API_KEY');
$secretKey = getenv('SECRET_KEY');
$lineNumber = getenv('LINE_NUMBER');

$smsir = new SmsIRClient($apiKey, $secretKey, $lineNumber);
try {
    $res = $smsir->getSentMessages('1399/06/01', '1399/10/01', 1, 250);
    print_r($res);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    error_log($e->getMessage(), 0);
}
