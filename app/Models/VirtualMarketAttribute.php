<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualMarketAttribute extends Model
{
    use HasFactory;

    protected $casts = ['attributeValues' => 'json'];
    protected $fillable = ['virtual_market_id','virtual_market_attribute_id','categoryId','required','varianter','slicer','name','attributeValues'];

}
