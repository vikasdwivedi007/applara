<?php

namespace App\Http\Middleware;

use Closure;

class MemberMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {  
     if ($request->user() && $request->user()->roll_id != 4) {
            return redirect('/');
        }
        return $next($request);
    }
}
