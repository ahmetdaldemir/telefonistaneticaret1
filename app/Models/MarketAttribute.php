<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketAttribute extends Model
{
    use HasFactory;

    protected $casts = ['attributeValues' => 'json'];
    protected $fillable = ['market_attribute_id','categoryId','required','varianter','slicer','name','attributeValues'];

}
