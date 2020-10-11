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

    /** @test */
    function name()
    {
        $post = Post::factory()->create();
        $this->assertFalse($post->isScheduled());

        $post->published_at = now()->addWeek();
        $this->assertTrue($post->isScheduled());

        // Wormhole class used behind the scene
        $this->travel(8)->days();
        // $this->travel(-1)->month();
        // $this->travelBack();
        $this->assertFalse($post->isScheduled());
    }
}
