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
        'name' => 'Sałatka z pomidorami',
        'description_short' => 'Pyszna sałatka z pomidorami, rukolą, sałatą oraz sosem vinegrette!',
        'description' => 'Pyszna sałatka z pomidorami, rukolą, sałatą oraz sosem vinegrette dostarczy wam niezapomnianych doznań smakowych. Jest to lekkie danie, które przygotujecie w 5 minut :)',
        'time_preparation' => 15,
        'time_making' => 30,
        'persons_min' => 1,
        'persons_max' => 2,
        'image' => 'data:image/jpeg;base64,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',
    ],
    [
        'id' => 2,
        'name' => 'Pizza 4 sery',
        'description_short' => 'Pizza z serem gouda, mozarella, ementaler oraz serem kozim.',
        'description' => 'Zjedz pyszną pizzę wg naszego przepisu z legendarnej kuchni włoskiej! Zapewnisz pożywienie 4 osobom.',
        'time_preparation' => 30,
        'time_making' => 60,
        'persons_min' => 3,
        'persons_max' => 4,
        'image' => 'http://testujemyjedzenie.pl/wp-content/uploads/2016/03/DSCF5893.jpg',
    ],
    [
        'id' => 3,
        'name' => 'Spaghetti Bolognese',
        'description_short' => 'Szybkie danie wymagające niewielkiej ilości pracy i składników.',
        'description' => 'Nasze Spaghetti otrzymało status Złotego Spaghetti na Międzynarodowych Targach Pyszności w Kielcach. Jest to danie o wyjątkowym smaku, ze względu na unikatowy...',
        'time_preparation' => 10,
        'time_making' => 20,
        'persons_min' => 2,
        'persons_max' => 2,
        'image' => 'data:image/jpeg;base64,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',
    ],
    [
        'id' => 4,
        'name' => 'Pizza 4 sery',
        'description_short' => 'Pizza z serem gouda, mozarella, ementaler oraz serem kozim.',
        'description' => 'Zjedz pyszną pizzę wg naszego przepisu z legendarnej kuchni włoskiej! Zapewnisz pożywienie 4 osobom.',
        'time_preparation' => 30,
        'time_making' => 60,
        'persons_min' => 3,
        'persons_max' => 4,
        'image' => 'http://testujemyjedzenie.pl/wp-content/uploads/2016/03/DSCF5893.jpg',
    ],
    [
        'id' => 5,
        'name' => 'Pizza 4 sery',
        'description_short' => 'Pizza z serem gouda, mozarella, ementaler oraz serem kozim.',
        'description' => 'Zjedz pyszną pizzę wg naszego przepisu z legendarnej kuchni włoskiej! Zapewnisz pożywienie 4 osobom.',
        'time_preparation' => 30,
        'time_making' => 60,
        'persons_min' => 3,
        'persons_max' => 4,
        'image' => 'http://testujemyjedzenie.pl/wp-content/uploads/2016/03/DSCF5893.jpg',
    ],
    [
        'id' => 6,
        'name' => 'Pizza 4 sery',
        'description_short' => 'Pizza z serem gouda, mozarella, ementaler oraz serem kozim.',
        'description' => 'Zjedz pyszną pizzę wg naszego przepisu z legendarnej kuchni włoskiej! Zapewnisz pożywienie 4 osobom.',
        'time_preparation' => 30,
        'time_making' => 60,
        'persons_min' => 3,
        'persons_max' => 4,
        'image' => 'http://testujemyjedzenie.pl/wp-content/uploads/2016/03/DSCF5893.jpg',
    ],
    [
        'id' => 7,
        'name' => 'Pizza 4 sery',
        'description_short' => 'Pizza z serem gouda, mozarella, ementaler oraz serem kozim.',
        'description' => 'Zjedz pyszną pizzę wg naszego przepisu z legendarnej kuchni włoskiej! Zapewnisz pożywienie 4 osobom.',
        'time_preparation' => 30,
        'time_making' => 60,
        'persons_min' => 3,
        'persons_max' => 4,
        'image' => 'http://testujemyjedzenie.pl/wp-content/uploads/2016/03/DSCF5893.jpg',
    ],
]);

Route::get('dishes/{parserData?}', function ($parserData = '') use ($dishes) {
    $parser = new \App\UrlParser($parserData);

    $finalSortBy = 'name';
    $finalSortType = 'asc';

    $availableSortNames = [
        'id',
        'name',
        'time_preparation',
        'time_making',
    ];
    $availableSortTypes = ['asc', 'desc'];

    if ($sortBy = $parser->getFirstValue('sort_by')) {
        if (in_array($sortBy, $availableSortNames)) {
            $finalSortBy = $sortBy;
        }
    }

    if ($sortType = $parser->getFirstValue('sort_type')) {
        if (in_array($sortType, $availableSortTypes)) {
            $finalSortType = $sortType;
        }
    }

    $return = $dishes->take(50);

    $return = $finalSortType == 'desc'
        ? $return->sortByDesc($finalSortBy)
        : $return->sortBy($finalSortBy);

    return $return->values()->toArray();
})->where('parserData', '[a-zA-Z0-9/+_,=,]*');

Route::get('dishes/{id}', function ($id) use ($dishes) {
    return $dishes->where('id', $id)->first();
});

Route::get('products', function () use ($products) {
    return $products->take(50)->toArray();
});

Route::get('products/{id}', function ($id) use ($products) {
    return $products->where('id', $id)->first();
});

Route::get('/{anything?}', function () {
    return '[]';
})->where('anything', '.*');