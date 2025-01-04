<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class CheckAccountStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the authenticated user
            $user = Auth::user();

            // Check if the user is banned
            if ($user->banned_at !== null) {
                Auth::logout(); // Log out the user
                $request->session()->invalidate(); // Invalidate the session
                $request->session()->regenerate(); // Regenerate the session token
                return redirect(route('login'))->with('error', 'Your account has been blocked, please contact ADMIN');
            }
        }
        // if(auth()->check()){
        //     if(auth()->user()->banned_at !== NULL){
        //         auth()->logout();
        //         $request->session()->invalidate();
        //         $request->session()->regenerate();
        //         return redirect(route('login'))->with('error', 'Your account has been blocked, please contact admin');
        //     }
        // }


        return $next($request);
    }
}
