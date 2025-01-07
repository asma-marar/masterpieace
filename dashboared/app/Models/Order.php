<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function getHasUnratedSellersAttribute()
    {
        $sellerIds = [];
        foreach($this->orderProducts as $orderProduct) {
            if($orderProduct->product && $orderProduct->product->seller) {
                $sellerId = $orderProduct->product->seller->id;
                if(!in_array($sellerId, $sellerIds)) {
                    $sellerIds[] = $sellerId;
                    $rating = Rating::where('order_id', $this->id)
                        ->where('rated_customer_id', $sellerId)
                        ->first();
                    if(!$rating) {
                        return true;
                    }
                }
            }
        }
        return false;
    }
    protected $fillable = [
        'customer_id',       
        'order_total',    
        'order_status',   
        'order_address', 
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    

        public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'order_id'); // Ratings related to this order
    }

}
