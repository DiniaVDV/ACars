<?php

namespace App\Http\Middleware;

use Closure;

class ModeratorMiddleware
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
        $flag = false;

        foreach (\Auth::user()->roles()->get() as $role){
            if ($role->name == 'moderator')
            {
                $flag = true;
            }
        }

        if (!$flag)
        {
            return redirect('403');
        }
        return $next($request);
    }
}
