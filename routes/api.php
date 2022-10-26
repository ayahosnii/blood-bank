<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DonationRequestController;
use App\Http\Controllers\Api\MainController;
use App\Models\DonationRequest;
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
    Route::get('governorates', [MainController::class, 'governorates'])->name('governorate');
    Route::get('cities', [MainController::class, 'cities'])->name('city');
    Route::get('settings', [MainController::class, 'settings']);
    Route::get('categories', [MainController::class, 'categories']);
    Route::post('contacts', [MainController::class, 'contact']);
    Route::get('blood-types', [MainController::class, 'bloodTypes']);
    #Route::post('register', [AuthController::class, 'register'])->name('register');
    #Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('reset.password');
    Route::post('new-password', [AuthController::class, 'newPassword'])->name('new.password');
//    Route::get('api-posts', [\App\Http\Controllers\PostController::class, 'index'])->name('post');


    Route::group(['middleware' => 'auth:api'], function () {
        //Auth Cycle
        Route::post('profile', [AuthController::class, 'profile']);
        Route::post('register-token', [AuthController::class, 'registerToken'])->name('register-token');
        Route::post('test-notification', [AuthController::class, 'testNotification'])->name('test-notification');
        Route::post('remove-token', [AuthController::class, 'removeToken'])->name('remove-token');


        //Post Cycle Api
        Route::get('posts', [MainController::class, 'posts']);
        Route::get('post', [MainController::class, 'post']);
        Route::get('posts-favourite', [MainController::class, 'postFavourite']);
        Route::get('toggle-favourite', [MainController::class, 'toggleFavourite']);
        Route::get('my-favourite', [MainController::class, 'myFavourite']);


        //Donation Request Cycle Api
        Route::post('donation-request/create', [DonationRequestController::class, 'donationRequestCreate']);
    });
});

