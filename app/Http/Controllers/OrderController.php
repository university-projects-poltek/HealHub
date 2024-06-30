<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
  public function getAdminOrder()
  {
    $orders = Order::where('status', 'paid')->get();

    return view('pages.admin.order', [
      'orders' => $orders,
    ]);
  }

  
}
