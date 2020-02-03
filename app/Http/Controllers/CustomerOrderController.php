<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vanilo\Framework\Contracts\Requests\UpdateOrder;
use Vanilo\Order\Contracts\Order;
use Vanilo\Order\Models\OrderProxy;


class CustomerOrderController extends Controller
{
    //
    public function index()
    {
        return view('customer.order',[
            'orders' => OrderProxy::orderBy('created_at', 'desc')->paginate(100)
        ]);
    }

    public function show(Order $order)
    {
        return view('customer.order.show',['order' => $order]);
    }

    public function update(Order $order, UpdateOrder $request)
    {
        try {
            $order->update($request->all());
            flash()->success(__('Order :no has been updated', ['no' => $order->number]));
        } catch (\Exception $e) {
            flash()->error(__('Error :msg', ['msg' => $e->getMessage()]));
            return redirect()->back()->withInput();
        }
        return redirect(route('customer.order.show', $order));
    }

    public  function  destroy(Order $order)
    {
        try {
            $number = $order->getNumber();
            $order->delete();
            flash()->warning(__('Order :no has been deleted', ['no' => $number]));
        } catch (\Exception $e) {
            flash()->error(__('Error : :msg', ['msg' => $e->getMessage()]));
            return redirect()->back();
        }
        return redirect(route('customer.order.index'));
    }
}
