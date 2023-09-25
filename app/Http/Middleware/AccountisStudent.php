<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccountisStudent
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
        $data = $request->session()->all();
        if(isset($data['user_role_details']) && $data['user_role_details'] == 'student'){
            return redirect('/student/profile');
        }
        return $next($request);
    }
}
