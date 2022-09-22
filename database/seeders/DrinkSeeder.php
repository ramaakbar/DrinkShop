<?php

namespace Database\Seeders;

use App\Models\Drink;
use Illuminate\Database\Seeder;

class DrinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Drink::create([
            'name' => 'Coca Cola',
            'category_id' => 1,
            'stock' => 10,
            'price' => 100000,
            'image' => 'images/cocacola.jpeg'
        ]);

        Drink::create([
            'name' => 'Fanta',
            'category_id' => 1,
            'stock' => 10,
            'price' => 100000,
            'image' => 'images/fanta.jpeg'
        ]);

        Drink::create([
            'name' => 'Watermelon Juice',
            'category_id' => 2,
            'stock' => 10,
            'price' => 100000,
            'image' => 'images/watermelon-juice.jpeg'
        ]);

        Drink::create([
            'name' => 'Americano',
            'category_id' => 3,
            'stock' => 10,
            'price' => 100000,
            'image' => 'images/coffee-cup.jpeg'
        ]);

        Drink::create([
            'name' => 'Espresso',
            'category_id' => 3,
            'stock' => 10,
            'price' => 100000,
            'image' => 'images/espresso.jpeg'
        ]);

        Drink::create([
            'name' => 'Sprite',
            'category_id' => 1,
            'stock' => 10,
            'price' => 100000,
            'image' => 'images/sprite.jpeg'
        ]);

        Drink::create([
            'name' => 'Green Juice',
            'category_id' => 2,
            'stock' => 10,
            'price' => 100000,
            'image' => 'images/greenjuice.jpeg'
        ]);

        Drink::create([
            'name' => 'Thai Tea',
            'category_id' => 4,
            'stock' => 10,
            'price' => 100000,
            'image' => 'images/thaitea.jpeg'
        ]);

        Drink::create([
            'name' => 'Fresh Milk',
            'category_id' => 5,
            'stock' => 10,
            'price' => 100000,
            'image' => 'images/freshmilk.webp'
        ]);
        Drink::create([
            'name' => 'Chocolate Milk',
            'category_id' => 5,
            'stock' => 10,
            'price' => 100000,
            'image' => 'images/chocomilk.jpg'
        ]);
        Drink::create([
            'name' => 'Pepsi',
            'category_id' => 1,
            'stock' => 10,
            'price' => 100000,
            'image' => 'images/pepsi.jpeg'
        ]);

        Drink::create([
            'name' => 'Green Tea',
            'category_id' => 4,
            'stock' => 10,
            'price' => 50000,
            'image' => 'images/greentea.jpeg'
        ]);

        Drink::create([
            'name' => 'Latte',
            'category_id' => 3,
            'stock' => 10,
            'price' => 50000,
            'image' => 'images/latte.jpeg'
        ]);

       
    }
}
