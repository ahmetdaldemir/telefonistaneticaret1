<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_variant_id', 'image', 'product_id', 'size', 'type', 'name', 'is_main', 'index'
    ];

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getImageAttribute($value)
    {
         // URL kontrolü için basit bir regex kullanıyoruz.
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value; // Eğer değer geçerli bir URL ise, doğrudan döndür.
        }


        // Eğer değer URL değilse, varsayılan bir dosya yolu ekleyerek döndür.
        return asset('storage/product/' . $value);
    }
}
