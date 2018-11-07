<?php

namespace RuLong\Sms\Facades;

use Illuminate\Support\Facades\Facade;

class Sms extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \RuLong\Sms\Facade::class;
    }
}
