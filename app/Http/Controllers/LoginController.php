<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public static function index()
    {
      return view('login');
    }

    public static function autentikasi(Request $request)
    { 
      $credentials = $request->validate([
        'email' => 'required|email:dns',
        'password' => 'required'
      ]);

      if(Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
      };

      return back()->with('loginError', 'Login Failed!');
    }
}
