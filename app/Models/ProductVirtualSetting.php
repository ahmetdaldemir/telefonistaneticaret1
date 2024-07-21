<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVirtualSetting extends Model
{
    use HasFactory;

    protected $casts = ['brand_id' => 'array' ,'attribute_id' => 'array' , 'attribute_value_id' => 'array' ];

    protected $fillable = ['product_id','brand_id', 'attribute_id', 'attribute_value_id'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
