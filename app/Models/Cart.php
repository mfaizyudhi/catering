<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        // tambahkan field lain jika perlu
    ];
    
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}
