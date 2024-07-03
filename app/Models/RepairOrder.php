<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RepairOrder extends Model
{
    use HasFactory,SoftDeletes;

    protected $casts = ['repaircategory' => 'array'];

    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'email',
        'imei',
        'password',
        'description',
        'city_id',
        'town_id',
        'address',
        'repairccategory',
        'shippingCompany',
        'confirm',
    ];
    public const TYPE_STRINGS = [
        'phone' => 'Telefon',
        'watch' => 'Saat',
        'ipad' => 'Tablet',
        'mac' => 'Bilgisayar',

    ];

    public const ORDER_STATUS_STRINGS = [
        'WAIT' => 'BEKLEMEDE',
        'CONFIRM' => 'ONAYLANDI',
        'REJECT' => 'REDDEDILDI',
        'PAYMENT_WAIT' => 'ODEME BEKLENIYOR',
        'PAYMENT_CONFIRM' => 'ODEME ONAYLANDI',
        'PAYMENT_COMPLATE' => 'ODEME TAMAMLANDI',
        'COMPLATE' => 'TAMAMLANDI',
        'RETURN_BACK' => 'IADE',
    ];


    public function city()
    {
        return $this->hasOne(City::class,'id','city_id');
    }

    public function town()
    {
        return $this->hasOne(Town::class,'id','town_id');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class,'id','brand_id');
    }

    public function version()
    {
        return $this->hasOne(Version::class,'id','version_id');
    }
}
