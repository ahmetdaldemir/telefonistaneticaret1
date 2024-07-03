<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id','name','type','city','district','address','phone','addressSelect'];

    public function cityInfo()
    {
       dd('dsd');
    }
}
