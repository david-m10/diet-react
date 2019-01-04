<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Temporary collections of items
$products = collect([
    [
        'id' => 1,
        'name' => 'Cheese',
    ],
    [
        'id' => 2,
        'name' => 'Ham',
    ],
    [
        'id' => 3,
        'name' => 'Water',
    ],
    [
        'id' => 4,
        'name' => 'Milk',
    ],
    [
        'id' => 5,
        'name' => 'Apple',
    ],
]);

$dishes = collect([
    [
        'id' => 1,
        'name' => 'Salad with tomatoes',
    ],
    [
        'id' => 2,
        'name' => 'Pizza 4 cheeses',
    ],
    [
        'id' => 3,
        'name' => 'Spaghetti Bolognese',
    ],
]);

Route::get('dishes', function () use ($dishes) {
    return $dishes->take(50)->toArray();
});

Route::get('dishes/{id}', function ($id) use ($dishes) {
    return $dishes->where('id', $id)->first();
});

Route::get('products', function () use ($products) {
    return $products->take(50)->toArray();
});

Route::get('products/{id}', function ($id) use ($products) {
    return $products->where('id', $id)->first();
});