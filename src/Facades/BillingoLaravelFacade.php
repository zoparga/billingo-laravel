<?php

namespace zoparga\BillingoLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class BillingoLaravelFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'billingolaravel';
    }
}
