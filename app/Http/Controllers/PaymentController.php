<?php namespace app\Http\Controllers;

use App\Models\RepairOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{

    public function index(Request $request)
    {
        $data['title'] = 'Phone Hospital';
        $data['logo'] = 'Phone Hospital';
        $data['request'] = $request;
        $data['order'] = RepairOrder::find($request['OrderId']);
        return view('checkout_complate',$data);
    }

}
