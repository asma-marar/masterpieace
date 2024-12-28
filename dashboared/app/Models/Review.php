<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'intermediary_id',
        'user_id',
        'comment',
        'rating',
    ];

    public function intermediary()
    {
        return $this->belongsTo(User::class, 'intermediary_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
