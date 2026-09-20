<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('service-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        try {

            $service = Service::latest()->first();

            return view(
                'admin.pages.service.index',
                compact('service')
            );

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required|max:255',
                'fee' => 'required|numeric|min:0',
                'description' => 'nullable',
                'status' => 'required|in:0,1',
            ]);

            $service = Service::latest()->first();

            if (!$service) {
                $service = new Service();
            }

            $service->name = $request->name;
            $service->fee = $request->fee;
            $service->description = $request->description;
            $service->status = $request->status;

            $service->save();

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Ticket Fee Updated Successfully.'
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

    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'name' => 'required|max:255',
                'fee' => 'required|numeric|min:0',
                'description' => 'nullable',
                'status' => 'required|in:0,1',
            ]);

            $service = Service::findOrFail($id);

            $service->name = $request->name;
            $service->fee = $request->fee;
            $service->description = $request->description;
            $service->status = $request->status;

            $service->save();

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Ticket Fee Updated Successfully.'
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
