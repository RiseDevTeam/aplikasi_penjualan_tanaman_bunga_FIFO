<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class sudah_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $status)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else {
            return redirect()->route('dashboard');
        }

        $user = Auth::User();
        if ($user->status == $status) {
            return $next($request);
        }

        return redirect('auth/login')->with('Place Login');
    }
}
