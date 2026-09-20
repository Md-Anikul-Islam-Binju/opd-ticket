<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\Patient;
use App\Models\Upazila;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class PatientAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Patient Registration Page
    |--------------------------------------------------------------------------
    */

    public function showRegister()
    {
        if (Auth::check()) {

            if (Auth::user()->hasRole('Patient')) {
                return redirect()->route('patient.dashboard');
            }
        }

        $divisions = Division::orderBy('name')->get();

        return view(
            'patient.auth.register',
            compact('divisions')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Get Districts
    |--------------------------------------------------------------------------
    */

    public function districts($division_id)
    {
        try {

            $districts = District::where('division_id', $division_id)
                ->orderBy('name')
                ->get();

            return response()->json($districts);

        } catch (\Exception $e) {

            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Get Upazilas
    |--------------------------------------------------------------------------
    */

    public function upazilas($district_id)
    {
        try {

            $upazilas = Upazila::where('district_id', $district_id)
                ->orderBy('name')
                ->get();

            return response()->json($upazilas);

        } catch (\Exception $e) {

            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Patient Registration
    |--------------------------------------------------------------------------
    */

    public function register(Request $request)
    {
        try {

            $request->validate([

                'name' => 'required|max:255',

                'email' => 'required|email|max:255|unique:users,email',

                'phone' => 'required|max:30|unique:patients,phone',

                'date_of_birth' => 'nullable|date',

                'age' => 'nullable|integer|min:0|max:120',

                'gender' => 'nullable|in:male,female,other',

                'division_id' => 'nullable|exists:divisions,id',

                'district_id' => 'nullable|exists:districts,id',

                'upazila_id' => 'nullable|exists:upazilas,id',

                'post_office' => 'nullable|max:255',

                'address' => 'nullable',

                'nid_number' => 'nullable|max:255',

                'relationship' => 'nullable|max:255',

                'emergency_contact' => 'nullable|max:30',

                'medical_history' => 'nullable',

                'password' => 'required|min:6|confirmed',

            ]);


            DB::transaction(function () use ($request, &$user) {

                /*
                |--------------------------------------------------------------------------
                | Location
                |--------------------------------------------------------------------------
                */

                $division = $request->division_id
                    ? Division::findOrFail($request->division_id)
                    : null;

                $district = $request->district_id
                    ? District::findOrFail($request->district_id)
                    : null;

                $upazila = $request->upazila_id
                    ? Upazila::findOrFail($request->upazila_id)
                    : null;


                /*
                |--------------------------------------------------------------------------
                | Create User
                |--------------------------------------------------------------------------
                */

                $user = new User();

                $user->name =
                    $request->name;

                $user->email =
                    $request->email;

                $user->password =
                    Hash::make($request->password);

                $user->save();


                /*
                |--------------------------------------------------------------------------
                | Assign Patient Role
                |--------------------------------------------------------------------------
                */

                $role = Role::where('name', 'Patient')
                    ->where('guard_name', 'web')
                    ->firstOrFail();

                $user->assignRole($role);


                /*
                |--------------------------------------------------------------------------
                | Create Patient
                |--------------------------------------------------------------------------
                */

                $patient = new Patient();

                $patient->user_id =
                    $user->id;

                $patient->patient_code =
                    'PAT-' . strtoupper(Str::random(8));

                $patient->phone =
                    $request->phone;

                $patient->date_of_birth =
                    $request->date_of_birth;

                $patient->age =
                    $request->age;

                $patient->gender =
                    $request->gender;

                $patient->division =
                    $division?->name;

                $patient->district =
                    $district?->name;

                $patient->upazila =
                    $upazila?->name;

                $patient->post_office =
                    $request->post_office;

                $patient->address =
                    $request->address;

                $patient->nid_number =
                    $request->nid_number;

                $patient->relationship =
                    $request->relationship;

                $patient->emergency_contact =
                    $request->emergency_contact;

                $patient->medical_history =
                    $request->medical_history;

                $patient->status = true;

                $patient->save();
            });


            /*
            |--------------------------------------------------------------------------
            | Auto Login
            |--------------------------------------------------------------------------
            */

            Auth::login($user);

            $request->session()->regenerate();

            return redirect()
                ->route('patient.dashboard')
                ->with(
                    'success',
                    'Patient Registration Completed Successfully.'
                );

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Patient Login Page
    |--------------------------------------------------------------------------
    */

    public function showLogin()
    {
        if (Auth::check()) {

            if (Auth::user()->hasRole('Patient')) {
                return redirect()->route('patient.dashboard');
            }
        }

        return view('patient.auth.login');
    }


    /*
    |--------------------------------------------------------------------------
    | Patient Login
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        try {

            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);


            if (
                Auth::attempt([
                    'email' => $request->email,
                    'password' => $request->password,
                ])
            ) {

                $request->session()->regenerate();

                $user = Auth::user();


                if (!$user->hasRole('Patient')) {

                    Auth::logout();

                    return redirect()
                        ->back()
                        ->withInput()
                        ->with(
                            'error',
                            'This account is not a Patient account.'
                        );
                }


                if (
                    $user->patient &&
                    !$user->patient->status
                ) {

                    Auth::logout();

                    return redirect()
                        ->back()
                        ->withInput()
                        ->with(
                            'error',
                            'Your account is inactive.'
                        );
                }


                return redirect()
                    ->route('patient.dashboard')
                    ->with(
                        'success',
                        'Login Successfully.'
                    );
            }


            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Invalid email or password.'
                );

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Patient Logout
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        try {

            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()
                ->route('patient.login')
                ->with(
                    'success',
                    'Logout Successfully.'
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
