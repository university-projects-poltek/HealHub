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
        $rules = [
            'email'     => 'required',
            'password'  => 'required',
        ];

        $customMessages = [
            'email.required' => 'Silahkan masukan email',
            'password.required' => 'Silahkan masukan kata sandi',
        ];

        $this->validate($request, $rules, $customMessages);


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
