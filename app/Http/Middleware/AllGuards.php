<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use JWTAuth;

class AllGuards extends  BaseMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next , $guard = null)
    {
//        $token = request()->header('Authorization');
//        dd($token);
//        return apiResponse('',$token,'400');
        if ($guard != null){
//            auth()->shouldUse($guard);
            $token = request()->header('Authorization');
            $request->headers->set('auth_token' , (string) $token ,true);
            $request->headers->set('Authorization' , 'Bearer ' .  $token ,true);
            try {
                $user = JWTAuth::parseToken()->authenticate();//check authenticated user or not
            }
            catch (TokenExpiredException $e){
                return apiResponse(null,'Un authenticated user','422');
            }
            catch (JWTException $e){
                return apiResponse(null,$e->getMessage(),'422');
            }
        }
        return $next($request);
    }


}
