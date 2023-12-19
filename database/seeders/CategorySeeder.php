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
        $categories = [
            'Fruits' => [
                'Citrus Fruits',
                'Berries',
                'Tropical Fruits',
                'Stone Fruits',
                'Melons',
                'Apples and Pears',
                'Exotic Fruits',
                'Dried Fruits',
                'Nuts',
                'Miscellaneous Fruits',
            ],
            'Vegetables' => [
                'Leafy Greens',
                'Root Vegetables',
                'Cruciferous Vegetables',
                'Allium Vegetables (Onions, Garlic, etc.)',
                'Bell Peppers',
                'Tomatoes',
                'Cucumbers',
                'Squash (Zucchini, Butternut, etc.)',
                'Legumes (Beans, Lentils, Peas)',
                'Potatoes and Sweet Potatoes',
            ],
            'Grains and Cereals' => [
                'Rice',
                'Wheat',
                'Oats',
                'Barley',
                'Quinoa',
                'Millet',
            ],
            'Dairy and Eggs' => [
                'Milk',
                'Cheese',
                'Yogurt',
                'Eggs',
            ],
            'Meat and Poultry' => [
                'Beef',
                'Chicken',
                'Pork',
                'Lamb',
                'Turkey',
            ],
            'Seafood' => [
                'Fish',
                'Shrimp',
                'Crab',
                'Lobster',
            ],
            'Bakery and Snacks' => [
                'Bread',
                'Pastries',
                'Cookies',
                'Chips',
                'Nuts and Seeds Snacks',
            ],
            'Beverages' => [
                'Water',
                'Juice',
                'Soda',
                'Tea',
                'Coffee',
            ],
            'Condiments and Sauces' => [
                'Ketchup',
                'Mustard',
                'Mayonnaise',
                'Soy Sauce',
                'Salad Dressings',
            ],
            'Herbs and Spices' => [
                'Basil',
                'Cilantro',
                'Oregano',
                'Cinnamon',
                'Pepper',
            ],
            'Frozen Foods' => [
                'Frozen Vegetables',
                'Frozen Fruits',
                'Frozen Meals',
            ],
            'Personal Care' => [
                'Shampoo',
                'Soap',
                'Toothpaste',
                'Skincare Products',
            ],
            'Household Essentials' => [
                'Cleaning Supplies',
                'Laundry Detergent',
                'Paper Towels',
                'Tissues',
            ],
            'Baby and Kids' => [
                'Diapers',
                'Baby Food',
                'Kids Snacks',
                'Baby Care Products',
            ],
            'Home and Kitchen' => [
                'Cookware',
                'Utensils',
                'Appliances',
                'Home Decor',
            ],
        ];

        foreach ($categories as $mainCategory => $subCategories) {
            $mainCategoryId = Category::create(['name' => $mainCategory])->id;
            foreach ($subCategories as $subCategory) {
                Category::create(['name' => $subCategory, 'parent_id' => $mainCategoryId]);
            }
        }
    }
}