<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vanilo\Order\Contracts\Order;
use Vanilo\Order\Models\OrderProxy;
use Auth;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index',[
            'orders' => OrderProxy::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(100)
        ]);
    }

    public function show(Order $order)
    {
        return view('order.show',['order' => $order]);
    }
}
