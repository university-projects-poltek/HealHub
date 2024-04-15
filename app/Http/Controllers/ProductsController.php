<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show()
    {
      return view('product', [
        "title" => "Single Product",
        "products" => Product::all(),
      ]);
    }
}
