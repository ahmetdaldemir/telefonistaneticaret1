<?php

namespace app\Http\Controllers\Admin;

use App\Helpers\CategoryHelper;
use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MonthlyDeal;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{

    public function index()
    {

        $data['categories'] = Category::all();
        return view('admin.category', $data);
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

        if ($request->id == 0) {
            $category = new Category();
        } else {
            $category = Category::find($request->id);
        }
        $category->parent_id = $request->parent_id;
        $category->company_id = 1;
        $category->name = $request->name;
        $category->save();
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
    public function edit($id)
    {
        //
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
        $category = Product::find($id);
        foreach ($request->request as $key => $value) {
            $category->{$key} = $value == 0 ? 1 : 0;
        }
        $category->save();
        return response()->json('Urun Guncellendi', 200);
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


}
