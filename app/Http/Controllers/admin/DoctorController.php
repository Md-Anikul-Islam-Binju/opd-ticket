<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('doctor-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }


    public function index()
    {
        $doctors = Doctor::with('department')
            ->latest()
            ->paginate(15);

        $departments = Department::where('status', true)
            ->orderBy('name')
            ->get();

        return view(
            'admin.pages.doctor.index',
            compact('doctors', 'departments')
        );
    }


    public function store(Request $request)
    {
        try {

            $request->validate([
                'department_id' => 'required|exists:departments,id',
                'name' => 'required|max:255',
                'phone' => 'nullable|max:30',
                'email' => 'nullable|email|max:255',
                'designation' => 'nullable|max:255',
                'specialization' => 'nullable|max:255',
                'bio' => 'nullable',
                'photo' => 'nullable|image|max:2048',
                'status' => 'required|in:0,1',
            ]);

            $doctor = new Doctor();

            $doctor->department_id = $request->department_id;
            $doctor->name = $request->name;
            $doctor->doctor_code = 'DOC-' . strtoupper(Str::random(8));
            $doctor->phone = $request->phone;
            $doctor->email = $request->email;
            $doctor->designation = $request->designation;
            $doctor->specialization = $request->specialization;
            $doctor->bio = $request->bio;
            $doctor->status = $request->status;

            if ($request->hasFile('photo')) {

                $file = time() . '.' . $request->photo->extension();

                $request->photo->move(
                    public_path('images/doctor'),
                    $file
                );

                $doctor->photo = $file;
            }

            $doctor->save();

            return redirect()->back()
                ->with('success', 'Doctor Added Successfully.');

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());

        }
    }


    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'department_id' => 'required|exists:departments,id',
                'name' => 'required|max:255',
                'phone' => 'nullable|max:30',
                'email' => 'nullable|email|max:255',
                'designation' => 'nullable|max:255',
                'specialization' => 'nullable|max:255',
                'bio' => 'nullable',
                'photo' => 'nullable|image|max:2048',
                'status' => 'required|in:0,1',
            ]);

            $doctor = Doctor::findOrFail($id);

            $doctor->department_id = $request->department_id;
            $doctor->name = $request->name;
            $doctor->phone = $request->phone;
            $doctor->email = $request->email;
            $doctor->designation = $request->designation;
            $doctor->specialization = $request->specialization;
            $doctor->bio = $request->bio;
            $doctor->status = $request->status;

            if ($request->hasFile('photo')) {

                // Delete old photo
                if ($doctor->photo) {

                    $oldFile = public_path(
                        'images/doctor/' . $doctor->photo
                    );

                    if (file_exists($oldFile)) {
                        unlink($oldFile);
                    }
                }

                // Upload new photo
                $file = time() . '.' . $request->photo->extension();

                $request->photo->move(
                    public_path('images/doctor'),
                    $file
                );

                $doctor->photo = $file;
            }

            $doctor->save();

            return redirect()->back()
                ->with('success', 'Doctor Updated Successfully.');

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());

        }
    }


    public function destroy($id)
    {
        try {

            $doctor = Doctor::findOrFail($id);

            if ($doctor->appointments()->exists()) {

                return redirect()->back()
                    ->with(
                        'error',
                        'Doctor has appointment history.'
                    );
            }

            // Delete photo
            if ($doctor->photo) {

                $filePath = public_path(
                    'images/doctor/' . $doctor->photo
                );

                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            $doctor->delete();

            return redirect()->back()
                ->with('success', 'Doctor Deleted Successfully.');

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());

        }
    }


    public function toggleStatus($id)
    {
        try {

            $doctor = Doctor::findOrFail($id);

            $doctor->status = !$doctor->status;

            $doctor->save();

            return redirect()->back()
                ->with('success', 'Doctor Status Updated Successfully.');

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());

        }
    }
}
