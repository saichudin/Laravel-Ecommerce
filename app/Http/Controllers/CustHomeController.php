<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vanilo\Product\Models\Product;

class CustHomeController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }
}
