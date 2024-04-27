<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductAccessMiddleware

/**
 * Task 3: Middleware (10 marks)
 * 
 * 1. Create a middleware named ProductAccessMiddleware. ✅
 * 
 * 2. Implement token checking functionality in the ProductAccessMiddleware middleware:
 * 
 *      ● Retrieve the valid token from the environment configuration (env file). ✅
 *        
 *          token set is = t0m5w0rld
 * 
 *      ● Check if the request contains a token. If not, return a response with status code 401 (Unauthorized)
 *        and a message indicating that the token is missing. ✅
 * 
 *          ■ Response Message:Token is missing.
 * 
 *       ● Compare the token provided in the request with the valid token.✅
 * 
 *       ● If the token provided does not match the valid token, return a response with status code 401 (Unauthorized)
 *         and a message indicating that the token is invalid. ✅
 * 
 *          ■ Response Message:Token is invalid.
 * 
 *      ● If the token provided matches the valid token, allow the request to proceed.
 * 
 * 3. Apply the ProductAccessMiddleware to the routes for:
 *      ● Storing a new product.            CREATE ✅
 *      ● Updating an existing product.     UPDATE ✅
 *      ● Deleting a product.               DESTROY ✅
 *      ● Uploading images.                 uploadImageLocal and uploadImagePublic ✅
 */

{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        $validToken = env('PRODUCT_ACCESS_TOKEN');

        if(!$token){
            return response()->json(['Error Message' => 'Token is missing.'], 401);
        }

        if($token == $validToken){
            return $next($request);
        }

        elseif($token !== $validToken){
            return response()->json(['Error Message' => 'Token is invalid.'], 401);
        }

        // return $next($request);
    }
}
