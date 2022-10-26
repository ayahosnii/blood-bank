<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonationsController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;
use Laratrust\Http\Controllers\PermissionsController;
use Laratrust\Http\Controllers\RolesAssignmentController;
use Laratrust\Http\Controllers\RolesController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(['prefix' => 'admin'/*, 'middleware' => 'auth'*/], function(){
     Route::get('/dashboard', [DashboardController::class, 'index']);
     Route::resource('/governorates', GovernorateController::class);
     Route::resource('/cities', CitiesController::class);
     Route::resource('/categories', CategoriesController::class);
     Route::resource('/posts', PostsController::class);
     Route::resource('/clients', ClientsController::class);
     Route::post('/changeStatus/{id}', [ClientsController::class, 'changeStatus'])->name('changeStatus');
     Route::resource('/contacts', ContactsController::class);
     Route::resource('/donations', DonationsController::class);
     Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit');
     Route::get('/settings/update/{id}', [SettingsController::class, 'update'])->name('settings.update');


     Route::resource('/roles', RolesController::class);
     Route::resource('/permissions', PermissionsController::class);
     Route::resource('/roles-assignment', RolesAssignmentController::class);
});
Route::group(['middleware'=>'auth:web'], function (){

});



