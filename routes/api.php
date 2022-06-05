<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

  
 Route::group([
  
    'middleware' => 'api','jwt.verify'
  
 ], function ($router) {
  
    Route::post('login', 'AuthController@login');
    
    Route::post('users/signin', 'UserController@signin'); //signin
    
    Route::post('shopping', 'ShoppingController@shopping'); //shopping
    //tes
    Route::get('users', 'UserController@index'); //all user

    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
 });

Route::post('users', 'UserController@store');
Route::post('users/signup', 'UserController@signup'); //signup
