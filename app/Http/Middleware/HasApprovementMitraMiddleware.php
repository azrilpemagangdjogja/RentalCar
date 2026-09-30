<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasApprovementMitraMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if ($user->applicantMitra()->exists() && $user->approvementVehicles()->doesntExist()) {
            return redirect()->route('first.vehicle.create');
        }
        return $next($request);
    }
}
