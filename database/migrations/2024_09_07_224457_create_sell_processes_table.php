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
        Schema::create('sell_processes', function (Blueprint $table) {
            $table->id();
            $table->integer('price');
            $table->timestamps();

            $table->foreignId('teacher_id')
                ->constrained('teachers')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('student_id')
                ->constrained('students')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('sell_point_id')
                ->constrained('sell_points')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sell_processes');
    }
};
