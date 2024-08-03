<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticatedUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
           if (Auth::check()){
                if(Auth::user()->role_id === Role::getUserRoleID()){
                    return $next($request);
           }   else  
                
           if (Auth::check() || (auth()->user()->role_id === Role::getAdminRoleID() && auth()->user()->role_id === Role::getManagerRoleID())) {
               return redirect('/admin'); 
           }
        } 
         return redirect('/login')->with('error', 'Вы должны быть авторизованы, чтобы получить доступ к этой странице.');
    }   
          

       
       
}
