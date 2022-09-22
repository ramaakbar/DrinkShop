<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Akbar Ramadhan',
            'email' => 'rama.akbar@ymail.com',
            'password' => bcrypt('password'),
            'is_admin' => true
        ]);

        User::create([
            'name' => 'Ramadhan Akbar',
            'email' => 'akbar.yusri@binus.ac.id',
            'password' => bcrypt('password'),
            'is_admin' => false
        ]);


        $this->call([
            DrinkSeeder::class,
            CategorySeeder::class
            
        ]);
    }
}
