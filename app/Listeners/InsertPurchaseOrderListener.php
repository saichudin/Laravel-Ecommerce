<?php

namespace App\Listeners;

use Vanilo\Order\Events\OrderWasCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\PurchaseOrder;
use Vanilo\Order\Models\OrderItem;
use Vanilo\Product\Models\Product;

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
        $items = orderItem::where('order_id',$order->id)->get();

        foreach($items as $orderItem) {
            $product = Product::where('id',$orderItem->product_id)->first();
            $po = new PurchaseOrder();
            $po->order_item_id = $orderItem->id;
            $po->seller_id = $product->user_id;
            $po->status = PurchaseOrder::STATUS_PENDING;
            $po->save();
        }

    }
}
