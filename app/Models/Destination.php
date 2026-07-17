<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'location',
        'description',
        'main_image',
        'latitude',
        'longitude',
        'ticket_price',
        'operational_hours',
        'rating',
        'visitor_count',
        'is_popular'
    ];

    protected $casts = [
        'is_popular' => 'boolean'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function island()
    {
        return $this->hasOne(Island::class);
    }
}