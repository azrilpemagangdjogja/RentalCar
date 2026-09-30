<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class MitraVehicleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        $mitravehicle = $user->vehicles()->exists();

        if (!$mitravehicle){
            return redirect()->route('vehicle.create');
        } else {
            return $next($request);
        }
    }
}
