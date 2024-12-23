<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Pastikan pengguna terautentikasi
        if (!Auth::check()) {
            return redirect('/login'); // Redirect ke login jika belum login
        }

        // Periksa apakah pengguna memiliki peran yang sesuai
        $user = Auth::user();
        if ($user->role !== $role) {
            //return redirect('/unauthorized'); // Redirect jika peran tidak sesuai
            if($user->role == 'admin'){
                return redirect('/home');
            }else if($user->role == 'user'){
                return redirect('/');
            }
        }

        return $next($request);
    }
}
