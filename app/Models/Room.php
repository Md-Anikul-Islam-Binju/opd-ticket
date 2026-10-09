<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'floor_no',
        'room_no',
        'status',
    ];

    protected $casts = [
        'floor_no' => 'integer',
    ];
}
