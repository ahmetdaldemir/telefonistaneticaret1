<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data['orders'] = Order::where('order_status','WAIT')->get();
        return view('admin/index',$data);
    }

    public function getDashboardData(Request $request)
    {

        $startDate = Carbon::parse($request->input('start_date'))->format('Y-m-d');
        $endDate =  Carbon::parse($request->input('end_date'))->format('Y-m-d');

        // Tarih aralığına göre satışları filtrele
        $sales = Order::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, SUM(total_price) as total')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        return response()->json($sales);

    }
}