<?php

namespace SendPulse\SendPulseLaravel;

use Illuminate\Support\Facades\Facade;

class SendPulseFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SendPulse\SendpulseApi';
    }
}