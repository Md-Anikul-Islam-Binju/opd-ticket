<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalPatients = Patient::count();

        $totalDoctors = Doctor::where('status', 1)->count();

        $totalDepartments = Department::where('status', 1)->count();

        $totalAppointments = Appointment::count();


        // Today's appointments
        $todayAppointments = Appointment::whereDate(
            'appointment_date',
            Carbon::today()
        )->count();


        // Appointment status
        $pendingAppointments = Appointment::where(
            'status',
            'pending'
        )->count();

        $confirmedAppointments = Appointment::where(
            'status',
            'confirmed'
        )->count();

        $completedAppointments = Appointment::where(
            'status',
            'completed'
        )->count();

        $cancelledAppointments = Appointment::where(
            'status',
            'cancelled'
        )->count();


        // Recent appointments
        $recentAppointments = Appointment::with([
            'patient.user',
            'doctor',
            'department',
            'slot'
        ])
            ->latest()
            ->take(8)
            ->get();


        // ==============================
        // MONTHLY APPOINTMENTS
        // ==============================

        $monthlyAppointments = [];

        for ($month = 1; $month <= 12; $month++) {

            $monthlyAppointments[] = Appointment::whereYear(
                'appointment_date',
                now()->year
            )
                ->whereMonth(
                    'appointment_date',
                    $month
                )
                ->count();
        }


        // ==============================
        // APPOINTMENT STATUS CHART
        // ==============================

        $appointmentStatus = [
            $pendingAppointments,
            $confirmedAppointments,
            $completedAppointments,
            $cancelledAppointments,
        ];


        return view('admin.dashboard', compact(

            'totalPatients',
            'totalDoctors',
            'totalDepartments',
            'totalAppointments',

            'todayAppointments',

            'pendingAppointments',
            'confirmedAppointments',
            'completedAppointments',
            'cancelledAppointments',

            'recentAppointments',

            'monthlyAppointments',
            'appointmentStatus'

        ));
    }

    public function unauthorized()
    {
        return view('admin.unauthorized');
    }
}
