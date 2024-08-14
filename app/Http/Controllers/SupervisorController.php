<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\EcommerceSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SupervisorController extends Controller
{

    public function index()
    {
        $data['companies'] = Company::all();
        return view('supervisor.index', $data);
    }

    public function store(Request $request)
    {
        $company = Company::create($request->only([
            'title', 'kep_address', 'mersis_address', 'tax_office',
            'tax_number', 'company_name', 'company_type', 'website', 'licence', 'licence_finish'
        ]));

        // Set settings from the request data
        $company->setSettings($request->only([
            'invoice_address', 'shipping_address', 'return_address', 'slider_size', 'product_size'
        ]));

        return redirect()->back();
    }


    public function edit(Request $request)
    {
        $data['companies'] = Company::all();

        $data['company'] = Company::find($request->id);
        return view('supervisor.edit', $data);
    }


    public function update(Request $request)
    {

        $company = Company::find($request->id);

        $company->update($request->only([
            'title', 'kep_address', 'mersis_address', 'tax_office',
            'tax_number', 'company_name', 'company_type', 'website', 'licence', 'licence_finish',
        ]));

        $settings = [
            [
                'name' => 'Fatura Adresi',
                'value' => $request->input('invoice_address'),
                'type' => 'address',
                'slug' => 'fatura-adresi',
                'company_id' => $company->id,
            ],
            [
                'name' => 'Sevkiyat Adresi',
                'value' => $request->input('shipping_address'),
                'type' => 'address',
                'slug' => 'sevkiyat-adresi',
                'company_id' => $company->id,
            ],
            [
                'name' => 'İade Adresi',
                'value' => $request->input('return_address'),
                'type' => 'address',
                'slug' => 'iade-adresi',
                'company_id' => $company->id,
            ],
            [
                'name' => 'Slider Ölçüsü',
                'value' => $request->input('slider_size'),
                'type' => 'size',
                'slug' => 'slider-olcusu',
                'company_id' => $company->id,
            ],
            [
                'name' => 'Ürün Ölçüsü',
                'value' => $request->input('product_size'),
                'type' => 'size',
                'slug' => 'urun-olcusu',
                'company_id' => $company->id,
            ],
        ];

        // Iterate over settings and update or create each setting
        foreach ($settings as $setting) {
            EcommerceSetting::updateOrCreate(
                [
                    'slug' => $setting['slug'],
                    'company_id' => $setting['company_id'],
                ],
                [
                    'name' => $setting['name'],
                    'value' => $setting['value'],
                    'type' => $setting['type'],
                ]
            );
        }

        return redirect()->back();
    }

    public function siteUpdate(Request $request)
    {
        if ($request->hasFile('logo')) {
            $logoImage = $request->file('logo');
            $logo = time() . '.' . $logoImage->getClientOriginalExtension();
            $logoImage->move(storage_path('app/public/setting'), $logo);

            EcommerceSetting::updateOrCreate(
                [
                    'slug' => 'logo',
                    'company_id' => auth()->guard('admin')->user()->company_id,
                ],
                ['value' => $logo]
            );
        }

        if ($request->hasFile('favicon')) {
            $faviconImage = $request->file('favicon');
            $favicon = time() . '.' . $faviconImage->getClientOriginalExtension();
            $faviconImage->move(storage_path('app/public/setting'), $favicon);

            EcommerceSetting::updateOrCreate(
                [
                    'slug' => 'favicon',
                    'company_id' => auth()->guard('admin')->user()->company_id,
                ],
                ['value' => $favicon]
            );
        }

        foreach ($request->siteInformation as $key => $value) {
            $settings[] = [
                'value' => $value[0],
                'slug' => $key,
                'company_id' => auth()->guard('admin')->user()->company_id,
            ];
        }


        // Iterate over settings and update or create each setting
        foreach ($settings as $setting) {
            EcommerceSetting::updateOrCreate(
                [
                    'slug' => $setting['slug'],
                    'company_id' => $setting['company_id'],
                ],
                [
                    'value' => $setting['value'],
                ]
            );
        }

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        //
    }
}
