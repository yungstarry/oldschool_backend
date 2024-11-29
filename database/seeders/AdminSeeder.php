<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Create the initial admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'], // Ensure email uniqueness
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'phone_number' => '1234567890',
                'password' => bcrypt('password123'), // Use a secure password
                'terms_accepted_at' => now(),
            ]
        );

        // Assign the admin role
        $admin->assignRole($adminRole);

        $this->command->info('Admin created successfully.');
    }
}
