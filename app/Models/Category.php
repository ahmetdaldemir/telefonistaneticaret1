<?php

namespace App\Models;

use App\Helpers\GeneralCategoryHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'parent_id',
        'company_id',
        'is_active',
        'image',
        'order',
        'slug',
        'out_category'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function generalCategory()
    {

        $query = GeneralCategory::with('parent');
        $query->where('category_id', $this->category_id);
        $categories = $query->skip(0)->take(30)->get();
        $categoryPaths = GeneralCategoryHelper::getCategoryPaths($categories);
        return $categoryPaths;
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }


    public function content()
    {
        return $this->hasMany(CategoryContent::class, 'category_id');
    }


    public function getImageAttribute($value)
    {
        if ($value) {
            // URL kontrolü için basit bir regex kullanıyoruz.
            if (filter_var($value, FILTER_VALIDATE_URL)) {
                return $value; // Eğer değer geçerli bir URL ise, doğrudan döndür.
            }
            // Eğer değer URL değilse, varsayılan bir dosya yolu ekleyerek döndür.
            return asset('storage/category/' . $value);
        }
        return 'no_image';

    }


}
