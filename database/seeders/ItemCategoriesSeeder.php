<?php

namespace Database\Seeders;

use App\Models\ItemCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemCategories::factory(10)->create();
    }
}
