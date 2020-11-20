<?php

namespace Amirbagh75\SMSIR\Responses;

class Message
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
    public $toBeSentAt;

    /**
     * @var string
     */
    public $nativeDeliveryStatus;

    /**
     * @var string
     */
    public $typeOfMessage;

    /**
     * @var string
     */
    public $sendAtLatin;

    /**
     * @var string
     */
    public $sendAtJalali;

    /**
     * @var bool
     */
    public $isChecked;

    /**
     * @var bool
     */
    public $isError;

    public function __construct(
        int $id,
        string $lineNumber,
        string $SMSMessageBody,
        string $mobileNumber,
        string $typeOfMessage,
        string $nativeDeliveryStatus,
        string $toBeSentAt,
        string $sendAtLatin,
        string $sendAtJalali,
        bool $isChecked,
        bool $isError
    ) {
        $this->id = $id;
        $this->lineNumber = $lineNumber;
        $this->mobileNumber = $mobileNumber;
        $this->SMSMessageBody = $SMSMessageBody;
        $this->typeOfMessage = $typeOfMessage;
        $this->nativeDeliveryStatus = $nativeDeliveryStatus;
        $this->toBeSentAt = $toBeSentAt;
        $this->sendAtJalali = $sendAtJalali;
        $this->sendAtLatin = $sendAtLatin;
        $this->isChecked = ($isChecked === false ? 0 : 1);
        $this->isError = ($isError === false ? 0 : 1);
    }
}
