<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function getAdminOrder()
  {
    return view('pages.admin.order');
  }
}
