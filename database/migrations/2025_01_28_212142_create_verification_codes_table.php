<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('verification_codes', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('email')->unique(); // Email field, must be unique
            $table->string('code'); // 6-digit verification code
            $table->timestamp('expires_at'); // Expiration timestamp for the code
            $table->timestamps(); // Default Laravel created_at and updated_at timestamps
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verification_codes');
    }
};
