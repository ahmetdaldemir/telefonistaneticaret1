<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait FormatPrice
{
    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100,
        );
    }

    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => '₺'.' '.number_format($this->price, 2, ',', '.')
        );
    }
}
