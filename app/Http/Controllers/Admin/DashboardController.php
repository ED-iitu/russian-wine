<?php
namespace App\Http\Controllers\Admin;
use App\Models\Order;

class DashboardController
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalAmount = Order::getTotalOrdersAmount();

        return view('vendor.voyager.index', compact('totalOrders', 'totalAmount'));
    }
}