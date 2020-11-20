<?php

namespace Amirbagh75\SMSIR\Responses;

class ReceivedMessage
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $lineNumber;

    /**
     * @var string
     */
    public $SMSMessageBody;

    /**
     * @var string
     */
    public $mobileNumber;


    /**
     * @var string
     */
    public $typeOfMessage;

    /**
     * @var string
     */
    public $receiveAtLatin;

    /**
     * @var string
     */
    public $receiveAtJalali;

    public function __construct(
        int $id,
        string $lineNumber,
        string $SMSMessageBody,
        string $mobileNumber,
        string $typeOfMessage,
        string $receiveAtLatin,
        string $receiveAtJalali
    ) {
        $this->id = $id;
        $this->lineNumber = $lineNumber;
        $this->mobileNumber = $mobileNumber;
        $this->SMSMessageBody = $SMSMessageBody;
        $this->typeOfMessage = $typeOfMessage;
        $this->receiveAtJalali = $receiveAtJalali;
        $this->receiveAtLatin = $receiveAtLatin;
    }
}
