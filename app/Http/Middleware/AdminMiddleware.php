<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {     // echo "<pre>"; print_r($request->user()); die();
         if ($request->user() && $request->user()->roll_id != 2) {
            return redirect('/');
          }
         return $next($request);
    }
}
