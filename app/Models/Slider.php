<?php

namespace App\Models;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

    protected $disk = 'public';

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new TenantScope());
    }
    use HasFactory;
}
