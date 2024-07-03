<?php

namespace app\Http\Controllers\Admin;

use App\Events\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Order;
use App\Models\OrderHistory;
use App\Models\RepairOrder;
use App\Models\RepairOrderHistory;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function ecommerce()
    {
        $data['orders'] = Order::all()->sortByDesc("id");
        $data['status'] = Order::ORDER_STATUS_STRINGS;
        return view('admin/order/ecommerce', $data);
    }

    public function detail(Request $request)
    {
        $data['order'] = Order::find($request->id);
        $data['order_histories'] = OrderHistory::where('order_id', $request->id)->get();
        return view('admin/order/detail', $data);
    }

    public function update(Request $request)
    {
        $order = Order::find($request->id);
        $order->reel_total_price = $request->price;
        $order->description_price = $request->value;
        $order->save();
        return redirect()->back();
    }

    public function status(Request $request)
    {
        $order = Order::find($request->id);
        $order->order_status = $request->value;
        $order->save();
        event(new OrderStatus($order));


        $repairOrderHistory = new  OrderHistory();
        $repairOrderHistory->order_id = $request->id;
        $repairOrderHistory->value = $request->value;
        $repairOrderHistory->save();


        return response()->json('Guncellendi', 200);
    }

    public function technical()
    {
        $data['orders'] = RepairOrder::all()->sortByDesc("id");
        $data['status'] = RepairOrder::ORDER_STATUS_STRINGS;
        return view('admin/order/technical', $data);
    }


    public function technicalOrder_detail(Request $request)
    {
        $data['order'] = RepairOrder::find($request->id);
        $data['order_histories'] = RepairOrderHistory::where('order_id', $request->id)->get();
        return view('admin/order/technical_detail', $data);
    }


    public function technicalUpdate(Request $request)
    {
        $order = RepairOrder::find($request->id);
        $order->reel_total_price = $request->price;
        $order->description_price = $request->value;
        $order->save();
        return redirect()->back();
    }

    public function technicalOrder_status(Request $request)
    {

        $order = RepairOrder::find($request->id);

        if ($order->reel_total_price <= 0) {
            return response()->json('Fiyat Belirlenmedi', 200);
        }
        $order->status = $request->value;
        $order->save();


        $repairOrderHistory = new RepairOrderHistory();
        $repairOrderHistory->order_id = $request->id;
        $repairOrderHistory->value = $request->value;
        $repairOrderHistory->save();

        return response()->json('Guncellendı', 200);
    }


}
