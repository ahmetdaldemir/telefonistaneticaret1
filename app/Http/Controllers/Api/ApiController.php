<?php namespace app\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Page;
use App\Models\RepairOrder;
use App\Models\User;
use App\Models\Version;
use App\Service\CategoryService;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function __construct()
    {
    }


    public function users(Request $request)
    {
        return User::paginate($request->pageSize);
    }

    public function brands(Request $request)
    {
        return Brand::paginate($request->pageSize);
    }

    public function getPages(Request $request)
    {
        return Page::paginate($request->pageSize);
    }


    public function versions(Request $request)
    {
        return Version::where('brand_id', $request->filterData['brand_id'])->paginate($request->pageSize);
    }

    public function getVersions(Request $request)
    {
        return Version::where('brand_id', $request->id)->get();
    }
    public function brandStore(Request $request)
    {
        if ($request->filled('id')) {
            $brand = Brand::find($request->id);
        } else {
            $brand = new Brand();
        }

        $brand->name = $request->name;
        $brand->save();

        return response()->json($brand, 200);
    }


    public function versionStore(Request $request)
    {
        if ($request->filled('id')) {
            $brand = Version::find($request->id);
        } else {
            $brand = new Brand();
        }

        $brand->brand_id = $request->brand_id;
        $brand->name = $request->name;
        $brand->save();

        return response()->json($brand, 200);
    }


    public function repair_orders(Request $request)
    {
        return RepairOrder::paginate($request->pageSize);

    }

    public function categories()
    {
         $categories = new CategoryService();
        return response()->json($categories->getApiCategoryTree(), 200);
    }

}
