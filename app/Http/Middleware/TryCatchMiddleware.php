<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TryCatchMiddleware
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
        $response = $next($request);

        if (!empty($response->exception)) {
            if($request->wantsJson()){
                return sendError($request->wantsJson(), null,$response->exception->getMessage(),null, 500);
            }else{
                $http_status_code = $response->getStatusCode();
                if($http_status_code == 401 || $http_status_code == 403 || $http_status_code == 404 || $http_status_code == 419 || $http_status_code == 429 || $http_status_code == 503){
                    $exception = $response->exception;
                    return response()->view('errors.' . $http_status_code,compact('exception'));
                }else{
                    return response()->view('errors.500');
                }
            }
        }else{
            return $response;
        }
    }
}
