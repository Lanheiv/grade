<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedTinyInteger('grade');
            $table->timestamp('graded_at')->useCurrent();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
