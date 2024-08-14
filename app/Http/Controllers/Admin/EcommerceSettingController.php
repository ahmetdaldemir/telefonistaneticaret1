<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\EcommerceSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EcommerceSettingController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data['ecommerceSettings'] = EcommerceSetting::all();
        $data['company'] = Company::find(auth()->guard('admin')->user()->company_id);
        return view('admin/ecommerceSetting', $data);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $value = $request->value;
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $value = time() . '.' . $image->getClientOriginalExtension();
            $image->move(storage_path('app/public/setting'), $value);
        }

        $ecommerceSetting = new EcommerceSetting();
        $ecommerceSetting->name = $request->name;
        $ecommerceSetting->value = $value;
        $ecommerceSetting->type = $request->type;
        $ecommerceSetting->slug = $request->name;
        $ecommerceSetting->company_id = auth()->user()->company_id??1;
        $ecommerceSetting->save();

        return redirect()->back();
    }


    public function show(EcommerceSetting $setting)
    {
        //
    }




    public function update(Request $request, EcommerceSetting $setting)
    {
        //
    }


    public function destroy(Request $request)
    {
        $image = EcommerceSetting::findOrFail($request->id);
        Storage::delete('setting/' . $image->img);
        $image->delete();
        return redirect()->back()->with('success', 'Slider deleted successfully!');
    }
}
