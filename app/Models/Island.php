<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Island extends Model
{
    protected $fillable = [
        'destination_id',
        'name',
        'photo',
        'latitude',
        'longitude',
        'description',
        'activities'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}