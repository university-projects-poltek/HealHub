<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public $name;
    public $price;
    public $category;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $price, $category)
    {
      $this->name = $name;
      $this->price = $price;
      $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-card');
    }
}
