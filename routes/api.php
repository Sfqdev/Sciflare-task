<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [ApiController::class,'login']);

Route::group(['middleware' => ['auth:api']],function(){
    Route::get('organization', [ApiController::class, 'index']);
    Route::post('organization/create', [ApiController::class, 'create']);
    Route::put('organization/{id}', [ApiController::class, 'update']);
    Route::delete('organization/{id}/delete', [ApiController::class, 'destroy']);
});


