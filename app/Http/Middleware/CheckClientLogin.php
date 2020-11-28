<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Session;
class CheckClientLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('customer')->check())
        {
            $user = Auth::guard('customer')->user();
            if ($user->status == 1 )
            {
                return $next($request);
            }
            else
            {
                Session::put('error','Bạn phải đăng nhập để thực hiện chức năng này.');
                Auth::guard('customer')->logout();
                return redirect()->route('get-client-home');
            }
        }
        else
        {
            Session::put('error','Bạn phải đăng nhập để thực hiện chức năng này.');
            return redirect()->route('get-client-home');
        }
    }
}
