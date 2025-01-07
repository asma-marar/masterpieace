<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'customer_id',
        'rated_customer_id',
        'rating',
        'comment',
    ];

    // Relationships
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id'); // The customer who gave the rating
    }

    public function ratedCustomer()
    {
        return $this->belongsTo(Customer::class, 'rated_customer_id'); // The customer being rated
    }
}
