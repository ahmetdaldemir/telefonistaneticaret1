<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyDeal extends Model
{
    use HasFactory;


    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }

    public function product_variants()
    {
        return $this->hasOne(ProductVariant::class,'id','product_id');
    }
}
