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
        Schema::create('doctor_slots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->date('slot_date');

            $table->time('start_time');
            $table->time('end_time');

            $table->enum('status', [
                'available',
                'booked',
                'blocked'
            ])->default('available');

            $table->string('blocked_reason')
                ->nullable();

            $table->timestamps();

            $table->unique([
                'doctor_id',
                'slot_date',
                'start_time'
            ]);

            $table->index([
                'doctor_id',
                'slot_date',
                'status'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_slots');
    }
};
