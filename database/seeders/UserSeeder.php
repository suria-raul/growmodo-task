<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'administrator')->get();
        $administrator = User::factory()->create([
            'username' => 'administrator',
            'email' => 'admin@mailinator.com',
            'password' => 'p^Nd@S',
        ]);
        $administrator->assignRole($adminRole);

        User::factory(10)->create();
        $usersWithNoRoles = User::doesntHave('roles')->get();
        $authenticatedRole = Role::where('name', 'authenticated')->get();
        foreach ($usersWithNoRoles as $user) {
            $user->assignRole($authenticatedRole);
        }
    }
}
