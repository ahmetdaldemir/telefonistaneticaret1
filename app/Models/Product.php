<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    use HasFactory;

    protected $casts = ['tags' => 'array','imgList' => 'array','product_attribute' => 'array'];

    public function mountlydeal()
    {
        return $this->hasOne(MonthlyDeal::class,'product_id','id');
    }
    public function wishlist()
    {
        return $this->hasOne(Wishlist::class,'product_id','id');
    }

    public function related()
    {
        return $this->hasMany(Product::class,'category','id');
    }

    public function getImgAttribute($value)
    {
        // URL kontrolü için basit bir regex kullanıyoruz.
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value; // Eğer değer geçerli bir URL ise, doğrudan döndür.
        }

        // Eğer değer URL değilse, varsayılan bir dosya yolu ekleyerek döndür.
        return asset('storage/images/' . $value);
    }

    public function productVirtualSetting()
    {
        return $this->hasMany(ProductVirtualSetting::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            $product->productVirtualSetting()->delete();
        });
    }
}


