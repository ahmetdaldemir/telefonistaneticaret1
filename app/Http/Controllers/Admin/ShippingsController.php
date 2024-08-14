<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyShippingSetting;
use App\Models\Shipping;
use App\Models\Slider;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShippingsController extends Controller
{

    public function index()
    {
        $activeCompanyId = auth()->guard('admin')->user()->company_id; // Aktif şirketin ID'sini al

        $shippings = Shipping::with(['companyShipping' => function ($query) use ($activeCompanyId) {
            $query->where('company_id', $activeCompanyId);
        }])->where('status', 1)->get();
        $data['shippings'] = $shippings;
        return view('admin.shippings.index', $data);
    }


    public function store(Request $request)
    {

        $imageName = '';
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(storage_path('app/public/slider'), $imageName);
        }
        $slider = new Slider();
        $slider->url = $request->url;
        $slider->img = $imageName;
        $slider->text1 = $request->text1;
        $slider->text2 = $request->text2;
        $slider->company_id = auth()->user()->company_id ?? 1;
        $slider->save();
        return redirect()->back();
    }

    public function show($id)
    {

    }


    public function edit(Request $request)
    {
        $data['shipping'] = Shipping::find($request->id);
        return view('admin.shippings.edit', $data);
    }


    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->{$request->field} = $request->value == 0 ? 1 : 0;
        $slider->save();
        return response()->json('Güncelleme Başarılı', 200);
    }


    public function destroy(Request $request)
    {
        $image = Slider::findOrFail($request->id);
        Storage::delete('slider/' . $image->img);
        $image->delete();
        return redirect()->back()->with('success', 'Slider deleted successfully!');
    }

    public function companyStore(Request $request)
    {
        // Gelen istekteki verileri al
        $price = $request->price;
        $companyId = auth()->guard('admin')->user()->company_id;
        $shippingId = $request->id; // shipping_id'nin doğru şekilde alındığından emin ol

        $status = $request->status;

        // Eğer status 1 ise yeni kayıt oluştur veya güncelle
        if ($status == 1) {
            $companyShipping = CompanyShippingSetting::updateOrCreate(
                [
                    'company_id' => $companyId, // Koşul olarak kullanılacak company_id
                    'shipping_id' => $shippingId // Kayıt bulmak için kullanılacak ek koşul (opsiyonel)
                ],
                [
                    'price' => $price,
                    'payload' => $request->payload,
                    'status' => $status
                ]
            );
            return redirect()->back();
        }
    }

    public function companyStatusUpdate(Request $request)
    {
        $companyId = auth()->guard('admin')->user()->company_id;
        $shippingId = $request->id; // shipping_id'nin doğru şekilde alındığından emin ol

        $status = $request->status == 1 ? 0 : 1;

        $companyShipping = CompanyShippingSetting::updateOrCreate(
            [
                'company_id' => $companyId, // Koşul olarak kullanılacak company_id
                'shipping_id' => $shippingId // Kayıt bulmak için kullanılacak ek koşul (opsiyonel)
            ],
            [
                'status' => $status
            ]
        );
        $companyShipping->save();
        if ($companyShipping) {
            return response()->json([
                'message' => 'Kargo Güncellendi',
                'title' => 'Başarılı',
                'success' => true,
                'icon' => 'success'
            ], 200);
        }

        return response()->json([
            'message' => 'Kargo Güncellenemedi',
            'title' => 'Başarısız',
            'success' => false,
            'icon' => 'warning'
        ], 200);

    }
}
