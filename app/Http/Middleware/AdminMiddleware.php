<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      $userdata=user::all();
      $usertype= $userdata->usertype=$request->usertype;

      if ($request->$usertype != 1)
      {
        return redirect('redirects');
      }
      return $next($request);
    }


}
