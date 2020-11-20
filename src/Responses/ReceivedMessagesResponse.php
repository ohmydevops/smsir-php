<?php


namespace Amirbagh75\SMSIR\Responses;


class ReceivedMessagesResponse extends BaseResponse
{
    /**
     * @var int
     */
    public $countOfAll;
    
    /**
     * @var ReceivedMessage[]
     */
    public $receivedMessage;
    
    public function __construct(bool $isSuccessful, string $message, int $countOfAll, array $receivedMessage)
    {
        $this->isSuccessful = $isSuccessful;
        $this->message = $message;
        $this->countOfAll = $countOfAll;
        $this->receivedMessage = $receivedMessage;
    }
}