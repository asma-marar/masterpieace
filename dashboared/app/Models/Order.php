<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

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
}
