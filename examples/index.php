<?php

require_once '../vendor/autoload.php';

use Amirbagh75\SMSIR\SmsIRClient;
use GuzzleHttp\Exception\GuzzleException;

$apiKey = getenv('API_KEY');
$secretKey = getenv('SECRET_KEY');
$lineNumber = getenv('LINE_NUMBER');

$smsir = new SmsIRClient($apiKey, $secretKey, $lineNumber);

try {
    print_r($smsir->smsCredit());
} catch (GuzzleException $e) {
    echo $e->getMessage();
}
