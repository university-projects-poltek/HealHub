<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
      return view('pages.admin.products', [
        "title" => "All Products",
        "categories" => Category::all(),
        "products" => Product::all(),
      ]);
    }

    public function show($id)
    {
      $product = Product::findOrFail($id);

      return view('pages.detail-product', [
        "title" => "Single Product",
        "product" => $product,
        "products" => $this->getMoreProducts(),
      ]);
    }

    public function store(Request $request)
    {
      $validateData = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|integer|min:1',
        'stock' => 'required|integer|min:1',
        'manufacturer' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category_id' => 'required|exists:categories,id',
      ]);

      $filename = null;

      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();

        $file->storeAs('public/product_images', $filename);
      }


      $validateData['image'] = $filename;

      Product::create($validateData);

      return back()->with('success', '✅Product updated successfully.');

    }

    public function update(Request $request, $id)
    {
      $product = Product::findOrFail($id);

      $validatedData = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|integer|min:1',
        'stock' => 'required|integer|min:1',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'manufacturer' => 'required',
        'category_id' => 'required|exists:categories,id',
      ]);

      $filename = null;

      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();

        $file->storeAs('public/product_images', $filename);
      }


      $validatedData['image'] = $filename;

      $product->update($validatedData);

      return redirect()->route('admin.products')->with('success', '✅Product updated successfully.');

    }

    public function destroy($id)
    {

      $product = Product::findOrFail($id);
      $product->delete();

      return redirect()->route('admin.products')->with('success', '✅Product deleted successfully.');
    }

    public function getMoreProducts()
    {
      $products = Product::inRandomOrder()->take(4)->get();

      return $products;
    }
}
