<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
  function pageRegister()
  {
    return view('register');
  }
}