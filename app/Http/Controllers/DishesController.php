<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return Dish
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ]);

        $dish = new Dish($request->all());
        $dish->save();

        return $dish;
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
