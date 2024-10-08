<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $adminRole = Session::get('admin_role');

        // Only allow users with the exact role 'Admin'
        if ($adminRole !== 'Admin') {
            return redirect('login')->withErrors('Only Admins can access these routes.');
        }

        return $next($request);
    }
}

