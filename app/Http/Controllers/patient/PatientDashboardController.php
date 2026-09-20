<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PatientDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'auth',
            'role:Patient'
        ]);
    }

    public function index()
    {
        try {

            $user = Auth::user();

            $patient = $user->patient;


            $appointments = $patient
                ->appointments()
                ->with([
                    'doctor',
                    'department',
                    'slot'
                ])
                ->latest()
                ->take(5)
                ->get();


            return view(
                'patient.dashboard',
                compact(
                    'patient',
                    'appointments'
                )
            );

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }
}
