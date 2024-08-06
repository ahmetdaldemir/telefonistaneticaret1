<?php

namespace App\Models;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends BaseModel
{
    use HasFactory;

    protected $fillable = ['product_id', 'attribute', 'attribute_values'];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
