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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('penumpang_name')->nullable();
            $table->string('pemesan_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->integer('total_passengers')->default(1);
            $table->double('total_price')->nullable();
            $table->string('payment_code')->nullable();
            $table->foreignId('schedule_id')->constrained('schedules', 'id');
            $table->enum('status', ['booked', 'paid', 'cancelled'])->default('booked');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
