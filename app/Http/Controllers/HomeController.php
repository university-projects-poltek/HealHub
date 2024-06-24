<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
      $items = [
        ['image' => '/images/bpjs.png', 'title' => 'Bpjs', 'description' => 'Bpjs kesehatan'],
        ['image' => '/images/pharos.png', 'title' => 'Pharos', 'description' => 'Pharos indonesia'],
        ['image' => '/images/bpjs.png', 'title' => 'Bpjs', 'description' => 'Bpjs kesehatan'],
        ['image' => '/images/pharos.png', 'title' => 'Pharos', 'description' => 'Pharos indonesia'], 
        ['image' => '/images/bpjs.png', 'title' => 'Bpjs', 'description' => 'Bpjs kesehatan'],
        ['image' => '/images/pharos.png', 'title' => 'Pharos', 'description' => 'Pharos indonesia'], 
        ['image' => '/images/bpjs.png', 'title' => 'Bpjs', 'description' => 'Bpjs kesehatan'],
        ['image' => '/images/pharos.png', 'title' => 'Pharos', 'description' => 'Pharos indonesia'],
    ];
    
    $categories = Category::take(4)->get();
    $newProducts = Product::orderBy('created_at', 'desc')->take(12)->get();

      return view('pages.home', [
        'items' => $items,
        'categories' => $categories,
        'newProducts' => $newProducts,
      ]);
    }
}
