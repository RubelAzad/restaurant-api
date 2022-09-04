<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
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
        // Pre-Middleware Action

        $headers =[
            'Access-Control-Allow-Origin'=>'*',
            'Access-Control-Allow-Methods'=>'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Credentials'=> 'true',
            'Access-Control-Allow-Headers'=> '*'
        ];

        if($request->isMethod('OPTIONS')){
            return response()->json('ok', 200, $headers);
        }
        $response = $next($request);

        if(\method_exists($response, 'headers')){
            $response->headers-set('Access-Control-Allow-Origin','*');
            $response->headers-set('Access-Control-Allow-Methods','POST, GET, OPTIONS, PUT, DELETE');
            $response->headers-set('Access-Control-Allow-Headers','Content-Type, Accept, Authorization, X-Requested-with, Origin, Application');
        }
        if($response instanceof \Illuminate\Http\Response){
            foreach($headers as $key => $value){
                $response->header($key, $value);
            }
        }
        if($response instanceof \Symfony\Component\HttpFoundation\Response){
            foreach($headers as $key => $value){
                $response->header($key, $value);
            }
        }

        // Post-Middleware Action

        return $response;
    }
}
