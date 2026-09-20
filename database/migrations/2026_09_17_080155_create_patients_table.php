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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->unique()
                ->constrained()
                ->cascadeOnDelete();

            $table->string('patient_code')
                ->unique();

            $table->string('phone')
                ->unique();

            $table->date('date_of_birth')
                ->nullable();

            $table->unsignedTinyInteger('age')
                ->nullable();

            $table->enum('gender', [
                'male',
                'female',
                'other'
            ])->nullable();

            $table->string('division')->nullable();
            $table->string('district')->nullable();
            $table->string('upazila')->nullable();
            $table->string('post_office')->nullable();

            $table->text('address')->nullable();

            $table->string('nid_number')->nullable();

            $table->string('relationship')->nullable();

            $table->string('emergency_contact')->nullable();

            $table->text('medical_history')->nullable();

            $table->boolean('status')
                ->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
