<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'user_id',
        'patient_code',
        'phone',
        'date_of_birth',
        'age',
        'gender',
        'division',
        'district',
        'upazila',
        'post_office',
        'address',
        'nid_number',
        'relationship',
        'emergency_contact',
        'medical_history',
        'status',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'status' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function payments()
    {
        return $this->hasManyThrough(
            Payment::class,
            Appointment::class
        );
    }
}
