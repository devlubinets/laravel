<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 5; $i++) {
            $category = [
                'name' => ucfirst($faker->word),
            ];
            \App\Models\Category::create($category);
        }
        for ($i=0; $i < 100; $i++) {
            $productData = [
                "category_id" => \App\Models\Category::inRandomOrder()->first()->id,
                'name' => ucfirst($faker->word) .' '. $faker->word,
                'description' => $faker->paragraph(3),
                'code' => Str::random(10),
                "price" => rand(100, 999),
            ];
            \App\Models\Product::create($productData);
        }
    }

    /*public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 5; $i++) {
            $category = [
                'name' => ucfirst($faker->word),
            ];
            \App\Models\Category::create($category);
        }
        for ($i=0; $i < 100; $i++) {
            $productData = [
                "category_id" => \App\Models\Category::inRandomOrder()->first()->id,
                'name' => ucfirst($faker->word) .' '. $faker->word,
                'description' => $faker->paragraph(3),
                'code' => Str::random(10),
                "price" => rand(100, 999),
            ];
            \App\Models\Product::create($productData);
        }
    }*/
}
