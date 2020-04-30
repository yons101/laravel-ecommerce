<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }


    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $products = Product::where('title', 'like', "%$product->title%")->inRandomOrder()->take(4)->get();

        return view('products.show', compact(['products', 'product']));
    }
}
