<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Product::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'Admin Andrews',
            'username' => 'andrews',
            'password' => bcrypt('andrew123'),
            'email' => 'andrew@gmail.com',
            'role_id' => 1
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Toko Abadi Jaya',
            'username' => 'abadijaya',
            'password' => bcrypt('abadi123'),
            'email' => 'tokoabadijaya@gmail.com',
            'role_id' => 2
        ]);

        \App\Models\UserData::create([
            'user_id' => 1
        ]);
        \App\Models\UserData::create([
            'user_id' => 2
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'Admin',
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'Agent',
        ]);
    }
}
