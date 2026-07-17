<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    protected $fillable = [
        'name',
        'photo',
        'price',
        'capacity',
        'phone',
        'status',
        'description'
    ];
}