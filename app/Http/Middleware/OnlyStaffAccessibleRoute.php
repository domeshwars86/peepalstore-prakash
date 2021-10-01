<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;

use Closure;

class OnlyStaffAccessibleRoute
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
        $userRole = session('user_role');
        if ($userRole == 'Staff'){
            $checkBlocked = DB::table('users')->select('is_blocked')->where('id',session('user_id'))->first();
            if($checkBlocked->is_blocked == 1){
                return redirect('/')->withErrors('You are blocked, please contact Admin');
            }
            return $next($request);
        }
        return redirect()->back();
    }
}
