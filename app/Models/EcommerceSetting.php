<?php

namespace App\Models;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcommerceSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'value',
        'type',
        'slug',
        'company_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    protected static function booted()
    {
        static::addGlobalScope(new TenantScope);
    }
}
