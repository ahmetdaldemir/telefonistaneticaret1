<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;

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


    public function customer()
    {
        return $this->hasOne(Customer::class, 'id','customer_id');
    }

    public function customerAddress()
    {
        return $this->hasOne(CustomerAddress::class, 'id','customer_address_id');
    }
    public function customerInvoice()
    {
        return $this->hasOne(CustomerInvoice::class, 'id','customer_invoice_id');
    }

    public function items()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function status()
    {
        return self::ORDER_STATUS_STRINGS[$this->order_status];
    }

    public function shipment()
    {
        return $this->hasOne(Shipping::class, 'id','shipping_id');
    }

    public function getStatusDisableCheck()
    {
        if(in_array($this->order_status,['COMPLATE','RETURN_BACK','REJECT']))
        {
            return 'disabled';
        }
    }

    public function getStatusColor()
    {
        if($this->order_status == 'WAIT')
        {
            return '#f9d516';
        }

        if(in_array($this->order_status, ['PAYMENT_CONFIRM','PAYMENT_COMPLATE']))
        {
            return '#005d73';
        }

        if($this->order_status == 'PAYMENT_WAIT')
        {
            return '#f97316';
        }

        if(in_array($this->order_status, ['CONFIRM','COMPLATE']))
        {
            return '#1f6d18';
        }


        if($this->order_status == 'REJECT' || $this->order_status == 'RETURN_BACK')
        {
            return '#f00';
        }


    }

}
