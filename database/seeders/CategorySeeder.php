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
        $categories = [
            [
                'name' => 'Dairy, Bread & Eggs',
                'slug' => 'dairy-bread-eggs',
                'description' => 'Explore our collection of dairy products, bread, and eggs.',
                'image' => 'category-dairy-bread-eggs.jpg',
                'status' => '1',
                'meta_title' => 'Dairy, Bread & Eggs Category',
                'meta_description' => 'Discover our collection of dairy products, bread, and eggs.',
            ],
            [
                'name' => 'Snack & Munchies',
                'slug' => 'snack-munchies',
                'description' => 'Find the perfect snack to satisfy your cravings.',
                'image' => 'category-snack-munchies.jpg',
                'status' => '1',
                'meta_title' => 'Snack & Munchies Category',
                'meta_description' => 'Explore our collection of snacks and munchies.',
            ],
            [
                'name' => 'Bakery & Biscuits',
                'slug' => 'bakery-biscuits',
                'description' => 'Indulge in our freshly baked goods and biscuits.',
                'image' => 'category-bakery-biscuits.jpg',
                'status' => '1',
                'meta_title' => 'Bakery & Biscuits Category',
                'meta_description' => 'Discover our collection of freshly baked goods and biscuits.',
            ],
            [
                'name' => 'Instant Food',
                'slug' => 'instant-food',
                'description' => 'Quick and easy meal solutions for busy lives.',
                'image' => 'category-instant-food.jpg',
                'status' => '1',
                'meta_title' => 'Instant Food Category',
                'meta_description' => 'Explore our collection of instant food products.',
            ],
            [
                'name' => 'Tea, Coffee & Drinks',
                'slug' => 'tea-coffee-drinks',
                'description' => 'Refresh and recharge with our selection of teas, coffees, and drinks.',
                'image' => 'category-tea-coffee-drinks.jpg',
                'status' => '1',
                'meta_title' => 'Tea, Coffee & Drinks Category',
                'meta_description' => 'Discover our collection of teas, coffees, and drinks.',
            ],
            [
                'name' => 'Atta, Rice & Dal',
                'slug' => 'atta-rice-dal',
                'description' => 'Explore our collection of atta, rice, and dal products.',
                'image' => 'category-atta-rice-dal.jpg',
                'status' => '1',
                'meta_title' => 'Atta, Rice & Dal Category',
                'meta_description' => 'Discover our collection of atta, rice, and dal products.',
            ],
            [
                'name' => 'Baby Care',
                'slug' => 'baby-care',
                'description' => 'Find everything you need for your little ones.',
                'image' => 'category-baby-care.jpg',
                'status' => '1',
                'meta_title' => 'Baby Care Category',
                'meta_description' => 'Explore our collection of baby care products.',
            ],
            [
                'name' => 'Chicken, Meat & Fish',
                'slug' => 'chicken-meat-fish',
                'description' => 'Fresh and frozen meat, poultry, and seafood options.',
                'image' => 'category-chicken-meat-fish.jpg',
                'status' => '1',
                'meta_title' => 'Chicken, Meat & Fish Category',
                'meta_description' => 'Discover our collection of fresh and frozen meat, poultry, and seafood options.',
            ],
            [
                'name' => 'Cleaning Essentials',
                'slug' => 'cleaning-essentials',
                'description' => 'Keep your home clean and tidy with our cleaning essentials.',
                'image' => 'category-cleaning-essentials.jpg',
                'status' => '1',
                'meta_title' => 'Cleaning Essentials Category',
                'meta_description' => 'Explore our collection of cleaning essentials.',
            ],
            [
                'name' => 'Pet Care',
                'slug' => 'pet-care',
                'description' => 'Find everything you need to keep your pets happy and healthy.',
                'image' => 'category-pet-care.jpg',
                'status' => '1',
                'meta_title' => 'Pet Care Category',
                'meta_description' => 'Discover our collection of pet care products.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
