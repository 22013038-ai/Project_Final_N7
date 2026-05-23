<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'category_id',

        'title',

        'slug',

        'location',

        'google_map',

        'event_date',

        'start_time',

        'end_time',

        'short_description',

        'description',

        'image',

        'banner',

        'max_participants',

        'registered_count',

        'ticket_price',

        'status',

        'featured'

    ];

    public function category()
    {
        return $this->belongsTo(
            EventCategory::class,
            'category_id'
        );
    }

    public function registrations()
    {
        return $this->hasMany(
            Registration::class
        );
    }

    public function images()
    {
        return $this->hasMany(
            EventImage::class
        );
    }
}