<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalOrders = Order::count();
        $totalProducts = product::count();
        $totalRevenue = Order::where('status', 'Delivered')->sum(DB::raw('price * quantity'));

        return view('dashboard', compact('totalUsers', 'totalOrders', 'totalProducts', 'totalRevenue'));
    }
}
