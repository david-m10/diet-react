<?php

Route::get('/{anything?}', function () {
    return view('welcome');
})->where('anything', '.*');;
