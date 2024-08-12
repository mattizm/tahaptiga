<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    $roles = Arr::except(func_get_args(), [0, 1]);
    if (Auth::guest() || !in_array($request->user() ? $request->user()->role : null, $roles)) {
      abort('403');
    }
    return $next($request);
  }
}
