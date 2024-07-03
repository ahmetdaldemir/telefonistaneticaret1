<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Version extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name', 'is_status', 'company_id','user_id','image','brand_id'
    ];



    public function brand()
    {
        return $this->hasOne(Brand::class,'id','brand_id');
    }
}
