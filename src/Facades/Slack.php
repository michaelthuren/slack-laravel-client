<?php

namespace MichaelThuren\SlackLaravelClient\Facades;

use Illuminate\Support\Facades\Facade;
use MichaelThuren\SlackLaravelClient\Slack as Slacker;

class Slack extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Slacker::class;
    }
}
