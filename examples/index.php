<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Amirbagh75\SMSIR\SmsIRClient;

$apiKey = getenv('API_KEY');
$secretKey = getenv('SECRET_KEY');
$lineNumber = getenv('LINE_NUMBER');
$timeOut = 3;

$smsir = new SmsIRClient($apiKey, $secretKey, $lineNumber, $timeOut);

try {
    $res = $smsir->getSentMessages(1, 250);
    print_r($res->messages);
    print_r($res->countOfAll);
} catch (Throwable $e) {
    error_log($e->getMessage(), 0);
}
