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
    public function test_a_thread_can_make_a_string_path()
    {
        $thread = create('App\Thread');

        $this->assertEquals("/threads/{$thread->channel->slug}/{$thread->id}", $thread->path());
    }
    
    public function testBrowserThreads()
    {
        $response = $this->get('/threads')
            ->assertSee($this->thread->title);
    }

    public function testSinglethread()
    {
        $response = $this->get($this->thread->path())
            ->assertSee($this->thread->title);
    }

    public function testThreadReplies()
    {
        $reply = factory('App\Reply')->create(['thread_id' => $this->thread->id]);

        $response = $this->get($this->thread->path())
            ->assertSee($reply->body);
    }

    public function test_a_thread_belongs_to_a_channel()
    {
        $thread = create('App\Thread');

        $this->assertInstanceOf('App\Channel', $thread->channel);
    }

    public function test_user_can_filter_threads_according_to_a_channel()
    {
        $channel = create('App\Channel');
        
        $threadInChannel= create('App\Thread', ['channel_id' => $channel->id]);
        $threadNotInChannel = create('App\Thread');
        
        $this->get('/threads/'. $channel->slug)
             ->assertSee($threadInChannel->title)
             ->assertDontSee($threadNotInChannel->title);
    }
}
