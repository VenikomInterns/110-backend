<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
    // How we seed our database if our seeders aren't defined here?
    // We can seed them one by one but if we need to do that each time we migrate:fresh it's time consuming.
    // I suggest calling our seeders here
    // $this->call([AdminSeeder::class]);
    // if(!app->enviroment('production')){
    // $this->call([CategorySeeder::class, ProductSeeder::class]);
    // }
}
