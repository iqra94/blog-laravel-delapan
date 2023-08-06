<?php

namespace App\Http\Middleware\Unpas;

use Closure;
use Illuminate\Http\Request;

class IsAdminMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next)
  {
    // if(auth()->guest() || auth()->user()->username !== 'kira') abort(403);
    if(!auth()->check() || !auth()->user()->is_admin) abort(403);
    return $next($request);
  }
}
