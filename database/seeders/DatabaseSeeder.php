<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserRoleSeeder::class
        ]);

        $adminRole = Role::where('name', 'administrator')->get();

        $administrator = User::factory()->create([
            'username' => 'administrator',
            'email' => 'admin@mailinator.com',
            'password' => 'p^Nd@S',
        ]);

        $administrator->assignRole($adminRole);
    }
}
