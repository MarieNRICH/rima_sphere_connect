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
            $table->text('description');
            $table->integer('status');
            $table->integer('duration');
            $table->integer('volunteer')->default(0);
            $table->integer('participant')->default(0);
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
