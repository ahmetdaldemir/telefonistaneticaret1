<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MonthlyDeal;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] =  Product::all()->sortByDesc('id');
        return view('admin/product', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] =  Category::all();
        $data['brands'] =  Brand::all();
        $data['attributeGroups'] =  AttributeGroup::all();


        return view('admin/new_product',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $attributesList = [];
        $attributes = $request->product_attribute;
        foreach ($attributes as $key => $value){
            if($value['attribute_id'] == null)
            {
                unset($attributes[$key]);
            }
        }
        $attributesList = $attributes;
         $bundle = 0;

        if($request->has('bundle'))
        {
            $bundle = 1;
        }

        $imageName ='';


        if($request->id == 0)
        {
            $product = new Product();
        }else{
            $imageName = $request->fakeImageName;
            $product = Product::find($request->id);
        }

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(storage_path('app/public/images'), $imageName);
        }

        $imageNameList = [];
        if ($request->hasFile('imgList')) {
            $images = $request->file('imgList');
            foreach ($images as $imagex) {
                // Her dosya için benzersiz bir isim oluşturun
                $imageNamea = time().'_'.rand(0,99999999).'.'.$imagex->getClientOriginalExtension();
                // Dosyayı taşıyın ve kaydedin
                $imagex->move(storage_path('app/public/images'), $imageNamea);
                $imageNameList[] = $imageNamea;
            }
         }


        $product->bulkDiscountPrice  = strip_tags(trim($request->bulkDiscountPrice));
        $product->description = $request->description;

        if($request->id == 0 && !empty($imageNameList))
        {
            $product->imgList = $imageNameList;
        }else{
            if(!empty($imageNameList))
            {
                $product->imgList = $imageNameList;
            }
        }

        if($request->id == 0 && !is_null($imageName))
        {
            $product->img = $imageName;
        }else{
            if(!is_null($imageName))
            {
                $product->img = $imageName;
            }
        }

        $product->price = $request->price;
        $product->productCode = strip_tags(trim($request->productCode));
        $product->stock = strip_tags(trim($request->stock));
        if($request->filled('tags'))
        {
            $product->tags = $request->tags;
        }
        $product->taxRate = strip_tags(trim($request->taxRate));
        $product->brand = $request->brand;
        $product->category = $request->category;
        $product->version = $request->version;
        $product->name = strip_tags(trim($request->name));
        $product->slug = Str::slug($request->name);
        $product->bundle = $bundle;
        $product->product_attribute = $attributesList;
        $product->save();
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
    public function edit(Request $request)
    {
        $data['categories'] =  Category::all();
        $data['brands'] =  Brand::all();
        $data['attributeGroups'] =  AttributeGroup::all();
        $data['product'] =  Product::find($request->id);
        return view('admin/new_product',$data);
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
       $product = Product::find($id);
       foreach ($request->request as $key => $value)
       {
           $product->{$key} = $value == 0 ? 1 : 0;
       }
       $product->save();
       return response()->json('Urun Guncellendi',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function mounthdeal($id,$status)
    {
        if($status == 1)
        {
            MonthlyDeal::where('product_id',$id)->delete();
            return response()->json('Ayın Ürünü Silindi',200);
        }else{
            $mounthdeal = new MonthlyDeal();
            $mounthdeal->product_id = $id;
            $mounthdeal->company_id = auth()->user()->company_id ?? 1;
            $mounthdeal->save();
            return response()->json('Ayın Ürünü Eklendi',200);
        }

    }



}
