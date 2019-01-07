<?php

namespace App\Http\Controllers;

use App\Http\Resources\DishResource;
use App\Models\Dishes\Dish;
use App\UrlParser;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param null|string $parserData
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(?string $parserData)
    {
        $parser = new UrlParser($parserData);

        $sortBy = 'name';
        $sortType = 'asc';

        $availableSortNames = [
            'id',
            'name',
            'time_preparation',
            'time_making',
            'created_at',
        ];
        $availableSortTypes = ['asc', 'desc'];

        if ($requestSortBy = $parser->getFirstValue('sort_by')) {
            if (in_array($sortBy, $availableSortNames)) {
                $sortBy = $requestSortBy;
            }
        }

        if ($requestSortType = $parser->getFirstValue('sort_type')) {
            if (in_array($sortType, $availableSortTypes)) {
                $sortType = $requestSortType;
            }
        }

        $dishes = Dish::take(50)->orderBy($sortBy, $sortType)->get();

        return DishResource::collection($dishes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return DishResource
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'short_description' => 'string',
            'description' => 'string',
        ]);

        $dish = new Dish($request->all());
        $dish->save();

        return new DishResource($dish);
    }

    /**
     * Display the specified resource.
     *
     * @param Dish $dish
     * @return DishResource
     */
    public function show(Dish $dish)
    {
        return new DishResource($dish);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
