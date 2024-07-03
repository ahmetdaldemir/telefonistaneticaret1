<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualMarketCategoryCompare extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'virtual_market_category_id','category_id'];
}
