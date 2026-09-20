<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number')
                ->unique();

            $table->foreignId('patient_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('department_id')
                ->constrained()
                ->restrictOnDelete();


            $table->foreignId('doctor_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('slot_id')
                ->constrained('doctor_slots')
                ->restrictOnDelete();

            $table->date('appointment_date');

            $table->time('start_time');
            $table->time('end_time');

            $table->text('notes')->nullable();

            $table->enum('status', [
                'pending',
                'confirmed',
                'cancelled',
                'completed',
                'no_show',
            ])->default('pending');

            $table->timestamps();

            $table->index([
                'patient_id',
                'appointment_date'
            ]);

            $table->index([
                'doctor_id',
                'appointment_date'
            ]);

            $table->index([
                'department_id',
                'appointment_date'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
