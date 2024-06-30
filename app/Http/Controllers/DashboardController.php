<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function getUserDashboard()
  {
    return view('pages.user.dashboard');
  } 

  public function getAdminDashboard()
  {
    $totalProducts = Product::count();
    $totalOrders = Order::count();
    $totalIncome = $totalIncome = Order::where('status', 'paid')->sum('total_amount');

    return view('pages.admin.dashboard', [
      'totalProducts' => $totalProducts,
      'totalOrders' => $totalOrders,
      'totalIncome' => $totalIncome,
    ]);
  }
}
