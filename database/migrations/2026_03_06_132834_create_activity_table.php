<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('activity', function (Blueprint $table) {
            $table->id('activity_id');

            $table->string('activity_title');

            $table->text('activity_description');

            $table->date('activity_date');

            $table->string('activity_type');

            $table->integer('average_pace');

            $table->integer('average_bpm');

            $table->float('distance');

            $table->foreignId('user_id')->constrained('users');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity');
    }
};
