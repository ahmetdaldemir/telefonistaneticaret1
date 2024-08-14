<?php

namespace App\Models;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;


    public mixed $invoice_address;
    /**
     * @var mixed|string
     */
    public mixed $shipping_address;
    /**
     * @var mixed|string
     */
    public mixed $return_address;
    /**
     * @var mixed|string
     */
    public mixed $slider_size;
    /**
     * @var mixed|string
     */
    public mixed $product_size;
    protected $guarded = [
        'id', // ID gibi otomatik artan alanlar genellikle korunur
        'created_at', // Oluşturulma tarihi gibi otomatik yönetilen alanlar
        'updated_at', // Güncellenme tarihi gibi otomatik yönetilen alanlar
    ];


    protected $fillable = [
        'title',
        'kep_address',
        'mersis_address',
        'tax_office',
        'tax_number',
        'company_name',
        'company_type',
        'website',
        'licence',
        'licence_finish',
        'invoice_address',
        'shipping_address',
        'return_address',
        'slider_size',
        'product_size',

    ];
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Özelliği başlatma
        $this->invoice_address = '';
        $this->shipping_address = '';
        $this->return_address = '';
        $this->slider_size = '';
        $this->product_size = '';
    }
    public function settings()
    {
        return $this->hasMany(EcommerceSetting::class, 'company_id');
    }


    public function setSettings(array $settings)
    {
        $this->invoice_address = $settings['invoice_address'] ?? '';
        $this->shipping_address = $settings['shipping_address'] ?? '';
        $this->return_address = $settings['return_address'] ?? '';
        $this->slider_size = $settings['slider_size'] ?? '';
        $this->product_size = $settings['product_size'] ?? '';
        $this->save();
    }


}
