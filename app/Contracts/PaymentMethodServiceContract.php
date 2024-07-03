<?php

namespace app\Contracts;

use App\Models\Category;
use App\Models\Product;

interface PaymentMethodServiceContract
{
    public function apiKey();
    public function clientId();
    public function apiSecret();
    public function paymentCode();

}
