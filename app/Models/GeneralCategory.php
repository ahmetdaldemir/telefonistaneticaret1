<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralCategory extends Model
{
    use HasFactory;



    public function parent()
    {
        return $this->belongsTo(GeneralCategory::class, 'parent_id','category_id');
    }

    public function children()
    {
        return $this->hasMany(GeneralCategory::class, 'parent_id','category_id');
    }

}
