<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

// use Session;
class StudentRegMiddleware
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
        if(Session::get('student_id') === null){
            
            return redirect('/student-portal');
        }
        return $next($request);
        
    }
}
