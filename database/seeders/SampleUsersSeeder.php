<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SampleUsersSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'phone' => '1111111111',
                'role' => 'admin',
                'password' => 'password123',
            ],
            [
                'name' => 'Seller One',
                'email' => 'seller1@example.com',
                'phone' => '2222222222',
                'role' => 'seller',
                'password' => 'password123',
            ],
            [
                'name' => 'Vendor Two',
                'email' => 'vendor2@example.com',
                'phone' => '3333333333',
                'role' => 'vendor',
                'password' => 'password123',
            ],
            [
                'name' => 'Customer One',
                'email' => 'customer1@example.com',
                'phone' => '4444444444',
                'role' => 'customer',
                'password' => 'password123',
            ],
            [
                'name' => 'Customer Two',
                'email' => 'customer2@example.com',
                'phone' => '5555555555',
                'role' => 'customer',
                'password' => 'password123',
            ],
        ];

        foreach ($users as $user) {
            User::firstOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'phone' => $user['phone'],
                    'role' => $user['role'],
                    'password' => Hash::make($user['password']),
                ]
            );
        }
    }
}
