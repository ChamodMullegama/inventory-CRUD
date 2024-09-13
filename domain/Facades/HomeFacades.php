<?php

namespace domain\Facades;

use domain\Services\HomeServices;
use domain\Services\ItemService;
use Illuminate\Support\Facades\Facade;

class HomeFacades extends Facade
{
    protected static function getFacadeAccessor()
    {
        return HomeServices::class;
    }
}

?>
