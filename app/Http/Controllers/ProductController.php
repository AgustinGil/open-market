<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = [];

        $range = range(1, 24);
        shuffle($range);
        $n = 4;
        $results = array_slice($range, 0, $n);

        foreach ($results as $result) {
            $products = Product::query()
                ->with(['images', 'reviews'])
                ->where('category_id', $result)->paginate(8);

            $sections[] = [
                'products' => $products,
                'title' => Category::query()->where('id', $result)->get(),
                'id' => $result,
                'subtitle' => 'Categoria'
            ];
        }
        return view('index', ['sections' => $sections]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return view('products/show', ['product' => Product::with(['images', 'reviews', 'category'])->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
