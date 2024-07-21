<?php

namespace App\Http\Controllers\Admin;

use App\Console\Commands\MounthDeal;
use App\Helpers\CategoryHelper;
use App\Helpers\GeneralCategoryHelper;
use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use App\Models\Brand;
use App\Models\Category;
use App\Models\GeneralCategory;
use App\Models\MarketAttribute;
use App\Models\MonthlyDeal;
use App\Models\Product;
use App\Models\VirtualMarketAttribute;
use App\Models\VirtualMarketCategory;
use App\Models\VirtualMarketCategoryCompare;
use App\Service\TrendyolOutService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Events\Product as ProductEvent;
use \FileUploader;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::all()->sortByDesc('id');
        return view('admin/product', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['attributeGroups'] = AttributeGroup::all();


        return view('admin/new_product', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        dd($request);
        $attributesList = [];
        $attributes = $request->product_attribute;
        foreach ($attributes as $key => $value) {
            if ($value['attribute_id'] == null) {
                unset($attributes[$key]);
            }
        }
        $attributesList = $attributes;
        $bundle = 0;

        if ($request->has('bundle')) {
            $bundle = 1;
        }

        $imageName = '';


        if ($request->id == 0) {
            $product = new Product();
        } else {
            $imageName = $request->fakeImageName;
            $product = Product::find($request->id);
        }

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(storage_path('app/public/images'), $imageName);
        }

        $imageNameList = [];
        if ($request->hasFile('imgList')) {
            $images = $request->file('imgList');
            foreach ($images as $imagex) {
                // Her dosya için benzersiz bir isim oluşturun
                $imageNamea = time() . '_' . rand(0, 99999999) . '.' . $imagex->getClientOriginalExtension();
                // Dosyayı taşıyın ve kaydedin
                $imagex->move(storage_path('app/public/images'), $imageNamea);
                $imageNameList[] = $imageNamea;
            }
        }


        $product->bulkDiscountPrice = strip_tags(trim($request->bulkDiscountPrice));
        $product->description = $request->description;

        if ($request->id == 0 && !empty($imageNameList)) {
            $product->imgList = $imageNameList;
        } else {
            if (!empty($imageNameList)) {
                $product->imgList = $imageNameList;
            }
        }

        if ($request->id == 0 && !is_null($imageName)) {
            $product->img = $imageName;
        } else {
            if (!is_null($imageName)) {
                $product->img = $imageName;
            }
        }

        $product->price = $request->price;
        $product->productCode = strip_tags(trim($request->productCode));
        $product->stock = strip_tags(trim($request->stock));
        if ($request->filled('tags')) {
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

        // Attribute ve attributeValue verilerini al
        $brand = $request->virtualBrand;
        $attributes = $request->virtualAttribute;
        $attributeValues = $request->virtualAttributeValue;

        // Event'i tetikle
        event(new ProductEvent($product, $brand, $attributes, $attributeValues));


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['attributeGroups'] = AttributeGroup::all();
        $data['product'] = Product::find($request->id);
        return view('admin/new_product', $data);
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
        $product = Product::find($id);
        foreach ($request->request as $key => $value) {
            $product->{$key} = $value == 0 ? 1 : 0;
        }
        $product->save();
        return response()->json('Urun Guncellendi', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        $product->productVirtualSetting()->delete();

        if ($product) {
            /* Default Image Delete */

            if ($product->img) {
                $explode = explode('/', $product->img);
                $lastElement = end($explode);

                if (Storage::disk('local')->exists('images/' . $lastElement)) {
                    Storage::disk('local')->delete('images/' . $lastElement);
                }
            }
            /* Default Image Delete */

            /* Detaıl Image Delete */

            if ($product->imgList) {
                foreach ($product->imgList as $item) {
                    if (Storage::disk('local')->exists('images/' . $item)) {
                        Storage::disk('local')->delete('images/' . $item);
                    }
                }
            }

            /* Default Image Delete */
            MonthlyDeal::where('product_id', $request->id)->delete();
            $product->delete();
        }


        return redirect()->back();
    }


    public function mounthdeal($id, $status)
    {
        if ($status == 1) {
            MonthlyDeal::where('product_id', $id)->delete();
            return response()->json('Ayın Ürünü Silindi', 200);
        } else {
            $mounthdeal = new MonthlyDeal();
            $mounthdeal->product_id = $id;
            $mounthdeal->company_id = auth()->user()->company_id ?? 1;
            $mounthdeal->save();
            return response()->json('Ayın Ürünü Eklendi', 200);
        }

    }


    public function getVirtualBrandList(Request $request)
    {
        $brand = Brand::find($request->id);
        $name = $brand->name;
        $trndyolOutService = new TrendyolOutService();
        $brandservice = $trndyolOutService->brandSingle($name);
        return response()->json($brandservice, 200);
    }

    public function getVirtualAttributeList(Request $request)
    {
        $attributeService = [];
        $xx = VirtualMarketCategoryCompare::where('category_id', $request->id)->where('virtual_market_setting_id', 1)->first();
        if ($xx) {
            $trndyolOutService = new TrendyolOutService();
            $attributeService = $trndyolOutService->attributeSingle($xx->virtual_market_category_id);
        }
        return response()->json($attributeService, 200);
    }


    public function getCategories(Request $request)
    {

        $query = GeneralCategory::with('parent');

        $searchValue = $request->term;
        $query->where('name', 'LIKE', "%$searchValue%");

        $categories = $query->skip(0)->take(30)->get();

        $categoryPaths = GeneralCategoryHelper::getCategoryPaths($categories);

        return response()->json($categoryPaths, 200);


    }


    public function getAttributeList(Request $request)
    {

        $market_attribute_list = MarketAttribute::where('categoryId',$request->id)->get();
        if($market_attribute_list->count() > 0)
        {
            return response()->json($market_attribute_list, 200);
        }else{
            $trndyolOutService = new TrendyolOutService();
            $attributeService = $trndyolOutService->attributeCategoryId($request->id);
            if (count($attributeService) > 0) {
                foreach ($attributeService as $item) {
                    MarketAttribute::updateOrCreate(
                        ['market_attribute_id' => $item['attribute']['id'], 'categoryId' => $item['categoryId']],
                        ['name' => $item['attribute']['name'], 'required' => $item['required'] == 0 ? 'false' : 'true',
                            'varianter' => $item['varianter'] == 0 ? 'false' : 'true',
                            'slicer' => $item['slicer'] == 0 ? 'false' : 'true',
                            'attributeValues' => $item['attributeValues']
                        ]
                    );
                }
            }
            $market_attribute_list = MarketAttribute::where('categoryId',$request->id)->get();
            return response()->json($market_attribute_list, 200);
        }
    }

    public function getCategoryDetails(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categoryId = $request->id;
        $variants = $request->variants;
        $dataset = $request->dataSet;
        return view('admin.partials.variant', compact('categoryId','variants','dataset'));
    }


    public function imageUpload(Request $request)
    {
        $field = 'files';
        $uploadDir = '';

        // initialize FileUploader
        $FileUploader = new FileUploader($field, array(
            'limit' => 100,
            'fileMaxSize' => 100,
            'extensions' => null,
            'uploadDir' => storage_path('app/public/product/') . $uploadDir,
            'title' => 'auto'
        ));

        // upload
        $upload = $FileUploader->upload();
        if ($upload['isSuccess']) {
            foreach($upload['files'] as $key=>$item) {
                $upload['files'][$key] = array(
                    'extension' => $item['extension'],
                    'format' => $item['format'],
                    'file' => 'storage/' . $uploadDir . $item['name'],
                    'name' => $item['name'],
                    'size' => $item['size'],
                    'size2' => $item['size2'],
                    'title' => $item['title'],
                    'type' => $item['type'],
                    'url' => asset('storage/' . $uploadDir . $item['name'])
                );
            }
        }

        echo json_encode($upload);
        exit;
    }

    public function removeFile(Request $request) {
        if (isset($_POST['file'])) {
            $uploadDir = '';
            $file = storage_path('app/public/product') . $uploadDir . str_replace(array('/', '\\'), '', $_POST['file']);

            if(file_exists($file))
                unlink($file);
        }
        exit;
    }
}
