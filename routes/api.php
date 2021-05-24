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

            Route::get('/', 'CatController@index')->name('cats');
            Route::get('/{id}', 'CatController@show')->name('cat_by_id');

            Route::post('/', 'CatController@store')->name('add_cat_from_thecatapi');
            Route::post('/add', 'CatController@storeManually')->name('add_cat_manually');
            Route::put('/{id}', 'CatController@update')->name('update_cat');

            Route::delete('/{id}', 'CatController@destroy')->name('delete_cat');
        });
    });

});

