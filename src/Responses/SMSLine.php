<?php

declare(strict_types=1);

namespace Amirbagh75\SMSIR\Responses;


class SMSLine
{
    /**
     * @var int
     */
    public $id;
    
    /**
     * @var string
     */
    public $lineNumber;
    
    public function __construct(int $id, string $lineNumber)
    {
        $this->id = $id;
        $this->lineNumber = $lineNumber;
    }
}
