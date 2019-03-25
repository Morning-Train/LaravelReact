<?php

namespace MorningTrain\Laravel\React;

use Illuminate\Support\Facades\Facade;
use MorningTrain\Laravel\React\Services\React as ReactService;

class React extends Facade
{
    public static function getFacadeAccessor()
    {
        return ReactService::class;
    }
}
