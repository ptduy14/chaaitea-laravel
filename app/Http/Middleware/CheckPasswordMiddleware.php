<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPasswordMiddleware
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
        if (Auth::attempt(['email' => Auth::user()->email, 'password' => $request->input('password')])) {
            return $next($request);
        }
        
        $toast_msg = 'Có lỗi xảy ra vui lòng thử lại sau';
        $toast_modify = 'danger';

        return redirect()->back()->with(compact('toast_msg', 'toast_modify'));
    }
}
