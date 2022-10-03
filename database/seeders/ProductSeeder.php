<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::query()->find(1);
        $category->products()->createMany([
            [
                'name' => 'Robot Toy',
                'price' => 30.50,
                'description' => 'ROBOT TOY DESCRIPTION'
            ],
            [
                'name' => 'Cat Toy',
                'price' => 50.88,
                'description' => 'CAT TOY DESCRIPTION'
            ],
            [
                'name' => 'Barbie Girl',
                'price' => 10.26,
                'description' => 'BARBIE GIRL DESCRIPTION'
            ],
        ]);
    }
}
