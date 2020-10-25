<?php

declare(strict_types=1);

namespace Amirbagh75\SMSIR;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\GuzzleException;

class SmsIRClient
{
    private $userApiKey;
    private $secretKey;
    private $token;
    private $lineNumber;
    private $client;

    /**
     * Create a new SMSIR Instance
     * @param  string  $userApiKey
     * @param  string  $secretKey
     * @param  string  $lineNumber
     * @param  int  $timeout
     */
    public function __construct(string $userApiKey, string $secretKey, string $lineNumber, int $timeout = 10)
    {
        $this->userApiKey = $userApiKey;
        $this->secretKey = $secretKey;
        $this->token = "";
        $this->lineNumber = $lineNumber;

        $this->client = new Client([
            'base_uri' => 'http://restfulsms.com/api/',
            'timeout' => $timeout
        ]);
    }

    /**
     * this method return your credit in sms.ir (sms credit, not money)
     *
     * @return float
     * @throws GuzzleException
     */
    public function smsCredit(): float
    {
        $result = $this->executeRequest('credit');
        return (float) json_decode($result->getBody()->getContents(), true)['Credit'];
    }

    /**
     * @param  string  $route
     * @param  null  $body
     * @return ResponseInterface
     * @throws GuzzleException
     */
    private function executeRequest(string $route, $body = null): ResponseInterface
    {
        if (is_null($body)) {
            return $this->client->get($route, [
                'headers' => [
                    'x-sms-ir-secure-token' => $this->getToken()
                ]
            ]);
        }
        return $this->client->post($route, [
            'json' => $body,
            'headers' => [
                'x-sms-ir-secure-token' => $this->getToken()
            ]
        ]);
    }

    /**
     * this method used in every request to get the token at first.
     *
     * @return mixed - the Token for use api
     * @return string
     * @throws GuzzleException
     */
    private function getToken(): string
    {
        $body = [
            'UserApiKey' => $this->userApiKey,
            'SecretKey' => $this->secretKey,
        ];
        $result = $this->client->post('Token', [
            'json' => $body,
        ]);
        return json_decode($result->getBody()->getContents(), true)['TokenKey'];
    }

    /**
     * by this method you can fetch all of your sms lines.
     *
     * @return array
     * @throws GuzzleException
     */
    public function getSMSLines(): array
    {
        $result = $this->executeRequest('SMSLine');
        return json_decode($result->getBody()->getContents(), true);
    }

    /**
     * Simple send message with sms.ir account and line number
     *
     * @param  array  $messages  = Messages - Count must be equal with $numbers
     * @param  array  $mobileNumbers
     * @param  null  $sendDateTime  = don't fill it if you want to send message now
     * @return array
     * @throws GuzzleException
     */
    public function send(array $messages, array $mobileNumbers, $sendDateTime = null): array
    {
        $body = [
            'Messages' => $messages,
            'MobileNumbers' => $mobileNumbers,
            'LineNumber' => $this->lineNumber
        ];
        if ($sendDateTime !== null) {
            $body['SendDateTime'] = $sendDateTime;
        }
        $result = $this->executeRequest('MessageSend', $body);
        return json_decode($result->getBody()->getContents(), true);
    }

    /**
     * this method send a verification code to your customer. need active the module at panel first.
     *
     * @param  string  $code
     * @param  string  $mobileNumber
     * @return array
     * @throws GuzzleException
     */
    public function sendVerificationCode(string $code, string $mobileNumber): array
    {
        $body = [
            'Code' => $code,
            'MobileNumber' => $mobileNumber
        ];
        $result = $this->executeRequest('VerificationCode', $body);
        return json_decode($result->getBody()->getContents(), true);
    }


    /**
     * @param  array  $parameters
     * @param  string  $templateId
     * @param  string  $mobileNumber
     * @return mixed
     * @throws GuzzleException
     */
    public function ultraFastSend(array $parameters, string $templateId, string $mobileNumber): array
    {
        if (count($parameters) == 0) {
            die("please fill parameters for ultraFastSend\n");
        }

        $params = [];
        foreach ($parameters as $key => $value) {
            $params[] = ['Parameter' => $key, 'ParameterValue' => $value];
        }
        $body = [
            'ParameterArray' => $params,
            'TemplateId' => $templateId,
            'Mobile' => $mobileNumber
        ];
        $result = $this->executeRequest('UltraFastSend', $body);
        return json_decode($result->getBody()->getContents(), true);
    }
}
