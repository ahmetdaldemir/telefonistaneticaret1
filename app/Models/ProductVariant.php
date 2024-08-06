<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends BaseModel
{
    use HasFactory;
    protected $fillable = ['product_id', 'barcode', 'retail_price', 'price', 'quantity', 'tax', 'stock_code', 'description'];


    protected $casts = ['image' => 'array'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class)->limit(1);
    }



}
