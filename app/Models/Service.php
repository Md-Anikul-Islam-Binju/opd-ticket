<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'fee',
        'description',
        'status',
    ];

    protected $casts = [
        'fee' => 'decimal:2',
        'status' => 'boolean',
    ];
}
