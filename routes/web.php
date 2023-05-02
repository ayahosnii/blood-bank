<?php

use App\Http\Controllers\Front;
use App\Http\Controllers\Front\MainController;
use App\Http\Controllers\GovernorateController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/donations', [MainController::class, 'donations'])->name('donations');
Route::get('/articles', [MainController::class, 'articles'])->name('articles');
Route::get('/contact-us', [MainController::class, 'contactUs'])->name('contact-us');
Route::get('/who-are-us', [MainController::class, 'whoAreUs'])->name('who-are-us');
Route::group(['middleware'=>'auth:admin'], function (){

});
