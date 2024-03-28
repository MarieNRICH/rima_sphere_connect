<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'pseudo' => 'admin',
            'date_of_birth' => '2018-04-01',
            'phone_number' => '1234567890',
            'address' => '123 Street',
            'zip_code' => '12345',
            'gender' => 'Male',
            'emergency_phone_contact' => '987654321',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminpassword'),
            'email_verified_at' => now(),
            'remember_token' => Str::random('10'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 1, // Make sure you have the correct ID for the administrator role
        ]);

        // Redactor User
        DB::table('users')->insert([
            'first_name' => 'Redactor',
            'last_name' => 'User',
            'pseudo' => 'redactor',
            'email' => 'redactor@example.com',
            'date_of_birth' => '2018-04-01',
            'phone_number' => '1234567890',
            'address' => '123 Street',
            'zip_code' => '12345',
            'gender' => 'Male',
            'emergency_phone_contact' => '987654322',
            'password' => Hash::make('password'),
            'role_id' => 2, // Make sure you have the correct ID for the Editor role
        ]);
        // Regular User
        DB::table('users')->insert([
            'first_name' => 'Standard',
            'last_name' => 'User',
            'pseudo' => 'user',
            'email' => 'user@example.com',
            'date_of_birth' => '2018-04-01',
            'phone_number' => '1234567890',
            'address' => '123 Street',
            'zip_code' => '12345',
            'gender' => 'Male',
            'emergency_phone_contact' => '987654323',
            'password' => Hash::make('password'),
            'role_id' => 3, // Make sure you have the ID corresponding to the standard user role
        ]);


        // création de 4 users aléatoires
        User::factory(4)->create();
    }
}
