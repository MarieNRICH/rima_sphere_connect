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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name')->unique(false);
            $table->date('event_date');
            $table->string('place_address');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->longText('description')->nullable();
            $table->string('status');
            $table->unsignedInteger('duration');
            $table->unsignedInteger('volunteer')->default(0);
            $table->unsignedInteger('participant')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
