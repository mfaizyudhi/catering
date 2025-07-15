<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        // tambahkan kolom lain yang boleh di-assign massal
    ];
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
