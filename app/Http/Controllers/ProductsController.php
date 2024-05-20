<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
      return view('products', [
        "title" => "All Products",
        "products" => Product::all(),
      ]);
    }

    public function show($id){ 
      $product = Product::findOrFail($id);

      return view('product', [
        "title" => "Single Product",
        "product" => $product,
      ]);
    }

    public function store(Request $request){

      $validateData = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'quantity' => 'required',
        'manufacturer' => 'required',
        'category_id' => 'required',
      ]);

      // * TODO: create dynamic category INSERT
      $validateData['category_id'] = 1;

      Product::create($validateData);

      return redirect('/products');
    }

    public function update(Request $request, $id){
      
      $product = Product::findOrFail($id);

      $validatedData = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'manufacturer' => 'required',
        'category_id' => 'required|exists:categories,id',
      ]);

      $product->update($validatedData);

      return redirect('/products')->with('success', 'Product updated successfully.');

    }

    public function destroy($id)
    {
      
      $product = Product::findOrFail($id);
      $product->delete();

      return redirect('/products')->with('success', 'Product deleted successfully');
    }
}
