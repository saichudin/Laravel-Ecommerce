<?php

namespace App\Listeners;

use Vanilo\Order\Events\OrderWasCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\PurchaseOrder;
use Vanilo\Order\Models\OrderItem;
use Vanilo\Product\Models\Product;
use Vanilo\Order\Models\Order;

class InsertPurchaseOrderListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderWasCreated  $event
     * @return void
     */
    public function handle(OrderWasCreated $event)
    {
        $order = $event->getOrder();
        $items = Order::find($order->id)->items;

        foreach($items as $orderItem) {
            $product = OrderItem::find($orderItem->product_id)->product;
            $po = new PurchaseOrder();
            $po->order_item_id = $orderItem->id;
            $po->seller_id = $product->user_id;
            $po->status = PurchaseOrder::STATUS_PENDING;
            $po->save();
        }

    }
}
