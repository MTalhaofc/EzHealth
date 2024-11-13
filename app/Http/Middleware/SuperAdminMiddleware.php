<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Router;


class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    $adminRole = Session::get('admin_role');

    if ($adminRole !== 'Super Admin' && $adminRole !== 'Admin') {
        return redirect('login')->withErrors('Only Super Admin or Admin can access this');
    }
    
    return $next($request);
}
}
