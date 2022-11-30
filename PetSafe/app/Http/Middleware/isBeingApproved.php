<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\Service;
use Closure;
use Illuminate\Http\Request;

class isBeingApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $serviciosPendientes = Service::where('user_id', auth()->id())->where('active', 3)->get();
        if (sizeOf($serviciosPendientes) >= 1 && auth()->user()->role_id == Role::is_neighbour) {
            return redirect('/');
        }
        return $next($request);
    }
}
