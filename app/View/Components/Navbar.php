<?php

namespace App\View\Components;

use App\Http\Controllers\CategoryController;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
  public $categories;
    /**
     * Create a new component instance.
     */
    public function __construct(CategoryController $categoryController)
    {
      $this->categories = $categoryController->getCategoriesForNavbar();

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
