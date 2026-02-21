<?php

namespace Tests\Feature;

use App\Models\ItemCategories;
use App\Models\Items;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemAPITest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;

    public function test_get_items_json(): void
    {
        ItemCategories::factory(5)->create();
        Items::factory(10)->create();

        $response = $this->getJson('/api/item/list');

        $response->assertJsonStructure(
            ['*' =>  [
                'name',
                'description',
                'stock',
                'category_id',
                'img_path'
            ]]
        );

        $response->assertStatus(200);
    }


    public function test_post_items_json(): void
    {
        ItemCategories::factory(5)->create();
        Items::factory(10)->create();

        $data = [
            'name' => 'Kambing',
            'description' => "binatang",
            'stock' => 12,
            'category_id' => 1,
            'img_path' => '123'
        ];

        $response = $this->postJson('/api/item/add', $data);
        $response->assertJsonStructure(
            [
                'name',
                'description',
                'stock',
                'category_id',
                'img_path'
            ]

        );

        $response->assertJsonFragment([
            'name' => 'Kambing'
        ]);

        $this->assertDatabaseHas('items', [
            'name' => 'Kambing'
        ]);
        $response->assertStatus(201);
    }
}
