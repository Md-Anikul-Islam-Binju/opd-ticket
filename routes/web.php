<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\DepartmentController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\admin\DoctorScheduleController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SlotController;
use App\Http\Controllers\patient\AppointmentController;
use App\Http\Controllers\patient\PatientAuthController;
use App\Http\Controllers\patient\PatientDashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('patient.layout');
});

// ========================================
// Patient Authentication
// ========================================

Route::get('/patient/register', [PatientAuthController::class, 'showRegister'])->name('patient.register');
Route::post('/patient/register', [PatientAuthController::class, 'register'])->name('patient.register.store');
Route::get('/patient/districts/{division_id}', [PatientAuthController::class, 'districts'])->name('patient.districts');
Route::get('/patient/upazilas/{district_id}', [PatientAuthController::class, 'upazilas'])->name('patient.upazilas');

Route::get('/patient/login', [PatientAuthController::class, 'showLogin'])->name('patient.login');
Route::post('/patient/login', [PatientAuthController::class, 'login'])->name('patient.login.store');
Route::post('/patient/logout', [PatientAuthController::class, 'logout'])->name('patient.logout');


// ========================================
// Patient Dashboard
// ========================================

Route::middleware(['auth', 'role:Patient'])->group(function () {

    Route::get('/patient/dashboard', [PatientDashboardController::class, 'index'])->name('patient.dashboard');
    Route::get('/patient/appointment/create', [AppointmentController::class, 'create'])->name('patient.appointment.create');
    Route::get('/patient/appointment/slots', [AppointmentController::class, 'slots'])->name('patient.appointment.slots');
    Route::post('/patient/appointment/store', [AppointmentController::class, 'store'])->name('patient.appointment.store');
    Route::get('/patient/appointment/{id}', [AppointmentController::class, 'show'])->name('patient.appointment.show');
    Route::get('/patient/appointment/{id}/payment', [AppointmentController::class, 'payment'])->name('patient.appointment.payment');
    Route::post('/patient/appointment/{id}/payment-process', [AppointmentController::class, 'paymentProcess'])->name('patient.appointment.payment.process');

    /*
    * Fake Online Payment
    */
    Route::get('/patient/appointment/{id}/fake-payment', [AppointmentController::class, 'fakePayment'])->name('patient.appointment.fake.payment');
    Route::post('/patient/appointment/{id}/fake-payment', [AppointmentController::class, 'fakePaymentProcess'])->name('patient.appointment.fake.payment.process');

    /*
     * Manual Payment Message
     */
    Route::get('/patient/appointment/{id}/manual-payment', [AppointmentController::class, 'manualPayment'])->name('patient.appointment.manual.payment');

    Route::get('/patient/appointment/{id}/download-ticket', [AppointmentController::class, 'downloadTicket'])->name('patient.appointment.download-ticket');
});

Route::middleware('auth')->group(callback: function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/unauthorized-action', [AdminDashboardController::class, 'unauthorized'])->name('unauthorized.action');


    // Department Section
    Route::get('/department-section', [DepartmentController::class, 'index'])->name('department.section');
    Route::post('/department-store', [DepartmentController::class, 'store'])->name('department.store');
    Route::put('/department-update/{id}', [DepartmentController::class, 'update'])->name('department.update');
    Route::get('/department-delete/{id}', [DepartmentController::class, 'destroy'])->name('department.destroy');
    Route::get('/department-toggle-status/{id}', [DepartmentController::class, 'toggleStatus'])->name('department.toggleStatus');

    // Doctor Section
    Route::get('/doctor-section', [DoctorController::class, 'index'])->name('doctor.section');
    Route::post('/doctor-store', [DoctorController::class, 'store'])->name('doctor.store');
    Route::put('/doctor-update/{id}', [DoctorController::class, 'update'])->name('doctor.update');
    Route::get('/doctor-delete/{id}', [DoctorController::class, 'destroy'])->name('doctor.destroy');
    Route::get('/doctor-toggle-status/{id}', [DoctorController::class, 'toggleStatus'])->name('doctor.toggleStatus');

    // Doctor Schedule
    Route::get('/doctor-schedule/{doctor_id}', [DoctorScheduleController::class, 'edit'])->name('doctor.schedule');
    Route::put('/doctor-schedule-update/{doctor_id}', [DoctorScheduleController::class, 'update'])->name('doctor.schedule.update');
    // Doctor Slots
    Route::get('/doctor-slot-section', [SlotController::class, 'index'])->name('doctor.slot.section');
    Route::put('/doctor-slot-block/{id}', [SlotController::class, 'block'])->name('doctor.slot.block');
    Route::put('/doctor-slot-unblock/{id}', [SlotController::class, 'unblock'])->name('doctor.slot.unblock');

    Route::get('/service-section', [ServiceController::class, 'index'])->name('service.section');
    Route::post('/service-store', [ServiceController::class, 'store'])->name('service.store');
    Route::put('/service-update/{id}', [ServiceController::class, 'update'])->name('service.update');


    //Role and User Section
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);


});

require __DIR__.'/auth.php';
