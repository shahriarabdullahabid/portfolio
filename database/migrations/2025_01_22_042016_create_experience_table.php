<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('experience', function (Blueprint $table) {
            $table->id();
            $table->string('title');  // Job title (e.g., Front-End Developer Intern)
            $table->string('company');  // Company name (e.g., ABC Tech Solutions)
            $table->year('start_year');  // Start year
            $table->year('end_year')->nullable();  // End year (NULL for present jobs)
            $table->text('description')->nullable();  // Job responsibilities
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experience');
    }
};
