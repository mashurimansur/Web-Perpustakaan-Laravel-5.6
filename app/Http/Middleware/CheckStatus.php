<?php

namespace App\Http\Middleware;
use App\User;
use Closure;

class CheckStatus
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
        $userID = \Auth::id();

        $user = User::find($userID);

        if ($user->status == 'User') {
            return redirect()->route('home');
        } 

        return $next($request);
    }
}
