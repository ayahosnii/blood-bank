<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'], function (){
    //General Cycle
    Route::get('governorate', [\App\Http\Controllers\Api\MainController::class, 'governorates'])->name('governorate');
    Route::get('city', [\App\Http\Controllers\Api\MainController::class, 'cities'])->name('city');
    Route::get('settings', [\App\Http\Controllers\Api\MainController::class, 'settings']);
    Route::get('categories', [\App\Http\Controllers\Api\MainController::class, 'categories']);
    Route::get('blood-types', [\App\Http\Controllers\Api\MainController::class, 'bloodTypes']);
    Route::post('register', [\App\Http\Controllers\Api\AuthController::class, 'register'])->name('register');
    Route::post('register-token', [\App\Http\Controllers\Api\AuthController::class, 'registerToken']);
    Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login'])->name('login');
//    Route::get('api-posts', [\App\Http\Controllers\PostController::class, 'index'])->name('post');


    Route::group(['middleware' => 'auth:api'], function () {
        //Auth Cycle
        Route::get('profile', [\App\Http\Controllers\Api\AuthController::class, 'profile']);

        //Post Cycle Api
        Route::get('posts', [\App\Http\Controllers\Api\MainController::class, 'posts']);
        Route::get('post', [\App\Http\Controllers\Api\MainController::class, 'post']);
        Route::get('posts-favourite', [\App\Http\Controllers\Api\MainController::class, 'postFavourite']);
        Route::get('toggle-favourite', [\App\Http\Controllers\Api\MainController::class, 'toggleFavourite']);
        Route::get('my-favourite', [\App\Http\Controllers\Api\MainController::class, 'myFavourite']);
    });
});

