<?php
namespace Ip2location\IP2LocationLaravel\Facade;

use Illuminate\Support\Facades\Facade;

class IP2LocationLaravel extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ip2locationlaravel';
    }
}
