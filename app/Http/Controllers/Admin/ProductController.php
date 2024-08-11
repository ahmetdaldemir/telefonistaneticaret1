<?php

namespace App\Http\Controllers\Admin;

use App\Console\Commands\MounthDeal;
use App\Filters\ProductFilter;
use App\Helpers\CategoryHelper;
use App\Helpers\GeneralCategoryHelper;
use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use App\Models\Brand;
use App\Models\Category;
use App\Models\EcommerceSetting;
use App\Models\GeneralCategory;
use App\Models\MarketAttribute;
use App\Models\MonthlyDeal;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImages;
use App\Models\ProductVariant;
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
    public function index(Request $request)
    {
        $products = [];
        if (!$request->bestSeller) {
            $filters = array_filter($request->only(['categories', 'brand', 'modelcode', 'name', 'stockcode', 'barcode']), function ($value) {
                return !is_null($value) && $value !== '';
            });
            $perPage = $request->get('perPage', 15);

            $products = (new ProductFilter($filters))
                ->apply(ProductVariant::with('product'), $perPage);
        } else {
            $filters = $request->only(['bestSeller']);
            $perPage = $request->get('perPage', 15);
            $products = (new ProductFilter($filters))->apply(ProductVariant::with('product'), $perPage);
        }

        $data['products'] = $products;
        $data['count'] = Product::count();
        $data['brands'] = Brand::all();
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
        $data['count'] = Product::count();

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


        //  // Ürün ve varyant verilerini doğrulayın
        //  $validatedData = $request->validate([
        //      'name' => 'required|string|max:255',
        //      'description' => 'nullable|string',
        //      'quantity' => 'required|integer',
        //      'variant.*.image' => 'nullable|json',
        //      'variant.*.barcode' => 'required|string',
        //      'variant.*.retail_price' => 'required|numeric',
        //      'variant.*.price' => 'required|numeric',
        //      'variant.*.quantity' => 'required|integer',
        //      'variant.*.tax' => 'required|numeric',
        //      'variant.*.stock_code' => 'required|string',
        //  ]);

        // Slug'ı oluşturun
        $slug = Str::slug($request->input('name'));

        // Ürün verilerini hazırlayın ve slug'ı ekleyin
        $productData = $request->except('variant');
        $productData['slug'] = $slug;
        $productData['free_shipping'] = $request->filled('free_shipping') ?: $request->input('free_shipping');
        $productData['bundle'] = $request->filled('bundle') ?: $request->input('bundle');
        $variantsData = $request->input('variant');
        $attributesData = $request->input('attribute');
        $flattenedVariants = [];

        foreach ($variantsData as $variantsGroup) {

            // 1. Resim bilgisi olan varyantların tespit edilmesi
            $existingImages = array_filter($variantsGroup, function ($variant) {
                return !empty($variant['image']);
            });

            if (!empty($existingImages)) {
                // İlk resim bilgisi olan varyantı al
                $defaultImage = $existingImages[array_key_first($existingImages)]['image'];

                // 2. Eksik resim bilgisini doldurma
                foreach ($variantsGroup as &$variantData) {
                    if (empty($variantData['image'])) {
                        $variantData['image'] = $defaultImage;
                    }
                }
            }


            foreach ($variantsGroup as $variant) {
                $flattenedVariants[] = $variant;
            }
        }
        $product = Product::updateOrCreate(
            ['barcode' => $productData['barcode'], 'modelcode' => $productData['modelcode']], // Eşleşme Koşulu
            [
                'name' => $productData['name'],
                'description' => $productData['description'],
                'tags' => $productData['tags'],
                'brand' => $productData['brand'],
                'category' => $productData['categories'],
                'slug' => $productData['slug'],
                'free_shipping' => $productData['free_shipping'],
                'bundle' => $productData['bundle'],
            ]
        );

        foreach ($flattenedVariants as $variantData) {
            // Variantı güncelle veya oluştur
            $variant = $product->variants()->updateOrCreate(
                ['barcode' => $variantData['barcode']], // Eşleşme koşulu (unique field)
                [   // Güncellenebilir / Oluşturulacak alanlar
                    'retail_price' => $variantData['retail_price'],
                    'product_id' => $product->id,
                    'price' => $variantData['price'],
                    'quantity' => $variantData['quantity'],
                    'tax' => $variantData['tax'],
                    'stock_code' => $variantData['stock_code'],
                    'description' => $variantData['description'] ?? null,
                ]
            );

            // JSON string to array
            $images = json_decode($variantData['image'], true);
            foreach ($images as $image) {
                $variant->images()->create([
                    'image' => $image['file'],
                    'product_id' => $product->id,
                    'size' => $product->id,
                    'type' => 'image/jpg',
                    'name' => $image['file'],
                    'index' => 1,
                    'is_main' => 0,
                ]);
            }
        }

        if (isset($attributesData[0])) {
            foreach ($attributesData[0] as $key => $value) {
                $product->attributes()->updateOrCreate(
                    ['attribute' => $key], // Eşleşme koşulu (benzersiz alan)
                    [   // Güncellenebilir / Oluşturulacak alanlar
                        'attribute_values' => $value,
                    ]
                );
            }
        }

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
        $data['product'] = ProductVariant::with('product')->find($request->id);
        $data['address'] = EcommerceSetting::whereIn('type', ['shipping_address', 'refund_address'])->get();
        $data['count'] = Product::count();
        return view('admin/edit_product', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $slug = Str::slug($request->input('name'));
        $productData = $request->except('variant');
        $productData['slug'] = $slug;
        $productData['free_shipping'] = $request->filled('free_shipping') ?: $request->input('free_shipping');
        $productData['bundle'] = $request->filled('bundle') ?: $request->input('bundle');
        $attributesData = $request->input('attribute');


        $product->modelcode = $productData['modelcode'];
        $product->name = $productData['name'];
        $product->description = $productData['description'];
        $product->tags = $productData['tags'];
        $product->brand = $productData['brand'];
        $product->slug = $productData['slug'];
        $product->free_shipping = $productData['free_shipping'];
        $product->bundle = $productData['bundle'];
        $product->save();


        $product->variants()->where('product_id', $request->id)->where('id', $request->product_variant_id)->update([
            'retail_price' => $productData['retail_price'],
            'price' => $productData['price'],
            'quantity' => $productData['quantity'],
            'tax' => $productData['tax'],
            'stock_code' => $productData['stock_code'],
            'description' => $productData['description'] ?? null,
        ]);


        foreach ($attributesData as $key => $value) {
            foreach ($value as $item => $itemValue) {
                $product->attributes()->updateOrCreate(
                    ['attribute' => $item], // Eşleşme koşulu (benzersiz alan)
                    [   // Güncellenebilir / Oluşturulacak alanlar
                        'attribute_values' => $itemValue,
                    ]
                );
            }
        }
        return redirect()->back();
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

    public function getCategory(Request $request)
    {
        $generalcategory = GeneralCategory::where('category_id', $request->id)->first();
        return response()->json($generalcategory, 200);
    }

    public function getAttributeList(Request $request)
    {

        $market_attribute_list = MarketAttribute::where('categoryId', $request->id)->get();
        if ($market_attribute_list->count() > 0) {
            return response()->json($market_attribute_list, 200);
        } else {
            $trndyolOutService = new TrendyolOutService();
            $attributeService = $trndyolOutService->attributeCategoryId($request->id);
            if (count($attributeService) > 0) {
                foreach ($attributeService as $item) {
                    MarketAttribute::updateOrCreate(
                        ['market_attribute_id' => $item['attribute']['id'], 'categoryId' => $item['categoryId']],
                        ['name' => $item['attribute']['name'], 'required' => $item['required'] == 0 ? 'false' : 'true',
                            'varianter' => $item['varianter'] == 0 ? 'false' : 'true',
                            'allow_custom' => $item['allowCustom'] == 0 ? 'false' : 'true',
                            'slicer' => $item['slicer'] == 0 ? 'false' : 'true',
                            'attributeValues' => $item['attributeValues']
                        ]
                    );
                }
            }
            $market_attribute_list = MarketAttribute::where('categoryId', $request->id)->get();
            return response()->json($market_attribute_list, 200);
        }
    }

    public function getAttributeListEdit(Request $request)
    {
        $array = [];
        $market_attribute_list = MarketAttribute::where('categoryId', $request->id)->where('slicer', 'false')->where('varianter', 'false')->where('required', 'true')->get();
        foreach ($market_attribute_list as $item) {
            $array[] = [
                'name' => $item->name,
                'id' => $item->id,
                'attribute_id' => $item->attribute_id,
                'required' => $item->required,
                'varianter' => $item->varianter,
                'slicer' => $item->slicer,
                'attributeValues' => $item->attributeValues,
                'selectedattributeValue' => ProductAttribute::where('product_id', $request->product_id)->where('attribute', $item->id)->first(),
            ];
        }

        return response()->json($array, 200);
    }

    public function getCategoryDetails(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categoryId = $request->id;
        $variants = $request->variants;
        $dataset = $request->dataSet;
        return view('admin.partials.variant', compact('categoryId', 'variants', 'dataset'));
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
            foreach ($upload['files'] as $key => $item) {
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

    public function removeFile(Request $request)
    {
        if (isset($_POST['file'])) {
            $uploadDir = '';
            $file = storage_path('app/public/product') . $uploadDir . str_replace(array('/', '\\'), '', $_POST['file']);

            if (file_exists($file))
                unlink($file);
        }
        exit;
    }


    public function editImageUpload(Request $request)
    {


        $action = $request->query('type', '');
        $id = $request->input('id');
        $product_id = $request->input('product_id');
        $product_variant_id = $request->input('product_variant_id');
        // upload


        if ($action == 'upload') {
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

                $data = ProductImages::create([
                    'product_id' => $product_id,
                    'product_variant_id' => $product_variant_id,
                    'image' => $upload['files'][0]['name'],
                    'is_main' => 0,
                    'size' => $upload['files'][0]['size'],
                    'type' => $upload['files'][0]['type'],
                    'name' => $upload['files'][0]['title'],
                    'index' => 1,
                ]);


            }

            echo json_encode($data);
            exit;
        }


        if ($action == 'preload') {
            $preloadedFiles = [];

            $query = ProductImages::where('product_variant_id', $product_variant_id)->get();
            if ($query->count() > 0) {
                foreach ($query as $row) {
                    $filePath = 'storage/product/' . $row->image;

                    $preloadedFiles[] = array(
                        'name' => $row->name,
                        'type' => $row->type,
                        'size' => $row->size,
                        'file' => $row->image,
                        'data' => array(
                            'url' => $row->image,
                            'date' => $row->created_at,
                            'isMain' => !($row->is_main == 0),
                            'thumbnail' => $row->image,
                            'listProps' => array(
                                'id' => $row->id,
                            )
                        ),
                    );

                }
            }
            echo json_encode($preloadedFiles);
            exit;
        }

        if ($request->input('sort') === 'sort') {
            // Listeyi al
            $list = $request->input('list');

            if ($list) {
                // Listeyi JSON'dan diziye çevir
                $list = json_decode($list, true);

                // Başlangıç indeksini belirle
                $index = 0;

                // Listeyi döngüye al
                foreach ($list as $val) {
                    // Gereken alanların mevcut olup olmadığını kontrol et
                    if (isset($val['id']) && isset($val['name']) && isset($val['index'])) {
                        // Gallery modelini kullanarak güncelleme yap
                        ProductImages::where('id', $val['id'])->update(['index' => $index]);
                        $index++;
                    } else {
                        // Eğer gerekli alanlar eksikse döngüyü kır
                        break;
                    }
                }
            }

            // İsteğe bağlı olarak bir başarı mesajı döndürebilirsiniz
            return response()->json(['message' => 'Items sorted successfully.']);
        }
// asmain
        if ($request->input('type') === 'asmain') {
            $id = $request->input('id');
            $name = $request->input('name');

            if ($id && $name) {
                // Tüm resimleri ana olarak işaretlemeyi kaldır
                ProductImages::query()->update(['is_main' => 0]);

                // Belirli ID'ye sahip resmi ana olarak işaretle
                ProductImages::where('id', $id)->update(['is_main' => 1]);

                // İsteğe bağlı olarak başarı mesajı döndürebilirsiniz
                return response()->json(['message' => 'Image set as main successfully.']);
            }

            // Geçersiz ID veya isim durumunda hata mesajı döndür
            return response()->json(['message' => 'Invalid ID or name.'], 400);
        }
    }

    private function getRealFile($file)
    {
        return str_replace(storage_path('app/public/product/'), '', $file);
    }

    public function update_price_stock(Request $request)
    {
        if ($request->retail_price < $request->price) {
            return response()->json(['message' => 'Satış Fiyatı , Perakende satış fiyatından büyük olamaz', 'title' => 'Başarısız', 'succcess' => false, 'icon' => 'warning'], 200);
        }
        $product_ids = $request->product_ids;
        foreach ($product_ids as $product_id) {
            $productvariant = ProductVariant::find($product_id);
            if ($request->filled('retail_price')) {
                $productvariant->retail_price = $request->retail_price;
            }
            if ($request->filled('price')) {
                $productvariant->price = $request->price;
            }
            if ($request->filled('quantity')) {
                $productvariant->quantity = $request->quantity;
            }
            $productvariant->save();
        }
        return response()->json(['message' => 'Fiyat ve stoklar başarıyla güncellendi! Lütfen Bekleyiniz', 'title' => 'Başarılı', 'succcess' => true, 'icon' => 'success'], 200);
    }


    public function update_variant_status(Request $request)
    {

        $productvariant = ProductVariant::find($request->id);
        $productvariant->is_active = !(($request->is_active == 1));
        $status = $productvariant->save();
        if ($status) {
            return response()->json(['message' => 'Ürün durumu değiştirildi', 'title' => 'Başarılı', 'succcess' => true, 'icon' => 'success'], 200);
        }
        return response()->json(['message' => 'Ürün durumu değiştirlemedi', 'title' => 'Başarısız', 'succcess' => false, 'icon' => 'warning'], 200);
    }


}
