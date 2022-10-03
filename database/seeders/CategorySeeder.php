<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::query()->create([
            'name' => 'Kids'
        ]);

        Category::query()->create([
            'name' => 'Electronics'
        ]);

        Category::query()->create([
            'name' => 'Laptops'
        ]);
    }//excellent
}
