<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

// use Session;
class ApplicantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Session::get('verified_applicant') === null){
            
            return redirect('/student-portal');
        }
        return $next($request);
        
    }
}
