<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'description' => 'Administrator role',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'redactor',
                'description' => 'Redactor role',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'membre',
                'description' => 'Regular member role',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add other roles as needed
        ]);
    }
}
