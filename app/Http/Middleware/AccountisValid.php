<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccountisValid
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
        if(isset($data['user_status_details']) && $data['user_status_details'] == 'inactive'){
            return redirect('/inactive');
        }else if(isset($data['user_status_details']) && $data['user_status_details'] == 'deleted'){
            return redirect('/deleted');
        }
        return $next($request);
    }
}
