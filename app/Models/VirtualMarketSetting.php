<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VirtualMarketSetting extends Model
{
    use HasFactory,SoftDeletes;
    protected $casts = [
        'settings' => 'array',
    ];
    protected $fillable = ['settings'];

}
