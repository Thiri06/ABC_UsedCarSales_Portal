<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing users
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Create admin users
        DB::table('users')->insert([
            [
                'name' => 'Admin One',
                'email' => 'admin1@abccars.com',
                'password' => Hash::make('password123O'),
                'email_verified_at' => now(),
                'is_admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin Two',
                'email' => 'admin2@abccars.com',
                'password' => Hash::make('password123T'),
                'email_verified_at' => now(),
                'is_admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Create regular users
        $regularUsers = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
            ],
            [
                'name' => 'Mike Johnson',
                'email' => 'mike@example.com',
            ],
            [
                'name' => 'Sarah Wilson',
                'email' => 'sarah@example.com',
            ],
            [
                'name' => 'Tom Brown',
                'email' => 'tom@example.com',
            ],
        ];

        foreach ($regularUsers as $user) {
            DB::table('users')->insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('password123U'),
                'email_verified_at' => now(),
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
