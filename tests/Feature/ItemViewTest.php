<?php

namespace Tests\Feature;

use App\Models\ItemCategories;
use App\Models\Items;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemViewTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;

    public function test_view_all_item(): void
    {   
        ItemCategories::factory(5)->create();
        Items::factory(10)->create();

        $response = $this->get('/item/list');
        $response->assertViewIs('all-item');
        $response->assertViewHas('items');
        $response->assertStatus(200);
    }


  




}
