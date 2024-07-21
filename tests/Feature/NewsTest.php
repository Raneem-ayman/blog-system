<?php

namespace Tests\Feature;

use App\Models\NewsCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_news()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $category = NewsCategory::factory()->create();

        $response = $this->post('/admin/news', [
            'title' => 'Test News',
            'description' => 'Test Description',
            'category_id' => $category->id,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('news', ['title' => 'Test News']);
    }

}
