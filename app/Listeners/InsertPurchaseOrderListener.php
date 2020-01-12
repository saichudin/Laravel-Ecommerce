<?php

namespace App\Listeners;

use Vanilo\Order\Events\OrderWasCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\PurchaseOrder;

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

        foreach($order->items() as $orderItem) {
            $po = new PurchaseOrder();
            $po->order_item_id = $orderItem->id;
            $po->seller_id = $orderItem->product()->user()->id;
            $po->status = PurchaseOrder::STATUS_PENDING;
            $po->save();
        }
    }
}
