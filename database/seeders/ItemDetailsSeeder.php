<?php

namespace Database\Seeders;

use App\Models\ItemDetails;
use App\Models\Items;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item_ids = Items::all()->pluck('id')->toArray();
        // karena relation ship item id dengan item details one to one
        foreach($item_ids as $id){
            ItemDetails::factory()->create([
                'item_id' => $id
            ]);
        }
    }
}
