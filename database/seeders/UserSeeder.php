<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         \App\Models\User::factory(99)->create();

         \App\Models\User::factory()->create([
             'name' => 'Samuel Zabala',
             'email' => 'Samueljzd@gmail.com',
             'password' => bcrypt('loscompis')
         ]);
    }
}
