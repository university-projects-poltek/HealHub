<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class NavbarUser extends Component
{
  public $avatar;
  public $username;
  public $email;

    /**
     * Create a new component instance.
     */
    public function __construct($avatar, $username, $email)
    {
      $this->avatar = $avatar;
      $this->username = $username;
      $this->email = $email;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar-user');
    }
}

