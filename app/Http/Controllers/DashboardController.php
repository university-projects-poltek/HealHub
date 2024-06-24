<?php

namespace App\Http\Controllers;

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
    return view('pages.admin.dashboard', [
      'totalProducts' => $totalProducts,
    ]);
  }
}
