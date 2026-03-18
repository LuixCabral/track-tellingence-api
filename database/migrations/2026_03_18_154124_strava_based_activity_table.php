<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('activity', function (Blueprint $table) {
            $table->id('activity_id');

            $table->foreignId('user_id')->constrained('users');

            $table->string('activity_title');
            $table->string('activity_description');

            $table->string('activity_type');

            $table->decimal('distance', 10, 2)->nullable();
            $table->integer('moving_time')->nullable();
            $table->integer('elapsed_time')->nullable();

            $table->decimal('total_elevation_gain', 8, 2)->default(0);
            $table->decimal('average_speed', 8, 2)->nullable();
            $table->decimal('average_heartrate', 5, 2)->nullable();
            $table->decimal('max_heartrate', 5, 2)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity');
    }
};
