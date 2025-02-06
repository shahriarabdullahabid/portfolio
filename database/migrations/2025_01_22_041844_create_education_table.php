<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('degree');  // Degree name (e.g., B.Sc, HSC, SSC)
            $table->string('institution');  // Institution name (e.g., BUP)
            $table->year('start_year');  // Start year
            $table->year('end_year');  // End year
            $table->text('description')->nullable();  // Additional details
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
