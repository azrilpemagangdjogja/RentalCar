<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admins',
            'email' => 'testadmin@example.com',
            'password'=> bcrypt('12345678'),
            'role'=> 'Admin',
            'telp'=> '08993448282',
            'mitra_status'=> 'Unverified',
            'last_login_at' => now(),
        ]);

        User::create([
            'name' => 'Superadmins',
            'email' => 'testsuperadmin@example.com',
            'password'=> bcrypt('12345678'),
            'role'=> 'Superadmin',
            'telp'=> '08993448283',
            'mitra_status'=> 'Unverified',
            'last_login_at' => now(),
        ]);

        User::create([
            'name' => 'Costumers',
            'email' => 'testcostumer@example.com',
            'password'=> bcrypt('12345678'),
            'role'=> 'User',
            'telp'=> '08763448282',
            'mitra_status'=> 'Unverified',
            'last_login_at' => now(),
        ]);

        User::create([
            'name' => 'Mitras',
            'email' => 'testmitra@example.com',
            'password'=> bcrypt('12345678'),
            'role'=> 'User',
            'telp'=> '08393448283',
            'mitra_status'=> 'Verified',
            'last_login_at' => now(),
        ]);

        User::create([
            'name' => 'Mitras2',
            'email' => 'testmitra2@example.com',
            'password'=> bcrypt('12345678'),
            'role'=> 'User',
            'telp'=> '08393148283',
            'mitra_status'=> 'Verified',
            'last_login_at' => now(),
        ]);

        User::create([
            'name' => 'Mitras3',
            'email' => 'testmitra3@example.com',
            'password'=> bcrypt('12345678'),
            'role'=> 'User',
            'telp'=> '08393458283',
            'mitra_status'=> 'Verified',
            'last_login_at' => now(),
        ]);

    }
}
