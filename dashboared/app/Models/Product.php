<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table ='products';


    protected $fillable = [
        'customer_id',  // Add this line
        'name',
        'description',
        'image',
        'price',
        'category_id',
        'quantity',
        'color',
        'size',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function customer()
    {
    return $this->belongsTo(Customer::class, 'customer_id');
    }
    
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}


