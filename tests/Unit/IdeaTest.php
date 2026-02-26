<?php

namespace Tests\Unit;

use App\Models\Idea;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IdeaTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */

    public function test_it_belongs_to_a_user(): void
    {
        $idea = Idea::factory()->create();

        $this->assertInstanceOf(User::class, $idea->user);
    }

    public function test_it_can_or_cannot_have_steps()
    {
        $idea = Idea::factory()->create();

        $this->assertTrue($idea->steps->isEmpty());

        $idea->steps()->create([
            'description' => 'Hello World'
        ]);

        $idea->refresh();

        $this->assertCount(1, $idea->steps);
    }
}
