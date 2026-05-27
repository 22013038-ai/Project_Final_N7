<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [

        'user_id',

        'event_id',

        'phone',

        'note',

        'quantity',

        'total_price',

        'status'

    ];

    public function user()
    {
        return $this->belongsTo(
            User::class
        );
    }

    public function event()
    {
        return $this->belongsTo(
            Event::class
        );
    }
}