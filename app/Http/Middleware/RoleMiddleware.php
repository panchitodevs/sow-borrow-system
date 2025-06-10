<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();


        // If the user is not authenticated or their role isn't in the allowed roles
        if (!$user || !in_array($user->role, $roles)) {
            return redirect('/home');
        }


        return $next($request);
    }
}





