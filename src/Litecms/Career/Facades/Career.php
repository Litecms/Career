<?php

namespace Litecms\Career\Facades;

use Illuminate\Support\Facades\Facade;

class Career extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'career';
    }
}
