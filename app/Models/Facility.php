<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
        'destination_id',
        'name',
        'icon'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}