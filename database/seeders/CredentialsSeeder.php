<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CredentialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('credentials')->insert([
            'username' => 'admin',
            'password' => Hash::make('password123'), // Password should always be hashed
            'created_at' => now(),
            'updated_at' => now(),
   ]);
}
}
