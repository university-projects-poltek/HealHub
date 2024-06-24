<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
  public static function index()
  {
    return view('auth.register');
  }

  public static function store(Request $request)
  {
    $validatedData = $request->validate([
      'username' => 'required',
      'email' => 'required|email:dns|unique:users',
      'password' => 'required|min:5|max:255',
    ]);

    $validatedData['role'] = 'user';
    $validatedData['password'] = Hash::make($validatedData['password']);

    $createUser = User::create($validatedData);

    if (!$createUser) {
      return redirect('/register')->with('failed', 'Registration failed! Please try again');
    }

    return redirect('/login')->with('success', 'Registration successfull! Please login');
  }
}
