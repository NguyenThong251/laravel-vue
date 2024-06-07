<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        $totalBills = Order::count();
        $totalProfit  = Order::sum('total_price');
        $totalProducts  = Product::count();
        $totalUsers =  User::count();
        $userData = User::select(DB::raw('MONTH(created_at) AS month'), DB::raw('COUNT(*) AS count'))
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->get();
        $billData = Order::select(DB::raw('MONTH(created_at) AS month'), DB::raw('COUNT(*) AS count'))
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->get();
        // dd($billData);
        return Inertia::render('Admin/Dashboard',[
            'totalBills' => $totalBills,
            'totalProfit' => $totalProfit,
            'totalProducts' => $totalProducts,
            'totalUsers' => $totalUsers,
            'userData' => $userData,
            'billData' => $billData,
        ]);
    }
}