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
        Category::create([
            'category' => 'Soft Drink'
        ]);

        Category::create([
            'category' => 'Juice'
        ]);

        Category::create([
            'category' => 'Coffee'
        ]);

        Category::create([
            'category' => 'Tea'
        ]);

        Category::create([
            'category' => 'Milk'
        ]);
    }
}
