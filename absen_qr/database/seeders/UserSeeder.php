<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'type_users_id' => 1,
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
                'type_users_id' => 2,
            ]
        ];

        foreach ($users as $user) {
            // Generate unique QR Code data
            $qrData = $user['email'];
            $fileName = Str::random(10) . '.png';
            $filePath = storage_path("app/public/qrcodes/{$fileName}");

            // Generate dan simpan QR Code
            QrCode::format('png')->size(300)->generate($qrData, $filePath);

            // Simpan user ke database
            DB::table('users')->insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'type_users_id' => $user['type_users_id'],
                'qr' => "storage/qrcodes/{$fileName}", // Simpan path QR
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
