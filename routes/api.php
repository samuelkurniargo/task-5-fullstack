<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/v1/register', [AuthController::class, 'register']);
Route::post('/v1/login', [AuthController::class, 'login']);

Route::middleware('auth:api')-> group(function() {
    Route::get('/v1/articles', [AuthController::class, 'articleList']);
    Route::get('/v1/articles/{id}', [AuthController::class, 'showDetail']);
    Route::put('/v1/articles/{id}', [AuthController::class, 'updateArticle']);
    Route::delete('/v1/articles/{id}', [AuthController::class, 'deleteArticle']);
    Route::post('/v1/create', [AuthController::class, 'createArticle']);
});