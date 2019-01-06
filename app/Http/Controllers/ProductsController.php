<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productsQuery = Product::query();
        $productsQuery->orderByDesc('created_at');

        $paginator = $productsQuery->paginate(50, ['*'], 'page', $page = $request->get('page') ?? 1);

        $this->respondWithPagination($paginator, []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return Product
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $product = new Product($request->all());
        $product->save();

        return $product;
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
