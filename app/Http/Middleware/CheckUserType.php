<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserType
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
        $user = Auth::user();

        if($user->type = 'ADMIN')
        {
            return redirect('admin.index');
        }

        return $next($request);
    }
}
