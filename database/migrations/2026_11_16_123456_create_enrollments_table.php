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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke tabel participants (Hapus peserta = hapus pendaftaran)
            $table->foreignId('participant_id')
                  ->constrained()
                  ->cascadeOnDelete();
                  
            // Relasi ke tabel courses (Hapus kursus = hapus pendaftaran)
            $table->foreignId('course_id')
                  ->constrained()
                  ->cascadeOnDelete();
                  
            $table->string('status', 20)->default('registered');
            $table->timestamps();

            // Mencegah 1 peserta daftar 2x di kursus yang sama
            $table->unique(['participant_id', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};