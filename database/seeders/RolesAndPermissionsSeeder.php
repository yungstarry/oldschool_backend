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
        $admin = Role::create(['name' => 'admin']);
        $groupAdmin = Role::create(['name' => 'group_admin']);
        $user = Role::create(['name' => 'user']);

        // Create permissions
        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'create_school']);
        Permission::create(['name' => 'delete_school']);
        Permission::create(['name' => 'check_association']);

        // Assign permissions to roles
        $admin->givePermissionTo(['manage_users', 'create_school', 'delete_school']);
        $groupAdmin->givePermissionTo(['create_school', 'check_association']);
        $user->givePermissionTo(['check_association']);
    }
}
