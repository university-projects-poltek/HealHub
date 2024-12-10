<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function process(Request $request)
    {
        $request->validate([
        
        ]);

        return redirect()->route('checkout.success')->with('succes_message', 'Checkout successfull');
    }

    public function success()
    {
        return view('checkout.success');
    }
}
