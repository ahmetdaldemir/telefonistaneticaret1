<?php

namespace App\Models;

use App\Scopes\CompanyScope;
use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory,SoftDeletes;

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new TenantScope());
    }
     protected $fillable = [
        'name', 'is_status','technical','user_id'
    ];

}
