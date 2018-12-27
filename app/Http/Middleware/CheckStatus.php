<?php

namespace App\Http\Middleware;
use App\Models\User;
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

        if ($user->id_role == 3) {
            return redirect()->route('home');
        } 

        return $next($request);
    }
}
