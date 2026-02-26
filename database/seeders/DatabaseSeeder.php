<?php

namespace Database\Seeders;

use App\Models\ItemCategories;
use App\Models\ItemDetails;
use App\Models\Items;
use App\Models\User;
use App\Models\Warehouses;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin_allen',
            'email' => 'allen@gmail.com',
            'password' => 'allen123',
            'role' => 'admin'
        ]);

       $this->call([
            ItemCategoriesSeeder::class,
            ItemsSeeder::class,
            ItemDetailsSeeder::class,
            WarehousesSeeder::class
       ]);
    }
}
