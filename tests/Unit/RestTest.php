<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;

class RestTest extends TestCase
{
    /**
     * A basic unit test example.
     * 
     * @return void
     */    
    public function testGetPost()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testCreatePost()
    {
        $response = $this->post('/api/posts', ['title' => 'TestTitle', 'content' => 'TestContent']);
        $response->assertStatus(201);

        $response = $this->post('/api/posts', []);
        $response->assertStatus(302); 
    }

    public function testUpdatePost()
    {
        $response = $this->put('/api/posts/2', ['title' => 'TestUpdateTitle', 'content' => 'TestUpdateContent']);
        $response->assertStatus(200);

        $response = $this->put('/api/posts/32154', ['title' => 'TestUpdateTitle', 'content' => 'TestUpdateContent']);
        $response->assertStatus(404);

        $response = $this->put('/api/posts/2', []);
        $response->assertStatus(302);
    }

    public function testDeletePost()
    {
        Post::create([
            'id' => '555',
            'title' => 'title_for_delete',
            'content' => 'content_for_delete'
        ]);

        $response = $this->delete('/api/posts/555');
        $response->assertStatus(200);
    }
}
