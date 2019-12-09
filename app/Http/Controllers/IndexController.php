<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vanilo\Product\Models\Product;

class IndexController extends Controller
{
    //
    private $product;

    public function __consruct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function viewProduct($id)
    {
        $products = Product::find($id);
        return view('view_product',compact('products')); 
    }
}
