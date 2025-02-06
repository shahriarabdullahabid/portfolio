<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    public function up()
    {
        // Creating the 'portfolios' table
        Schema::create('portfolios', function (Blueprint $table) {
            // Auto-incrementing 'id' column which will be the primary key
            $table->id();  

            // 'project_name' column to store the name of the project (as a string)
            $table->string('project_name');  

            // 'category' column to store the category of the project (as a string)
            $table->string('category');  

            // 'image' column to store the image URL or path (as a string)
            $table->string('image');  

            // 'live_url' column to store the live URL of the project (as a string)
            $table->string('live_url');  

            // 'github_url' column to store the GitHub URL of the project (as a string)
            $table->string('github_url');  

            // 'technologies' column to store a list of technologies used in the project (as JSON)
            $table->json('technologies');  

            // 'features' column to store a list of features of the project (as JSON)
            $table->json('features');  

            // Automatically generates 'created_at' and 'updated_at' timestamp columns
            $table->timestamps();  
        });
    }

    public function down()
    {
        // Drop the 'portfolios' table if it exists
        Schema::dropIfExists('portfolios');
    }
}
