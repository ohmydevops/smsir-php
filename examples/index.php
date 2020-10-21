<?php

require_once '../vendor/autoload.php';

use Amirbagh75\SMSIR\SmsIRClient;

$apiKey = getenv('API_KEY');
$secretKey = getenv('SECRET_KEY');
$lineNumber = getenv('LINE_NUMBER');

$smsir = new SmsIRClient($apiKey, $secretKey, $lineNumber);
print_r($smsir->smsCredit());
