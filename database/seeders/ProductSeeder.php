<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            Product::create([
                'name' => 'Product ' . $i,
                'description' => 'Description for Product ' . $i,
                'price' => rand(10, 100) + (rand(0, 99) / 100),
                'stock_quantity' => rand(1, 100),
            ]);
        }

        Product::create([
            'name' => 'Mangoes',
            'description' => 'Fresh and delicious mangoes',
            'price' => 2.99,
            'stock_quantity' => 50,
        ]);

        Product::create([
            'name' => 'Bananas',
            'description' => 'Ripe and sweet bananas',
            'price' => 1.99,
            'stock_quantity' => 100,
        ]);

        Product::create([
            'name' => 'Spinach',
            'description' => 'Healthy green spinach leaves',
            'price' => 3.49,
            'stock_quantity' => 30,
        ]);
        Product::create([
            'name' => 'Kale',
            'description' => 'Healthy green spinach leaves',
            'price' => 3.49,
            'stock_quantity' => 30,
        ]);
        Product::create([
            'name' => 'Sukuma wiki',
            'description' => 'Healthy green spinach leaves',
            'price' => 3.49,
            'stock_quantity' => 30,
        ]);

        // Add more products as needed
    }
}
