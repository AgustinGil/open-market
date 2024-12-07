<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        $products = Product::query()
            ->with(['images', 'reviews', 'category']);

        if (request()->has('category')) {
            $products->where('category_id', request('category'));
        }

        if (request()->has('q')) {
            $products->where('title', 'LIKE', '%' . request('q') . '%', 'or');
            $products->orWhereHas('category', function ($query) {
                $query->where('name', 'LIKE', '%' . request('q') . '%');
            });
        }

        $category = Category::where('id', request('category'))->get('name');
        return view('search', [
            'products' => $products->paginate(15),
            'title' => request('q'),
            'category' => sizeof($category) == 0 ? null : $category
        ]);
    }
}
