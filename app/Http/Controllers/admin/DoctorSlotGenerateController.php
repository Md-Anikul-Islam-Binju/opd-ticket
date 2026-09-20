<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\DoctorSlotService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;

class DoctorSlotGenerateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('doctor-slot-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        });
    }

    public function generate(
        Request $request,
        DoctorSlotService $slotService
    ) {
        try {

            $request->validate([
                'date' => 'required|date',
            ]);

            $date = Carbon::parse(
                $request->date
            );

            /*
             * Friday does not generate slots.
             */
            if ($date->dayOfWeek == 5) {
                return redirect()
                    ->back()
                    ->with(
                        'error',
                        'Friday does not have appointment slots.'
                    );
            }

            $slotService->generateForDateAllDoctors(
                $date
            );

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Doctor slots generated successfully.'
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
