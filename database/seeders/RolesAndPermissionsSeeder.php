<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $groupAdmin = Role::firstOrCreate(['name' => 'group_admin']);
        $user = Role::firstOrCreate(['name' => 'user']);

        // Create permissions
        Permission::create(['name' => 'view profile']);
        Permission::create(['name' => 'manage group']);
        Permission::create(['name' => 'remove user']);
        Permission::create(['name' => 'manage platform']);

        // Assign permissions to roles
        $user->givePermissionTo(['view profile']);

        $groupAdmin->givePermissionTo(['view profile', 'manage group', 'remove user']);

        $admin->givePermissionTo(Permission::all());


    }


}
