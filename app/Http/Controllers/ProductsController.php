<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Products\Product;
use App\UrlParser;
use Illuminate\Http\Request;

class ProductsController extends ApiController
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

        $products = Product::take(50)->orderBy($sortBy, $sortType)->get();

        return ProductResource::collection($products);

//        $productsQuery = Product::query();
//        $productsQuery->orderByDesc('created_at');
//
//        $paginator = $productsQuery->paginate(50, ['*'], 'page', $page = $request->get('page') ?? 1);
//
//        $this->respondWithPagination($paginator, []);
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
            'title' => 'string|required',
            'description' => 'string',
        ]);

        $product = new Product($request->all());
        $product->save();

        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param Product $dish
     * @return ProductResource
     */
    public function show(Product $dish)
    {
        return new ProductResource($dish);
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
