<?php

namespace Database\Seeders;

use App\Models\ApprovalMitraIdentity;
use App\Models\RentalTime;
use App\Models\User;
use App\Models\VehicleTransmission;
use App\Models\VehicleType;
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
            'name' => 'Test',
            'email' => 'test@example.com',
            'password'=> bcrypt('12345678'),
            'role'=> 'User',
            'telp'=> '08393448283',
            'mitra_status'=> 'Unverified',
            'last_login_at' => now(),
        ]);

        User::create([
            'name' => 'Test2',
            'email' => 'test2@example.com',
            'password'=> bcrypt('12345678'),
            'role'=> 'User',
            'telp'=> '08393148283',
            'mitra_status'=> 'Unverified',
            'last_login_at' => now(),
        ]);

        User::create([
            'name' => 'Test3',
            'email' => 'test3@example.com',
            'password'=> bcrypt('12345678'),
            'role'=> 'User',
            'telp'=> '08393458283',
            'mitra_status'=> 'Unverified',
            'last_login_at' => now(),
        ]);

        VehicleTransmission::create([
            'name' => 'Manual',
            'description' => 'Transmisi manual',
            'status' => 'Active',
        ]);

        VehicleTransmission::create([
            'name' => 'Automatic',
            'description' => 'Transmisi otomatis',
            'status' => 'Active',
        ]);

        VehicleType::create([
            'name' => 'Mobil',
            'description' => 'Roda empat',
            'status' => 'Active',
        ]);

        VehicleType::create([
            'name' => 'Motor',
            'description' => 'Roda dua',
            'status' => 'Active',
        ]);

        RentalTime::create([
            'day' => '1',
            'description' => 'Sewa kendaraan selama 1 hari',
            'status' => 'Active',
        ]);

        RentalTime::create([
            'day' => '2',
            'description' => 'Sewa kendaraan selama 2 hari',
            'status' => 'Active',
        ]);

        // ApprovalMitraIdentity::create([
        //     'applicant_id' => 3,
        //     'mitra_identity_id' => 1,
        //     'nik' => '1234567890123456',
        //     'full_name' => 'Test User',
        //     'ktp_photo' => 'ktp_photo.jpg',
        //     'email' => 'testcostumer@example.com',
        //     'status' => 'Pending',
        // ]);
    }
}
