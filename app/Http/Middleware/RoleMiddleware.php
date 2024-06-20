<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next, $roles): Response
  {
    if (!Auth::check()) {
      return redirect('/not-found'); 
    }

    $user = Auth::user();
    if (!$user->role == 'admin' && !$user->role == 'user'){
      return redirect('/not-found');
    }

    return $next($request);
  }
}
