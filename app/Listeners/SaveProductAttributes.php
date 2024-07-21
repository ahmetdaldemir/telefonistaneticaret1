<?php

namespace App\Listeners;

use App\Events\Product;
use App\Events\ProductCreated;
use App\Models\ProductVirtualSetting;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveProductAttributes
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Product  $event
     * @return void
     */
    public function handle(Product  $event)
    {
        $product = $event->product;
        $brand = $event->brand;
        $attributes = $event->attributes;
        $attributeValues = $event->attributeValues;

        $productVirtualSetting = ProductVirtualSetting::updateOrCreate(
            ['product_id' => $product->id], // Arama kriteri
            [
                'brand_id' => $brand, // Güncellenecek veya oluşturulacak alanlar
                'attribute_id' => $attributes,
                'attribute_value_id' => $attributeValues
            ]
        );

    }
}
