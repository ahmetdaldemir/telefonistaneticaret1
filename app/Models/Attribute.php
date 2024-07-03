<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;


    public function groupname()
    {
        return $this->hasOne(AttributeGroup::class,'id','attribute_group_id');
    }
}
