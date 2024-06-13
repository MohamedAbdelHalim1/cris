<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Seed a user with admin role
         User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@criselmasry.com',
            'role' => "admin",
            'password' => bcrypt('123456'), 
        ]);
    }
}
