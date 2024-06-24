<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryCard extends Component
{
  public $name;
  public $slug;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $slug)
    {
      $this->name = $name;
      $this->slug = $slug;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-card');
    }
}
