[![Latest Stable Version](https://poser.pugx.org/amirbagh75/smsir-php/v)](//packagist.org/packages/amirbagh75/smsir-php) [![Total Downloads](https://poser.pugx.org/amirbagh75/smsir-php/downloads)](//packagist.org/packages/amirbagh75/smsir-php) [![License](https://poser.pugx.org/amirbagh75/smsir-php/license)](//packagist.org/packages/amirbagh75/smsir-php)
## Unofficial PHP Package for sms.ir

Inspired by the [official package](https://github.com/IPeCompany/SmsirLaravel). The official package just working in laravel! This package working in every PHP project (PHP ^7.3).

### How to install:
```
composer require amirbagh75/smsir-php
```

### Example
```php
<?php

require_once '../vendor/autoload.php';

use Amirbagh75\SMSIR\SmsIRClient;

$apiKey = getenv('API_KEY');
$secretKey = getenv('SECRET_KEY');
$lineNumber = getenv('LINE_NUMBER');

$smsir = new SmsIRClient($apiKey, $secretKey, $lineNumber);
print_r($smsir->smsCredit());
```

### Current methods:

```php
smsCredit(): float

getSMSLines(): array

send(array $messages, array $mobileNumbers, $sendDateTime = null): array

sendVerificationCode(string $code, string $mobileNumber): array

ultraFastSend(array $parameters, string $templateId, string $mobileNumber): array

getSentMessages($fromDate, $toDate, $pageNumber = 1, $perPage = 100): array

getReceivedMessages($fromDate, $toDate, $pageNumber = 1, $perPage = 100): array
```
### Roadmap:

- [X] Add remaining methods
- [ ] Add exception handling
- [ ] Add Laravel 8.x support
- [ ] Add customer club
- [ ] Add Tests
