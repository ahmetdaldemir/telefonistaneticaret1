<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel {
    use HasFactory;
    protected $fillable = [
 'name',
 'description',
 'modelcode',
 'barcode',
 'status',
 'tags',
 'brand',
 'category',
 'slug',
 'free_shipping',
 'bundle', 'company_id'];
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

    public function getImageAttribute($value)
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

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id', 'id');
    }

    public function brandModel()
    {
        return $this->hasOne(Brand::class, 'id', 'brand');
    }


    public function categoryModel()
    {
        return $this->hasOne(GeneralCategory::class, 'category_id', 'category');
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class, 'product_id', 'id');
    }

    public static function count()
    {
        return self::all();
     }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            $product->productVirtualSetting()->delete();
        });
    }
}


