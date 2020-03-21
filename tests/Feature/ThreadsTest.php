<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadsTest extends TestCase
{
    /**test*/

    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();
        
        $this->thread = factory('App\Thread')->create();
    }
    
    /**test*/

    public function testBrowserThreads()
    {
        $response = $this->get('/threads')
            ->assertSee($this->thread->title);
    }

    public function testSinglethread()
    {
        $response = $this->get('/threads/' . $this->thread->id)
            ->assertSee($this->thread->title);
    }

    public function testThreadReplies()
    {
        $reply = factory('App\Reply')->create(['thread_id' => $this->thread->id]);

        $response = $this->get('/threads/' . $this->thread->id)
            ->assertSee($reply->body);
    }
}
