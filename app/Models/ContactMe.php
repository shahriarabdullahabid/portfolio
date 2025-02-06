<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMe extends Model
{
    use HasFactory;

    // Define the table name (optional if it matches the pluralized model name)
    protected $table = 'contact_me';

    // Define fillable fields to allow mass assignment
    protected $fillable = ['name', 'email', 'message', 'read'];
}
