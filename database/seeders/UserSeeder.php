<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $role = Role::create(['name' => 'admin']);

        User::create([
            'name' => 'Maykol Castro Ortiz',
            'email' => 'maykol@panaderia.com',
            'password' => bcrypt('12345678')
        ]);

        User::factory(100)->create();
    }
}
