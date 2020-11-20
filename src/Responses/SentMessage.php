<?php

namespace Amirbagh75\SMSIR\Responses;

class SentMessage
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $mobileNumber;

    public function __construct(int $id, string $mobileNumber)
    {
        $this->id = $id;
        $this->mobileNumber = $mobileNumber;
    }
}
