<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Traits\HasRoles;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles, SoftDeletes;


    protected $fillable = ['code', 'fullname', 'tc', 'phone', 'address', 'city', 'district', 'email', 'note', 'company_id', 'is_status', 'is_danger','firstname', 'lastname', 'type',  'password'];


    public function customerAddress()
    {
        return $this->hasMany(CustomerAddress::class, 'customer_id');
    }

    public function customerInvoice()
    {
        return $this->hasMany(CustomerInvoice::class, 'customer_id');
    }


}
