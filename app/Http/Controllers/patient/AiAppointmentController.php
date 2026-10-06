<?php

namespace App\Http\Controllers\patient;

use App\Ai\Agents\AppointmentAgent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Throwable;

class AiAppointmentController extends Controller
{
    public function prompt(Request $request)
    {
        $request->validate([
            'prompt' => ['required', 'string', 'max:2000'],
        ]);

        try {
            $response = (new AppointmentAgent)
                ->prompt($request->input('prompt'));

            return response()->json([
                'status' => true,
                'message' => (string) $response,
            ]);

        } catch (Throwable $e) {
            report($e);

            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'exception' => get_class($e),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ], 500);
        }
    }
}
