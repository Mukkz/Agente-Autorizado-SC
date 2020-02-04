<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
{

    public function handle($request, Closure $next)
    {
        if (Auth::user()->admin == 'nao') {
                return redirect()
                ->route('listar')
                ->with('user',Auth::user());            
            }else{
        return $next($request);
        }
    }
}
