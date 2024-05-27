<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    // Mengirim data kategori ke semua view
    View::composer('*', function ($view) {
      $categories = Category::all();
      $moreProducts = Product::inRandomOrder()->take(4)->get();

      $view->with('categories', $categories);
      $view->with('products', $moreProducts);
    });
  }
}
