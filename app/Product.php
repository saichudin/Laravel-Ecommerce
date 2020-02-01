<?php

namespace App;

use Vanilo\Framework\Models\Product as BaseProduct;
use App\User;

class Product extends BaseProduct
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
