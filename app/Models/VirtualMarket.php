<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VirtualMarket extends Model
{
    use HasFactory,SoftDeletes;


    public function virtual_market_setting()
    {
        return $this->hasMany(VirtualMarketSetting::class,'virtual_market_id','id');
    }
}
