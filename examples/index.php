<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Amirbagh75\SMSIR\SmsIRClient;

$apiKey = getenv('API_KEY');
$secretKey = getenv('SECRET_KEY');
$lineNumber = getenv('LINE_NUMBER');

$smsir = new SmsIRClient($apiKey, $secretKey, $lineNumber);
$res = $smsir->getSMSLines();

print_r($res->isSuccessful);
