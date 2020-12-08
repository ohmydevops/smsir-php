<?php

namespace Amirbagh75\SMSIR\Facades;

use Illuminate\Support\Facades\Facade;

class SMSIR extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'smsir';
    }
}
