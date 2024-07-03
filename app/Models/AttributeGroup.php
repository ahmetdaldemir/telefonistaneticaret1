<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeGroup extends Model
{
    use HasFactory;

    public function attribute()
    {
        return $this->hasMany(Attribute::class,'attribute_group_id','id');
    }
}
