<?php

namespace App\Observers;

use App\Models\Company;
use App\Models\EcommerceSetting;

class CompanyObserver
{
    /**
     * Handle the Company "created" event.
     *
     * @param \App\Models\Company $company
     * @return void
     */
    public function created(Company $company)
    {
        // List of default settings to be created
        $settings = [
            ['name' => 'Fatura Adresi', 'value' => $company->invoice_address, 'type' => 'address', 'slug' => 'fatura-adresi', 'company_id' => $company->id],
            ['name' => 'Sevkiyat Adresi', 'value' => $company->shipping_address, 'type' => 'address', 'slug' => 'sevkiyat-adresi', 'company_id' => $company->id],
            ['name' => 'İade Adresi', 'value' => $company->return_address, 'type' => 'address', 'slug' => 'iade-adresi', 'company_id' => $company->id],
            ['name' => 'Slider Ölçüsü', 'value' => $company->slider_size, 'type' => 'size', 'slug' => 'slider-olcusu', 'company_id' => $company->id],
            ['name' => 'Ürün Ölçüsü', 'value' => $company->product_size, 'type' => 'size', 'slug' => 'urun-olcusu', 'company_id' => $company->id],
            ['name' => 'Logo', 'value' => '', 'type' => 'image', 'slug' => 'logo', 'company_id' => $company->id],
            ['name' => 'Favicon', 'value' => '', 'type' => 'image', 'slug' => 'favicon', 'company_id' => $company->id],
            ['name' => 'Phone', 'value' => '', 'type' => 'general', 'slug' => 'phone', 'company_id' => $company->id],
            ['name' => 'Address', 'value' => '', 'type' => 'general', 'slug' => 'address', 'company_id' => $company->id],
            ['name' => 'Email', 'value' => '', 'type' => 'general', 'slug' => 'email', 'company_id' => $company->id],
            ['name' => 'Zone', 'value' => '', 'type' => 'general', 'slug' => 'zone', 'company_id' => $company->id],
            ['name' => 'Gizlilik Sözleşmesi', 'value' => '', 'type' => 'information', 'slug' => 'gizlilik-sozlesmesi', 'company_id' => $company->id],
            ['name' => 'Satış Sözleşmesi', 'value' => '', 'type' => 'information', 'slug' => 'satis-sozlesmesi', 'company_id' => $company->id],
            ['name' => 'KVKK Sözleşmesi ', 'value' => '', 'type' => 'information', 'slug' => 'kvkk-sozlesmesi', 'company_id' => $company->id],
            ['name' => 'Mesafeli Satış Sözleşmesi', 'value' => '', 'type' => 'information', 'slug' => 'mesafeli-satis-sozlesmesi', 'company_id' => $company->id],
            ['name' => 'İptal ve İade Şartları', 'value' => '', 'type' => 'information', 'slug' => 'iptal-ve-iade-sartlari', 'company_id' => $company->id],
            ['name' => 'Facebook', 'value' => '', 'type' => 'general', 'slug' => 'facebook', 'company_id' => $company->id],
            ['name' => 'Instagram', 'value' => '', 'type' => 'general', 'slug' => 'instagram', 'company_id' => $company->id],
            ['name' => 'Youtube', 'value' => '', 'type' => 'general', 'slug' => 'youtube', 'company_id' => $company->id],
            ['name' => 'Twitter', 'value' => '', 'type' => 'general', 'slug' => 'twitter', 'company_id' => $company->id],
            ['name' => 'Linkedin', 'value' => '', 'type' => 'general', 'slug' => 'linkedin', 'company_id' => $company->id],
            ['name' => 'Whatsapp', 'value' => '', 'type' => 'general', 'slug' => 'whatsapp', 'company_id' => $company->id],
        ];

        // Insert each setting into the EcommerceSetting table
        foreach ($settings as $setting) {
            EcommerceSetting::create($setting);
        }
    }

    /**
     * Handle the Company "updated" event.
     *
     * @param \App\Models\Company $company
     * @return void
     */
    public function updated(Company $company)
    {

    }

    /**
     * Handle the Company "deleted" event.
     *
     * @param \App\Models\Company $company
     * @return void
     */
    public function deleted(Company $company)
    {
        //
    }

    /**
     * Handle the Company "restored" event.
     *
     * @param \App\Models\Company $company
     * @return void
     */
    public function restored(Company $company)
    {
        //
    }

    /**
     * Handle the Company "force deleted" event.
     *
     * @param \App\Models\Company $company
     * @return void
     */
    public function forceDeleted(Company $company)
    {
        //
    }
}
