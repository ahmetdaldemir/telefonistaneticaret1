<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;

class AdminController
{
    public function __construct()
    {
    }

    public function index()
    {
        $data['orders'] = Order::where('order_status','WAIT')->get();
        return view('admin/index',$data);
    }

}