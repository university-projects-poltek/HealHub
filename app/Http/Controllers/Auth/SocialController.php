<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
  public static function getSocialRedirect(Request $request)
  {
    return Socialite::driver('google')->redirect();
  }

  public static function getSocialHandle(Request $request)
  {
    $googleUser = Socialite::driver('google')->user();

    $user = User::updateOrCreate([
      'email' => $googleUser->email,
    ], [
      'username' => $googleUser->name,
      'email' => $googleUser->email,
      'avatar' => $googleUser->avatar,
      'password' => '123456'
      // 'token' => $googleUser->token,
      // 'refresh_token' => $googleUser->refreshToken,
    ]);

    Auth::login($user);

    return redirect()->route('home');
  }
}
