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

            $user = $request->user();

            /*
            |--------------------------------------------------------------------------
            | Get Existing Conversation
            |--------------------------------------------------------------------------
            */

            $conversationId = session(
                'ai_appointment_conversation_id'
            );

            /*
            |--------------------------------------------------------------------------
            | Continue Existing Conversation
            | OR Start New Conversation
            |--------------------------------------------------------------------------
            */

            $response = (new AppointmentAgent)
                ->continueOrStart(
                    $conversationId,
                    as: $user
                )
                ->prompt(
                    $request->input('prompt')
                );

            /*
            |--------------------------------------------------------------------------
            | Save Conversation ID In Session
            |--------------------------------------------------------------------------
            */

            if ($response->conversationId) {

                session()->put(
                    'ai_appointment_conversation_id',
                    $response->conversationId
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Response
            |--------------------------------------------------------------------------
            */

            return response()->json([
                'status' => true,
                'message' => (string) $response,
                'conversation_id' => $response->conversationId,
            ]);

        } catch (Throwable $e) {

            report($e);

            return response()->json([
                'status' => false,
                'message' => config('app.debug')
                    ? $e->getMessage()
                    : 'AI assistant is temporarily unavailable.',
            ], 500);
        }
    }
}
