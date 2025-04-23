<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the categories to be seeded
        $categories = [
            'Technology',
            'Health',
            'Travel',
            'Food',
            'Lifestyle',
            'Education',
            'Finance',
            'Entertainment',
            'Sports',
            'Fashion'
        ];

        // Insert each category into the database
        foreach ($categories as $category) {
            \App\Models\Category::create(['name' => $category]);
        }
    }
}
