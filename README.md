[![StyleCI](https://github.styleci.io/repos/305987675/shield?branch=main)](https://github.styleci.io/repos/305987675?branch=main) [![Latest Stable Version](https://poser.pugx.org/amirbagh75/smsir-php/v)](//packagist.org/packages/amirbagh75/smsir-php) [![Total Downloads](https://poser.pugx.org/amirbagh75/smsir-php/downloads)](//packagist.org/packages/amirbagh75/smsir-php) [![License](https://poser.pugx.org/amirbagh75/smsir-php/license)](//packagist.org/packages/amirbagh75/smsir-php)
## Unofficial PHP Package for sms.ir

Inspired by the [official package](https://github.com/IPeCompany/SmsirLaravel). The official package just working in laravel! This package working in every PHP project 

PHP Versions Supported: `7.3, 7.4, 8.0, 8.1`   
Laravel Versions Supported: `8, 9, 10`

### How to install:
```
composer require amirbagh75/smsir-php
```

### Example (Pure PHP)
```php
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
```


### Example (Laravel)

First add these environment variables in your .env file:

```
SMSIR_API_KEY="xxxx"
SMSIR_SECRET_KEY="xxxx"
SMSIR_LINE_NUMBER="xxxx"
SMSIR_HTTP_TIMEOUT="10"
```
Then use it like the following example:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Example extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // do something ...
        try {
            $res = SMSIR::getSentMessages('1399/06/01', '1399/10/01', 1, 250);
            dd($res);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            Log::error($e->getMessage());
        }
        // do something ...
    }
}
```


### Current methods:

Response models structures are in the `src/Responses` directory

```php
smsCredit(): CreditResponse

getSMSLines(): SMSLinesResponse

send(array $messages, array $mobileNumbers, $sendDateTime = null): SendResponse

sendVerificationCode(string $code, string $mobileNumber): VerificationCodeResponse

ultraFastSend(array $parameters, string $templateId, string $mobileNumber): VerificationCodeResponse

getSentMessages($fromDate, $toDate, $pageNumber = 1, $perPage = 100): SentMessagesResponse

getReceivedMessages($fromDate, $toDate, $pageNumber = 1, $perPage = 100): ReceivedMessagesResponse
```

## Versioning

We use [Semantic Versioning](http://semver.org/). [See the available versions](https://github.com/amirbagh75/smsir-php/releases).

## Authors

- **[Amirhossein Baghaie](https://github.com/amirbagh75)** - _Maintainer_
- **[Ariaieboy](https://github.com/ariaieboy)** - _Collaborator_
