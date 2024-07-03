<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sliders'] =  Slider::all();
        return view('admin/slider', $data);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $imageName = '';
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(storage_path('app/public/slider'), $imageName);
        }
        $slider = new Slider();
        $slider->url = $request->url;
        $slider->img = $imageName;
        $slider->text1 = $request->text1;
        $slider->text2 = $request->text2;
        $slider->company_id = auth()->user()->company_id ?? 1;
        $slider->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
       $slider =   Slider::find($id);
       $slider->{$request->field}  = $request->value == 0 ? 1 : 0;
       $slider->save();
       return response()->json('Güncelleme Başarılı',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $image = Slider::findOrFail($request->id);
        Storage::delete('slider/'.$image->img);
        $image->delete();
        return redirect()->back()->with('success' ,'Slider deleted successfully!');
    }
}
