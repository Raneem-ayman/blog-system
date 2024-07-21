<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_category()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/admin/news-categories', ['name' => 'Test Category']);

        $response->assertStatus(201);
        $this->assertDatabaseHas('news_categories', ['name' => 'Test Category']);
    }
}
