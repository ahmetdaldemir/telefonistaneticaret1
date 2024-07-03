<?php

namespace Amocart\Cart;

class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cart';
    }
}
