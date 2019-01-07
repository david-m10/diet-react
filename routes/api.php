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
Route::apiResource('dishes', 'DishesController')->except(['index', 'show']);
Route::get('dishes/{id}', 'DishesController@show')
    ->where('id', '[0-9]+');
Route::get('dishes/{parserData?}', 'DishesController@index')
    ->where('parserData', '[a-zA-Z0-9_,/=]*');

/*
|--------------------------------------------------------------------------
| Products
|--------------------------------------------------------------------------
*/
Route::apiResource('products', 'ProductsController')->except(['index', 'show']);
Route::get('products/{id}', 'ProductsController@show')
    ->where('id', '[0-9]+');
Route::get('products/{parserData?}', 'ProductsController@index')
    ->where('parserData', '[a-zA-Z0-9/_,=,]*');

/*
|--------------------------------------------------------------------------
| Anything
|--------------------------------------------------------------------------
*/
Route::get('/{anything?}', function () {
    // TODO 404
    return '[]';
})->where('anything', '.*');