<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['brands'] =  Brand::all();
        return view('admin/brand', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->id == 0)
        {
            $brand = new Brand();
        }else{
            $brand = Brand::find($request->id);
        }

        $imageName = '';
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(storage_path('app/public/brand'), $imageName);
        }

        $brand->name = $request->name;
        $brand->img = $imageName;
        $brand->company_id = auth()->user()->company_id??1;
         $brand->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return Brand::find($request->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       $brand = Brand::find($request->id);
       $brand->delete();
        return redirect()->back();

    }


    public function update_status(Request $request)
    {

        $brand = Brand::find($request->id);
        $brand->is_status = !(($request->is_status == 1));
        $status = $brand->save();
        Product::where('brand',$request->id)->update(['status' => !(($request->is_status == 1))]);
        if ($status) {
            return response()->json(['message' => 'Marka ve Ürün durumları değiştirildi', 'title' => 'Başarılı', 'succcess' => true, 'icon' => 'success'], 200);
        }
        return response()->json(['message' => 'Marka durumu değiştirlemedi', 'title' => 'Başarısız', 'succcess' => false, 'icon' => 'warning'], 200);
    }

}
