<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Vanilo\Order\Models\OrderItem;
use App\User;

class PurchaseOrder extends Model
{
    const STATUS_PENDING = 1;
    const STATUS_PAID = 2;
    const STATUS_SHIPPED = 3;
    
    protected $fillable = [
        'order_item_id', 'status', 'seller_id',
    ];

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class, 'order_item_id');
    } 

    public function user()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
