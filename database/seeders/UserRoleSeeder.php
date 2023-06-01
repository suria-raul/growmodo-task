<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'administrator']);
        $adminPermission = Permission::create(['name' => 'administer users']);
        $adminRole->givePermissionTo($adminPermission);

        $authenticatedRole = Role::create(['name' => 'authenticated']);
        $authenticatedPermission = Permission::create(['name' => 'administer own account']);
        $authenticatedRole->givePermissionTo($authenticatedPermission);
    }
}
