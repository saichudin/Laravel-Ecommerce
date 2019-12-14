<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Vanilo\Product\Models\Product;
use Vanilo\Product\Contracts\Product;
use Vanilo\Framework\Search\ProductFinder;

class IndexController extends Controller
{
    //
    //private $product;

/*
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
*/
    private $productFinder;

    public function __construct(ProductFinder $productFinder)
    {
        $this->productFinder = $productFinder;
    }


    public function index()
    {
        //$products = $this->product->all();
        $products =  $this->productFinder->getResults();
        return view('index',compact('products'));
    }

    public function viewProduct(Product $product)
    {
        //$products = $this->product->find($id);
        // return view('view_product',compact('products')); 
        return view('view_product', ['product' => $product]);
    }


}
