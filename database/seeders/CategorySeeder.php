<?php

namespace Database\Seeders;

use App\Models\Category;
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
        for ($i = 0; $i < 50; $i++) {
            Category::create([
                'name' => fake()->words(3, true),
                'slug' => fake()->unique()->slug(),
                'description' => fake()->sentence(),
                'image' => $this->getRandomImage(),
                'status' => '1',
                'meta_title' => fake()->sentence(),
                'meta_description' => fake()->sentence(),
            ]);
        }
    }

    private function getRandomImage()
    {
        $images = [
            'category-dairy-bread-eggs.jpg',
            'category-snack-munchies.jpg',
            'category-bakery-biscuits.jpg',
            'category-instant-food.jpg',
            'category-tea-coffee-drinks.jpg',
            'category-atta-rice-dal.jpg',
            'category-baby-care.jpg',
            'category-chicken-meat-fish.jpg',
            'category-cleaning-essentials.jpg',
            'category-pet-care.jpg',
        ];

        return $images[array_rand($images)];
    }
}
