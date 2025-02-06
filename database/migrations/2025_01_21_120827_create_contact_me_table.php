<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('contact_me', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->text('message');
            $table->boolean('read')->default(false);  // Added the 'read' column
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('contact_me');
    }
};

