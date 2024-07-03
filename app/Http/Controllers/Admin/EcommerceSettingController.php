<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\EcommerceSetting;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EcommerceSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['ecommerceSettings'] = EcommerceSetting::all();
        return view('admin/ecommerceSetting', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param \App\Models\EcommerceSetting $setting
     * @return \Illuminate\Http\Response
     */
    public function show(EcommerceSetting $setting)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EcommerceSetting $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EcommerceSetting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\EcommerceSetting $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $image = EcommerceSetting::findOrFail($request->id);
        Storage::delete('setting/' . $image->img);
        $image->delete();
        return redirect()->back()->with('success', 'Slider deleted successfully!');
    }
}
