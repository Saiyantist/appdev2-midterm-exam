<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hey', function() {
    return "<h1>Restful is online.</h1>";
});

/** 
 * Task 1: Setting Up Routes (5 marks) ✅
 * 
 * 1. Create RESTful routes for the products resource using apiResource. ✅
 * 
 * 2. Add two additional routes for uploading images: 
 *      ○ One route for uploading an image using the local disk driver. ✅
 *          ■ URI products/upload/local
 *          ■ Route name upload.local
 *      ○ Another route for uploading an image using the public disk driver. ✅
 *          ■ URI products/upload/public
 *          ■ Route name upload.public
 */


// #3.3
Route::middleware('token.access')->group(function () {
    
    // #1.1
    Route::apiResource('products', ProductController::class);
    
    // #3.3
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
    
    // #1.2
    Route::post('products/upload/local', [ProductController::class, 'uploadImageLocal'])->name('upload.local');
    Route::post('products/upload/public', [ProductController::class, 'uploadImagePublic'])->name('upload.public'); // 500 Internal Server Error ❓❓❓
});

// #3.3
Route::get('/products', [ProductController::class, 'index'])->withoutMiddleware('token.access');
Route::get('/products/{product}', [ProductController::class, 'show'])->withoutMiddleware('token.access');


