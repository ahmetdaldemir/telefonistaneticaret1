<?php

namespace App\Models;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyShippingSetting extends Model
{
    use HasFactory;

    protected $fillable = ['price','payload','status','shipping_id','company_id'];
    protected $casts = ['payload' => 'array'];

    public function shipping()
    {
        return $this->hasOne(Shipping::class,'id','shipping_id');
    }

    protected static function booted()
    {
        static::addGlobalScope(new TenantScope);
    }
}
