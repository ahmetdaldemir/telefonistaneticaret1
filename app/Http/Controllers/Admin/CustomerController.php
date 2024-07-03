<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\MonthlyDeal;
use App\Models\Product;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {

        $data['categories'] = Customer::all();
        return view('admin.customer', $data);
    }


    public function getcustomers(Request $request)
    {
        if ($request->ajax()) {
            $query = Customer::with('address');

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Customer::all();
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
            $customer = new Customer();
        } else {
            $customer = Customer::find($request->id);
        }
        $customer->parent_id = $request->parent_id;
        $customer->company_id = 1;
        $customer->name = $request->name;
        $customer->save();
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
        $customer = Product::find($id);
        foreach ($request->request as $key => $value) {
            $customer->{$key} = $value == 0 ? 1 : 0;
        }
        $customer->save();
        return response()->json('Urun Guncellendi', 200);
    }

    public function statusupdate(Request $request)
    {
        $user = Customer::find($request->id);
        $user->is_status = $request->status == 1 ? 0 : 1;
        $user->save();
        return response()->json('Güncellendi', 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $customer = Customer::find($request->id);
        $customer->delete();
    }




}
