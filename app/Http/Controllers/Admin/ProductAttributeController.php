<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeGroup;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MonthlyDeal;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['groups'] = AttributeGroup::all();
        return view('admin/product/attribute_groups', $data);
    }


    public function product_attribute_group_delete(Request $request)
    {
        $attributeGroup = AttributeGroup::find($request->id);
        $attributeGroup->delete();
        Attribute::where('attribute_group_id',$request->id)->delete();
        return redirect()->back();

    }

    public function product_attribute_delete(Request $request)
    {
        $attributeGroup = Attribute::find($request->id);
        $attributeGroup->delete();
        return redirect()->back();
    }

    public function store(Request $request)
    {
        if ($request->id == 0) {
            $attributeGroup = new Attribute();

        } else {
            $attributeGroup = Attribute::find($request->id);
        }
        $attributeGroup->attribute_group_id = $request->attribute_group_id;
        $attributeGroup->name = $request->name;
        $attributeGroup->save();
        return redirect()->back();
    }
    public function product_attribute_group_store(Request $request)
    {
        if ($request->id == 0) {
            $attributeGroup = new AttributeGroup();

        } else {
            $attributeGroup = AttributeGroup::find($request->id);
        }
        $attributeGroup->company_id = 1;
        $attributeGroup->name = $request->name;
        $attributeGroup->save();
        return redirect()->back();
    }
    public function show(Request $request)
    {
        return Attribute::find($request->id);
    }
    public function product_attribute_group_show(Request $request)
    {
        return AttributeGroup::find($request->id);
    }

    public function product_attribute_group_attributes(Request $request)
    {
         $data['attributes'] = Attribute::where('attribute_group_id',$request->id)->get();
         $data['attribute_group_id'] = $request->id;
        return view('admin/product/attributes', $data);

    }

    public function getattribute(Request $request)
    {
        if ($request->ajax()) {

            $categoryPaths = Attribute::all();
            $totalData = $categoryPaths->count();

            return response()->json([
                "draw" => intval($request->draw),
                "recordsTotal" => $totalData,
                "recordsFiltered" => $totalData,
                "data" => $categoryPaths
            ]);
        }
    }

}
