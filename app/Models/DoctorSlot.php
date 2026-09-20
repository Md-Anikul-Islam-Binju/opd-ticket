<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorSlot extends Model
{
    protected $fillable = [
        'doctor_id',
        'slot_date',
        'start_time',
        'end_time',
        'status',
        'blocked_reason',
    ];

    protected $casts = [
        'slot_date' => 'date',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function appointment()
    {
        return $this->hasOne(
            Appointment::class,
            'slot_id'
        );
    }
}
