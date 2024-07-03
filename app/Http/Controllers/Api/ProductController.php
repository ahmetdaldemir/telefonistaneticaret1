<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $files = $request->file('imgList');

        foreach ($files as $file) {
            // Dosyayı kaydetmek için uygun işlemleri gerçekleştirin
            // Örneğin, dosyayı depolama alanına kaydedebilirsiniz:
            $file->store('uploads');
        }

        return 'burada';
        $logo = file_get_contents($request->img);

        return response($logo)->header('Cache-Control', 'no-cache private')
            ->header('Content-Description', 'File Transfer')
            ->header('Content-Type', 'application/octet-stream')
            ->header('Content-length', strlen($logo))
            ->header('Content-Disposition', 'attachment; filename=image.png')
            ->header('Content-Transfer-Encoding', 'binary');
return '';
// Download image - this does not handle 404 or other webserver errors
         $imageContent = json_decode(file_get_contents($request->img));


        return  \Illuminate\Support\Facades\Storage::disk('public')->put('images', $imageContent);

        $logo = file_get_contents($path);
        return base64_encode($logo);
        $file = $request->file('img');
        return $file;
        // Dosyayı istediğiniz bir yere kaydet (örneğin storage/app/public klasörüne)
        $filePath = $file->store('imageNew');
      return $filePath;
        $imageData =  str_replace('blob:','',$request->img);
        $imageName = $request->input('name');

        // Resmi al ve belirtilen yere yükle
        $imageContent = file_get_contents($imageData);
        Storage::disk('public')->put('images/' . $imageName, $imageContent);

        return $imageContent;
        $image = $request->file('img');
        return time().'.'.$image->getClientOriginalExtension();

        foreach ($request->imgList as $item)
        {
            $image = $request->img;
            return $image;
            $imageNames = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('products'), $imageNames);
            $a[] = $imageNames;
        }


        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('products'), $imageName);
         }
return $a;

        dd($imageName);
        dd(gettype($request->imgList));
        $product = new Product();
        $product->name = $request->name;
        $product->bulkDiscountPrice = $request->bulkDiscountPrice;
        $product->costPerItem = $request->costPerItem;
        $product->description = $request->description;
        $product->img = $imageName;
        $product->code = $request->id;
        $product->imgList = $request->imgList;
        $product->price = $request->price;
        $product->productCode = $request->productCode;
        $product->status = $request->status;
        $product->stock = $request->stock;
        $product->tags = $request->tags;
        $product->taxRate = $request->taxRate;
        $product->brand = $request->brand;
        $product->category = $request->category;
        $product->version = $request->version;
        $product->save();
        return response()->json($product, 200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
    }
}
