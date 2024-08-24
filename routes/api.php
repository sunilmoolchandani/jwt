<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [ApiController::class, 'login'])->name('login');

    // Route::post('login', 'ApiController@login');
    // Route::post('logout', 'ApiController@logout');
    // Route::post('refresh', 'ApiController@refresh');
    // Route::post('me', 'ApiController@me');

});
Route::get('/refresh', [ApiController::class, 'refresh'])->name('refresh');
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/userdetails', [ApiController::class, 'userdetails'])->name('userdetails');
    
    // Route::get('/userdetails', function(Request $request) {
    //     return auth()->user();
    // });
});

