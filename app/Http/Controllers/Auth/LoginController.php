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

  public function authenticate(Request $request)
  {
    $request->validate([
      'email'     => 'required',
      'password'  => 'required',
    ]);


    $data = $request->only('email', 'password');

    if (!Auth::attempt($data)) {
      return redirect()->route('login')->with('failed', 'Email atau Password Salah');
    }

    $user = Auth::user();

    if ($user->role == 'admin') {
      return redirect()->route('admin.dashboard');
    };

    return redirect()->route('home');
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    $request->session()->flush(); 

    return redirect('/');
  }
}
