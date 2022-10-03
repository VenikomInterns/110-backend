<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([
            'name' => 'Admin',
            'email' => 'emilija@gmail.com',
            'password' => bcrypt('emilija2709#'),
            'admin' => true,
        ]);
    }
}
