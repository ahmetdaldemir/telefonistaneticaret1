<?php

namespace app\Http\Controllers\Admin;

use App\Helpers\CategoryHelper;
use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MonthlyDeal;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{

    public function index()
    {

        return view('admin.user');
    }


    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $query = User::with('activity');

            if ($request->search['value'] != null) {
                $searchValue = $request->search['value'];
                $query->where('name', 'LIKE', "%$searchValue%");
            }

            $totalData = $query->count();
            $categories = $query->skip($request->start)->take($request->length)->get();
            return response()->json([
                "draw" => intval($request->draw),
                "recordsTotal" => $totalData,
                "recordsFiltered" => $totalData,
                "data" => $categories
            ]);
        }
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
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);
            $user = new User();
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
            ]);
            $user = User::find($request->id);
        }

        if($request->filled('password')){
            $user->password = bcrypt($request->password);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->company_id = 1;
        $user->seller_id = 1;
        $user->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return response()->json('Silindi', 200);
    }

    public function statusupdate(Request $request)
    {
        $user = User::find($request->id);
        $user->is_status = $request->status == 1 ? 0 : 1;
        $user->save();
        return response()->json('Güncellendi', 200);
    }

}
