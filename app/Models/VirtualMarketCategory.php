<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualMarketCategory extends Model
{
    use HasFactory;
    protected $fillable = ['virtual_market_category_id','virtual_market_id','name','parent_id'];
}
