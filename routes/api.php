<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| Dishes
|--------------------------------------------------------------------------
*/
Route::apiResource('dishes', 'DishesController')->except('index');
Route::get('dishes/{parserData?}', 'DishesController@index')
    ->where('parserData', '[a-zA-Z0-9/+_,=,]*');

/*
|--------------------------------------------------------------------------
| Products
|--------------------------------------------------------------------------
*/
Route::apiResource('products', 'ProductsController')->except('index');
Route::get('products/{parserData?}', 'ProductsController@index')
    ->where('parserData', '[a-zA-Z0-9/+_,=,]*');

/*
|--------------------------------------------------------------------------
| Anything
|--------------------------------------------------------------------------
*/
Route::get('/{anything?}', function () {
    // TODO 404
    return '[]';
})->where('anything', '.*');