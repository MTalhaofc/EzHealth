<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is logged in
        $loginId = session('user_login_id');
        $loggedIn = session('logged_in');

        // Ensure the login_id exists, is numeric, has 13 digits, and the user is logged in
        if (!$loggedIn || !$loginId || !is_numeric($loginId) || strlen($loginId) !== 13) {
            return redirect('loginuser')->withErrors('Only Registered Users can login, Contact Ez Health Office.');
        }

        return $next($request);
    }
}
