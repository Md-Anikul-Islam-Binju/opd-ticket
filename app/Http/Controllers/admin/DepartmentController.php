<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('department-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }


    public function index()
    {
        $departments = Department::withCount('doctors')
            ->latest()
            ->paginate(15);

        return view('admin.pages.department.index', compact('departments'));
    }


    public function store(Request $request)
    {
        try {

            $request->validate([
                'name'        => 'required|max:255|unique:departments,name',
                'description' => 'nullable',
                'status'      => 'required|in:0,1',
            ]);

            $department = new Department();

            $department->name = $request->name;
            $department->slug = Str::slug($request->name);
            $department->description = $request->description;
            $department->status = $request->status;

            $department->save();

            return redirect()->back()
                ->with('success', 'Department Added Successfully.');

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());

        }
    }


    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'name'        => 'required|max:255|unique:departments,name,' . $id,
                'description' => 'nullable',
                'status'      => 'required|in:0,1',
            ]);

            $department = Department::findOrFail($id);

            $department->name = $request->name;
            $department->slug = Str::slug($request->name);
            $department->description = $request->description;
            $department->status = $request->status;

            $department->save();

            return redirect()->back()
                ->with('success', 'Department Updated Successfully.');

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());

        }
    }


    public function destroy($id)
    {
        try {

            $department = Department::findOrFail($id);

            if ($department->doctors()->exists()) {

                return redirect()->back()
                    ->with('error', 'Cannot delete department with doctors.');

            }

            $department->delete();

            return redirect()->back()
                ->with('success', 'Department Deleted Successfully.');

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());

        }
    }


    public function toggleStatus($id)
    {
        try {

            $department = Department::findOrFail($id);

            $department->status = !$department->status;

            $department->save();

            return redirect()->back()
                ->with('success', 'Department Status Updated Successfully.');

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());

        }
    }
}
