<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MitraVerifiedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        $mitraVerified = $user->mitra_status == "Verified";
        
        if ($mitraVerified) {
            return $next($request);
        } else {
            abort(401);
        };
    }
}
