<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('dishes', function () {
    return [
        [
            'id' => 1,
            'name' => 'Salatka',
        ],
        [
            'id' => 2,
            'name' => 'Pizza',
        ],
    ];
});