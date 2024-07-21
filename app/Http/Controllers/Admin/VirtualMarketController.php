<?php

namespace app\Http\Controllers\Admin;

use App\Helpers\CategoryHelper;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\VirtualMarket;
use App\Models\VirtualMarketAttribute;
use App\Models\VirtualMarketCategory;
use App\Models\VirtualMarketCategoryCompare;
use App\Models\VirtualMarketSetting;
use app\Modules\Trendyol\Request\Category;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VirtualMarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['virtualMarkets'] = VirtualMarketSetting::where('company_id',auth()->guard('admin')->user()->company_id)->get();
        return view('admin/virtual_market/index', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:virtual_markets',
            'settingFields' => 'required|max:255',
        ]);
        $slider = new VirtualMarket();
        $slider->name = $request->name;
        $slider->settingFields = $request->settingFields;
        $slider->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data['virtualMarket'] = VirtualMarket::find($request->id);
        return view('admin/virtual_market/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function virtual_market_setting_store(Request $request)
    {
        VirtualMarketSetting::updateOrCreate(['company_id' => 1, 'virtual_market_id' => $request->id], [
            'settings' => $request->settings
        ]);
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->{$request->field} = $request->value == 0 ? 1 : 0;
        $slider->save();
        return response()->json('Güncelleme Başarılı', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $image = Slider::findOrFail($request->id);
        Storage::delete('slider/' . $image->img);
        $image->delete();
        return redirect()->back()->with('success', 'Slider deleted successfully!');
    }

    public function trendyol_category_compare(Request $request)
    {
        $data['virtual_market_category'] = VirtualMarketCategory::where('virtual_market_id',2)->get();
        $data['categories'] = \App\Models\Category::all();
        return view('admin/virtual_market/trendyol_category_compare', $data);

    }

    public function trendyol_attribute_compare(Request $request)
    {
        $virtualMarketCategories = VirtualMarketCategoryCompare::where('company_id',1)->pluck('virtual_market_category_id');
       dd($virtualMarketCategories,$request);
        $data['virtual_market_attribute'] = VirtualMarketAttribute::where('required',true)->whereIn('categoryId',$virtualMarketCategories)->get();
        $data['attributes'] = \App\Models\Attribute::all();
        return view('admin/virtual_market/trendyol_attribute_compare', $data);

    }

    public function getCategories(Request $request)
    {
       $x = VirtualMarketCategory::where('name','like',$request->term.'%')->get();
       return response()->json($x,200);
    }

    public function myCategories(Request $request)
    {
        $x = \App\Models\Category::where('name','like',$request->term.'%')->get();
        $y = CategoryHelper::getCategoryPaths($x);
        return response()->json($y,200);

    }

    public function getAttributes(Request $request)
    {
        $x = VirtualMarketAttribute::where('name','like',$request->term.'%')->get();
        return response()->json($x,200);
    }

    public function myAttributes(Request $request)
    {
        $y = \App\Models\Attribute::where('name','like',$request->term.'%')->get();
        return response()->json($y,200);

    }

    public function saveCompare(Request $request)
    {
        $virtualmarketCategoryCompare = VirtualMarketCategoryCompare::firstOrCreate(
            [
                'company_id' => 1,
                'virtual_market_category_id' => $request->trendyolCategories,
                'category_id' => $request->myCategories
            ],
            [
                'company_id' => 1, // Varsayılan değerler burada da belirtilmelidir
                'virtual_market_category_id' => $request->trendyolCategories,
                'category_id' => $request->myCategories
            ]
        );

        return response()->json('Kaydedildi');
    }




}
