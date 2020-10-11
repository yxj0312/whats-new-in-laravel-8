<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;
    // /**
    //  * A basic test example.
    //  *
    //  * @return void
    //  */
    // public function testBasicTest()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    /** @test */
    function name()
    {
        $post = Post::factory()->create();
        $this->assertFalse($post->isScheduled());
    }
}
