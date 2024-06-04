<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public static function index()
    {
        return view('auth.login');
    }

    public static function loginProcess(Request $request)
    {
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);


        $data = $request->only('email', 'password');

        if (!Auth::attempt($data)) {
            return redirect()->route('login')->with('failed', 'Email atau Password Salah');
        }

        // return view('welcome');

        // return redirect()->route('welcome');
    }
}
