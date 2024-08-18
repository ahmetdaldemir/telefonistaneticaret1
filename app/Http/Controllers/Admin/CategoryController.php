<?php

namespace app\Http\Controllers\Admin;

use App\Helpers\CategoryHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\AttributeGroup;
use App\Models\Brand;
use App\Models\Category;
use App\Models\GeneralCategory;
use App\Models\MonthlyDeal;
use App\Models\Product;
use App\Service\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Image\Image;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{

    public function index()
    {
        $data['categories'] = Category::all();
        return view('admin.category.index', $data);
    }


    public function getCategory(Request $request)
    {
        if ($request->ajax()) {
            $query = Category::with('parent');

            if ($request->search['value'] != null) {
                $searchValue = $request->search['value'];
                $query->where('name', 'LIKE', "%$searchValue%");
            }

            $totalData = $query->count();
            $categories = $query->skip($request->start)->take($request->length)->get();

            $categoryPaths = CategoryHelper::getCategoryPaths($categories);

            return response()->json([
                "draw" => intval($request->draw),
                "recordsTotal" => $totalData,
                "recordsFiltered" => $totalData,
                "data" => $categoryPaths
            ]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategoryRequest $request)
    {
        // Resim adı form request'ten alınır
        $imageName = $request->input('image_name');
        // Kategoriyi oluştur
        $category = new Category();

        // Genel kategori adını ve slug'ını al
        $name = $this->getCategoryName($request->categories);
        $slug = Str::slug($name);
        if($request->filled('category_name'))
        {
             $slug = Str::slug($request->category_name);
             $name = $request->category_name;
        }


        // Kategori alanlarını doldur
        $category->category_id = $request->categories;
        $category->out_category = $request->out_category??0;
        $category->is_active = $request->is_active == 'on' ? 1 : 0;
        $category->name = $name;
        $category->parent_id = $request->parent_id??0;
        $category->company_id = auth()->guard('admin')->user()->company_id;
        $category->image = $imageName;
        $category->order = $request->order;
        $category->slug = $slug;
        $category->save();


        $category->content()->create([
                'description' => $request->description,
                'labels' => $request->labels,
            ]);


        return back()->with('success', 'Kategori başarıyla eklendi!');


    }
    private function getCategoryName($categoryId)
    {
        return GeneralCategory::where('category_id',$categoryId)->first()->name ?? '';
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
        $data['category'] = Category::find($request->id);
        return view('admin.category.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCategoryRequest $request)
    {
        // Resim adı form request'ten alınır
        $imageName = $request->input('image_name');

// İlgili kategoriyi bul
        $category = Category::findOrFail($request->id);

// Genel kategori adını ve slug'ını al
        $name = $this->getCategoryName($request->categories);
        $slug = Str::slug($name);

// Eğer 'category_name' doluysa slug ve name değerlerini güncelle
        if ($request->filled('category_name')) {
            $slug = Str::slug($request->category_name);
            $name = $request->category_name;
        }

// Kategori alanlarını doldur
        $category->category_id = $request->categories;
        $category->out_category = $request->out_category ?? 0;
        $category->is_active = $request->has('is_active') ? 1 : 0;
        $category->name = $name;
        $category->parent_id = $request->parent_id ?? 0;
        $category->company_id = auth()->guard('admin')->user()->company_id;

// Eğer resim adı varsa kaydet
        if ($imageName) {
            $category->image = $imageName;
        }

        $category->order = $request->order;
        $category->slug = $slug;
        $category->save();

// Kategoriye ait içeriği güncelle
        $category->content()->update([
            'description' => $request->description,
            'labels' => $request->labels,
        ]);

        return back()->with('success', 'Kategori başarıyla güncellendi!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = Category::find($request->id);
        if ($category) {
            $category->delete();
            Category::where('parent_id', $request->id)->delete();
            $message = 'Kategori ve alt kategorileri başarıyla silindi';
            return response()->json(['message' => $message], 200);
        } else {
            return response()->json(['message' => 'Kategori bulunamadı'], 404);
        }
    }


    public function getCategoryList(Request $request)
    {

        $query = Category::with('parent');
        $searchValue = $request->term;
        $query->where('name', 'LIKE', "%$searchValue%");
        $categories = $query->skip(0)->take(30)->get();
        $categoryPaths = CategoryHelper::getCategoryPaths($categories);
        return response()->json($categoryPaths, 200);

    }

}
