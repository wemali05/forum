<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateThreadsTest extends TestCase
{
    use RefreshDatabase;

    /**test*/
    public function testGuestsMayNotCreateThreads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
 
        $thread = factory('App\Thread')->make();

        $this->post('/threads', $thread->toArray());
    }
    
    public function testAuthUserCanCreateNewThread()
    {
        // Given we have a signed in user
        $this->actingAs($user = factory('App\User')->create());

        // when we hit the endpoint to create a new thread
        $thread = factory('App\Thread')->make();

        $this->post('/threads', $thread->toArray());

        // the we visitb the thread page
        $this->get($thread->path())
             ->assertSee($thread->title)
             ->assertSee($thread->body);
    }
}
