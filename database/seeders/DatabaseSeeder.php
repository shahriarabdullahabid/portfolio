<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed the credentials table
        $this->call(CredentialsSeeder::class);

        // You can also call other seeders here if needed
        // $this->call(UserSeeder::class);
        // $this->call(ServiceSeeder::class);
    }
}
