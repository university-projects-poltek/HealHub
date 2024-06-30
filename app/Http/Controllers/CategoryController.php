<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
  public function index()
  {
    $categories = Category::all();

    return view('pages.admin.categories', [
      'categories' => $categories,
    ]);
  }

  public function store(Request $request)
  {
    $validateData = $request->validate([
      'name' => 'required|max:256',
    ]);

    $validateData['slug'] = Str::slug($validateData['name']);

    Category::create($validateData);

    return back()->with('success', '✅Category created successfully.');
  }

  public function update(Request $request, $id)
  {
    // Validasi data yang diterima
    $validateData = $request->validate([
      'name' => 'required|max:256',
    ]);

    $category = Category::findOrFail($id);

    // Buat slug dari nama
    $validateData['slug'] = Str::slug($validateData['name']);

    // Update data kategori
    $category->update($validateData);

    // Redirect atau respon sesuai kebutuhan
    return back()->with('success', 'Category updated successfully');
  }

  public function destroy($id)
  {
    $category = Category::findOrFail($id);


    $category->delete();

    return back()->with('success', 'Category deleted successfully');
  }

  public function getCategories()
  {
    $categories = Category::take(4)->get();
    return $categories;
  }

  public function getCategoriesForNavbar()
  {
    return Category::take(4)->get();
  }
}
