<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public $id;
    public $name;
    public $price;
    public $category;
    /**
     * Create a new component instance.
     */
    public function __construct($id, $name, $price, $category)
    {
      $this->id = $id;
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
