<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PhotoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->header('uid')){
            return response()->json(['erreur' => 'action impossible']);
        }
        return $next($request);
    }
}
