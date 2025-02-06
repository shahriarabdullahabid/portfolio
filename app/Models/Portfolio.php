<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    // Define the table name (optional, as it will be inferred from the model name)
    protected $table = 'portfolios';

    // Define the fillable attributes (columns that are mass assignable)
    protected $fillable = [
        'project_name', 
        'category', 
        'image', 
        'live_url', 
        'github_url', 
        'technologies', 
        'features'
    ];

    // Cast the technologies and features columns to arrays
    protected $casts = [
        'technologies' => 'array',
        'features' => 'array',
    ];
}
