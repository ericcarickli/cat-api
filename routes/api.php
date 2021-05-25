<?php

use App\Http\Controllers\Api\CatController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('auth/login', 'Api\\AuthController@login');

Route::group(['middleware' => 'apiJWT'], function () {

    Route::namespace('Api')->name('api.')->group(function () {
        Route::prefix('breed')->group(function(){

            Route::get('/', 'CatController@index')->name('breed');
            Route::get('/{id}', 'CatController@show')->name('breed_by_id');

            Route::post('/', 'CatController@store')->name('add_breed');
            Route::put('/{id}', 'CatController@update')->name('update_breed');

            Route::delete('/{id}', 'CatController@destroy')->name('delete_breed');
        });
    });

});

