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
        $allowedOrigins = [ env('DEV_DOMAIN'), env('PROD_DOMAIN') ];
        $origin = $request->server('HTTP_ORIGIN');

        if (in_array($origin, $allowedOrigins)) {
	        $headers = [
                'Access-Control-Allow-Origin'      => '*',
                'Access-Control-Allow-Methods'     => 'POST, GET, OPTIONS, PUT, DELETE',
                'Access-Control-Allow-Credentials' => 'true',
                'Access-Control-Max-Age'           => '86400',
                'Access-Control-Allow-Headers'     => 'Content-Type, Authorization, X-Requested-With, securitytoken, x-jwt-token'
            ];

	        if ($request->isMethod('OPTIONS'))
            {
                return response()->json('{"method":"OPTIONS"}', 200, $headers);
            }

            return $next($request)
                ->header('Access-Control-Allow-Origin', $origin)
                ->header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                ->header('Access-Control-Allow-Credentials', 'true')
                ->header('Access-Control-Max-Age', '86400')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With, securitytoken, x-jwt-token');
        }

        $response = $next($request);

        return $response;
    }
}
?>