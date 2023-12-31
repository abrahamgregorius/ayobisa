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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('available_seats');
            $table->foreignId('departure_location_id')->constrained('locations', "id")->onDelete('CASCADE');
            $table->foreignId('arrival_location_id')->constrained('locations', "id")->onDelete('CASCADE');
            $table->timestamp('departure_time');
            $table->double('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
