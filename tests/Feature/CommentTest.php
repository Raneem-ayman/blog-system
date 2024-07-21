<?php

namespace Tests\Feature;

use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_comment()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $news = News::factory()->create();

        $response = $this->post(route('news.comment', $news), ['body' => 'Test Comment']);

        $response->assertStatus(201);
        $this->assertDatabaseHas('comments', ['body' => 'Test Comment']);
    }
}
