<?php

namespace Tests\Unit;

use App\Models\Post;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    /** @test */
    public function it_knows_if_it_is_scheduled()
    {
        $post = Post::factory()->create();

        $this->assertFalse($post->isScheduled());
    }
}
