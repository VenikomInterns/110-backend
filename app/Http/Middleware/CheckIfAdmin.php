<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIfAdmin
{
    public function handle(Request $request, Closure $next) {

        $user = $request->user();
        abort_if(!$user, 401);
        abort_if(!$user->admin, 403);

        return $next($request);
    }//excellent
}
