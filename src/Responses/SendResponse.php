<?php

namespace Amirbagh75\SMSIR\Responses;

class SendResponse extends BaseResponse
{
    /**
     * @var SentMessage[]
     */
    public $sentMessages;

    /**
     * @var string
     */
    public $batchKey;

    public function __construct(bool $isSuccessful, string $message, string $batchKey, array $sentMessages)
    {
        $this->isSuccessful = $isSuccessful;
        $this->message = $message;
        $this->batchKey = $batchKey;
        $this->sentMessages = $sentMessages;
    }
}
