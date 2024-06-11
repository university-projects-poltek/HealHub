<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public static function index()
  {
    return view('auth.login');
  }

  public static function authenticate(Request $request)
  {
    $request->validate([
      'email'     => 'required',
      'password'  => 'required',
    ]);


    $data = $request->only('email', 'password');

    if (!Auth::attempt($data)) {
      return redirect()->route('login')->with('failed', 'Email atau Password Salah');
    }

    return redirect()->route('register');
  }
}
