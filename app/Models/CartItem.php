<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
// Cart.php
public function items()
{
    return $this->hasMany(CartItem::class);
}

// CartItem.php
public function itemable()
{
    return $this->morphTo();
}

}
