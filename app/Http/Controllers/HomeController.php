<?php

namespace App\Http\Controllers;


use App\Events\CheckoutRequested;
use App\Events\SendEmailEvent;
use App\Models\Brand;
use App\Models\City;
use App\Models\Customer;
use App\Models\Page;
use App\Models\RepairOrder;
use App\Models\RepairOrderHistory;
use App\Models\SiteTechnicalServiceCategory;

use App\Models\Town;
use App\Models\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{


    public function index()
    {
        $data['2'] = '';
        $data['site_technical_category'] = SiteTechnicalServiceCategory::all();
        return view('repair/index', $data);
    }

    public function getTown(Request $request)
    {
        $town = Town::where('city_id', $request->city)->get();
        return response()->json($town);
    }

    public function repair()
    {
        $data['2'] = '';
        $data['site_technical_category'] = SiteTechnicalServiceCategory::all();
        return view('repair/index', $data);
    }

    public function page(Request $request)
    {
        $data['page'] = Page::where('slug', $request->slug)->first();
        return view('repair/page', $data);
    }

    public function locations()
    {
        $data['page'] = 1;
        return view('repair/location', $data);
    }


    public function repairVersion(Request $request)
    {
        $data['2'] = '';
        $data['name'] = $request->name;
        $data['versions'] = Version::where('brand_id', $request->id)->get();
        $cache = Cache::get(Session::getId());
        $array = [
            'type' => $cache['type'],
            'brand_id' => $request->id,
        ];

        Cache::put(Session::getId(), $array);

        return view('repair/repairversion', $data);
    }


    public function repairBrand(Request $request)
    {
        $data['2'] = '';
        $data['type'] = $request->type;
        $array = ['type' => $request->type];
        \Cache::set(Session::getId(), $array);
        $data['brands'] = Brand::where('technical', TRUE)->where('is_status', TRUE)->get();
        return view('repair/repairbrand', $data);
    }

    public function repairs(Request $request)
    {
        $data['2'] = '';
        $data['version_id'] = $request->id;

        $cache = Cache::get(Session::getId());
        $array = [
            'type' => $cache['type'],
            'brand_id' => $cache['brand_id'],
            'version_id' => $request->id
        ];
        Cache::put(Session::getId(), $array);
        $data['site_technical_category'] = SiteTechnicalServiceCategory::where('category', $array['type'])->get();
        $data['repairarray'] = $array;
        return view('repair/repairs', $data);
    }

    public function form()
    {
        $data['2'] = '';
        $cache = Cache::get(Session::getId());
        if (is_null($cache)) {
            return redirect()->to('index');
        }
        $array = [
            'type' => $cache['type'],
            'brand_id' => $cache['brand_id'],
            'version_id' => $cache['version_id'],
        ];
        $data['site_technical_category'] = SiteTechnicalServiceCategory::where('category', $array['type'])->get();
        $data['cities'] = City::all();
        $data['array'] = $array;
        return view('repair/form', $data);
    }


    public function formadd(Request $request)
    {
        $cache = Cache::get(Session::getId());

        if (!auth()->guard('web')->check()) {
          $customer =  event(new CheckoutRequested($request->all()))[0];
        }else{
          $customer = Customer::find(auth()->id());
        }

        if ($request->city_id == 0 && $request->town_id == 0) {
            return redirect()->to('index')->with('message', 'İl İlçe Alanları seçim yapılmalı');
        }
        //  dd($request);
        $total = 0;
        foreach ($request->repaircategory as $item)
        {
            $total += SiteTechnicalServiceCategory::find($item)->price??0;
        }

        $repairorder = new RepairOrder();
        $repairorder->customer_id = $customer->id;
        $repairorder->firstname = $request->firstname;
        $repairorder->lastname = $request->lastname;
        $repairorder->phone = $request->phone;
        $repairorder->email = $request->email;
        $repairorder->imei = $request->imei;
        $repairorder->password = $request->password;
        $repairorder->description = $request->description;
        $repairorder->city_id = $request->city_id;
        $repairorder->town_id = $request->town_id;
        $repairorder->address = $request->address;
        $repairorder->repaircategory = $request->repaircategory;
        $repairorder->shippingCompany = $request->shippingCompany;
        $repairorder->proforma_total_price = $total;
        $repairorder->confirm = $request->confirm;
        $repairorder->type = $cache['type'];
        $repairorder->brand_id = $cache['brand_id'];
        $repairorder->version_id = $cache['version_id'];
        $repairorder->save();

        $id = $repairorder->id;

        $to = $request->email;
        $subject = 'Teknik Servis Siparisi';
        $content = 'E-posta içeriği';

        event(new SendEmailEvent($to, $subject, $content));

        return redirect()->route('voucher', ['id' => $id]);
    }

    public function voucher(Request $request)
    {
        $data['id'] = $request->id;
        $data['order'] = RepairOrder::find($request->id);
        return view('repair/voucher', $data);
    }

    public function assurant_device_care()
    {
        $data['2'] = '';
        return view('repair/assurant-device-care', $data);
    }

    public function detail(Request $request)
    {
        $data['2'] = '';
        $data['site_technical_category'] = SiteTechnicalServiceCategory::find($request->id);
        return view('repair/detail', $data);
    }

    public function allrepairs()
    {
        $data['2'] = '';
        $data['site_technical_category'] = SiteTechnicalServiceCategory::all();
        return view('repair/allrepairs', $data);
    }

    public function contact()
    {
        $data['2'] = '';
        $data['site_technical_category'] = SiteTechnicalServiceCategory::all();
        return view('repair/contact', $data);
    }


    const STATUS = [
        "1" => "İşleme Alındı",
        "3" => "Fiyat Onayı Bekleniyor",
        "7" => "Fiyat Onayı Alınamadı",
        "8" => "Onarım Sağlanamıyor",
        "2" => "Parça Bekleniyor",
        "9" => "Parça Tedarik Edilemedi",
        "4" => "Hazır",
        "5" => "Ödeme Alındı",
        "6" => "Tamamlandı",
        "10" => "İptal",
    ];


    public function getStatus(Request $request)
    {


        $data['message'] = "Cihaz Bulunamadı";
        $data['success'] = true;
        $tech = DB::connection('crm_mysql')->table('technical_services')->where('id', $request->imei)->first();

        if ($tech) {
            $data['message'] = self::STATUS[$tech->status];
        }

        return response()->json($data, 200);
    }


    public function register()
    {
        if (auth()->guard("web")->check()) {
            return redirect()->to("index");
        }
        $data['1'] = '';
        return view('repair/register', $data);
    }

    public function profil()
    {
        if (!auth()->guard("web")->check()) {
            return redirect()->to("index");
        }
        $data['cities'] = City::all();
        $data['orders'] = RepairOrder::where('customer_id',auth()->id())->get();
        return view('repair/profil/index', $data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('index');
    }


    public function registerSave(Request $request)
    {
        if (auth()->guard("web")->check()) {
            return redirect()->to("index");
        }
        $data['1'] = '';
        return view('repair/register', $data);
    }

    public function repair_my_device()
    {
        $data['2'] = '';
        $data['lists'] = SiteTechnicalServiceCategory::all();

        return view('repair/repair_my_device', $data);
    }

    public function repairOrderStatusChange(Request $request)
    {
       $repairOrder = RepairOrder::find($request->id);
       if($repairOrder->reel_total_price > 0){
           $repairOrder->status = $request->type;
           $repairOrder->save();


           $repairOrderHistory = new RepairOrderHistory();
           $repairOrderHistory->order_id = $request->id;
           $repairOrderHistory->value = $request->type;
           $repairOrderHistory->save();
       }

       return redirect()->back();
    }


}
