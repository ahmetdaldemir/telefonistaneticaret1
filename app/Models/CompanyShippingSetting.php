<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyShippingSetting extends Model
{
    use HasFactory;

    public function shipping()
    {
        return $this->hasOne(Shipping::class,'id','shipping_id');
    }
}
