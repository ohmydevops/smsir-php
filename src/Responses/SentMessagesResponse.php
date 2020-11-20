<?php

namespace Amirbagh75\SMSIR\Responses;

class SentMessagesResponse extends BaseResponse
{
    /**
     * @var int
     */
    public $countOfAll;

    /**
     * @var Message[]
     */
    public $messages;

    public function __construct(bool $isSuccessful, string $message, int $countOfAll, array $messages)
    {
        $this->isSuccessful = $isSuccessful;
        $this->message = $message;
        $this->countOfAll = $countOfAll;
        $this->messages = $messages;
    }
}
