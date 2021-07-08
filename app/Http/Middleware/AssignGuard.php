<?php

namespace App\Http\Middleware\AssignGuard;
namespace App\Http\Middleware;
use Closure;
use SebastianBergmann\Type\ObjectType;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Facades\JWTAuth;
class AssignGuard extends BaseMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

    try{

            if ($guard != null) {

                try {
                    auth()->shouldUse($guard); //shoud you user guard / table
                    $token = $request->header('authToken');
                    $request->headers->set('authToken', (string) $token, true);
                    $request->headers->set('Authorization', 'Bearer ' . $token, true);
                } catch (JWTException $e) {
                    return  ['token_invalid' => $e->getMessage()];
                } catch (TokenExpiredException $e) {
                    return ['401' => 'Unauthenticated user'];
                }



                try {
                    $user = JWTAuth::parseToken()->authenticate();
                    /* $this->auth->authenticate($request);  */
                } catch (TokenExpiredException $e) {
                    return ['401' => 'Unauthenticated user'];
                } catch (JWTException $e) {
                    return  ['token_invalid' => $e->getMessage()];
                }
            }
    }  catch (TokenExpiredException $e) {
                    return ['401' => 'Unauthenticated user'];
                } catch (JWTException $e) {
            return  ['token_invalid' => $e->getMessage()];
        }
        return $next($request);
}


}
