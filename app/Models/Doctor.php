<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'department_id',
        'name',
        'doctor_code',
        'phone',
        'email',
        'designation',
        'specialization',
        'photo',
        'bio',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function schedules()
    {
        return $this->hasMany(DoctorSchedule::class);
    }

    public function slots()
    {
        return $this->hasMany(DoctorSlot::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
