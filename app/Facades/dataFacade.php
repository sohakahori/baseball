<?php

namespace App\Facades;
 
use Illuminate\Support\Facades\Facade;
 
class DataFacade extends Facade {
    protected static function getFacadeAccessor() {
        return 'data';  // ①
    }
}   