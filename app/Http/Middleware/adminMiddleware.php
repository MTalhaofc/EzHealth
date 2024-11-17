<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Router;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the session contains the admin_role and it matches 'Super Admin'
        $adminRole = Session::get('admin_role');

        if ($adminRole !== 'Super Admin') {
            // Redirect to login with an error if the user is not a Super Admin
            return redirect('login')->withErrors('Only Super Admin can access this route.');
        }

        return $next($request);
    }
}