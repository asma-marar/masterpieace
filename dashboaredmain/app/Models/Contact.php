<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory ;
    protected $table = 'contacts';

    protected $fillable = ['customer_id', 'message'];



    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
