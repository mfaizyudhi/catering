<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Binafy\LaravelCart\Cartable;
use Illuminate\Support\Str;

class Product extends Model implements Cartable
{
    public function category(){
        return $this->belongsTo(Categories::class,'product_category_id');
    }

    public function getPrice(): float
    {
        return $this->price;
    }
    // app/Models/Product.php
public function getImageUrlAttribute($value)
{
    if (!$value) return asset('images/placeholder-product.png');
    
    // Pastikan tidak ada URL ganda
    $cleanedValue = str_replace(
        ['http://127.0.0.1:8000/storage/', 'storage/'], 
        '', 
        $value
    );
    
    return asset('storage/' . ltrim($cleanedValue, '/'));
}
public function cartItems()
{
     return $this->morphMany(\App\Models\CartItem::class, 'itemable');
}


}
