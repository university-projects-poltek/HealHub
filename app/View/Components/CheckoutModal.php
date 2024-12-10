<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CheckoutModal extends Component
{
    public $name;
    public $total;
    public $address;
    public $number_phone;
    public $cartItems;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $total, $address, $number_phone, $cartItems)
    {
        $this->name = $name;
        $this->total = $total;
        $this->address = $address;
        $this->number_phone = $number_phone;
        $this->cartItems = $cartItems;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.checkout-modal');
    }
}
