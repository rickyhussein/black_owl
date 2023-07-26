<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'kode_acak' => Str::random(10),
            'email' => 'admin@gmail.com',
            'telepon' => '0987654321',
            'password' => Hash::make('admin123'),
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User',
            'kode_acak' => Str::random(10),
            'email' => 'user@gmail.com',
            'telepon' => '1234567890',
            'password' => Hash::make('user123'),
        ]);
        $user->assignRole('user');
        
    }
}
